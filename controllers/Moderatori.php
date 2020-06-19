<?php

    if(TrenutniKorisnik::dohvatiTip() != 2)
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
            case 'racuni': 
                racuni($smarty); 
                break;
            case 'skupine':
                skupine($smarty);
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

        $smarty->display('Moderator.tpl');
    }

    function skupine($smarty) {

        $status_spremanja = 0;

        if (isset($_POST['djecji-vrtici-dodaj-btnPosalji'])) 
        {
            require('models/SkupineModel.php');            

            $s = new Skupine();
    
            $naziv = filter_input(INPUT_POST , 'skupine-naziv', FILTER_SANITIZE_SPECIAL_CHARS);
            $cijena = filter_input(INPUT_POST , 'skupine-cijena', FILTER_SANITIZE_SPECIAL_CHARS);

            if($s->add($naziv, $cijena))
                $status_spremanja = 1;
            else
                $status_spremanja = 2;

            Dnevnik::add(16, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Dodavanje skupine, status ' . $status_spremanja);
        }

        $poruka = '';
        switch($status_spremanja)
        {
            case 1: 
                $poruka = 'Skupina je dodana.'; 
                break;
            case 2: 
                $poruka = 'Greška kod dodavanja skupine'; 
                break;
        }

        $smarty->assign('status_spremanja', $status_spremanja);
        $smarty->assign('poruka', $poruka);

        $smarty->display("ModeratorKreirajSkupinu.tpl");
    }

?>