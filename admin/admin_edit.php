<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM admin_reg WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first_name=$row['first_name'];
			$last_name=$row['last_name'];
			$username=$row['username'];
			$date_of_birth=$row['date_of_birth'];
			$Email=$row['Email'];
			$Password=$row['Password'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<input class="form-control" type="file" name="file">

		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="first_name" value="<?php echo $first_name; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="last_name" value="<?php echo $last_name; ?>">

		<label><h4><b>Username</b></h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">

		<label><h4><b>Date_of_birth</b></h4></label>
		<input class="form-control" type="text" name="date_of_birth" value="<?php echo $date_of_birth; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="Email" value="<?php echo $Email; ?>">

		<label><h4><b>Password:</b></h4></label>
		<input class="form-control" type="text" name="Password" value="<?php echo $Password; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$first_name=$_POST['first_name'];
			$last_name=$_POST['last_name'];
			$username=$_POST['username'];
			$date_of_birth=$_POST['date_of_birth'];
			$Email=$_POST['Email'];
			$Password=$_POST['Password'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE admin_reg SET pic='$pic', first_name='$first_name', last_name='$last_name', username='$username', date_of_birth='$date_of_birth', Email='$Email', Password='$Password' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="admin_profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>

