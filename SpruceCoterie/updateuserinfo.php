<?php 

session_start();
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}

if(isset($_POST["UPDATEINFO"])){
	
	if(isset($_POST["contact"])){
		$n1 = $_POST["contact"];
		if(strlen($n1)>11 || strlen($n1)<8){
			echo '<script>alert("Please enter contact number of valid lenght!");</script>';
			return false;
		}
	}
	if(isset($_POST["password"]) && isset($_POST["re_password"])){
		$p1 = $_POST['password'];
		$p2 = $_POST['re_password'];
		if(strlen($p1)<8  || strlen($p1)>30){
			echo '<script>alert("Password length should be greater than 8 and less than 30!");</script>';
		}
		if($p1 != $p2){
			echo '<script>alert("Passwords didn\'t match please try again!");</script>';
		}
	}
	
	if(isset($_POST["description"])){
		$about = $_POST['description'];
	}
	else{
		$about = 'Am new to Spruce Coterie';
	}
	if(isset($_POST["ccity"])){
		$ccity = $_POST['ccity'];
	}
	else{
		$ccity = 'Undefined';
	}
	if(isset($_POST["hcity"])){
		$hcity = $_POST['hcity'];
	}
	else{
		$hcity = 'Undefined';
	}
	if(isset($_POST["wfi"])){
		$wfi = $_POST['wfi'];
	}
	else{
		$wfi = 'Undefined';
	}
	
	$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
		
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$quarry = "UPDATE profile SET aboutyou='".$about."', ccity='".$ccity."', hcity='".$hcity."', wfi='".$wfi."' WHERE user = '".$_SESSION['user']."'";
	
	if(mysqli_query($conn, $quarry)){
		if(isset($_POST['contact'])){
			$sqqql = "UPDATE contactnumber SET contact=".$_POST['contact']." WHERE user='".$_SESSION['user']."'";

				if(mysqli_query($conn, $sqqql)){
					mysqli_close($conn);
					header('Location: user_area.php');
				}
			}
			else{
				mysqli_close($conn);
				header('Location: user_area.php');
			}
		}
		else{
			echo "Error: ".$quarry."</br>".mysqli_error($conn);
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
<body style="background-image: url('images/bg.jpg'); background-repeat: no-repeat; background-attachment: fixed;" >
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
						echo '<li class="nav-item"><a class="nav-link" id=\''.$r["familyname"].'\' href="family.php">'.$r["familyname"].'</a></li>';
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
			<legend style="padding-left:20px; padding-right:20px " ><h3>UPDATE YOUR INFORMATION! </h3></legend>
			<form name="family_create_form" enctype="multipart/form-data" action="" method='POST' align="center" >
				
				
				About You: &nbsp <input type="text" name='description' id='description' placeholder="Few things about you!" style="border-radius:5px; width:25%;"  /><br/><br/>
				Contact Number: &nbsp <input type="number" name='contact' id="contact" placeholder="0009996543" style="border-radius:5px;" /></br></br><br/><br/>
				
				<!--<legend style="padding-left:20px; padding-right:20px " ><h4>WHAT ARE YOUR QUALIFICATIONS </h4></legend>
				
				H.Sc. Score: &nbsp <input type="number" name='hscmarks' id="hscmarks" placeholder="Eg. : 89" style="border-radius:5px; width:20%;" min="0" max="100" />
				H.Sc. From: &nbsp <input type="text" name='hscfrom' id="hscfrom" placeholder="School Name" style="border-radius:5px; width:20%;" /><br/><br/>
				S.Sc. Score: &nbsp <input type="number" name='sscmarks' id="sscmarks" placeholder="Eg. : 79" style="border-radius:5px; width:20%;" min="0" max="100" />
				S.Sc. From: &nbsp <input type="text" name='sscfrom' id="sscfrom" placeholder="School Name" style="border-radius:5px; width:20%;"  /><br/><br/>
				Diploma Score: &nbsp <input type="number" name='dmarks' id="dmarks" placeholder="Eg. : 79" style="border-radius:5px; width:20%;" min="0" max="100" />
				Diploma From: &nbsp <input type="text" name='dfrom' id="dfrom" placeholder="Institute Name" style="border-radius:5px; width:20%;"  /><br/><br/>
				Bachelors Score: &nbsp <input type="number" name='bmarks' id="bmarks" placeholder="Eg. : 8.9" style="border-radius:5px; width:20%;" min="0" max="10" />
				Bachelors From: &nbsp <input type="text" name='bfrom' id="bfrom" placeholder="Institute Name" style="border-radius:5px; width:20%;"  /><br/><br/>
				Masters Score: &nbsp <input type="number" name='mmarks' id="mmarks" placeholder="Eg. : 7.9" style="border-radius:5px; width:20%;" min="0" max="10" />
				Masters From: &nbsp <input type="text" name='mfrom' id="mfrom" placeholder="Institute Name" style="border-radius:5px; width:20%;"  /><br/><br/>
				Phd. Score: &nbsp <input type="number" name='pmarks' id="pmarks" placeholder="Eg. : 8.9" style="border-radius:5px; width:20%;" min="0" max="10" />
				Phd From: &nbsp <input type="text" name='pfrom' id="pfrom" placeholder="Institute Name" style="border-radius:5px; width:20%;"  /><br/><br/><br/><br/>
				-->
				<legend style="padding-left:20px; padding-right:20px " ><h4>RESIDENCE INFO</h4></legend>
				Current City: &nbsp <input type="text" name='ccity' id="ccity" placeholder="Living in city" style="border-radius:5px; width:20%;"  /><br/><br/>
				Home City: &nbsp <input type="text" name='hcity' id="hcity" placeholder="Origin City" style="border-radius:5px; width:20%;"  /><br/><br/>
				Work for income: &nbsp <input type="text" name='wfi' id="wfi" placeholder="Business/Job" style="border-radius:5px; width:20%;"  /><br/><br/>
				
				
				<legend style="padding-left:20px; padding-right:20px " ><h4>CHANGE PASSWORD</h4></legend>
				Password: &nbsp <input type="password" name='password' placeholder="Password" style="border-radius:5px;" title="Lenght of Password should be >8 and <30"  /><br/><br/>
				Re-Enter Password: &nbsp <input type="password" name='re_password' placeholder="Password" style="border-radius:5px;" title="Make sure it matches with above password!"  /><br/><br/>
		
				<input type="submit" name='UPDATEINFO' id='UPDATEINFO' value="UPDATE INFO." class="btn btn-primary" />  
				<input type="reset" name='CLEAR' value="CLEAR" class="btn btn-secondary" />  
				
			</form>
		</fieldset></br></br></br>
		
		<a class="nav-link" href="deleteacc.php" style="margin-left:45%">Delete Account!</a>
	
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  
</div>

</body>
</html>
