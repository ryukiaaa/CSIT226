<?php 
	session_start();

	$_SESSION['kya2'] = 'session value';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MJ Studio</title>
	<style>
		* {
/*	 	 filter: blur(2px);*/
			}
		body {

			background-color: #1F1717;
			background-image: url('music.png');
			background-size: 150px;
			backdrop-filter: 
			color: #FCF5ED;
			display: flex;
			text-align: center;
			align-content: center;
		}
		.container{

	 	    left: 25%;
	  	    transform: translate(-50%,-50%);
	 	    background-color: rgba(206, 90, 103,0.8);
	 	    -webkit-backdrop-filter: blur(10px);
	 	    backdrop-filter: blur(5px);
			width: 15%;
			margin: 27.5%;
			margin-left: 50%;
			padding: 5%;
			padding-top: 2%;
			border: 5px;
			border-radius: 10px;
		}
	 	.login {
/*	 		position: absolute;*/
  			-webkit-transform: perspective(600px) rotateY(0deg);
  			transform: perspective(600px) rotateY(0deg);
/*			background-color: rgba(206, 90, 103,0.8);*/
			filter: none;
/*			width: 35%;*/
/*			margin: 27.5%;
			padding: 5%;
			border: 5px;*/
			-webkit-backface-visibility: hidden;
  		 	backface-visibility: hidden;
 		 	transition: -webkit-transform 0.5s linear 0s;
 		 	transition: transform 0.5s linear 0s;
		}
		.registration {
/*	 		position: absolute;*/
  			-webkit-transform: perspective(600px) rotateY(0deg);
  			transform: perspective(600px) rotateY(0deg);
/*			background-color: rgba(206, 90, 103,0.8);*/
			filter: none;
/*			width: 35%;*/
/*			margin: 27.5%;
			padding: 5%;
			border: 5px;*/
			
			-webkit-backface-visibility: hidden;
  		 	backface-visibility: hidden;
 		 	transition: -webkit-transform 0.5s linear 0s;
 		 	transition: transform 0.5s linear 0s;
		}


		form {
			animation: fadeIn ease 1s;
		}

		#check:checked ~ .registration{
 		display: block;
 		-webkit-transform: perspective(600px) rotateY(0deg);
  		transform: perspective(600px) rotateY(0deg);
		}
		.registration{
 		 display: none;
		}
		#check:checked ~ .login{
  		 -webkit-transform: perspective(600px) rotateY(-180deg);
  		 transform: perspective(600px) rotateY(-180deg);
  		 display: none;
		}
		#check{
  		display: none;
		}
		.form input.button{
 		 color: none;
 		 background-color: rgba(0, 0, 0,0.8)
 		 font-size: 1.2rem;
  		font-weight: 500;
 		 letter-spacing: 1px;
  		margin-top: 1.7rem;
  		cursor: pointer;
  		transition: 0.4s;
		}
		#Register:hover{
			text-decoration: underline;
			cursor: pointer;
		}
@keyframes fadeIn {
  0% {
    opacity:0;
  }
30% {
   opacity:0;
}
50% {
   opacity:20%;
}
  100% {
    opacity:1;
  }
}

	</style>
</head>
<body>
<div class="container">
	<img src="logo.png" width=45%>
<input type="checkbox" id="check">
<div class="login">
<h2>LOGIN</h2>
 <pre>
 <form method="post">
 <input type="text" name="txtUsername" placeholder="Username">

 <input type="password" name="txtPassword" placeholder="Password">

  <input type="submit" id="btnSubmit" name="btnSubmit" value="Login">
     </form>
</pre>
<div class="signup">
     <span class="signup">Don't have an account?
         <label for="check" id="Register">Register now!</label>
     </span>
 </div>
</div>
<div class="registration">
      <h2>SIGN UP</h2>
      <pre>
<form method="post">
<input type="text" name="txtUser" placeholder="Enter your email">

<input type="password" name="txtPass" placeholder="Create a password">

<input type="password" name="txtConfirm"placeholder="Confirm your password">

<input type="submit" id="btnRegister" name="btnRegister" value="Register">
</form>
  </pre>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check" id="Register">Login</label>
        </span>
      </div>
    </div>
</div>

</body>
</html>
<?php
	$connect = mysqli_connect("localhost","root","","mj") or die("Unable to connect");
	if(isset($_POST['btnSubmit'])){
		$uname = $_POST['txtUsername'];
		$pwd = $_POST['txtPassword'];
		$sql = "select * from customer where Username='$uname'";
		

		$res = mysqli_query($connect,$sql);
		if(mysqli_num_rows($res)==0){
			$sql = "select * from staff where StaffID='$uname'";
			$res = mysqli_query($connect,$sql);
			if(mysqli_num_rows($res)==0){

			echo "<script language='javascript'>
				alert('Username is not existing.');

				</script>";
			} else {
				$row=mysqli_fetch_array($res);
				if($row['Password']==$pwd){
					alert('Correct username and password. You are now log in. Have a grate shift!');
					header('Location: main.php');
				}else{
					echo "<script language='javascript'>
					alert('Incorrect password.');

					</script>";
				}
			}
		} else {
			$sql = "select * from customer where Username='$uname'";
			$row=mysqli_fetch_array($res);
			if($row['Password']==$pwd)
				echo "<script language='javascript'>
				alert('Correct username and password. Welcome!!!');

				</script>";
			else
				echo "<script language='javascript'>
				alert('Incorrect password.');

				</script>";
		}


	}	

	if(isset($_POST['btnRegister'])){
		$uname = $_POST['txtUser'];
		$pwd = $_POST['txtPass'];
		$com = $_POST['txtConfirm'];
		$sql = "select * from customer where Username='$uname'";
		

		$res = mysqli_query($connect,$sql);
		if(mysqli_num_rows($res)==0){
			if($pwd==$com){
			$sql="insert into customer values('$uname','$pwd',NULL,NULL,NULL,NULL)";
			mysqli_query($connect,$sql);
			echo "<script language='javascript'>
					alert('New User saved!');

					</script>";
			} else 
				echo "<script language='javascript'>
				alert('Password does not match.');

				</script>";
			
	} else {
		alert("Username already exist. Try another Username.");
	}
	
}


function alert($message) { 
echo "<script language='javascript'>
		  alert('".$message."');

				</script>";
}
?>

