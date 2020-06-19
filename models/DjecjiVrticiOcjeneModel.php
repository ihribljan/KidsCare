<?php 

class DjecjiVrticiOcjene
{
    var $Id;
    var $Godina;
    var $Mjesec;
    var $Korisnici_Id_Administrator;
    var $Djecji_Vrtici_Id;
    var $Ocjena;

    public function get_ocjena($djecjiVrticiId, $godina, $mjesec) {

        $ocjena = 0;
        
        $b = new Database();
        $conn = $b->openConnection();

        $upit = "select Ocjena
                FROM djecji_vrtici_ocjena
                WHERE Djecji_Vrtici_Id = ?
                    and Godina = ?
                    and Mjesec = ?";

        $sql = $conn->prepare($upit);
        $sql->bind_param("iii", $djecjiVrticiId, $godina, $mjesec);

        $sql->execute();
        $rs = $sql->get_result();

        if($red = $rs->fetch_array(MYSQLI_ASSOC))
        {
            $ocjena = $red["Ocjena"];
        }

        $b->closeConnection();

        return $ocjena;  
    }

    //  add ocjene za odabrani mjesec
    public function addOcjena($godina, $mjesec, $korisnik, $vrtic, $ocjena) {

        $b = new Database();
        $conn = $b->openConnection();

        $upit = "INSERT INTO djecji_vrtici_ocjena(Godina, Mjesec, Korisnici_Id_Administrator, Djecji_Vrtici_Id, Ocjena) 
                VALUES(?, ?, ?, ?, ?)";

        $sql = $conn->prepare($upit);
        $sql->bind_param("iiiii", $godina, $mjesec, $korisnik, $vrtic, $ocjena);

        $sql->execute();

        $br = $sql->affected_rows;

        $b->closeConnection();

        if($br == 1)
            return true;

        return false;  
    }

    //  update ocjene za odabrani mjesec
    public function updateOcjena($godina, $mjesec, $korisnik, $vrtic, $ocjena) {

        $b = new Database();
        $conn = $b->openConnection();

        $upit = "UPDATE djecji_vrtici_ocjena SET
                    Korisnici_Id_Administrator = ?,
                    Ocjena = ?
                where Djecji_Vrtici_Id = ?
                    AND Godina = ?
                    AND Mjesec = ?";

        $sql = $conn->prepare($upit);
        $sql->bind_param("iiiii", $korisnik, $ocjena, $vrtic, $godina, $mjesec);

        $sql->execute();

        $br = $sql->affected_rows;

        if($br == 1)
            return true;

        return false;
    }
}

?>