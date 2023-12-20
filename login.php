<?php 
	session_start();
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
				background-color: #1f1717;
				background-image: url("music.png");
				background-size: 150px;
				backdrop-filter: blur(3px);
				color: #fcf5ed;
				display: flex;
				text-align: center;
				align-content: center;
				height: 100vh;
				margin: 0px;
				padding: 0px;
			}
			.container {
				background-color: transparent;
				width: 400px;
				height: 500px;
				perspective: 1000px;
				margin: auto;
				padding: 5%;
				padding-top: 2%;
				border: 5px;
				border-radius: 10px;
			}

			.container-inner {
				position: relative;
				width: 100%;
				height: 100%;
				text-align: center;
				transition: transform 0.8s;
				transform-style: preserve-3d;

				display: flex;
				justify-content: center;
				align-items: center;
			}

			#check {
				display: none;
			}

			#check:checked ~ .container-inner {
				transform: rotateY(180deg);
			}

			.login,
			.registration {
				position: absolute;
				width: 100%;
				height: 100%;
				-webkit-backface-visibility: hidden;
				backface-visibility: hidden;

				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
			}

			.login {
				background-color: rgba(206, 90, 103, 0.8);
				color: black;
				border-radius: 10px;
			}

			.registration {
				background-color: rgba(206, 90, 103, 0.8);
				color: #000;
				transform: rotateY(180deg);
				border-radius: 10px;
				padding: 16px;
			}

			form {
				display: flex;
				flex-direction: column;
				gap: 15px;
				margin-bottom: 10px;
				 align-items: center;
			}

			input[type="submit"] {
				width: min-content;
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

	</style>
	</head>
	<body>
		<div class="container">
			<input type="checkbox" id="check" />
			<div class="container-inner">
				<div class="login">
					<img src="logo.png" width="45%" />
					<div>
						<h2>LOGIN</h2>
						<form method="post">
							<input type="text" name="txtUsername" placeholder="Username" />

							<input
								type="password"
								name="txtPassword"
								placeholder="Password"
							/>

							<input
								type="submit"
								id="btnSubmit"
								name="btnSubmit"
								value="Login"
							/>
						</form>
						<div class="signup">
							<span class="signup"
								>Don't have an account?
								<label for="check" id="Register">Register now!</label>
							</span>
						</div>
					</div>
				</div>

				<div class="registration">
					<img src="logo.png" width="45%" />
					<div>
						<h2>SIGN UP</h2>
						<form method="post">
							<input
								type="text"
								name="txtUser"
								placeholder="Enter your username"
							/>

							<input
								type="password"
								name="txtPass"
								placeholder="Create a password"
							/>

							<input
								type="password"
								name="txtConfirm"
								placeholder="Confirm your password"
							/>

							<input
								type="submit"
								id="btnRegister"
								name="btnRegister"
								value="Register"
							/>
						</form>
						<div class="signup">
							<span class="signup"
								>Already have an account?
								<label for="check" id="Register">Login</label>
							</span>
						</div>
					</div>
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
					$_SESSION['data'] = $row['StaffID'];
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
			if($row['Password']==$pwd){
				$_SESSION['data'] = $row['Username'];
				echo "<script language='javascript'>
				alert('Correct username and password. Welcome!!!');

				</script>";
			}
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

