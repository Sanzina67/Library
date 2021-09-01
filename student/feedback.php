<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>feedback  page</title>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
        	background-image: url(images/feedback.jpg);
        }
        .wrapper
        {
        	padding:20px;
        	margin:80px auto;
        	width:400px;
            height:400px;
            background-color:black;
            opacity:.8;
            color:white;

        }
    </style>
</head>
<body>
	<div class="wrapper">
		<h4> If you have any suggestion or question please comment below.</h4><br><br>
        <form style="" action="" method="post">
        	<input class="form-control" type="text" name="comment" placeholder="write comment here" style="height:100px;color:black;background-color: #f5cba7 "><br><br>
        	<input class="btn btn-default" type="submit"name="submit" value="comment" style="margin:auto 120px;width:100px;color:black;">
        </button>

        </form>
	</div>
	<div>
		<?php
         if(isset($_SESSION['login_user']))
        {
           
               if(isset($_POST['submit']))
               {
                
                    mysqli_query($db,"INSERT INTO `library`.`comments` values('','$_SESSION[login_user]','$_POST[comment]');");

                      ?>
                          <script type="text/javascript">
                             alert("Thank You");
                          </script>
                      <?php
               }
         
        }
        else
        {
            ?>
            <script type="text/javascript">
                alert("You need to login first");
            </script>
            <?php
        }
        ?>
	</div>

</body>
</html>