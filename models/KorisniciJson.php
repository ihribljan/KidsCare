<?php

    include '../libs/MyDataAccess/Database.class.php';
    include '../models/KorisniciModel.php';

    class KorisniciJson
    {
        var $broj;

        // email provjera
        function kontrolaEmail($AJAXemail)
        {
            $korisnici = new Korisnici();
            $this->broj = $korisnici->countByEmail($AJAXemail);
            return $this;
        }

        // username provjera
        function kontrolaKorisnickoIme($AJAXusername)
        {
            $korisnici = new Korisnici();
            $this->broj = $korisnici->countByUsername($AJAXusername);
            return $this;
        }

        var $ukupno_zapisa;
        
        var $lista = array();

        function getAll($pojam, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
        {
            $object = new KorisniciJson();

            $b = new Database();
            $conn = $b->openConnection();
            
            // upit za broj zapisa
            $upit = "SELECT Id, Ime, Prezime, Korisnicko_Ime, Email, Godina_Rodenja, Tipovi_Korisnika_Id, Aktivan
                    FROM korisnici";
            
            // ako pretražujem dodaj where
            if($pojam != null)
                $upit .= " WHERE Korisnicko_Ime like ?";
                
            // sort
            $upit .= " ORDER BY $sort";
        
            // izvrši upit i upiši koliko ima rezultata
            $sql = $conn->prepare($upit);
            
            // ako pretražujem, bindaj pojam
            if($pojam != null)
                $sql->bind_param("s", $pojam);
            
            $sql->execute();
            $rs = $sql->get_result();
            
            // zapiši koliko imam ukupno zapisa za traženi upit
            $object->ukupno_zapisa = $rs->num_rows;
            
            /*** paginacija i dohvat zapisa ***/
            
            // nadodaj na već definirani string upit (koji je korišten za brojanje zapisa) dio za trenutnu paginaciju
            $upit .= " LIMIT ? OFFSET ?";
                    
            // izvrši upit za paginaciju
            $sql = $conn->prepare($upit);
            
            // bindaj parametre
            if($pojam != null)
                $sql->bind_param("sii", $pojam, $zapisa_po_stranici, $zapocni_sa_zapisom);
            else
                $sql->bind_param("ii", $zapisa_po_stranici, $zapocni_sa_zapisom);
            
            $sql->execute();
            $rs = $sql->get_result();
            
            while($red = $rs->fetch_array(MYSQLI_ASSOC))
            {
                $it = new Korisnici();
                $it->Id = $red["Id"];
                $it->Ime = $red["Ime"];;
                $it->Prezime = $red["Prezime"];
                $it->Korisnicko_Ime = $red["Korisnicko_Ime"];
                $it->Email = $red["Email"];
                $it->Tipovi_Korisnika_Id = $red["Tipovi_Korisnika_Id"];
                $it->Godina_Rodenja = $red["Godina_Rodenja"];
                $it->Aktivan = $red["Aktivan"];
                
                $object->lista[] = $it;
            }

            $sql->close();
            $conn->close();
            
            return $object;
        }	

        // get račune djeteta za prijavljenog korisnika ako je tip 3
        function getAllRacuni($korisnik, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
        {
            require('../models/RacuniModel.php');

            $object = new KorisniciJson();

            $b = new Database();
            $conn = $b->openConnection();
                    
            // upit za broj zapisa
            $upit = "SELECT r.Id, r.Datum, dv.Naziv, CONCAT(k.Ime, ' ', k.Prezime) as 'Roditelj', CONCAT(d.Ime, ' ', d.Prezime) as 'Dijete', r.Iznos, r.Placeno FROM racuni r
                    JOIN djecji_vrtici dv ON (r.Djecji_Vrtici_Id = dv.Id)
                    JOIN dijete d ON (r.Dijete_Id = d.Id)
                    JOIN korisnici k ON (k.Id = r.Korisnici_Id_Registrirani)
                    WHERE r.Korisnici_Id_Registrirani = ?";
                
            // sort
            $upit .= " ORDER BY $sort";
        
            // izvrši upit i upiši koliko ima rezultata
            $sql = $conn->prepare($upit);
            
            // ako pretražujem, bindaj pojam
            if($korisnik != null)
                $sql->bind_param("i", $korisnik);
            
            $sql->execute();
            $rs = $sql->get_result();
            
            // zapiši koliko imam ukupno zapisa za traženi upit
            $object->ukupno_zapisa = $rs->num_rows;
            
            /*** paginacija i dohvat zapisa ***/
            
            // nadodaj na već definirani string upit (koji je korišten za brojanje zapisa) dio za trenutnu paginaciju
            $upit .= " LIMIT ? OFFSET ?";
                    
            // izvrši upit za paginaciju
            $sql = $conn->prepare($upit);
            
            // bindaj parametre
            if($korisnik != null)
                $sql->bind_param("iii", $korisnik, $zapisa_po_stranici, $zapocni_sa_zapisom);
            else
                $sql->bind_param("ii", $zapisa_po_stranici, $zapocni_sa_zapisom);
            
            $sql->execute();
            $rs = $sql->get_result();
            
            while($red = $rs->fetch_array(MYSQLI_ASSOC))
            {
                $it = new Racuni();
                $it->Id = $red["Id"];
                $it->Datum = $red["Datum"];
                $it->Naziv = $red["Naziv"];
                $it->Roditelj = $red["Roditelj"];
                $it->Dijete = $red["Dijete"];
                $it->Iznos = $red["Iznos"];
                $it->Placeno = $red["Placeno"];
                
                $object->lista[] = $it;
            }

            $sql->close();
            $conn->close();
            
            return $object;
        }	

         // get dolasci djeteta u vrtić
         function getAllDolasci($id, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici, $godina, $mjesec)
         {
             require('../models/DolasciModel.php');
             require('../models/RacuniModel.php');
 
             $object = new KorisniciJson();
 
             $b = new Database();
             $conn = $b->openConnection();
                     
             // upit za broj zapisa
             $upit = "SELECT CONCAT(d.Ime, ' ', d.Prezime) as 'Dijete', dv.Naziv, dd.Datum
                    FROM dijete_dolazak dd
                    JOIN djecji_vrtici dv ON (dd.Djecji_Vrtici_Id = dv.Id)
                    JOIN dijete d ON (d.Id = dd.Dijete_Id)
                    WHERE d.Korisnici_Id_Registrirani = ?
                        and YEAR(dd.Datum) = ?
                        and MONTH(dd.Datum) = ?";
                 
             // sort
             $upit .= " ORDER BY $sort";
         
             // izvrši upit i upiši koliko ima rezultata
             $sql = $conn->prepare($upit);
             
             // ako pretražujem, bindaj pojam
             if($id != null)
                 $sql->bind_param("iii", $id, $godina, $mjesec);
             
             $sql->execute();
             $rs = $sql->get_result();
             
             // zapiši koliko imam ukupno zapisa za traženi upit
             $object->ukupno_zapisa = $rs->num_rows;
             
             /*** paginacija i dohvat zapisa ***/
             
             // nadodaj na već definirani string upit (koji je korišten za brojanje zapisa) dio za trenutnu paginaciju
             $upit .= " LIMIT ? OFFSET ?";
                     
             // izvrši upit za paginaciju
             $sql = $conn->prepare($upit);
             
             // bindaj parametre
             if($id != null)
                 $sql->bind_param("iiiii", $id, $godina, $mjesec, $zapisa_po_stranici, $zapocni_sa_zapisom);
             else
                 $sql->bind_param("iiii", $godina, $mjesec, $zapisa_po_stranici, $zapocni_sa_zapisom);
             
             $sql->execute();
             $rs = $sql->get_result();
             
             while($red = $rs->fetch_array(MYSQLI_ASSOC))
             {
                 $it = new Racuni();

                 $it->Datum = $red["Datum"];
                 $it->Naziv = $red["Naziv"];
                 $it->Dijete = $red["Dijete"];
                 
                 $object->lista[] = $it;
             }
 
             $sql->close();
             $conn->close();
             
             return $object;
         }	

        // get popis prijava za upise  
        function getAllPopisPrijavaZaUpise($id, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
        {
            require('../models/PrijaveZaUpisModel.php');

            $object = new KorisniciJson();

            $b = new Database();
            $conn = $b->openConnection();
                    
            // upit za broj zapisa
            $upit = "SELECT p.Broj, p.Datum, jp.Broj as 'Javni_Poziv', CONCAT(k.Ime, ' ', k.Prezime) as 'Roditelj', dv.Naziv as 'Vrtic', p.Prihvaceno
                    FROM prijave_za_upise p
                    JOIN javni_pozivi jp ON (p.Javni_Pozivi_Id = jp.Id)
                    JOIN korisnici k ON (p.Korisnici_Id_Registrirani = k.Id)
                    JOIN djecji_vrtici_skupine dvs ON (dvs.Id = p.Djecji_Vrtici_Skupine_Id)
                    JOIN djecji_vrtici dv ON (dvs.Djecji_Vrtici_Id = dv.Id)
                    where k.Id = ?";
                
            // sort
            $upit .= " ORDER BY $sort";

            // izvrši upit i upiši koliko ima rezultata
            $sql = $conn->prepare($upit);
           
            // ako pretražujem, bindaj pojam
            if($id != null)
                $sql->bind_param("i", $id);
            
            $sql->execute();
            $rs = $sql->get_result();
            
            // zapiši koliko imam ukupno zapisa za traženi upit
            $object->ukupno_zapisa = $rs->num_rows;
            
            /*** paginacija i dohvat zapisa ***/
            
            // nadodaj na već definirani string upit (koji je korišten za brojanje zapisa) dio za trenutnu paginaciju
            $upit .= " LIMIT ? OFFSET ?";
                    
            // izvrši upit za paginaciju
            $sql = $conn->prepare($upit);
            
            // bindaj parametre
            if($id != null)
                $sql->bind_param("iii", $id, $zapisa_po_stranici, $zapocni_sa_zapisom);
            else
                $sql->bind_param("ii", $zapisa_po_stranici, $zapocni_sa_zapisom);
            
            $sql->execute();
            $rs = $sql->get_result();
            
            while($red = $rs->fetch_array(MYSQLI_ASSOC))
            {
                $it = new PrijaveZaUpis();

                $it->Broj = $red["Broj"];
                $it->Datum = $red["Datum"];
                $it->Javni_Poziv = $red["Javni_Poziv"];
                $it->Roditelj = $red["Roditelj"];
                $it->Vrtic = $red["Vrtic"];
                $it->Prihvaceno = $red["Prihvaceno"];
                
                $object->lista[] = $it;
            }

            $sql->close();
            $conn->close();
            
            return $object;
        }	
    }

?>