<?php
include("header.php");
include("config.php");
include("projets.php");
// include("listes.php")
?>


<div class="container">
   <div class="row justify-content-center">
            <?php foreach($projets as $key => $value){ ?>
			  <div class="project col-md-3 col-sm-6">
          <a href="index.php">
            <p class="text-white">	<?php echo $value['name'] ?></p>
          </a>

				   <a href="task.php?index=<?php echo $key; ?>">
              <h4 class="text-white"><b><?php echo $value['listes'] ?></b></h4>
           </a>

				    <p class="text-white">Date limite de la réaliation :<?php echo ' '.date('Y', strtotime('+1 year')); ?></p>



			  <?php

			  }
        ?>



        <?php
        if (isset($_POST['nom']) AND !empty($_POST['nom'])){
            //  sent name and dicription from form
      		$nom = htmlspecialchars($_POST['nom']);

          //insert in to table inorder to query  the name and the discription

      		$insert = $bdd->prepare("INSERT INTO listes (nom) VALUES (:nom)");
            $insert->execute(array(
              'nom' => $nom
            ));

      	}
            //Recovery the project from table
      		$listes = $bdd->query('SELECT nom FROM listes');

          //print the listes in liste.php page
          while ($liste = $listes->fetch())
          {
          	 echo '<p class="text-white">'.'nom de liste : '.$liste['nom'].'<br/>'.'</p>';

          }

          if(isset($_POST['delete'])){
            $id = $_POST['delete'];
            //delete the listes which have been added
            $delete = $bdd->prepare("DELETE FROM listes WHERE id > 0");
            $delete->bindValue('id', $id, PDO::PARAM_INT);
            $delete->execute();
            $delete->CloseCursor();
          }
          ?>


               
              <form action="liste.php" method="post">
  							<input type="text" name="nom"><br>
  							<input type="submit" name="submit" value="ajouter">
                <input type="submit" name="delete" value="suprimer">
				      </form>
        </div>
    </div>
</div>
