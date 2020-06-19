<?php

include '../libs/MyDataAccess/Database.class.php'; 
include '../models/JavniPoziviModel.php';
	
class JavniPoziviJson
{	
	var $ukupno_zapisa;
	
	var $lista = array();

	function getAll($pojam, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
    {
		$object = new JavniPoziviJson();

        $b = new Database();
        $conn = $b->openConnection();
		
		// upit za broj zapisa
		$upit = "SELECT jp.Broj, jp.Datum, jp.Datum_Od, jp.Datum_Do, CONCAT(k.Ime, ' ', k.Prezime) AS 'Moderator', jp.Broj_Mjesta, dv.Naziv AS 'Dječji vrtić'
				   FROM javni_pozivi jp 
				   JOIN djecji_vrtici dv ON (jp.Djecji_Vrtici_Id = dv.Id)
				   JOIN korisnici k ON (jp.Korisnici_Id_Moderator = k.Id)";
		
		// ako pretražujem dodaj where
		if($pojam != null)
			$upit .= " WHERE dv.Naziv like ?";
			
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
            $it = new JavniPozivi();
            $it->Broj = $red["Broj"];
            $it->Datum = $red["Datum"];;
            $it->Datum_Od = $red["Datum_Od"];
            $it->Datum_Do = $red["Datum_Do"];
            $it->Moderator = $red["Moderator"];
            $it->Broj_Mjesta = $red["Broj_Mjesta"];
            $it->Vrtic = $red["Dječji vrtić"];
			
            $object->lista[] = $it;
        }

		$sql->close();
        $conn->close();
		
        return $object;
    }	
}
?>