<!DOCTYPE html>
	<head>
		<title>Home</title>
		<style>
			*
			{
				margin:0;
				box-sizing:border-box;
				z-index:-3;
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
				padding:25px;
			}
			.main2
			{
				font-size:18px;
				border-bottom:5px solid white;
				padding:10px;
				width:320px;
				position: relative;
				padding-top:30px;
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

				width:50px;
				height:50px;
			}
		</style>
	</head>
	<body>
		<div align="center">
			<p class="main2" align="center">Profile</p><br><br>
			<form method="post" class="form1">
				<table>
					<tr><td colspan="2"><input type="text" name="empId" placeholder="Enter employee ID"/></td></tr>
					<tr>
						<td><br><input type="submit" name="checkIn" value="  Check-in   "/></td>
						<td><br><input type="submit" name="checkOut" value="Check-out"/></td>
					</tr>
				</table>
				<p id="note"></p>
			</form>
		</div>
	</body>
</html>