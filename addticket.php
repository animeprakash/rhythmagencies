
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
	padding:0px 10px 10px 1px;
}

.sec{
	display:flex;
	padding:20px 20px 0 0px;
	height:120px;
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
@include media-breakpoint-up(sm) {
.form-control{
	width:20px;
}
}
</style>

</head>
<body>
<div class="text-left"> <img src="rythm.jpg" width="100px" height="100px" ></div>
<div>
	<nav class="navbar navbar-dark bg-primary">
		  <a href="home.php" class="active btn">HOME</a> 
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
				 <td> <a href="lotterydashboard.php" class=" btn " >TICKET DETAILS</a> </td>
				 <td> <a href="addticket.php" class="btn bg-black">ADD TICKET</a> </td>
				 <td> <a href="deleteticket.php" class="btn ">DELETE TICKET</a> </td>
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
            $tickettype=$_POST['tickettype'];
			$fromno=$_POST['fromno'];
            $tono=$_POST['tono'];
			
			$drop1="drop table if exists addticket";
			$queryone="create table addticket (tickettype varchar(100),fromno int,tono int)";
			$querytwo="insert into addticket(tickettype,fromno,tono)values('".$tickettype."','".$fromno."','".$tono."')";
			mysqli_query($con,$drop1);
			$result=mysqli_query($con,$queryone);
			$result2=mysqli_query($con,$querytwo);
			
			if($tickettype=='FULL-SET TICKETS'){
				$drop2="drop table if exists fullticket";
				mysqli_query($con,$drop2);
				$firstquery="create table fullticket (fullticketno int primary key)";
				$pro="drop procedure if exists fullprocedure";
				$secondquery="CREATE PROCEDURE fullprocedure (fromnum int,tonum int)
					BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i <= max_rows DO
						INSERT INTO fullticket (fullticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END;";
				$thirdquery="call fullprocedure('".$fromno."','".$tono."')";
				
				mysqli_query($con,$firstquery);
				mysqli_query($con,$pro);				
				mysqli_query($con,$secondquery);
				mysqli_query($con,$thirdquery);
			}
			if($tickettype=='HALF-SET TICKETS'){
				$middleno=round(($fromno+$tono)/2);
				$drop3="drop table if exists firsthalfticket";
				mysqli_query($con,$drop3);
				$aquery="create table firsthalfticket (firsthalfticketno int primary key)";
				$bquery="drop procedure if exists firsthalfprocedure";				
				$cquery="CREATE PROCEDURE firsthalfprocedure (fromnum int,tonum int)
					BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i < max_rows DO
						INSERT INTO firsthalfticket (firsthalfticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END;";
				$dquery="call firsthalfprocedure('".$fromno."','".$middleno."')";
				
				mysqli_query($con,$aquery);
				mysqli_query($con,$bquery);
				mysqli_query($con,$cquery);
				mysqli_query($con,$dquery);
			}
			if($tickettype=='HALF-SET TICKETS'){
				$mid=round(($fromno+$tono)/2);
				$drop4="drop table if exists sticket";
				mysqli_query($con,$drop4);
				$queryf="create table sticket (sticketno int primary key)";
				$queryg="drop procedure if exists sprocedure";	
				$queryh="CREATE PROCEDURE sprocedure (fromnum int,tonum int)
					BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i <= max_rows DO
						INSERT INTO sticket (sticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END;";
				$queryi="call sprocedure('".$mid."','".$tono."')";
				
				mysqli_query($con,$queryf);
				mysqli_query($con,$queryg);
				mysqli_query($con,$queryh);
				mysqli_query($con,$queryi);
			}
			if($tickettype=='SINGLE TICKETS'){
				$drop5="drop table if exists singleticket";
				mysqli_query($con,$drop5);				
				$query_5="create table singleticket (singleticketno int primary key)";
				$pro3="drop procedure if exists singleprocedure";	
				$query_6="CREATE PROCEDURE singleprocedure (fromnum int,tonum int)
					BEGIN
					  DECLARE i INT DEFAULT fromnum;
					  DECLARE max_rows INT DEFAULT tonum;
					  WHILE i <= max_rows DO
						INSERT INTO singleticket (singleticketno) VALUES (i);
						SET i = i + 1;
					  END WHILE;
					END;";
				$query_7="call singleprocedure('".$fromno."','".$tono."')";
				
				mysqli_query($con,$query_5);
				mysqli_query($con,$pro3);
				mysqli_query($con,$query_6);
				mysqli_query($con,$query_7);
			}
			
		}
		

?>	

<?php
	ini_set('display_errors', 0);
	if(isset($_POST["submit"])) {
		include("database.php");
		$query_c="select ticketcode,max(sno) from ticketbooking where sno=(select max(sno) from ticketbooking)";
		
		$rsss= mysqli_query($con, $query_c);
		while($row6=mysqli_fetch_assoc($rsss))
		{
?>		<script>
		var str;
		var arr='<?php echo $row6["ticketcode"]; ?>'.split(",");
		</script>
<?php		}
?><script>var newnum;var ar=[];var array=[];var newarray=[];</script>
<?php	
		error_reporting(E_ERROR | E_WARNING | E_PARSE); 
		include("database.php");
		$querye="create table singleticketnew (singleticketnonew varchar(200) primary key)";
		mysqli_query($con,$querye);
		
		$queryseven="select singleticketno from singleticket";
		$resultseven = mysqli_query($con, $queryseven);
		
		while($dataseven = mysqli_fetch_assoc($resultseven)) {
	?>
  		<script>
		var str2;
		str2='<?php echo $dataseven['singleticketno']; ?>'.concat(",").slice(0, -1);
		array.push(str2);
		</script>			
	<?php } ?>
	<script>	
		for(var i=0;i<array.length;i++)
		{
			const randomIndex = Math.floor(Math.random() * arr.length);
			const item = arr[randomIndex];
			newnum=item+array[i];
			newarray.push(newnum);				
		}	//alert(newarray.toString());
		window.location.href = 'singleticketnew.php?data='+encodeURIComponent(newarray.toString());

	</script>

	<?php } ?>
<section class="form-inline sec">
	<div class="sec">
		<table class="tbl">
			<form action="addticket.php" method="post">
				<tr><td>	<select name="tickettype"  class="form-control w-75" required>
							  <option selected disabled>Select Ticket Type</option>
							  <option >FULL-SET TICKETS</option>
							  <option >HALF-SET TICKETS</option>
							  <option >SINGLE TICKETS</option>
							</select>
				</td></tr>
				<tr><td><input type="text" name="fromno" id="fromno"  placeholder="From Number" class="form-control w-75 " required></td></tr>
				<tr><td><input type="text" name="tono" id="tono" placeholder="To Number" class="form-control w-75" required></td></tr>		
				<tr><td><input type="submit" name="submit" value="ADD"  class="btn bg-primary w-25" >
						<input type="reset" name="submit" value="CANCEL"  class="btn bg-danger text-white w-25"></td>
				</tr>
			</form>
		</table>
	</div>
	<div class="sec topheight">
		<div class="card border-primary mb-3" style="max-width: 18rem;">
		  <div class="card-header text-center">Total Full Tickets</div>
		  <div class="card-body text-primary text-center">
			<?php 
			ini_set('display_errors', 0); 	
            include("database.php");	
			$querythree="select count(fullticketno) from fullticket";
			$resultcount=mysqli_query($con,$querythree);		
			while($data=mysqli_fetch_array($resultcount)){?>
					<h4><?php echo $data['count(fullticketno)']; ?></h4>
			<?php }?>
		  </div>
		</div>
	</div>
	<div class="sec">
		<div class="card border-primary mb-3" style="max-width: 18rem;">
		  <div class="card-header text-center">Total Half Tickets</div>
		  <div class="card-body text-primary text-center">
			<?php 
				ini_set('display_errors', 0);
				$queryfour="select count(firsthalfticketno) from firsthalfticket";
				$querysix="select count(sticketno) from sticket";
				$resultcounttwo=mysqli_query($con,$queryfour);
				$resultcountfour=mysqli_query($con,$querysix);
				while($datatwo=mysqli_fetch_array($resultcounttwo)   ){
					if($datafour=mysqli_fetch_array($resultcountfour)){
					?>
					<script> var number=<?php echo $datatwo['count(firsthalfticketno)']; ?>;
							
							var number2=<?php echo $datafour['count(sticketno)']; ?>; 
							var sum=number+number2;
					</script> 
					<h4>	<?php
								echo "<script >";
								echo "document.write(sum)";
								echo "</script>";
							?></h4>
				<?php }}?>
		  </div>
		</div>
	</div>
	<div class="sec">
		<div class="card border-primary mb-3" style="max-width: 18rem;">
		  <div class="card-header text-center">single Tickets</div>
		  <div class="card-body text-primary text-center">
			<?php 
				 ini_set('display_errors', 0);
				$queryfive="select count(singleticketno) from singleticket"; 
				$resultcountthree=mysqli_query($con,$queryfive);
				while($datathree=mysqli_fetch_array($resultcountthree)){?>
					<h4><?php echo $datathree['count(singleticketno)']; ?></h4>
			<?php }?>
		  </div>
		</div>
	</div>
</section>
<table id="numbers"></table>
</body>

</html>