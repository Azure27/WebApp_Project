<!DOCTYPE html>
<html>
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
			
			$target_dir = 'imageUploads/';
			$file = basename(@$_FILES['myfile']['name']);
			$target_file = $target_dir . $file;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST['submit'])) {

			    if (move_uploaded_file(@$_FILES['myfile']['tmp_name'], $target_file)) {
			        $sql = "INSERT INTO images (img_filename) VALUES ('$file')";
			        if(mysqli_query($con,$sql)){
			        	echo "File Uploaded";
			        }
			        else {
			        echo "Sorry, there was an error uploading your file.";
			    	}
				}
			}
		}
}
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="myfile" >
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>