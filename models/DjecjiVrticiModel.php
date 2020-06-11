<?php 

include 'libs/MyDataAccess/Database.class.php';

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

/*
// metoda za preuzimanje podataka sa forme
public function uzmi_podatke($a_naziv_oglasa, $a_kategorija, $a_adresa, $a_id_zupanije, $a_velicina, $a_cijena, $a_pocetak_prodaje, $a_zavrsetak_prodaje, $a_vlasnik, $a_email_vlasnika, $a_ostali_podaci, $a_korisnik) {
    $this->naziv_oglasa = $a_naziv_oglasa;
    $this->kategorija = $a_kategorija;
    $this->adresa = $a_adresa;
    $this->id_zupanije = $a_id_zupanije;
    $this->velicina = $a_velicina;
    $this->cijena = $a_cijena;
    $this->pocetak_prodaje = $a_pocetak_prodaje;
    $this->zavrsetak_prodaje = $a_zavrsetak_prodaje;
    $this->vlasnik = $a_vlasnik;
    $this->email_vlasnika = $a_email_vlasnika;
    $this->ostali_podaci = $a_ostali_podaci;
    $this->ostali_podaci = $a_ostali_podaci;
    $this->korisnik = $a_korisnik;
}

//  metoda za dodavanje u bazu

public function dodaj_u_bazu($nekretnina) {
    
    $sql = "INSERT INTO nekretnine SET " .
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
            "id_zupanije_FK = '$this->id_zupanije', " .
            "korisnik_FK = '$this->korisnik'";
            
    if ($rs = mysql_query($sql)) {
        return true;
    } else {
        die("Greška prilikom dodavanja korisnika u bazu! " . mysql_error());
        return false;
    }

}

// get po id-u
    public function get($id)
    {
        $b = new Database();
        $b->openConnection();
        
        $sql = "SELECT * FROM djecji_vrtici WHERE id = '$id'";
        $rs = $b->selectQuery($sql);

        $red = mysqli_fetch_array($rs);
        $this->Id = $red["Id"];
        $this->Naziv = $red["Naziv"];
        $this->Adresa = $red["Adresa"];;
        $this->Korisnici_Id_Administrator = $red["Korisnici_Id_Administrator"];
        $this->Korisnici_Id_Moderator = $red["Korisnici_Id_Moderator"];
        $this->Kapacitet = $red["Kapacitet"];

        $b->closeConnection();

        return $this;
    } 
*/
    public function getAll()
    {
        $b = new Database();
        $b->openConnection();

        $lista = array();
        
        $sql = "SELECT dv.Id, dv.Naziv, dv.Adresa, CONCAT(k.Ime, ' ', k.Prezime) AS 'Administrator', 
                CONCAT(kk.Ime, ' ', kk.Prezime) AS 'Moderator', dv.Kapacitet, AVG(dvo.Ocjena) AS 'Prosjecna_Ocjena'
                FROM djecji_vrtici dv
                JOIN korisnici k
                ON dv.Korisnici_Id_Administrator = k.Id
                JOIN korisnici kk
                ON dv.Korisnici_Id_Moderator = kk.Id
                JOIN djecji_vrtici_ocjena dvo
                ON dvo.Djecji_Vrtici_Id = dv.Id
                GROUP BY 2
                ORDER BY dv.Id ASC";

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

}*/

}

?>