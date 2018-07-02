<?php
	
	

	if(isset($_POST['register'])){
		echo "REGISTER";
		echo "</br>";

		$servername = "localhost";
		$username= "root";
		$password="";
		
		$conn = mysqli_connect($servername,$username,$password);
		
		if(!$conn){
			die("Connection failed: ". mysqli_connect_error());
		}else{
			
			//echo "Connected Successfully";
			mysqli_select_db($conn,"felicia_tamayo_projectdb");
			
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$fname=mysqli_real_escape_string($conn,$_POST['fname']);
			$lname=mysqli_real_escape_string($conn,$_POST['lname']);
			$mname=mysqli_real_escape_string($conn,$_POST['mname']);
			@$gender =mysqli_real_escape_string($conn,$_POST['gender']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
			$rpassword=mysqli_real_escape_string($conn,$_POST['rpassword']);
			

			if(isset($username)&&isset($email)&&isset($fname)&&isset($lname)&&isset($mname)&&isset($gender)&&isset($password)){
				if($password == $rpassword){
				$sql2 = "SELECT * FROM projecttable WHERE username='$username' OR email='$email'";
				$result2 = mysqli_query($conn,$sql2);
				$result3 = mysqli_num_rows($result2);

				
					if($result3==0){
					$newpass = md5($password);
					$sql ="INSERT INTO projecttable (username,email,fname,mname,lname,gender,password,status) 
					VALUES('$username','$email','$fname','$mname','$lname','$gender','$newpass',0)";
				
					$result = mysqli_query($conn,$sql);
					if(@$result){
						echo "Registered Successfully!";
					}else
						echo "error in registration";
					
					}

				else{
					//header('location:login.php');
				echo "Username or Email already Exists!";
				
				}

				

				}else if($rpassword==null){{
					echo "Password Verification Needed!";
				}
				}else{
					echo "Password does not match!";
					//header('location:login.php');
				}
			}
			else{

				echo "Empty Fields not Allowed";

			}

		}
	}

	if(isset($_POST['redirect'])){
		header('location:index.php');
	}


?>
<form method="post">

	<input type="submit" name="redirect" value="Back">

</form>


