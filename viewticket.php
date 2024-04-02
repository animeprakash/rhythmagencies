
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
*{
	box-sizing:border-box;
}
body {font-family: Arial, Helvetica, sans-serif;
		font-size:19px;
			font-weight: normal;
}
.navbar {
  width: 100%;
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
.topic{
	font-size:30px;
	color:red;
	margin-top:2%;
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
}
.inform{
	display:flex;
	background-color:lightgray;
}
.col-13{
	width:10%;	
	padding:12px 0px;
	margin:5px;
	font-weight: normal;
}
.firsthalf{
	margin-left:8.33%;
}
.secondhalf
{
	margin-left:8.33%;
}
.sizefont{
	font-size:20px;
}
.sizefont2{ font-size:25px;}
.col-14{
	width:20%;	
	padding:12px 0px;
	margin:5px ;
	font-size:19px;
	font-weight: normal;
}
.view{
	margin:0% 8.33% 0 10%;
}
.tickethead{
	padding:6px 0px;
	margin-top:15px;
}
.wid{
 width:100%;
}
.firstwid{ width:50%;}

.imagefile{
	width:auto;
	height:auto;
}


@media screen and (max-width:360px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
  }
.imagefile{
	width:100%;
	height:auto;
}
.topic{
	font-size:15px;
	color:red;
	margin-top:10px;
}
.logoimage{
	width:50px;
	height:50px;
}
h4{
	font-size:10px;
	font-weight: bold;
}
.form-inline{
	margin:0% 6.33% 0% 6.33%;
}
.tickethead{
	padding:1px 0px;
	margin-top:7px;
}
.col-13{
	width:18%;	
	padding:3px 0px;
	margin:3px 5px 3px 15.5px;
	font-size:14px;
	font-weight: normal;
}
.col-14{
	width:30%;	
	padding:3px 0px;
	margin:3px 5px 3px 12px;
	font-size:14px;
		font-weight: normal;
}
.btn{
	font-size:15px;
}
.sizefont{
	font-size:10px;
}
.sizefont2{ font-size:15px;}
.wid{
 width:100%;
}
.firstwid{ width:50%;}

}
</style>
<script>
	function fullfun(){
		$(document).ready(function(){
		  $("#fullsethide").click(function(){
			$(".fullticket").remove();
		  });
		});
				$(document).ready(function(){
		$('#fullsetshow').click(function(){
  $(this).parent().addClass('fullticket');
});
		});
	}
</script>
</head>
<body class="body">
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
		<table class="bg-primary tbl">
			<tr>
				 <td> <a href="lotterydashboard.php" class=" btn " >TICKET DETAILS</a> </td>
				 <td> <a href="addticket.php" class="btn ">ADD TICKET</a> </td>
				 <td> <a href="deleteticket.php" class="btn ">DELETE TICKET</a> </td>
				 <td> <a href="viewticket.php" class="btn bg-black" >VIEW LIVE TICKETS</a> </td>
				 <td> <a href="" class="btn hidde">DOWNLOAD TICKETS</a> </td>
				 <td> <a href="" class="btn hidde">TICKET BOOKING ENTRIES</a> </td>
			</tr>
		</table>
</section>
<div class="text-center mainpage">
	<div class="topic"><b>WEEKLY LOTTERY</b></div><br>
</div>

<section class="form-inline mainpage fullticket">
<?php
		ini_set('display_errors', 0);
		include("database.php");
		$query_a="select fname,lname,ticketdate,amount,ticketcode,sno,imagefile from ticketbooking where sno=(select max(sno) from ticketbooking)";
		$rs= mysqli_query($con, $query_a);

		while($row=mysqli_fetch_assoc($rs))
		{	
	  $image = 'uploads/'.$row["imagefile"];

?>	<center> <img src="<?php echo $image; ?>" alt=""  class="imagefile"/>	 </center><br>
			<table>
				<tr><td>  <p class="text-dark text-uppercase"><b class="sizefont2">	<?php echo $row['fname']; ?>  	<?php echo $row['lname']; ?></b></td></tr>
				<tr class="text-success"> <td><b class="sizefont"> 	<?php echo $row['ticketdate']; ?> </p></td></tr>
				<tr > <td><b style="color:red;" class="sizefont">  &#8377	<?php echo $row['amount']; ?> </p></td></tr>
				<tr class="text-secondary text-uppercase"> <td> <b class="sizefont" > 	<?php echo $row['ticketcode']; ?></p> </td></tr>
			</table>
<?php 
		}
?>
</section>

<section class="form-inline mainpage fullticket">
	<div class="bg-primary text-white text-center tickethead " >
			<b><h4>FULL-SET TICKETS</h4><b>
	<div>
</section>
<section class="form-inline view mainpage fullticket">
<?php
		ini_set('display_errors', 0);
		include("database.php");
		$queryone="select fullticketno from fullticket";
		$result = mysqli_query($con, $queryone);
?>	
			<div class="row text-center ">
				<?php while($data = mysqli_fetch_assoc($result)) { ?>
				<div class="col-13 text-center  bg-light ">
				<?php echo $data['fullticketno']; ?>
				</div>
				<?php } ?>
			</div><br>
		<form action="fullsetconfirm.php" method="post" class="text-center">
			<input type="submit" name="fullsetsubmit" id="fullsetsubmit" class="btn bg-success text-white buyticket"  value="BUY TICKETS">
		</form><hr>
</section>

<section class="form-inline mainpage">
<?php
		ini_set('display_errors', 0);
		include("database.php");
		$query_c="select fname,lname,ticketdate,round(amount/2),sno from ticketbooking where sno=(select max(sno) from ticketbooking)";
		$rs_c= mysqli_query($con, $query_c);

		while($row_c=mysqli_fetch_assoc($rs_c))
		{	
?>			<table>
				<tr><td>  <p class="text-dark text-uppercase"><b class="sizefont2">	<?php echo $row_c['fname']; ?>  	<?php echo $row_c['lname']; ?></b></td></tr>
				<tr class="text-success"> <td><b class="sizefont"> 	<?php echo $row_c['ticketdate']; ?> </p></td></tr>
				<tr > <td><b style="color:red;"class="sizefont" >  &#8377	<?php echo $row_c['round(amount/2)']; ?> </p></td></tr>
			</table>
<?php 
		}
?>
</section>
<section class="form-inline mainpage">
	<div class="bg-primary text-center tickethead">
			<b><h4>HALF-SET TICKETS</h4><b>
	<div>
</section>
<br>
<section class="form-inline  d-flex mainpage" class="wid">
	
<div style="background-color:#FFE4B5;" class="firstwid ">	
	<script>var text; var firsthalf;</script>
	<?php
		ini_set('display_errors', 0);
		include("database.php");
		$query_ten="select ticketcode,sno from ticketbooking where sno=(select max(sno) from ticketbooking)";
		$result_ten = mysqli_query($con, $query_ten);
		while($data_ten = mysqli_fetch_assoc($result_ten)) {
	?><script>
		text='<?php echo $data_ten["ticketcode"]; ?>'.split(",");
		var middle =  Math.ceil(text.length/2);
		firsthalf = text.slice(0, middle);
		//var secondhalf =text.slice(middle);
		</script>
	<?php
		}
		print "<html class='mainpag'> <h4 style='margin-left:5%;' ><script >";
		print "document.write(firsthalf)";
		print "</script></h4></html>";
	?>
<?php
		ini_set('display_errors', 0);
		include("database.php");
		$querytwo="select firsthalfticketno from firsthalfticket";
		$result2 = mysqli_query($con, $querytwo);
?>		
 		<div class="row text-center firsthalf">
	<?php
		ini_set('display_errors', 0);
		while($data2 = mysqli_fetch_assoc($result2)) {
	?>
		<div class="col-14 text-center  bg-light ">
  	<?php echo $data2['firsthalfticketno']; ?>
		</div>
	<?php } ?>
		</div>
</div>

<div style="background-color:#FFE4E1;" class="firstwid ">	
	<script>var twotext; var secondhalf;</script>
	<?php
		ini_set('display_errors', 0);
		include("database.php");
		$queryp="select ticketcode,sno from ticketbooking where sno=(select max(sno) from ticketbooking)";
		$resultp = mysqli_query($con, $queryp);
		while($datap= mysqli_fetch_assoc($resultp)) {
	?><script>
		secondtext='<?php echo $datap["ticketcode"]; ?>'.split(",");
		var mid =  Math.ceil(secondtext.length/2);
		secondhalf = text.slice(mid);
		//var secondhalf =text.slice(middle);
		</script>
	<?php
		}
		echo "<section id='mainpg'> <h4 style='margin-left:5%;' ><script >";
		echo "document.write(secondhalf)";
		echo "</script></h4></section>";
	?>
<?php	ini_set('display_errors', 0);
		include("database.php");
		$queryq="select sticketno from sticket";
		$resultq = mysqli_query($con, $queryq);
?>		
 		<div class="row text-center secondhalf">
	<?php
		ini_set('display_errors', 0);
		while($dataq = mysqli_fetch_assoc($resultq)) {
	?>
		<div class="col-14 text-center  bg-light ">
  	<?php echo $dataq['sticketno']; ?>
		</div>
	<?php } ?>
		</div>
</div>
</br>
</section>

<section class="mainpage"><br>
		<form action="halfsetconfirm.php" method="post" class="text-center">
				<input type="submit" name="halfsetsubmit" id="halfsetsubmit" class="btn bg-success text-white"  value="BUY TICKETS">
		</form><hr>
</section>

<section class="form-inline mainpage">
<?php
		ini_set('display_errors', 0);
		include("database.php");
		$query_c="select fname,lname,ticketdate,round(amount/8),sno from ticketbooking where sno=(select max(sno) from ticketbooking)";
		$rs_c= mysqli_query($con, $query_c);

		while($row_c=mysqli_fetch_assoc($rs_c))
		{	
?>			<table>
				<tr><td>  <p class="text-dark text-uppercase"><b class="sizefont2">	<?php echo $row_c['fname']; ?>  	<?php echo $row_c['lname']; ?></b></td></tr>
				<tr class="text-success"> <td><b class="sizefont" > 	<?php echo $row_c['ticketdate']; ?> </p></td></tr>
				<tr > <td><b style="color:red;" class="sizefont">  &#8377	<?php echo $row_c['round(amount/8)']; ?> </p></td></tr>
			</table>
<?php 
		}
?>
</section>
<section class="form-inline mainpage">
	<div class="bg-primary text-center tickethead">
			<b><h4>SINGLE TICKETS</h4><b>
	<div>
</section>
<section class="form-inline view mainpage">
<?php	
		include("database.php");
		$querythree="select singleticketnonew from singleticketnew";
		$result3 = mysqli_query($con, $querythree);
?>		
 		<div class="row text-center ">
	<?php
		ini_set('display_errors', 0);
		while($data3 = mysqli_fetch_assoc($result3)) {
	?>
		<div class="col-13 text-center  bg-light ">
  	<?php echo $data3['singleticketnonew']; ?>
		</div>
	<?php } ?>
		</div><br>
		<form action="singlesetconfirm.php" method="post" class="text-center">
			<input type="submit" name="singlesetsubmit" id="singlesetsubmit" class="btn bg-success text-white"  value="BUY TICKETS">
		</form><br>
</section>

</body>

</html>