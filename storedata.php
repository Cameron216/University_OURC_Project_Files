<!DOCTYPE php>
<head>
<title>PHP file to submit data to a database to be stored</title>
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
echo "<h1>Connected to database cb25574_db & Saving Data</h1><br>";
?>




<?php
//Inserting the form fields into the database
$myQuery = "INSERT INTO Results(RunnerID, EventID, Date, FinishTime, Position, CategoryID, AgeGrade, PB) VALUES ('$_POST[RunnerID]', '$_POST[EventID]', '$_POST[Date]', '$_POST[FinishTime]', '$_POST[Position]', '$_POST[CategoryID]', '$_POST[AgeGrade]', '$_POST[PB]')";
mysql_query( $myQuery, $dbhandle);
?>

<h3>Data submitted to database:</h3>

<?php
//Output of each field that was submitted to the database
echo "<p>Runner ID: $_POST[RunnerID]</p>";
echo "<p>Event ID: $_POST[EventID]</p>";
echo "<p>Date: $_POST[Date]</p>";
echo "<p>Finish Time: $_POST[FinishTime]</p>";
echo "<p>Position: $_POST[Position]</p>";
echo "<p>Category ID: $_POST[CategoryID]</p>";
echo "<p>Age Grade: $_POST[AgeGrade]</p>";
echo "<p>PB: $_POST[PB]</p>";
?>



</body>