<?php

require_once('class.upload.php');
include'db_connect.php';

$text = trim(strip_tags($_POST['text'])); // sanatisation texte
$text = strtoupper($text);
$text = str_replace(

array('é', 'è', 'ê', 'ë', 'à', 'â', 'î', 'ï', 'ô', 'ù', 'û'),
array('E', 'E', 'E', 'E', 'A', 'A', 'I', 'I', 'O', 'U', 'U'),

$text
);


$ip = 'test'; //detection adresse IP de l'envoyeur

    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }


if($_FILES){
	if( ($_FILES["newfile"]["type"] == "image/png") || ($_FILES["newfile"]["type"] == "image/jpeg") || ($_FILES["newfile"]["type"] == "image/gif") ){
	$document = new Upload( $_FILES['newfile'] );
	if ($document->uploaded) {
	    // si l'image  est au format png, jpeg ou gif et que l'image a ete uploadee

        //parametres classupload pour l'edition et l'enregistrement
        $document->image_text_font       = "../assets/font/test.gdf";
        $document->image_resize          = true;
        $document->image_ratio_pixels    = 200000;
        $document->image_overlay_color   = '#505050';
        $document->image_overlay_opacity = 75;
        $document->image_text            = $text;
        $document->image_text_color      = '#ffffff';
        $document->image_text_opacity    = 100;
        $document->image_text_background_opacity = 50;
        $document->image_text_font       = 5;
        $document->image_text_padding    = 20;
		$document->file_new_name_body = 'image';
		$document->Process('../img/');
			
			
			if ($document->processed) {
		        
		        //si edition faite... détection de la date, du path du fichier
		        $date = date("Y-m-d H:i:s");
		        $name = $document->file_dst_name;
                
                //enregistrement dans la base de donnee des infos
                $req2 = $req->prepare('INSERT INTO images(name, date, ip) VALUES(:name, :date, :ip)');
                $req2->execute(array(
                    'name' => $name,
                    'date' => $date,
                    'ip' => $ip
                    ));
                    
		         $document->Clean();
		         $alert = '<section  id="alert"><p>Mauvais type de fichier, ca fichier... :/</p></section>';
		         header('Location: ../index.php');
				    exit;
		   
		   } else {
		     $alert = 'error : ' . $document->error;
		   }
		}
	} else {
		$alert = 'Mauvais type de fichier, ca fichier... :/  ';
	}
}

