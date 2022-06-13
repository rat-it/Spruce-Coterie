<?php
	if(isset($_POST["SUBMIT"]))
	{
		if(isset($_POST["password"]) && isset($_POST["u_name"]))
		{	
			$l1=$_POST['u_name'];
			$l2=$_POST['password'];
			if((($l1 == "Vishal") OR ( $l1 == "Samprat")) AND ( $l2 == "SCadmin123"))
			{
				header('Location: coreui-free-bootstrap-admin-template-master/src/admin.php');
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
	<body align='center' style="background:url(images/bg.jpg); background-repeat:no-repeat; background-size: 100% 200%; ">
		
		<fieldset style="margin-left:150px; margin-right:150px " >
			<legend style="padding-left:20px; padding-right:20px " ><h3>LOGIN </h3></legend>
			<form name="login_form" action="" method=POST algin="center" >
				
				
				Username:<input type="text" name='u_name' required />
			<br/><br/>
				Password:<input type="password" name='password' required />
			<br/><br/>

				<input type="submit" name='SUBMIT' value="SUBMIT" />  
			</form>
		</fieldset>
	</body>
</html>