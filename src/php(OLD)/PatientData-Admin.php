<?php
require_once ("../../config.php");
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
    <link rel="stylesheet" href='../css/PatientData-Admin.css'>

    <!-- <script>
        function myFunction() {
            var element = document.getElementById("myDIV");
            if (element.classList.contains("active")) {
                element.classList.remove("active")
            } else {
                element.classList.add("active");
            }

        }
    </script> -->


</head>

<body>

<?php
    $filenumber = $_GET['id']; 
if (isset($_POST['ok'])) {
    $Type = $_POST['Type']; 

    $reportrec =$_POST['Type'].'null'; 
    $ther_name = 'HUDA. M'; 
    // check if its DX or TX
    //based on the type switch to the right page
    if($Type=='DX') {
        $type='Diagnosis';
        $res = mysqli_query($con, "INSERT INTO `reports`(file_number, Report_Recommandation, therapist_name,Type) 
        VALUES ('$filenumber','$reportrec','$ther_name','$Type')");// shift it to the new page og the report
        echo  
        '   
            <script>
            alert("DX");
            //window.location.href = "update.php"; INSERT DX PAGE
            </script>
            ';
      
    } else if($Type=='TX') {
        $type='Treatment';
        $res = mysqli_query($con, "INSERT INTO `reports`(file_number, Report_Recommandation, therapist_name,Type) 
        VALUES ('$filenumber','$reportrec','$ther_name','$Type')");
        echo  
        '   
            <script>
            alert("NOPE");
            //window.location.href = "update.php"; INSERT TX PAGE
            </script>
            ';
      
    }
}
if (isset($_POST['save'])) {
    echo 'ENTERED';
$sql = "UPDATE patient SET National_ID='{$_POST['National_ID']}' WHERE file_number=$filenumber";
if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $con->error;
  }
}
    // at the end of the page add the report into the db table report     
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
                    <li><button class="dropdown-item" type="button">Log out</button></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Navigation Bar part in Screen -->
    <div class="sidenav">
        <ul class="nav flex-column">

            <!-- LOGO -->
            <li class="nav-item logo">
                <img class="logo" src="../images/logo.png" alt="Jish logo">
            </li>

            <!-- NAVIGATION BAR BUTTONS -->
            <li class="nav-item " id="myDIV">
                <a href="./Homescreen.php" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item active">
                <a href="#"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./Calendarscreen.php"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-bell fa-2x"></i></a>
            </li>
        </ul>

    </div>


    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">
        <div class="container d-flex flex-wrap justify-content-center">
            <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <!-- <button type="button" class="btn btn-light">New Patient <i class="fas fa-plus"></i></button>-->
                <div class="container">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#myModal">
                        New Report <i class="fas fa-plus"></i></button>
                    <!-- The Modal -->
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
                                    <form class="popupwindow" method="Get">
                                        <? echo print_r($_GET);?>
                                        <label><strong>Report Type</strong></label><br>
                                        <select name="Type" class="form-select" aria-label="Default select example">
                                        <option value="DX">DX</option>
                                        <option value="TX">TX</option>
                                    </select>
                                    </form>
                                    <div class="modal-footer">
                                    <form>
                                    <button name="id" type="submit" class="btn btn-primary flex-grow-1"> <a style="color: black; text-decoration: none;" href=http://localhost/graduation-project-dev/src/php/PatientData-Admin.php?id=<?=$filenumber?>>
                                    Save</a></button>
                                    </form>
                                </div>
                                </div>
                                <!-- Modal footer -->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            </a>

            <div class="row">
            <?php  
               $result = mysqli_query($con,"SELECT * FROM patient WHERE file_number ='{$_GET['id']}'");
               $row = mysqli_fetch_array($result);    
        ?>
        
                <div class="pricing-column col-lg-4 col-md-2" >
                    <div class="card">
                        <div class="card-header">
                            <h3><strong><?= $row['Name'] ?></strong></h3>
                          <button type="button" class="btn btn-primary flex-grow-1"
                                onclick="toggle()">Edit</button>
                                <form method="post">
                                <button name="save" type="submit" class="btn btn-primary flex-grow-1"
                                >Save</button>
                            <p><strong><?= $row['File_Number'] ?></strong></p>
                        </div>
                        <div class="card-body">
                            <h8><strong>Payment Status</strong></h8><br>
                            <h9>Complete</h9><br><br>
                            <h8><strong>National ID</strong></h8><br>
                            <input name="National_ID" type ="text" id="National_ID" value="<?= $row['National_ID'] ?>" disabled> <br><br>
                            <h8><strong>Gender</strong></h8><br></form>
                            <h9><?= $row['Gender'] ?></h9><br><br>
                            <h8><strong>Date of birth</strong></h8><br>
                            <h9><?= $row['Birth_Date'] ?></h9><br><br>
                            <h8><strong>Phone Number</strong></h8><br>
                            <h9><?= $row['Phone_Number'] ?></h9><br><br>
                            <h8><strong>Email</strong></h8><br>
                            <h9>test123@gmail.com</h9><br><br>
                            <h8><strong>City</strong></h8><br>
                            <h9><?= $row['Address'] ?></h9><br><br>
                        </div>
                        <script>
function toggle() {
             document.getElementById("National_ID").disabled = !document.getElementById("National_ID").disabled;
}

                        </script>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <pre
                        class="tab"><strong>    Date                    Therapist                 Visit</strong></pre>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <pre
                                    class="tab">  11/14/2021                       Huda M.                       Session</pre>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong></strong>
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
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <pre
                                    class="tab">  11/14/2021                       Huda M.                       Consultaion</pre>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <pre
                                    class="tab"><h6><strong> Suspected Area                            Other Disorder </strong></h6></pre>
                                <h7>
                                    <pre class="tab"> Fluency                                None </pre>
                                </h7>
                                <pre
                                    class="tab"><h6><strong> Type of Dx                                        </strong></h6></pre>
                                <pre
                                    class="tab"><h7> Fluency/Voice/Articulation(60 minutes)      </h7></pre>
                                <button type="button" class="btn btn-primary flex-grow-1"
                                    data-dismiss="modal">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>