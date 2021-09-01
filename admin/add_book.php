<?php
  include"connection.php";
  include "navbar.php";
  ?>
  <html>
<head>
	<title>add books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body
		{
			background-color: #dac1a0;
		}
        .srch{
        	padding-left:1000px;

        }
        body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  margin-top:50px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
  margin-left:30px;
}

.h:hover{
      color:white;
      height: 50px;
      width:300px;
      background-color:  #218648;
}
.book
{
  width: 400px;
  margin: 0px auto;
}
.form-control{
  background-color: #080707;
  color:white;
  height:40px;
}
	</style>



</head>
<body>
  <!--------sidebar------------------>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <div style="color:white;margin-left:50px;font-size:20px">
                      <?php
                      if(isset($_SESSION['login_user']))
                     {
                      echo "<img class='img-circle profile-img' height=120 width=120 padding=5px src='images/".$_SESSION['pic']." '>";
                      echo"</br>";
                      echo "Welcome  ".$_SESSION['login_user'];
                     }
                      ?>
                    </div ><br><br>
<div class="h"> <a href="add_book.php">Add Books</a></div>
  <div class="h"><a href="books.php">Delete Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue information</a></div>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div class="container">
  <h2 style="color:green;font-family:Lucida Console;text-align: center">Add New Books<b></h2>
     <form class="book" action="" method="post">
         <input type="text" name="bid" class="form-control" placeholder="Book_Id"><br>
         <input type="text" name="name" class="form-control" placeholder="Book Name"><br>
         <input type="text" name="authors" class="form-control" placeholder="Author Name"><br>
         <input type="text" name="edition" class="form-control" placeholder="Edition"><br>
         <input type="text" name="status" class="form-control" placeholder="Status"><br>
         <input type="text" name="quantity" class="form-control" placeholder="Quantity"><br>
         <input type="text" name="department" class="form-control" placeholder="Department Name"><br>
         <button style="text-align: center;margin:auto 150px;background-color:green;color:black" class="btn btn-default" type="submit" name="submit">ADD <b></button>

      </form>
</div>
<?php
if(isset($_POST['submit']))
{
  if(isset($_SESSION['login_user']))
  {
    mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]');");
    ?>
    <script type="text/javascript">
      alert("Book added sucessfully");
    </script>
    <?php
  }
  else
  {
    ?>
    <script type="text/javascript">
      alert("You need to log in first");
    </script>
    <?php
  }
}

?>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>


   </body>
   </html>