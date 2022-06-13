
<?php
session_start();
//if(isset($_SESSION["u_name"]))
	//{header('Location: login.php');}
if(isset($_POST["LOGIN"]))
	{
		if(isset($_POST["u_name"]) && isset($_POST["password"]))
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
			if(!$ret){
				die("Query did not execute...".mysqli_error($con));
			}
			else{
				if($match > 0){
					if(isset($_POST["remember_me"])){
						setcookie("u_name",$name,time()+3600*24*365);		
						setcookie("password",$pass,time()+3600*24*365);			
						$_SESSION["u_name"]=$name;
					}
					else{
						if(isset($_COOKIE['u_name'])){
							setcookie("u_name","");
						}
						if(isset($_COOKIE['password'])){
							setcookie("password","");
						}
					}
					

				/*$to = $email; // Send email to our user
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
			*/
				$_SESSION['user'] = $l1;
			
				header('Location: user_area.php');
			}
			else{echo "<script>alert('Invalid credentials!') </script>";}
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
<body  style="background-image: url('images/bg.jpg'); background-repeat: no-repeat; background-attachment: fixed; text-align:center; " >

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
				Password: &nbsp <input type="password" name='password' placeholder="Password" style="border-radius:5px;" required />
			<br/><br/>

			
			<input type="checkbox" name='remember_me' >Remember me</br>
				
				<input type="submit" name='LOGIN' value="LOGIN" class="btn btn-primary"/>  
					</form>
		</fieldset>
		<label style="font-size:small" >Not having an account <a href="register.php">Sign Up...</a></label></br>
		<label style="font-size:small" ><a href="forgotpwd.php">Forgot Password</a></label>
		</br></br></br>
	<div class="jumbotron text-center" style="margin-bottom:0">
	  <p style="font-size:small" >Copy Rights to Team Spruce Coterie </p>
	  <p style="font-size:small" > © 2019 Trademarks and brands are the property of their respective owners </p>
	</div>

	
	</body>
</html>
