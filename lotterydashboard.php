
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
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
.form-inline{
	margin:0% 8.33% 0% 8.33%;
	
}

.form-inline td{
	width:14%;
}
.form-inline a:hover {
  background-color:black;
  color:white;
}
.form-inline a
{
	width:100%;
	color:white;
}
.tbl td{
	width:400px;
	padding:10px;
}
@media screen and (max-width: 425px) {
	
.tbl td{
	width:300px;
}

.sec{
	display:block;
	padding:20px 20px 0 0px;
}
.form-control{
	font-size:10px;
	heigth:25%;
}
.topheight{ margin-top:70px;}
 .navbar a {
    float: none;
    display: block;
    width: 100%;
  }

h4{
	font-size:10px;
	font-weight: bold;
}
.form-inline{
	margin:0% 6.33% 0% 6.33%;
}
.form-inline td{
	width:7%;
}
.navbar a:hover {
  background-color:white;
}
.btn{
	font-size:6px;
}

.navbar {
  width: 100%;
}

.navbar a{
  float: left;
  color: white;
  text-decoration: none;
  width: 25%; 
  text-align: center;
  font-size:5px;
}

.hidde{
	display:none;
}
h3{ font-size:15px;}
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

<div class="form-inline">
	<h3>Weekly Lottery Dashboard</h3>
	<hr>
</div>

<section class="form-inline">
		<table class="bg-primary">
			<tr>
				 <td> <a href="lotterydashboard.php" class=" btn bg-black" >TICKET DETAILS</a> </td>
				 <td> <a href="addticket.php" class="btn">ADD TICKET</a> </td>
				 <td> <a href="deleteticket.php" class="btn ">DELETE TICKET</a> </td>
				 <td> <a href="viewticket.php" class="btn">VIEW LIVE TICKETS</a> </td>
				 <td> <a href="" class="btn">DOWNLOAD TICKETS</a> </td>
				 <td> <a href="" class="btn hidde">TICKET BOOKING ENTRIES</a> </td>
			</tr>
		</table>
</section>
<br>

<?php
		ini_set('display_errors', 0); 
        if(isset($_POST["submit"])) {
            include("database.php");
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $ticketdate=$_POST['ticketdate'];
            $amount=$_POST['amount'];
			$ticketcount=$_POST['ticketcount'];
			$ticketcode=$_POST['ticketcode'];
			$mobilenumber=$_POST['mobilenumber'];
			$filename = $_FILES["imagefile"]["name"];
			//$image= "images/".basename($filename);

			$target_dir = mkdir("uploads");
			$target_dir = "uploads/";
			$filename=$_FILES["imagefile"]["name"];
			$target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
			
			$q="create table ticketbooking (sno int not null auto_increment primary key,fname varchar(30),lname varchar(30),ticketdate date,amount int,ticketcount int,ticketcode varchar(200),mobilenumber long,imagefile longblob)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
			$query="insert into ticketbooking(fname,lname,ticketdate,amount,ticketcount,ticketcode,mobilenumber,imagefile)values('".$fname."','".$lname."','".$ticketdate."','".$amount."','".$ticketcount."','".$ticketcode."','".$mobilenumber."','".$filename."')";

			mysqli_query($con,$q);
			$result2=mysqli_query($con,$query);
			
				if($result2==TRUE)
				{
					echo "<script language='javascript'>";
					echo "alert('Registration finished')";
					echo "</script>";
				}
				else
				{
						//header("location:lotterydashboard.php");
						echo "<script language='javascript'>";
						echo "alert('Registration not finished')";
						echo "</script>";
				}
			
        }
?>
<section class="form-inline">
	<table class="tbl">
		<form action="lotterydashboard.php" method="post" enctype="multipart/form-data">
			<tr><td><input type="text" name="fname" placeholder="First Name" class="form-control w-75" required></td></tr>
			<tr><td><input type="text" name="lname" placeholder="Last Name" class="form-control w-75" required></td></tr>		
			<tr><td><input type="date" name="ticketdate" placeholder="Date" class="form-control w-75" required></td></tr>
			<tr><td><input type="text" name="amount" placeholder="Enter Amount" class="form-control w-75" required ></td></tr>
			<tr><td><input type="text" name="ticketcount" placeholder="Ticket Count" class="form-control w-75" required></td></tr>
			<tr><td><input type="text" name="ticketcode" placeholder="Enter Code " class="form-control w-75"required ></td></tr>	
			<tr><td><input type="text" name="mobilenumber" placeholder="Enter Mobile Number" class="form-control w-75" required></td></tr>		
			<tr><td><input type="file" name="imagefile" placeholder="" class="form-control w-75" required></td></tr>
			<tr><td><input type="submit" name="submit" value="SUBMIT" class="btn bg-primary w-25">
			        <input type="reset" name="submit" value="CANCEL"  class="btn bg-danger text-white w-25"></td>
			</tr>
		</form>
	</table>
</section>
</body>
</html>