<?PHP

$link = mysql_connect('mydb.ics.purdue.edu:3306','ksivalin','shenki90');

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$message = " Thank you for registering $fullname"  ; 
$from = "from: FreeFoodEngine";
$subject = "Thank You";

echo $fullname;
if(!link)
{
die('Could not connect: ' .mysql_error());
}

$sql = "INSERT INTO signup(username,email,password,createdtime) VALUES ('$_POST[fullname]','$_POST[email]','$_POST[password]',NOW())";

mysql_select_db('ksivalin');

$retval = mysql_query( $sql,$link);

if(!$retval)
{
die('Could not enter data: ' . mysql_error());
}


if($retval){

$sent= mail($email,$subject,$message,$from);
header("Location: mainPage.html");
exit;

}
mysql_close($link);
?> 