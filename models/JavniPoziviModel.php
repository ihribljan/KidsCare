<?php 

include 'libs/MyDataAccess/Database.class.php';

class JavniPozivi
{
    var $Id;
    var $Broj;
    var $Datum;
    var $Datum_Od;
    var $Datum_Do;
    var $Korisnici_Id_Moderator;
    var $Broj_Mjesta;
    var $Djecji_Vrtici_Id;
    var $Moderator;
    var $Vrtic;

/*
    public function get($id)
    {
        $b = new Database();
        $b->openConnection();
        
        $sql = "SELECT * FROM djecji_vrtici WHERE id = '$id'";
        $rs = $b->selectQuery($sql);

        $red = mysqli_fetch_array($rs);
        $this->Id = $red["Id"];
        $this->Broj = $red["Broj"];
        $this->Datum = $red["Datum"];;
        $this->Datum_Od = $red["Datum_Od"];
        $this->Datum_Do = $red["Datum_Do"];
        $this->Korisnici_Id_Moderator = $red["Korisnici_Id_Moderator"];
        $this->Broj_Mjesta = $red["Broj_Mjesta"];
        $this->Djecji_Vrtici_Id = $red["Djecji_Vrtici_Id"];

        $b->closeConnection();

        return $this;
    }
*/
    public function getAll()
    {
        $b = new Database();
        $b->openConnection();

        $lista = array();
        
        $sql = "SELECT jp.Broj, jp.Datum, jp.Datum_Od, jp.Datum_Do, CONCAT(k.Ime, ' ', k.Prezime) AS 'Moderator', jp.Broj_Mjesta, dv.Naziv AS 'Dječji vrtić'
                FROM javni_pozivi jp 
                JOIN djecji_vrtici dv 
                ON jp.Djecji_Vrtici_Id = dv.Id 
                JOIN korisnici k 
                ON jp.Korisnici_Id_Moderator = k.Id ";

        $rs = $b->selectQuery($sql);
        
        while($red = mysqli_fetch_array($rs))
        {
            $it = new JavniPozivi();

            $it->Broj = $red["Broj"];
            $it->Datum = $red["Datum"];;
            $it->Datum_Od = $red["Datum_Od"];
            $it->Datum_Do = $red["Datum_Do"];
            $it->Moderator = $red["Moderator"];
            $it->Broj_Mjesta = $red["Broj_Mjesta"];
            $it->Vrtic = $red["Dječji vrtić"];
            $lista[] = $it;
        }

        $b->closeConnection();

        return $lista;
    }


    //get po nazivu vrtića
    public function getAllByName($name)
    {
        $b = new Database();
        $b->openConnection();

        $lista = array();
        
        $sql = "SELECT jp.Broj, jp.Datum, jp.Datum_Od, jp.Datum_Do, CONCAT(k.Ime, ' ', k.Prezime) AS 'Moderator', jp.Broj_Mjesta, dv.Naziv AS 'Dječji vrtić'
                FROM javni_pozivi jp 
                JOIN djecji_vrtici dv 
                ON jp.Djecji_Vrtici_Id = dv.Id 
                JOIN korisnici k 
                ON jp.Korisnici_Id_Moderator = k.Id
                WHERE $name = dv.Naziv";

        $rs = $b->selectQuery($sql);

        while($red = mysqli_fetch_array($rs))
        {
            $it = new DjecjiVrtici();

            $it->Id = $red["Id"];
            $it->Naziv = $red["Naziv"];
            $it->Adresa = $red["Adresa"];;
            $it->Administrator = $red["Administrator"];
            $it->Moderator = $red["Moderator"];
            $it->Kapacitet = $red["Kapacitet"];
            $it->Prosjecna_Ocjena = $red["Prosjecna_Ocjena"];
            $lista[] = $it;
        }

        $b->closeConnection();

        return $lista;
    }

/*
//  metoda za promjenu podataka
public function promijeni_u_bazi($nekretnina, $id) {
    
    $sql = "UPDATE nekretnine SET " .
            "naslov_oglasa = '$this->naziv_oglasa', " .
            "vlasnik = '$this->vlasnik', " .
            "vlasnik_email = '$this->email_vlasnika', " .
            "adresa = '$this->adresa', " .
            "velicina = '$this->velicina', " .
            "cijena = '$this->cijena', " .
            "razdoblje_od = '$this->pocetak_prodaje', " .
            "razdoblje_do = '$this->zavrsetak_prodaje', " .
            "specificni_podaci = '$this->ostali_podaci', " .
            "id_tipa_nekretnine_FK = '$this->kategorija', " .
            "id_zupanije_FK = '$this->id_zupanije' " .
            "WHERE id_nekretnine = '$id'";
            
    if ($rs = mysql_query($sql)) {
        return true;
    } else {
        die("Greška prilikom promjene podataka o nekretninu! " . mysql_error());
        return false;
    }

}
// <--
*/
}

?>