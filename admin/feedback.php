<?php
   include "connection.php";
   include "navbar.php";
?>
 <html>
<head>
    <title>student information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body
        {
            background-color: #dac1a0;
        }
       
        body {
  font-family: "Lato", sans-serif;
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
 <br><br>
<h1 style="color:black;">List Of Feedback Message:</h1>
<br>
<?php


    $res=mysqli_query($db,"SELECT * FROM `comments`;");
    echo "<table class='table table-bordered table-hover'>";
    echo"<tr style='background-color:#6db6b9e6;'>";
       echo"<th>"; echo "ID"; echo"</th>";
       echo"<th>"; echo "Student_Username"; echo"</th>";
       echo"<th>"; echo "Comments"; echo"</th>";
       
    echo "</tr>";
    while($row=mysqli_fetch_assoc($res))
    {
        echo"<tr>";
             echo"<td>"; echo $row['Id']; echo"</td>";
             echo"<td>"; echo $row['username']; echo"</td>";
             echo"<td>"; echo $row['comment']; echo"</td>";
            
             
        echo "</tr>";
    }
    echo "</table>";

?>




</body>
</html>