<?php

	session_start();	
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}

	$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql1 = "DELETE from family where member1 like '".$_SESSION['user']."%' and id = ".$_SESSION['fid']."";
	if(mysqli_query($conn, $sql1)){
		$sql2 = "DELETE from fmem WHERE fid = ".$_SESSION['fid']."";
		if(mysqli_query($conn, $sql2)){
			mysqli_close($conn);
			echo '<script>';
			echo 'alert("Family deletion successful!");'; 
			echo 'window.location.href = "user_area.php";';
			echo '</script>';
		}
	}
	else{
		echo "Error: ".$sql1."</br>".mysqli_error($conn);
	}
	
?>