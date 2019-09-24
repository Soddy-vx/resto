<?php include('header.php'); ?>
	<div class="container-fluid">
       <div class="row">
        <div class="col-md-2">
          <div class="sidebar" data-image="assets/img/sidebar-4.jpg" >       
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
				<h1>Edit users here!!</h1>
				<form action="functions.php?do=editUser" method="post">
					<div id="idX"></div>
					<input type="hidden" name="id" id="idX">
					<div class="form-group">
						<input type="text" class="form-control" name="nameX" placeholder="change your name" id="nameX">
						<input type="text" class="form-control" name="passwordX" placeholder="change your password" id="passwordX">
					</div>
					<input type="submit" name="edit" value="edit" class="btn btn-warning"><br><hr>
					<a href="account.php"> Go Back </a><br>
					<a href="index.php">Home</a>
				</form>

			</div>
		</div>
	</div>

<script>

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       let r = JSON.parse(xhttp.responseText);
       document.getElementById("idX").innerHTML='<h1>'+'User ID is :'+r[0].id+'</h1>';
       document.getElementById("nameX").value=r[0].name;
       document.getElementById("passwordX").value=r[0].pass;
    }
};
xhttp.open("GET", "functions.php?do=insertU&id=<?php echo $_GET['id']; ?>", true);//functions.phpの後の?do=indertUがあるからfunction.phpファイルの中にあるindertUファンクションが発火しJSONデータが表示される。

xhttp.send();
</script>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
</html>