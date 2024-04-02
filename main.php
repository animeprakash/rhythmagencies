<!doctype html>
<html lang="en">
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
  overflow: auto;
}
.logoimage{
	width:100px;
	height:100px;
}
.topic{
	font-size:30px;
	color:red;
	margin-top:2%;
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
.inform{
	display:flex;
	background-color:lightgray;	
}
.sizefont{
	font-size:20px;
}
.sizefont2{ font-size:25px;}
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
.col-14{
	width:20%;	
	padding:12px 0px;
	margin:5px ;
	font-weight: normal;
}
#column{
	background-color:#F8F8FF;
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
}
.col-14{
	width:30%;	
	padding:3px 0px;
	margin:3px 5px 3px 12px;
	font-size:14px;
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
@media screen and (max-width:393px) {

body {font-family: Arial, Helvetica, sans-serif;
		font-weight: normal;
}	
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
	margin:3px 5px 3px 18px;
	font-size:14px;
}
.col-14{
	width:30%;	
	padding:3px 0px;
	margin:3px 5px 3px 12px;
	font-size:14px;
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

</head>

<hr>
<body  class="main mainpag"> 

<section id="mainpg"> </section>

 <script>
$(document).ready(function(){
  $('.main').load("viewticket.php .mainpage");
});

$.get('viewticket.php', function(data) {
  // Handle the JavaScript response here
  eval(data); // Execute the returned JavaScript code
})
.fail(function(error) {
  console.error('An error occurred:', error);
});

    </script>


</body>
</html>






<?php
		ini_set('display_errors', 0); 
        if(isset($_POST["onewaytaxiupdate"])) {
            include("database.php");
            $onewaytaxiid=$_POST['onewaytaxiid'];
            $onewaytaxiname=$_POST['onewaytaxiname'];
            $onewaytaxiabout=$_POST['onewaytaxiabout'];
			$onewaytaxirate=$_POST['onewaytaxirate'];
			$onewaytaxidiscount=$_POST['onewaytaxidiscount'];

			$target_dir = mkdir("uploads");
			$target_dir = "uploads/";
			$onewaytaxiimage=$_FILES["onewaytaxiimage"]["name"];
			$target_file = $target_dir . basename($_FILES["onewaytaxiimage"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES["onewaytaxiimage"]["tmp_name"], $target_file);
			
			$quer="update onewayvehicle set onewaytaxiimage='".$onewaytaxiimage."',onewaytaxiname='".$onewaytaxiname."',onewaytaxiabout='".$onewaytaxiabout."',onewaytaxirate='".$onewaytaxirate."',onewaytaxidiscount='".$onewaytaxidiscount."'  where onewaytaxiid='".$onewaytaxiid."' ";

			$result=mysqli_query($con,$quer);
			if($result){
				header("Location:onewayvehicle.php");
			}else{
				echo"ERROR!!";
			}
        }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="adminhomepage.css" />
    <script src="adminhomepage.js" defer></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"  crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>	
	    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

</script>
<style>
.span{
 text-decoration:none;
 }
.title{
	color:white;
}
.buttongroup{
	width:240px;
}
.navigation{
	width:100%;
	height:7%;
}
.overall{
	margin:0% 0% 0 5.5%;
}
.imagefile{
	width:80px;
	height:80px;
}
.onewayborder{
	border:1px solid #0000ff;
	border-radius:25px;
	height:100px;
	text-align:center;
	padding:10px 20px;
	width:75%;
	margin:8.33% 12.5% 0% 12.5%;
}
.onewaytable{
	border:1px solid #0000ff;
	border-radius:25px;
	height:100px;
	text-align:center;
	padding:8px 20px;
	width:75%;
	margin:2% 12.5% 0% 12.5%;
}
td{
	border:0px solid #0000ff;
	width:8%;
	text-align:center;
}
td:nth-child(even) {
	background-color: #f2f2f2;
	}
.btn-sm{
	width:70px;
}

</style>
<script>

			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
				}
</script>
 </head>
  <body>
<section>
    <nav class="sidebar locked bg-primary btn">
      <div class="logo_items flex">
        <span class="nav_image">
          <img src="images/logo.png" alt="logo_img" />
        </span>
        <span class="logo_name title">TAXI</span>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Dashboard</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-home-alt"></i>
                <span class="">Bookings</span>
              </a>
            </li>
           
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Management</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bxs-magic-wand"></i>
               User
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-folder"></i>
                <span>Driver</span>
              </a>
            </li>
		<li class="item link flex">              		
		  <div class="dropdown-toggle flex buttongroup " data-bs-toggle="dropdown" aria-expanded="false">
			<span><i class="bx bx-folder "></i></span><span>Vehicle</span>
		  </div>
		  <ul class="dropdown-menu">
			<li><a class="dropdown-item active" href="onewayvehicle.php">One Way</a></li>
			<li><a class="dropdown-item" href="roundtripvehicle.php">Round Trip</a></li>
			<li><a class="dropdown-item" href="localvehicle.php">Local</a></li>
			<li><a class="dropdown-item" href="airportvehicle.php">Airport</a></li>
		  </ul>
		</li>
	</ul>
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Setting</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-flag"></i>
                <span>Notice Board</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-award"></i>
                <span>Award</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-cog"></i>
                <span>Setting</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</section>
<!--Body Content Started-->
<section class="overall">
	<div  class="bg-primary  navigation">

	</div>
</section>

<section>
		<div class="onewaytable">
		<table>
 <?php
		ini_set('display_errors', 0); 
        if(isset($_GET["onewaytaxiid"])) {
            include("database.php");
			
           $onewaytaxiid=$_GET['onewaytaxiid'];
			$query="select onewaytaxiid,onewaytaxiimage,onewaytaxiname,onewaytaxiabout,onewaytaxirate,onewaytaxidiscount from onewayvehicle where onewaytaxiid='".$onewaytaxiid."'";
			$result= mysqli_query($con, $query);
			while($data= mysqli_fetch_assoc($result)) {
				 $image= 'uploads/'.$data["onewaytaxiimage"];
			
?>
        <form class="needs-validation" novalidate action="onewayvehicle.php" method="post"  enctype="multipart/form-data">
            <tr>
			    <td ><input type="text" id="onewaytaxiid" name="onewaytaxiid" class="form-control w-100 " required value="<?php  echo $data['onewaytaxiid'];?>"></td>
                <td ><input type="file" id="onewaytaxiimage" name="onewaytaxiimage" class="form-control-file w-100 " required></td>
                <td><input type="text" id="onewaytaxiname" name="onewaytaxiname"   class="form-control w-100" required value="<?php  echo $data['onewaytaxiname'];?>"></td>
                <td><input type="text" id="onewaytaxiabout" name="onewaytaxiabout"  class="form-control w-100" required value="<?php  echo $data['onewaytaxiabout'];?>"></td>
                <td><input type="text" id="onewaytaxirate" name="onewaytaxirate"   class="form-control w-100" required value="<?php  echo $data['onewaytaxirate'];?>"></td>			
                <td><input type="text" id="onewaytaxidiscount" name="onewaytaxidiscount" class="form-control w-100" required value="<?php  echo $data['onewaytaxidiscount'];?>"></td>
                <td><input type="submit" value="UPDATE" name="onewaytaxiupdate"class="btn btn-primary  w-100" name="onewaytaxisubmit" id="onewaytaxisubmit"></td>
            </tr>
		</form> 
		<?php }} ?>
		</table>
		</div>	
</section>
<?php
		ini_set('display_errors', 0); 
        if(isset($_POST["onewaytaxisubmit"])) {
            include("database.php");
            //$onewaytaxiid=$_POST['onewaytaxiid'];
            $onewaytaxiname=$_POST['onewaytaxiname'];
            $onewaytaxiabout=$_POST['onewaytaxiabout'];
			$onewaytaxirate=$_POST['onewaytaxirate'];
			$onewaytaxidiscount=$_POST['onewaytaxidiscount'];

			$target_dir = mkdir("uploads");
			$target_dir = "uploads/";
			$onewaytaxiimage=$_FILES["onewaytaxiimage"]["name"];
			$target_file = $target_dir . basename($_FILES["onewaytaxiimage"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES["onewaytaxiimage"]["tmp_name"], $target_file);
			
			$q="create table onewayvehicle (onewaytaxiid int not null auto_increment primary key,onewaytaxiimage longblob,onewaytaxiname varchar(100),onewaytaxiabout varchar(200),onewaytaxirate int,onewaytaxidiscount int)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
			$query="insert into onewayvehicle(onewaytaxiimage,onewaytaxiname,onewaytaxiabout,onewaytaxirate,onewaytaxidiscount)values('".$onewaytaxiimage."','".$onewaytaxiname."','".$onewaytaxiabout."','".$onewaytaxirate."','".$onewaytaxidiscount."')";

			mysqli_query($con,$q);
			mysqli_query($con,$query);			
        }
?>
<section class="overall">
<div>
	<div class="onewayborder">
		<table>
        <thead>
				<tr >
					<th>TAXI IMAGE</th>
					<th>TAXI NAME</th>
					<th>ABOUT</th>
					<th>TAXI RATE</th>
					<th>DISCOUNT</th>
					<th>BUTTON</th>
				</tr>
 
        <form class="needs-validation" novalidate action="onewayvehicle.php" method="post"  enctype="multipart/form-data">
            <tr>
                <td ><input type="file" id="onewaytaxiimage" name="onewaytaxiimage" class="form-control-file w-100 " required></td>
                <td><input type="text" id="onewaytaxiname" name="onewaytaxiname"   class="form-control w-100" required></td>
                <td><input type="text" id="onewaytaxiabout" name="onewaytaxiabout"  class="form-control w-100" required></td>
                <td><input type="text" id="onewaytaxirate" name="onewaytaxirate"   class="form-control w-100" required></td>			
                <td><input type="text" id="onewaytaxidiscount" name="onewaytaxidiscount" class="form-control w-100" required></td>
                <td><input type="submit" value="SUBMIT" class="btn bg-primary text-white w-100" name="onewaytaxisubmit" id="onewaytaxisubmit"></td>
            </tr>
		</form> 
        </thead> 
		</table>
		</div>

		<?php
			ini_set('display_errors', 0);
			include("database.php");
			$querys="select onewaytaxiid,onewaytaxiimage,onewaytaxiname,onewaytaxiabout,onewaytaxirate,onewaytaxidiscount from onewayvehicle ";
			$results= mysqli_query($con, $querys);
			while($datas= mysqli_fetch_assoc($results)) {
				 $image= 'uploads/'.$datas["onewaytaxiimage"];
		?>	
		<div class="onewaytable">	
		<table>
			<tr>
			<form  action="" method="post">
					<td><?php echo $datas['onewaytaxiid']; ?></td>
					<td><img src="<?php echo $image; ?>" alt="" class="imagefile"/></td>
					<td><?php echo $datas['onewaytaxiname']; ?></td>
					<td><?php echo $datas['onewaytaxiabout']; ?></td>
					<td><?php echo $datas['onewaytaxirate']; ?></td>
					<td><?php echo $datas['onewaytaxidiscount']; ?></td>
					<td>
					<script>
						function onewayvehiclefun(){
							window.location.href = 'onewayvehicle.php?onewaytaxiid=<?php echo $datas["onewaytaxiid"];?>';
						}
					</script>
						<input type="submit" onclick="onewayvehiclefun()" value="Update" name="update" class="btn bg-warning">
						<a href="onewayvehicledelete.php?onewaytaxiid='<?php echo $datas['onewaytaxiid']; ?>'" class="btn bg-danger text-white"> Delete</a>
					</td>
			</form>
			</tr>
		</table>
		</div>
		<?php } ?>

</div>
</section>

  </body>
</html>
