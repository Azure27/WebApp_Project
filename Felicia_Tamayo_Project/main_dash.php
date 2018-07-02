<html>
<title>DerpFace || Dashboard</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='buttons.css'>
<link rel='stylesheet' href='modals.css'>
<link rel='stylesheet' href='navbar.css'>
<link rel='stylesheet' href='home.css'>
<link rel="icon" href="images/derp.png">

<style>
.profile {
	border-radius: 100px;
}
body {
	background: url(images/evesky.png);
	background-size: cover;
	background-repeat: no-repeat;
}
</style>
</head>
<body>

<?php
session_start();

if(isset($_SESSION['start'])){

	if(isset($_POST['logout'])){


			session_destroy();
			header('location:login.php');


		}
	}else{
		header('location:login.php');
	}
 ?>

<div class="nav">
<form method='post'>
<table border='0' height='5%' align='center'>
	<tr>
		<td width='10%'><p> </p></td>
		<td width='5%'><a href=''><img src='images/derp.png' height='5%'></a></td>
		<td width='20%'><p> </p></td>
		<td width='20%'><p> </p></td>
		<td width='10%'><p> </p></td>
		<td><a href='home.php' target='frame'><font face='Roboto'>Home</font></a></td>
		<!--THIS ONE IS FOR GOING TO THE PROFILE-->
		<td><a href='profile.php' target='frame'><font face='Roboto'>Profile</font></a></td>
		<td><a href='upload.php' target='frame'><font face='Roboto'>Upload Image</font></a></td>
		<td><input type='submit' name='logout' value='Log Out'></td>
	</tr>
</table>
</form>
</div>
<table width='80%' height='90%'border='1' align='center'>
	<tr>
		<td>
		<iframe src="home.php" border="0" name="frame" height="100%" width="100%"></iframe>
		</td>
	</tr>
	</table>



<div class='feet'>
	<font face='Calibri'>This is only a <b>project</b>. Don't take seriously.<br>
		&copy; Felicia • Tamayo</font>
</div>
<script>

</script>
</body>
</html>