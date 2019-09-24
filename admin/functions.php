<?php
 require_once('db.php');
 
 if(isset($_GET['do'])){
 	if($_GET['do']=='list') showRestaurants();
 	if($_GET['do']=='add')  add();
 	if($_GET['do']=='get')  getRestaurant();
 	if($_GET['do']=='edit') edit();
 	if($_GET['do']=='showUser') showUser();
 	if($_GET['do']=='editUser') editUser();
 	if($_GET['do']=='login') login();
 	if($_GET['do']=='logout') logout();
 	if($_GET['do']=='insertU') insertU(); 
 	if($_GET['do']=='delete') delete();

  }

  function login(){
  	global $conn;
  	$name = $_POST['name'];
  	$password = $_POST['password'];

  	$sql="SELECT * FROM `users2` WHERE `username` = '".$name."' AND `password` = '".$password."'";
  	$result=$conn->query($sql);
  	print_r($result);
 	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			setcookie('uid',$row['id'], time() + (86400 * 30), "/");
			setcookie('username',$row['username'],time()+(86400 * 30), "/");
			header('location: index.php');
		}
	}else{
			header('location:login.php?m=Wrong username or password!');
		}
  }

  function logout(){
  	setcookie('uid','', time() + (-86400 * 30), "/");
	setcookie('username','',time()+(-86400 * 30), "/");
	header('location:login.php?m=Please Login!');
  }


 function showRestaurants(){
 	global $conn;
 	$response="[";
 	$sql="SELECT * FROM `restaurants`";	
 	if(isset($_GET['unko'])){
 		$sql="SELECT * FROM `restaurants` WHERE `name` LIKE '%".$_GET['unko']."%'";
 	}
 	$result=$conn->query($sql);
 	if($result->num_rows > 0){
 		while($row=$result->fetch_assoc()){
 			$response.= '{';
 			$response.= '"id":"'         .$row['id'].'",';
 			$response.= '"name":"'       .$row['name'].'",';
 			$response.= '"location":"'   .$row['location'].'",';
 			$response.= '"price_range":"'.$row['price_range'].'",'; 
 			$response.= '"photo":"'      .$row['photo'].'"'; 
 			$response.= "},";
 		}
 	}
	 	$response.="]";
	 	$response = str_replace("},]","}]",$response);
	 	echo $response;
 	}

 function add(){
 	global $conn;
 	$sql='SELECT * FROM `restaurants`';
 	if($_GET['do'] === "add"){
 		if(isset($_FILES['file'])){
	 		move_uploaded_file($_FILES['file']['tmp_name'], 'images/'.basename($_FILES["file"]["name"]));
	 		echo '<img src="images/'.basename($_FILES["file"]["name"]).'">';
	 		// header('Location:add.php');
 			$sql="INSERT INTO `restaurants` (`name`, `location`, `price_range`, `photo`) VALUES ('".$_POST['name']."', '".$_POST['location']."', '".$_POST['price_range']."', '".basename($_FILES["file"]["name"])."');";
 			$result=$conn->query($sql);
 			//var_dump($result);
 			header('Location: index.php');
 			//header('Location: index.php?unko='.$_POST['name']);
	 	}
	  }
	 }

 function getRestaurant(){
 	global $conn;
 	$response="[";
 	$sql="SELECT * FROM `restaurants` where `id`= '".$_GET['id']."'";	
 	$result=$conn->query($sql);
 	if($result->num_rows > 0){
 		while($row=$result->fetch_assoc()){
 			$response.= '{';
 			$response.= '"id":"'         .$row['id'].'",';
 			$response.= '"name":"'       .$row['name'].'",';
 			$response.= '"location":"'   .$row['location'].'",';
 			$response.= '"price_range":"'.$row['price_range'].'",'; 
 			$response.= '"photo":"'      .$row['photo'].'"'; 
 			$response.= "},";
 		}
 	}
 			$response.="]";
 			$response = str_replace("},]","}]",$response);
 			echo $response;

 }

 function edit(){
 	global $conn;
 	$sql    = "SELECT * FROM `restaurants`";	
 	$result = $conn->query($sql);
 	if($result->num_rows > 0){
 		while($row=$result->fetch_assoc()){
 	$sql    = "UPDATE `restaurants` SET `name` = '".$_POST['name']."', `location` = '".$_POST['location']."', `price_range` = '".$_POST['price_range']."', `photo` = '".$_POST['photo']."' WHERE `restaurants`.`id` = '".$_POST['id']."';";
 	$result = $conn->query($sql);
 	header('Location:index.php');
	}
 }	
 }


 function showUser(){//何をしたいかというと...JavascriptでPHPのshowUser()を呼び出したい：⭐️へ飛ぶ
 	global $conn;
 	$response="[";
 	$sql="SELECT * FROM `users2`";	
 	// if(isset($_GET[''])){
 	// 	$sql="SELECT * FROM `restaurants` WHERE `name` LIKE '%".$_GET['unko']."%'";
 	// }
 	$result=$conn->query($sql);
 	//print_r($result);
 	if($result->num_rows > 0){
 		while($row=$result->fetch_assoc()){
 			$response.= '{';
 			$response.= '"id":"'         .$row['id'].'",';
 			$response.= '"name":"'       .$row['username'].'",';
 			$response.= '"password":"'   .$row['password'].'"';
 			$response.= "},";
 		}
 	}
	 	$response.="]";
	 	$response = str_replace("},]","}]",$response);
	 	echo $response;
 	}

   function	insertU(){
   	global $conn;
   	$response="[";
   	$sql="SELECT * FROM `users2` where `id`= '".$_GET['id']."';";//where `id`=$_GET['id']がないと絞り込まれなくてすべてのJSON dataが表示されてしまう。
   	$result=$conn->query($sql);
   	if($result->num_rows > 0){
 		while($row=$result->fetch_assoc()){
 			$response.= '{';
 			$response.= '"id":"'         .$row['id'].'",';
 			$response.= '"name":"'       .$row['username'].'",';
 			$response.= '"pass":"'   .$row['password'].'"';
 			$response.= "},";
 		}
 	}
	 	$response.="]";
	 	$response = str_replace("},]","}]",$response);
	 	echo $response;
 	}


 	function editUser(){
 		global $conn;
 		$sql    ="SELECT * FROM `users2` where `id`='".$_COOKIE['uid']."'";
 		$result = $conn->query($sql);
		if($result->num_rows > 0){
 			while($row=$result->fetch_assoc()){
 		$sql="UPDATE `users2` SET `username` = '".$_POST['nameX']."', `password` = '".$_POST['passwordX']."' WHERE `users2`.`id` = '".$row['id']."';";
 		$result = $conn->query($sql);
 		header('Location:account.php');


	 	}
	 	}
	 }

	 function delete(){
	 	global $conn;
	 	$sql="DELETE FROM `restaurants` WHERE `restaurants`.`id` = '".$_GET['id']."';";
	 	$result = $conn->query($sql);
	 	print_r($sql);
	 	header('location:index.php');
	 }

 	
   






?>