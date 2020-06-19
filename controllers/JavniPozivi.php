<?php

    include 'models/JavniPoziviModel.php';

    $smarty->assign('stranicenje_broj_stranica', PostavkeSustava::$Stranicenje_Broj_Stranica);
    $smarty->display('JavniPozivi.tpl');

?>