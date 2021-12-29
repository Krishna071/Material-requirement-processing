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
    <title>Order</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>
    body {
               padding-top: 50px;
               font-size:25px;
               background: white;
        }

    .moneyTransfer{
        color:Black;
        display:flex;
        height:90%;
        width:90%;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        margin:auto;
        margin-top:4%;
    }

    .image{
        display:flex;
        flex-direction:column;
        align-items:center;
       
        justify-content:center;
    }
    
    .inner{
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    .button{
      border: none;
      background-color: #2E2EFF;
      color: white;
      padding: 10px 10px;
      text-align: center;
      text-decoration: none;
      border-radius: 10px; 
      display: inline-block;
      font-size: 12px;
      cursor: pointer;
    }
    .nav{
    margin-bottom:10px;
}
ul {
  margin: 0;
  padding :0;
  overflow: hidden;
  background-color: black;
  position: fixed;
  list-style: none;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: grey;
}

    </style>   
    <script type="text/javascript">
    
        if(window.history.replaceState){
            
            window.history.replaceState(null, null, window.location.href); 
        }
       
    </script>
</head>
<body>

<nav class="Nav">
    <ul>
    <li>
    <a href="Order.php">Order Product</a>
    </li>
    <li>
    <a href="index.php">Logout</a>
    </li>
    </ul>
   </nav>

<div class = 'moneyTransfer'>

<div class='inner'>

<h1 style="margin-top:0px;margin-bottom:0px;"> Order Products</h1>
   
        <div class='image'>
        <img src="OrderIMG.png "  width="700" height="330">
       
        </div>

    <form name="myForm" action="ResultPage.php"  onsubmit="return validateForm()" method="post">
        <table id="table1">
        <tr>
            <td>Date</td>
            <td><input type="Date" name="Ddate"   required><td>
        </tr>
        <tr>
            <td>Product ID</td>
            <td><input type="number" name="Pid"  required ><td>
        </tr>
      
        <tr>
            <td>Product </td>
            <td><input type="text" name="Name"  required ><td>
        </tr>
        <tr>
            <td>Email </td>
            <td><input type="text" name="email" required><td>
        </tr>
        <tr>
            <td>Requirements </td>
            <td><input type="number" name="req" required><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input class="button" type="submit" value="ORDER"><td>
        </tr>
       
        </table>
    </form>

    </div>
</div>

 <script>
 
 function validateForm() {
            var x = document.forms["myForm"]["Ddate"].value;
            var y = document.forms["myForm"]["Pid"].value;
            var z = document.forms["myForm"]["Name"].value;
            var a = document.forms["myForm"]["req"].value;

          
            if (x == "" || y==""|| z==""||a=="") {
                alert("Fill it!!");
                return false;
            }
           
 }
        
            
 </script>
 
</body>
</html>
