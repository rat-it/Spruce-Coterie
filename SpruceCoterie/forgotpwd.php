<?php
	if(isset($_POST["SENDMAIL"]))
	{
		if(isset($_POST["u_name"]))
		{
			$l1=$_POST['u_name'];
			
			$con=mysqli_connect('localhost','root','');
			mysqli_select_db($con,"SpruceCoterieDB");
			
			$pas="select * from login where u_name = '".$l1."'";
			$everification = mysqli_query($con, $pas);
			$match = mysqli_num_rows($everification);
			
			if($match >0){
				while($rp = mysqli_fetch_array($everification)){
					$l2 = $rp['u_name'];
					$l3 = $rp['password'];
				}
				
				mysqli_close($con);
				
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
				
				As per your request here are your credentials to login to Spruce Coterie  <br>
				<br>
				-------------------------------------------------- <br>
				Username: ".$l2." <br>
				Password: ".$l3." <br>
				-------------------------------------------------- <br>

				";
				$mail1->Body = $message;
				$mail1->AddAddress($l2);
				
				$mail1->Send();
				if(!$mail1->send()) {
					echo 'Message could not be sent. </br>';
					echo '<script>alert("Please insert proper Email id");</script>';
				}
				else {
					echo '<script>';
					echo 'alert("Credentials are sent to E-MAIL provided! Please proceed to Login!");'; 
					echo 'window.location.href = "login.php";';
					echo '</script>';
				}
			}
			else{
				mysqli_close($con);
				echo '<script>';
				echo 'alert("No user with such credentials exist! Please Register!");'; 
				echo 'window.location.href = "register.php";';
				echo '</script>';
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
  <a class="navbar-brand" href="login.php">Login</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
    </ul>
  </div>  
</nav>
		</br></br>
		<fieldset style="text-align:center;" >
			<legend style="padding-left:20px; padding-right:20px " ><h3>LOGIN </h3></legend>
			<form name="login_form" action="" method=POST align="center" >
				
				
				Username: &nbsp <input type="text" name='u_name' placeholder="Email Address" style="border-radius:5px;" required />
				<br/><br/>
	
			
				<label style="font-size:small; color:red;" >Password will be sent to email mentioned above</label></br>
				
				<input type="submit" name='SENDMAIL' value="SEND MAIL" class="btn btn-primary"/>  
			</form>
		</fieldset>
		<label style="font-size:small" >Not having an account <a href="register.php">Sign Up...</a></label>
		
		</br></br></br>
	<div class="jumbotron text-center" style="margin-bottom:0">
  <p style="font-size:small" >Copy Rights to Team Spruce Coterie </p>
  <p style="font-size:small" > © 2019 Trademarks and brands are the property of their respective owners </p>
  
</div>

	
	</body>
</html>
