<?php

    $kliknuta_registracija = 0;
    $registracija_uspjesna = 0;
    $registracija_greska = '';

    $polja_greske = '';

    if(isset($_POST['registracija-btnPosalji']))
    {
        $kliknuta_registracija = 1;

        // uzmi iz input fieldova vrijednosti
        $ime = filter_input(INPUT_POST , 'registracija-ime', FILTER_SANITIZE_SPECIAL_CHARS);
        $prezime = filter_input(INPUT_POST , 'registracija-prezime', FILTER_SANITIZE_SPECIAL_CHARS);
        $korisnickoIme = filter_input(INPUT_POST , 'registracija-korisnicko-ime', FILTER_SANITIZE_SPECIAL_CHARS);
        $godinaRodenja = filter_input(INPUT_POST , 'registracija-godina-rodenja', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST , 'registracija-email', FILTER_SANITIZE_SPECIAL_CHARS);
        $lozinka = filter_input(INPUT_POST , 'registracija-lozinka', FILTER_SANITIZE_SPECIAL_CHARS);
        $lozinkaPotvrda = filter_input(INPUT_POST , 'registracija-lozinka-potvrda', FILTER_SANITIZE_SPECIAL_CHARS);

        $recaptchaResponse = trim(filter_input(INPUT_POST , 'g-recaptcha-response', FILTER_SANITIZE_SPECIAL_CHARS));

        $registracija_uspjesna = 1;

        // server provjera!
        // input fieldovi nisu null
        if (empty($ime) || empty($prezime) || empty($korisnickoIme) || empty($godinaRodenja) || empty($email) || empty($lozinka) || empty($lozinkaPotvrda)) {
            $polja_greske .= 'Podaci nisu potpuni!';
            $registracija_uspjesna = 0;
        }

        // ime mora počinjati velikim slovom
        if(!preg_match('/^[A-ZŠĐČĆŽ]([A-ZŠĐČĆŽa-zšđčćž]{0,29})$/', $ime)) {
            $polja_greske .= "Ime ne počinje velikim slovom!";
            $registracija_uspjesna = 0;
        }

        // prezime mora počinjati velikim slovom
        if(!preg_match('/^[A-ZŠĐČĆŽ]([A-ZŠĐČĆŽa-zšđčćž]{0,29})$/', $prezime)) {
            $polja_greske .= "Prezime ne počinje velikim slovom!";
            $registracija_uspjesna = 0;
        }

        // provjera lozinki
        if($lozinka != $lozinkaPotvrda) {
            $polja_greske .= 'Lozinke se ne podudaraju!';
            $registracija_uspjesna = 0;
        }

        // godina > 2020
        if($godinaRodenja > 2020) {
            $polja_greske .= 'Neispravna godina rođenja!';
            $registracija_uspjesna = 0;
        }

        // email format
        if(!(preg_match('/^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/', $email))) {
            $polja_greske .= 'Neispravan format e-maila!';
            $registracija_uspjesna = 0;
        }

        // ako registracija nije 0, jer u provjeri polja ako ima greška postavljena vrijednost je postavljena na 0
        if($registracija_uspjesna != 0)
        {            
            $secret_key = '6LdJwJ8UAAAAAHpf9ay49fr1aKdY42w3GFUbHMR-';
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response='.$recaptchaResponse;
            $response = @file_get_contents($url);
            $data = json_decode($response, true);
            
            // captcha ok
            if($data['success'])
            {
                // upis u bazu
                $k = new Korisnici();
                
                // postavi vrijednosti u instancu
                $k->Ime = $ime;
                $k->Prezime = $prezime;
                $k->Korisnicko_Ime= $korisnickoIme;
                $k->Lozinka = $lozinka;
                $k->Godina_Rodenja = $godinaRodenja;
                $k->Email = $email;

                // hashiraj lozinku
                $k->Lozinka_Sha = hash("sha256", $lozinka);

                $token = Pomak::get_virtual_time();

                if($k->add($k, $token))
                {
                    $registracija_uspjesna = 1;
                    Dnevnik::add(12, $korisnickoIme, 'Registracija uspješna');
                }
            }
            else
            {
                $registracija_uspjesna = 0;
                $polja_greske .= 'ReCAPTCHA nije ispravno označena (niste dokazali da niste robot).';
                Dnevnik::add(14, $korisnickoIme, 'Neispravna captcha.');
            }
        }

        // ispis greške na serveru
        if($registracija_uspjesna == 0)
        {
            $registracija_greska = 'Greška kod registracije. ';
            $registracija_greska .= $polja_greske;

            Dnevnik::add(13, $korisnickoIme, 'Greška kod registracije za kor. ime ' . $korisnickoIme);
        }

    }

    $smarty->assign('kliknuta_registracija', $kliknuta_registracija);
    $smarty->assign('registracija_uspjesna', $registracija_uspjesna);
    $smarty->assign('registracija_greska', $registracija_greska);

    $smarty->display('Registracija.tpl');

?>