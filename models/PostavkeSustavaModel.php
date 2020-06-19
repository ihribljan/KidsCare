<?php 

class PostavkeSustava
{
    public static $Id;
    public static $Stranicenje_Broj_Stranica;
    public static $Broj_Neuspjesnih_Prijava;
    public static $Vrijeme_Trajanja_Sesije;
    public static $Poslovna_Godina;
    public static $Trajanje_Tokena_Za_Registraciju;
    public static $Dark_Mode;


    public static function upisiTrenutne()
    {
        $b = new Database();
        $b->openConnection();

        $sql = "SELECT * FROM postavke WHERE id = 1";

        $rs = $b->selectQuery($sql);
    
        while($red = mysqli_fetch_array($rs))
        {
            self::$Id = $red["Id"];
            self::$Stranicenje_Broj_Stranica = $red["Stranicenje_Broj_Stranica"];
            self::$Broj_Neuspjesnih_Prijava = $red["Broj_Neuspjesnih_Prijava"];
            self::$Vrijeme_Trajanja_Sesije = $red["Vrijeme_Trajanja_Sesije"];
            self::$Poslovna_Godina = $red["Poslovna_Godina"];
            self::$Trajanje_Tokena_Za_Registraciju = $red["Trajanje_Tokena_Za_Registraciju"];
            self::$Dark_Mode = $red["Dark_Mode"];
        }

        $b->closeConnection();
    }

    public static function update($stranicenje, $neuspjesnaPrijava, $sesija, $godina, $token, $dark) {

        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE postavke 
                SET Stranicenje_Broj_Stranica = $stranicenje, 
                Broj_Neuspjesnih_Prijava = $neuspjesnaPrijava, 
                Vrijeme_Trajanja_Sesije = $sesija,
                Poslovna_Godina = $godina, 
                Trajanje_Tokena_Za_Registraciju = $token,
                Dark_Mode = $dark
                WHERE Id = '1'";

            echo $sql;

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }
}

?>