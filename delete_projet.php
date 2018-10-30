<?php
include("config.php");
session_start();

if(isset($_POST['delete'])){
  $delete = $bdd->prepare("DELETE FROM projet WHERE id = :id");
  //$delete->bindValue('id', $id, PDO::PARAM_INT);
  $delete->execute(array(
    'id'=>$_SESSION['id_projet']
  ));
  header("location: index.php");
}
