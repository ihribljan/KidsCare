<?php

    $subpag = null;

    if(isset($_GET['subpag']))
        $subpag = filter_input(INPUT_GET , 'subpag', FILTER_SANITIZE_SPECIAL_CHARS);

    switch($subpag)
    {
        case 'galerija': 
            galerija($smarty); 
            break;
        default: 
            index($smarty);
    }
    
    function galerija($smarty)
    {
        $djecjiVrticiId = 0;

        if(isset($_GET['djecjiVrticiId']))
            $djecjiVrticiId = filter_input(INPUT_GET , 'djecjiVrticiId', FILTER_SANITIZE_SPECIAL_CHARS);

        //echo 'vrtić' . $djecjiVrticiId;

        // log tko gleda slike
        Dnevnik::add(7, TrenutniKorisnik::dohvatiKorisnickoIme(), 'Pregled slika vrtića (id: ' . $djecjiVrticiId . ')');

        $smarty->assign('djecjiVrticiId', $djecjiVrticiId);

        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->display('DjecjiVrticiGalerija.tpl');
    }
    
    function index($smarty)
    {
        $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
        $smarty->display('DjecjiVrtici.tpl');
    }
?>