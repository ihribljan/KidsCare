<?php

class Database {

    const server = "localhost";

    // barka
    /*const username = "WebDiP2019x047";
    const password = "admin_D9db";
    const dbname = "WebDiP2019x047";*/

    // lokalno
    const username = "root";
    const password = "";
    const dbname = "WebDiP2019x047";

    private $connection = null;
    private $error = '';

    function openConnection() {
        $this->connection = new mysqli(self::server, self::username, self::password, self::dbname);
        if ($this->connection->connect_errno) {
            echo "Neuspješno spajanje na bazu: " . $this->connection->connect_errno . ", " .
            $this->connection->connect_error;
            $this->error = $this->connection->connect_error;
        }
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno) {
            echo "Neuspješno postavljanje znakova za bazu: " . $this->connection->connect_errno . ", " .
            $this->connection->connect_error;
            $this->error = $this->connection->connect_error;
        }
        return $this->connection;
    }

    function closeConnection() {
        $this->connection->close();
    }

    function selectQuery($upit) {
        $rezultat = $this->connection->query($upit);
        if ($this->connection->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->connection->connect_errno . ", " .
            $this->connection->connect_error;
            $this->error = $this->connection->connect_error;
        }
        if (!$rezultat) {
            $rezultat = null;
        }
        return $rezultat;
    }

    function updateQuery($upit, $skripta = '') {
        $rezultat = $this->connection->query($upit);
        if ($this->connection->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->connection->connect_errno . ", " .
            $this->connection->connect_error;
            $this->error = $this->connection->connect_error;
        } else {
            if ($skripta != '') {
                header("Lokacija: $skripta");
            }
        }

        return $rezultat;
    }
    
    function poerrorDB() {
        if ($this->error != '') {
            return true;
        } else {
            return false;
        }
    }
}

?>