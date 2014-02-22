<?PHP

$conn = mysql_connect('mydb.ics.purdue.edu','ksivalin','shenki90');

if(!$conn)
{
die ('Could not connect to database: ' .mysql_error());
}

$username = $_POST[username];
$password = $_POST[password];


$sql = ("SELECT username,password FROM signup WHERE username = '$username' AND password = '$password'");
mysql_select_db('ksivalin');
$result = mysql_query($sql,$conn);

$row  = mysql_fetch_array($result);


$count=mysql_num_rows($result);


if($count == 1)
{
header("Location: secondPage.php");
exit;
}
else {
header("Location: mainPage.html");

<script>
function myFunction()
{
var x;
var r=confirm("Press a button!");
if (r==true)
  {
  x="You pressed OK!";
  }
else
  {
  x="You pressed Cancel!";
  }
}
</script>

exit;

}

ob_end_flush;
mysql_close($conn);
?>