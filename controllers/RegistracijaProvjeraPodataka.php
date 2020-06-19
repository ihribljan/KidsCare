<?php

    include '../models/KorisniciJson.php';

    // email provjera
    if(isset($_POST["AJAXemail"]))
    {
        $AJAXemail = filter_input(INPUT_POST , 'AJAXemail', FILTER_SANITIZE_SPECIAL_CHARS);

        $k = new KorisniciJson();
        echo json_encode($k->kontrolaEmail($AJAXemail));
    }

    // username provjera
    if(isset($_POST["AJAXusername"]))
    {
        $AJAXusername = filter_input(INPUT_POST , 'AJAXusername', FILTER_SANITIZE_SPECIAL_CHARS);

        $k = new KorisniciJson();
        echo json_encode($k->kontrolaKorisnickoIme($AJAXusername));
    }


?>