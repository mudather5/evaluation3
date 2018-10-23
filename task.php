<?php
  include("header.php");
  include("projets.php");
  include("config.php");
 ?>

 <div class="container">
   <div class="row">
       <div class="col-lg-7 col-sm-6 offset-3 mb-2">

    <?php foreach($projets as $key => $value){ ?>
          <a class="link_projets" href="projets.php?index=<?php echo $kays; ?>"></a>

              <p>Nom: <?php echo $value['listes'] ?></p>
              <p>Nom : <a href=""><?php echo $value['tâches']?></a></p>

      <?php

      }

      ?>



        <?php

 if (isset($_POST['nom']) AND !empty($_POST['nom'])){

      		$nom = htmlspecialchars($_POST['nom']);


      		$insert = $bdd->prepare("INSERT INTO tache (nom, date_limite) VALUES (:nom, NOW())");
            $insert->execute(array(
              'nom' => $nom
            ));

      	}

      		$taskes = $bdd->query('SELECT * FROM tache');

          while ($taske = $taskes->fetch())
          {
          	 echo 'nom de tâche : '.$taske['nom'].'<br/>';
             echo 'date limites de la réaliation : '.$taske['date_limite'].'<br/>';


          }


  ?>


            <form action="task.php" method="post">
                  <input type="text" name="nom"><br>
                  <input type="submit" name="add" value="ajouter une tâche">
            </form>


       </div>
   </div>


</div>
