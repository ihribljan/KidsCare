<?php

	include '../models/KorisniciJson.php';

	if(!empty($_POST['sort_polje']) && !empty($_POST['sort_tip']) && !empty($_POST['zapisa_po_stranici']))
	{
		$pojam = filter_input(INPUT_POST , 'val', FILTER_SANITIZE_SPECIAL_CHARS);
		$sort_polje = filter_input(INPUT_POST, 'sort_polje', FILTER_SANITIZE_SPECIAL_CHARS);
		$sort_tip = filter_input(INPUT_POST, 'sort_tip', FILTER_SANITIZE_SPECIAL_CHARS);
		$zapocni_sa_zapisom = filter_input(INPUT_POST, 'zapocni_sa_zapisom', FILTER_SANITIZE_SPECIAL_CHARS);
		$zapisa_po_stranici = filter_input(INPUT_POST, 'zapisa_po_stranici', FILTER_SANITIZE_SPECIAL_CHARS);
		
		// složi sort queryi
		$sort = trim($sort_polje) . ' ' . trim($sort_tip);
		
		$obj = new KorisniciJson();

		$pretrazujem = false;
		
		// ako pojam nije prazan
		if($pojam != '' && $pojam != null)
		{
			$pretrazujem = true;
			
			// onda mu dodaj like % znakove
			$pojam = '%' . $pojam . '%';
		}
		else
		{
			// upiši u pojam null, pa će izostaviti u upitu where dio
			$pojam = null;
		}
		
		$obj = $obj->getAll($pojam, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici);
		
		echo json_encode($obj);
	}
?>