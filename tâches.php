<?php
  include('header.php');
?>
<div class="container">
  <div class="row justify-content-center mt-4">
     <div class="col-lg-7 col-sm-6 offset-3 mb-2">

        <p><input type="checkbox" id="Favicon"  onclick="favicon()">Favicon</p>
        <p><input type="checkbox" id="theChecke"  onclick="theFunction()">wireframe</p>
        <p> <input type="checkbox" id="mobile"  onclick="mobile()">Mobile</p>
        <p><input type="checkbox" id="data_base"  onclick="dataBase()">Data base</p>


        <p id="favicon" style="display:none">Favicon</p>
        <p id="wireframe" style="display:none">wireframe</p>
        <p id="mobile_first" style="display:none">Mobile first</p>
        <p id="data" style="display:none">Data base</p>
        <script>
            function favicon() {
                  var checkBox = document.getElementById("Favicon");
                  var favicon = document.getElementById("favicon");

                    if (checkBox.checked == true){
                        favicon.style.display = "block";
                    }else{
                      favicon.style.display = "none";

                    }

                }

                function theFunction() {
                  var checkBox = document.getElementById("theChecke");
                  var wireframe = document.getElementById("wireframe");

                  if (checkBox.checked == true){
                      wireframe.style.display = "block";
                  }else{
                    wireframe.style.display = "none";
                  }
                }

                function mobile() {
                  var checkBox = document.getElementById("mobile");
                  var mobile_first = document.getElementById("mobile_first");

                  if (checkBox.checked == true){
                      mobile_first.style.display = "block";
                  } else {
                    mobile_first.style.display = "none";
                  }
                }

                function dataBase() {
                    var checkBox = document.getElementById("data_base");
                    var data = document.getElementById("data");

                  if (checkBox.checked == true){
                      data.style.display = "block";
                  }else{
                    data.style.display = "none";
                  }
            }

        </script>
    </div>
  </div>
</div>
