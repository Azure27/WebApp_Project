<?php 

	if(isset($_POST['login'])){
		

		$servername = "localhost";
		$username= "root";
		$password="";
		
		
		$conn = mysqli_connect($servername,$username,$password);
		
		if(!$conn){
			die("Connection failed: ". mysqli_connect_error());
		}else{

			mysqli_select_db($conn,"felicia_tamayo_projectdb");

			
			$user = mysqli_real_escape_string($conn,$_POST['username']);
			
			$pass2= mysqli_real_escape_string($conn,md5($_POST['password']));


			if(isset($user)&&isset($pass2)){

				$sql = "SELECT * FROM projecttable WHERE username='$user'";
				$result =  mysqli_query($conn,$sql);
				$result2= mysqli_num_rows($result);

				if($result2==0){

					echo "User does not exist!";

				}else{

					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

					if($row[password]==$pass2){
						
						session_start();
						$UID = $row[user_id];
						$_SESSION['start']=$UID;
						header('location:main_dash.php');


				

					}else{

						echo "Incorrect Password!";
					}

					mysqli_close($con);
			}

		}
	}
}


 ?>