<?php

session_start();

//Sessionda Turkish yolladıysak ya da Engilish yolladıysak ona göre depolama yapacaktır.
$GelenDilSecimi = $_GET["DilSecimi"];

$_SESSION["SiteDili"] = $GelenDilSecimi;

header("Location:index.php");
exit();

 ?>
