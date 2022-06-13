<?php 

	session_start();
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}
	if(isset($_POST["CREATEFAMILY"])){
		if(isset($_POST["family_contact"])){
			$n1 = $_POST["family_contact"];
			if(strlen($n1)>11 || strlen($n1)<8){
				echo '<script>';
				echo 'alert("Please enter valid contact details!");'; 
				echo 'window.location.href = "family_creation_form.php";';
				echo '</script>';
			}
		}
		if(isset($_POST["family_name"]) && isset($_POST["description"]) && isset($_POST["family_contact"])){
			$familyname = $_POST['family_name'];
			$description = $_POST['description'];
			$contact = $_POST['family_contact'];
			
			if(isset($_POST["email"])){
				$mail = $_POST['email'];
			}
			else{
				$mail = "Undefined";
			}
			
			$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
			
			if(!$conn){
				die("Connection failed: " . mysqli_connect_error());
			}
			$date = date('Y-m-d H:i:s');
			$quarry = "INSERT INTO family (familyname, description, email, contact, member1, date) VALUES ('".$familyname."', '".$description."', '".$mail."', ".$contact.", '".$_SESSION['user']."', '".$date."')";
			
			if(mysqli_query($conn, $quarry)){
				mysqli_close($conn);
				$connect = new mysqli("localhost","root","","sprucecoteriedb");
				$quarry1 = "SELECT id FROM family ORDER BY id DESC LIMIT 1";
				
				if(mysqli_query($connect, $quarry1))
				{
					$ter = mysqli_query($connect, $quarry1);
					while($row = mysqli_fetch_array($ter)){
						$fid = $row['id'];
					}
					$m0 = $_SESSION['user'];
					$q0 = "INSERT INTO fmem (fid, user) VALUES (".$fid.", '".$m0."')";
					if(mysqli_query($connect, $q0)){
						echo "Inserted";
					}
					else{
						echo "Error: ".$q0."</br>".mysqli_error($conn);
						}
					if(isset($_POST["member1"]) && $_POST["member1"]!=""){
						$m1 = $_POST['member1'];
						$q1 = "INSERT INTO fmem (fid, user) VALUES (".$fid.", '".$m1."')";
						if(mysqli_query($connect, $q1)){
							echo "Inserted";
						}
						else{
							echo "Error: ".$q1."</br>".mysqli_error($conn);
						}
					}
					if(isset($_POST["member2"]) && $_POST["member2"]!=""){
						$m2 = $_POST['member2'];
						$q2 = "INSERT INTO fmem (fid, user) VALUES (".$fid.", '".$m2."')";
						if(mysqli_query($connect, $q2)){
							echo "Inserted";
						}
						else{
							echo "Error: ".$q2."</br>".mysqli_error($conn);
						}
					}
					if(isset($_POST["member3"]) && $_POST["member3"]!=""){
						$m3 = $_POST['member3'];
						$q3 = "INSERT INTO fmem (fid, user) VALUES (".$fid.", '".$m3."')";
						if(mysqli_query($connect, $q3)){
							echo "Inserted";
						}
						else{
							echo "Error: ".$q3."</br>".mysqli_error($conn);
						}
					}
					if(isset($_POST["member4"]) && $_POST["member4"]!=""){
						$m4 = $_POST['member4'];
						$q4 = "INSERT INTO fmem (fid, user) VALUES (".$fid.", '".$m4."')";
						if(mysqli_query($connect, $q4)){
							echo "Inserted";
						}
						else{
							echo "Error: ".$q4."</br>".mysqli_error($conn);
						}
					}
					if(isset($_POST["member5"]) && $_POST["member5"]!=""){
						$m5 = $_POST['member5'];
						$q5 = "INSERT INTO fmem (fid, user) VALUES (".$fid.", '".$m5."')";
						if(mysqli_query($connect, $q5)){
							echo "Inserted";
						}
						else{
							echo "Error: ".$q5."</br>".mysqli_error($conn);
						}
					}
					mysqli_close($connect);
					$_SESSION['fid']= $fid;
					header('Location: user_area.php');
				}
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
		<legend style="padding-left:20px; padding-right:20px " ><h3>REGISTER FAMILY! </h3></legend>
		<form name="family_create_form" enctype="multipart/form-data" action="" method='POST' algin="center" >
				
			Family Name:* &nbsp <input type="text" name='family_name' placeholder="Family Name" style="border-radius:5px;" required /><br/><br/>
			Description:* &nbsp <input type="text" name='description' id='description' placeholder="Description of your family" style="border-radius:5px; width:15%;" /><br/><br/>
			E-Mail: &nbsp <input type="email" name='email' id="email" placeholder="E-Mail not mandatory" style="border-radius:5px; width:20%;" /><br/><br/>
			Contact Number:* &nbsp <input type="number" name='family_contact' id="family_contact" placeholder="0009996543" style="border-radius:5px;" required /></br></br>
			Member 1 Name: &nbsp <input type="email" name='member1' placeholder="E-Mail of member(optional)" style="border-radius:5px;" /><br/><br/>
			Member 2 Name: &nbsp <input type="email" name='member2' placeholder="E-Mail of member(optional)" style="border-radius:5px;" /><br/><br/>
			Member 3 Name: &nbsp <input type="email" name='member3' placeholder="E-Mail of member(optional)" style="border-radius:5px;" /><br/><br/>
			Member 4 Name: &nbsp <input type="email" name='member4' placeholder="E-Mail of member(optional)" style="border-radius:5px;" /><br/><br/>
			Member 5 Name: &nbsp <input type="email" name='member5' placeholder="E-Mail of member(optional)" style="border-radius:5px;" /><br/><br/>
				
			Set a family image: &nbsp <input type="file" id="family_ico" name="family_ico" style="border-radius:5px" /> </br></br>
				
			<input type="submit" name='CREATEFAMILY' id='CREATEFAMILY' value="CREATE FAMILY" class="btn btn-primary" />  
			<input type="reset" name='CLEAR' value="CLEAR" class="btn btn-secondary" />  
				
		</form>
	</fieldset></br></br></br>
	
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  
</div>

</body>
</html>

<!--<script>
		function triy(){
			var n_members = document.getElementById("member_number").value;
			var ok = new Array();
			
			for(var i=0; i < n_members; i++){
				ok[i] = document.createElement("input");
				ok[i].setAttribute('type',"number");
				ok[i].setAttribute('name',"member_id");			
			}
							
			var s = document.createElement("input"); //input element, Submit button
			s.setAttribute('type',"submit");
			s.setAttribute('value',"Submit");
			
			document.getElementById(family_form)[0].appendChild(ok);
			document.getElementById(family_form)[0].appendChild(s);
		}
	</script>
	-->