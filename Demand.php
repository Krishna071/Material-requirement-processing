<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "root";
	$password = '';
	$dname = "MRP";

    $con = @new mysqli($host, $login, $password, $dname, $port);
	//Connect to the mysql server

	//Handle connection errors 
	if (mysqli_connect_errno() != 0) {
	    $errno = mysqli_connect_errno();
	    $errmsg = mysqli_connect_error();
	    die("Connect Failed with: ($errno) $errmsg<br/>\n");
	}
?>
<html>
<head> 
    <title>Demand Analysis</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>
       
    body {
               padding-top: 60px;
               font-size:25px;
               background: blanchedalmond;
               padding-bottom: 60px;
        }
    .moneyTransfer{
        color:Black;
        background:#E6E6FA;
        padding: 20px;
        position:fixed;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%);
    }
    h1 {
    text-align: center;
    }
    .button{
      border: none;
      background-color: #2E2EFF;
      color: white;
      padding: 7px 7px;
      text-align: center;
      text-decoration: none;
      border-radius: 10px; 
      display: inline-block;
      font-size: 12px;
      cursor: pointer;
    }
    
    </style>   
    <script type="text/javascript">
    
        if(window.history.replaceState){
            
            window.history.replaceState(null, null, window.location.href); 
        }
       
    </script>
</head>
<body>
<img src="bg.jpg" alt="factory" style= "width:100%; height: 92%; position: absolute; z-index:-1; opacity: 0.9">
  <?php include('navbar.php'); ?>
<div class = 'moneyTransfer'>
    <h1>Demand Analysis</h1>
    <h6>Enter a date to get material requirements and total bill on indicated date</h6>
    <form name="myForm" action="ResultDemand.php"  onsubmit="return validateForm()" method="post">
        <table id="table1">
        <tr>
            <td>Enter Date</td>
            <td><input type="Date" name="Ddate"   required><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submit" value="1"></td>
            <td> <input class="button" type="submit" value="Calculate"><td>
        </tr>
       
        </table>
    </form>
</div>
 <script>
 
 function validateForm() {
            var x = document.forms["myForm"]["Ddate"].value;
         
            if (x == ""  {
                alert("Fill it!!");
                return false;
            }
          
        }
            
 </script>
</body>
</html>
