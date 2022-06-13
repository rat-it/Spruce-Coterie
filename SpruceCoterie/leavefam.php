<?php

	session_start();	
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}

	$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql2 = "DELETE FROM fmem WHERE user = '".$_SESSION['user']."'"; 
	if(mysqli_query($conn, $sql1)){
		mysqli_close($conn);
		echo '<script>';
		echo 'alert("You have left the family!");'; 
		echo 'window.location.href = "user_area.php";';
		echo '</script>';
	}
	else{
		echo "Error: ".$sql1."</br>".mysqli_error($conn);
	}
	
?>