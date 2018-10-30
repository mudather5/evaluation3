<?php
  include("header.php");
  include("projets.php");
  include("config.php");
  session_start();
  $listes = $bdd->query('SELECT * FROM listes');
  $liste = $listes->fetchAll();
  $_SESSION['id_liste']=$liste[$_GET['index']]['id'];
 ?>

<div class="container">
   <div class="row justify-content-center">
       <div class="col-lg-8 col-sm-6 offset-2 mb-2">

          <p><?php echo $liste[$_GET['index']]['nom']; ?></p>
          <form action="delete_listes.php" method="post">
              <input type="submit" name="delete" value="Supprimer">
          </form>





      <?php

          if (isset($_POST['nom']) AND !empty($_POST['nom']))
          {      // sent the name to the form

      		$nom = htmlspecialchars($_POST['nom']);

            // insert in to table
      		$insert = $bdd->prepare("INSERT INTO tache (nom, date_limite) VALUES (:nom)");
            $insert->execute(array(
              'nom' => $nom
            ));

      	  }



          ?>


       </div>
   </div>


</div>
