<?php
require_once ("../../config.php");

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

// if(!get_magic_quotes_gpc())
//{
    $fileName = addslashes($fileName);
// }
//include 'library/config.php';
//include 'library/opendb.php';

$query= mysqli_query($con,"INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')");

//mysqli_query($query) or die('Error, query failed');
//include 'library/closedb.php';

echo "<br>File $fileName uploaded<br>";
}

// $filePointer = fopen($_FILES['fileUpload']['tmp_name'], 'r');
// $fileData = fread($filePointer, filesize($_FILES['fileUpload']['tmp_name']));
// $fileData = addslashes($fileData);
// $sql = "INSERT INTO files (filename, mimetype, data) VALUES( $fileName, $fileType, $fileData )";

?>

<!-- <html>
<form method="post" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr>
<td width="246">
<!-- <input type="hidden" name="MAX_FILE_SIZE" value="2000000"> 
<input name="userfile" type="file" id="userfile">
</td>
<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
</form>
</html> -->