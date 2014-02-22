<?PHP
$server = "mydb.ics.purdue.edu";
$username = "ksivalin";
$password = "901011";
$database =  "ksivalin";


$conn = mysql_connect($server,$username,$password) or die ("Cannot connect to the database");
$selectDb = mysql_select_db($database,$conn) or die ( " Cannot connect to the database");
$selectDb = mysql_select_db($database,$conn) or die ( " Cannot connect to the database");

?>