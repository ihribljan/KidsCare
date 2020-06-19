<?php

include '../libs/MyDataAccess/Database.class.php';
include '../models/RacuniModel.php';
	
class JavniPoziviJson
{	
	var $ukupno_zapisa;
	
	var $lista = array();

	function getAll($pojam, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
    {
		$object = new RacuniModel();

        $b = new Database();
        $conn = $b->openConnection();
		
		// upit za broj zapisa
		$upit = "SELECT r.Datum, dv.Naziv, CONCAT(d.Ime, ' ', d.Prezime) AS 'Dijete', r.Iznos, r.Placeno 
				FROM racuni r JOIN djecji_vrtici dv ON (r.Djecji_Vrtici_Id = dv.Id) 
				JOIN dijete d ON (r.Dijete_Id = d.Id)";
		
		// ako pretražujem dodaj where
		if($pojam != null)
			$upit .= " WHERE dv.Korisnici_Id_Registrirani like ?";
			
		// sort
		$upit .= " ORDER BY $sort";
	
		// izvrši upit i upiši koliko ima rezultata
		$sql = $conn->prepare($upit);
		
		// ako pretražujem, bindaj pojam
		if($pojam != null)
			$sql->bind_param("s", $pojam);
		
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
		if($pojam != null)
			$sql->bind_param("sii", $pojam, $zapisa_po_stranici, $zapocni_sa_zapisom);
		else
			$sql->bind_param("ii", $zapisa_po_stranici, $zapocni_sa_zapisom);
		
		$sql->execute();
        $rs = $sql->get_result();
		
        while($red = $rs->fetch_array(MYSQLI_ASSOC))
        {
            $it = new Racuni();
            $it->Datum = $red["Datum"];
            $it->Naziv = $red["Naziv"];;
            $it->Dijete = $red["Dijete"];
            $it->Iznos = $red["Iznos"];
            $it->Placeno = $red["Placeno"];
			
            $object->lista[] = $it;
        }

		$sql->close();
        $conn->close();
		
        return $object;
    }	
}
?>