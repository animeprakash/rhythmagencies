		<?php 	
			include("database.php");
	
			$str=$_GET['data'];

			$arr = explode(",", $str);
			for ($x = 0; $x <sizeof($arr); $x++)
			{
				$qq="insert into singleticketnew (singleticketnonew) VALUES ('".$arr[$x]."')" ;
				mysqli_query($con,$qq);
			}		
			header('location:addticket.php');
		?>