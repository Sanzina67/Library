
<?php
  include"connection.php";
  include "navbar.php";
  ?>
  <html>
<head>
	<title>books</title>
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
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue information</a></div>
    <div class="h"><a href="expired.php">Expired List</a></div>
</div>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

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
   
<!------------search bar---------------------->
<div class="srch">
	
	<form class="navbar-form" method="post" name="form1">
	
			<input class="form-control" type="text" name="search" placeholder="search book" required="">
			<button style="background-color:#6db6b9e6;" type="submit" name="submit" class="btn btn-default">
			    <span class="glyphicon glyphicon-search"></span>	
			</button>
		
	</form>
  <form class="navbar-form" method="post" name="form1">
  
      <input class="form-control" type="text" name="bid" placeholder="Book ID" required="">
      <button style="background-color:#6db6b9e6;" type="submit" name="submit2" class="btn btn-default">Delete
        
      </button>
    
  </form>
</div>

<h1 style="color:black;">List Of Books:</h1>
<br>
<?php
    if(isset($_POST['submit']))
    {
    	$q=mysqli_query($db,"SELECT * FROM `books` WHERE name like '%$_POST[search]%' ");

    	if(mysqli_num_rows($q)==0)
    	{
    		echo "Sorry! No books found.Try searching again";
    	}
    	else
    	{
    		 echo "<table class='table table-bordered table-hover'>";
    echo"<tr style='background-color:#6db6b9e6;'>";
       echo"<th>"; echo "ID"; echo"</th>";
       echo"<th>"; echo "Book-Name"; echo"</th>";
       echo"<th>"; echo "Author-Name"; echo"</th>";
       echo"<th>"; echo "Edition"; echo"</th>";
       echo"<th>"; echo "Status"; echo"</th>";
       echo"<th>"; echo "Quantity"; echo"</th>";
       echo"<th>"; echo "Department"; echo"</th>";
    echo "</tr>";
    while($row=mysqli_fetch_assoc($q))
    {
    	echo"<tr>";
    	     echo"<td>"; echo $row['bid']; echo"</td>";
    	     echo"<td>"; echo $row['name']; echo"</td>";
    	     echo"<td>"; echo $row['authors']; echo"</td>";
    	     echo"<td>"; echo $row['edition']; echo"</td>";
    	     echo"<td>"; echo $row['status']; echo"</td>";
    	     echo"<td>"; echo $row['quantity']; echo"</td>";
    	     echo"<td>"; echo $row['department']; echo"</td>";
    	echo "</tr>";
    }
    echo "</table>";
    	}
    }
    else
{

    $res=mysqli_query($db,"SELECT * FROM `books`;");
    echo "<table class='table table-bordered table-hover'>";
    echo"<tr style='background-color:#6db6b9e6;'>";
       echo"<th>"; echo "ID"; echo"</th>";
       echo"<th>"; echo "Book-Name"; echo"</th>";
       echo"<th>"; echo "Author-Name"; echo"</th>";
       echo"<th>"; echo "Edition"; echo"</th>";
       echo"<th>"; echo "Status"; echo"</th>";
       echo"<th>"; echo "Quantity"; echo"</th>";
       echo"<th>"; echo "Department"; echo"</th>";
    echo "</tr>";
    while($row=mysqli_fetch_assoc($res))
    {
    	echo"<tr>";
    	     echo"<td>"; echo $row['bid']; echo"</td>";
    	     echo"<td>"; echo $row['name']; echo"</td>";
    	     echo"<td>"; echo $row['authors']; echo"</td>";
    	     echo"<td>"; echo $row['edition']; echo"</td>";
    	     echo"<td>"; echo $row['status']; echo"</td>";
    	     echo"<td>"; echo $row['quantity']; echo"</td>";
    	     echo"<td>"; echo $row['department']; echo"</td>";
    	echo "</tr>";
    }
    echo "</table>";
}
if(isset($_POST['submit2']))
{
     if(isset($_SESSION['login_user']))
      {
            mysqli_query($db,"DELETE FROM  `books` WHERE bid ='$_POST[bid]';");
    
                ?>
                     <script type="text/javascript">
                          alert("Delete successfullly");
                     </script>
                <?php
      }
     else
    {
           ?>
              <script type="text/javascript">
                alert("Login first");
              </script>
            <?php
    }
} 

?>
</body>
</html>