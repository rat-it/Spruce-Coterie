<?php

	session_start();	
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}

	$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql2 = "DELETE FROM contactnumber WHERE user='".$_SESSION['user']."'";
	$sql3 = "DELETE FROM dob WHERE user='".$_SESSION['user']."'";
	$sql4 = "DELETE FROM events WHERE user='".$_SESSION['user']."'";
	$sql5 = "DELETE FROM fullname WHERE user='".$_SESSION['user']."'";
	$sql6 = "DELETE FROM interests WHERE user='".$_SESSION['user']."'";
	$sql7 = "DELETE FROM login WHERE u_name='".$_SESSION['user']."'";
	$sql8 = "DELETE FROM tabless WHERE user='".$_SESSION['user']."'";
	$sql9 = "DELETE FROM profile WHERE user='".$_SESSION['user']."'";

		if(mysqli_query($conn, $sql2)){
			if(mysqli_query($conn, $sql3)){
				if(mysqli_query($conn, $sql4)){
					if(mysqli_query($conn, $sql5)){
						if(mysqli_query($conn, $sql6)){
							if(mysqli_query($conn, $sql7)){
								if(mysqli_query($conn, $sql8)){
									if(mysqli_query($conn, $sql9)){
										mysqli_close($conn);
										header('Location: index.php');
									}
									else{
										echo "Error: ".$sql9."</br>".mysqli_error($conn);
									}
								}
								else{
									echo "Error: ".$sql8."</br>".mysqli_error($conn);
								}
							}
							else{
								echo "Error: ".$sql7."</br>".mysqli_error($conn);
							}
						}
						else{
							echo "Error: ".$sql6."</br>".mysqli_error($conn);
						}
					}
					else{
						echo "Error: ".$sql5."</br>".mysqli_error($conn);
					}
				}
				else{
					echo "Error: ".$sql4."</br>".mysqli_error($conn);
				}
			}
			else{
				echo "Error: ".$sql3."</br>".mysqli_error($conn);
			}
		}
		else{
			echo "Error: ".$sql2."</br>".mysqli_error($conn);
		}
?>