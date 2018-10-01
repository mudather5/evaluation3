<?php
  include("header.php");
  include("projets.php");
  include("config.php");
 ?>
 
 <div class="container">
  <div class="row">

    <?php foreach($projets as $key => $value){ ?>
      <div class="product col-md-2 col-sm-6 offset-4">
          <a class="link_projets" href="projets.php?index=<?php echo $kays; ?>"></a>
    
          <div class="spec pb-3">
              <p>Name: <?php echo $value['name'] ?></p>
              <p>Listes: <?php echo $value['listes']?></a></p>
            <p>Discription: <?php echo $value['discription'] ?></p>
            <p>Date de réaliation: <?php echo $value['date_réaliation'] ?></p>
        </div>
        
      </div>
    
      <?php

      }

      ?>
      
      
      <?php


	$bdd = new PDO('mysql:host=localhost;dbname=evaluation3;charset=utf8', 'root', 'root');

       if(isset($_POST['projet1']) AND isset($_POST['discription']) AND !empty($_POST['projet1']) AND !empty($_POST['discription']))
        {

          $projet1 = htmlspecialchars($_POST['projet1']);
          $discription = htmlspecialchars($_POST['discription']);


          //the function which excute the date and time
          $insert = $bdd->prepare("INSERT INTO projet(proje1, discription, date_limite) VALUES(?,?,NOW())");
          $insert->execute(array($projet1, $discription));

        }
        $allprojet = $bdd->query('SELECT * FROM projet');
        while ($projet1 = $allprojet->fetch())
        {

            echo $projet1['date_limite'].'<br/>';
            echo $projet1['projet1'].': ';
            echo $projet1['discription'].'<br/>';
        }


    ?>



<div class="container">
   <div class="row">
       <div class="col-9 offset-3">
     <form action="index.php" method="post">
          <br>
          <input type="text" name="projet1"><br>
          <br>
          <input type="text" name="discription"><br>
          <input type="submit" name="submit" value="ajouter liste">
        </form> 


       </div>
   </div>
    
    
</div>



