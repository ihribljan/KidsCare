<?php
    require 'libs/MySession/sesija.class.php';
    
    require("libs/Smarty/Smarty.class.php");
    $smarty = new Smarty();
    $smarty->template_dir='views/';
    $smarty->compile_dir='views/smarty/views_c/';
    $smarty->config_dir='views/smarty/configs/';
    $smarty->cache_dir='views/smarty/cache/';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/ihribljan.css">

        <title>Dječji vrtići</title>
    </head>
    <body>
        <header class="header">
            <div class="inner-header">
                <a href="#">
                    <h2 class="logo">KidsCare</h2>
                </a> 
                <nav class="navigation">
                    <ul class="list">
                        <li class="list-item"><a href="?pg=index">Početna</a></li>
                        <li class="list-item"><a href="?pg=djecjiVrtici">Dječji vrtići</a></li>
                        <li class="list-item"><a href="?pg=javniPozivi">Javni pozivi</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- preko get parametra, uključi stranicu koju trebam -->
        <?php
            $pg = $_GET['pg'];
            switch($pg)
            {
                case 'djecjiVrtici':
                    include 'controllers/DjecjiVrtici.php';
                    break;
                case 'javniPozivi':
                    include 'controllers/JavniPozivi.php';
                    break;
                case 'prijava':
                    include 'controllers/Prijava.php';
                    break;
                case 'registracija':
                    include 'controllers/Registracija.php';
                    break;
                default:
                    include 'controllers/Pocetna.php';
            }
        ?>

        <footer id="footer">
            <a href="#">
                <h3 class="autor"> O autoru </h3>
            </a> 
            <a href="#">
                <h3 class="dokumentacija"> Dokumentacija </h3>
            </a> 
        </footer>
    </body>
</html>

