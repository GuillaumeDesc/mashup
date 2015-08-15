<?php
	include("includes/upload.php");
?>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Mashup Projet par Guillaume Deschryver">
		<title>Mashup Projet | Exprimez-vous !</title>
		<meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1"/>
		<link rel="stylesheet" href="assets/style/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="assets/style/style.css" type="text/css" media="all">
		<link href='http://fonts.googleapis.com/css?family=Advent+Pro:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:100' rel='stylesheet' type='text/css'>
		<script src='assets/lib/jquery.min.js'></script>
        <link rel='stylesheet' href='assets/style/justifiedGallery.css' type='text/css' media='all' />
        <script src='assets/lib/justifiedGallery.js'></script>
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
                </svg>

                <hr></hr>
				<a href="index.php"><h1>Mashup project</h1></a>
				<section>
					<p>Créee par et pour vous, cette galerie collective vous permet de vous exprimer. Associez simplement un mot à une image pour participer.</p>
                    <p class="mobile" id="right"><a href="#galery">Découvrir la galerie</a> </p>
                    <form enctype="multipart/form-data" action="includes/upload.php" method="post" class="half">
				        <label for="myfile">Texte: </br> </label>
				        <input type="text" name="text" id="myfile" required="required" label="Texte" placeholder="Texte" maxlength="50">
				        <label for="myfile">Image: </br> </label>
				        <input type="file" name="newfile" id="myfile" required="required">
				        </br>
				        <span id="submit">
				            <input type="submit" value="Envoyer">
				        </span>
			        </form>
			        <hr></hr>
				</section>
            </div> <!--fin div title-->
		</header>
		<span id="zoom">
            <p id="plus"> + Zoomer </p>
            <p id="less"> - Dézoomer</p>
        </span>  <!--boutons zoom-->
		<div id="galery">  <!--Galerie d'image -->
			<?php
			echo $alert;
			$img = 'img';
            $files =  scandir($img);
			foreach($files as $f) {
					if (($f != ".") && ($f != "..")) {
					echo  '<a href="img/' . $f . '"> <img src="img/' . $f . '" height="200"></a>';
				}
			}
			?>
		</div>
		<?php include('includes/footer.php'); ?>
	</body>
	<script>     
//                 script gérant le zoom
                 var zoom = 3;
                 
                 $("#plus").click(function() { 
                     if ( zoom < 5) {
                          console.log(zoom);
                          zoom = zoom + 1;
                          fct();
                      };
                 });
                 
                 $("#less").click(function() { 
                     if ( zoom > 1) {
                          zoom = zoom - 1;
                          fct();
                      };
                 });
                 
                 
                 function fct() {
                     if (zoom == 1) {
                         $("#galery").justifiedGallery({
                            rowHeight: 50,
                            margins : 10 ,
                            border: -10,
                        });
                    }
                    else if (zoom == 2) {
                         $("#galery").justifiedGallery({
                            rowHeight: 100,
                            margins : 20 ,
                            border: -20,
                        });
                    }
                    else if ( zoom == 3) {
                         $("#galery").justifiedGallery({
                            rowHeight: 150,
                            margins : 30 ,
                            border: -30,
                        });
                    }
                    else if ( zoom == 4) {
                         $("#galery").justifiedGallery({
                            rowHeight: 200,
                            margins : 40 ,
                            border: -40,
                        });
                    }
                    
                    else if ( zoom == 5) {
                         $("#galery").justifiedGallery({
                            rowHeight: 250,
                            margins : 50 ,
                            border: -50,
                        });
                    };
                 };
                 
                
                $("#galery").justifiedGallery({
                    fixedHeight: false,
                    sizeRangeSuffixes : { 'lt100': '', 'lt240': '', 'lt320': '', 'lt500': '', 'lt640': '', 'lt1024': '' },
                });
                
        </script>
</html>
