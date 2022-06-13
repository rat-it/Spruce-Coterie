<?php 
	if(isset($_POST["SUBMIT"]))
		{if(isset($_POST["passkey"]))
		{
			$l1=$_POST['passkey'];
			if($l1 == "Unottheboss!")
			{
				header('Location: admin_login.php');
			}
			else
			{
				echo "<script>alert('Invalid credentials!') </script>";
			}
		}
	}
?>

<html>
	<head><link rel="shortcut icon" type="image/png" href="\favicon.png" sizes="16x16" />
	</head>
	<body align='center' >
		
		<fieldset style="margin-left:150px; margin-right:150px " >
			<legend style="padding-left:20px; padding-right:20px " >HOW ABOUT SOME VERIFICATION</legend>
			<form name="pre_admin_form" action="" method=POST algin="center" >
				Password:<input type="password" name='passkey' required />
				<br/><br/>
				<input type="submit" name='SUBMIT' value="SUBMIT" />  
			</form>
		</fieldset>
	</body>
</html>