<html>
	<form method="post">
		<pre>
			<input type="text" name="moduleid" placeholder="Module ID">
			<input type="text" name="moduleName" placeholder="Module Name">
			<input type="text" name="moduleHours" placeholder="Module Number of Hours">
			<input type="submit" name="btnAdd" value="Add New Module">
		</pre>
	</form>
</html>


<?php
	if(isset($_POST['btnAdd'])){
		$id = $_POST['moduleid'];
		$name =$_POST['moduleName'];
		$hrs =$_POST['moduleHours'];

		$connect = mysqli_connect("localhost","root","","trainingcenter2") or die("Error in connection");


		$sql="select * from module where moduleid=$id";
		$result = mysqli_query($connect,$sql);

		if(mysqli_num_rows($result)==0){
			$sql="insert into module values($id,'$name',$hrs)";
			mysqli_query($connect,$sql);

			echo "<script language='javascript'>
				alert('New module added.');

				</script>";
		}else
			echo "<script language='javascript'>
				alert('Module Id already existing');

				</script>";




		
	
	}
	



?>