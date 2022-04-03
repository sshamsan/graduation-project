<?php
require("../../config.php");

?>
<?php
$result = mysqli_query($con,"SELECT * FROM patient WHERE file_number ='{$_GET['id']}'");
$row = mysqli_fetch_array($result);    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Patients' Files
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href='../css/PatientData-Therapist.css'>


</head>

<body>

<?php
// Insert Consult Report to DB
    if(isset($_POST["Consultbutton"])){
        $Suspected= implode(",",$_POST["Suspected"]);
        $disorder=implode(",",$_POST["disorder"]);
        $Rec=implode(",",$_POST["Rec"]);
        $newvalues= $Suspected.",".$disorder.",".$Rec;
        //print_r($consultarr);
        $file_num = $_GET['id'];
        $therapist='therapist1';
        $Type='Consult';
        //$newvalues=  implode(",",$disorder,$Rec);
        $checkEntries = mysqli_query($con,"SELECT * FROM reports WHERE File_Number='$file_num' AND Type='$Type' ");
        if(mysqli_num_rows($checkEntries) == 0){
            $res = mysqli_query($con, "INSERT INTO reports (File_Number, Report_Recommandation, therapist_name, Type)
            VALUES ('$file_num','$newvalues','$therapist','$Type')");
            
            echo ' <script> alert("Report Saved Sucesssfully"); </script>';

        }elseif(mysqli_num_rows($checkEntries) != 0){
          mysqli_query($con,"UPDATE reports SET Report_Recommandation='".$newvalues."' WHERE File_Number='$file_num' AND Type='$Type' ");
          
          echo ' <script> alert("Report Updated Sucesssfully"); </script>  ';
        }
        else {
            echo ' <script> alert("Insertion Unuscesssful"); </script>';
        }
    }
// Insert Pysch Report to DB
    if(isset($_POST["PsychButton"])){
        $psycharr=$_POST["Psych"];
        $file_num =$_GET['id']; ;
        $therapist='therapist1';
        $Type='Psychology';//take type from visit in treatment session
        $newvalues=  implode(",", $psycharr);
        $textareaValue = trim($_POST['PsychNote']);
        $newvalues=$newvalues." ".$textareaValue;
        $checkEntries = mysqli_query($con,"SELECT * FROM reports WHERE File_Number='$file_num' AND Type='$Type' ");
        if(mysqli_num_rows($checkEntries) == 0){
            $res = mysqli_query($con, "INSERT INTO reports (File_Number, Report_Recommandation, therapist_name, Type)
            VALUES ('$file_num','$newvalues','$therapist','$Type')");
            
            echo  ' <script> alert("Report Saved Sucesssfully"); </script> ';
        }elseif(mysqli_num_rows($checkEntries) != 0){
          mysqli_query($con,"UPDATE reports SET Report_Recommandation='".$newvalues."' WHERE File_Number='$file_num' AND Type='$Type'");
         
          echo '<script> alert("Report Updated Sucesssfully"); </script> ';
        }
        else {
            echo '<script> alert("Insertion Unuscesssful"); </script> ';
        }
    }

// UPLOAD REPORT
if(!empty($_FILES["userfile"]["size"]))
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$file_num = $_GET['id'];
$uploaded_date=date('Y-m-d H:i:s');
$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

$fileName = addslashes($fileName);
$query= mysqli_query($con,"INSERT INTO upload (name, size, type, content, uploaded_date,file_number) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content','$uploaded_date','$file_num')");

echo "<br>File $fileName uploaded<br>";
echo ' <script> alert("File $fileName uploaded"); </script>';

}

// update record
if (isset($_POST['save'])) {
   // echo 'ENTERED';
    $file_num = $_GET['id'];
$sql = "UPDATE patient 
        SET National_ID='{$_POST['National_ID']}' 
        , Gender='{$_POST['Gender']}'
        , Birth_Date='{$_POST['Birth_Date']}'
        , Phone_Number='{$_POST['Phone_Number']}'
        , Address='{$_POST['PAddress']}'
        WHERE file_number=$file_num";
if ($con->query($sql) === TRUE) {
    echo "Record updated successfully"; // change to script
  } else {
    echo "Error updating record: " . $con->error;
  }
}

?>
    <header class="header">
        <div class="header-right">
            <div class="dropdown">
                <!-- User Info -->
                <div class="user-info d-flex flex-row dropdown-toggle" type="button" id="dropdownMenu2"
                    data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    <h5 class="user-info" style="color: azure;">Username</h5>
                    <i class="fa fa-user user-info" style="color: azure;"></i>
                </div>

                <!-- Drop down menu -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><button class="dropdown-item" type="submit"><?php session_destroy(); ?><a href="../../index.php">Log out</a></button></li>
                </ul>
            </div>
        </div>
    </header>

    <!------ ALL MODALS ------>
    <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">

        <!-- Session Report -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">New Report</h4>
                        <button type="button" class="btn" data-dismiss="modal"><i
                                class="fas fa-close fa-2x"></i></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="popupwindow">
                            <label><strong>Report Type</strong></label><br>
                            <select class="form-select" aria-label="Default select example">
                                <option value="Consult">Consult</option>
                                <option value="DX">DX</option>
                                <option value="TX">TX</option>
                            </select>
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary flex-grow-1" data-dismiss="modal"
                            data-toggle="modal" data-target="#ConsultReport">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- DX Report -->
        <div class="modal" id="DxReport">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">DX Report</h4>
                        <button type="button" class="btn" data-dismiss="modal"><i
                                class="fas fa-close fa-2x"></i></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">


                        <form class="popupwindow">

                            DX REPORT INFO HERE
                            <!-- <label><strong>Report Type</strong></label><br>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">DX</option>
                                <option value="2">TX</option>
                            </select> -->
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary flex-grow-1" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

 <!-- ############################################################################################### -->
        <!-- Consult Report -->
   
        <div class="modal" id="ConsultReport">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Consult Report</h4>
                        <button type="button" class="btn" data-dismiss="modal"><i
                                class="fas fa-close fa-2x"></i></button>
                    </div>
                    <!-- Modal body -->
                <div class="modal-body">
                 <form method="post">
                        <!-- <form class="popupwindow"> -->
                        <h6>Suspected Area</h6>
                        <div class="form-check">
                            <input name="Suspected[]" class="form-check-input" type="checkbox" value="Fluency" id="Fluency">
                            <label class="form-check-label" for="">
                                Fluency
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Suspected[]" class="form-check-input" type="checkbox" value="Voice" id="Voice">
                            <label class="form-check-label" for="">
                                Voice
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Suspected[]" class="form-check-input" type="checkbox" value="Articulation" id="Articulation">
                            <label class="form-check-label" for="">
                                Articulation
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Suspected[]" class="form-check-input" type="checkbox" value="Language" id="Language">
                            <label class="form-check-label" for="">
                                Language
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Suspected[]" class="form-check-input" type="checkbox" value="Behavior" id="Behavior">
                            <label class="form-check-label" for="">
                                Behavior
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Suspected[]" class="form-check-input" type="checkbox" value="Swallowing" id="Swallowing">
                            <label class="form-check-label" for="">
                                Swallowing
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Suspected[]" class="form-check-input" type="checkbox" value="Feeding" id="Feeding">
                            <label class="form-check-label" for="">
                                Feeding
                            </label>
                        </div>

                        <br>
                        <h6>Other disorder</h6>
                        <div class="form-check">
                            <input name="disorder[]" class="form-check-input" type="checkbox" value="Hearing" id="Hearing">
                            <label class="form-check-label" for="">
                                Hearing
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="disorder[]" class="form-check-input" type="checkbox" value="CP" id="CP">
                            <label class="form-check-label" for="">
                                CP
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="disorder[]" class="form-check-input" type="checkbox" value="Syndromic" id="Syndromic">
                            <label class="form-check-label" for="">
                                Syndromic
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="disorder[]" class="form-check-input" type="checkbox" value="Neurogenic (Aphasia)" id="Neurogenic (Aphasia)">
                            <label class="form-check-label" for="">
                                Neurogenic (Aphasia)
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="disorder[]" class="form-check-input" type="checkbox" value="ASD" id="ASD">
                            <label class="form-check-label" for="">
                                ASD
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="disorder[]" class="form-check-input" type="checkbox" value="ADD/ADHD" id="ADD/ADHD">
                            <label class="form-check-label" for="">
                                ADD/ADHD
                            </label>
                        </div>
                        <br>
                        <h6>Reccomendation</h6>
                        <select name="Rec[]" class="form-select">
                            <option id="ABA" value="ABA">ABA</option>
                            <option id="EI DX" value="EI DX Early Intervention - 180 mins">EI DX Early Intervention - 180 mins </option>
                            <option id="English DX" value="English DX (90 mins each session) / Bilingual (2 hours + 1 hour)">English DX (90 mins each session) / Bilingual (2 hours + 1 hour) </option>
                            <option id="Nuerogenic" value="Nuerogenic (90 mins each session)">Nuerogenic (90 mins each session)</option>
                            <option id="Speach" value="Speach language delay - 120 mins">Speach language delay - 120 mins</option>
                            <option id="ADHD/ASD/ADD" value="ADHD/ASD/ADD - 120 mins ">ADHD/ASD/ADD - 120 mins </option>
                            <option id="Aural" value="Aural Rehab - 120 mins">Aural Rehab - 120 mins</option>
                            <option id="Feeding" value="Feeding DX - 120 mins">Feeding DX - 120 mins</option>
                            <option id="SLP" value="SLP - 90 mins">SLP - 90 mins</option>
                            <option id="EI" value="EI Continuation DX - 60 mins">EI Continuation DX - 60 mins</option>
                            <option id="Fluency" value="Fluency/Voice/Articulation - 60 mins">Fluency/Voice/Articulation - 60 mins</option>
                            <option id="Artic" value="Artic - 30 mins">Artic - 30 mins</option>
                            <option id="School" value="School Readiness Test - 30 mins">School Readiness Test - 30 mins</option>
                        </select>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="Consultbutton" type="submit" class="btn btn-primary flex-grow-1">Save</button>
                    </div>
                </div>
            </form> 
            </div>
        </div>

<!-- ################################################################################################### -->
        <!-- Psych Report -->
        
        <div class="modal" id="PsychReport">
        <form method="post">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Psychology Report</h4>
                        <button type="button" class="btn" data-dismiss="modal"><i
                                class="fas fa-close fa-2x"></i></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <h6>Service Description</h6>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Psychology Intake" id="Psychology Intake">
                            <label class="form-check-label" for="">
                                Psychology Intake
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="IQ Assesment: Stanford Binnet test" id="IQ Assesment: Stanford Binnet test">
                            <label class="form-check-label" for="">
                                IQ Assesment: Stanford Binnet test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="IQ Assesment: Wechsler test" id="Wechsler test">
                            <label class="form-check-label" for="">
                                IQ Assesment: Wechsler test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Social Maturity Scale" id="Social Maturity Scale">
                            <label class="form-check-label" for="">
                                Social Maturity Scale
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="IQ Picture test" id="Picture test">
                            <label class="form-check-label" for="">
                                IQ Picture test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="ADHD Test" id="ADHD Test">
                            <label class="form-check-label" for="">
                                ADHD Test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Autism Test" id="Autism Test">
                            <label class="form-check-label" for="">
                                Autism Test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Anxity and stress Test" id="Anxity and stress Test">
                            <label class="form-check-label" for="">
                                Anxity and stress Test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Depression Test" id="Depression Test">
                            <label class="form-check-label" for="">
                                Depression Test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Social phobia Test" id="Social phobia Test">
                            <label class="form-check-label" for="">
                                Social phobia Test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="OCD Test / Brown OCD Scale" id="OCD Test / Brown OCD Scale">
                            <label class="form-check-label" for="">
                                OCD Test / Brown OCD Scale
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Self-esteem test" id="Self-esteem test">
                            <label class="form-check-label" for="">
                                Self-esteem test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Multiple personality test" id="Multiple personality test">
                            <label class="form-check-label" for="">
                                Multiple personality test
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Eysenck personality questionnaire" id="Eysenck">
                            <label class="form-check-label" for="">
                                Eysenck personality questionnaire
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Psych[]" class="form-check-input" type="checkbox" value="Psychotherapy" id="Psychotherapy">
                            <label class="form-check-label" for="">
                                Psychotherapy
                            </label>
                        </div>

                        <br>
                        <h6>Psychology Notes</h6>
                        <!-- <textarea rows="4" cols="50" name="Psych[]" id="Psychology Notes"></textarea> -->
                        <textarea name="PsychNote">
                         <?php echo isset($_POST['PsychNote']) ? htmlspecialchars($_POST['PsychNote'], ENT_QUOTES) : ''; ?>
                        </textarea>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="PsychButton" type="submit" class="btn btn-primary flex-grow-1">Save</button>
                    </div>
                </form> 
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </a>


    <!-- Navigation Bar part in Screen -->
    <div class="sidenav">
        <ul class="nav flex-column">

            <!-- LOGO -->
            <li class="nav-item logo">
                <img class="logo" src="../images/logo.png" alt="Jish logo">
            </li>

            <!-- NAVIGATION BAR BUTTONS -->
            <li class="nav-item " id="myDIV">
                <a href="Homescreen.php" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item active">
                <a href="./PatientFile-admin.php"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="Calendarscreen.php"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-bell fa-2x"></i></a>
            </li>
            <?php if($_SESSION['log1']=='Admin'){?>
            <li class="nav-item">
                <a href="Settings.php"><i class="fas fa-gear fa-2x"></i></a>
            </li>
            <?php } ?>
        </ul> 

    </div>


    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">
        <div class="container d-flex flex-wrap justify-content-center">

            <div class="row">
            <?php  
               $result = mysqli_query($con,"SELECT * FROM patient WHERE file_number ='{$_GET['id']}'");
               $row = mysqli_fetch_array($result);    
            ?>
                <div class="pricing-column col-lg-4 col-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3><strong><?= $row['Name'] ?></strong></h3>
                            <p><strong><?= $row['File_Number'] ?></strong></p>
                            <form method="post">
                                
                        </div>
                        
                        <div class="card-body">
                            <!-- <h8><strong>Payment Status</strong></h8><br>
                            <h9>Complete</h9><br><br> -->
                            <h8><strong>National ID</strong></h8><br>
                            <input name="National_ID" type ="text" id="National_ID" value="<?= $row['National_ID'] ?>" disabled> <br><br>
                            <h8><strong>Gender</strong></h8><br>
                            <input name="Gender" type ="text" id="Gender" value="<?= $row['Gender'] ?>" disabled> <br><br>
                            <h8><strong>Date of birth</strong></h8><br>
                            <input name="Birth_Date" type ="date" id="Birth_Date" value="<?= $row['Birth_Date'] ?>" disabled> <br><br>
                            <h8><strong>Phone Number</strong></h8><br>
                            <input name="Phone_Number" type ="text" id="Phone_Number" value="<?= $row['Phone_Number'] ?>" disabled> <br><br>
                            <h8><strong>Email</strong></h8><br>
                            <h9>test123@gmail.com</h9><br><br>
                            <h8><strong>Address</strong></h8><br>
                            <input name="PAddress" type ="text" id="PAddress" value="<?= $row['Address'] ?>" disabled> <br><br>
                        </div>
                        <?php// if($_SESSION['log1']=='Admin' || $_SESSION['log1']=='FDWorker'){?>
                        <div>
                        <button type="button" class="btn btn-primary flex-grow-1"
                                onclick="toggle()">Edit</button>
                            <button name="save" type="submit" class="btn btn-primary flex-grow-1"
                                >Save</button>
                        </div>
                        <?php //} ?>
                        </form>
                        <script>
                        function toggle() {
                             document.getElementById("National_ID").disabled = !document.getElementById("National_ID").disabled;
                             document.getElementById("Gender").disabled = !document.getElementById("Gender").disabled;
                             document.getElementById("Birth_Date").disabled = !document.getElementById("Birth_Date").disabled;
                             document.getElementById("Phone_Number").disabled = !document.getElementById("Phone_Number").disabled;
                             document.getElementById("PAddress").disabled = !document.getElementById("PAddress").disabled;
                        }

                        </script>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <pre class="tab"><strong>    Date                    Therapist                 Visit</strong></pre>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <?php  
                            $result = mysqli_query($con,"SELECT * FROM appointment WHERE file_number ='{$_GET['id']}'");
                            $row = mysqli_fetch_array($result);  
                        ?>
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                                <pre
                                    class="tab"> <?php echo $row['Appointment_Date'];?>                       <?php print $row['Therapist_Name'];?>             <?php print $row['type'];?></pre>
                            </button>
                            
                            <!-- OUTPUT DATA FROM DB -->
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong></strong>
                                <?php //if($_SESSION['log1']=='Therapist'){?>
                                <form  method="post" enctype="multipart/form-data">
                                    <input name="userfile" type="file" id="actual-btn" onchange="this.form.submit()" hidden/>
                                    <label  for="actual-btn" class="btn btn-primary">Upload Report <i class="fa fa-upload"></i></label>
                                    <!-- <input name="upload" type="submit" class="btn btn-primary" id="upload" value=" Upload "> -->
                                    <?php
                                        $uploaded_date=$row['Appointment_Date'];
                                        ?>
                                        <button class="btn btn-primary"><a id=link  href="download.php?id=<?=$_GET['id']?>&date=<?=$uploaded_date;?>">Download</a></button>                                       
                                        
                                 </form>
                                 <?php //}?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <pre
                                    class="tab"> 11/14/2021                       Huda M.                       Diagnoses</pre>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong></strong>
                                <?php //if($_SESSION['log1']=='Therapist'){?>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#DxReport">
                                    DX Report <i class="fas fa-plus"></i></button>
                                <?php// } ?>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <pre
                                    class="tab"> 11/14/2021                       Huda M.                       Consultaion</pre>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <pre
                                    class="tab"><h6><strong> Suspected Area                            Other Disorder </strong></h6></pre>
                                <h7>
                                    <pre class="tab"> <?php echo $_POST['disorder'] ?>                                None </pre>
                                </h7>
                                <pre
                                    class="tab"><h6><strong> Type of Dx (Reccomendation)                                </strong></h6></pre>
                                <pre class="tab"><h7> Fluency/Voice/Articulation(60 minutes)      </h7></pre>
                                <?php //if($_SESSION['log1']=='Therapist'){?>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#ConsultReport"> Edit Consult Report</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#PsychReport"> Psych Report <i class="fas fa-plus"></i></button>
                                    <?php //} ?>
                            </div>
                        </div>
                    </div>
                </div>



                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                    crossorigin="anonymous">
                </script>
</body>

<!-- this is to keep things in reports checked after refreshing the page -->
<script>
document.addEventListener("DOMContentLoaded", function(){

   var checkbox = document.querySelectorAll("input[type='checkbox']");

   for(var item of checkbox){
      item.addEventListener("click", function(){
         localStorage.s_item ? // verifico se existe localStorage
            localStorage.s_item = localStorage.s_item.indexOf(this.id+",") == -1 // verifico de localStorage contém o id
            ? localStorage.s_item+this.id+"," // não existe. Adiciono a id no loaclStorage
            : localStorage.s_item.replace(this.id+",","") : // já existe, apago do localStorage
         localStorage.s_item = this.id+",";  // não existe. Crio com o id do checkbox
      });
   }

   if(localStorage.s_item){ // verifico se existe localStorage
      for(var item of checkbox){ // existe, percorro as checkbox
         item.checked = localStorage.s_item.indexOf(item.id+",") != -1 ? true : false; // marco true nas ids que existem no localStorage
      }
   }
});
</script>

<script>
$(function() {
    if (localStorage.getItem('Consult[]')) {
        $("#Consult[] option").eq(localStorage.getItem('Consult[]')).prop('selected', true);
    }

    $("#Consult[]").on('change', function() {
        localStorage.setItem('Consult[]', $('option:selected', this).index());
    });
});
</script>


</html>
