<?php
	session_start();	
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
	}
	.open-button {
	  background-color: #555;
	  color: white;
	  padding: 16px 20px;
	  border: none;
	  cursor: pointer;
	  opacity: 0.8;
	  position: fixed;
	  bottom: 23px;
	  right: 28px;
	  width: 280px;
	}

	/* The popup form - hidden by default */
	.form-popup {
	  display: none;
	  position: fixed;
	  bottom: 0;
	  right: 15px;
	  border: 3px solid #f1f1f1;
	  z-index: 9;
	}

	/* Add styles to the form container */
	.form-container {
	  max-width: 300px;
	  padding: 10px;
	  background-color: white;
	}

	/* Full-width input fields */
	.form-container input[type=text], .form-container input[type=password] {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  border: none;
	  background: #f1f1f1;
	}

	/* When the inputs get focus, do something */
	.form-container input[type=text]:focus, .form-container input[type=password]:focus {
	  background-color: #ddd;
	  outline: none;
	}

	/* Set a style for the submit/login button */
	.form-container .btn {
	  background-color: #4CAF50;
	  color: white;
	  padding: 16px 20px;
	  border: none;
	  cursor: pointer;
	  width: 100%;
	  margin-bottom:10px;
	  opacity: 0.8;
	}

	/* Add a red background color to the cancel button */
	.form-container .cancel {
	  background-color: red;
	}

	/* Add some hover effects to buttons */
	.form-container .btn:hover, .open-button:hover {
	  opacity: 1;
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
						echo '<li class="nav-item"><a class="nav-link" href="family.php">'.$r["familyname"].'</a></li>';		
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
	<?php 
		$con = new mysqli("localhost","root","","sprucecoteriedb");
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		$sqql = "SELECT * from family where ( member1 = ".$_SESSION['user']." or member2 = ".$_SESSION['user']." or member3 = ".$_SESSION['user']." or member4 = ".$_SESSION['user']." or member5 = ".$_SESSION['user']." or member6 = ".$_SESSION['user'].")";
		if(mysqli_query($con,$sqql)){
			$result1 = mysqli_query($con,$sqql);
			while($row = mysqli_fetch_array($result1))
			{
				$fid = $row["id"];
			}
		}
		else{
			$fid = null;
		}
		
		$sql = "SELECT path FROM tabless WHERE user = '".$_SESSION['user']."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result))
		{
			echo "<img src='".$row['path']."' alt=\"Profile Pic\" class=\"fakeimg\" style=\"position:absolute; margin-left:75%; border-radius:50%; margin-top:-140px; \" />";
		}
		mysqli_close($con);
	
	?>
	
<div class="container" style="margin-top:50px">
	<div class="row">
		<div class="col-sm-3">
    		<h3>You and just you!</h3>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<label class="nav-link active" >Interests!</label>
				</li>
					<?php
					$con = new mysqli("localhost","root","","sprucecoteriedb");
					if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
					
					$sqll = "SELECT * FROM interests WHERE user = '".$_SESSION['user']."'";
					$result = mysqli_query($con,$sqll);
					if(mysqli_query($con, $sqll)){
						while($row = mysqli_fetch_array($result))
						{
							$i = explode(",", $row['inte']);
							foreach($i as $q){
								echo '<li class="nav-item" ><a class="nav-link" href="#" style="margin-left:15px; ">  '.ucfirst($q).'</a></li>';	
							}
						}
					}
					mysqli_close($con);
			?>

				<li class="nav-item">
					<a class="nav-link" href="interests.php">Modulate Interests...</a>
				</li>
			</ul>
			</br>
			</br>
			</br>
			<h2 class="nav-link active">Lonely are we?</h2>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<a class="nav-link" href="join_coterie.php">Join Coterie</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="coterie_creation_form.php">Create Coterie</a>
				</li>
			</ul>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-6">
			
			<?php 
				$sql1 = "SELECT * FROM fevents WHERE 1";
				
				$con = new mysqli("localhost","root","","sprucecoteriedb");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}
				$arr = array();
				$x = 0;
				$result = mysqli_query($con,$sql1);
				while($row = mysqli_fetch_array($result))
				{
					$x = $row["id"];
					echo '<div class="fakeimg" style="padding-top:8px; padding-bottom:10px; padding-left:15px; padding-right:8px; border-radius:5px;" ><h3>Name: '.$row["ename"].'</h3></br><h5>Details: '.$row["eabout"].'</h5></br><h6>Visiting members: '.$row["count"].'</h6>
						 <form id="formid'.$x.'" method="GET" ><label style:"margin-left:50px;"> Desire</label> 
						  <select id="sel'.$x.'" name="selc'.$x.'" onchange="checkAndSubmit'.$x.'() ">
								<option value="0" >Not interested</option>
								<option value="0.5" >May Be</option>
								<option value="1" >Surely will be visiting</option>
						  </select></form></div>';
						echo '<script>function checkAndSubmit'.$x.'(){  if(document.getElementById("sel'.$x.'").selectedIndex > 0){ document.getElementById("formid'.$x.'").submit();}}</script>';
					if(isset($_GET['selc'.$x])){
						$addc = $_GET['selc'.$x];
						$sql2 = "UPDATE fevents SET count = count + ".$addc." WHERE id=".$x."";
						if(mysqli_query($con, $sql2)){
						}
						else{
							echo "Error: ".$sql2."</br>".mysqli_error($con);
						}
					}
				}
				mysqli_close($con);
			?>
			
		</div>
		<div class="col-sm-2">
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<a href="fcreateevent.php" class="nav-link active" >Event +</a>
				</li> </br>
				<li class="nav-item">
					<a href="faminfo.php" class="nav-link active" >View Family</a>
				</li></br>
				<?php 
					$sql1 = "SELECT * from family where member1 like '".$_SESSION['user']."%'";
					$con = new mysqli("localhost","root","","sprucecoteriedb");
					if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
					if(mysqli_query($con,$sql)){
						mysqli_close($con);
						echo '<li class="nav-item"><a href="delfam.php" class="nav-link active" >Delete Family</a></li>';
					}
					else{
						mysqli_close($con);
						echo '<li class="nav-item"><a href="leavefam.php" class="nav-link active" >Leave Family</a></li>';
					}
				?>
				
			</ul>
		</div>
	</div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  
</div>

</body>
</html>
