
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
.del{
	width:35%;
	margin:3% 0 0 1%;
}
.flexing{
	display:flex;
	width:90%;
}
.newfont{
	font-family: "Times New Roman", Times, serif;
	 font-size: 16px;
}
@media screen and (max-width: 480px) {
	
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
	<h3 >Weekly Lottery Dashboard</h3>
	<hr>
</div>

<section class="form-inline">
		<table class="bg-primary">
			<tr>
				 <td> <a href="lotterydashboard.php" class=" btn " >TICKET DETAILS</a> </td>
				 <td> <a href="addticket.php" class="btn ">ADD TICKET</a> </td>
				 <td> <a href="deleteticket.php" class="btn bg-black">DELETE TICKET</a> </td>
				 <td> <a href="viewticket.php" class="btn">VIEW LIVE TICKETS</a> </td>
				 <td> <a href="" class="btn">DOWNLOAD TICKETS</a> </td>
				 <td> <a href="" class="btn hidde">TICKET BOOKING ENTRIES</a> </td>
			</tr>
		</table>
</section>
<?php
		ini_set('display_errors', 0);
        if(isset($_POST["submit"])) {
            include("database.php");
            
			$fullsetticket=$_POST['fullticket'];					
			$queryone="delete from fullticket where fullticketno='".$fullsetticket."'";			
			mysqli_query($con,$queryone);

		}
		if(isset($_POST["halfsubmit"])) {
            if(isset($_POST['halfticket']) ||isset($_POST['firsthalf']))
			{
				include("database.php");
				$halfsetticket=$_POST['halfticket'];
				$firstname=$_POST['firsthalf'];
				
				if($firstname=='1')
				{
					$queryd="delete from firsthalfticket where firsthalfticketno='".$halfsetticket."'";			
					$res=mysqli_query($con,$queryd);	
					if($res==FALSE)
					{
						echo "<script >";
						echo "alert('Entered Number Not Available')";
						echo "</script>";
					}
				}			
				if($firstname=='2')
				{
					$querye="delete from sticket where sticketno='".$halfsetticket."'";			
					mysqli_query($con,$querye);				
				}
				}
			else
			{			echo "<script >";
						echo "alert('Enter All Fields')";
						echo "</script>";
			}
		}
		if(isset($_POST["singlesubmit"])) {
            include("database.php");
			
		    $singlesetticketnew=$_POST['singleticketnew'];
			$querythree="delete from singleticket where singleticketno='".$singlesetticketnew."'";
			$querythree2="delete from singleticketnew where singleticketnonew='".$singlesetticketnew."'";	
			mysqli_query($con,$querythree);
			mysqli_query($con,$querythree2);
		}
        if(isset($_POST["fulldeleteall"])) {
            include("database.php");					
			$query1="delete from fullticket";			
			mysqli_query($con,$query1);
		}		
        if(isset($_POST["halfdeleteall"])) {
				include("database.php");
				$halfsetticket=$_POST['halfticket'];
				$firstname=$_POST['firsthalf'];
				
				if($firstname=='1')
				{
					$queryf="delete from firsthalfticket";			
					$resul=mysqli_query($con,$queryf);	
					if($resul==FALSE)
					{
						echo "<script >";
						echo "alert('Entered Number Not Available')";
						echo "</script>";
					}
				}
				if($firstname=='2')
				{
					$queryg="delete from sticket";			
					mysqli_query($con,$queryg);				
				}
				
		}	
        if(isset($_POST["singledeleteall"])) {
            include("database.php");					
			$query3="delete from singleticket";
			$query4="delete from singleticketnew";
			mysqli_query($con,$query3);
			mysqli_query($con,$query4);
		}	
		
?>
<section class="form-inline flexing">
	<div class="del">	
		<div class="card border-primary mb-3 bg-light" style="max-width:30rem;">
		  <div class="card-header text-center ">	<h4 class="newfont">FULL-SET TICKETS</h4> </div>
		  <div class="card-body text-dark">
			   <form action="deleteticket.php" method="post">
				<input class="form-control w-100" type="text" name="fullticket" placeholder="Enter Ticket Number" ><br><br>
				<button class="form-control-sm btn bg-danger text-white" type="submit" name="submit">DELETE</button>
				<button class="form-control-sm btn bg-danger text-white" type="submit" name="fulldeleteall">DELETE ALL</button>
			   </form>
		  </div>
		</div>
	</div>
	<div class="del">	
		<div class="card border-primary mb-3 bg-light" style="max-width:30rem;">
		  <div class="card-header text-center">	<h4 class="newfont">HALF-SET TICKETS</h4> </div>
		  <div class="card-body text-dark">
			   <form action="deleteticket.php" method="post">
			   <table><tr><td><input type="radio" name="firsthalf" value="1" ><span class="newfont">FIRST HALF</span></td>
						<td><input type="radio" name="firsthalf" value="2" ><span class="newfont">SECOND HALF</span></td></tr>
				</table><br>
				<input class="form-control w-100" type="text" name="halfticket" placeholder="Enter Ticket Number" ><br><br>
				<button class="form-control-sm btn bg-danger text-white" type="submit" name="halfsubmit">DELETE</button>
				<button class="form-control-sm btn bg-danger text-white" type="submit" name="halfdeleteall">DELETE ALL</button>
			   </form>
		  </div>
		</div>
	</div>	
	<div class="del">	
		<div class="card border-primary mb-3 bg-light" style="max-width:30rem;">
		  <div class="card-header text-center">	<h4 class="newfont">SINGLE TICKETS</h4> </div>
		  <div class="card-body bg-light text-dark">
			   <form action="deleteticket.php" method="post">
				<input class="form-control w-100" type="text" name="singleticketnew" placeholder="Enter Ticket Number" ><br><br>
				<button class="form-control-sm btn bg-danger text-white" type="submit" name="singlesubmit">DELETE</button>
				<button class="form-control-sm btn bg-danger text-white" type="submit" name="singledeleteall">DELETE ALL</button>
			   </form>
		  </div>
		</div>
	</div>
</section>

</body>
</html>