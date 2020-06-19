<?php 

class Skupine
{
    var $Id;
    var $Naziv;
    var $Cijena;

    //  dodavanje nove skupine u bazu
    public function add($naziv, $cijena) {

        $b = new Database();
        $conn = $b->openConnection();

        $upit = "INSERT INTO skupine(Naziv, Cijena)
                VALUES(?, ?)";

        $sql = $conn->prepare($upit);
        $sql->bind_param("si", $naziv, $cijena);

        $sql->execute();

        $br = $sql->affected_rows;

        $b->closeConnection();

        if($br == 1)
            return true;

        return false;  
    }

}

?>