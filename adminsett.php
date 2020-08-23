<?php
#error_reporting(0);

$host = "localhost";
 $dbUsername = "id11037018_admin";
    $dbPassword = "admin";
    $dbname = "id11037018_payroll";

if(isset($_POST["update"])) {
	$pass = $_POST['pass'];
	
	if(empty($pass) || !preg_match("/^.{5,20}$/", $pass)){
        if(empty($pass)){
             $warning = "Please enter your Password!";
        }
        elseif(!preg_match("/^.{5,20}$/", $pass)){
             $warning = "Please enter a valid password (5-20 Characters)!";
        }
    }
    else{
    	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
        	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } 
    	else {
    		$q = "UPDATE admin SET `Password` = '$pass' WHERE NAME = 'admin'";
    		mysqli_query($conn,$q);
    		$warning = "Password Changed Successfully!";
         }
         $conn->close();
    }
}

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	else {
		
    		$q = "Select * from admin where NAME = 'admin'";
          $query = mysqli_query($conn,$q);
    	$res = mysqli_fetch_array($query);
     }
     $conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	   <link rel="stylesheet" type="text/css" href="empsett.css">
  </head>
  <body>
	  <div id = "welcome">
	  <div id = "heading">Welcome <span id="mainhead">Admin</span></div>
	  </div>
	  
		<div class="bottom-text">
        <a id="nav" href="https://payrollmngsys.000webhostapp.com/admin.php">Dashboard</a>
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/adminsett.php">Settings</a>
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/index.php">Logout</a>
        </div>  
		  
      <form method="POST" class="login-form" style="height: 41%;"> 
<!----SETTINGS--->		  
        <h1>Settings</h1>
          <div id="warning" style="
color: #8e44ad;
text-align: center;
font-weight: bold;
	font-family: 'Montserrat', sans-serif;
	font-size: 15px;
	margin-bottom: 10px;"><?php echo $warning; ?></div>

<div class="txtbd">
          <input type="text" name="pass" value="<?php echo $res['Password']; ?>" style="margin-bottom: 10px;">
          <span>Password</span>
        </div>
		  
		  <button class="logbtn" name="update" style="margin-top: 12%;">Update</button>
      </form>
	  
	  

      <script type="text/javascript">
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
