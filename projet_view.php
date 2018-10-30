<?php
 include("header.php");
  include("projets.php");
  include("config.php");
  session_start();

  $projets = $bdd->query('SELECT * FROM projet');
  $projet = $projets->fetchAll();
  $_SESSION['id_projet']=$projet[$_GET['index']]['id'];
?>

<div class="container">
   <div class="row justify-content-center">
       <div class="col-lg-8 col-sm-6 offset-2 mb-2">

          <p><?php echo $projet[$_GET['index']]['nom']; ?></p>
          <p><?php echo $projet[$_GET['index']]['discription']; ?></p>
          <p><?php echo $projet[$_GET['index']]['date_limite']; ?></p>

          <form action="delete_projet.php" method="post">
              <input type="submit" name="delete" value="Supprimer">
          </form>


<?php
if (isset($_POST['nom']) AND isset($_POST['discription']) AND !empty($_POST['nom']) AND !empty($_POST['discription']))
          {      //  sent name and dicription from form
          		$nom = htmlspecialchars($_POST['nom']);
          		$discription = htmlspecialchars($_POST['discription']);

              //insert in to table inorder to query  the name and the discription
          		$insert = $bdd->prepare("INSERT INTO projet(nom, discription, date_limite) VALUES(:nom, :discription, NOW())");
                $insert->execute(array(
          		  'nom' => $nom,
          		  'discription' => $discription
          	  ));

          	}
?>
