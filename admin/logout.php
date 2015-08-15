<?php

//Loogout
session_start();

//effacer les fichiers stockant la sess
session_destroy();
//effacer la var sess
unset($_SESSION);

//redirige le nav vers HP
header("Location: index.php");
?>