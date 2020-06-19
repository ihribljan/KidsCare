<?php

	include '../libs/MyDataAccess/Database.class.php';
	include '../models/DjecjiVrticiOcjeneModel.php';
	include '../models/TrenutniKorisnik.php';
	include '../models/DnevnikModel.php';
	include '../models/PomakModel.php';

	if(!empty($_GET['djecjiVrticiId']) && !empty($_GET['godina']) && !empty($_GET['mjesec']))
	{
		$djecjiVrticiId = filter_input(INPUT_GET , 'djecjiVrticiId', FILTER_SANITIZE_SPECIAL_CHARS);
		$godina = filter_input(INPUT_GET , 'godina', FILTER_SANITIZE_SPECIAL_CHARS);
		$mjesec = filter_input(INPUT_GET , 'mjesec', FILTER_SANITIZE_SPECIAL_CHARS);
		$trenutniKorisnik = filter_input(INPUT_GET, 'trenutniKorisnik', FILTER_SANITIZE_SPECIAL_CHARS);
		
		$oc = new DjecjiVrticiOcjene();

		// dohvati
		$povrat = $oc->get_ocjena($djecjiVrticiId, $godina, $mjesec);

		Dnevnik::add(15, $trenutniKorisnik, 'Dohvat ocjene za vrtić ' . $djecjiVrticiId . ' i mjesec ' . $mjesec);
		
		echo json_encode($povrat);
	}

	if(!empty($_POST['djecjiVrticiId']) && !empty($_POST['godina']) && !empty($_POST['mjesec']) && !empty($_POST['ocjena']))
	{
		$djecjiVrticiId = filter_input(INPUT_POST , 'djecjiVrticiId', FILTER_SANITIZE_SPECIAL_CHARS);
		$godina = filter_input(INPUT_POST , 'godina', FILTER_SANITIZE_SPECIAL_CHARS);
		$mjesec = filter_input(INPUT_POST , 'mjesec', FILTER_SANITIZE_SPECIAL_CHARS);
		$ocjena = filter_input(INPUT_POST , 'ocjena', FILTER_SANITIZE_SPECIAL_CHARS);
		$trenutniKorisnik = filter_input(INPUT_POST, 'trenutniKorisnik', FILTER_SANITIZE_SPECIAL_CHARS);
		$trenutniKorisnikId = filter_input(INPUT_POST, 'trenutniKorisnikId', FILTER_SANITIZE_SPECIAL_CHARS);
		
		$oc = new DjecjiVrticiOcjene();
		$povrat = false;

		// dohvati
		$trenutnaOcjena = $oc->get_ocjena($djecjiVrticiId, $godina, $mjesec);

		if($trenutnaOcjena == 0)
		{
			$povrat = $oc->addOcjena($godina, $mjesec, $trenutniKorisnikId, $djecjiVrticiId, $ocjena);
		}
		else
		{
			$povrat = $oc->updateOcjena($godina, $mjesec, $trenutniKorisnikId, $djecjiVrticiId, $ocjena);
		}

		Dnevnik::add(15, $trenutniKorisnik, 'Upis ocjene za vrtić ' . $djecjiVrticiId . ' i mjesec ' . $mjesec);
		
		echo json_encode($povrat);
	}

?>