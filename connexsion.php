<?php
    include("config.php");

    if(isset($_POST['email']) AND isset($_POST['password'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);


        $stmt = $bdd->prepare("SELECT email, password FROM login WHERE email = $email AND password = $password");
        $stmt->execute(array($email, $password));
        // $stmt = mysqli_query($bdd, $stmt);
        // $count = $stmt->rowCount();
        //

        if($count === 1)
        {
          header ("location: index.php");
          // exit();
        }

        else
        {
          header('location: accueil.php');
        }

  }
?>
