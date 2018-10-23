<?php
  include("header.php");
  include("projets.php");
  include("config.php");
 ?>





<div class="container">
   <div class="row">
       <div class="col-lg-7 col-sm-6 offset-3 mb-2">


				   <?php foreach($projets as $key => $value){ ?>
			  <div class="project col-md-3 col-sm-6">
				<a class="link_detail" href="liste.php?index=<?php echo $key; ?>">

				  <div class="spec">
				<p>	<?php echo $value['name'] ?></p>
      </a>

				<p><?php echo $value['listes'] ?></p>

				<p>Date de réaliation:<?php echo $value['date_réaliation'] ?></p>

				</div>

			  </div>

			  <?php

			  }
        ?>

                  <h4>pour ajouter un nouveaux projet:</h3>
<?php

      if (isset($_POST['nom']) AND isset($_POST['discription']) AND !empty($_POST['nom']) AND !empty($_POST['discription'])){
      		$nom = htmlspecialchars($_POST['nom']);
      		$discription = htmlspecialchars($_POST['discription']);


      		$insert = $bdd->prepare("INSERT INTO projet(nom, discription) VALUES(:nom, :discription, NOW())");
            $insert->execute(array(
      		  'nom' => $nom,
      		  'discription' => $discription
      	  ));

      	}

      		$projects = $bdd->query('SELECT * FROM projet');

          while ($projet = $projects->fetch())
          {
          	 echo 'nom de projet : '.$projet['nom'].'<br/>';
      		   echo 'discription : '.$projet['discription'].'<br/>';
             echo 'Date limite de realisation : '.$projet['date_limite'].'<br/>';


          }


 ?>


            			<form action="index.php" method="post">
							       <p>nom de projet: <input type="text" name="nom"></p>
							       <p>la discription :<input type="text" name="discription"></p>

							        <input type="submit" name="submit" value="add">
						</form>












         </div>
   </div>
 </div>
