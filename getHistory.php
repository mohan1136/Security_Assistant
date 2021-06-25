<!DOCTYPE html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<style type="text/css">
			body
			{
				margin-top:40px;
			}
			#nav0,#nav1
			{
				display: inline;
				font-size:18px;
				padding:13px;
				position: relative;
				background-color: rgba(255,255,255,0.2);
				border:0;
				border-radius:10px;
				margin:20px;
				font-size:15px;
				z-index:1;
				cursor: pointer;
			}
			#nav1
			{
				background-color: orange;
			}
			#item0
			{
				visibility: hidden;
			}
			#item0,#item2
			{
				margin: 0 auto;
				position: fixed;
				width:100%;
				top:130px;
				text-align: center;
			}
			input[type="submit"]
			{
				margin-left:70px;
			}
			.outList
			{
				margin:0 auto;
				width:100%;
			}
			.border
			{
				border:1px solid rgba(255,255,255,0.4);
				padding:10px 30px;
				border-collapse: collapse;
			}
			.history
			{
				margin:30px 0;
			}
			.tableH
			{
				font-size:25px;
			}
		</style>
		<script type="text/javascript">
			function show(target)
			{
				i=(target+1)%2;
                document.getElementById('nav'+i).style.backgroundColor="rgba(255,255,255,0.2)";
                document.getElementById('item'+i).style.visibility="hidden";
				document.getElementById('nav'+target).style.backgroundColor="orange";
				document.getElementById('item'+target).style.visibility="visible";
			}
		</script>
	</head>
	<body>
		<div align="center">
			<br>
			<div id="nav1" align="center" onclick="show(1)">Get history</div>
			<div id="nav0" align="center" onclick="show(0)">Employees out of the campus</div>
			<br><br><br>
			<div id="item0">
				<?php
					$conn = new mysqli ('localhost','root','','securiry');
					$query = "SELECT employeeId,checkOut,verifiedBy FROM time_Stamp WHERE checkIn=0"; //You don't need a ; like you do in SQL
					$result = mysqli_query($conn,$query);
					$row = mysqli_fetch_array($result);
					if($row!=null)
					{
						$file = fopen("Employees_out_of_campus.csv","w");
						echo "<div align='center' class='outList'>
								<table class='border'><tr class='border'>
								<tr>
									<td class='border'>Employee ID</td>
									<td class='border'>Check Out</td>
									<td class='border'>Verified By</td>
								</tr>	";
						fputcsv($file,array('Employee Id','Check Out','verifiedBy'));
						do
					    {   //Creates a loop to loop through results
					  	   echo "<tr class='border'>
					  	   			<td class='border'>" .$row['employeeId']."</td>
					  	   			<td class='border'>".$row['checkOut']."</td>
					  	   			<td class='border'>".$row['verifiedBy'] . "</td>
					  	   		</tr>";  //$row['index'] the index here is a field name
					  	   	fputcsv($file,array($row['employeeId'],$row['checkOut'],$row['verifiedBy']));
					    }while($row = mysqli_fetch_array($result));
					    echo "  </table>
					    	</div>"; //Close the table in HTML
				    	fclose($file);
					}
				?>
			</div>
			<div id="item1">
				<form method="post" class="form1">
					<table>
						<tr><td><input type="text" name="empId" placeholder="Enter employee ID"/></td></tr>
						<tr><td><br><input type="submit" name="checkIn" value="Get history"/></td></tr>
					</table>
					<p id="note"></p>
				</form>
				<?php
					error_reporting(0);
					$id =$_POST['empId'];
					if($id)
					{
						$conn = new mysqli ('localhost','root','','securiry'); 
						$query = "SELECT checkOut,checkIn,verifiedBy FROM time_Stamp WHERE employeeId='$id'"; 
						$result = mysqli_query($conn,$query);
						$row = mysqli_fetch_array($result);
						if($row!=null)
						{
							$name="Employee_".$id."_details.csv";
							$file = fopen($name,"w");
							echo "<div align='center' class='history'>
									<br>
									<p class='tableH'>Log-in and out History of $id</p>
									<a href='$name' >Download as CSV</a>
									<br><br>
									<table class='border'>
									<tr class='border'>
						  	   			<td class='border'>checkOut</td>
						  	   			<td class='border'>  checkIn</td>
						  	   			<td class='border'>verifiedBy </td>
						  	   		</tr>";
							fputcsv($file,array('Employee name',$id));
							fputcsv($file,array('Check out','Check in','Verified By'));
						   	do
						    {   //Creates a loop to loop through results
						  	   echo "<tr class='border'>
						  	   			<td class='border'>".$row['checkOut']."</td>
						  	   			<td class='border'>" . $row['checkIn']."</td>
						  	   			<td class='border'>".$row['verifiedBy'] . "</td>
						  	   		</tr>";  //$row['index'] the index here is a field name;
						  	   	$row=array($row['checkOut'],$row['checkIn'],$row['verifiedBy']);
						  	   	fputcsv($file,$row);
						    }while($row = mysqli_fetch_array($result));
						    echo "</table></div>"; //Close the table in HTML
					    	fclose($file);
						}
					}
				?>
			</div>
		</div>
	</body>
</html>