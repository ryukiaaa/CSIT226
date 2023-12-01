<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<pre>
	<form method="post">
		<input type="text" name="txtUsername" placeholder="Username">
		<input type="password" name="txtPassword" placeholder="Password">
		<input type="submit" name="btnSubmit" value="Login">
	</form>
	
	</pre>
</body>
</html>
<?php
	$connect = mysqli_connect("localhost","root","","trainingcenter2") or die("Unable to connect");
	if(isset($_POST['btnSubmit'])){
		$uname = $_POST['txtUsername'];
		$pwd = $_POST['txtPassword'];
		$sql = "select * from tra where username='$uname'";

		$res = mysqli_query($connect,$sql);
		if(mysqli_num_rows($res)==0)
			echo "<script language='javascript'>
				alert('Username is not existing.');

				</script>";
		else{
			$row=mysqli_fetch_array($res);
			if($row['password']==$pwd)
				echo "<script language='javascript'>
				alert('Correct username and password.');

				</script>";
			else
				echo "<script language='javascript'>
				alert('Incorrect password.');

				</script>";
		}


	}

	
?>