<?php 

class Racuni
{
    var $Id;
    var $Datum;
    var $Dijete_Id;
    var $Djecji_Vrtici_Id;
    var $Iznos;
    var $Korisnici_Id_Registrirani;
    var $Placeno;

    var $Naziv;
    var $Roditelj;
    var $Dijete;

    public function updatePlaceno($id)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE racuni set Placeno = 1
                where Id = '$id'";

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }

    function getPlaceno($id) {

        $placeno = 0;

        $b = new Database();
        $b->openConnection();

		$sql = "SELECT Id, Placeno 
                FROM racuni
                WHERE Id = '$id'";

        $rs = $b->selectQuery($sql);

        if($red = mysqli_fetch_array($rs))
            $placeno = $red["Placeno"];

        $b->closeConnection();

        return $placeno;
	}
}

?>