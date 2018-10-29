<?php
  include("header.php");
  include("projets.php");
  include("config.php");
 ?>





<div class="container">
   <div class="row justify-content-center">
       <div class="col-lg-7 col-sm-6 offset-3 mb-2">


				   <?php foreach($projets as $key => $value){ ?>
			  <div class="project col-md-3 col-sm-6">
				<a class="link_detail" href="liste.php?index=<?php echo $key; ?>">

				  <div class="spec">
				<p class="text-white"><b>	<?php echo $value['name'] ?></b></p>
      </a>

				<p class="text-white"><?php echo '<p class="text-white">'.$value['listes'].'</p>'; ?></p>

				<p class="text-white">Date limite de réaliation :<?php echo '<p class="text-white">'.date('Y', strtotime('+1 year')).'</p>'; ?></p>

				</div>

			  </div>

			  <?php

			  }
        ?>

            <h4 class="text-white">pour ajouter un nouveaux projet:</h3>

<?php

      if (isset($_POST['nom']) AND isset($_POST['discription']) AND !empty($_POST['nom']) AND !empty($_POST['discription']))
      {
      		$nom = htmlspecialchars($_POST['nom']);
      		$discription = htmlspecialchars($_POST['discription']);


      		$insert = $bdd->prepare("INSERT INTO projet(nom, discription, date_limite) VALUES(:nom, :discription, NOW())");
            $insert->execute(array(
      		  'nom' => $nom,
      		  'discription' => $discription
      	  ));

      	}

      		$projects = $bdd->query('SELECT * FROM projet');

          while ($projet = $projects->fetch())
          {
          	 echo '<p class="text-white">'.'nom de projet : '.$projet['nom'].'<br/>'.'</p>';
      		   echo '<p class="text-white">'.'discription : '.$projet['discription'].'<br/>'.'</p>';
             echo '<p class="text-white">'.'Date limite de realisation : '.$projet['date_limite'].'<br/>'.'</p>';

          }
          if(isset($_POST['delete'])){
              $id = $_POST['delete'];
              $id = '';

              $delete = $bdd->prepare("DELETE FROM projet WHERE id > 0");
              $delete->bindValue('id', $id, PDO::PARAM_INT);
              $delete->execute();
              $delete->CloseCursor();
          }

 ?>


            			<form action="index.php" method="post">
							       <p class="text-white">nom de projet: <input type="text" name="nom"></p>
							       <p class="text-white">la discription :<input type="text" name="discription"></p>
							        <input type="submit" name="submit" value="ajouter" id="project">
                       <input type="submit" name="delete" value="suprimer">
					      	</form>




         </div>
   </div>
 </div>
