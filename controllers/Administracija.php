<?php

    if(TrenutniKorisnik::dohvatiTip() != 1)
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
            case 'pomak': 
                pomak($smarty); 
                break;
            case 'dodajVrtic':
                dodajDjecjiVrtic($smarty);
                break;
            case 'statusKorisnika':
                promijeniStatusKorisnika($smarty);
                break;
            case 'racuni':
                racuni($smarty);
                break;
            case 'dnevnik':
                dnevnik($smarty);
                break;
            case 'ocjene':
                ocjene($smarty);
                break;
            case 'postavkeSustava':
                postavkeSustava($smarty);
                break;
            default: 
                index($smarty);
        }
    }

    function pomak($smarty)
    {
        $ok = true;
        $kliknut_pomak = false;

        // pročitaj iz datoteke koliki je pomak 
        $sati_procitano = Pomak::save_virtual_time();

        // ako je kliknuo da želi pomaknuti, upiši u tablicu taj pomak
        if(isset($_POST['pomak-btnPosalji']))
        {        
            $kliknut_pomak = true;

            if(Pomak::add($sati_procitano))
            {
                $ok = true;
                Dnevnik::add(11, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Izvršen pomak virtualnog vremena za ' . $sati_procitano . 'h');
            }
            else
            {
                $ok = false;
                Dnevnik::add(12, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Greška kod pomaka');
            }
        }
        
        // čitaj iz baze koliki mi je upisan zadnji pomak
        $pomak = Pomak::get_pomak();
        
        Dnevnik::add(11, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Čita pomak (' . $pomak . 'h)');

        // složi virtualno vrijeme
        $serversko_vrijeme = time();
        $virtualno_vrijeme = Pomak::get_virtual_time_with_param($serversko_vrijeme);

        // definiraj ih u ispis kao string
        $serversko_vrijeme = timestamp_u_datum_i_vrijeme($serversko_vrijeme);
        $virtualno_vrijeme = timestamp_u_datum_i_vrijeme($virtualno_vrijeme);

        $smarty->assign('kliknut_pomak', $kliknut_pomak);
        $smarty->assign('ok', $ok);
        $smarty->assign('serversko_vrijeme', $serversko_vrijeme);
        $smarty->assign('pomak', $pomak);
        $smarty->assign('virtualno_vrijeme', $virtualno_vrijeme);

        $smarty->assign('sati_procitano', $sati_procitano);
        
        $smarty->display('AdministracijaPomak.tpl');
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

        $smarty->display('Administracija.tpl');
    }

    function dodajDjecjiVrtic($smarty)
    {       
        $status_spremanja = 0;       

        if (isset($_POST['djecji-vrtici-dodaj-btnPosalji'])) 
        {
            require('models/DjecjiVrticiModel.php');            

            $d = new DjecjiVrtici();
    
            $naziv = filter_input(INPUT_POST , 'djecji-vrtici-naziv', FILTER_SANITIZE_SPECIAL_CHARS);
            $adresa = filter_input(INPUT_POST , 'djecji-vrtici-adresa', FILTER_SANITIZE_SPECIAL_CHARS);
            $moderator = filter_input(INPUT_POST , 'djecji-vrtici-moderator', FILTER_SANITIZE_SPECIAL_CHARS);

            if($d->add($naziv, $adresa, $moderator))
                $status_spremanja = 1;
            else
                $status_spremanja = 2;

            Dnevnik::add(8, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Dodavanje vrtića, status ' . $status_spremanja);
        }

        $kor = new Korisnici();
        $lista_moderatori = $kor->getSlobodniModeratori();

        $poruka = '';
        switch($status_spremanja)
        {
            case 1: 
                $poruka = 'Vrtić je dodan.'; 
                break;
            case 2: 
                $poruka = 'Greška kod dodavanja vrtića'; 
                break;
        }

        $smarty->assign('status_spremanja', $status_spremanja);
        $smarty->assign('poruka', $poruka);
        $smarty->assign('lista_moderatori', $lista_moderatori);
        $smarty->display('AdministracijaDodajVrtic.tpl');
    }

    function promijeniStatusKorisnika($smarty) {

        Dnevnik::add(9, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Lista sve korisnike');

        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->assign('trenutni_korisnik', TrenutniKorisnik::dohvatiKorisnickoIme()); // jer ajax ne može do sessiona?!
        $smarty->display('AdministracijaStatusKorisnika.tpl');
    }

    function racuni($smarty) {


        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->display('AdministracijaRacuni.tpl');
    }

    function dnevnik($smarty) {

        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->display('AdministracijaDnevnik.tpl');
    }

    function postavkeSustava($smarty) {

        $status_spremanja = 0;       

        if (isset($_POST['djecji-vrtici-dodaj-btnPosalji'])) 
        {
            $ps = new PostavkeSustava();
    
            $Id = filter_input(INPUT_POST , 'postavke-id', FILTER_SANITIZE_SPECIAL_CHARS);
            $Stranicenje_Broj_Stranica = filter_input(INPUT_POST , 'postavke-stranicenje', FILTER_SANITIZE_SPECIAL_CHARS);
            $Broj_Neuspjesnih_Prijava = filter_input(INPUT_POST , 'postavke-broj-neuspjesnih-prijava', FILTER_SANITIZE_SPECIAL_CHARS);
            $Vrijeme_Trajanja_Sesije = filter_input(INPUT_POST , 'postavke-vrijeme-trajanja-sesije', FILTER_SANITIZE_SPECIAL_CHARS);
            $Poslovna_Godina = filter_input(INPUT_POST , 'postavke-poslovna-godina', FILTER_SANITIZE_SPECIAL_CHARS);
            $Trajanje_Tokena_Za_Registraciju = filter_input(INPUT_POST , 'postavke-trajanje-tokena', FILTER_SANITIZE_SPECIAL_CHARS);
            $Dark_Mode = filter_input(INPUT_POST , 'postavke-dark-mode', FILTER_SANITIZE_SPECIAL_CHARS);

            if($ps->update($Stranicenje_Broj_Stranica, $Broj_Neuspjesnih_Prijava, $Vrijeme_Trajanja_Sesije, $Poslovna_Godina, $Trajanje_Tokena_Za_Registraciju, $Dark_Mode))
                $status_spremanja = 1;
            else
                $status_spremanja = 2;

            Dnevnik::add(15, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Promjena postavki sustava (status: ' . $status_spremanja . ')');
        }


        PostavkeSustava::upisiTrenutne();
        Dnevnik::add(15, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Čita postavke sustava');

        $stranicenje = PostavkeSustava::$Stranicenje_Broj_Stranica;
        $neuspjesnaPrijava = PostavkeSustava::$Broj_Neuspjesnih_Prijava;
        $trajanjeSesije = PostavkeSustava::$Vrijeme_Trajanja_Sesije;
        $poslovnaGodina = PostavkeSustava::$Poslovna_Godina;
        $token = PostavkeSustava::$Trajanje_Tokena_Za_Registraciju;
        $darkMode = PostavkeSustava::$Dark_Mode;

        $poruka = '';
        switch($status_spremanja)
        {
            case 1: 
                $poruka = 'Uspješna promjena postavki!'; 
                break;
            case 2: 
                $poruka = 'Greška kod promjene postavki!'; 
                break;
        }

        $smarty->assign('status_spremanja', $status_spremanja);
        $smarty->assign('poruka', $poruka);

        $smarty->assign('stranicenje', $stranicenje);
        $smarty->assign('neuspjesnaPrijava', $neuspjesnaPrijava);
        $smarty->assign('trajanjeSesije', $trajanjeSesije);
        $smarty->assign('poslovnaGodina', $poslovnaGodina);
        $smarty->assign('token', $token);
        $smarty->assign('darkMode', $darkMode);

        $smarty->display('AdministracijaPostavkeSustava.tpl');
    }

    function ocjene($smarty) {

        require('models/DjecjiVrticiModel.php');  
        require('models/DjecjiVrticiOcjeneModel.php');  

        $d = new DjecjiVrtici();
        $lista_djecji_vrtici = $d->getAll();

        $mjeseci = array();
        for($i = 1; $i<=12; $i++)
            $mjeseci[$i-1] = $i;

        $dvo = new DjecjiVrticiOcjene();
        // add dela! 
        //$obj = $dvo -> addOcjena(2020, 12, 1, 1, 99);

        //print_r($lista_djecji_vrtici);

        $smarty->assign('lista_djecji_vrtici', $lista_djecji_vrtici);
        $smarty->assign('mjeseci', $mjeseci);
        $smarty->assign('poslovna_godina', PostavkeSustava::$Poslovna_Godina);
        $smarty->assign('trenutni_korisnik', TrenutniKorisnik::dohvatiKorisnickoIme());
        $smarty->assign('trenutni_korisnik_id', TrenutniKorisnik::dohvatiId());

        $smarty->display('AdministracijaOcjene.tpl');
    }

?>