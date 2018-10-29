<?php
//connection with data base
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=evaluation;charset=utf8', 'root', 'root');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
