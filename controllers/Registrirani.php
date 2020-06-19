<?php

    if(TrenutniKorisnik::dohvatiTip() != 3)
    {
        $smarty->display('NemaOvlasti.tpl');
    }
    else
    {
        $subpag = null;

        if(isset($_GET['subpag']))
            $subpag = $_GET['subpag'];

        switch($subpag)
        {
            case 'popisRacuna': 
                popisRacuna($smarty); 
                break;
            case 'dolasciDjeteta':
                dolasciDjeteta($smarty);
                break;
            case 'popisPrijavaZaUpise':
                popisPrijavaZaUpis($smarty);
                break;    
            default: 
                index($smarty);
        }        
    }

    function index($smarty)
    {
        $logiran = 0;
        $korisnicko_ime = '';

        if(isset($_SESSION['korisnik']))
        {
            $logiran = 1;
            $korisnicko_ime = TrenutniKorisnik::dohvatiKorisnickoIme();
        }

        $smarty->assign('logiran', $logiran);
        $smarty->assign('korisnicko_ime', $korisnicko_ime);

        $smarty->display('Registrirani.tpl');
    }

    function popisRacuna($smarty) {

        Dnevnik::add(13, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Lista sve svoje račune');

        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->assign('korisnicko_ime', TrenutniKorisnik::dohvatiKorisnickoIme());
        $smarty->assign('id', TrenutniKorisnik::dohvatiId()); // jer ajax ne može do sessiona?!

        $smarty->display('RegistriraniRacuni.tpl');
    }

    function popisPrijavaZaUpis($smarty) {

        Dnevnik::add(15, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Lista prijave za upis');

        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->assign('korisnicko_ime', TrenutniKorisnik::dohvatiKorisnickoIme());
        $smarty->assign('id', TrenutniKorisnik::dohvatiId()); // jer ajax ne može do sessiona?!

        $smarty->display('RegistriraniPrijaveZaUpis.tpl');
    }


    function dolasciDjeteta($smarty) {

        Dnevnik::add(16, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Lista dolaske djeteta');

        $mjeseci = array();
        for($i = 1; $i<=12; $i++)
            $mjeseci[$i-1] = $i;

        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->assign('id', TrenutniKorisnik::dohvatiId()); // jer ajax ne može do sessiona?!

        $smarty->assign('mjeseci', $mjeseci);
        $smarty->assign('poslovna_godina', PostavkeSustava::$Poslovna_Godina);

        $smarty->display('RegistriraniDolasci.tpl');
    }

?>