<?php
include("header.php");
include("config.php");
include("projets.php");
?>


<div class="container">
   <div class="row">
       <div class="col-lg-7 col-sm-6 offset-3 mb-4">

				      <?php foreach($projets as $key => $value){ ?>


      				<p>nom de projet :	<?php echo $value['name'] ?></p>
              <p>discription : <?php echo $value['discription']?></p>

              <a href="task.php">
      				  <p>Nom de liste : <?php echo $value['listes'] ?></p>
              </a>
      				<p>Date de réaliation : <?php echo $value['date_réaliation'] ?></p>


			  <?php

			  }
        ?>

<?php
        if (isset($_POST['nom']) AND !empty($_POST['nom'])){

      		$nom = htmlspecialchars($_POST['nom']);


      		$insert = $bdd->prepare("INSERT INTO listes (nom) VALUES (:nom)");
            $insert->execute(array(
              'nom' => $nom


            ));

      	}

      		$listes = $bdd->query('SELECT nom FROM listes');

          while ($liste = $listes->fetch())
          {
          	 echo 'nom de liste : '.$liste['nom'].'<br/>';

          }


 ?>


            			<form action="liste.php" method="post">
							       <p>nom de liste: <input type="text" name="nom"></p>
							       <input type="submit" name="submit" value="ajouter une liste">
					      	</form>

      </div>
    </div>
  </div>
