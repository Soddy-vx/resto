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
            	<div class="align-center">
					<h1>Add a new restaurant!</h1>
					<div id="demodemo"	></div>
				</div>
				<form action="functions.php?do=add" method="post"  enctype="multipart/form-data" id="add_resto_form">
						Name:<br> 
						<input type="text" name="name" class="control-form"><br>

						Location:<br> 
						<input type="text" name="location" class="control-form"><br>

						price_range: <br>
						<input type="text" name="price_range" class="control-form"><br>

						Select image to upload:<br> 
							<input type="file" name="file" id="fileToUpload">
							<input type="submit" value="Upload Image" name="submit"><br>

						<input type="submit" name="submit" value="submit" class="control-form btn btn-info"><br>
						<a href="index.php" id="add_resto_cancel">Cancel</a>
				</form>
				
			</div>
		</div>
	</div>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
</html>