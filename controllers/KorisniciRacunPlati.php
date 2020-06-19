<?php

	include '../libs/MyDataAccess/Database.class.php'; 
	include '../models/TrenutniKorisnik.php';
	include '../models/DnevnikModel.php';
	include '../models/PomakModel.php';

	if(!empty($_POST['idRacuna']))
	{
		$idRacuna = filter_input(INPUT_POST , 'idRacuna', FILTER_SANITIZE_SPECIAL_CHARS);
		$korisnickoIme = filter_input(INPUT_POST , 'korisnickoIme', FILTER_SANITIZE_SPECIAL_CHARS);
		
		$r = new Racuni();

		// dohvati status
		$stari_placeno = $r->getPlaceno($idRacuna);

		$novi_placeno;
		
		switch($stari_placeno)
		{
			case 1: 
				$novi_placeno = 0; 
				break;
			case 0: 
				$novi_placeno = 1; 
				break;
		}

		// ažuriraj polje aktivan
		$r->updatePlaceno($idRacuna);

		Dnevnik::add(14, $korisnickoIme, 'Plaćen račun br:  ' . $idRacuna);

		// dohvati status
		$povrat_placeno = $r->getPlaceno($idRacuna);
		
		echo json_encode($povrat_placeno);
	}
?>