<?php
    //require 'libs/MySession/sesija.class.php';
    include 'libs/MyDataAccess/Database.class.php';
    include 'libs/Funkcije.php';
   // ini_set('session.save_handler', 'files');
    require('models/TrenutniKorisnik.php'); // stalno
    require('models/KorisniciModel.php'); // stalno
    require('models/DnevnikModel.php'); // stalno
    require('models/PomakModel.php'); // stalno
    require('models/PostavkeSustavaModel.php'); // stalno

    PostavkeSustava::upisiTrenutne();

    session_start();

    if (isset($_POST['prijava-btnPosalji'])) {
        
        // ako je kliknuta prijava na linku koji nije https://, onda vrati na početnu stranicu sa https://
        if ((!isset($_SERVER['HTTPS'])) || $_SERVER['HTTPS'] != "on") {
            $https = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            header("Location: $https");
            exit;
        }
    
        $kor_ime = filter_input(INPUT_POST , 'prijava-korisnicko-ime', FILTER_SANITIZE_SPECIAL_CHARS);
        $lozinka = filter_input(INPUT_POST , 'prijava-lozinka', FILTER_SANITIZE_SPECIAL_CHARS);

        // provjeri postoji li korisnik u bazi...
        $k = new Korisnici();
        
        // ako imam 3 pogrešne prijave, a on u 4. prijavi upiše točne podatke - svejedno se ne smije prijaviti, jer provjeravam je li aktivan (tj. blokiran)
        if($k->get_aktivan($kor_ime))
        {
            $postoji = $k->validiraj($kor_ime, hash('sha256', $lozinka));
        
            if($postoji == 1)
            {
                $k->Korisnicko_Ime = $kor_ime;
                $tip = $k->get_uloga();
                $id = $k->get_id();

                //session_start();
                $_SESSION['korisnik'] = $kor_ime;
                $_SESSION['Tipovi_Korisnika_Id'] = $tip;
                $_SESSION['Id'] = $id;

                // postavi počekat sessije na virtualno vrijeme, a istek sesije prema konf. postavkama
                $_SESSION['pocetak_sesije'] = Pomak::get_virtual_time();
                $_SESSION['istek_sesije'] = $_SESSION['pocetak_sesije'] + (PostavkeSustava::$Vrijeme_Trajanja_Sesije * 60 * 60);

                // resetiraj pogrešne prijave na 0 (ako ima npr. 2, a treća je uspjela, onda brojimo ispočetka)
                $k->updatePogresnePrijaveResetiraj($kor_ime);

                // dnevnik prijava u app
                Dnevnik::add(1, $kor_ime, 'Prijava ok');

                // postavi cookie
                if(isset($_POST['prijava-zapamti']))
                {
                    $cookie_name = "username";
                    $cookie_value = $_SESSION['korisnik'];
                    setcookie($cookie_name, $cookie_value,  Pomak::get_virtual_time() + (10 * 365 * 24 * 60 * 60), "/"); // 10 god
                }

                header('location:index.php');
            }
        }
        // inače ako nije aktivan, ne ide redirect, ostaje na ?pg=prijava, i ispisuje mu poruku ta stranica!
    }

    if(isset($_SESSION['korisnik']))
    {
        // ako je istekla sessija, uništi ju, i prebaci na login
        if (Pomak::get_virtual_time() > $_SESSION['istek_sesije']) {

            Dnevnik::add(2, $_SESSION['korisnik'], 'Istekla sesija');

            session_destroy();
            header('location: index.php?pg=prijava&subpag=istek');

        }
        else
        {
            TrenutniKorisnik::upisiVarijable($_SESSION['korisnik'], $_SESSION['Tipovi_Korisnika_Id'], $_SESSION['Id']);
        }
    }

    if (isset($_GET['pg']) && $_GET['pg'] == "odjava") {
        
        // dnevnik prijava u app
        Dnevnik::add(2, $_SESSION['korisnik'], 'Odjava ok');

        session_destroy();
        header('location: index.php');
    }

    

    require("libs/Smarty/Smarty.class.php");
    $smarty = new Smarty();
    $smarty->template_dir='views/';
    $smarty->compile_dir='views/smarty/views_c/';
    $smarty->config_dir='views/smarty/configs/';
    $smarty->cache_dir='views/smarty/cache/';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dječji vrtići</title>
        <link rel="stylesheet" href="assets/css/ihribljan.css">

        <script src='https://www.google.com/recaptcha/api.js?hl=hr'></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="assets/js/paginacija.js"></script>
        <script src="assets/js/funkcije.js"></script>
        <script src="assets/js/moment-with-locales.js"></script>
        <script>
            moment.locale('hr');
        </script>

        <?php
            $pg = null;
            
            if(isset($_GET['pg']))
                $pg = $_GET['pg'];

            switch($pg)
            {
                case 'registracija':
                    echo '<script src="assets/js/registracija.js"></script>';
                break;
            }

        ?>
       

    </head>
    <body>
        <header class="header">
            <div class="inner-header">
                <a href="#">
                    <h2 class="logo">KidsCare</h2>
                </a> 
                <nav class="navigation">
                    <ul class="list">
                        <li class="list-item"><a href="?pg=index">Početna</a></li>
                        <li class="list-item"><a href="?pg=djecjiVrtici">Dječji vrtići</a></li>
                        <li class="list-item"><a href="?pg=javniPozivi">Javni pozivi</a></li>
                        <li class="list-item"><a href="/WebDiP/2019_projekti/WebDiP2019x047/privatno/Korisnici.php">Korisnici</a></li>
                        <?php
                            if(TrenutniKorisnik::dohvatiTip() == 1)
                                echo '<li class="list-item"><a href="?pg=administracija">Administracija</a></li>';
                            else if(TrenutniKorisnik::dohvatiTip() == 3)
                                echo '<li class="list-item"><a href="?pg=registrirani">Moje dijete</a></li>';
                            else if(TrenutniKorisnik::dohvatiTip() == 2)
                                echo '<li class="list-item"><a href="?pg=moderator">Postavke moderatora</a></li>';
                            
                        ?>
                        <?php
                            if(TrenutniKorisnik::dohvatiKorisnickoIme() != null)
                                echo '<a href="?pg=odjava"><button type="button" class="btnPrijava">Odjava</button></a>';
                        ?>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- preko get parametra, uključi stranicu koju trebam -->
        <?php
            $pg = null;
            
            if(isset($_GET['pg']))
                $pg = $_GET['pg'];

            switch($pg)
            {
                case 'djecjiVrtici':
                    include 'controllers/DjecjiVrtici.php';
                    break;
                case 'javniPozivi':
                    include 'controllers/JavniPozivi.php';
                    break;
                case 'prijava':
                    include 'controllers/Prijava.php';
                    break;
                case 'registracija':
                    include 'controllers/Registracija.php';
                    break;
                case 'aktivacija':
                    include 'controllers/Aktivacija.php';
                    break;
                case 'administracija':
                    include 'controllers/Administracija.php';
                    break;
                case 'registrirani':
                    include 'controllers/Registrirani.php';
                    break;
                case 'moderator':
                    include 'controllers/Moderatori.php';
                    break;
                default:
                    include 'controllers/Pocetna.php';
            }
        ?>

        <footer id="footer">
            <a href="static/autor.html" target="_blank">
                <h3 class="autor"> O autoru </h3>
            </a> 
            <a href="static/dokumentacija.html" target="_blank">
                <h3 class="dokumentacija"> Dokumentacija </h3>
            </a> 
        </footer>
    </body>
</html>

