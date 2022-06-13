<?php
	session_start();
	session_destroy();
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
<body style="background-image: url('images/bg.jpg'); background-repeat: no-repeat; background-attachment: fixed;" >

<div class="jumbotron text-center" style="margin-bottom:0; background-color:gray; background-image:url(images/tree4.jpg); background-repeat: repeat;">
  <h1 style="color:black;">Spruce Coterie!</h1>
  <p>Digitalization is future! So is your coterie a part of it!</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>About Us</h2>
      <div class="fakeimg" style="background-image:url(images/mapple2.jpg)"></div>
      <p>We have an aim to simplify and ease the burdensome tasks of coterie!</p>
      <h3>Join Us...</h3>
      <p>Digitalization is future!</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registerUser.php">Register</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2>Spruce Coterie</h2>
      <h5>Date we have been working from, March 15, 2019</h5>
      <div class="fakeimg" style="background-image:url(images/plan1.jpg)" ></div>
      <p>Dedication towards perfection!</p>
      <p>Spruce Coterie is a coming of age web and mobile application for any community to go digital. This website will serve as an online directory of all the community members. Users will be able to search for the community members, based on various filters. This directory will contain information about the community members and their family details - user will be able to see this information as family tree. Additional feature will include news feed - where user will post the latest community news, advertisements and offers, matrimonial and career related posts.</p>
      <br>
      <h2>PURPOSE</h2>
      <h5>Simplify the complexity of some tiresome tasks!</h5>
      <div class="fakeimg" style="background-image:url(images/kanji.jpg)" ></div>
      <p>Motivation from...</p>
      <p>I'm proud of my hard work. Working hard won't always lead to the exact things we desire. There are many things I've wanted that I haven't always gotten. But, I have a great satisfaction in the blessings from my mother and father,who instilled a great work ethic in me personally and professionally.</br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ~Tamron Hall</p>
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
