<?php 

class Dnevnik
{
    /* ŠIFRA RADNJE:
        1 - login
		2 - logout
        3 - pogrešan login
        4 - blokada
        5 - resetirana lozinka
        6 - aktivacija preko tokena (sa opisom radnje)
    */

    var $Sifra_Radnje;
    var $Vrijeme;
    var $Korisnicko_Ime;
    var $Ip;
    var $Opis_Radnje;

    private static $initialized = false;

    private static function initialize()
    {
        if (self::$initialized)
            return;

        self::$initialized = true;
    }

    //  dodavanje u bazu
    public static function add($sifraRadnje, $korisnik, $opisRadnje) {
        
        self::initialize();

        $vrijeme = Pomak::get_virtual_time();
        $ip = $_SERVER['REMOTE_ADDR'];

        $b = new Database();
        $conn = $b->openConnection();

        // upit za broj zapisa
		$upit = "INSERT INTO dnevnik(Sifra_Radnje, Vrijeme, Korisnicko_Ime, Ip, Opis_Radnje) VALUES(?, ?, ?, ?, ?)";

        $sql = $conn->prepare($upit);
        $sql->bind_param("sisss", $sifraRadnje, $vrijeme, $korisnik, $ip, $opisRadnje);

        $sql->execute();

        $br = $sql->affected_rows;

        $b->closeConnection();

        if($br == 1)
            return true;

        return false;  
    }

    //get all dnevnik
    public function getAll()
    {
        $lista = array();

        $b = new Database();
        $b->openConnection();

        $sql = "SELECT * from dnevnik ORDER BY id asc";

        $rs = $b->selectQuery($sql);
    
        if($red = mysqli_fetch_array($rs))
        {
            $k = new Dnevnik();

            $k->Id = $red["Id"];
            $k->Sifra_Radnje = $red["Sifra_Radnje"];
            $k->Vrijeme = $red["Vrijeme"];
            $k->Korisnicko_Ime = $red["Korisnicko_Ime"];
            $k->Ip = $red["Ip"];
            $k->Opis_Radnje = $red["Opis_Radnje"];

            $lista[] = $k;
        }

        $b->closeConnection();

        return $lista;
    }  
}

?>