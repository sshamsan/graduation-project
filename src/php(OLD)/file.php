<html>
<body>
<?php
// Include the database configuration file
require_once ("../../config.php");
$statusMsg = '';

// File upload path
$targetDir = "C:\Users\lubna\Desktop\CPCS474/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $con->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <!-- <input type="file" name="file"> -->
    <input type="file" name="file" onchange="this.form.submit()" /> 
    <!-- <input type="submit" name="submit" value="Upload">  -->
</form>

<!-- <form id="MyGreatFileUploadForm" action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name ="file" id="MyGreatFileUploadHidedButton" onChange="document.getElementById('MyGreatFileUploadForm').submit();" style="display:none;" />
    <button type="button" Value= "Upload" name="ok" onclick="document.getElementById('MyGreatFileUploadHidedButton').click();">Upload My Great File</button>
</form> -->

<!-- <form method="post" action="upload.php" name="imageform" id="imageform" enctype="multipart/form-data">
Choose File :<input type="file" name="file" id='fileupload'>
</form>

<script>
$(document).ready(function(){
   $('#fileupload').on('change',function(){
      $('#imageform').submit();
   });
});
</script> -->

<?php
// Get images from the database
$query = $con->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>

</body>
</html>


