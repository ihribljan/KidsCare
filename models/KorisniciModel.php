<?php 

class Korisnici
{
    var $Id;
    var $Ime;
    var $Prezime;
    var $Godina_Rodenja;
    var $Tipovi_Korisnika_Id;
    var $Korisnicko_Ime;
    var $Lozinka;
    var $Lozinka_Sha;
    var $Email;
    var $Potvrda_Registracija;
    var $Token;
    var $Aktivan;
    var $Broj_Pogresnih_Prijava;

    var $ImePrezime;

    //get all korisnici
    public function getAll()
    {
        $lista = array();

        $b = new Database();
        $b->openConnection();

        $sql = "SELECT * from korisnici ORDER BY id asc";

        $rs = $b->selectQuery($sql);
    
        if($red = mysqli_fetch_array($rs))
        {
            $k = new Korisnici();

            $k->Id = $red["Id"];
            $k->Ime = $red["Ime"];
            $k->Prezime = $red["Prezime"];
            $k->Tipovi_Korisnika_Id = $red["Tipovi_Korisnika_Id"];
            $k->Korisnicko_Ime = $red["Korisnicko_Ime"];
            $k->Email = $red["Email"];
            $k->Aktivan = $red["Aktivan"];
            $lista[] = $k;
        }

        $b->closeConnection();

        return $lista;
    }

    //  dodavanje u bazu
    public function add($korisnik, $token) {
        
        $b = new Database();
        $b->openConnection();

        // token
        $korisnik->Token = $token;

        $sql = "INSERT INTO korisnici SET " .
                "Ime = '$korisnik->Ime', " .
                "Prezime = '$korisnik->Prezime', " .
                "Godina_Rodenja = '$korisnik->Godina_Rodenja', " .
                "Tipovi_Korisnika_Id = 3, " .
                "Korisnicko_Ime = '$korisnik->Korisnicko_Ime', " .
                "Lozinka = '$korisnik->Lozinka', " .
                "Lozinka_Sha = '$korisnik->Lozinka_Sha', " .
                "Email = '$korisnik->Email', " .
                "Token = '$korisnik->Token', " .
                "Potvrda_Registracije = 0, Aktivan = 0, Broj_Pogresnih_Prijava = 0";

        if($b->updateQuery($sql)) {
           
            //pošalji mail
            $primatelj = $korisnik->Email;
            $naslov = "KidsCare | AKTIVACIJA RAČUNA";
			$poruka = "Za aktivaciju korisničkog računa potrebno je kliknuti na sljedeći link: http://barka.foi.hr/WebDiP/2019_projekti/WebDiP2019x047/index.php?pg=aktivacija&korisnik=" . $korisnik->Korisnicko_Ime . "&token=" . $korisnik->Token;
			$headers = "From: admin@localhost.com\r\n";
			$headers .= "Content-Type: text/plain;charset=utf-8\r\n";
			mail($primatelj, $naslov, $poruka, $headers);	
           
            $b->closeConnection();
            return true;
        } else {
            die("Greška prilikom dodavanja korisnika u bazu! " . mysql_error());
            $b->closeConnection();
            return false;
        }
    }

    public function validiraj($username, $password)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "SELECT COUNT(1) 
                FROM korisnici 
                WHERE Korisnicko_Ime = '$username' AND Lozinka_Sha = '$password'";

        $rs = $b->selectQuery($sql);

        $red = mysqli_fetch_array($rs);
        $rowcount = $red[0];

        $b->closeConnection();

        return $rowcount;
    } 

    // vrati broj usernamea iz baze (ako postoji 1, ako ne 0)
    public function countByUsername($username)
    {
        $b = new Database();
        $b->openConnection();
        
        $sql = "SELECT COUNT(1) 
                FROM korisnici 
                WHERE Korisnicko_Ime = '$username'";

        $rs = $b->selectQuery($sql);

        $red = mysqli_fetch_array($rs);
        $rowcount = $red[0];

        $b->closeConnection();

        return $rowcount;
    } 

    // vrati broj emaila iz baze (ako postoji 1, ako ne 0)
    public function countByEmail($email)
    {
        $b = new Database();
        $b->openConnection();
        
        $sql = "SELECT COUNT(1) 
                FROM korisnici 
                WHERE Email = '$email'";

        $rs = $b->selectQuery($sql);

        $red = mysqli_fetch_array($rs);
        $rowcount = $red[0];

        $b->closeConnection();

        return $rowcount;
    } 


    public function getData($Korisnicko_Ime)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "SELECT * from korisnici where Korisnicko_Ime = '$Korisnicko_Ime'";

        $rs = $b->selectQuery($sql);
    
        if($red = mysqli_fetch_array($rs))
        {
            $k = new Korisnici();

            $k->Ime = $red["Ime"];
            $k->Prezime = $red["Prezime"];
            $k->Tipovi_Korisnika_Id = $red["Tipovi_Korisnika_Id"];
            $k->Korisnicko_Ime = $red["Korisnicko_Ime"];
            $k->Lozinka = $red["Lozinka"];
            $k->Lozinka_Sha = $red["Lozinka_Sha"];
            $k->Email = $red["Email"];
            $k->Godina_Rodenja = $red["Godina_Rodenja"];
            $k->Potvrda_Registracije = $red["Potvrda_Registracije"];
            $k->Token = $red["Token"];
            $k->Aktivan = $red["Aktivan"];
        }

        $b->closeConnection();

        return $k;
    }

    public function updateStatus($Potvrda_Registracije, $Aktivan)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE korisnici set Potvrda_Registracije = $Potvrda_Registracije, Aktivan = $Aktivan where Korisnicko_Ime = '$this->Korisnicko_Ime'";

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }

    public function updateAktivan($korisnickoIme, $aktivan)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE korisnici set Aktivan = $aktivan where Korisnicko_Ime = '$korisnickoIme'";

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }

    public function updatePogresnePrijave($Korisnicko_Ime)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE korisnici set Broj_Pogresnih_Prijava = Broj_Pogresnih_Prijava+1 where Korisnicko_Ime = '$Korisnicko_Ime'";

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }

    public function updatePogresnePrijaveResetiraj($Korisnicko_Ime)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE korisnici set Broj_Pogresnih_Prijava = 0 where Korisnicko_Ime = '$Korisnicko_Ime'";

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }

    public function update_lozinka($Korisnicko_Ime, $Lozinka, $Lozinka_Sha)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE korisnici set Lozinka = '$Lozinka', Lozinka_Sha = '$Lozinka_Sha' where Korisnicko_Ime = '$Korisnicko_Ime'";

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }

    public function update_aktivan($Korisnicko_Ime, $aktivan)
    {
        $b = new Database();
        $b->openConnection();

        $sql = "UPDATE korisnici set Aktivan = $aktivan where Korisnicko_Ime = '$Korisnicko_Ime'";

        $status = $b->updateQuery($sql);
            
        $b->closeConnection();

        return $status;
    }

    // metoda za dohvat uloge
	function get_uloga() {

        $uloga = 0;

        $b = new Database();
        $b->openConnection();

		$sql = "SELECT Korisnicko_Ime, Tipovi_Korisnika_Id 
        FROM korisnici 
        WHERE Korisnicko_Ime = '$this->Korisnicko_Ime'";

        $rs = $b->selectQuery($sql);

        if($red = mysqli_fetch_array($rs))
            $uloga = $red["Tipovi_Korisnika_Id"];

        $b->closeConnection();

        return $uloga;
    }
    
    function get_id() {

        $id = 0;

        $b = new Database();
        $b->openConnection();

		$sql = "SELECT Id, Korisnicko_Ime, Tipovi_Korisnika_Id 
        FROM korisnici 
        WHERE Korisnicko_Ime = '$this->Korisnicko_Ime'";

        $rs = $b->selectQuery($sql);

        if($red = mysqli_fetch_array($rs))
            $id = $red["Id"];

        $b->closeConnection();

        return $id;
	}

    function get_aktivan($Korisnicko_Ime) {

        $aktivan = 0;

        $b = new Database();
        $b->openConnection();

		$sql = "SELECT Korisnicko_Ime, Aktivan 
                FROM korisnici 
                WHERE Korisnicko_Ime = '$Korisnicko_Ime'";

        $rs = $b->selectQuery($sql);

        if($red = mysqli_fetch_array($rs))
            $aktivan = $red["Aktivan"];

        $b->closeConnection();

        return $aktivan;
	}

    function get_broj_pogresnih_prijava($Korisnicko_Ime) {

        $Broj_Pogresnih_Prijava = 0;

        $b = new Database();
        $b->openConnection();

		$sql = "SELECT Korisnicko_Ime, Broj_Pogresnih_Prijava 
        FROM korisnici 
        WHERE Korisnicko_Ime = '$Korisnicko_Ime'";

        $rs = $b->selectQuery($sql);

        if($red = mysqli_fetch_array($rs))
            $Broj_Pogresnih_Prijava = $red["Broj_Pogresnih_Prijava"];

        $b->closeConnection();

        return $Broj_Pogresnih_Prijava;
    }
    
    // get ime i prezime moderatora koji nema vrtić
    public function getSlobodniModeratori()
    {
        $lista = array();

        $b = new Database();
        $b->openConnection();

        $upit = "SELECT k.Id, k.Ime, k.Prezime, concat(k.Ime, ' ', k.Prezime) as ImePrezime
                FROM korisnici k
                LEFT JOIN djecji_vrtici d ON (k.Id = d.Korisnici_Id_Moderator)
                WHERE k.Tipovi_Korisnika_Id = 2
                    AND d.Korisnici_Id_Moderator IS NULL";

        $rs = $b->selectQuery($upit);
    
        while($red = mysqli_fetch_array($rs))
        {
            $k = new Korisnici();

            $k->Id = $red["Id"];
            $k->Ime = $red["Ime"];
            $k->Prezime = $red["Prezime"];
            $k->ImePrezime = $red["ImePrezime"];

            $lista[] = $k;
        }

        $b->closeConnection();

        return $lista;
    }
}

?>