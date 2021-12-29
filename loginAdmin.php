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

<html>
<head> 
    <title>Login Admin</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>
       
    body {
               font-size:25px;
               background: blanchedalmond;
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
<img src="bg.jpg" alt="factory" style= "width:99%; height: 99%; position: absolute; z-index:-1; opacity: 0.9">
 

<div class = 'moneyTransfer'>
    <h1>Login Admin</h1>
  
    <form name="myForm" action="ResultPage.php"  onsubmit="return validateForm()" method="post">
        <table id="table1">
        <tr>
            <td>EMail</td>
            <td><input type="text" name="email"   required><td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="Password"  required ><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submt" value="3"></td>
            <td> <input class="button" type="submit" value="Login"><td>
        </tr>

        </table>
    </form>
</div>
 <script>
 
 function validateForm() {
            var x = document.forms["myForm"]["email"].value;
            var y = document.forms["myForm"]["pass_word"].value;
         
            if (x == ""||y=="")
            {
                alert("Fill it!!");
                return false;
            }
          
        }
            
 </script>
</body>
</html>
