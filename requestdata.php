<!DOCTYPE php>
<head>
<title>PHP file to request data from a database</title>
</head>
<body>

<?php
//insert user details here
$username = "cb25574";
$password = "ACzN8tsY";
$hostname = "localhost";

//connection to the database
$dbhandle = mysql_connect(
$hostname, $username, $password)
    or die("Unable to connect to MySQL");
?>

<?php
//select database to use
$selected = mysql_select_db("cb25574_db",$dbhandle)
    or die("Could not select examples");
echo "<h1>Connected to database cb25574_db & Requested Data</h1><br>";
?>




<?php

//select form fields values and escape them
$agegrade = $_POST['IncludeAgeGrade'];
$agegrade = mysql_real_escape_string($agegrade);
$sortby = $_POST['SortBy'];
$sortby = mysql_real_escape_string($sortby);
$sortin = $_POST['SortIn'];
$sortin = mysql_real_escape_string($sortin);

//check if agegrade is selected or not
if($agegrade < 1){
	//agegrade not selected therefore its table rows are not printed out

	//sql query statment to select required rows and columns from the database
	$query = "SELECT * FROM Results order by $sortby $sortin";
	$result = mysql_query($query)
    	or die("Could not action query");


	//print a table out with the retrived values
	if (mysql_num_rows($result) > 0)
	{
    	Print "<table border=1>";
    	Print "<tr><td><b>Runner ID</b></td><td><b>Event ID</b></td><td><b>Date</b></td><td><b>Finish Time</b></td><td>
    		<b>Position</b></td><td><b>Category ID</b></td><td><b>PB</b></td></tr>";
    	while ($row = mysql_fetch_assoc($result))
    	{
        	Print "<tr><td>" . $row['RunnerID'] . "</td><td>" .
        	$row['EventID'] . "</td><td>" . $row['Date'] . "</td><td>" . 
        	$row['FinishTime'] . "</td><td>" . $row['Position'] . "</td><td>" . 
       	 $row['CategoryID'] . "</td><td>" . $row['PB'] . "</td></tr>";
    	}
    	Print "</table>";
    }
}else{
	//agegrade selected therefore its table rows are printed out

	//sql query statment to select required rows and columns from the database
	$query = "SELECT * FROM Results order by $sortby $sortin";
	$result = mysql_query($query)
    	or die("Could not action query");


	//print a table out with the retrived values
	if (mysql_num_rows($result) > 0)
	{
    	Print "<table border=1>";
    	Print "<tr><td><b>Runner ID</b></td><td><b>Event ID</b></td><td><b>Date</b></td><td><b>Finish Time</b></td><td>
    		<b>Position</b></td><td><b>Category ID</b></td><td><b>Age Grade</b></td><td><b>PB</b></td></tr>";
    	while ($row = mysql_fetch_assoc($result))
    	{
       		Print "<tr><td>" . $row['RunnerID'] . "</td><td>" .
       		$row['EventID'] . "</td><td>" . $row['Date'] . "</td><td>" . 
       		$row['FinishTime'] . "</td><td>" . $row['Position'] . "</td><td>" . 
        	$row['CategoryID'] . "</td><td>" . $row['AgeGrade'] . "</td><td>" . 
        	$row['PB'] . "</td></tr>";
    	}
    	Print "</table>";
	}

}


?>

</body>