<?php

    include 'models/DjecjiVrticiModel.php';

    $vrtic = new DjecjiVrtici();
    $lista = $vrtic->getAll();

    $smarty->assign('lista', $lista);

    $smarty->display('DjecjiVrtici.tpl');

?>