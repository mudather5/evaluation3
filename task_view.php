<?php
  include("header.php");
  include("projets.php");
  include("config.php");
  session_start();
  $taskes = $bdd->query('SELECT * FROM tache');
  $taske = $taskes->fetchAll();
  $_SESSION['id_task']=$taske[$_GET['index']]['id'];
 ?>

<div class="container">
   <div class="row justify-content-center">
       <div class="col-lg-8 col-sm-6 offset-2 mb-2">

          <p><?php echo $taske[$_GET['index']]['nom']; ?></p>
          <p><?php echo $taske[$_GET['index']]['date_limite']; ?></p>
          <form action="delete_task.php" method="post">
              <input type="submit" name="delete" value="Supprimer">
          </form>





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






          //
          // if(isset($_POST['tasks'])){//to run PHP script on submit
      		//     if(!empty($_POST['task'])){
          //       // Loop to store and display values of individual checked checkbox.
          //       foreach ($_POST["task"] as $selected) {
          //           echo'<p>'.$selected.' '.'<i class="fa fa-check-square" style="font-size:30px;color:green"></i>'.'</p>';
          //       }
          //     }else{
          //         echo '<p>'.'choisissez au moint une tâche'.'</p>';
          //       }
          // }


          ?>


       </div>
   </div>


</div>
