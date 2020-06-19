<?php 

class PrijaveZaUpis
{
    var $Id;
    var $Broj;
    var $Datum;
    var $Javni_Pozivi_Id;
    var $Korisnici_Id_Registrirani;
    var $Djecji_Vrtici_Id_Skupine;
    var $Prihvaceno;

    var $Javni_Poziv;
    var $Roditelj;
    var $Vrtic;

    // get all prijave za upise
    function getPrijaveZaUpise() {

        $lista = array();

        $b = new Database();
        $b->openConnection();

		$sql = "SELECT p.Broj, p.Datum, jp.Broj as 'Javni poziv', CONCAT(k.Ime, ' ', k.Prezime) as 'Roditelj', dv.Naziv as 'Vrtic', p.Prihvaceno
                FROM prijave_za_upise p
                JOIN javni_pozivi jp ON (p.Javni_Pozivi_Id = jp.Id)
                JOIN korisnici k ON (p.Korisnici_Id_Registrirani = k.Id)
                JOIN djecji_vrtici_skupine dvs ON (dvs.Id = p.Djecji_Vrtici_Skupine_Id)
                JOIN djecji_vrtici dv ON (dvs.Djecji_Vrtici_Id = dv.Id);";
                
        $rs = $b->selectQuery($sql);

        while($red = mysqli_fetch_array($rs))
        {
            $k = new PrijaveZaUpis();

            $k->Id = $red["Id"];
            $k->Broj = $red["Broj"];
            $k->Datum = $red["Datum"];
            $k->Javni_Poziv = $red["Javni_Poziv"];
            $k->Roditelj = $red["Roditelj"];
            $k->Vrtic = $red["Vrtic"];
            $k->Prihvaceno = $red["Prihvaceno"];
        }

        $b->closeConnection();

        return $k;
    }
    
}

?>