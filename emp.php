<?php
#error_reporting(0);
$id = $_GET['a'];


$host = "localhost";
 $dbUsername = "id11037018_admin";
    $dbPassword = "admin";
    $dbname = "id11037018_payroll";
    


//create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	else {
		#echo "Connection Success!";
		$q = "Select * from employee where E_ID = $id";
      $query = mysqli_query($conn,$q);
	$res = mysqli_fetch_array($query);
	$q1 = "Select * from salary where E_ID = $id";
	$query1 = mysqli_query($conn,$q1);
	$res1 = mysqli_fetch_array($query1);
	$q2 = "Select * from leaves where E_ID = $id";
	$query2 = mysqli_query($conn,$q2);
	$res2 = mysqli_fetch_array($query2);
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
	   <link rel="stylesheet" type="text/css" href="empc.css">
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
		  
      <form action="index.html" class="login-form">
		  
<!----BASIC DETAILS--->		  
        <h1>Basic Details</h1>

<div class="txtbd">
          <input type="text" value="<?php echo $res['E_ID']; ?>" disabled>
          <span>User ID</span>
        </div>
		  
		  
		  <div class="txtbd">
          <input type="text" value="<?php echo $res['E_NAME']; ?>" disabled>
          <span>Name</span>
        </div>
		  
		  <div class="txtb">
		  <select name="type" disabled>
		<option selected hidden value=""><?php echo $res['Type']; ?></option>
  <option value="Full Time">Full Time</option>
  <option value="Part Time">Part Time</option>
</select>
		  </div>
		  
		  <div class="txtb">
		  <select name="desig" disabled>
		<option value=""><?php echo $res['Desig']; ?></option>
  <option value="Business System Analyst">Business System Analyst</option>
  <option value="Content Manager">Content Manager</option>
			  <option value="Database Admin">Database Admin</option>
			  <option value="Digital Marketing Manager">Digital Marketing Manager</option>
			  <option value="Boss">Boss</option>
			  <option value="Data Scientist">Data Scientist</option>
</select>   
		  </div>
		  
		  <div class="txtbd">
          <input name="date" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" value="<?php echo $res['DOJ']; ?>" disabled>
          <span>Date of Joining</span>
        </div>
		  <input type="" class="logbtndis" value="" disabled>
		  <br>
		  
<!----SALARY DETAILS--->
		   <h1>Salary Details</h1>
		  
		  <div class="txtbd">
          <input type="text" name="ph" value="<?php echo $res1['GI']; ?>"disabled>
			  <span>Gross Income</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="ph" value="<?php echo $res1['DA']; ?>"disabled>
			  <span>Dearness Allowances</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="ph" value="<?php echo $res1['HRA']; ?>"disabled>
			  <span>HRA</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="ph" value="<?php echo $res1['HC']; ?>"disabled>
			  <span>Deductions</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="ph" value="<?php echo $res1['NI']; ?>"disabled>
			  <span>Net Income</span>
        </div>
		  <input type="" class="logbtndis" value="" disabled>
		  <br>
		  
<!----Leaves DETAILS--->
		   <h1>Leave Details</h1>
		  <table>
			  <tr>
			  <th>L_ID</th>
				  <th>Type of Leave</th>
				  <th>Start Date</th>
				  <th>End Date</th>
			  </tr>
		  
	<?php
#error_reporting(0);
$id = $_GET['a'];


$host = "localhost";
 $dbUsername = "id11037018_admin";
    $dbPassword = "admin";
    $dbname = "id11037018_payroll";


//create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	else {
		#echo "Connection Success!";
		$q = "Select * from leaves where E_ID = $id";
      $query = mysqli_query($conn,$q);
	while($res = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?php echo $res['L_ID'] ?></td>
			<td><?php echo $res['type'] ?></td>
			<td><?php echo $res['s_date'] ?></td>
			<td><?php echo $res['e_date'] ?></td>
			  </tr>
				<?php
	}

     }
     $conn->close();
?>	  	
</table>
			  
	
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
