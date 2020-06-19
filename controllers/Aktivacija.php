<?php

    // ako je u getu korisnik i token
    if (isset($_GET['korisnik']) && isset($_GET['token'])) {
            
        $korisnicko_ime = filter_input(INPUT_GET , 'korisnik', FILTER_SANITIZE_SPECIAL_CHARS);
        $token = filter_input(INPUT_GET , 'token', FILTER_SANITIZE_SPECIAL_CHARS);

        //echo 'provjeravam aktivaciju korisnika ' . $korisnicko_ime . ' sa tokenom . ' . $token;

        $korisnikModel = new Korisnici();

        //echo 'našao broj kor. imena: ' . $korisnikModel->countByUsername($korisnicko_ime);

        if($korisnikModel->countByUsername($korisnicko_ime) != 1)
        {
            // ne postoji takvo korisničko ime
            Dnevnik::add(6, $korisnicko_Ime, 'Aktivacija nepostojećeg korisnika');
            $as = 5;
        }
        else
        {
            $korisnikModel = $korisnikModel->getData($korisnicko_ime);

            //echo 'user: ' . $korisnikModel->Korisnicko_Ime;
            //echo 'token: ' . $korisnikModel->Token;

            if ($korisnikModel->Potvrda_Registracije == 1) { // aktivacija obavljena?
            
                Dnevnik::add(6, $korisnikModel->Korisnicko_Ime, 'Aktivacija je već obavljena');
                $as = 3;
                
            } else { // aktivacija nije obavljena => provjera tokena
            
                // dohvati polje token, da se usporedi je li ispravan token
                $db_token = $korisnikModel->Token;
                
                $max_vrijeme_tokena = $token + (PostavkeSustava::$Trajanje_Tokena_Za_Registraciju * 60 * 60); // timestamp kada je kreiran token + X sati

                $vrijeme_sada = Pomak::get_virtual_time();
                
                if ($db_token == $token) { // test jesu li jednaki (iz baze i ovaj iz GET-a)

                    //echo 'sada: ' . $vrijeme_sada;
                    //echo 'max_vrijeme_tokena: ' . $max_vrijeme_tokena;

                    if ($vrijeme_sada <= $max_vrijeme_tokena) { // test prema vremenu (je li istekao)

                        if($korisnikModel->updateStatus(1, 1)) // ažurira potvrda=1, i aktivan=1 (IMAMO DVA POLJA)
                        {
                            Dnevnik::add(6, $korisnikModel->Korisnicko_Ime, 'Aktiviran');
                            $as = 4;
                        
                            $primatelj = $korisnikModel->Email; // barka
                            //$primatelj = "admin@localhost"; // lokalno
                            $naslov = "KidsCare | Poruka o aktivaciji";
                            $poruka = "Aktivacija vašeg korisničkog računa uspješno je obavljena!";
                            $headers = "From: info@kidscare.com";
                            mail($primatelj, $naslov, $poruka, $headers);	
                        }

                    } else {
                        Dnevnik::add(6, $korisnikModel->Korisnicko_Ime, 'Token istekao');
                        $as = 1;
                    }
                    
                } else {
                    Dnevnik::add(6, $korisnikModel->Korisnicko_Ime, 'Token neispravan');
                    $as = 2;
                }
            }
                
        }

        switch($as)
        {
            case 1:
                $poruka = "Token je istekao! Korisnički račun neće biti moguće aktivirati.\n";
                break;
            case 2:
                $poruka = "Token je neispravan! Provjerite ponovno e-mail poruku sa podacima za aktivaciju ili se obratite administatoru.\n";
                break;
            case 3:
                $poruka = "Korisnički račun je već aktivan!\n";
                break;
            case 4:
                $poruka = "Korisnički račun je aktiviran! Sada se možete prijaviti na stranicu.\n";
                break;
            case 5:
                $poruka = "Korisnički račun ne postoji!\n";
                break;
        }

        
        // smarty
        $smarty->assign('as', $as);
        $smarty->assign('poruka', $poruka);
        $smarty->display('Aktivacija.tpl');
    }		
?>