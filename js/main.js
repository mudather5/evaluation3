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
                  var checkBox = document.getElementById("theCheck");
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
