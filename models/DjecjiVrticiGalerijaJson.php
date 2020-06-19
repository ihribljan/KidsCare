<?php

include '../libs/MyDataAccess/Database.class.php';
include '../models/DjecjiVrticiGalerijaModel.php';
	
class DjecjiVrticiGalerijaJson
{	
	var $ukupno_zapisa;
	
	var $lista = array();

	function getAll($val, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
    {
		$object = new DjecjiVrticiGalerijaJson();

        $b = new Database();
		$conn = $b->openConnection();
		
		// upit za broj zapisa
		$upit = "SELECT u.Id, u.Broj, u.Prijave_Za_Upise_Id, u.Ime, u.Prezime, u.Godina_Rodenja, u.Spol, u.Slika, u.Potvrda
			FROM upisi u
			inner join prijave_za_upise p ON (p.id = u.Prijave_Za_Upise_Id)
			inner join djecji_vrtici_skupine s ON (s.Id = p.Djecji_Vrtici_Skupine_Id)
			WHERE s.Djecji_Vrtici_Id = ?";
		
		// sort
		$upit .= " ORDER BY $sort";

		// izvrši upit i upiši koliko ima rezultata
		$sql = $conn->prepare($upit);

		$sql->bind_param("i", $val);
		
		$sql->execute();
        $rs = $sql->get_result();
		
		// zapiši koliko imam ukupno zapisa za traženi upit
		$object->ukupno_zapisa = $rs->num_rows;
		
		
		/*** paginacija i dohvat zapisa ***/
		
		// nadodaj na već definirani string upit (koji je korišten za brojanje zapisa) dio za trenutnu paginaciju
		$upit .= " LIMIT ? OFFSET ?";
				
		// izvrši upit za paginaciju
		$sql = $conn->prepare($upit);
		
		// bindaj parametre
		$sql->bind_param("iii", $val, $zapisa_po_stranici, $zapocni_sa_zapisom);

		$sql->execute();
        $rs = $sql->get_result();
		
        while($red = $rs->fetch_array(MYSQLI_ASSOC))
        {
			$it = new DjecjiVrticiGalerija();
			$it->Id = $red["Id"];
            $it->Ime = $red["Ime"];
            $it->Prezime = $red["Prezime"];;
            $it->Godina_Rodenja = $red["Godina_Rodenja"];
            $it->Spol = $red["Spol"];
			$it->Slika = $red["Slika"];
			$it->Potvrda = $red["Potvrda"];
			$object->lista[] = $it;
		}
		
		$sql->close();
        $conn->close();
		
        return $object;
    }	
}
?>