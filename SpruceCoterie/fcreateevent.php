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
		
		$quarry = "INSERT INTO fevents (fid, ename, eabout, count) VALUES (".$_SESSION['fid'].", '".$ename."', '".$description."', 1)";
		
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
			header('Location: family.php');
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
		
<!--				<label class="radio-inline">
					<input type="radio" name="desire" value="visiting">Visiting
				</label> &nbsp &nbsp &nbsp
				<label class="radio-inline">
					<input type="radio" name="desire" value="maybe">May be
				</label> &nbsp &nbsp &nbsp
				<label class="radio-inline">
					<input type="radio" name="desire" value="nope">Nope
				</label> </br>
				
				
				Set a family image: &nbsp <input type="file" id="event_ico" name="event_ico" style="border-radius:5px" /> </br></br>
				
				<!-- 1 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline1" name="acting">
					<label class="custom-control-label" for="defaultInline1">Acting</label>
				</div>
				
				<!-- 2 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline2" name="architecture">
					<label class="custom-control-label" for="defaultInline2">Architecture</label>
				</div>
				<!-- 3 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline3" name="art">
					<label class="custom-control-label" for="defaultInline3">Art</label>
				</div> </br>
				<!-- 4 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline4" name="awarenessservice">
					<label class="custom-control-label" for="defaultInline4">Awareness & Services</label>
				</div></br>
				<!-- 5 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline5" name="business">
					<label class="custom-control-label" for="defaultInline5">Business</label>
				</div>
				<!-- 6 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline6" name="cars">
					<label class="custom-control-label" for="defaultInline6">Cars</label>
				</div>
				<!-- 7 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline7" name="cinephile">
					<label class="custom-control-label" for="defaultInline7">Cinephile</label>
				</div> <br/>
				<!-- 8 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline8" name="dancing">
					<label class="custom-control-label" for="defaultInline8">Dancing</label>
				</div>
				<!-- 9 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline9" name="decoration">
					<label class="custom-control-label" for="defaultInline9">Decoration</label>
				</div></br>
				<!-- 10 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline10" name="drinks">
					<label class="custom-control-label" for="defaultInline10">Drinks</label>
				</div></br>
				<!-- 11 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline11" name="economics">
					<label class="custom-control-label" for="defaultInline11">Economics</label>
				</div>
				<!-- 12 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline12" name="education">
					<label class="custom-control-label" for="defaultInline12">Education</label>
				</div>
				<!-- 13 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline13" name="electronics">
					<label class="custom-control-label" for="defaultInline13">Electronics</label>
				</div></br>
				<!-- 14 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline14" name="facts">
					<label class="custom-control-label" for="defaultInline14">Facts</label>
				</div>
				<!-- 15 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline15" name="farming">
					<label class="custom-control-label" for="defaultInline15">Farming</label>
				</div></br>
				<!-- 16 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline16" name="fashion">
					<label class="custom-control-label" for="defaultInline16">Fashion</label>
				</div>
				<!-- 17 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline17" name="fishing">
					<label class="custom-control-label" for="defaultInline17">Fishing</label>
				</div>
				<!-- 18 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline18" name="fitness">
					<label class="custom-control-label" for="defaultInline18">Fitness</label>
				</div>
				<!-- 19 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline19" name="food">
					<label class="custom-control-label" for="defaultInline19">Food</label>
				</div></br>
				<!-- 20 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline20" name="games">
					<label class="custom-control-label" for="defaultInline20">Games</label>
				</div>
				<!-- 21 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline21" name="gardening">
					<label class="custom-control-label" for="defaultInline21">Gardening</label>
				</div></br>
				<!-- 22 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline22" name="machinery">
					<label class="custom-control-label" for="defaultInline22">Machinery</label>
				</div></br>
				<!-- 23 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline23" name="management">
					<label class="custom-control-label" for="defaultInline23">Management</label>
				</div>
				<!-- 24 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline24" name="matrimonial">
					<label class="custom-control-label" for="defaultInline24">Matrimonial</label>
				</div></br>
				<!-- 25 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline25" name="medical">
					<label class="custom-control-label" for="defaultInline25">Medical</label>
				</div>
				<!-- 26 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline26" name="medicine">
					<label class="custom-control-label" for="defaultInline26">Medicine</label>
				</div>
				<!-- 27 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline27" name="music">
					<label class="custom-control-label" for="defaultInline27">Music</label>
				</div></br>
				<!-- 28 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline28" name="nature">
					<label class="custom-control-label" for="defaultInline28">Nature</label>
				</div>
				<!-- 29 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline29" name="photograpy">
					<label class="custom-control-label" for="defaultInline29">Photograpy</label>
				</div></br>
				<!-- 30 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline30" name="politics">
					<label class="custom-control-label" for="defaultInline30">Politics</label>
				</div></br>
				<!-- 31 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline31" name="socialising">
					<label class="custom-control-label" for="defaultInline31">Socialising</label>
				</div>
				<!-- 32 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline32" name="sports">
					<label class="custom-control-label" for="defaultInline32">Sports</label>
				</div>
				<!-- 33 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline33" name="stockmarket">
					<label class="custom-control-label" for="defaultInline33">Stockmarket</label>
				</div></br>
				<!-- 34 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline34" name="stories">
					<label class="custom-control-label" for="defaultInline34">Stories</label>
				</div>
				<!-- 35 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline35" name="travelling">
					<label class="custom-control-label" for="defaultInline35">Travelling</label>
				</div>
				<!-- 36 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline36" name="research">
					<label class="custom-control-label" for="defaultInline36">Research</label>
				</div></br></br>
				
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