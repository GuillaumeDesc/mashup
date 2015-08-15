<html>
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Connexion à l'espace administrateur">
		<title>Connexion | Mashup Project</title>
		<meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1"/>
		<link rel="stylesheet" href="../assets/style/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="../assets/style/style.css" type="text/css" media="all">
		<link href='http://fonts.googleapis.com/css?family=Advent+Pro:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:100' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header id="connect"> 
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
				<a href="../index.php"><h1>Mashup project</h1></a>
				
		<form method="post">
			<fieldset> <!--Formulaire de connexion-->
				<legend>Login</legend>
				<ol>
					<li>
						<label for='username'>Login*</label>	
						<input type="text" name="username" id='username' placeholder="Login" requiered="requiered">
						<?php echo message_erreur($errors,'username'); ?>
					</li>
					<li>
						<label for='password'>Pass*</label>
						<input type="password" name="password" id='password' placeholder="Pass" requiered="requiered">
						<?php echo message_erreur($errors,'password'); ?>
					</li>
					<li>
						<span id="submit">
						    <input id="envoyer" type="submit" name="Submit" value="Log In">
						</span>
					</li>
				</ol>
			</fieldset>
			<p id="right"><a href='../index.php'>Retour au projet.</a></p>
			<hr></hr>
		</form>
		</section>
			</div>
		</header>
	</body>
</html>