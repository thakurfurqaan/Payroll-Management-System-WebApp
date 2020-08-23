<?php
#error_reporting(0);
$id = $_GET['a'];


$host = "localhost";
$dbUsername = "id11037018_admin";
    $dbPassword = "admin";
    $dbname = "id11037018_payroll";
    $warning = "";
    $warningleave = "";
   
//Update Displayed Data 
if(isset($_POST["update"])) {
	
	$ename = $_POST['ename'];
	$type = $_POST['type'];
	$desig = $_POST['desig'];
	$rawdate = htmlentities($_POST['date']);
	$doj = date('Y-m-d', strtotime($rawdate));
	$gi = $_POST['gi'];
	$da = $_POST['da'];
	$hra = $_POST['hra'];
	$hc = $_POST['hc'];
	$ni = "";
	if(isset($_POST['ni'])){
        $ni = $_POST['ni'];
	}
	
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    
    if(empty($ename) || !preg_match("/^[a-zA-Z ]+$/", $ename)){
        if(empty($ename)){
            $warning = "Please enter the Name!";
        }
        elseif(!preg_match("/^[a-zA-Z ]{3,20}$/", $ename)){
            $warning = "Please enter a valid name (3-20 Letters)!";
        }
    }
    elseif($type == ""){
            $warning = "Please enter the Type!";
    }
    elseif($desig == ""){
        $warning = "Please enter the Designation!";
    }
    elseif($doj == '1970-01-01'){
        $warning = "Please enter the Date of Joining!";
    }
    elseif(empty($gi) || !preg_match("/^\d{1,10}(?:\.\d{0,2})?$/", $gi)){
        if(empty($gi)){
             $warning = "Please enter Gross Income!";
        }
        elseif(!preg_match("/^\d{1,6}(?:\.\d{0,2})?$/", $gi)){
             $warning = "Please enter a valid Gross Income!";
        }
    }
    elseif(empty($da) || !preg_match("/^\d{1,10}(?:\.\d{0,2})?$/", $da)){
        if(empty($da)){
             $warning = "Please enter Dearness Allowance!";
        }
        elseif(!preg_match("/^\d{1,6}(?:\.\d{0,2})?$/", $da)){
             $warning = "Please enter a valid Dearness Allowance!";
        }
    }
    elseif(empty($hra) || !preg_match("/^\d{1,10}(?:\.\d{0,2})?$/", $hra)){
        if(empty($hra)){
             $warning = "Please enter HRA!";
        }
        elseif(!preg_match("/^\d{1,6}(?:\.\d{0,2})?$/", $hra)){
             $warning = "Please enter a valid HRA!";
        }
    }
    elseif(empty($hc) || !preg_match("/^\d{1,10}(?:\.\d{0,2})?$/", $hc)){
        if(empty($hc)){
             $warning = "Please enter Deductions!";
        }
        elseif(!preg_match("/^\d{1,6}(?:\.\d{0,2})?$/", $hc)){
             $warning = "Please enter a valid Deductions!";
        }
    }
    else{
        if (mysqli_connect_error()) {
        	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } 
    	else {
    		$q = "UPDATE employee SET E_NAME = '$ename', Type = '$type', Desig = '$desig', DOJ = '$doj' WHERE E_ID = $id;";
    		$r = "UPDATE salary SET GI = '$gi', DA = '$da', HRA = '$hra', HC = '$hc' WHERE E_ID = $id;";
    		$s = "UPDATE salary SET NI = GI + DA + HRA - HC WHERE E_ID = $id;";
    		mysqli_query($conn,$q);
    		mysqli_query($conn,$r);
    		mysqli_query($conn,$s);
    		$warning = "Details Updated Successfully";
         }
         $conn->close();
    }
}


//Add Leave
if(isset($_POST["AL"])) {
	
	$typeleave = $_POST['typeleave'];
	$rawdate = htmlentities($_POST['sdate']);
	$sdoj = date('Y-m-d', strtotime($rawdate));
	$rawdate = htmlentities($_POST['edate']);
	$edoj = date('Y-m-d', strtotime($rawdate));

    if($typeleave == ""){
            $warningleave = "Please enter the Type of Leave!";
    }
    elseif($sdoj == '1970-01-01'){
        $warningleave = "Please enter the Start Date!";
    }
    elseif($edoj == '1970-01-01'){
        $warningleave = "Please enter the End Date!";
    }
    elseif($edoj < $sdoj ){
        $warningleave = "End Date must be after Start Date";
    }
	else{
    	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
        	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } 
    	else {
    		$t = "INSERT INTO leaves(type, s_date, e_date, E_ID) values('$typeleave','$sdoj','$edoj','$id');";
    		mysqli_query($conn,$t);
    		$warningleave = "Leave added successfully!";
         }
         $conn->close();
    }
}


//Display Data
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
	  <div id = "heading">Viewing <span id="mainhead"><?php echo $res['E_NAME']; ?></span></div>
	  </div>
	  
		<div class="bottom-text">
         <a id="nav" href="https://payrollmngsys.000webhostapp.com/admin.php">Dashboard</a>
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/adminsett.php">Settings</a>
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/index.php">Logout</a>
        </div>  
		  
      <form method="POST" class="login-form">
		  
<!----BASIC DETAILS--->		  
        <h1>Basic Details</h1>
        <div id="warning" style="
color: #8e44ad;
text-align: center;
font-weight: bold;
	font-family: 'Montserrat', sans-serif;
	font-size: 15px;"><?php echo $warning; ?></div>

<div class="txtbd">
          <input type="text" value="<?php echo $res['E_ID']; ?>" name="e_id" disabled>
          <span>User ID</span>
        </div>
		  
		  
		  <div class="txtbd">
          <input type="text" value="<?php echo $res['E_NAME']; ?>" name="ename">
          <span>Name</span>
        </div>
		  
		  <div class="txtb">
		  <select name="type">
		<option selected hidden value="<?php echo $res['Type']; ?>"><?php echo $res['Type']; ?></option>
  <option value="Full Time">Full Time</option>
  <option value="Part Time">Part Time</option>
</select>
		  </div>
		  
		  <div class="txtb">
		  <select name="desig" >
		<option value="<?php echo $res['Desig']; ?>"><?php echo $res['Desig']; ?></option>
  <option value="Business System Analyst">Business System Analyst</option>
  <option value="Content Manager">Content Manager</option>
			  <option value="Database Admin">Database Admin</option>
			  <option value="Digital Marketing Manager">Digital Marketing Manager</option>
			  <option value="Boss">Boss</option>
			  <option value="Data Scientist">Data Scientist</option>
</select>   
		  </div>
		  
		  <div class="txtbd">
          <input name="date" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" value="<?php echo $res['DOJ']; ?>" >
          <span>Date of Joining</span>
        </div>
		  	
		  <input type="" class="logbtndis" value="" >
		  <br>
		  
<!----SALARY DETAILS--->
		   <h1>Salary Details</h1>
		  
		  <div class="txtbd">
          <input type="text" name="gi" value="<?php echo $res1['GI']; ?>">
			  <span>Gross Income</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="da" value="<?php echo $res1['DA']; ?>">
			  <span>Dearness Allowances</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="hra" value="<?php echo $res1['HRA']; ?>">
			  <span>HRA</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="hc" value="<?php echo $res1['HC']; ?>">
			  <span>Deductions</span>
        </div>
		  
		  <div class="txtbd">
          <input type="text" name="ni" value="<?php echo $res1['NI']; ?>" disabled>
			  <span>Net Income</span>
        </div>
		  <input type="submit" class="logbtn" value="Update" name="update">  
		  <input type="" class="logbtndis" value=""> 
		
		  
<!----Leaves DETAILS--->
		   <h1>Leave Details</h1>
		   <div id="warning" style="
color: #8e44ad;
text-align: center;
font-weight: bold;
	font-family: 'Montserrat', sans-serif;
	font-size: 15px;"><?php echo $warningleave; ?></div>

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
		  <!----Add Leave--->
		  <h1>Add Leave</h1>
		  
		  <div class="txtb">
		  <select name="typeleave">
		<option selected hidden value="">Type of Leave</option>
  <option value="Earned Leave">Earned Leave</option>
  <option value="Casual Leave">Casual Leave</option>
			  <option value="Sick Leave">Sick Leave</option>
			  <option value="Maternity Leave">Maternity Leave</option>
			   <option value="Quarantine Leave">Quarantine Leave</option>
</select>
		  </div>
		  
		  <div class="txtbd">
          <input name="sdate" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
          <span>Start Date</span>
        </div>
		  
		  <div class="txtbd">
          <input name="edate" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
          <span>End Date</span>
        </div>
			<input type="submit" class="logbtn" value="Add Leave" name="AL">  
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
