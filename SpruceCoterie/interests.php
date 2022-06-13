<?php 

session_start();
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}

if(isset($_POST["SUBMIT"])){
	//1
	if(isset($_POST["acting"])){
		$a1 = 1;
	}
	else{
		$a1 = 0;
	}
	//2
	if(isset($_POST["architecture"])){
		$a2 = 1;
	}
	else{
		$a2 = 0;
	}
	//3
	if(isset($_POST["art"])){
		$a3 = 1;
	}
	else{
		$a3 = 0;
	}
	//4
	if(isset($_POST["awarenessservice"])){
		$a4 = 1;
	}
	else{
		$a4 = 0;
	}
	//5
	if(isset($_POST["business"])){
		$a5 = 1;
	}
	else{
		$a5 = 0;
	}
	//6
	if(isset($_POST["cars"])){
		$a6 = 1;
	}
	else{
		$a6 = 0;
	}
	//7
	if(isset($_POST["cinephile"])){
		$a7 = 1;
	}
	else{
		$a7 = 0;
	}
	//8
	if(isset($_POST["dancing"])){
		$a8 = 1;
	}
	else{
		$a8 = 0;
	}
	//9
	if(isset($_POST["decoration"])){
		$a9 = 1;
	}
	else{
		$a9 = 0;
	}
	//10
	if(isset($_POST["drinks"])){
		$a10 = 1;
	}
	else{
		$a10 = 0;
	}
	//11
	if(isset($_POST["economics"])){
		$a11 = 1;
	}
	else{
		$a11 = 0;
	}
	//12
	if(isset($_POST["education"])){
		$a12 = 1;
	}
	else{
		$a12 = 0;
	}
	//13
	if(isset($_POST["electronics"])){
		$a13 = 1;
	}
	else{
		$a13 = 0;
	}
	//14
	if(isset($_POST["facts"])){
		$a14 = 1;
	}
	else{
		$a14 = 0;
	}
	//15
	if(isset($_POST["farming"])){
		$a15 = 1;
	}
	else{
		$a15 = 0;
	}
	//166
	if(isset($_POST["fashion"])){
		$a16 = 1;
	}
	else{
		$a16 = 0;
	}
	//17
	if(isset($_POST["fishing"])){
		$a17 = 1;
	}
	else{
		$a17 = 0;
	}
	//18
	if(isset($_POST["fitness"])){
		$a18 = 1;
	}
	else{
		$a18 = 0;
	}
	//19
	if(isset($_POST["food"])){
		$a19 = 1;
	}
	else{
		$a19 = 0;
	}
	//20
	if(isset($_POST["games"])){
		$a20 = 1;
	}
	else{
		$a20 = 0;
	}
	//21
	if(isset($_POST["gardening"])){
		$a21 = 1;
	}
	else{
		$a21 = 0;
	}
	//22
	if(isset($_POST["machinery"])){
		$a22 = 1;
	}
	else{
		$a22 = 0;
	}
	//23
	if(isset($_POST["management"])){
		$a23 = 1;
	}
	else{
		$a23 = 0;
	}
	//24
	if(isset($_POST["matrimonial"])){
		$a24 = 1;
	}
	else{
		$a24 = 0;
	}
	//25
	if(isset($_POST["medical"])){
		$a25 = 1;
	}
	else{
		$a25 = 0;
	}
	//26
	if(isset($_POST["medicine"])){
		$a26 = 1;
	}
	else{
		$a26 = 0;
	}
	//27
	if(isset($_POST["music"])){
		$a27 = 1;
	}
	else{
		$a27 = 0;
	}
	//28
	if(isset($_POST["nature"])){
		$a28 = 1;
	}
	else{
		$a28 = 0;
	}
	//29
	if(isset($_POST["photograpy"])){
		$a29 = 1;
	}
	else{
		$a29 = 0;
	}
	//30
	if(isset($_POST["politics"])){
		$a30 = 1;
	}
	else{
		$a30 = 0;
	}
	//31
	if(isset($_POST["socialising"])){
		$a31 = 1;
	}
	else{
		$a31 = 0;
	}
	//32
	if(isset($_POST["sports"])){
		$a32 = 1;
	}
	else{
		$a32 = 0;
	}
	//33
	if(isset($_POST["stockmarket"])){
		$a33 = 1;
	}
	else{
		$a33 = 0;
	}
	//34
	if(isset($_POST["stories"])){
		$a34 = 1;
	}
	else{
		$a34 = 0;
	}
	//35
	if(isset($_POST["travelling"])){
		$a35 = 1;
	}
	else{
		$a35 = 0;
	}
	//36
	if(isset($_POST["research"])){
		$a36 = 1;
	}
	else{
		$a36 = 0;
	}
	$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
		//$smail = mysqli_real_escape_string($con,$_POST['email']);
		//$pwd = md5(mysqli_real_escape_string($con,$_POST['password']));
		
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
		
	$chk=implode(',', $_POST['inte']);
	
		$quarry = "UPDATE interests SET inte = '".$chk."' WHERE user = '".$_SESSION['user']."'";
	//$quarry = "INSERT INTO interests (user, acting, architecture, art, awarenessservice, business, cars, cinephile, dancing, decoration, drinks, economics, education, electronics, facts, farming, fashion, fishing, fitness, food, games, gardening, machinery, management, matrimonial, medical, medicine, music, nature, photograpy, politics, socialising, sports, stockmarket, stories, travelling, research) VALUES ('".$_SESSION['user']."', ".$a1.", ".$a2.", ".$a3.", ".$a4.", ".$a5.", ".$a6.", ".$a7.", ".$a8.", ".$a9.", ".$a10.", ".$a11.", ".$a12.", ".$a13.", ".$a14.", ".$a15.", ".$a16.", ".$a17.", ".$a18.", ".$a19.", ".$a20.", ".$a21.", ".$a22.", ".$a23.", ".$a24.", ".$a25.", ".$a26.", ".$a27.", ".$a28.", ".$a29.", ".$a30.", ".$a31.", ".$a32.", ".$a33.", ".$a34.", ".$a35.", ".$a36." )";
		/*$droptab = "DROP TABLE `".$_SESSION['user']."`";
		$createtab = "CREATE TABLE `".$_SESSION['user']."` ( `col` VARCHAR(50) NOT NULL ) ENGINE = MyISAM;";

		$newtab = 'INSERT INTO `'.$_SESSION["user"].'`  SELECT col FROM(
				SELECT "Acting" AS col, acting AS value FROM interests
				UNION ALL SELECT "Architecture", architecture FROM interests
				UNION ALL SELECT "Art", art FROM interests
				UNION ALL SELECT "Awareness & service", awarenessservice FROM interests
				UNION ALL SELECT "Business", business FROM interests
	  		    UNION ALL SELECT "Cars", cars FROM interests
				UNION ALL SELECT "Cinephile", cinephile FROM interests
				UNION ALL SELECT "Dancing", dancing FROM interests
				UNION ALL SELECT "Decoration", decoration FROM interests
				UNION ALL SELECT "Drinks", drinks FROM interests
				UNION ALL SELECT "Economics", economics FROM interests
				UNION ALL SELECT "Education", education FROM interests
				UNION ALL SELECT "Electronics", electronics FROM interests
				UNION ALL SELECT "Facts", facts FROM interests
				UNION ALL SELECT "Farming", farming FROM interests
				UNION ALL SELECT "Fashion", fashion FROM interests
				UNION ALL SELECT "Fishing", fishing FROM interests
				UNION ALL SELECT "Fitness", fitness FROM interests
				UNION ALL SELECT "Food", food FROM interests
				UNION ALL SELECT "Games", games FROM interests
				UNION ALL SELECT "Gardening", gardening FROM interests
				UNION ALL SELECT "Machinery", machinery FROM interests
				UNION ALL SELECT "Management", management FROM interests
				UNION ALL SELECT "Matrimonial", matrimonial FROM interests
				UNION ALL SELECT "Medical", medical FROM interests
				UNION ALL SELECT "Medicine", medicine FROM interests
				UNION ALL SELECT "Music", music FROM interests
				UNION ALL SELECT "Nature", nature FROM interests
				UNION ALL SELECT "Photography", photograpy FROM interests
				UNION ALL SELECT "Politics", politics FROM interests
				UNION ALL SELECT "Socialising", socialising FROM interests
				UNION ALL SELECT "Sports", sports FROM interests
				UNION ALL SELECT "Stock Market", stockmarket FROM interests
				UNION ALL SELECT "Stories", stories FROM interests
				UNION ALL SELECT "Travelling", travelling FROM interests
				UNION ALL SELECT "Research", research FROM interests
				) allValues
				WHERE value=1 '; 
// WHERE  user = `'.$_SESSION["user"].'` DONT KNOW WHERE TO PLACE!
	*/
	if(mysqli_query($conn, $quarry)){// && mysqli_query($conn, $droptab) && mysqli_query($conn, $createtab) && mysqli_query($conn, $newtab)){
		mysqli_close($conn);
		header('Location: user_area.php');
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
	  <?php //if there's a family then show here! ?>  <li class="nav-item">
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
			<legend style="padding-left:20px; padding-right:20px " ><h3>INTERESTS </h3></legend>
			<form name="register_form" enctype="multipart/form-data" action="" method='POST' align="center" >
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
				
				<input type="submit" name='SUBMIT' id='SUBMIT' value="SUBMIT" class="btn btn-primary" />  
				<input type="reset" name='CLEAR' value="CLEAR" class="btn btn-secondary" />  
				
			</form>
		</fieldset></br></br></br>
		
	
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  
</div>

</body>
</html>
