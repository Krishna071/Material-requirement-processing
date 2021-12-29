<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "root";
	$password = '';
	$dname = "MRP";

    $con = @new mysqli($host, $login, $password, $dname, $port);
	//Connect to the mysql server
	
    $sql = "SELECT * FROM DemandTable ORDER BY Demanddate" ;
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
    <title>Products Demand</title>    
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
                margin-left:210px;
                width: 50%;   
                color:white; 
        }

        td,th { border: 1px solid #ddd; padding: 10px;}
        #Table{ font-family: Arial, sans-serif; border-collapse: collapse; margin-bottom: 15px;}
        #Table tr:nth-child(even){ background-color:black; }
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
  <img src="bg.jpg" alt="factory" style= "width:100%; height: 100%; position: absolute; z-index:-1; opacity: 0.9">
  <?php include('navbar.php'); ?>
       <div class="container">
            <h1 style="text-align: center; color: black ; margin-left: 280px;">Product Demand</h1>
            <br>                   
            <table id="Table">
                <thead>
                    <tr>
                    <th>DEMAND_DATE</th>
                    <th>PRODUCT_ID</th>
                    <th>PRODUCT </th>
                    <th>REQUIREMENTS</th>
                    <th>E-mail</th>
                    </tr>
                </thead>                     
                <?php
                while($row = $result->fetch_assoc()) { 
                ?> 
                <tr>
                   <td><?php echo $row['Demanddate']; ?></td>
                    <td ><?php echo $row['Product_id']; ?></td>
                    <td><?php echo $row['ProductName']; ?></td>
                    <td><?php echo $row['ProductReq']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                </tr>
                <?php
                }
                $con->close();
                ?> 
            </table>
        </div>
      
</body>
</html>
