
<?php 	
			include("database.php");
	
			$str=$_GET['singlesetinfo'];
			$query="select mobilenumber,sno from ticketbooking where sno=(select max(sno) from ticketbooking)";

			$res= mysqli_query($con, $query);

			while($data = mysqli_fetch_assoc($res)) 
			{
				$phone=$data['mobilenumber'];
			$url="https://wa.me/".$phone."/?text=Singleset%20ticket%20booking%20numbers".urlencode($str);
			header("Location:".$url);
			}
?>