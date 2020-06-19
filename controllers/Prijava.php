<?php

    $status_prijava = 0;       

    if (isset($_POST['prijava-btnPosalji']) && !isset($_SESSION['korisnik'])) 
    {
        $k = new Korisnici();

        $kor_ime = filter_input(INPUT_POST , 'prijava-korisnicko-ime', FILTER_SANITIZE_SPECIAL_CHARS);

        $postoji = $k->countByUsername($kor_ime);
    
        if($postoji == 1)
        {
            if($k->get_aktivan($kor_ime))
            {
                // prijava nije uspjela, uvećaj mu broj pogrešnih prijava
                $k->updatePogresnePrijave($kor_ime);

                Dnevnik::add(3, $kor_ime, 'Pogrešna prijava');

                $status_prijava = 1;

                $br = $k->get_Broj_Pogresnih_Prijava($kor_ime);

                if($br == PostavkeSustava::$Broj_Neuspjesnih_Prijava)
                {
                    $k->update_aktivan($kor_ime, 0);
                    
                    // blokiran zbog >3 neuspješnih prijava
                    $status_prijava = 4;

                    Dnevnik::add(4, $kor_ime, 'Blokada korisnika');
                }
            }
            else
            {
                // nije aktivan
                $status_prijava = 3;
            }
        }
        else
        {
            // ne postoji username
            $status_prijava = 2;
        }
    } 


    $status_zaboravljena_lozinka = 0;

    if (isset($_POST['prijava-btnZaboravljenaLozinka']) && !isset($_SESSION['korisnik'])) 
    {
        $k = new Korisnici();

        $kor_ime = filter_input(INPUT_POST , 'prijava-korisnicko-ime', FILTER_SANITIZE_SPECIAL_CHARS);
        $lozinka = filter_input(INPUT_POST , 'prijava-lozinka', FILTER_SANITIZE_SPECIAL_CHARS);

        $postoji = $k->countByUsername($kor_ime);
    
        if($postoji == 1)
        {
            if($k->get_aktivan($kor_ime))
            {
                $lozinka = str_shuffle('AL2154da91'); 
                $lozinka_hash = hash('sha256', $lozinka);
            
                // upiši mu rand lozinku
                $k = new Korisnici();
                $st = $k->update_lozinka($kor_ime, $lozinka, $lozinka_hash);
                
                Dnevnik::add(5, $kor_ime, 'Resetirana lozinka');

                $status_zaboravljena_lozinka = 1;

                // pošalji mu ju na email
                //$primatelj = 'admin@localhost'; // lokalno
                $primatelj = $k->getData($kor_ime)->Email; // barka
                $naslov = "KidsCare | ZABORAVLJENA LOZINKA";
                $poruka = "Vaša nova lozinka je: " . $lozinka . "";
                $headers = "From: admin@localhost.com\r\n";
                $headers .= "Content-Type: text/plain;charset=utf-8\r\n";
                mail($primatelj, $naslov, $poruka, $headers);
                
            }
            else
            {
                // neaktivan korisnik
                $status_zaboravljena_lozinka = 3;
            }
        }
        else
        {
            // ne postoji korisnik
            $status_zaboravljena_lozinka = 2;
        }
    }

    $istek_sesije = 0;

    if (isset($_GET['subpag'])) 
    {
        $subpag = filter_input(INPUT_GET , 'subpag', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if($subpag=="istek")
            $istek_sesije = 1;
    }

    $predefinirano_korisnicko_ime = '';

    if(isset($_COOKIE['username']))
        $predefinirano_korisnicko_ime = $_COOKIE['username'];

    $smarty->assign('predefinirano_korisnicko_ime', $predefinirano_korisnicko_ime);
    $smarty->assign('status_prijava', $status_prijava);
    $smarty->assign('status_zaboravljena_lozinka', $status_zaboravljena_lozinka);
    $smarty->assign('istek_sesije', $istek_sesije);

    $smarty->display('Prijava.tpl');
?>