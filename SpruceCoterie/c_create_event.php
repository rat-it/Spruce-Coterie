<?php 
	session_start();	
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}

if(isset($_POST["CREATEEVENT"])){
	
	if(isset($_POST["ename"]) && isset($_POST["eabout"])){
		$ename = $_POST['ename'];
		$description = $_POST['eabout'];
		
		$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
		
		if(!$conn){
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$quarry = "INSERT INTO cevents (cid, ename, eabout, count) VALUES (".$_SESSION['cid'].", '".$ename."', '".$description."', 1)";
		
		if(mysqli_query($conn, $quarry)){
			mysqli_close($conn);
			
			$con = new mysqli("localhost","root","","sprucecoteriedb");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}
			$eid = "SELECT LAST(id) FROM events";
			$lastid = mysqli_query($con,$eid);
			
			mysqli_close($con);
			header('Location: coterie.php');
		}
		else{
			echo "Error: ".$quarry."</br>".mysqli_error($conn);
		}
	}
}

?>

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
<body style="background-image: url('images/a1.jpg'); background-repeat: no-repeat; background-attachment: fixed; text-align:center;" >
<div class="jumbotron text-center" style="margin-bottom:0; background-color:gray; background-image:url(images/b1.jpg); background-repeat: repeat;">
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
      <li class="nav-item">
        <a class="nav-link" href="index.php">Log Out</a>
      </li>
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
						echo '<li class="nav-item"><a class="nav-link" href="family.php">'.$r["familyname"].'</a></li>';		
					}
				}
				
			}
		}
		mysqli_close($con);
	  
	  ?>
	  <?php //if there's a family then show here! ?>
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
      </li>
	
    </ul>
  </div>
</nav>
	<?php 
		$con = new mysqli("localhost","root","","sprucecoteriedb");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		$sql = "SELECT path FROM tabless WHERE user = '".$_SESSION['user']."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result))
		{
			echo "<img src='".$row['path']."' alt=\"Profile Pic\" class=\"fakeimg\" style=\"position:absolute; margin-left:75%; border-radius:50%; margin-top:-140px; \" />";
		}
		mysqli_close($con);
	
	?>

	
	</br></br>
		<fieldset style="text-align:center;" >
			<legend style="padding-left:20px; padding-right:20px " ><h3>CREATE EVENT </h3></legend>
			<form name="createevent_form" enctype="multipart/form-data" action="" method='POST' algin="center" >
				
				Event Name: <input type="text" name="ename" id="ename" style="border-radius:5px;" required /> </br> </br>
				<div> 
					<label for="eabout" style="vertical-align:middle;" >Event Details: </label>
					<textarea name="eabout" id="eabout" rows="5" style="border-radius:5px; width:500px; vertical-align:middle; " required ></textarea> 
				</div> </br></br></br>
				
				<input type="submit" name='CREATEEVENT' id='CREATEEVENT' value="CREATE EVENT" class="btn btn-primary" />  
				<input type="reset" name='CLEAR' value="CLEAR" class="btn btn-secondary" />  
				
			</form>
		</fieldset></br></br></br>
		
	
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  
</div>

</body>
</html>