<?PHP

$conn = mysql_connect('mydb.ics.purdue.edu:3306','ksivalin','shenki90');

$name = $_POST['name'];
$email = $_POST['email'];
$startDate = $_POST['startDate']; ; 
$address = $_POST['address'];

echo $fullname;
if(!conn)
{
die('Could not connect: ' .mysql_error());
}

$sql = "INSERT INTO addEvent(nameOfEvent,email,startDate,address) VALUES ('$_POST[name]','$_POST[email]','$_POST[startDate]','$_POST[address]')";


mysql_select_db('ksivalin');

$retval = mysql_query( $sql,$conn);

if(!$retval)
{
die('Could not enter data: ' . mysql_error());
}


if($retval){



}
mysql_close($conn);
?> 