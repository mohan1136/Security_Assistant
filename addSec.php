<?php
	error_reporting(0);
	$name=$_POST['name'];
	$id=$_POST['empId'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$message="";
	if(!isset($_POST['submit']));
	else if(empty($name))
	{
		$message="Please enter name";
	}
	else if(empty($id))
	{
		$message="Please enter ID";
	}
	else if(empty($phone))
	{
		$message="Please enter phone number";
	}
	else
	{
		if(!empty($email) && !(($email[0]>='a' && $email[0]<='z') || ($email[0]>='A' && $email[0]<='Z')) || (strlen($email)<6) || (strpos($email,"@")!=strrpos($email,"@")) || (strrpos($email,".")<strlen($email)-4) )
		{
			$message="Enter valid email";
		}
		else if($phone!=(int)$phone || strlen($phone)!=10)
		{
			$message="Phone number is not valid";
		}
		else
		{	
			$connection=new mysqli('localhost','root','','securiry');
			$query="SELECT name FROM security_officers WHERE id='$id'";
			$result=$connection->query($query);
			if($row=mysqli_fetch_array($result))
			{
				$message="Security ID already exists";
			}
			else
			{
				$password=md5($id);
				$query="INSERT INTO security_officers(name,id,contact,email,password) VALUES ('$name','$id','$phone','$email','$password')";
				$result=$connection->query($query);
				if(!$result)
				{
					$message="There is something problem with the query";
				}
				else $message="Values inserted in database succussfully";
			}
		}
	}
?>
<!DOCTYPE html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<div align="center">
			<p class="main2" align="center">Add security</p><br><br>
			<form method="post" class="form1">
				<table>
					<tr><td><input type="text" name="name" placeholder="Name" required="true"/></td></tr>
					<tr><td><input type="text" name="empId" placeholder="Security ID" required="true"/></td></tr>
					<tr><td><input type="text" name="email" placeholder="Email"/></td></tr>
					<tr><td><input type="text" name="phone" placeholder="Phone no." required="true"/></td></tr>
					<tr><td><input type="submit" name="submit" value="Submit"/></td></tr>
			</table>
				<p id="note"></p>
			</form>
				<?php
				if($message!='')
				{
					echo "<script>document.getElementById('note').innerHTML='".$message."'</script>";
				}
				?>
		</div>
	</body>
</html>