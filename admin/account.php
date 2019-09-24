<?php include('header.php'); ?>
      
    <div class="container-fluid">
       <div class="row">
        <div class="col-md-2">
          <div class="sidebar" data-image="admin/assets/img/sidebar-4.jpg" >       
            <div class="sidebar-wrapper">
                <div class="sidebar-title">
                     <a href="index.php">
                        Restaurant Lists
                      </a>
                </div>
               
                  <ul class="nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="index.php">
                              <i class="nc-icon nc-chart-pie-35"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li>
                          <a class="nav-link" href="account.php">
                              <i class="nc-icon nc-circle-09"></i>
                              <p>User Lists</p>
                          </a>
                      </li>
                      <li>
                        <a class="nav-link" href="editAccount.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Edit User Lists</p>
                        </a>
                      </li>
                      <li>
                          <a class="nav-link" href="add.php">
                              <i class="nc-icon nc-notes"></i>
                              <p>Add restaurant</p>
                          </a>
                      </li>
                      
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-10">
              <div class="loggedInUser"><h2>Hello <?php echo $_COOKIE['username']; ?>!!</h2></div>
              <div class="userLists"><h1>User lists</h1></div>
              <div id="user"></div>
              <a href="index.php"> <--Go Back </a><br>
            </div>
        </div>
    </div>

      
  </div>

<script>
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       let r = JSON.parse(xhttp.responseText);//JSONデータをSavascriptのobject data に変える。
         html="";
         html='<div class="col-md-8"><table class="table table-hover table-striped">';
         html+= '<thead><th>Photo</th><th>Username</th><th>Password</th></thead>';

       for(let i=0; i<r.length; i++){
         	 html+='<tbody>';
           html+='<tr>';
           html+='<td id="user_logo"><img src='+"images/user_logo.jpg"+'></td>';
           html+='<td><h3>'+r[i].name+'</h3></td>';
           html+='<td><h3>'+r[i].password+'</h3></td>';
           html+= '</tr>';
		       html+='</tbody>';
         }
           html+='</table>';
           html+='</div>';
          document.getElementById("user").innerHTML = html;
      }
  };
  xhttp.open("GET", "functions.php?do=showUser", true);
  //🌟..account.phpファイルが読み込まれた（this.readystate）時にURLにdo=showUserを追加する。これによりfunctions.phpの$_GET[do]=="showUser"が発動しshowUser()が発火する。
  xhttp.send();
  </script> 



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
</html>