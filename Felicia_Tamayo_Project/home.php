<html>
<title>DerpFace || Home</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='buttons.css'>
<link rel='stylesheet' href='modals.css'>
<link rel='stylesheet' href='navbar.css'>
<link rel='stylesheet' href='home.css'>
<link rel="icon" href="images/derp.png">

<style>
body {
	background-color: rgba(255,255,255,0.1);
	background-size: cover;
	background-repeat: no-repeat;
	align:center;
}
</style>
</head>
<body>
	<?php
	session_start();
	if(isset($_SESSION['start'])){

	$UID = $_SESSION['start'];
	$servername = "localhost";
		$username= "root";
		$password="";

		$con=mysqli_connect($servername,$username,$password);

		// Check connection
		if (mysqli_connect_error())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		else{
			mysqli_select_db($con,"felicia_tamayo_projectdb");
			
			$sql ="SELECT * FROM images";
			$sql2 = "SELECT * FROM projecttable";
			$result = mysqli_query($con,$sql);
			
			echo "<br><br>";
			echo "<table border='0' id='images' width='50%' height='50%' align='center'>";
			while($row = mysqli_fetch_array($result)){
				echo"<tr>";
				echo "<td  align='center' colspan='2'>";
					echo "<img src='imageUploads/$row[img_filename]' width='20%'><br>";
					
					
				echo "</td>";		
			echo"</tr>";
			}
		}
}
	?>
<!--For every entry, everything within the comment is one entry-->

</body>
</html>