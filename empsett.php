<?php
#error_reporting(0);
$id = $_GET['a'];

$host = "localhost";
 $dbUsername = "id11037018_admin";
    $dbPassword = "admin";
    $dbname = "id11037018_payroll";

if(isset($_POST["update"])) {
	$pass = $_POST['pass'];
	$ph = $_POST['ph'];
	
	if(empty($pass) || !preg_match("/^.{5,20}$/", $pass)){
        if(empty($pass)){
             $warning = "Please enter your Ultimate Password!";
        }
        elseif(!preg_match("/^.{5,20}$/", $pass)){
             $warning = "Please enter a valid password (5-20 Characters)!";
        }
    }
    elseif(empty($ph) || !preg_match("/^\d{10}$/", $ph)){
        if(empty($ph)){
             $warning = "Please enter your 10 Digit Phone No.!";
        }
        elseif(!preg_match("/^\d{10}$/", $ph)){
             $warning = "Please enter a valid Phone No. (10 Digits)!";
        }
    }
	else{
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
        	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } 
    	else {
    		$q = "UPDATE employee SET Password = '$pass', Phone = '$ph' WHERE E_ID = $id";
    		mysqli_query($conn,$q);
    		$warning = "Details Updated Successfully!";
         }
        $conn->close();
    }
}

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	else {
		
		$q = "Select * from employee where E_ID = $id";
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
	  <div id = "heading">Welcome <span id="mainhead"><?php echo $res['E_NAME']; ?></span></div>
	  </div>
	  
		<div class="bottom-text">
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/emp.php?a=<?php echo $id; ?>">Dashboard</a>
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/empsett.php?a=<?php echo $id; ?>">Settings</a>
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/index.php">Logout</a>
        </div>  
		  
      <form method="POST" class="login-form"> 
<!----SETTINGS--->		  
        <h1>Settings</h1>
         <div id="warning" style="
color: #8e44ad;
text-align: center;
font-weight: bold;
	font-family: 'Montserrat', sans-serif;
	font-size: 15px;
	padding-bottom: 10px;"><?php echo $warning; ?></div>

<div class="txtbd">
          <input type="text" name="pass" value="<?php echo $res['Password']; ?>" >
          <span>Password</span>
        </div>
		  
		  
		  <div class="txtbd">
          <input type="text" name="ph" value="<?php echo $res['Phone']; ?>" style="padding-bottom: 10px;">
          <span>Phone Number</span>
        </div>
		  
		  <button class="logbtn" name="update" style="margin-top: 10%;">Update</button>
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
