<?php
	session_start();
		if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}

if(isset($_POST["submit"])){
	$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
	$quarry = "SELECT * FROM tabless WHERE user='".$_SESSION['user']."'";
	$ret = mysqli_query($conn, $quarry);	
	$match  = mysqli_num_rows($ret);
	if(!$ret){
				die("Query did not execute...".mysqli_error($con));
			}
	else{
		if($match>0){
			mysqli_close($conn);
			$connect = new mysqli("localhost","root","","sprucecoteriedb");
			if(is_uploaded_file($_FILES["demo"]["tmp_name"]))
			{
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["demo"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));	
				$filename=$_FILES["demo"]["name"];
				$check = getimagesize($_FILES["demo"]["tmp_name"]);
				if($check !== false){
					$uploadOk = 1;
				}
				else{
					echo "File is not an image.";
					$uploadOk = 0;
				}
				if(file_exists($target_file)){
					echo '<script>alert("Sorry, file already exists.\nPlease rename the file."); window.history.back();</script>';
					$file_existed=1;
					$uploadOk = 0;
				}
				if ($uploadOk == 1){
					if(move_uploaded_file($_FILES["demo"]["tmp_name"], $target_file)){
						$file_uploaded=1;
					} 
					else{
						echo "Sorry, there was an error uploading your file.";
					}
				}
				$query = "UPDATE tabless SET path='uploads/$filename' WHERE user='".$_SESSION['user']."'";
				if(mysqli_query($connect, $query)){
					echo '<script>alert("Image submited")</script>';
					header('Location: user_area.php');
				}
			}
			
		}
		else{
			mysqli_close($conn);
			$connect = new mysqli("localhost","root","","sprucecoteriedb");
			if(is_uploaded_file($_FILES["demo"]["tmp_name"]))
			{
				$target_dir = "fuploads/";
				$target_file = $target_dir . basename($_FILES["demo"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));	
				$filename=$_FILES["demo"]["name"];
				$check = getimagesize($_FILES["demo"]["tmp_name"]);
				if($check !== false){
					$uploadOk = 1;
				}
				else{
					echo "File is not an image.";
					$uploadOk = 0;
				}
				if(file_exists($target_file)){
					echo '<script>alert("Sorry, file already exists.\nPlease rename the file."); window.history.back();</script>';
					$file_existed=1;
					$uploadOk = 0;
				}
				if ($uploadOk == 1){
					if(move_uploaded_file($_FILES["demo"]["tmp_name"], $target_file)){
						$file_uploaded=1;
					} 
					else{
						echo "Sorry, there was an error uploading your file.";
					}
				}
				$query = "INSERT INTO tabless (path, user) VALUES ('uploads/$filename','".$_SESSION['user']."')";
				if(mysqli_query($connect, $query)){
					echo '<script>alert("Image submited")</script>';
					header('Location: user_area.php');
		
				}
			}
			
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Spruce Coterie</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/png" href="images/favicon1.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body style="background-image: url('images/bg.jpg'); background-repeat: no-repeat; background-attachment: fixed; text-align:center;" >

<div class="jumbotron text-center" style="margin-bottom:0; background-color:gray; background-image:url(images/tree4.jpg); background-repeat: repeat;">
  <h1 style="color:black;">Spruce Coterie!</h1>
  <p>Digitalization is future! So is your coterie a part of it!</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="user_area.php">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <?php // left side upr family name code
		$con = new mysqli("localhost","root","","sprucecoteriedb");
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		$sql1 = "SELECT * FROM fmem WHERE user LIKE '".$_SESSION['user']."%' ";
		if(mysqli_query($con,$sql1)){
			$result = mysqli_query($con,$sql1);
			while($row = mysqli_fetch_array($result))
			{	
				$sql2 = "SELECT * FROM family WHERE id = ".$row['fid']."";
				if(mysqli_query($con,$sql2)){
					$ret = mysqli_query($con,$sql2);
					while($r = mysqli_fetch_array($ret)){
						echo '<li class="nav-item"><a class="nav-link" id=\''.$r["familyname"].'\' href="family.php">'.$r["familyname"].'</a></li>';
					}
				}
			}
		}
		mysqli_close($con);
	  ?>
	  
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="index.php">Log Out</a>
      </li>
	  
      <li class="nav-item">
		<?php
			$con = new mysqli("localhost","root","","sprucecoteriedb");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}
			$sqql1 = "SELECT * from fullname where user like '".$_SESSION['user']."%' ";
			$result = mysqli_query($con,$sqql1);
			while($row = mysqli_fetch_array($result))
			{
				echo '<li class="nav-item"><label class="nav-link"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Hi, '.$row["fname"].'</label></li>';
			}
			mysqli_close($con);
		?>
	  
	</ul>
	 <!-- <?php 
		$con = new mysqli("localhost","root","","sprucecoteriedb");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		$sqql = "SELECT * from coterie where ( member1 = ".$_SESSION['user']." or member2 = ".$_SESSION['user']." or member3 = ".$_SESSION['user']." or member4 = ".$_SESSION['user']." or member5 = ".$_SESSION['user']." or member6 = ".$_SESSION['user'].")";
		$result1 = mysqli_query($con,$sqql);
		while($row1 = mysqli_fetch_array($result1))
		{
			echo '<li class="nav-item"><a class="nav-link" href="coterie.php">'.$row["coteriename"].'</a></li>';
		}
	  //infamily details 
	  ?>
    --></ul>
  </div>
</nav>

<fieldset style="text-align:center;" >
	
	<legend style="padding-left:20px; padding-right:20px " > </br></br><h3>CHANGE DISPLAY PICTURE </h3></legend>
		<form name="dpchange_form" enctype="multipart/form-data" action="" method='POST' align="center" id="uploadForm" >
			</br>
		<input type="file" name="demo" id="demo" style="border-radius:5px;" /> 
		<input type="submit" name="submit" id="submit" value="Upload" class="btn btn-primary" /> &nbsp
		<input type="reset" name='CLEAR' id="clear" value="CLEAR" class="btn btn-secondary" /> </br></br> 
</form>
 <script>
	function filePreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#uploadForm + embed').remove();
				$('#uploadForm').after('</br><embed src="'+e.target.result+'" width="450" height="300">');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#demo").change(function () {
		filePreview(this);
	});
  </script>

	
<div class="jumbotron text-center" style="margin-top:25%">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  
</div>
</body>
</html>
