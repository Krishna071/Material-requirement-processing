<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "root";
	$password = '';
	$dname = "MRP";

    $con = @new mysqli($host, $login, $password, $dname, $port);
	//Connect to the mysql server
	
    $sql = "SELECT * FROM Materialrequirements" ;
    $result = $con->query($sql);

	//Handle connection errors 
	if (mysqli_connect_errno() != 0) {
	    $errno = mysqli_connect_errno();
	    $errmsg = mysqli_connect_error();
	    die("Connect Failed with: ($errno) $errmsg<br/>\n");
	}
?>
     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RawMaterialDetails</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
        <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
               padding-top: 60px;
               font-size:25px;
               padding-bottom: 100px;
              
               background: blanchedalmond;
              }
        .container{      
            padding-top:5px;
            display: block;
            margin-top: 20px;
            margin-left:auto;
            margin-right: auto;
            width: 50%; 
            color:white;
        }
        td,th { border: 1px solid #ddd; padding: 8px;}
        #Table{ font-family: Arial, sans-serif; border-collapse: collapse; margin-bottom: 15px;}
        #Table tr:nth-child(even){ background-color: black; }
        #Table tr:nth-child(odd){ background-color: black; }
        #Table tr:hover{ background-color: grey; }
        #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color: #C5C5C5; color:black; }
        footer {
            background-color: black;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 120px;
            width: 100%;
        }
    </style>
</head>

<body>
<img src="bg.jpg" alt="factory" style= "width:100%; height: 100%; position: absolute; z-index:-1; opacity: 0.7; padding-top: 0px">
  <?php include('navbar.php'); ?>
	<div class="container">
        <h2 style="text-align: center; padding-top: 0px; font-size: 50px; color: Black">Raw Materials Details</h2>
       <br>
       <div>
    <table id = "Table">
        <thead>
            <tr>
                <th>ProductID</th>
                <th>Product</th>
                <th>Yarns</th>
                <th>Dyes</th>
                <th>Fabrics</th>
                <th>Decoratives</th>
            </tr>
        </thead>
        <tbody>
        <?php
    while($row = $result->fetch_assoc()) { 
  ?> 
 <tr>
        <td><?php echo $row['Product_id']; ?></td>
        <td><?php echo $row['ProductName']; ?></td>
        <td><?php echo $row['Yarns']; ?></td>
        <td><?php echo $row['DYES']; ?></td>
        <td><?php echo $row['Fabrics']; ?></td>
        <td><?php echo $row['Decoratives']; ?></td>
       
        </tr>
 <?php
    }
  
$con->close();
?> 
</
</table>
    </div>
</div>

<body>
</html>
