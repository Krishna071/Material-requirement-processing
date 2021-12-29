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
    <a href="RawMaterialDetails.php">Raw Materials Details</a>
    </li>
    
    <li>
    <a href="ProductDemand.php">Product Demand</a>
    </li>
    <li>
    <a href="Demand.php">Demand Analysis</a>
    </li>
    <li>
    <a href="index.php">Logout</a>
    </li>
    </ul>
   </nav>

<?php 
    // demand;
    if(isset($_POST['form_submit']))
    {
        $DATE = $_POST['Ddate'];
       
        if(empty($DATE)){       
          echo "<script> alert('Empty Fields !!');
          window.location.href='Order.php';
          </script>";  
          exit() ;           
        }
        else{
            ?> 
        <script>alert($DATE)</script>
        <?php
        }
        
        $yarnCount=0;
        $dyesCount=0;
        $fabricsCount=0;
        $decorativeCount=0;

        $yarnsTotalPrice=0;
        $dyesTotalPrice=0;
        $fabricsTotalPrice=0;
        $decorativeTotalPrice=0;


       
        // query for product value;

        $sqls = "Select sum(ProductReq) from DemandTable where Demanddate<='$DATE' AND  Product_id = 101"; 
        $sqlj = "Select sum(ProductReq) from DemandTable where Demanddate<='$DATE' AND  Product_id = 102"; 
        $sqlt = "Select sum(ProductReq) from DemandTable where Demanddate<='$DATE' AND  Product_id = 103"; 
        
        $shirt=0;
        $jeans=0;
        $Tshirt=0;

        if($result1 = $con->query($sqls)){            
            $row1 = $result1->fetch_array(); 
            $shirt=$row1['sum(ProductReq)'];

            //   echo $shirt ;                       
         }   
         
         if($result2 = $con->query($sqlj)){            
            $row2 = $result2->fetch_array(); 
            $jeans=$row2['sum(ProductReq)'];

              // echo $jeans ;                      
         }  
         if($result3 = $con->query($sqlt)){            
            $row3 = $result3->fetch_array(); 
            $Tshirt=$row3['sum(ProductReq)'];

            //echo $Tshirt ;
                                
         }  
      
         $prods = "Select * from Materialrequirements where Product_id = 101"; 
         $prodj = "Select * from Materialrequirements where Product_id = 102"; 
         $prodt = "Select * from Materialrequirements where Product_id = 103";
         
         if($res1 = $con->query($prods)){            
            $row1 = $res1->fetch_array(); 
           
            $yarnCount=$yarnCount+($shirt*$row1['Yarns']);
            $dyesCount=$dyesCount+($shirt*$row1['DYES']);
            $fabricsCount=$fabricsCount+($shirt*$row1['Fabrics']);
            $decorativeCount=$decorativeCount+($shirt*$row1['Decoratives']);

         }  

         if($res2 = $con->query($prodj)){            
            $row2 = $res2->fetch_array(); 
           
            $yarnCount=$yarnCount+($jeans*$row2['Yarns']);
            $dyesCount=$dyesCount+($jeans*$row2['DYES']);
            $fabricsCount=$fabricsCount+($jeans*$row2['Fabrics']);
            $decorativeCount=$decorativeCount+($jeans*$row2['Decoratives']);

         }  

         if($res3 = $con->query($prodt)){            
            $row3 = $res3->fetch_array(); 
           
            $yarnCount=$yarnCount+($Tshirt*$row3['Yarns']);
            $dyesCount=$dyesCount+($Tshirt*$row3['DYES']);
            $fabricsCount=$fabricsCount+($Tshirt*$row3['Fabrics']);
            $decorativeCount=$decorativeCount+($Tshirt*$row3['Decoratives']);

         }  
         
         $totalProducts=$shirt+$jeans+$Tshirt;
         $totalBill=0;

         // prices

         $priceY = "Select * from  PriceTable where Material = 'Yarns'"; 
         
       //  echo $totalProducts;

       // Date:2022-01-06
    //    YARNS REQUIREMENT:750           
    //    YARNS BILL:7500 

    //    DYES REQUIREMENT:750 
    //    DYES BILL:3750 

    //    FABRICS REQUIREMENT:1075           
    //    FABRICS BILL:16125 

    //    DECORATIVES REQUIREMENT:1100   
    //    DECORATIVES BILL:22000 

    //    TOTAL NUMBER OF ORDERS:60 
    //    TOTAL BILL:₹49375 

    // check remaining;

    $remY = "Select * from  availableData where Material = 'Yarns'"; 

    if($r1 = $con->query($remY)){            
     $r1 = $r1->fetch_array(); 
     $yarnCount=$yarnCount-$r1['rem'];
    } 
    
    $remyarn=0;
    if($yarnCount<=0)
    {
        
         $remyarn=-1*$yarnCount;
         $yarnCount=0;
    }
    else{
          $remyarn=0; 
        
    }
   // echo $remyarn;
   // UPDATE 
    $updateY= "Update availabledata SET rem = '$remyarn' WHERE Material='Yarns'"; 

    $con->query($updateY);

    $remdy = "Select * from  availableData where Material = 'Dyes'"; 

    if($r2 = $con->query($remdy)){            
     $r2 = $r2->fetch_array(); 
     $dyesCount=$dyesCount-$r2['rem'];
    }

    $remDY=0;
    if($dyesCount<=0)
    {
        
         $remDY=-1*$dyesCount;
         $dyesCount=0;
    }
    else{
          $remDY=0; 
        
    }
   // echo $remyarn;
   // UPDATE 
    $updateY= "Update availabledata SET rem = '$remDY' WHERE Material='Dyes'"; 

    $con->query($updateY);

    $remF = "Select * from  availableData where Material = 'Fabrics'"; 

    if($r3 = $con->query($remF)){            
     $r3 = $r3->fetch_array(); 
     $fabricsCount=$fabricsCount-$r3['rem'];

    } 

    $remF=0;
    if($fabricsCount<=0)
    {
        
         $remF=-1*$fabricsCount;
         $fabricsCount=0;
    }
    else{
          $remF=0; 
        
    }
   // echo $remyarn;
   // UPDATE 
    $updateY= "Update availabledata SET rem = '$remF' WHERE Material='Fabrics'"; 
    $con->query($updateY);

    $remD = "Select * from  availableData where Material = 'Decoratives'"; 

    if($r4 = $con->query($remD)){            
     $r4 = $r4->fetch_array(); 
     $decorativeCount=$decorativeCount-$r4['rem'];

    }
     
    $remDe=0;
    if($decorativeCount<=0)
    {
        
         $remDe=-1*$decorativeCount;
         $decorativeCount=0;
    }
    else{
          $remDe=0; 
        
    }

    $updateY= "Update availabledata SET rem = '$remDe' WHERE Material='Decoratives'"; 
    $con->query($updateY);


    $priceY = "SELECT pricetable.price
    from availabledata
    INNER JOIN pricetable
    ON availabledata.Material= pricetable.Material
    WHERE pricetable.Material='Yarns'"; 

       if($r1 = $con->query($priceY)){            
        $r1 = $r1->fetch_array(); 
        $yarnsTotalPrice=$yarnCount*$r1['price'];
       }  
      
       //echo $yarnsTotalPrice;
        
       $pricedy = "SELECT pricetable.price
       from availabledata
       INNER JOIN pricetable
       ON availabledata.Material= pricetable.Material
       WHERE pricetable.Material='Dyes'"; 
         
       //  echo $totalProducts;

       if($r2 = $con->query($pricedy)){            
        $r2 = $r2->fetch_array(); 
        $dyesTotalPrice=$dyesCount*$r2['price'];
       }  

       $priceF = "SELECT pricetable.price
       from availabledata
       INNER JOIN pricetable
       ON availabledata.Material= pricetable.Material
       WHERE pricetable.Material='Fabrics'"; 


       if($r3 = $con->query($priceF)){            
        $r3 = $r3->fetch_array(); 
        $fabricsTotalPrice=$fabricsCount*$r3['price'];

       }  
       // join for calculating price

       $priceD = "SELECT pricetable.price
       from availabledata
       INNER JOIN pricetable
       ON availabledata.Material= pricetable.Material
       WHERE pricetable.Material='Decoratives';"; 

       if($r4 = $con->query($priceD)){            
        $r4 = $r4->fetch_array(); 
        $decorativeTotalPrice=$decorativeCount*$r4['price'];

       }  

       // total bill;
       

        $totalBill=$yarnsTotalPrice+$dyesTotalPrice+$fabricsTotalPrice+$decorativeTotalPrice;
        
      
        
        echo "<div id='Printable'  style=' font-size: 20px; padding-top: 0px;margin: 0px 0px 0px 0px ; font-weight:bold' >
        <pre>--------------------------------------------------------------------------------------------------------------------------------</br>  
                                                 Total Price 
                                               Date:$DATE
        </br>--------------------------------------------------------------------------------------------------------------------------------</br>
                                            YARNS REQUIREMENT:$yarnCount           
                                            YARNS BILL:₹$yarnsTotalPrice <br /> 
                                            DYES REQUIREMENT:$dyesCount 
                                            DYES BILL:₹$dyesTotalPrice <br /> 
                                            FABRICS REQUIREMENT:$fabricsCount           
                                            FABRICS BILL:₹$fabricsTotalPrice <br />
                                            DECORATIVES REQUIREMENT:$decorativeCount   
                                            DECORATIVES BILL:₹$decorativeTotalPrice </br > 
                                            TOTAL NUMBER OF ORDERS:$totalProducts 
                                            TOTAL BILL:₹$totalBill 
       </pre> 
            
        <input class='btn btn-primary' style=' margin-left:45%;  border:1px;font-size: 20px; cursor: pointer; display: inline-block;' type='button' value='Print' onclick='PrintDiv()';  /> 
       
         </div> ";
         
    }

    $con->close();
?>          
</body>
</html>
