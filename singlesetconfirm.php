<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
*{
	box-sizing:border-box;
}
body {font-family: Arial, Helvetica, sans-serif;
		font-size:19px;
}
.navbar {
  width: 100%;
  overflow: auto;
}

.form-inline{
	margin:0% 8.33% 0% 8.33%;
	
}
.inform{
	display:flex;
	background-color:lightgray;
	
}
.topic{
	font-size:30px;
	color:red;
	margin-top:2%;
}
.col-13{
	width:10%;	
	padding:12px 0px;
	margin:5px;
	font-size:19px;
}
.view{
	margin:0% 8.33% 0 10%;
}
.tickethead{
	padding:6px 0px;
	margin-top:15px;
}
.tbl td{
	width:400px;
	padding:10px;
}
.sizefont{
	font-size:20px;
}
.sizefont2{ font-size:25px;}
#column{
	background-color:#F8F8FF;
}
.select{
	display:flex;
}
@media screen and (max-width:360px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
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
	font-size:25px;
}
.col-14{
	width:30%;	
	padding:3px 0px;
	margin:3px 5px 3px 12px;
	font-size:25px;
}
.btn{
	font-size:15px;
}

.butt{
	font-size:15px;
	height:20px;
}
.sizefont{
	font-size:10px;
}
.sizefont2{ font-size:15px;}
#column{
	background-color:#F8F8FF;
	font-weight:bold;
}
.select{
	display:block;
}
.selectee{
	padding:30px;
	text-align:center;
}
.selectee2{
	padding:30px;
	text-align:center;
	margin-top:-50px;
}
}
@media screen and (max-width:393px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
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
	margin:3px 5px 3px 17px;
	font-size:25px;
}
.col-14{
	width:30%;	
	padding:3px 0px;
	margin:3px 5px 3px 12px;
	font-size:25px;
}
.btn{
	font-size:15px;
}

.butt{
	font-size:15px;
	height:20px;
}
.sizefont{
	font-size:10px;
}
.sizefont2{ font-size:15px;}
#column{
	background-color:#F8F8FF;
}
.select{
	display:block;
}
.selectee{
	padding:30px;
	text-align:center;
}
.selectee2{
	padding:30px;
	text-align:center;
	margin-top:-50px;
}
}
</style>
<script>
	var arr = [];
	var arrtwo=[];
	var arrdif;
	$(document).ready(function(){
		$('.col-13').click(function() {

			var clicks = $(this).data('clicks');
			  if (clicks) {
						$(this).css({'background-color':'#F8F8FF','color':'black'});
						$('#numcount').html(function(i, val) { return val*1-1 });
						arrtwo.push($(this).text());
						arrdif=arr.filter(x => arrtwo.indexOf(x) === -1);
						//alert(arrdif);//after remove ans
						arr.splice(0,arr.length);	
						arr=arrdif;
			  } 
			  else {	//for odd click
						$('#numcount').html(function(i, val) { return val*1+1 });
						$(this).css({'background-color':'blue','color':'white'});
						arr.push($(this).text());
						//alert(arr);
			  }
			  $(this).data("clicks", !clicks);	
<?php
		include("database.php");
		$query_b="select round(amount/8),sno from ticketbooking where sno=(select max(sno) from ticketbooking)";
		$result3 = mysqli_query($con, $query_b);
		while($rowdata = mysqli_fetch_assoc($result3)) {?>
			document.getElementById("totalamount").innerHTML=arr.length*<?php echo $rowdata['round(amount/8)']; ?>;
			document.getElementById("totalamount2").innerHTML=arr.length*<?php echo $rowdata['round(amount/8)']; ?>;
<?php } ?>
	});
	});	
		function selectednum(){
			var html = "<div class='row' border='1'>";
			for (var i = 0; i < arr.length; i++) {
				html+="<div class='col-13'>";
				html+=arr[i];
				html+="</div>";
			}
			html+="</div>";
			document.getElementById("selectednum").innerHTML = html;
			document.getElementById("selectednum2").innerHTML = html;
	}
		function gotowhatsapp()
	{	
		window.location.href = 'singlesetwhatsapp.php?singlesetinfo=%20'+(arr.toString());
	}
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})

</script>
</head>
<body>
<div class="text-center ">
	<div class="topic"><b>WEEKLY LOTTERY</b></div>
	<hr>
</div>
<section class="form-inline">
<?php
		ini_set('display_errors', 0);
		include("database.php");
		$query_c="select fname,lname,ticketdate,round(amount/8),sno from ticketbooking where sno=(select max(sno) from ticketbooking)";
		$rs_c= mysqli_query($con, $query_c);

		while($row_c=mysqli_fetch_assoc($rs_c))
		{	
?>				<table>
				<tr><td>  <p class="text-dark text-uppercase"><b class="sizefont2">	<?php echo $row_c['fname']; ?>  	<?php echo $row_c['lname']; ?></b></td></tr>
				<tr class="text-success"> <td><b class="sizefont"> 	<?php echo $row_c['ticketdate']; ?> </p></td></tr>
				<tr > <td><b style="color:red;" class="sizefont">  &#8377	<?php echo $row_c['round(amount/8)']; ?> </p></td></tr>
				<tr class="text-secondary text-uppercase"> <td> <b class="sizefont" > 	<?php echo $row_c['ticketcode']; ?></p> </td></tr>
			</table>
<?php 
		}
?>
</section>
<section class="form-inline">
	<div class="bg-primary text-center tickethead">
			<b><h4>SINGLE TICKETS</h4><b>
	<div>
</section>
<section class="form-inline view">
<?php
		include("database.php");
		$querytwo="select singleticketnonew from singleticketnew";
		$result2 = mysqli_query($con, $querytwo);
?>
			<div class="row text-center ">
			<?php while($data = mysqli_fetch_assoc($result2)) {?>
				<div class="col-13 text-center  btn" id="column" >
			<?php echo $data['singleticketnonew']; ?>
				</div>
			<?php } ?>
			</div>
<hr>
</section>
<section>

		<div class="container ">
			<div class="select justify-content-between ">
				<div class="float-left selectee" ><div class="flex btn bg-warning " >Selected Tickets<div id="numcount" class="btn bg-warning ">0</div></div></div>
				<div class="text-center selectee2"><input type="submit" name="fullsetconfirm" id="fullsetconfirm" class="btn bg-success text-white"  data-toggle="modal" data-target="#myModal" value="CONFIRM TICKET" onclick="selectednum()"></div>
				<div class="float-right selectee2"><div class="flex btn bg-warning text-right" >Total Amount &#8377 <div id="totalamount" class="btn w-25 bg-warning nums"> 0</div></div>	</div>		
			</div>
		 <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <div class="modal-content">
				<div class="modal-header">
				  <img src="rythm.jpg" width="100" height="100">
				</div>
		   
				<div class="modal-body text-center">
					<?php
							include("database.php");
							$query_a="select fname,lname,ticketdate,amount,ticketcode,sno from ticketbooking where sno=(select max(sno) from ticketbooking)";
							$rs= mysqli_query($con, $query_a);
							while($row=mysqli_fetch_assoc($rs))
							{
					?>			<div>
									<p class="text-dark text-uppercase"><b style="font-size:25px;">	<?php echo $row['fname']; ?>  	<?php echo $row['lname']; ?></b></p>
									<p class="text-success"><b style="font-size:20px;"> 	<?php echo $row['ticketdate']; ?></b> </p>
									<div class="d-flex justify-content-center">  
										<div class="p-2 bd-highlight">Total Amount &#8377 </div>
										<div class="p-2 bd-highlight" id="totalamount2" >0</div>
									</div>
								</div>
					<?php } ?>
							<div  id="selectednum">

				</div>

				<div class="modal-footer float-center">
				
					<center> <button class="btn" onclick="gotowhatsapp()"> <img alt="Booking on WhatsApp" src="WhatsAppButton.png" width="150" height="35"/><div /></center>

				</div>
			  </div>
			  
			</div>
		  </div>
		  
		</div>

</section>

</body>

</html>