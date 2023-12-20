<?php 
	session_start();

	$connect = mysqli_connect("localhost","root","","mj") or die("Unable to connect");
	$data = $_SESSION['data'];
	$sql = "select * from staff where StaffID='$data'";
	$res = mysqli_query($connect,$sql);
	$row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MJ Studio Maintainance</title>
	<style>
		body {
			
			text-align: center;
			background-color: #1f1717;
			backdrop-filter: blur(5px);
			color: #fcf5ed;
			height: auto;
		}
		h1 {
			color: #fcf5ed;
		}
		form {
/*				display: flex;*/
/*				flex-direction: column;*/
				font-size: 20px ;
				gap: 15px;
				margin-bottom: 10px;
				text-align: center;
				align-items: center;
			}
		select {
			width:20%;
		}
		.overdue{
			background-color: rgba(206, 90, 103, 0.8);
			margin-top: 0px;
			margin: 5px;
			padding: 10px;
			border-radius: 20px;
			height: 50%;
			text-align: center;
			align-items: center;
			align-content: center;
		}
		.now{
			background-color: rgba(206, 90, 103, 0.8);
			margin: 5px;
			padding: 10px;
			border-radius: 20px;
			height: 50%;
		}
		#page{
			display: flex;
			background-color: transparent;
		}
		#side{
			background-color: rgba(206, 90, 103, 0.8);
			width:20%;
			margin: 5px;
			margin-bottom: 0;
			padding: 10px;
			border-radius: 20px;
			height: 100vh;
			float: right;
			line-height:5px ;
		}
		#profile{
			width: 50%;
			text-align: center;
			margin-top: 8px;
		}
		#name{
			margin-top: 50px;
			color: ;
		}
		#details{
			margin-left: 50px;
			text-align: left;
		}
		#links{
			margin-top: 50px;
			margin-left: 50px;
			text-decoration: underline;
			line-height:60px;
			text-align: left;
		}
		#other {
			background-color: transparent;
			float: left;
			width:80%;
			height: 100%;
			margin-top: 0px;
		}
		#navbar{
			background-color: rgba(206, 90, 103, 0.8);
			margin: 5px;
			margin-top: 0px;
			padding: 10px;
			border-radius: 20px;
			height: 20%;
			opacity: 0.9;
		}
		#maincon{
			position: relative;
			margin: 5px;
			border-radius: 20px;
			height: 100vh;
			padding: 10px;
			opacity: 0.9;
		}
		
	</style>
</head>
<body>
	<div id = "navbar">
			<h1> welcome!!</h1>	
	</div>
	<div id ="page">
	<div id="side">
		<img src = "<?php echo $row['Pic']; ?>" id = "profile">
		<h2 id = "name">
			<?php
				echo $row['LastName'].", ".$row['FirstName']." ".$row['MI'];
			?>
		</h2>
		<h3 id = "details">
			<?php
				echo $row['JobTitle'];
			?>
		</h3>
		<h4 id = "details">
			<?php
				echo $row['StaffID'];
			?>
		</h4>
		<p id ="links">
			Communications <br>
			View Payslip <br>
			Submit Report <br>
		</p>
	</div>
	<div id = "other">
		<div id ="maincon">
			<div class="overdue">
				<table border="1" width="100%">
				<h2>Task</h2>
				<tr>
				<td>Maintainance ID</td>
				<td>Maintainance Type</td>
				<td>Staff ID</td>
				</tr>
				<?php
					$connect = mysqli_connect("localhost","root","","mj") or die("Unable to connect");
						$sql="select * from maintainance";
						$res=mysqli_query($connect,$sql);
						$row=mysqli_fetch_array($res);
					while($row=mysqli_fetch_array($res)){
					echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "</tr>";
				}
           		?>
           	</table>
			</div>
			<div class="now">
				<h2>Add Task</h2>
				
				<form method="post">
					        <label for="txtStaffid">Staff:</label> <select name="" id="txtStaffid" placeholder="Choose Staff" >
					        	<?php
					        		$connect = mysqli_connect("localhost","root","","mj") or die("Unable to connect");
									$sql = "select * from staff";
									$res = mysqli_query($connect,$sql);
									$row=mysqli_fetch_array($res);

            						 echo "<option value=".$row[1].">".$row[1]."</option>";
            						 echo "<option value=".$row[2].">".$row[2]."</option>";
           							 echo "<option value=".$row[3].">".$row[3]."</option>";
           						?>
        					</select>
        					<br>
							<label for="maintainanceId">Maintainance ID:</label> <select name="maintainanceId" id="maintainanceId" placeholder="Choose Maintainance Id">
            						<?php
            						$connect = mysqli_connect("localhost","root","","mj") or die("Unable to connect");
									$sql = "select * from maintainance";
									$res = mysqli_query($connect,$sql);
									$row=mysqli_fetch_array($res);

            						 echo "<option value=".$row[1].">".$row[1]."</option>";
            						 echo "<option value=".$row[2].">".$row[2]."</option>";
           							 echo "<option value=".$row[3].">".$row[3]."</option>";
           						?>
        						</select>
							<br>
							<label for="maintainanceId">Maintainance Type:</label> <select name="maintainanceType" id="maintainanceType" placeholder="Choose Maintainance Type">
            						 <?php
            						 $connect = mysqli_connect("localhost","root","","mj") or die("Unable to connect");
									$sql = "select * from maintainance";
									$res = mysqli_query($connect,$sql);
									$row=mysqli_fetch_array($res);

            						 echo "<option value=".$row[1].">".$row[1]."</option>";
            						 echo "<option value=".$row[2].">".$row[2]."</option>";
           							 echo "<option value=".$row[3].">".$row[3]."</option>";
           						?>
        						</select>

        						<br>
        					<label for="maintainanceId">Equipment:</label> <select name="maintainanceType" id="maintainanceType" placeholder="Choose Maintainance Type">
            						 <?php
            						 $connect = mysqli_connect("localhost","root","","mj") or die("Unable to connect");
									$sql = "select * from equipment";
									$res = mysqli_query($connect,$sql);
									$row=mysqli_fetch_array($res);

            						 echo "<option value=".$row[1].">".$row[1]."</option>";
            						 echo "<option value=".$row[2].">".$row[2]."</option>";
           							 echo "<option value=".$row[3].">".$row[3]."</option>";
           						?>
        						</select>
							<br>
							<input
								type="submit"
								id="btnSubmit"
								name="btnSubmit"
								value="Sumbit"
							/>
				</form>

				<?php


	if(isset($_POST['btnSubmit'])){
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

				?>
			</div>
		</div>
	</div>
	</div>
</body>
</html>