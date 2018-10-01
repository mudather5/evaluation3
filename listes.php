<?php
  include("header.php");
  include("projets.php");
  include("config.php");
 ?>
 
 <div class="container-fluid my-5">
  <div class="row">

    <?php foreach($projets as $key => $value){ ?>
      <div class="product col-md-2 col-sm-6 offset-3">
          <a class="link_projets" href="projets.php?index=<?php echo $kays; ?>"></a>
    
          <div class="spec pb-3">
              <p>Name: <?php echo $value['listes'] ?></p>
              <p><a href="">*<?php echo $value['tâches']?></a></p>
            <p>*Date de réaliation: <?php echo $value['date_réaliation'] ?></p>
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
    <form action="" method="post">
          <input type="text" name="name"><br>
          <input type="text" name="name"><br>
          <input type="submit" name="submit" value="ajouter liste">
    </form> 


       </div>
   </div>
    
    
</div>


