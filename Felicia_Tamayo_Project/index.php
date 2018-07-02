<!DOCTYPE html>
<html>
<title>DerpFace || Login</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='buttons.css'>
<link rel='stylesheet' href='modals.css'>
<link rel="icon" href="images/derp.png">

<style>
	h2 {
		color: #FFFFFF;
	}
	
	body {
		background: url(images/sky2.png);
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>


</head>

<body>

<?php
require 'signin.php';

?>
<div align='center'>
<br><br><br>
<p id='corners'>
<br><br>
		<img src='images/title00.png'  width='100%' height='20%'>
<br><br>
		<b><font face='Calibri' color='7A7A7A' size='4'>Sign In or Sign Up to see photos.</font></b>
<br><br>
		<button class='butt' id="SignIn">Sign In</button>

<br><br>
		<img src='images/or.png'  width='100%' height='5%'>
<br><br>
		<button class='butt' id="SignUp">Sign Up</button>
</p>
</div>

<!-- SIGN IN -->
<!-- The Modal -->
<div id="signinmodal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  	<form action="signin.php" method="post">
    <table align="center" width='100%'>
	<tr>
		
		<td align='center'>
			<span align='right' class="signin_close">&times;</span>	
			<h2><font face='Calibri'>Sign In</font></h2>

		</td>
	</tr>
	<!--FORM RIGHT OVER HERE-->

	<tr>
		<td align='center'>
			<input type="text" name="username" placeholder="Username">
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="password" name="password" placeholder="Password">
		</td>
	</tr>
	<tr>
		<td align='center'>
					<button class='butt2' width='30%' id="SignIn" name="login">Sign In</button>
		</td>
	</tr>
	</table>
  </div>
</form>
</div>


<!-- SIGN UP -->
<!-- The Modal -->
<div id="signupmodal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  	<form action="register.php" method="post">
    <table align="center" width='100%'>
	<tr>
		
		<td align='center'>
			<span align='right' class="signup_close">&times;</span>	
			<h2><font face='Calibri'>Sign Up</font></h2>

		</td>
	</tr>
	<!--FORM RIGHT OVER HERE-->

	<tr>
		<td align='center'>
			<input type="text" name="username" placeholder="Username">
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="text" name="fname" placeholder="First Name">
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="text" name="mname" placeholder="Middle Name">
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="text" name="lname" placeholder="Last Name">
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="email" name="email" placeholder="Email">
		</td>
	</tr>
	<tr>	
		<td align='center'>
			<input type="password" name="password" placeholder="Password">
		</td>
	</tr>
	<tr>
		<td align='center'>
			<input type="password" name="rpassword" placeholder="Retype Password">
		</td>
	</tr>	
	<tr>	
		<td align='left'>
			<font color='#FFFFF' face='Calibri' size='5px' class='lavels'>Gender:</font>
		</td>
	</tr>
	<tr>
		<td align='left'>
			<label class ='rad'><input align='center' type='radio' name="gender" value="Male">  Male</label>
		</td>
	</tr>	
	<tr>
		<td align='left'>
			<label class ='rad'><input align='center' type='radio' name="gender" value="Female">  Female</label>
		</td>
	</tr>	
	<tr>
		<td align='center'>
					<button class='butt2' width='30%' id="SignUp" name="register">Sign Up</button>
		</td>
	</tr>	
	</table>
  </div>
</form>

</div>


<br>
<div class='feet'>
	<font face='Calibri'>This is only a <b>project</b>. Don't take seriously.<br>
		&copy; Felicia • Tamayo</font>
</div>

<script>

// Get the modal
var signinmod = document.getElementById('signinmodal');
var signupmod = document.getElementById('signupmodal');

// Get the button
var Signin = document.getElementById("SignIn");
var Signup = document.getElementById("SignUp");

// the span for the x
var signup_close = document.getElementsByClassName("signup_close")[0];

var signin_close = document.getElementsByClassName("signin_close")[0];

// open modal on click
Signin.onclick = function() {
    signinmod.style.display = "block";
}
Signup.onclick = function() {
    signupmod.style.display = "block";
}

// close with x
signup_close.onclick = function() {
    signupmod.style.display = "none";
}

signin_close.onclick = function() {
    signinmod.style.display = "none";
}

// close any
window.onclick = function(area) {
    if (area.target == signinmod) {
        signinmod.style.display = "none";
    }
	if (area.target == signupmod) {
        signupmod.style.display = "none";
    }
}
</script>
</body>
</html>