<?php
session_start();
//if(isset($_SESSION["u_name"]))
	//{header('Location: login.php');}
if(isset($_POST["SIGNUP"]))
{	
	if(isset($_POST["number"])){
		$n1 = $_POST["number"];
		if(strlen($n1)>11 || strlen($n1)<8){
			echo '<script>alert("Please enter contact number of valid lenght!");</script>';
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
	
	if(isset($_POST["f_name"]) && isset($_POST["l_name"]) && isset($_POST["email"]) && isset($_POST["dob"]) && isset($_POST["number"]) && isset($_POST["password"])){
		$fname = $_POST['f_name'];
		$lname = $_POST['l_name'];
		$mail = $_POST['email'];
		$dobirth = $_POST['dob'];
		$contact = $_POST['number'];
		$passwd = $_POST['password'];
		
		$conn = mysqli_connect('localhost','root','','sprucecoteriedb');
		//$smail = mysqli_real_escape_string($con,$_POST['email']);
		//$pwd = md5(mysqli_real_escape_string($con,$_POST['password']));
		
		if(!$conn){
			die("Connection failed: " . mysqli_connect_error());
		}
		
		if(isset($_POST['m_name'])){
			$mname = $_POST['m_name'];
		}
		else{
			$mname = null;
		}
		
		$sql = "SELECT * FROM login where u_name = '".$mail."'";
		$everification = mysqli_query($conn,$sql);
		$match = mysqli_num_rows($everification);
		$dat1 = date('Y-m-d H:i:s');
		
		if(!$match){
			$quarry = "INSERT INTO login (u_name, password, date) VALUES ('".$mail."', '".$passwd."', '".$dat1."')";
			$sql2 = "INSERT INTO dob (user, date) VALUES ('".$mail."','".$dobirth."')";
			$sql3 = "INSERT INTO fullname (user, fname, mname, lname) VALUES ('".$mail."', '".$fname."', '".$mname."', '".$lname."')";
			$sql4 = "INSERT INTO contactnumber (user, contact) VALUES ('".$mail."',".$contact.")";
			$sql5 = "INSERT INTO interests (user) VALUES ('".$mail."')";
			$profileinfo = "INSERT INTO profile (user, aboutyou, ccity, hcity, wfi) VALUES ('".$mail."', 'Am new to Spruce Coterie', 'Undefined', 'Undefined', 'Undefined' )";
			
			if(mysqli_query($conn, $quarry) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5) && mysqli_query($conn, $profileinfo) ){
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
					$quey = "INSERT INTO tabless (path, user) VALUES ('uploads/$filename','".$mail."')";
					if(mysqli_query($connect, $quey)){
						echo '<script>alert("Image submited")</script>';
					}
				}
				$_SESSION['user'] = $mail;
				
				require_once('PHPMailer/PHPMailerAutoLoad.php');
				require('PHPMailer/class.phpmailer.php');
				require('PHPMailer/class.smtp.php');
				
				$mail1 = new PHPMailer();
				$mail1->isSMTP();
				$mail1->SMTPAuth = true;
				$mail1->SMTPSecure = 'ssl';
				$mail1->Host = 'smtp.gmail.com';
				$mail1->Port = '465';
				$mail1->isHTML();
				$mail1->Username = 'sprucecoterie@gmail.com';
				$mail1->Password = 'Spruce@Coterie12';
				$mail1->SetFrom('no-reply@howcode.org');
				$mail1->Subject = 'Welcome to Spruce Coterie!';
				$message = "
				
				Thanks for signing up! <br>
				Your account has been created, you can login with the following credentials. <br>
				Hope so you have a wonderful time with us! <br><br>
				
				-------------------------------------------------- <br><br>
				Username: ".$mail." <br>
				Password: ".$passwd." <br><br>
				-------------------------------------------------- <br>

				";
				$mail1->Body = $message;
				$mail1->AddAddress($mail);
				
				$mail1->Send();
				if(!$mail1->send()) {
					echo 'Message could not be sent. </br>';
					echo '<script>alert("Please insert proper Email id");</script>';
				} else {
					echo 'Message has been sent';
				}
				
				header('Location: user_area.php');
			}
			else{
				echo "Error: ".$quarry."</br>".mysqli_error($conn);
			}
		}
		else{
			echo '<script>alert("User associated with this E-Mail already exits, try Loging in!");</script>';
		}
	}
	
	/*if(isset($_POST["f_name"]) && isset($_POST["l_name"]) && isset($_POST["email"]) && isset($_POST["dob"]) && isset($_POST["number"]) && isset($_POST["password"]))
	{
	    $l1=$_POST['u_name'];
	    $l2=$_POST['password'];
    	$con=mysqli_connect('localhost','root','');
		$name=mysqli_real_escape_string($con,$_POST['u_name']);
		$pass=md5(mysqli_real_escape_string($con,$_POST['password']));
		$pas="select password from login where u_name='".$l1."' and password='".$l2."'";
	   
		mysqli_select_db($con,"SpruceCoterieDB");
		$ret=mysqli_query($con,$pas);
	   
		$match  = mysqli_num_rows($ret);
		if(!$ret)
		{die("Query did not execute...".mysqli_error($con));    }
		else{if($match > 0)   
				{if(isset($_POST["remember_me"]))
					{setcookie("u_name",$name,time()+3600*24*365);		
					 setcookie("password",$pass,time()+3600*24*365);			
					 $_SESSION["u_name"]=$name;}
				else{if(isset($_COOKIE['u_name']))
						{setcookie("u_name","");}
				if(isset($_COOKIE['password']))
					{setcookie("password","");}
	  }
		$to = $email; // Send email to our user
		$subject = 'Signup | Verification'; // Give the email a subject 
		$message = '
		 
		Thanks for signing up!
		Your account has been created, you can login with the following credentials.
		Hope so you have a wonderful time with us!
		
		------------------------
		Username: '.$name.'
		Password: '.$password.'
		------------------------
		  
		'; // Our message above including the link
							 
		$headers = 'From:sprucecoterie@gmail.com' . "\r\n"; // Set from headers
		mail($to, $subject, $message, $headers);
         header('Location: index.php');
         }
         else{echo "<script>alert('Invalid credentials!') </script>";}
        }
	}
		
	*/
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
  <a class="navbar-brand" href="register.php">Register</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
  </div>  
</nav>
		</br></br>
		<fieldset style="text-align:center;" >
			<legend style="padding-left:20px; padding-right:20px " ><h3>REGISTER </h3></legend>
			<form name="register_form" enctype="multipart/form-data" action="" method=POST algin="center" >
				
				
				First Name:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="text" name='f_name' placeholder="First Name" style="border-radius:5px;" required /><br/><br/>
				Middle Name: &nbsp <input type="text" name='m_name' placeholder="Middle Name" style="border-radius:5px;" /><br/><br/>
				Last Name:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="text" name='l_name' placeholder="Last Name" style="border-radius:5px;" required /><br/><br/>
				E-Mail:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="email" name='email' id="email" placeholder="E-Mail" style="border-radius:5px;" title="A valid E-Mail will help us contact you!" required /><br/><br/>
				Date Of Birth:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="date" name='dob' style="border-radius:5px;" required /></br></br>
				Contact Number:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="number" name='number' id="number" placeholder="0009996543" style="border-radius:5px;" title="A valid contact number will help us contact you!" required /></br></br>
				
				Password:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="password" name='password' placeholder="Password" style="border-radius:5px;" title="Lenght of Password should be >8 and <30" required /><br/><br/>
				Re-Enter Password:<label style="font-size:small; color:red;" >*</label> &nbsp <input type="password" name='re_password' placeholder="Password" style="border-radius:5px;" title="Make sure it matches with above password!" required /><br/><br/>

				Set a profile image: &nbsp <input type="file" id="demo" name="demo" style="border-radius:5px" /> </br></br>
				
				<input type="submit" name='SIGNUP' value="SIGN UP" class="btn btn-primary" onclick="ValidateEmail()" />  
				<input type="reset" name='CLEAR' value="CLEAR" class="btn btn-secondary" />  
				
			</form>
		</fieldset></br></br></br>
		
	<div class="jumbotron text-center" style="margin-bottom:0">
		<p style="font-size:small" >Copy Rights to Team Spruce Coterie </p>
		<p style="font-size:small" > © 2019 Trademarks and brands are the property of their respective owners </p>
  
	</div>

	  <script type="text/javascript" >
	//	document.getElementById("email").addEventListener("focusout", ValidateEmail);
		//document.getElementById("number").addEventListener("focusout", validateContact);
	  
		function ValidateEmail()
		{	
			var inpuext = document.getElementById("email").value;
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(inpuext.value.match(mailformat))
			{
				//document.register_form.email.focus();
				validateContact();
				return true;
			}
			else
			{
				alert("You have entered an invalid email address!");
				//document.register_form.email.focus();
				return false;
			}
		}

		function validateContact(){
			var inputtxt = document.getElementById("number").value;
			var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
			if((inputtxt.value.match(phoneno))
			{
			  return true;
			}
			else
			{
				alert("Please enter a valid contact number!");
				return false;
			}
		}
	</script>
	
	</body>
</html>
