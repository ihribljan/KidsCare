<?php

include '../libs/MyDataAccess/Database.class.php';
include '../models/DjecjiVrticiModel.php';
	
class DjecjiVrticiJson
{	
	var $ukupno_zapisa;
	
	var $lista = array();

	function getAll($sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
    {
		$object = new DjecjiVrticiJson();

        $b = new Database();
		$conn = $b->openConnection();
		
		// upit za broj zapisa
		$upit = "SELECT dv.Id, dv.Naziv, dv.Adresa, CONCAT(k.Ime, ' ', k.Prezime) AS 'Administrator', 
					CONCAT(kk.Ime, ' ', kk.Prezime) AS 'Moderator', dv.Kapacitet
				FROM djecji_vrtici dv
				JOIN korisnici k ON (dv.Korisnici_Id_Administrator = k.Id)
				JOIN korisnici kk ON (dv.Korisnici_Id_Moderator = kk.Id)";
		
		// sort
		$upit .= " ORDER BY $sort";

		// izvrši upit i upiši koliko ima rezultata
		$sql = $conn->prepare($upit);
		
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
		$sql->bind_param("ii", $zapisa_po_stranici, $zapocni_sa_zapisom);

		$sql->execute();
        $rs = $sql->get_result();
		
        while($red = $rs->fetch_array(MYSQLI_ASSOC))
        {
			$it = new DjecjiVrtici();
			$it->Id = $red["Id"];
            $it->Naziv = $red["Naziv"];
            $it->Adresa = $red["Adresa"];;
            $it->Administrator = $red["Administrator"];
            $it->Moderator = $red["Moderator"];
            $it->Kapacitet = $red["Kapacitet"];
            $object->lista[] = $it;
		}
		
		// za svaki vrtić u listi, dohvati prosječnu ocjenu
		foreach($object->lista as $vrtic)
		{
			//echo 'vrtić: ' . $vrtic->Id;
			$upit = "SELECT sum(Ocjena)/3 
					FROM ( SELECT Ocjena 
						FROM djecji_vrtici_ocjena 
						WHERE Djecji_Vrtici_Id = ? 
						ORDER BY Godina DESC, Mjesec DESC LIMIT 3 )
					AS sss";
				
			//echo $upit;
			//echo $vrtic->Id;

			// izvrši upit za paginaciju
			$sql = $conn->prepare($upit);
			
			// bindaj parametre
			$sql->bind_param("i", $vrtic->Id);

			$sql->execute();
			$rs = $sql->get_result();

			if($red = $rs->fetch_array(MYSQLI_NUM))
				$vrtic->Prosjecna_Ocjena = $red[0];
		}

		$sql->close();
        $conn->close();
		
        return $object;
	}	
	
	function getAllRacuni($sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
    {
		$object = new DjecjiVrticiJson();

        $b = new Database();
		$conn = $b->openConnection();
		
		// upit za broj zapisa
        $upit = "SELECT dv.Naziv, COUNT(d.Id) AS 'Broj_Djece',
                COUNT(r.Id) AS 'Ukupno_Racuna', SUM(r.Placeno) AS 'Placeni_Racuni', (COUNT(r.Id) - SUM(r.Placeno)) AS 'Neplaceni_Racuni'
                FROM dijete d
                JOIN djecji_vrtici_skupine ds ON (d.Djecji_Vrtici_Skupine_Id = ds.Id)
                JOIN djecji_vrtici dv ON (dv.Id = ds.Djecji_Vrtici_Id)
                JOIN racuni r ON (r.Djecji_Vrtici_Id = dv.Id)
                GROUP BY 1";
		
		// sort
		$upit .= " ORDER BY $sort";

		//echo $upit;

		// izvrši upit i upiši koliko ima rezultata
		$sql = $conn->prepare($upit);
		
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
		$sql->bind_param("ii", $zapisa_po_stranici, $zapocni_sa_zapisom);

		$sql->execute();
        $rs = $sql->get_result();
		
        while($red = $rs->fetch_array(MYSQLI_ASSOC))
        {
			$it = new DjecjiVrtici();
			$it->Naziv = $red["Naziv"];
            $it->Broj_Djece = $red["Broj_Djece"];
            $it->Ukupno_Racuna = $red["Ukupno_Racuna"];
            $it->Placeni_Racuni = $red["Placeni_Racuni"];
            $it->Neplaceni_Racuni = $red["Neplaceni_Racuni"];
            $object->lista[] = $it;
		}
		
		$sql->close();
        $conn->close();
		
        return $object;
    }	
}
?>