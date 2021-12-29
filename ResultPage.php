<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "root";
	$password = '';
	$dname = "MRP";

    $con = @new mysqli($host, $login, $password, $dname, $port);
	//Connect to the mysql server
	
    $sql = "SELECT * FROM DemandTable" ;
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
    <title>Demand</title>
    <style>
    body {
               padding-top:50px;
               font-size:25px;
               background: blanchedalmond;
        }
    .center{
      
        padding-top:5px;
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;    
    }
    .center2{
        font-size:20px;
        width:100%;
    }
    .button{
      border: none;
      background-color: #2E2EFF;
      color: white;
      padding: 10px 5px;
      text-align: center;
      text-decoration: none;
      border-radius: 15px; 
      display: inline-block;
      font-size: 20px;
      margin-left:600px;
      cursor: pointer;
    }
    table {
    margin: 0 auto;
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
    td,th { border: 1px solid #ddd; padding: 8px;}
    #Table{ font-family: Arial, sans-serif; border-collapse: collapse;}
    #Table tr:nth-child(even){ background-color: #d2d3d4; }
    #Table tr:nth-child(odd){ background-color: #dee2e3; }
    #Table tr:hover{ background-color: #b5d0eb; }
    #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #608fb3; color:white; }

    </style>    
     <script type="text/javascript">
    
    if(window.history.replaceState){
        
        window.history.replaceState(null, null, window.location.href); 
    }
    
</script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <script src="s/bootstrap.min.js"></script>
<script>
         function PrintDiv() {
            var data=document.getElementById('Printable').innerHTML;
            var myWindow = window.open('', 'my div', 'height=500,width=800');
            myWindow.document.write('<html><head><title></title>');
            myWindow.document.write('</head><body >');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close();
            myWindow.print();
        }
    </script>
</head>
<body>
<img src="bg.jpg" alt="not found" style= "width:100%; height: 100%; position: absolute; z-index:-1; opacity: 0.7">
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
<?php 

  // login Admin
  if(isset($_POST['form_submt'])) 
  {
        
        $Email= $_POST['email'];
        $password=$_POST['Password'];
        
        if(empty($Email) || empty($password) ){       
          echo "<script> alert('Empty Fields !!');
          window.location.href='loginAdmin.php';
          </script>";  
          exit() ;           
        }
        
        $check="Select * from AdminDATA";

        if($pdate = $con->query($check)){            
          $row1 = $pdate->fetch_array(); 
          $Oemail=$row1['mail'];    
          $Opassword=$row1['Pass_word'];              
       } 

       
       
       
       if($Email==$Oemail && $password==$Opassword)
       {
            // home page
            echo "<script> alert('Welcome Admin !!');
            window.location.href='AdminHomePage.php';
            </script>";  
            exit() ;  
            
       }
       else
       {
            echo "<script> alert('Wrong Password !!');
            window.location.href='loginAdmin.php';
            </script>";  
            exit() ;  
       }

  } 


  // login user

  if(isset($_POST['form_submituser'])) 
  {
        
        $Email= $_POST['email'];
        $password=$_POST['Password'];
        
        if(empty($Email) || empty($password) ){       
          echo "<script> alert('Empty Fields !!');
          window.location.href='loginUser.php';
          </script>";  
          exit() ;           
        }
        
        $check="Select * from UserDATA where mail='$Email' ";

        if($pdate = $con->query($check)){            
          $row1 = $pdate->fetch_array(); 
          $Oemail=$row1['mail'];    
          $Opassword=$row1['Pass_word'];              
       } 
       
       if($Email==$Oemail && $password==$Opassword)
       {
            // home page
            echo "<script> alert('Welcome User !!');
            window.location.href='UserHomepage.php';
            </script>";  
            exit() ; 
            
       }
       else
       {
            echo "<script> alert('Wrong Email or Password !!');
            window.location.href='loginUser.php';
            </script>";  
            exit() ;  
       }

  } 


  if(isset($_POST['form_sub'])) 
  {
        
        $Email= $_POST['email'];
        $password=$_POST['Password'];
        
        if(empty($Email) || empty($password) ){       
          echo "<script> alert('Empty Fields !!');
          window.location.href='loginUser.php';
          </script>";  
          exit() ;           
        }
        
        $check= "Insert into UserDATA values ('$Email','$password')";

        if($con->query($check)==true)
        {
            echo "<script> alert('Welcome User !!');
            window.location.href='UserHomePage.php';
            </script>";  
            exit() ;  
        }
        
  }


  // order

  if(isset($_POST['form_submitted']))
  {
      $DATE = $_POST['Ddate'];
      $Product_No = $_POST['Pid'];
      $NAME = $_POST['Name'];
      $Email=$_POST['email'];
      $Requirement = $_POST['req'];

      if(empty($DATE) || empty($Product_No) || empty($Requirement)|| empty($NAME)||empty($Email)){       
        echo "<script> alert('Empty Fields !!');
        window.location.href='Order.php';
        </script>";  
        exit() ;           
      }

      if( $Product_No!=101&& $Product_No!=102&& $Product_No!=103){       
        echo "<script> alert('Invalid Input !!');
        window.location.href='Order.php';
        </script>";  
        exit() ;           
      }
      
      $cur="Select CURDATE()";

      if($pdate = $con->query($cur)){            
        $row1 = $pdate->fetch_array(); 
        $today=$row1['CURDATE()'];                      
     }   
    
       if($DATE <= $today)
       {
        echo "<script> alert('Please enter a future date !!');
        window.location.href='Order.php';
        </script>";  
        exit() ;  
       }


       // delete past data from demand table
       $deletedamandtable= "Delete from demandtable where Demanddate<='$today'";

       $con->query($deletedamandtable);


      $InsertDemandtable= "Insert into DemandTable ( Demanddate, Product_id,ProductName, ProductReq, Email) VALUES ('$DATE' , '$Product_No', '$NAME', '$Requirement', '$Email')";
    
            if($con->query($InsertDemandtable)==true){
                    ?> 
                   <img class ="center" src="imgs.png" alt=""  height="200" width="350">
                   <h1 style="text-align: center; font-size: 60px; padding-top: 0px">Thank you for your order<h1>
                 

                    <button class="button"onclick="location.href='UserHomepage.php'">Back to Home Page</button>
                    <?php
             }
             else{
              ?> 
              <script>alert("Error!!")</script>
              <?php
             }
    }

  

    $con->close();
?>          
</body>
</html>
