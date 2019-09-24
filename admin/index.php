<?php include('header.php'); ?>
      <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-4.jpg">
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
                        <a class="nav-link" href="edit.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Add restaurant</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->


            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="functions.php?do=logout">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                   <h1>Restaurant Lists!</h1>
                      <?php 
                        if(isset($_GET['unko'])){
                          echo "search for : ".$_GET['unko'];
                         }else{
                       ?> 
                         <form action="index.php" method="get">
                            <input type="text" name="unko" placeholder="search restaurants!">
                            <input type="submit" name="submit" value="search them!!" >
                         </form>
                      <?php
                        }
                      ?>
                    <div class="row">
                        <div class="col-md-12" id="super">
                        </div>
                    </div>
                </div>
           </div>
        </div>
      </div>

             <script>
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                     var r = JSON.parse(xhttp.responseText);
                     console.log(r);
                     html='';
                     for(let i=0; i<r.length; i++){
                     html+='<div class="card" style="width: 18rem;">';
                     html+='<img src="images/'+r[i].photo+'" class="card-img-top">';
                     html+='<div class="card-body">';
                     html+=' Name :<h3 class="card-title">'+r[i].name+'</h3>';
                     html+=' Location :<h3 class="card-title">'+r[i].location+'</h3>';
                     html+=' Star :<h3 class="card-title">'+r[i].price_range+'</h3>';
                     html+='<div class="btn btn-primary btn-simple">'
                     html+='<a href="edit.php?id='+r[i].id+'">Go to edit</a><br> ';//ループしたeditlinkに各idを埋め込んでる
                     html+='</div>';
                     html+='<div class="btn btn-primary btn-simple">'
                     html+='<a href="functions.php?id='+r[i].id+'&do=delete">Delete</a>';
                     html+='</div>';
                     html+='</div>';
                     html+='</div>';
                   }
                     document.getElementById("super").innerHTML = html;
                  }
                    };
                    <?php
                      if(isset($_GET['unko'])){
                        echo 'xhttp.open("GET", "functions.php?do=list&unko='.$_GET['unko'].'", true);';
                      }else{
                        echo 'xhttp.open("GET", "functions.php?do=list", true);';
                      }
                    ?>

                    xhttp.send();
              </script>
                   
                           
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    <div class="main">
       
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
</html>