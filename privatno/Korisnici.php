<?php

    include '../libs/MyDataAccess/Database.class.php';
    include '../models/KorisniciModel.php';

    $b = new Database();
    $b -> openConnection();

    $lista = array();

    $sql = "SELECT * from korisnici";

    $rs = $b -> selectQuery($sql);
    while($red = mysqli_fetch_array($rs)) {
        $it = new Korisnici();

        $it->Ime = $red["Ime"];
        $it->Prezime = $red["Prezime"];
        $it->Korisnicko_Ime = $red["Korisnicko_Ime"];
        $it->Tipovi_Korisnika_Id = $red["Tipovi_Korisnika_Id"];
        $it->Lozinka = $red["Lozinka"];
        $it->Email = $red["Email"];

        $lista[] = $it;
    }

    $b -> closeConnection();

    echo '<table>';
    foreach($lista as $it)
    {
        echo '<tr>';
        echo '<td>' . $it->Korisnicko_Ime . " " . $it->Lozinka . " " . $it->Ime . " " . $it->Prezime . " " . $it->Email . '</td>';
        echo '</tr>';
    }
    echo '</table>';

?>