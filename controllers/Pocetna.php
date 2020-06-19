<?php

    $logiran = 0;
    $korisnicko_ime = '';

    if(isset($_SESSION['korisnik']))
    {
        $logiran = 1;
        $korisnicko_ime = TrenutniKorisnik::dohvatiKorisnickoIme();
    }
    
    $smarty->assign('logiran', $logiran);
    $smarty->assign('korisnicko_ime', $korisnicko_ime);

    $smarty->display('Pocetna.tpl');

?>