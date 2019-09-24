<?php include('header.php'); ?>
    <div class="main-panel">
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
            <div class="content">
              <div class="container-fluid">
                 <div class="row">
                    <?php 
                      if(isset($_GET['unko'])){
                        echo "search for : ".$_GET['unko'];
                       }else{
                     ?> 
                       <form action="index.php" method="get" id="search_form">
                          <input type="text" class="form-control" name="unko" placeholder="search restaurants!" id="input1">
                          <input type="submit" name="submit" class="btn btn-success" value="search them!!" id="search" >
                       </form>

                    <?php
                      }
                    ?>
                      <div class="col-md-12" id="super"></div>
                      <div id="res_details"></div>
                 </div>
              </div>
            </div>

             <script>
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                     var r = JSON.parse(xhttp.responseText);
                     console.log(r);
                     let comment = "View"; 
                     html='';
                     for(let i=0; i<r.length; i++){
                     html+='<div class="card" style="width: 18rem;">';
                     html+='<img src="images/'+r[i].photo+'" class="card-img-top">';
                     html+='<div class="card-body">';
                     html+=' Name :<h3 class="card-title">'+r[i].name+'</h3>';
                     html+=' Location :<h3 class="card-title">'+r[i].location+'</h3>';
                     html+='<button class="btn btn-waring" data-toggle="modal" data-target="#m-'+r[i].id+'"  id="view_btn">'+comment+'</button>';
                     html+='</div>';
                     html+='</div>';
                     html+= '<div class="modal fade" id="m-'+r[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
                    html+= '<div class="modal-dialog modal-dialog-centered" role="document">';
                    html+= '<div class="modal-content">';
                    html+= '<div class="modal-header">';
                    html+= '<h3 class="modal-title" id="exampleModalCenterTitle">Sample information <br>'+r[i].name+'</h3><br>';
                    html+= '<h3 class="modal-title" id="exampleModalCenterTitle">Sample information <br>'+r[i].location+'</h3><br>';
                    html+= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    html+= '<span aria-hidden="true">&times;</span>';
                    html+= '</button>';
                    html+= '</div>';
                    html+= '<div class="modal-body">';
                                 
                    html+= '</div>';
                    html+= '<div class="modal-footer">';
                    html+= '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    html+= '<button type="button" class="btn html+=btn-primary">See Menusc</button>';
                    html+= '</div>';
                    html+= '</div>';
                    html+= '</div>';
                    html+= '</div>';
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
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
  <script src="admin/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="admin/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="admin/assets/js/plugins/bootstrap-switch.js"></script>
  <script src="admin/assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
  <script type="text/javascript"></script>

   <!-- jQuery first, then Popper.js, then Bootstrap JS  -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
  </html>