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
          		$listes = $bdd->query('SELECT * FROM listes');
              // display imap_threadthe name of project, discription and date limite
              $liste = $listes->fetchAll();
              foreach ($liste as $key => $value){

				echo 'nom de liste : '.$value['nom'].'<br/>';
                echo '<form action="liste_view.php?index='. $key.'" method="post">';
                echo '<input type="submit" name="" value="Show listes">'.'<br/>';
                echo '</form>';
			  }


              //check if the button delete in the form
              if(isset($_POST['delete'])){
                  $id = $_POST['delete'];

                //delet the project from data base
                  $delete = $bdd->prepare("DELETE FROM listes WHERE id =:id");
                  $delete->execute(array(
					'id'=>$value['id']
				  ));
                  $delete->CloseCursor();
              }

             ?>

            			<form action="liste.php" method="post">
							       <p class="text-white">nom de liste: <input type="text" name="nom"></p>
							        <input type="submit" name="submit" value="ajouter" id="liste">
					      	</form>




         </div>
   </div>
 </div>
