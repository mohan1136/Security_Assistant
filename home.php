<?php
	session_start();
	$message='';
	if($_SESSION['id']=='')
	{
		header("Location:login.php");
	}
	if(isset($_POST['logout']))
	{
		$_SESSION['id']='';
		header("Location:login.php");
	}
	if(isset($_POST['checkOut']) || isset($_POST['checkIn']))
	{
		if(empty($_POST['empId']))
		{
			$message="Please enter non-empty employee ID";
		}
		else
		{
			$id=$_POST['empId'];
			$connection=mysqli_connect('localhost','root','','securiry');
			$query="SELECT * FROM employee WHERE id='$id'";
			$result=mysqli_query($connection,$query);
			if($row=mysqli_fetch_array($result))
			{
				$query="SELECT COUNT(employeeId) FROM time_Stamp WHERE employeeId='$id' and checkIn=0";
				$result=mysqli_query($connection,$query);
				$row=mysqli_fetch_array($result);
				if($row[0]>0)
				{
					if(isset($_POST['checkOut']))
					{
						$message="Previously employee checked in without scanning.";
					}
					else if(isset($_POST['checkIn']))
					{
						date_default_timezone_set('Asia/Kolkata');
						$date = date('Y-m-d h:i:s', time());
						$query="UPDATE time_Stamp SET checkIn='$date' WHERE No=(SELECT No FROM time_Stamp WHERE employeeId='$id' and checkIn=0)";
						mysqli_query($connection,$query);
						$message="Checked-in succussfully";
					}
				}
				else if(isset($_POST['checkIn']))
				{
					$message="Previously employee checked out without scanning";
				}
				else
				{
					$connction = new mysqli('localhost','root','','securiry');
					$user=$_SESSION['id'];
					$query="INSERT INTO time_Stamp (employeeId,verifiedBy) VALUES ('$id','$user')";
					if(!$connection->query($query))
					{
						$message="Something problem with the request";
					}
					else $message="Checked-out succussfully";
				}
			}
			else
			{
				$message="The employee isn't registered!";
			}
		}
	}
?>
<!DOCTYPE html>
	<head>
		<title>Home</title>
		<style>
			*
			{
				margin:0;
				box-sizing:border-box;
			}
			body
			{
				background-color:#52ACFF;
				overflow: auto;
			}
			.main
			{
				font-size:20px;
				position:fixed;
				width:100%;
				text-align:center;
				color:white;
				background-color:#353535;
				padding:20px;
				z-index:2;
			}
			.main2
			{
				font-size:18px;
				border-bottom:5px solid white;
				padding:10px;
				width:320px;
				position: relative;
				padding-top:100px;
			}
			.form1
			{
				margin:0 auto;
				background-color: rgba(0,0,0,0.7);
				width:340px;
				height:235px;
				padding:47px;
				border-radius:0 20px 0 20px;
			}
			input
			{
				padding:5px;
			}
			input[type="text"]
			{
				text-align:center;
				border:0;
				padding:10px;
				border-radius:5px;
			}
			input[type="submit"]
			{
				margin:17px;
			}
			#note
			{
				color:red;
			}
			.logout
			{
				position: fixed;
				top:90px;
				left:40px;
				width:50px;
				height:50px;
			}
			.text
			{
				position: fixed;
				top:130px;
				left:16px;
				background-color: rgb(255, 55, 55);
				padding:5px;
				box-shadow: 0 0 10px 10px rgb(255,255,255,0.2);
				border-radius:10px;
				color: black;
				border:0;
				font-size:17px;
			}
		</style>
	</head>
	<body>
		<p class="main">Security RGUKT RK Valley</p>
		<img class="logout" src="logout.png"/><form method="post"><input type="submit" class="text" value="Logout" name="logout"/></form>
		<div align="center">
			<p class="main2" align="center">Employee Check-in Check-out</p><br><br>
			<form method="post" class="form1">
				<table>
					<tr><td colspan="2"><input type="text" name="empId" placeholder="Enter employee ID"/></td></tr>
					<tr>
						<td><br><input type="submit" name="checkOut" value="  Check-out   "/></td>
						<td><br><input type="submit" name="checkIn" value="Check-in"/></td>
					</tr>
				</table>
				<p id="note"></p>
			</form>
		</div>
		<?php
			if($message!='')
			{
				echo "<script>document.getElementById('note').innerHTML=\"".$message."\"</script>";
			}
		?>
	</body>
</html>