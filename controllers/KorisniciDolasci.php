<?php

	include '../models/KorisniciJson.php';
	include '../models/TrenutniKorisnik.php';

	if(!empty($_POST['sort_polje']) && !empty($_POST['sort_tip']) && !empty($_POST['zapisa_po_stranici']) 
		&& !empty($_POST['godina']) && !empty($_POST['mjesec']))
	{
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
		$sort_polje = filter_input(INPUT_POST, 'sort_polje', FILTER_SANITIZE_SPECIAL_CHARS);
		$sort_tip = filter_input(INPUT_POST, 'sort_tip', FILTER_SANITIZE_SPECIAL_CHARS);
		$zapocni_sa_zapisom = filter_input(INPUT_POST, 'zapocni_sa_zapisom', FILTER_SANITIZE_SPECIAL_CHARS);
		$zapisa_po_stranici = filter_input(INPUT_POST, 'zapisa_po_stranici', FILTER_SANITIZE_SPECIAL_CHARS);
		$godina = filter_input(INPUT_POST, 'godina', FILTER_SANITIZE_SPECIAL_CHARS);
		$mjesec = filter_input(INPUT_POST, 'mjesec', FILTER_SANITIZE_SPECIAL_CHARS);
		
		// složi sort queryi
		$sort = trim($sort_polje) . ' ' . trim($sort_tip);
		
		$obj = new KorisniciJson();
		$obj = $obj->getAllDolasci($id, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici, $godina, $mjesec);
		echo json_encode($obj);
	}

?>