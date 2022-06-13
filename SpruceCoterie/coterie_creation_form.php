<?php
	session_start();
		if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}
	if(isset($_POST['createc'])){
		if(isset($_POST["contact"])){
			$n1 = $_POST["contact"];
			if(strlen($n1)>11 || strlen($n1)<8){
				echo '<script>alert("Please enter contact number of valid length!");</script>';
			}
		}
		
		if(isset($_POST['cname']) && isset($_POST['about']) && isset($_POST['contact']) && isset($_POST['email'])){
			$con = new mysqli('localhost','root','','sprucecoteriedb');
			if(!$con){
				die("Connection failed: " . mysqli_connect_error());
			}
			
			$cname = $_POST['cname'];
			$about = $_POST['about'];
			$contact = $_POST['contact'];
			if(isset($_POST['contact2'])){
				$contact2 = $_POST['contact2'];
			}
			else{
				$contact2 = 00000000;
			}
			$email = $_POST['email'];
			$date = date('Y-m-d H:i:s');
			
			$chk=implode(',', $_POST['inte']);
//			$chbx = $_POST['inte'];
	//		$chk = "";
		//	foreach($chbx as $ch1){
			//	$chk .= $ch1.", ";
			//}
			$sql1 = "INSERT INTO coterie (name, description, date, head, phone1, phone2, email, inte) VALUES ('".$cname."', '".$about."', '".$date."', '".$_SESSION['user']."', '".$contact."', '".$contact2."', '".$email."', '".$chk."')";
			$sql2 = "SELECT * FROM coterie ORDER BY id DESC LIMIT 1";
			$r = mysqli_query($con, $sql1);
			$r1 = mysqli_query($con, $sql2);
			if($r1){
				while($row = mysqli_fetch_array($r1)){
					$cid = $row['id'];
				}
				$sql3 = "INSERT INTO cmem (user,cid) VALUES ('".$_SESSION['user']."', ".$cid.")";
				$_SESSION['cid']=$cid;
				if(mysqli_query($con, $sql3)){
					mysqli_close($con);
					echo '<script>';
					echo 'alert("Coterie created successfully");'; 
					echo 'window.location.href = "coterie.php";';
					echo '</script>';
				}
				else{
					echo "Error: ".$sql3."</br>".mysqli_error($con);
					mysqli_close($con);
				}
			}
			else{
				echo "Error: ".$sql2."</br>".mysqli_error($con);
				mysqli_close($con);
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
<body style="background-image: url('images/a1.jpg'); background-repeat: no-repeat; background-attachment: fixed;">

<div class="jumbotron text-center" style="margin-bottom:0; background-color:gray; background-image:url(images/b1.jpg); background-repeat: repeat;">
  <h1 style="color:white;">Spruce Coterie!</h1>
  <p style="color:gray;">Digitalization is future! So is your coterie a part of it!</p> 
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
		while($row = mysqli_fetch_array($result1))
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
	</br></br></br>
	<fieldset style="margin-left:150px; margin-right:150px; " align="center" > 
		<legend style="padding-left:20px; padding-right:20px " ><h3>CREATE COTERIE!</h3></legend>
			<form name="login_form" action="" method='POST' align="center" >
				
				
				Coterie Name:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="text" name='cname' required /><br/><br/>
				Description:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="textarea" name='about' required /><br/><br/>
				Contact Number:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="number" name='contact' required /><br/><br/>
				Optional Contact Number: &nbsp <input type="number" name='contact2' /><br/><br/>
				Email:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="email" name='email' required /><br/><br/>
				<!-- 1 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline1" name="inte[]" value="acting">
					<label class="custom-control-label" for="defaultInline1">Acting</label>
				</div> &nbsp &nbsp &nbsp
				
				<!-- 2 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline2" name="inte[]" value="architecture">
					<label class="custom-control-label" for="defaultInline2">Architecture</label>
				</div> &nbsp &nbsp &nbsp
				<!-- 3 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline3" name="inte[]" value="art">
					<label class="custom-control-label" for="defaultInline3">Art</label>
				</div> </br>
				<!-- 4 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline4" name="inte[]" value="awarenessservice">
					<label class="custom-control-label" for="defaultInline4">Awareness & Services</label>
				</div></br>
				<!-- 5 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline5" name="inte[]" value="business">
					<label class="custom-control-label" for="defaultInline5">Business</label>
				</div> &nbsp &nbsp &nbsp &nbsp
				<!-- 6 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline6" name="inte[]" value="cars">
					<label class="custom-control-label" for="defaultInline6">Cars</label>
				</div> &nbsp &nbsp &nbsp &nbsp
				<!-- 7 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline7" name="inte[]" value="cinephile">
					<label class="custom-control-label" for="defaultInline7">Cinephile</label>
				</div> <br/>
				<!-- 8 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline8" name="inte[]" value="dancing">
					<label class="custom-control-label" for="defaultInline8">Dancing</label>
				</div> &nbsp &nbsp &nbsp &nbsp
				<!-- 9 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline9" name="inte[]" value="decoration">
					<label class="custom-control-label" for="defaultInline9">Decoration</label>
				</div></br>
				<!-- 10 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline10" name="inte[]" value="drinks">
					<label class="custom-control-label" for="defaultInline10">Drinks</label>
				</div></br>
				<!-- 11 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline11" name="inte[]" value="economics">
					<label class="custom-control-label" for="defaultInline11">Economics</label>
				</div>
				<!-- 12 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline12" name="inte[]" value="education">
					<label class="custom-control-label" for="defaultInline12">Education</label>
				</div>
				<!-- 13 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline13" name="inte[]" value="electronics">
					<label class="custom-control-label" for="defaultInline13">Electronics</label>
				</div></br>
				<!-- 14 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline14" name="inte[]" value="facts">
					<label class="custom-control-label" for="defaultInline14">Facts</label>
				</div> &nbsp &nbsp &nbsp
				<!-- 15 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline15" name="inte[]" value="farming">
					<label class="custom-control-label" for="defaultInline15">Farming</label>
				</div></br>
				<!-- 16 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline16" name="inte[]" value="fashion">
					<label class="custom-control-label" for="defaultInline16">Fashion</label>
				</div>
				<!-- 17 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline17" name="inte[]" value="fishing">
					<label class="custom-control-label" for="defaultInline17">Fishing</label>
				</div>
				<!-- 18 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline18" name="inte[]" value="fitness">
					<label class="custom-control-label" for="defaultInline18">Fitness</label>
				</div>
				<!-- 19 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline19" name="inte[]" value="food">
					<label class="custom-control-label" for="defaultInline19">Food</label>
				</div></br>
				<!-- 20 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline20" name="inte[]" value="games">
					<label class="custom-control-label" for="defaultInline20">Games</label>
				</div>
				<!-- 21 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline21" name="inte[]" value="gardening">
					<label class="custom-control-label" for="defaultInline21">Gardening</label>
				</div></br>
				<!-- 22 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline22" name="inte[]" value="machinery">
					<label class="custom-control-label" for="defaultInline22">Machinery</label>
				</div></br>
				<!-- 23 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline23" name="inte[]" value="management">
					<label class="custom-control-label" for="defaultInline23">Management</label>
				</div>
				<!-- 24 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline24" name="inte[]" value="matrimonial">
					<label class="custom-control-label" for="defaultInline24">Matrimonial</label>
				</div></br>
				<!-- 25 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline25" name="inte[]" value="medical">
					<label class="custom-control-label" for="defaultInline25">Medical</label>
				</div> &nbsp &nbsp &nbsp
				<!-- 26 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline26" name="inte[]" value="medicine">
					<label class="custom-control-label" for="defaultInline26">Medicine</label>
				</div> &nbsp &nbsp &nbsp
				<!-- 27 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline27" name="inte[]" value="music">
					<label class="custom-control-label" for="defaultInline27">Music</label>
				</div></br>
				<!-- 28 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline28" name="inte[]" value="nature">
					<label class="custom-control-label" for="defaultInline28">Nature</label>
				</div>
				<!-- 29 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline29" name="inte[]" value="photograpy">
					<label class="custom-control-label" for="defaultInline29">Photograpy</label>
				</div></br>
				<!-- 30 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline30" name="inte[]" value="politics">
					<label class="custom-control-label" for="defaultInline30">Politics</label>
				</div></br>
				<!-- 31 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline31" name="inte[]" value="socialising">
					<label class="custom-control-label" for="defaultInline31">Socialising</label>
				</div> &nbsp &nbsp &nbsp
				<!-- 32 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline32" name="inte[]" value="sports">
					<label class="custom-control-label" for="defaultInline32">Sports</label>
				</div> &nbsp &nbsp &nbsp
				<!-- 33 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline33" name="inte[]" value="stockmarket">
					<label class="custom-control-label" for="defaultInline33">Stockmarket</label>
				</div></br>
				<!-- 34 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline34" name="inte[]" value="stories">
					<label class="custom-control-label" for="defaultInline34">Stories</label>
				</div>
				<!-- 35 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline35" name="inte[]" value="travelling">
					<label class="custom-control-label" for="defaultInline35">Travelling</label>
				</div>
				<!-- 36 -->
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="defaultInline36" name="inte[]" value="research">
					<label class="custom-control-label" for="defaultInline36">Research</label>
				</div></br></br>
				
				<input type="submit" name='createc' value="CREATE COTERIE" class="btn btn-primary" onclick="ValidateEmail()" />  &nbsp &nbsp &nbsp
				<input type="reset" name='CLEAR' value="CLEAR" class="btn btn-secondary" />  
				
				</br></br></br>
				
			</form>
		</fieldset>	
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  <p><a href="contact_us.php">Contact Us...</a></p>
  
</div>

</body>
</html>


<!-- This isnt a permanent form, needs to be included in user page when he clicks create coterie -->
<?php
	
	$connect = new mysqli('localhost','root','','sprucecoteriedb');
	if(isset($_POST['LOGIN'])){
		$l1=$_POST['coterie_name'];
		$l2=$_POST['description'];
		$l3=$_POST['contact_person'];
		$l4=$_POST['contact_number_1'];
		$l5=$_POST['email'];
		
		$quary = "insert into family(f_id,f_name,about,f_head,f_contact,member1) VALUES(DEFAULT,'".$l1."','".$l2."',".$l3.",".$l4.",".$l5.")";
			//$sam=mysqli_query($connect, $quary);
		
		if($connect->query($quary)==true){
			echo '<script>alert("Family Created!");</script>';
		}
	}

?>
<html>
	<head><link rel="shortcut icon" type="image/png" href="\favicon.png" sizes="16x16" />
	</head>
	<body align='center'>
		
		
	</body>
</html>
