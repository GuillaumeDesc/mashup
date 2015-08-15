<?php
	define('ADMIN', 'login');
	session_start();
	include("../includes/config.php");
	include("../includes/functions.php");
	//traitement form
	if ($_SESSION['logged_in'] != 'ok') {

		//Pas connecté

		if ($_POST) {

			//sanitisation des inputs
			$username = trim(strip_tags($_POST['username']));
			$password = trim(strip_tags($_POST['password']));

			//validation
			$errors = array();

			if ( $username == '' ){
				$errors["username"] = 'Quel est ton pseudo ?';
			}

			if ( $password == '' ){
				$errors["password"] = 'Quel est ton mot de passe ?';
			}

			if (count($errors) < 1) {
				//il n'y a pas d'erreurs, verification
				foreach ($users as $u) {
					if($u["username"] == $username && $u["password"] == $password) {
						$_SESSION = $u;
						$_SESSION['logged_in'] = 'ok';
						header("Location: index.php");
						exit;
					}
				}
				$errors['rate'] = "ce login et mot de passe sont inconnus.";
			}
		}
		//affichage du form
		include 'login.view.php';
	} else {
		//Si connecté, affichage du panneau d'administration
		include '../includes/directory.ui.php';
		
	}