<?php
      session_start();
      if (isset($_SESSION['email'])){
      }
      include("header.php");
      include("config.php");

?>
<script type="text/javascript">
			function signIn() {
						  document.getElementById("first").style.color = "#6495ED";
						  document.getElementById("second").style.color = "#E8E8E8";
						  document.getElementById("secondform").style.display = "none";

					  }

					  function signUp() {
						  document.getElementById("second").style.color = "#3CB371";
						  document.getElementById("first").style.color = "#E8E8E8";
						  document.getElementById("home").style.display = "none";

					  }



         </script>



            <div class="container">
            <div class="row">
              <div class="col-lg-7 offset-4 col-sm-2  pt-4">
                <h2 id="first" onclick="signIn()">Connexion</h2> |
                <h2 id="second" onclick="signUp()">Inscription</h2>
                <p><?php if(isset($formError)){
                  foreach ($fromError as $error) {
                    echo $errror.'<br/>';
                  }

                } ?></p>


              </div>
            </div>
          </div>

          <div class="container">
          <div class="row">
            <div class="col-lg-8 col-sm-4">
              <form class="sign-in" action="connexsion.php" method="post" id="home">
                  <input type="email" name="email" value="votre email" /><br>
                  <input type="password" name="password" value="" /><br>
                  <input type="submit" value="connexion" id="signin"/>
             </form>
            <form class="signout mt-4" action="inscription.php" method="post" id="secondform">
                  <input  type="email" name="email" value="votre email" /><br>
                  <input  type="password" name="password" value="" /><br>
                  <input  type="submit" name="submit2" value="inscription" id="signout"/>
             </form>
            </div>
          </div>
        </div>

    </body>
</html>
