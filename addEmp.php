<?php
	error_reporting(0);
	$name=$_POST['name'];
	$id=$_POST['empId'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$dept=$_POST['dept'];
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
	else if(empty($email))
	{
		$message="Please enter email";
	}
	else if(empty($dept))
	{
		$message="Please enter department";
	}
	else
	{
		if(!(($email[0]>='a' && $email[0]<='z') || ($email[0]>='A' && $email[0]<='Z')) || (strlen($email)<6) || (strpos($email,"@")!=strrpos($email,"@")) || (strrpos($email,".")<strlen($email)-4) )
		{
			$message="Enter valid email";
		}
		else if($phone!=(int)$phone || strlen($phone)!=10)
		{
			$message="Phone number is not valid";
		}
		else if($dept<1 && $dept>13)
		{
			$message="Select valid branch";
		}
		else
		{
			$branches=['Chem','Civil','CSE','ECE','Mech','MME','IT','Telugu','Mathematics','Physics','Chemistry','Biology','Others'];
			$dept=$branches[$dept-1];
			$connection=new mysqli('localhost','root','','securiry');
			$query="SELECT name FROM employee WHERE id='$id'";
			$result=$connection->query($query);
			if($row=mysqli_fetch_array($result))
			{
				$message="Employee ID already exists";
			}
			else
			{
				$password=md5($id);
				$query="INSERT INTO employee(name,id,email,phone,dept,password) VALUES ('$name','$id','$email','$phone','$dept','$password')";
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
			<p class="main2" align="center">Add employee</p><br><br>
			<form method="post" class="form1">
				<table>
					<tr><td><input type="text" name="name" placeholder="Name"/></td></tr>
					<tr><td><input type="text" name="empId" placeholder="Employee ID"/></td></tr>
					<tr><td><input type="text" name="email" placeholder="Email"/></td></tr>
					<tr><td><input type="text" name="phone" placeholder="Phone no."/></td></tr>
					<tr><td>
						<select name="dept">	
							<option value="0">Select Department</option>
							<option value="1">Chem</option>
							<option value="2">Civil</option>
							<option value="3">CSE</option>
							<option value="4">ECE</option>
							<option value="5">Mech</option>
							<option value="6">MME</option>
							<option value="7">IT</option>
							<option value="8">Telugu</option>
							<option value="9">Mathmatics</option>
							<option value="10">Physics</option>
							<option value="11">Chemistry</option>
							<option value="12">Biology</option>
							<option value="13">Others</option>
						</select>
					</td></tr>
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