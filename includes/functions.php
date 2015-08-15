<?php
	if(!defined('ADMIN')) {
		die('accès interdit');
	}
	
    function message_erreur($erreurs, $input){
        if(count($_POST)>0){
            $message = '';
            if ($erreurs[$input] != '') {
                    $message = $message . '<li>' . $erreurs[$input] . '</li>';
            }
            return '<ul class="error_messages">'.$message.'</ul>';
        } 
    }