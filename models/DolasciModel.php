<?php 

class Dolasci
{
    var $Id;
    var $Datum;
    var $Dijete_Id;
    var $Djecji_Vrtici_Id;
    var $Korisnici_Id_Registrirani;

    var $Naziv;
    var $Dijete;

/*
    function getPlaceno($id) {

        $placeno = 0;

        $b = new Database();
        $b->openConnection();

		$sql = "SELECT Id, Placeno 
                FROM racuni
                WHERE Id = '$id'";

        $rs = $b->selectQuery($sql);

        if($red = mysqli_fetch_array($rs))
            $aktivan = $red["Placeno"];

        $b->closeConnection();

        return $aktivan;
	}*/
}

?>