<?php 

class TrenutniKorisnik
{
    public static $Id;
    public static $Korisnicko_Ime;
    public static $Tipovi_Korisnika_Id;

    public static function upisiVarijable($korIme, $tip, $id)
    {
        self::$Korisnicko_Ime = $korIme;
        self::$Tipovi_Korisnika_Id = $tip;
        self::$Id = $id;
    }

    public static function dohvatiTip()
    {
        return self::$Tipovi_Korisnika_Id;
    }

    public static function dohvatiKorisnickoIme()
    {
        return self::$Korisnicko_Ime;
    }

    public static function dohvatiId()
    {
        return self::$Id;
    }

}

?>