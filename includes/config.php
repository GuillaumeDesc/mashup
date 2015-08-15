<?php

if(!defined('ADMIN')) {
		die('accès interdit');
	}
//PATTE BLANCHE: config

//Afficher les erreurs lors du DEV
error_reporting(E_ERROR | E_WARNING);

// Les utilisateurs
$user = array();
	$users[] = array(
		"fullname" => "Guillaume",
		"username" => "admin1",
		"password" => "admin1"
		);
    $users[] = array(
		"fullname" => "Kevin",
		"username" => "admin2",
		"password" => "admin2"
		);