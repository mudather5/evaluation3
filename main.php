<?php
  include("header.php");
  include("projets.php");
   include("config.php");
 ?>
 
 <div class="container-fluid my-5">
  <div class="row">

    <?php foreach($projets as $key => $value){ ?>
      <div class="product col-md-2 col-sm-6 offset-3">
        <a class="link_projets" href="projets.php?index=<?php echo $kays; ?>">
    
          <div class="spec pb-3">
              <p><a href="index.php">name: <?php echo $value['name'] ?></a></p></a>
            <p>date de réaliation: <?php echo $value['date_réaliation'] ?></p>
        </div>
      </div>
        
    
      <?php

      }

      ?>


  </div>
</div>


<div class="container">
   <div class="row">
       <div class="col offset-2">
           <form>
  <br>
  <input type="text" name="nom"><br>
  <br>
  <input type="text" name="date_limite"><br>
  <input type="submit" name="submit" value="ajouter tâchas">
</form> 


       </div>
   </div>
    
    
</div>
<?php
    
    if(isset($_POST['nom']) AND !empty($_POST['nom']))
    {

      $nom = htmlspecialchars($_POST['nom']);
//      $date_limite = htmlspecialchars($_POST['date_limite']);


      //the function which excute the date and time
      $insert = $bdd->prepare("INSERT INTO tâche(nom, date_limite) VALUES(?,?,NOW())");
      $insert->execute(array($nom, $date_limite));

    }
    $req = $bdd->query('SELECT * FROM tâche');

    while ($nom = $req->fetch())
    {

      echo $nom['date_limite'].'<br/>';
    	echo $nom['nom'].': ';
//    	echo $messages['message'].'<br/>';
    }

    ?>



