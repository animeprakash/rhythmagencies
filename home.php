<?php
	require "database.php";
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
*{
	box-sizing:border-box;
}
body {font-family: Arial, Helvetica, sans-serif;}
.navbar {
  width: 100%;
  overflow: auto;
}

.navbar a {
  float: left;
  color: white;
  text-decoration: none;
  width: 25%; 
  text-align: center;
}
.navbar a:hover {
  background-color:white;
}

.navbar a.active {
  background-color:white;
  color:black;
}
.form-inline{margin-left: 8.33%;}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}

</style>
</head>
<body>
<div class="text-left"> <img src="rythm.jpg" width="100px" height="100px" ></div>
<div>
	<nav class="navbar navbar-dark bg-primary">
		  <a href="home.php" class="active btn" >HOME</a> 
		  <a href="#" class="btn">RESULTS</a> 
		  <a href="#" class="btn">LOTTERIES</a> 
		  <a href="#" class="btn">CONTACT US</a>
	</nav>
</div>
<div >
	  <form class="form-inline">
		<a href="lotterydashboard.php"><button class="btn bg-primary" type="button">Weekly Lottery</button></a>
		<a href=""><button class="btn bg-primary" type="button">Bumper Lottery</button></a>
		<a href=""><button class="btn bg-primary" type="button">Bhagyamithra Lottery</button></a>
	  </form>
</div>
</body>
</html>