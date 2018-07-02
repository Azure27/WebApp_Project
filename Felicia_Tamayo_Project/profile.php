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
<body align='center'>

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

			$sql = "SELECT * FROM projecttable WHERE user_id='$UID'";
			$result=mysqli_query($con,$sql);

			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			/*
			echo "<div>";

			echo "Username:"."$row[username]</br>";
			echo "Last Name:"."$row[lname]</br>";
			echo "First Name:"."$row[fname]</br>";
			echo "Middle Name:"."$row[mname]</br>";
			echo "Gender:"."$row[gender]</br>";
			echo "E-Mail:"."$row[email]</br>";

			echo "</div>";
			
			echo "<a href = 'edit.php?i=".$row['user_id']."'>EDIT</a>";
			*/



		}
	if(isset($_POST['update'])){
			
			//$UID = $_SESSION['start'];
			$uname = mysqli_real_escape_string($con, $_POST['uname']);
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$lname = mysqli_real_escape_string($con, $_POST['lname']);
			$fname = mysqli_real_escape_string($con, $_POST['fname']);
			$mname = mysqli_real_escape_string($con, $_POST['mname']);
			$password = mysqli_real_escape_string($con, md5($_POST['password']));
			$gender = mysqli_real_escape_string($con, $_POST['gender']);
			
			

			

			$sql2 = "SELECT * FROM projecttable WHERE username='$uname' OR email='$email'";
			$result2=mysqli_query($con,$sql2);
			$result3 = mysqli_num_rows($result2);

			if($result){
				
				if($result3==0){
				$sql = "UPDATE projecttable SET username='$uname',email='$email',fname='$fname',lname='$lname',mname='$mname',password = '$password' WHERE user_id=$UID";
				$result = mysqli_query($con,$sql);
				echo "Updated!";
				header('location:profile.php');
				}
				else{

					echo "Username or Email Exists!";

				}
			}else{
				echo "Error!";
			}

		}
	if(isset($_POST['logout'])){


				session_destroy();
				header('location:index.php');

			}

		

}else{
	echo "Please Login First!";
}


?>
<br><br>
				<img class='profile' width='20%' src='images/placeholder1.png' alt='click to change picture'>
<br><br>
	<table id='uploaded' align='center' border='0' width='30%' cellpadding='10px'>
		<tr>
			<td align='left'>
						<b>Username:</b>
			</td>
			<td align='left'>
						<b><font color='#CBB5E0'><?php echo "$row[username]";?></font></b>
			</td>
		</tr>
		<tr>
			<td align='left'>
						<b>Email:</b>
			</td>
			<td align='left'>
						<b><font color='#CBB5E0'><?php echo "$row[email]";?></font></b>
			</td>
		</tr>
		<tr>
			<td align='left'>
						<b>Gender:</b>
			</td>
			<td align='left'>
						<b><font color='#CBB5E0'><?php echo "$row[gender]";?></font></b>
			</td>
		</tr>
			
		<tr>
			<td align='center' colspan='2'>
						<button class='butt3' width='30%' onclick='' id="edit">Edit Profile</button>
			</td>
		</tr>	
	</table>
	
	
<div id="editmodal" class="modal">


  <!-- Modal content -->
  <div class="modal-content1">
  	<form method='post'>
    <table align="center" border='1' width='100%'>
	<tr>
		<td align='center'>
			<span align='right' class="edit_close">&times;</span>
			<b><font face='Calibri'>Edit Your Profile</font></b>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="text" name="uname" placeholder=<?php echo "$row[username]";?>>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="email" name="email" placeholder=<?php echo "$row[email]";?>>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="text" name="fname" placeholder=<?php echo "$row[fname]";?>>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="text" name="mname" placeholder=<?php echo "$row[mname]";?>>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="text" name="lname" placeholder=<?php echo "$row[lname]";?>>
		</td>
	</tr>
	<tr>	
		<td align='center'>
			<input type="password" name="password" placeholder="Password">
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="password" name="repassword" placeholder="Retype Password">
		</td>
	</tr>	
	<tr>	
		<td align='left'>
			<font color='#FFFFF' face='Calibri' size='5px' class='lavels'>Gender:</font>
		</td>
	</tr>
	<tr>
		<td align='left'>
			<label class ='rad'><input align='center' type='radio' name="gender" value="male">  Male</label>
		</td>
	</tr>	
	<tr>
		<td align='left'>
			<label class ='rad'><input align='center' type='radio' name="gender" value="female">  Female</label>
		</td>
	</tr>	
	
	<tr>
		<td align='center'>
			<button class='butt3' width='50%' onclick='' id="edit" name='update'>Save</button>
		</td>
	</tr>	
</table>
</form>
</div>
</div>
<script>
// Get the modal
var editmod = document.getElementById('editmodal');

// Get the button
var edit = document.getElementById("edit");

// the span for the x
var edit_close = document.getElementsByClassName("edit_close")[0];


// open modal on click
edit.onclick = function() {
    editmod.style.display = "block";
}

// close with x
edit_close.onclick = function() {
    editmod.style.display = "none";
}


// close any
window.onclick = function(area) {
    if (area.target == editmod) {
        editmod.style.display = "none";
    }
}
</script>
</body>
</html>