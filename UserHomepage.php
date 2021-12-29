<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset="utf-8">
  <title>Jumanji</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <style>
    body {
      padding-top: 60px;
      font-size:25px;
      background: blanchedalmond;
    }
    .center{
      padding-top:0px;
      
      display: block;
      margin-top: 20px;
      margin-left: auto;
      margin-right: auto;
      height: 40%;
      width: 50%;
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
    footer {
            background-color: black;
            left: 0;
            bottom: 0;
            height: 120px;
            width: 100%;
        }
  </style>
</head>
<body>
  <img src="bg.jpg" alt="factory" style= "width:103%; height: 100%; position: absolute; z-index:-1; opacity: 0.7">
   <!-- <?php include('navbar.php'); ?>  -->
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
  <div class="center">
      <h1 style="text-align: center; font-size: 60px; padding-top: 0px">Welcome to Jumanji<h1>
      <img class ="center" src="image.png" alt="" width="100" height="200">
      <p style="text-align: center ; font-size: 25px"><i>"First Never Follows."</i><p>
     
  </div>
  <footer style="padding-top: 2px; text-align: center; color: white">
    <p style="font-size: 15px">Designed by: Group4 </p>
    <p style="font-size: 15px">Contact Number: +919876543210</p>
    <p style="font-size: 15px">E-mail: mrp@gmail.com</p> 
</footer>
</body>
</html>
