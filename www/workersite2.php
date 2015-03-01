<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CafeQueue</title>

<style>
body{
	background-color: rgb(0,55,99);
}

p {
    background-color: white;
}
h1{
	font-size: 45;
	color: white;
}
h1.serif {
    font-family: "Times New Roman", Georgia, Serif;
}
table{
	background-color: white;
	
	margin-left:50;
	margin-right:50;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("tr").click(function(){
        $(this).hide();
    });
});
</script>
</head>
<body>
    




	<p align="center"> <img src="img/cafequeue.jpg" style="height:130px"></p>
	<h1 class="serif" align="center"> Order List </h1>
<table border="5" style="width:90%">
  <?php 
  // database credentials
    $db_user = 'root';
    $db_password = 'j0[k$7r4p';
    $db_host = 'localhost';
    $db_name = 'kmonagha_hacktcnj';
          // connect to database
          $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

          //check connection
          if ($conn->connect_error) {
            die ("Connection Failed: " . $conn->connect_error);
          }
          $sql = "SELECT orders FROM ORDERS";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            //output data of each row
            while( $row = $result->fetch_assoc()) {
				echo "<tr>";
				echo  "<td><img src=\"pic_mountain.jpg\" style=\"width:100px; height:100px;\"></td><td>" . $row['orders'] . "</td>";
				echo "</tr>";
				echo "<tr><td>Hi1</td><td>Hi2</td><td>Hi3</td></tr>";
			}
		   }

	?>
   <tr>
    <td><img src="pic_mountain.jpg" style="width:100px;height:100px"></td>
    <td>
    </td>
    <td style="width:20%"></td>
	</tr>
	<tr>
    <td><img src="pic_mountain.jpg" style="width:100px;height:100px"></td>
    <td style="width:20%">Order Number</td>
	</tr>
	<tr>
    <td><img src="pic_mountain.jpg" style="width:100px;height:100px"></td>
    <td style="width:20%">Order Number</td>
	</tr>
	<tr>
    <td><img src="pic_mountain.jpg" style="width:100px;height:100px"></td>
    <td style="width:20%">Order Number</td>
	</tr>
</table>
<h1 align ="right"><a href="C:/Users/mjfbe_000/Documents/test web/history.html">History</a></h1>
    
</body>
</html>
