<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE>
<html>
<head>
	<title>change password</title>
	<style type="text/css">
		body
		{
			height:650px;
			
			background-image: url(images/7.jpg);
			
		}
		.wrapper
		{
			width:400px;
			height:400px;
			margin:100px auto;
			background-color:black;
			opacity: .8;
			color:white;
			padding:27px 15px;
		}
		.form-control
		{
			width:300px;

		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div style="text-align: center">
			<h1 style="text-align: center;font-size:35px;font-family: Lucida Console;">Change Your Password</h1>
		</div>
		<div style="padding-left:30px">
		<form action="" method="post">
			<input style="background-color:yellow; " type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input style="background-color:yellow; "  type="text" name="Email" class="form-control" placeholder="Email" required=""><br>
			<input style="background-color:yellow; "  type="text" name="Password" class="form-control" placeholder="New Password" required=""><br>
			<button style="margin:auto 100px;" class="btn btn-default" name="submit">Update</button>
		</form>
	</div>

	</div>
	<?php
	if(isset($_POST['submit']))
	{
		$sql=mysqli_query($db,"UPDATE user_reg SET Password='$_POST[Password]' Where username='$_POST[username]'AND Email='$_POST[Email]';");
		{
			?>
			<script type="text/javascript">
				alert("The password update successfully");
			</script>
			<?php
		}
	}
	?>


</body>
</html>