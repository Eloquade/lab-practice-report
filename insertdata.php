<html>
<head>
<title>Insert data php script only</title>
</head>
<body>
<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn)
{
die('could not connect: ' .mysqli_error());
}
if(! get_magic_quotes_gpc() )
{
 $tutorial_title = addslashes ($_POST['tutorial_title']);
 $tutorial_genre = addslashes ($_POST['tutorial_genre']);
}
else
{
 $tutorial_title = $_POST['tutorial_title'];
 $tutorial_genre = $_POST['tutorial_genre'];
}
$length_movie = $_POST['length_movie'];
$sql = "INSERT INTO tutorials_tbl ".
 "(tutorial_title,tutorial_genre, length_movie) ".
 "VALUES ".
 "('$tutorial_title','$tutorial_genre', '$length_movie')";
mysqli_select_db($conn,'TUTORIALS');
$retval = mysqli_query($conn, $sql);
if(! $retval)
{
 die('could not enter data: ' . mysqli_error());
}
echo "Entered data successfully\n";
mysqli_close($conn);
}
else
{
?>
<form method ="post" action="<?php $_PHP_SELF ?>">
<table width ="600"  cellspacing="1" cellpadding="2">
<tr>
<td width="250">Tutorial Title</td>
<td>
<input name ="tutorial_title" type="text" id="tutorial_title">
</td>
</tr>
<tr>
<td width="250">Tutorial Genre</td>
<td>
<input name ="tutorial_genre" type="text" id="tutorial_genre">
</td>
</tr>
<tr>
<td width="250">Length of the Movie </td>
<td>
<input name ="length_movie" type="text" id="length_movie">
</td>
</tr>
<tr>
<td width="250"> </td>
<td> </td>
</tr>
<tr>
<td width="250"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Movie">
</td>
</tr>
</table>
</form>
<?php
}

