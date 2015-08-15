<?php
	if(!defined('ADMIN')) {
		die('accès interdit');
	}
	include'../includes/db_connect.php';
	include'../includes/delete.php';
?>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Connexion à l'espace administrateur">
		<title>Administration | Mashup Project</title>
		<meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1"/>
		<link rel="stylesheet" href="../assets/style/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="../assets/style/style.css" type="text/css" media="all">
		<link href='http://fonts.googleapis.com/css?family=Advent+Pro:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:100' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header>
		<div id="title">
                <svg version="1.0" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="120px" height="65px" viewBox="0 0 120 65" enable-background="new 0 0 120 65" xml:space="preserve">
                <polygon class="Bleu" fill="#00FFFF" points="84.79,5.274 49.776,66 65.354,66 84.79,32.293 104.225,66 119.803,66 "/>
                <polygon class="Rouge" fill="#FF6195" points="34.55,5.274 -0.464,66 15.114,66 34.55,32.293 53.984,66 69.562,66 "/>
                <polygon class="Bleu" opacity="0.1" fill="#0000FF" points="84.79,5.274 49.776,66 65.354,66 84.79,32.293 104.225,66 119.803,66 
                    "/>
                <polygon class="Rouge" opacity="0.1" fill="#0000FF" points="34.55,5.274 -0.464,66 15.114,66 34.55,32.293 53.984,66 69.562,66 "/>
                </svg><!-- logo image svg-->

                <hr></hr>
                <a href="index.php"><h1>Mashup project</h1></a> <!-- logo texte-->
				<section> <!-- texte informatif-->
                    <p> Bienvenue dans l'espace d'administration <?php echo $_SESSION['fullname'];?></p>
                    <p> Pour le moment, 
                    <?php 
                        $img = '../img/';
                        $files =  scandir($img);
                        echo count($files) ;
                    ?>
                            images ont été ajoutées.</p>

                    <p id="deconnect"><a href='logout.php'>Se deconnecter</a></p>
                    <p id="right"><a href='../index.php'>Retour au projet.</a></p>
                    <hr></hr>
				</section>
		</header>
		<?php echo $alert; ?>
		<ol id="gestionList"> <!-- Liste des images avec en dessous, l'ip, la date et une vignette de l'upload-->
		<?php
			$reponse = $req->query("SELECT * FROM `images`"); // Recherche des images et de leurs informations
            
            if ($reponse->rowCount() > 0) {

                while ($donnees = $reponse->fetch()){

                    $ip = $donnees['ip'];
                    $name = $donnees['name'];
                    $date = $donnees['date'];


                    echo '  <li> <a href="../img/' . $name .'" class="preview" style=" background-image: url(../img/' . $name .' ) "> </a>
                                <p class="ip"> par ' . $ip .' (<a href="http://ipinfo.io/' . $ip . '" target="_blank"> + d\'infos</a>) </br> , le ' . $date . ' </p>
                                <form action="" method="post"> <input type="submit" name="deleteItem" value="Supprimer ' . $name .'"/> </form>
                            </li>'; // creation html de li avec les infos propre a chaque image
                }
                
            } else {
                   echo '<li id="noResult"><p>Aucune image pour le moment ... </p> </li>'; 
                   } //si pas encore d'image...
		?>		

		</ol>
	</body>
</html>
