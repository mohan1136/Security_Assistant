<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<title>Admin</title>
	<style type="text/css">
		*
		{
			margin:0;
			box-sizing: border-box;
		}
		body
		{		}
		.menu
		{
			margin:11px;
		}
		#menu-icon1
		{
			width:27px;
			height:27px;
		}
		#menu-icon2
		{
			width:27px;
			height:27px;
			visibility: hidden;
		}
		.menu
		{
			position: fixed;
		}
		.side-menu
		{
			position: fixed;
			top:0;
			background-color: skyblue;
			visibility: hidden;
			width:200px;
			height:100%;
			z-index:-1;
			box-shadow:0 0 10px 10px rgba(0,0,0,0.2);
			padding-top:100px;
		}
		.menu-icon
		{
			margin:20px;
			width:50px;
			height:50px;
			border-radius:50%;
			background-color: white;
			box-shadow:0 0 10px 10px rgba(0,0,0,0.2);
		}
		.button
		{
			padding:10px;
			background-color: rgba(255,255,255,0.5);
			border-radius:20px;
			width:140px;
			margin:30px;
			line-height: 20px;
		}
		a
		{
			text-decoration: none;	
			color: black;
		}
		.button:hover
		{
			background-color: rgb(236, 119, 119);
			color:white;
		}
		.frame
		{
			border:0;
			width:100%;
			height: 90%;
			position: fixed;
			top:74px;
			z-index: -2;
		}
		.main
		{
			position: fixed;
			top: 0;
			font-size:20px;
			position:fixed;
			width:100%;
			text-align:center;
			color:white;
			background-color:#353535;
			padding:25px;
			z-index:-2;
		}
	</style>
</head>
<body>
		<div class="menu-icon">
			<img src="menu-before.jpg" id="menu-icon1" class="menu"/>
			<img src="menu-after.png" id="menu-icon2" class="menu"/>
		</div>
	<div class="side-menu" id="side-menu" align="center">
		<a href="addSec.php" target="a"><p class="button">Add security</p></a></p>
		<a href="addEmp.php" target="a"><p class="button">Add employee</p></a></p>
		<a href="getHistory.php" target="a"><p class="button">Get history</p></a></p>
	</div>
	<p class="main">Admin RGUKT RK Valley</p>
	<iframe src="adminH.php" class="frame" name="a"></iframe>
	<script type="text/javascript">
		document.getElementById("menu-icon1").addEventListener("click",function(){
			document.getElementById("menu-icon1").style.visibility="hidden";
			document.getElementById("menu-icon2").style.visibility="visible";
			document.getElementById("side-menu").style.visibility="visible";
		});
		document.getElementById("menu-icon2").addEventListener("click",function(){
			document.getElementById("menu-icon2").style.visibility="hidden";
			document.getElementById("menu-icon1").style.visibility="visible";
			document.getElementById("side-menu").style.visibility="hidden";
		});
	</script>
	</div>
</body>