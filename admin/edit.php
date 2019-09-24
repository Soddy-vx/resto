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
				<h1>Edit your restaurant here!!</h1>
				<div id="demo"></div>
				<form action="functions.php?do=edit" method="post">
					<div class="form-control2">
						<p>Name :</p><input type="text" name="name" id='name'>
						<p>Location :</p><input type="text" name="location" id='location'>
						<p>Price_range :</p><input type="text" name="price_range"id="price_range">
						<p>photo :</p><input type="text" name="photo" id="photo"><br>
						<input type="hidden" name="id" id="id">
						<input type="submit" name="submit" value="Done edit" >
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       var r = JSON.parse(xhttp.responseText);
	       console.log(r);
	       document.getElementById('name').value        =r[0].name;//上のインプットのIDにセレクトされたIDのデータを埋め込むここは名前
	       document.getElementById('location').value    =r[0].location;//ロケーション
	       document.getElementById('price_range').value =r[0].price_range;//星
	       document.getElementById('photo').value       =r[0].photo;//写真
	       document.getElementById('id').value          =r[0].id;//ID

	   	 	}
		};

		xhttp.open("GET", "functions.php?do=get&id=<?php echo $_GET['id']; ?>", true);
		//functions.phpのdo=getのときgetRestaurant()が動くようになってる。getRestaurant()の中身はJSONデータ、だからrにはJSONのデータが入り、JSON.parseでJavascriptで使えるデータに変換してる〜〜〜。ここではid=URLに含まれているidすなわち必ず一つのJSONデータしか選ばれないので、r[0].nameでその名前がnameID(inputの)のvalueに書き替わる。
		xhttp.send();

	</script>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  </body>
</html>