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
          {      //  sent name and dicription from form
          		$nom = htmlspecialchars($_POST['nom']);
          		$discription = htmlspecialchars($_POST['discription']);

              //insert in to table inorder to query  the name and the discription
          		$insert = $bdd->prepare("INSERT INTO projet(nom, discription, date_limite) VALUES(:nom, :discription, NOW())");
                $insert->execute(array(
          		  'nom' => $nom,
          		  'discription' => $discription
          	  ));

          	}
              //Recovery the project from table
          		$projets = $bdd->query('SELECT * FROM projet');
              // display imap_threadthe name of project, discription and date limite
              $projet = $projets->fetchAll();
              foreach ($projet as $key => $value){

				echo 'nom de projet : '.$value['nom'].'<br/>';
                echo 'date limites de la réaliation : '.$value['date_limite'].'<br/>';
                echo '<form action="projet_view.php?index='. $key.'" method="post">';
                echo '<input type="submit" name="" value="View projet">'.'<br/>';
                echo '</form>';
			  }

//              while ($projet = $projects->fetch())
//              {
//              	 echo '<p class="text-white">'.'nom de projet : '.$projet['nom'].'<br/>'.'</p>';
//          		   echo '<p class="text-white">'.'discription : '.$projet['discription'].'<br/>'.'</p>';
//                 echo '<p class="text-white">'.'Date limite de realisation : '.$projet['date_limite'].'<br/>'.'</p>';
//
//              }
              //check if the button delete in the form
              if(isset($_POST['delete'])){
                  $id = $_POST['delete'];

                //delet the project from data base
                  $delete = $bdd->prepare("DELETE FROM projet WHERE id =:id");
                  $delete->execute(array(
					'id'=>$value['id']
				  ));
                  $delete->CloseCursor();
              }

             ?>

            			<form action="index.php" method="post">
							       <p class="text-white">nom de projet: <input type="text" name="nom"></p>
							       <p class="text-white">la discription :<input type="text" name="discription"></p>
							        <input type="submit" name="submit" value="ajouter" id="project">
					      	</form>




         </div>
   </div>
 </div>
