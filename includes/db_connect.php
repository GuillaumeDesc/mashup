<?php
            
        //Connexion a la base de donnée avec PDO
            
        try {
            $req = new PDO('mysql:host=localhost;dbname=mashup', 'root', 'root');
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
            
        $req->query("SET NAMES UTF8");
        