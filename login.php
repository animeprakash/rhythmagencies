<?php
	require "database.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
*{
	border:0;
	margin:0;
	padding:0;
	box-sizing:border-box;
}
</style>
</head>
<body>
<center><img src="rythm.jpg" width="200px" height="200px" ><center>
<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE); 
if(isset($_POST['username']) && isset($_POST['password'])){
	if(empty($_POST['username']) ||empty($_POST['password']))
	{ 
		echo '<script language="javascript">';
		echo 'alert("Username And Password is Empty")';
		echo '</script>';
		
	}else{	
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username=="admin" && $password=="admin"){
			
		header("location:home.php");
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Invalid Username And Password")';
			echo '</script>';
		}
}}
?>
<div class="col-md-4 col-md-offset-4" style="margin-top:2%;">
  <div class="login-panel panel panel-default">
    <div class="panel-heading">
         <h3 class="panel-title"><center>Login</center></h3>
    </div>
    <div class="panel-body">
    <form action="login.php" method="post">
    <fieldset>
		<div class="form-group">
		<input class="form-control" placeholder="Username" name="username" type="text">
		</div>
        <div class="form-group">
        <input class="form-control" placeholder="Password" name="password" type="password" value="">
        </div>
        <input type="submit" class="btn btn-info btn-block" name="submit" value="LOGIN"></input>
        </fieldset>
        </form>
        </div>
        </div>
</div>

</body>
</html>
