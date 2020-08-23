<?php

$host = "localhost";
$dbUsername = "id11037018_admin";
$dbPassword = "admin";
$dbname = "id11037018_payroll";
$warning = "";

$name = "";
$pass = "";
$type = "";
$desig = "";
$ph = "";
$rawdate = "";
$doj = "01/01/0001";

if(isset($_POST['e_name'])) $name = $_POST['e_name'];
if(isset($_POST['pass'])) $pass = $_POST['pass'];
if(isset($_POST['type'])) $type = $_POST['type'];
if(isset($_POST['desig'])) $desig = $_POST['desig'];
if(isset($_POST['ph'])) $ph = $_POST['ph'];
if(isset($_POST['date'])){
    $rawdate = htmlentities($_POST['date']);
    $doj = date('Y-m-d', strtotime($rawdate));
} 

if(isset($_POST['register'])){
if(empty($name) || !preg_match("/^[a-zA-Z ]+$/", $name)){
    if(empty($name)){
        $warning = "Please enter your Beautiful Name!";
    }
    elseif(!preg_match("/^[a-zA-Z ]{3,20}$/", $name)){
         $warning = "Please enter a valid name (3-20 Letters)!";
    }
}
elseif(empty($pass) || !preg_match("/^.{5,20}$/", $pass)){
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
elseif($type == ""){
    $warning = "Please enter your Type!";
}
elseif($desig == ""){
    $warning = "Please enter your Designation!";
}
elseif($doj == '1970-01-01'){
    $warning = "Please enter your Date of Joining!";
}
else{
 	//create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	else {
	    	$INSERT = "INSERT INTO `employee` (`E_NAME`, `Password`, `Phone`, `Type`, `Desig`, `DOJ`) VALUES ('$name', '$pass', '$ph', '$type', '$desig', '$doj');";
	    	$query3 = mysqli_query($conn,$INSERT);
		$Last = "SELECT MAX(LAST_INSERT_ID(E_ID)) FROM employee;";
		
      $query = mysqli_query($conn,$Last);
	$resl = mysqli_fetch_array($query);
		
        $hello = $resl['MAX(LAST_INSERT_ID(E_ID))'];
		$sal = "INSERT Into salary (E_ID) values('$hello');";
		  $query = mysqli_query($conn,$sal);
		  $warning = "Registration Successful! Your ID is $hello";
     }
     $conn->close();
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="reg.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  </head>
  <body>
		  
      <form action="reg.php" method="POST" class="login-form" style="height: 95%;">
        <h1>Registration Form</h1>
        
         <div id="warning" style="
color: #8e44ad;
text-align: center;
font-weight: bold;
	font-family: 'Montserrat', sans-serif;
	font-size: 15px;"><?php echo $warning; ?></div>

        <div class="txtb">
          <input type="text" name="e_name" value="<?php echo $name; ?>">
          <span data-placeholder="Your Name"></span>
        </div>
        <div class="txtb">
          <input type="password" name="pass" value="<?php echo $pass; ?>">
          <span data-placeholder="Password"></span>
        </div>
		  
		 <div class="txtb">
          <input type="number" name="ph" value="<?php echo $ph; ?>">
          <span data-placeholder="Phone Number"></span>
        </div>
		  
		  <div class="txtb">
		  <select name="type">
		<option selected hidden value="">Type</option>
  <option value="Full Time">Full Time</option>
  <option value="Part Time">Part Time</option>
</select>
		  </div>
			  
			   <div class="txtb">
		  <select name="desig">
		<option value="">Designation</option>
  <option value="Business System Analyst">Business System Analyst</option>
  <option value="Content Manager">Content Manager</option>
			  <option value="Database Admin">Database Admin</option>
			  <option value="Digital Marketing Manager">Digital Marketing Manager</option>
			  <option value="Boss">Boss</option>
			  <option value="Data Scientist">Data Scientist</option>
</select>   
		  </div>
		  
		<div class="txtb">
          <input name="date" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"  value="<?php echo $doj; ?>">
          <span data-placeholder="Date of Joining"></span>
        </div>
		  
        <input type="submit" class="logbtn" value="Register" name="register">

        <div class="bottom-text">
          Already a member? <a href="index.php">Login</a>
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
