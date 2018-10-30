<?php
  include('header.php');
?>
<div class="container">
  <div class="row justify-content-center mt-4">
      <?php
        if(isset($_POST['tasks']))
        {//to run PHP script on submit
            	if(!empty($_POST['task']))
              {
              // Loop to store and display values of individual checked checkbox.
                  foreach ($_POST["task"] as $selected)
                  {
                  //the  taskes which is selected
                  echo '<p>'.$selected.'<br/>'.'</p>';
                  echo '<p class="text-white">'.'<i class="fa fa-check-square" style="font-size:30px;color:green"></i>'.'</p>';
                  echo'<br/>';
                  }
              }
              else
              {
                echo '<p>'.'choisissez au moint une tâche'.'</p>';
              }
        }
        ?>

  </div>
</div>
