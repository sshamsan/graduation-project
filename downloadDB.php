<?php
require_once ("../../config.php");
?>
<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$result = mysqli_query($con,"SELECT id, name FROM upload");
if(mysqli_num_rows($result) == 0)
{
echo "Database is empty <br>";
}
else
{
while(list($id, $name) = mysqli_fetch_array($result))
{
?>
<button><a href="download.php?id=<?=$id?>"<?=$name;?>>DOWNLOAD</a></button>
<!-- <a href=http://localhost/graduation-project/src/php/PatientData-Admin.php?id=File</a></button> -->
<?php
}
}

?>
</body>
</html>