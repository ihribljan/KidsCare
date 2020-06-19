<?php 

class DjecjiVrtici
{
    var $Id;
    var $Naziv;
    var $Adresa;
    var $Korisnici_Id_Administrator;
    var $Korisnici_Id_Moderator;
    var $Kapacitet;
    var $Administrator;
    var $Moderator;
    var $Prosjecna_Ocjena;

    var $Broj_Djece;
    var $Ukupno_Racuna;
    var $Placeni_Racuni;
    var $Neplaceni_Racuni;

    //  dodavanje vrtića u bazu
    public function add($naziv, $adresa, $moderator) {

        $b = new Database();
        $conn = $b->openConnection();

        $upit = "INSERT INTO djecji_vrtici(Naziv, Adresa, Korisnici_Id_Administrator, Korisnici_Id_Moderator, Kapacitet) 
                VALUES(?, ?, 1, ?, 0)";

        $sql = $conn->prepare($upit);
        $sql->bind_param("ssi", $naziv, $adresa, $moderator);

        $sql->execute();

        $br = $sql->affected_rows;

        $b->closeConnection();

        if($br == 1)
            return true;

        return false;  
    }

    public function getAll()
    {
        $lista = array();

        $b = new Database();
        $b->openConnection();

        $sql = "SELECT * from djecji_vrtici ORDER BY id asc";

        $rs = $b->selectQuery($sql);
    
        while($red = mysqli_fetch_array($rs))
        {
            $k = new DjecjiVrtici();

            $k->Id = $red["Id"];
            $k->Naziv = $red["Naziv"];
            $k->Adresa = $red["Adresa"];
            $k->Korisnici_Id_Administrator = $red["Korisnici_Id_Administrator"];
            $k->Korisnici_Id_Moderator = $red["Korisnici_Id_Moderator"];
            $k->Kapacitet = $red["Kapacitet"];
            $lista[] = $k;
        }

        $b->closeConnection();

        return $lista;
    }
}

?>