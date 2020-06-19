<?php 

class Pomak
{
    private static $initialized = false;

    private static function initialize()
    {
        if (self::$initialized)
            return;

        self::$initialized = true;
    }

    //  dodavanje u bazu
    public static function add($sati) {

        $b = new Database();
        $conn = $b->openConnection();

        // upit za broj zapisa
		$upit = "INSERT INTO pomak(Sati) VALUES(?)";

        $sql = $conn->prepare($upit);
        $sql->bind_param("i", $sati);

        $sql->execute();

        // zapiši koliko imam ukupno zapisa za traženi upit
        $br = $sql->affected_rows;

        $b->closeConnection();       
        
        if($br == 1)
            return true;

        return false;  
    }

    public static function get_pomak() {
        
        //self::initialize();

        $pomak = 0;

        $b = new Database();
        $conn = $b->openConnection();

        // upit za broj zapisa
		$upit = "SELECT Sati FROM pomak ORDER BY Id desc LIMIT 1";

        $sql = $conn->prepare($upit);

        $sql->execute();
        $rs = $sql->get_result();

        if($red = $rs->fetch_array(MYSQLI_NUM))
			$pomak = $red[0];

        $b->closeConnection();

        return $pomak;
    }

    public static function get_virtual_time() {
        
        //self::initialize();

        return time() + self::get_pomak() * 60 * 60; 
    }

    public static function get_virtual_time_with_param($time) {
        
        //self::initialize();

        return $time + self::get_pomak() * 60 * 60; 
    }

    public static function save_virtual_time() {

        //self::initialize();
		
		$url = "http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=json";

		if(! ($fp = fopen($url,'r'))) {
			echo "Problem: nije moguće otvoriti url: " . $url;
			exit;
		}
		
		$string = fread($fp, 10000);
        fclose($fp);
        
        $obj = json_decode($string);

		$sati = $obj->WebDiP->vrijeme->pomak->brojSati;
        
        return $sati;
	}	
  
}


?>