<?php
 require_once('db.php');
 
 if(isset($_GET['do'])){
 	if($_GET['do']=='list') showRestaurants();
 	if($_GET['do']=='get')  getRestaurant();
 	if($_GET['do']=='login') login();
 	if($_GET['do']=='logout') logout(); 
 	if($_GET['do']=='delete') delete();

  }

  function login(){
  	global $conn;
  	$name = $_POST['name'];
  	$password = $_POST['password'];

  	$sql="SELECT * FROM `users2` WHERE `username` = '".$name."' AND `password` = '".$password."'";
  	$result=$conn->query($sql);
  	//print_r($result);
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
?>