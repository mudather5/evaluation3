<?php
  include("header.php");
  include("projets.php");
  include("config.php");
 ?>

<div class="container">
   <div class="row justify-content-center mt-4">
       <div class="col-lg-7 col-sm-6 offset-3">

          <?php foreach($projets as $key => $value){ ?>
          <a href="projets.php?index=<?php echo $kays; ?>"></a>
          <p class="text-white">Nom: <?php echo $value['listes'] ?></p>
          <p class="text-white">Nom : <a href="tâche.php"><?php echo '<b>'.$value['tâches'].'</b>'?></a></p>

      <?php

      }

      ?>
    </div>


      <?php

          if (isset($_POST['nom']) AND !empty($_POST['nom']))
          {      // sent the name to the form

      		$nom = htmlspecialchars($_POST['nom']);

            // insert in to table
      		$insert = $bdd->prepare("INSERT INTO tache (nom, date_limite) VALUES (:nom, NOW())");
            $insert->execute(array(
              'nom' => $nom
            ));

      	  }
          //recovery
      		$taskes = $bdd->query('SELECT * FROM tache');
          $taske = $taskes->fetchAll();
          foreach ($taske as $key => $value)
          {
                echo 'nom de tâche : '.$value['nom'].'<br/>';
                echo 'date limites de la réaliation : '.$value['date_limite'].'<br/>';
                echo '<form action="task_view.php?index='. $key.'" method="post">';
                echo '<input type="submit" name="" value="View task">'.'<br/>';
                echo '</form>';


        }
            if(isset($_POST['delete'])){
              var_dump('toto');
              $id = $_POST['delete'];
              var_dump($_POST['delete']);
              $delete = $bdd->prepare("DELETE FROM tache WHERE id = :id");
              //$delete->bindValue('id', $id, PDO::PARAM_INT);
              $delete->execute(array(
                'id'=>$value['id']
              ));
              $delete->CloseCursor();
          }





          ?>


            <form action="task.php" method="post">
                <input type="text" name="nom"><br>
                <input type="submit" name="add" value="ajouter">
            </form>


       <!-- </div> -->
   </div>
</div>
