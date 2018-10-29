<?php
      include("header.php");
      include("config.php");


      if(isset($_POST['submit2']))
      {
          $email = htmlspecialchars($_POST['email']);
          $password = htmlspecialchars($_POST['password']);

          // $forError = array();
          // if(strlen($password) <= 3)
          // {
          //   $fromError[] = "il faut tapper un mot de pass correct!";
          // }
            $stmt = $bdd->prepare("SELECT * FROM login (email, password) VALUES('$email', '$password')");
            $stmt->execute(array($email, $password));
            $count = $stmt->rowCount();

            if($count == 1)
            {

              echo "it's already taken";
            }
            else
            {
              $stmt = $bdd->prepare("INSERT INTO login (email, password) VALUES('$email', '$password')");
              $stmt->execute(array($email, $password));
              $_SESSION['email'] = $email;
              echo "Vous vous êtes bien inregistrés";
            }

      }

  ?>
