<?php
	session_start();
		if(!isset($_SESSION['user'])){
		header('Location: index.php');
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
	
<div class="container" style="margin-top:50px">
	<div class="row">
		<div class="col-sm-3">
    		<h3>Interests define your coterie!</h3>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
				<?php 
					//<label class="nav-link active" >Coterie Interests!</label>
				?>
				</li>
				<?php
					$con = new mysqli("localhost","root","","sprucecoteriedb");
					if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
					$sql0 = "SELECT * FROM cmem WHERE user = '".$_SESSION['user']."'";
					
					$ret = mysqli_query($con, $sql0);
					while($row = mysqli_fetch_array($ret)){
						$cid = $row['cid'];
					}
					$sqll = "SELECT * FROM coterie WHERE id = ".$cid."";
					$result = mysqli_query($con,$sqll);
					if(mysqli_query($con, $sqll)){
						while($row = mysqli_fetch_array($result))
						{	
							echo '<label class="nav-link active" > Interests of '.ucfirst($row["name"]).'!</label>';
							$i = explode(",", $row['inte']);
							foreach($i as $q){
								echo '<li class="nav-item" ><a class="nav-link" href="#" style="margin-left:15px; ">  '.ucfirst($q).'</a></li>';	
							}	
						}
					}
					mysqli_close($con);
				?>
			</ul>
			</br>
			</br>
			</br>
			
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-6">
			
			<?php 
				$sql1 = "SELECT * FROM cevents WHERE 1";
				
				$con = new mysqli("localhost","root","","sprucecoteriedb");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}
				$arr = array();
				$x = 0;
				$result = mysqli_query($con,$sql1);
				while($row = mysqli_fetch_array($result))
				{
					$x = $row["id"];
					echo '<div class="fakeimg" style="padding-top:8px; padding-bottom:10px; padding-left:15px; padding-right:8px; border-radius:5px;" ><h3>Name: '.$row["ename"].'</h3></br><h5>Details: '.$row["eabout"].'</h5></br><h6>Visiting members: '.(($row["count"])/2).'</h6>
						 <form id="formid'.$x.'" method="GET" ><label style:"margin-left:50px;"> Desire</label> 
						  <select id="sel'.$x.'" name="selc'.$x.'" onchange="checkAndSubmit'.$x.'() ">
								<option value="0" >Not interested</option>
								<option value="1" >May Be</option>
								<option value="2" >Surely will be visiting</option>
						  </select></form></div>';
						echo '<script>function checkAndSubmit'.$x.'(){  if(document.getElementById("sel'.$x.'").selectedIndex > 0){ document.getElementById("formid'.$x.'").submit();}}</script>';
					if(isset($_GET['selc'.$x])){
						$addc = $_GET['selc'.$x];
						$sql2 = "UPDATE cevents SET count = count + ".$addc." WHERE id=".$x."";
						if(mysqli_query($con, $sql2)){
						}
						else{
							echo "Error: ".$sql2."</br>".mysqli_error($con);
						}
					}
				}
				mysqli_close($con);
			?>
			
		</div>
		<div class="col-sm-2">
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<a href="c_create_event.php" class="nav-link active" >Event +</a>
				</li> </br>
				<li class="nav-item">
					<a href="cview.php" class="nav-link active" >View Coterie</a>
				</li>
				
			</ul>
		</div>
	</div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Copy Rights to Team Spruce Coterie </p>
  <p> © 2019 Trademarks and brands are the property of their respective owners </p>
  <p><a href="contact_us.php">Contact Us...</a></p>
  
</div>

</body>
</html>
