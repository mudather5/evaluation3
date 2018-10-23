<?php
      session_start();
      include("header.php");
      include("config.php");

?>
<?php
          if(isset($_POST['email']) AND isset($_POST['password'])){
              $email = htmlspecialchars($_POST['email']);
              $password = htmlspecialchars($_POST['password']);

                      $stmt = $bdd->prepare("SELECT email, password FROM login WHERE email = ? AND password = ?");
                      $stmt->execute(array($email, $password));
                      $count = $stmt->rowCount();

                      if($count > 0){
                        $_SESSION['email'] = $email;
                        header ("location: index.php");
                        exsit();
                      }else{

                      echo "faite l'inscription";
                    }

            }
?>
<?php
          if(isset($_POST['email']) AND isset($_POST['password'])){
              $email = htmlspecialchars($_POST['email']);
              $password = htmlspecialchars($_POST['password']);

                      $stmt = $bdd->prepare("SELECT email, password FROM login WHERE email = ? AND password = ?");
                      $stmt->execute(array($email, $password));
                      $count = $stmt->rowCount();

                      if($count == 0){
                        // $_SESSION['email'] = $email;
                        echo "Bienvenu";
                        header ("location: index.php");
                        exsit();
                      }else{

                      echo "vous êtes dèja inscrit";
                    }

            }

  ?>

<!--
 <!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>muda-site</title>
  <meta name="description" content="#">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
   Place favicon.ico in the root directory
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">


  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>


<body> -->
  <style>
  #home{
    margin-top: 70px;
  }
  input{
    width: 400px;
    height: 45px;
  }
  #signin{
    background-color: #6495ED;
    color: white;
  }
  #signout{
    background-color: #3CB371;
    color: white;
  }
  h2{
    display: inline-block;
  }

  @media screen and (min-width: 320px) {
  input {
    max-width: 300px;

  }
}

@media screen and (min-width: 790px) {
  input {
    max-width: 400px;

  }
}

@media screen and (min-width: 800px) {
  input {
    margin-left: 200px;
  }


}
@media screen and (min-width: 1300px) {
  input {
    margin-left: 350px;
  }


}

  </style>
            <script type="text/javascript">

          function signIn() {
              document.getElementById("first").style.color = "#6495ED";
              document.getElementById("first").style.margin.left = "30px";

              document.getElementById("second").style.display = "none";
              document.getElementById("secondform").style.display = "none";

          }

          function signUp() {
              document.getElementById("second").style.color = "#3CB371";
              document.getElementById("first").style.display = "none";
              document.getElementById("home").style.display = "none";

          }



            </script>


            <div class="container">
            <div class="row">
              <div class="col-lg-7 offset-4 col-sm-2  pt-4">
                <h2 id="first" onclick="signIn()">inscription/</h2>
                <h2 id="second" onclick="signUp()">Connexion</h2>


              </div>
            </div>
          </div>

          <div class="container">
          <div class="row">
            <div class="col-lg-8 col-sm-4">
              <!-- <h2 class="ml-4 pt-3">inscription/Connexion</h2> -->
              <form class="sign-in" action="" method="post" id="home">
                  <input type="email" name="email" value="votre email" /><br>
                  <input type="password" name="password" value="" /><br>
                  <input type="submit" value="inscription" id="signin"/>
             </form>
            <form class="signout mt-4" action="" method="post" id="secondform">
                  <input  type="email" name="email" value="votre email" /><br>
                  <input  type="password" name="password" value="" /><br>
                  <input  type="submit" value="connexion" id="signout"/>
             </form>
            </div>
          </div>
        </div>

    </body>
</html>
