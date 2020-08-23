<?php
      
#error_reporting(0);
$host = "localhost";
$dbUsername = "id11037018_admin";
 $dbPassword = "admin";
$dbname = "id11037018_payroll";

$warning = "";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  </head>
  <body>
	  <div id = "welcome">
	  <div id = "heading">Welcome <span id="mainhead">ADMIN</span></div>
	  </div>
	  
		<div class="bottom-text">
         <a id="nav" href="https://payrollmngsys.000webhostapp.com/admin.php">Dashboard</a>
          <a id="nav" href="https://payrollmngsys.000webhostapp.com/adminsett.php">Settings</a>
          <a id="nav" name="logout" href="https://payrollmngsys.000webhostapp.com/index.php">Logout</a>
        </div>  
		  
      <form method="POST" class="login-form">
        <h1>Search Employees</h1>
        

<div class="txtbd">
          <input type="text" name="e_id" value="<?php if (isset($_POST['e_id'])) echo $_POST['e_id']; ?>">
          <span>User ID</span>
        </div>
		  
		  <div class="txtb">
		  <select name="type" name="type">
		<option selected hidden value=""><?php if (isset($_POST['type'])) echo $_POST['type']; ?></option>
  <option value="Full Time">Full Time</option>
  <option value="Part Time">Part Time</option>
</select>
		  </div>
		  
		  <div class="txtbd">
          <input type="text" name="ename" value="<?php if (isset($_POST['e_name'])) echo $_POST['e_name']; ?>">
          <span>Name</span>
        </div>
		  
		  <div class="txtb">
		  <select name="desig" name="desig">
		<option selected hidden value=""><?php if (isset($_POST['desig'])) echo $_POST['desig']; ?></option>
  <option value="Business System Analyst">Business System Analyst</option>
  <option value="Content Manager">Content Manager</option>
			  <option value="Database Admin">Database Admin</option>
			  <option value="Digital Marketing Manager">Digital Marketing Manager</option>
			  <option value="Boss">Boss</option>
			  <option value="Data Scientist">Data Scientist</option>
</select>   
		  </div>
		  
		  <div class="txtb">
		  <label class="container">Show All
  <input type="checkbox" checked="unchecked" name="showall">
  <span class="checkmark"></span>
			  </label></div>

		  <div class="txtbd">
          <input name="date" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>">
          <span>Date of Joining</span>
        </div>
		
		  
        <input type="submit" class="logbtn" value="Search" name="search">
		  
		  <input type="" class="logbtndis" value="" disabled>
		  
		  <br>
		  
<!----Table--->
		   <h1>Results</h1>
		  
		  <table>
			  <tr>
			  <th>ID</th>
				  <th>Name</th>
				  <th>Type</th>
				  <th>Designation</th>
				  <th>Phone No.</th>
				  <th>Date of Joining</th>
				  <th>Details</th>
			  </tr>
		  
	<?php
if(isset($_POST["search"])) {
			

$id = $_POST['e_id'];
$name = $_POST['ename'];
$type = $_POST['type'];
$desig = $_POST['desig'];
$rawdate = htmlentities($_POST['date']);
$doj = date('Y-m-d', strtotime($rawdate));
	
if(isset($_POST['showall'])){
$showall = $_POST['showall'];
}
	else{
		$showall = "off";
	}
	
    if($showall == "on") {
    	$q = "Select * from employee";
    } 
	elseif($id != ""){
		
		$q = "Select * from employee where E_ID = $id";
     }
	elseif($name != "" && $type != "" && $desig != "" && $doj != "1970-01-01"){
		#echo "I am";	
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name' AND Type = '$type' AND Desig = '$desig' AND DOJ = '$doj';";
     }
	elseif($name != "" && $type != "" && $desig != ""){
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name' AND Type = '$type' AND Desig = '$desig';";
     }
	elseif($name != "" && $desig != "" && $doj != "1970-01-01"){	
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name' AND Desig = '$desig' AND DOJ = '$doj';";
     }
	elseif($type != "" && $desig != "" && $doj != "1970-01-01"){	
		$q = "Select * from employee group by E_ID HAVING Type = '$type' AND Desig = '$desig' AND DOJ = '$doj';";
     }
	elseif($name != "" && $type != "" && $doj != "1970-01-01"){	
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name' AND Type = '$type' AND DOJ = '$doj';";
     }
	elseif($name != "" && $type != ""){
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name' AND Type = '$type';";
     }
	elseif($type != "" && $desig != ""){
		$q = "Select * from employee group by E_ID HAVING Type = '$type' AND Desig = '$desig';";
     }
	elseif($desig != "" && $doj != "1970-01-01"){
		$q = "Select * from employee group by E_ID HAVING Desig = '$desig' AND DOJ = '$doj';";
     }
	elseif($name != "" && $doj != "1970-01-01"){
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name' AND DOJ = '$doj';";
     }
	elseif($name != "" && $desig != ""){
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name' AND Desig = '$desig';";
     }
	elseif($type != "" && $doj != "1970-01-01"){
		$q = "Select * from employee group by E_ID HAVING Type = '$type' AND DOJ = '$doj';";
     }
	elseif($name != ""){
		#echo "I am";	
		$q = "Select * from employee group by E_ID HAVING E_NAME = '$name';";
     }
	elseif($type != ""){
		#echo "I am";	
		$q = "Select * from employee group by E_ID HAVING Type = '$type';";
     }
	elseif($desig != ""){
		#echo "I am";	
		$q = "Select * from employee group by E_ID HAVING Desig = '$desig';";
     }
	elseif($doj != "1970-01-01"){
		#echo "I am";	
		$q = "Select * from employee group by E_ID HAVING DOJ = '$doj';";
     }
	else{
        $warning = "Please enter something!";	
	}

	

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
      $query = mysqli_query($conn,$q);
	while($res = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?php echo $res['E_ID'] ?></td>
			<td><?php echo $res['E_NAME'] ?></td>
			<td><?php echo $res['Type'] ?></td>
			<td><?php echo $res['Desig'] ?></td>
			<td><?php echo $res['Phone'] ?></td>
			<td><?php echo $res['DOJ'] ?></td>
			<td><a href="https://payrollmngsys.000webhostapp.com/details.php?a=<?php echo $res['E_ID']; ?>" style="background-color: white; padding: 6px 10px; border: 1px solid white; border-radius: 5px; color: #3498db;" onMouseOver="this.style.color='#8e44ad'" onMouseOut="this.style.color='#3498db'">View</a></td>
			  </tr>
				<?php
	}

     }
     $conn->close();
}
?>	  	
</table>
 <div id="warning" style="
color: #8e44ad;
text-align: center;
font-weight: bold;
	font-family: 'Montserrat', sans-serif;
	font-size: 15px;"><?php echo $warning; ?></div>
      </form>

	  <table>
	
	
	</table>


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
