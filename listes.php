<?php

$mysqli = new mysqli('localhost', 'root', 'root', 'evaluation') or die(mysqli_error($mysqli));
      $insert = $mysqli->query("SELECT * FROM listes") or die(mysqli_error($mysqli));

      function pre_r($array){
        echo'pre';
        print_r ($array);
        echo'pre';

      }

if(isset($_GET['submit'])){
  $nom = $_GET['nom'];

  $mysqli->query("INSERT INTO listes (nom) VALUES('$nom')") or die($mysqli->error);
}

  if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $mysqli->query("DELETE FROM listes WHERE id > 1") or die($mysqli->error);
  }


?>
