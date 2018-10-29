<?php
  include("header.php");
  include("projets.php");
  include("config.php");
 ?>

<div class="container">
   <div class="row justify-content-center">
       <div class="col-lg-8 col-sm-6 offset-2 mb-2">

          <?php foreach($projets as $key => $value){ ?>
          <a href="projets.php?index=<?php echo $kays; ?>"></a>
          <p class="text-white">Nom: <?php echo $value['listes'] ?></p>
          <p class="text-white">Nom : <a href="tâche.php"><?php echo '<b>'.$value['tâches'].'</b>'?></a></p>

      <?php

      }

      ?>



      <?php
      // 

          if (isset($_POST['nom']) AND !empty($_POST['nom']))
          {

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

            if(isset($_POST['delete'])){
              $id = $_POST['delete'];
              $id = '';

              $delete = $bdd->prepare("DELETE FROM tache WHERE id > 0");
              $delete->bindValue('id', $id, PDO::PARAM_INT);
              $delete->execute();
              $delete->CloseCursor();
          }


          if(isset($_POST['tasks'])){//to run PHP script on submit
      		    if(!empty($_POST['task'])){
                // Loop to store and display values of individual checked checkbox.
                foreach ($_POST["task"] as $selected) {
                    echo'<p>'.$selected.' '.'<i class="fa fa-check-square" style="font-size:30px;color:green"></i>'.'</p>';
                }
              }else{
                  echo '<p>'.'choisissez au moint une tâche'.'</p>';
                }
          }


          ?>


            <form action="task.php" method="post">
                <input type="text" name="nom"><br>
                <input type="submit" name="add" value="ajouter">
                <input type="submit" name="delete" value="supprimer">
            </form><br>
            <!-- <form method="post">
                <p class="text-white"><input type="checkbox" name="task[]" value="Wire frame">Wire frame.</p>
                <p class="text-white"><input type="checkbox" name="task[]" value="chemat de bdd">Chemat de bdd.</p>
                <p class="text-white"><input type="checkbox" name="task[]" value="favicon">Favicon.</p>
                <p class="text-white"><input type="checkbox" name="task[]" value="mobile first">Mobile first.</p>
                <input type="submit" name="tasks" value="submit">

            </form> -->


       </div>
   </div>


</div>
