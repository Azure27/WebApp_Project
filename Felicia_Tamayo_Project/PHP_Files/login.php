<?php
	
	

	if(isset($_POST['register'])){
		

		$servername = "localhost";
		$username= "root";
		$password="";
		
		$conn = mysqli_connect($servername,$username,$password);
		
		if(!$conn){
			die("Connection failed: ". mysqli_connect_error());
		}else{
			
			//echo "Connected Successfully";
			mysqli_select_db($conn,"felicia_tamayo_projectdb");
			
			$username = $_POST['username'];

			$email = $_POST['email'];
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$mname=$_POST['mname'];
			@$gender =$_POST['gender'];
			$password=$_POST['password'];
			$rpassword=$_POST['rpassword'];
			

			if(isset($username)&&isset($email)&&isset($fname)&&isset($lname)&&isset($mname)&&isset($gender)&&isset($password)){
				if($password == $rpassword){
				$sql2 = "SELECT * FROM projecttable WHERE username='$username' OR email='$email'";
				$result2 = mysqli_query($conn,$sql2);
				$result3 = mysqli_num_rows($result2);

				
					if($result3==0){
					$newpass = md5($password);
					$sql ="INSERT INTO projecttable (username,email,fname,lname,mname,gender,password,status) 
					VALUES('$username','$email','$fname','$lname','$mname','$gender','$newpass',0)";
				
					$result = mysqli_query($conn,$sql);
					if(@$result){
						echo "Registration Successful";
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

	

?>


