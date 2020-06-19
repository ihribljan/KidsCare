<?php
	
	function datum_u_timestamp($date) {

		list($day, $month, $year) = explode('.', $date);
		$timestamp = mktime(0, 0, 0, $month, $day, $year);
		return $timestamp;
	
	}
	
	function timestamp_u_datum($timestamp) {
		return date("j.n.Y", $timestamp);	
	}	
	
	function timestamp_u_datum_i_vrijeme($timestamp) {
		return date("j.n.Y H:i:s", $timestamp);	
	}
	

	
	$filedir = 'cms/views/uploads/nekretnine_org/'; // putanja za originale
	$meddir = 'cms/views/uploads/nekretnine_med/'; // putanja za srednje
	$glavnadir = 'cms/views/uploads/nekretnine_gl/'; // putanja za veliku sliku (kod prikaza nekretnina)
	$thumbdir = 'cms/views/uploads/nekretnine_thumb/'; // putanja za thumbse

		
	function upload_slike($f_tmp_name, $f_name, $f_size, $f_type, $id_nekretnine) {	
	 
 	    $size = 100; // duživa thumba
		$size2 = 800; // dužina srednje velièine
		$size3 = 300; // dužina za glavne
 	    
		$filedir = 'cms/views/uploads/nekretnine_org/'; // putanja za originale
		$meddir = 'cms/views/uploads/nekretnine_med/'; // putanja za srednje
 	    $glavnadir = 'cms/views/uploads/nekretnine_gl/'; // putanja za veliku sliku (kod prikaza nekretnina)
 	    $thumbdir = 'cms/views/uploads/nekretnine_thumb/'; // putanja za thumbse
 	    
		// kontrolne var - ako veæ postoji fotka sa istim imenom da se ne prebriše
		$kontrol1 = rand();
		$kontrol2 = $tmp_name;
 	    $maxfile = '300000000';
 	    $mode = '0666';
  	    $userfile_name = $kontrol1.$kontrol2.$f_name;
  	    $userfile_tmp = $f_tmp_name;
  	    $userfile_size = $f_size;
  	    $userfile_type = $f_type;
  	    
		if (isset($f_name)) {
  	       
			$prod_img = $filedir.$userfile_name;
  	        $prod_img_thumb = $thumbdir.$userfile_name; // path za thumse
  	        $prod_img_glavna = $glavnadir.$userfile_name; // path za glavne
			$prod_img_med = $meddir.$userfile_name; // za mediume

  	        move_uploaded_file($userfile_tmp, $prod_img);
  	        chmod ($prod_img, octdec($mode));
  	        $sizes = getimagesize($prod_img);
			
			// THUMB
			// resize za thumbs - - - - - - - - >
			if ($sizes[0] <= $size) {
				$aspect_ratio = $sizes[0]/$sizes[1];
  	            $new_width = $sizes[0];
  	            $new_height = $sizes[1];
  	        } elseif ($sizes[0] > $sizes[1]) {
				// vrijedi samo ako je duÅ¾ina veÄ‡a od visine
				$aspect_ratio = $sizes[0]/$sizes[1];
  	            $new_width = $size;
  	            $new_height = abs($new_width/$aspect_ratio);
  	        } elseif ($sizes[1] > $sizes[0]) {
				// vrijedi ako je Å¡irina veÄ‡a od duÅ¾ine
				$aspect_ratio = $sizes[1]/$sizes[0];
  	            $new_height = 75;
  	            $new_width = abs($new_height/$aspect_ratio);
  	        } // < - - - - - - - - -
			
  	        $destimg=ImageCreateTrueColor($new_width,$new_height)
  	            or die('Problem In Creating image');
  	        $srcimg=ImageCreateFromJPEG($prod_img)
  	            or die('Problem In opening Source Image');
  	        if(function_exists('imagecopyresampled')) {
  	            imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
  	            or die('Problem In resizing');
  	        } else {
  	            Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
  	            or die('Problem In resizing');
  	        }
  	        ImageJPEG($destimg,$prod_img_thumb,90)
  	            or die('Problem In saving');
  	        imagedestroy($destimg);
			
			// GLAVNA
			// resize za glvna - - - - - - - - >
			if ($sizes[0] <= $size3) {
				$aspect_ratio = $sizes[0]/$sizes[1];
  	            $new_width = $sizes[0];
  	            $new_height = $sizes[1];
  	        } elseif ($sizes[0] > $sizes[1]) {
				// vrijedi samo ako je duÅ¾ina veÄ‡a od visine
				$aspect_ratio = $sizes[0]/$sizes[1];
  	            $new_width = $size3;
  	            $new_height = abs($new_width/$aspect_ratio);
  	        } elseif ($sizes[1] > $sizes[0]) {
				// vrijedi ako je Å¡irina veÄ‡a od duÅ¾ine
				$aspect_ratio = $sizes[1]/$sizes[0];
  	            $new_height = 225;
  	            $new_width = abs($new_height/$aspect_ratio);
  	        } // < - - - - - - - - -
			
  	        $destimg=ImageCreateTrueColor($new_width,$new_height)
  	            or die('Problem In Creating image');
  	        $srcimg=ImageCreateFromJPEG($prod_img)
  	            or die('Problem In opening Source Image');
  	        if(function_exists('imagecopyresampled')) {
  	            imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
  	            or die('Problem In resizing');
  	        } else {
  	            Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
  	            or die('Problem In resizing');
  	        }
  	        ImageJPEG($destimg,$prod_img_glavna,90)
  	            or die('Problem In saving');
  	        imagedestroy($destimg);
			
			// MEDIUM
			// resize za medium - - - - - - - - >
			if ($sizes[0] <= $size2) {
				$aspect_ratio = $sizes[0]/$sizes[1];
  	            $new_width = $sizes[0];
  	            $new_height = $sizes[1];
  	        } elseif ($sizes[0] > $sizes[1]) {
				// vrijedi samo ako je duÅ¾ina veÄ‡a od visine
				$aspect_ratio = $sizes[0]/$sizes[1];
  	            $new_width = $size2;
  	            $new_height = abs($new_width/$aspect_ratio);
  	        } elseif ($sizes[1] > $sizes[0]) {
				// vrijedi ako je Å¡irina veÄ‡a od duÅ¾ine
				$aspect_ratio = $sizes[1]/$sizes[0];
  	            $new_height = 450;
  	            $new_width = abs($new_height/$aspect_ratio);
  	        } // < - - - - - - - - -
			
  	        $destimg=ImageCreateTrueColor($new_width,$new_height)
  	            or die('Problem In Creating image');
  	        $srcimg=ImageCreateFromJPEG($prod_img)
  	            or die('Problem In opening Source Image');
  	        if(function_exists('imagecopyresampled')) {
  	            imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
  	            or die('Problem In resizing');
  	        } else {
  	            Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
  	            or die('Problem In resizing');
  	        }
  	        ImageJPEG($destimg,$prod_img_med,90)
  	            or die('Problem In saving');
  	        imagedestroy($destimg);
			
		// dodaj u bazu
		$sql = "INSERT INTO slike SET " .
				"filename = '$userfile_name', " .
				"id_nekretnine_FK = '$id_nekretnine'";
		mysql_query($sql) or die();			
		
		return true;
		
		}
		
	}
	
	
	function delete_slike($id, $filename) {
	
		unlink("cms/views/uploads/nekretnine_org/" . $filename);
		unlink("cms/views/uploads/nekretnine_med/" . $filename);
		unlink("cms/views/uploads/nekretnine_thumb/" . $filename);
		
		$sql = "DELETE FROM slike WHERE id_slike = '$id'";
		mysql_query($sql) or die();
		
		return true;
			
	}


	
		
	
	

?>