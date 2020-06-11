<?php

    include 'models/JavniPoziviModel.php';

    $poziv = new JavniPozivi();
    $lista = $poziv->getAll();

    $smarty->assign('lista', $lista);

    $smarty->display('JavniPozivi.tpl');

?>