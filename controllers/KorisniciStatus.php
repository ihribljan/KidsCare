<?php

	include '../libs/MyDataAccess/Database.class.php'; 
	include '../models/KorisniciModel.php';
	include '../models/TrenutniKorisnik.php';
	include '../models/DnevnikModel.php';
	include '../models/PomakModel.php';

	if(!empty($_POST['korisnickoIme']))
	{
		$korisnickoIme = filter_input(INPUT_POST , 'korisnickoIme', FILTER_SANITIZE_SPECIAL_CHARS);
		$trenutniKorisnik = filter_input(INPUT_POST , 'trenutniKorisnik', FILTER_SANITIZE_SPECIAL_CHARS);
		
		$k = new Korisnici();

		// dohvati status
		$stari_aktivan = $k->get_aktivan($korisnickoIme);

		$novi_aktivan;
		
		switch($stari_aktivan)
		{
			case 1: 
				$novi_aktivan = 0; 
				break;
			case 0: 
				$novi_aktivan = 1; 
				break;
		}

		// ažuriraj polje aktivan
		$k->updateAktivan($korisnickoIme, $novi_aktivan);

		Dnevnik::add(10, $trenutniKorisnik, 'Promjena statusa korisnika ' . $korisnickoIme . '. Nova vrijednost aktivan: ' . $novi_aktivan);

		// dohvati status
		$povrat_aktivan = $k->get_aktivan($korisnickoIme);
		
		echo json_encode($povrat_aktivan);
	}
?>