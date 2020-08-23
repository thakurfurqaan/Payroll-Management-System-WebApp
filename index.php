<?php

error_reporting(0);

$id = "";
$pass = "";

if(isset($_POST['e_id'])){
    $id = $_POST["e_id"];
}

if(isset($_POST['pass'])){
    $pass = $_POST["pass"];
}


$host = "localhost";
    $dbUsername = "id11037018_admin";
    $dbPassword = "admin";
    $dbname = "id11037018_payroll";
    
$warning = '';

 
    
if(isset($_POST['login'])){
    if(empty($id)){
        $warning = "Enter your User ID!";
    }
    elseif(empty($pass)){
        $warning = 'Enter your Password!';
    }
    else{
 	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	    elseif($id == "admin"){
		$SELECT = "Select NAME, Password from admin where NAME = 'admin' AND Password = ?;";
      	$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $pass);
      	$stmt->execute();
// 		$stmt->bind_result($pass);
		$stmt->store_result();
	        if($stmt->fetch()){
    header("Location: https://payrollmngsys.000webhostapp.com/admin.php");
	}
		    else{
			  $warning = "Incorrect Admin Password!";
		}
	}
	else {
		$q = "Select E_ID, Password from employee where E_ID = $id AND Password = '$pass';";
      $query = mysqli_query($conn,$q);
	$res = mysqli_fetch_array($query);
		
	    if($res)
	{
		 header("Location: https://payrollmngsys.000webhostapp.com/emp.php?a=".$id);
	}
		else{
		     $warning = "Invalid User ID or Password!";
		}
      
     }

     $conn->close();
    }
 
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
<!--<meta property="fb:app_id" content="678323255833318" />-->

<meta property="og:title" content="Payroll" />
<!--<meta property="og:type" content="article" />-->
<meta property="og:url" content="http://payrollmngsys.000webhostapp.com/" />
<meta property="og:image" content="https://images.unsplash.com/photo-1567604539011-ce1f37c5d657?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" />
<meta property="og:description" content="BEST PAYROLL" />
<meta property="og:site_name" content="Payroll" />


    <title>Payroll Management System</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style>
	     @-webkit-keyframes colorchange {
      0% {
        color: #3498db;
      }
      100% {
        color: #8e44ad;
      }
    
      }
	</style>
  </head>
  <body>
	  <div id = "welcome">
	  <div id = "heading">Welcome to</div>
	  <div id = "mainhead">PAYROLL MANAGEMENT</div>
	  <div id = "mainhead">SYSTEM</div>
	  <div style="font-size: 20px;
	color: aliceblue;">Developed by Furqaan Thakur and Irfan Tagala</div>
		  
	  </div>
		  
		  
      <form action="index.php" method="POST" class="login-form" enctype="multipart/form-data">
        <h1>Login</h1>
        
        <div id="warning" style="
color: #8e44ad;
text-align: center;
font-weight: bold;
	font-family: 'Montserrat', sans-serif;"><?php echo $warning; ?></div>

        <div class="txtb">
          <input type="text" name="e_id" value="<?php echo $id ?>">
          <span data-placeholder="User ID"></span>
        </div>

        <div class="txtb">
          <input type="text" name="pass" >
          <span data-placeholder="Password"></span>
        </div>

        <input type="submit" class="logbtn" value="Login" name="login">

        <div class="bottom-text">
          Don't have an account? <a href="reg.php">Sign up</a>
        </div>

      </form>

      <script type="text/javascript">
       $( document ).ready(function() {
             if($(".txtb input").val())
       $(".txtb input").addClass("focus");
    });
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });
      </script>
  </body>
</html>
