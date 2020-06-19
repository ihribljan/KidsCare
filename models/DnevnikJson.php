<?php

    include '../libs/MyDataAccess/Database.class.php'; 
    include '../models/DnevnikModel.php';

    class DnevnikJson
    {
        var $lista = array();

        function getAll($pojam, $sort, $zapocni_sa_zapisom, $zapisa_po_stranici)
        {
            $object = new DnevnikJson();

            $b = new Database();
            $conn = $b->openConnection();
            
            // upit za broj zapisa
            $upit = "SELECT * FROM dnevnik";

            // echo $upit;
            
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
                $it = new Dnevnik();

                $it->Id = $red["Id"];
                $it->Sifra_Radnje = $red["Sifra_Radnje"];;
                $it->Vrijeme = $red["Vrijeme"];
                $it->Korisnicko_Ime = $red["Korisnicko_Ime"];
                $it->Ip = $red["Ip"];
                $it->Opis_Radnje = $red["Opis_Radnje"];
                
                $object->lista[] = $it;
            }

            $sql->close();
            $conn->close();
            
            return $object;
        }	
    }

?>