<?php
require_once ("../../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Home Screen
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href='../css/Homescreen.css'>

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
if (isset($_POST['Intake'])) {
$Name = $_POST['patientname'];
$Phone_Number = $_POST['phoneno'];
$Therapist = $_POST['therapist'];
// is there a better way to fetch the id???
$result = mysqli_query($con,"SELECT * FROM employee WHERE name = '$Therapist' ");
$rows=mysqli_fetch_array($result);
$empid=$rows['Employee_ID']; 
//------------------------------------  
$ConsultDate = $_POST['date'];
$Ttime = $_POST['time'];
$res;
$res = mysqli_query($con, "INSERT INTO intake_appointments (patient_Name , Phone_Number, Therapist_ID , Consult_Date,Consult_Time)
VALUES ('$Name','$Phone_Number','$empid','$ConsultDate','$Ttime') ");
if ($res == 1) {
  echo  
  '  
      <script>
      alert("Consult Appointment Booked Sucesssfully");
      </script>
      ';

  } else {
      echo '
          <script>
          alert("Insertion Unucesssful");
          </script>
          ';
  }
}     

if (isset($_POST['Appointment'])) {
$Patient = $_POST['patient'];
$Therapist = $_POST['therapist'];
$Date = $_POST['date'];
$Time = $_POST['time'];
$Type = $_POST['type'];
$Payment_Status = 'unpaid';
$file_num = '111';
$emp_id = '102';
$res;
print_r( $_POST['time']);
$res = mysqli_query($con, "INSERT INTO appointment (Therapist_Name , Payment_Status, Appointment_Time, Appointment_Date, file_number,employee_id,Type)
VALUES ('$Therapist','$Payment_Status','$Time','$Date','$file_num','$emp_id','$Type')");
if ($res == 1) {
  echo  
  '   
      <script>
      alert("Appointment Booked Sucesssfully");
      </script>
      ';

  } else {
      echo '
          <script>
          alert("Insertion Unuscesssful");
          </script>
          ';
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
            <li class="nav-item active" id="myDIV">
                <a href="#" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./PatientFile-admin.php"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./Calendarscreen.php"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./Setting.php"><i class="fas fa-bell fa-2x"></i></a>
            </li>
        </ul>

    </div>


    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">

        <div class="cointainer" style="padding-right: 300px; padding-left: 300px; padding-top: 20px;">

            <div class="widgets d-flex flex-column">
                 <?php
                    $result = mysqli_query($con,"SELECT * FROM appointment WHERE Appointment_Date = CURDATE()");
                    $rows=mysqli_num_rows ( $result );    
                 ?>
                <div> 
                    <button type="button" class="btn btn-success">Total Appointments: <?= $rows ?></button>
                </div>
                <?php
                    $newresult = mysqli_query($con,"SELECT * FROM appointment WHERE Appointment_Date = CURDATE() and status='Canceled' OR status='No_Show'");
                    $rows=mysqli_num_rows ( $newresult );     
                 ?>
                <div>
                    <button type="button" class="btn btn-danger">Total no-shows: <?= $rows ?></button>

                </div>
            </div>

            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h2>Today's Appointments</h2>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newAppt">New
                        Appointment <i class="fa fa-plus"></i></button>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newIntake">New
                        Intake <i class="fa fa-plus base"></i></button>
                </div>
            </div>


            <!-- New Appointment Modal -->
            <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <div class="modal" id="newAppt">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">New Appointment</h4>
                                <button type="button" class="btn" data-dismiss="modal"><i
                                        class="fas fa-close fa-2x"></i></button>
                            </div>
                            <div class="modal-body">
                                <form class="popupwindow d-flex flex-column" method="post">
                                    <select name="patient" class="form-select" aria-label="Default select example">
                                    <option value="" disabled selected hidden>Choose Patient</option>
                                    <?php
                                        $records = mysqli_query($con,"SELECT Name, File_Number FROM patient");
                                        while ($row = mysqli_fetch_array($records)){
                                            echo "<option value=\"". $row['Name'] ."\">". $row['Name'] ."</option>";                                            
                                           // echo "<option value=\"\">" . $row['Name'] ." ". $row['File_Number'] ."</option>";
                                        }
                                    ?>
                                    </select>    
                                <!-- <input name ="patient" class="form-control" type="text" placeholder="Patient"> -->
                                    <select name="therapist" class="form-select" aria-label="Default select example">
                                    <option value="" disabled selected hidden>Choose Therapist</option>
                                    <?php
                                        $records = mysqli_query($con,"SELECT Name FROM employee WHERE Role = 'Therapist' ");
                                        while ($row = mysqli_fetch_array($records)){
                                            echo "<option value=\"". $row['Name'] ."\">". $row['Name'] ."</option>";
                                        }
                                    ?>
                                    </select>
                                    <input name="date" class="form-control" type="date" placeholder="Date">
                                    <input name="time" class="form-control" type="time" min="08:00" max="17:00"placeholder="Time" >
                                    <select name="type" class="form-select" aria-label="Default select example">
                                        <option value="" disabled selected hidden>Choose Appointment Type</option>
                                        <option value="DX">DX (Diagnosis Session)</option>
                                        <option value="TX">TX (Treatment Session)</option>
                                    </select>
                                    <div class="modal-footer d-flex">
                                        <button name ="Appointment" type="submit" class="btn btn-primary flex-grow-1"
                                        >Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            </a>
            <!-- END of New Appointment Modal -->

            <!-- New Intake Modal-->
            <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <div class="modal" id="newIntake">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">New Intake</h4>
                                <button type="button" class="btn" data-dismiss="modal"><i
                                        class="fas fa-close fa-2x"></i></button>
                            </div>
                            <div class="modal-body">
                                <form class="popupwindow" method="post">
                                    <input name="patientname"class="form-control" type="text" placeholder="Name">
                                    <input name="phoneno"class="form-control" type="text" placeholder="Phone Number">
                                    <select name="therapist" class="form-select" aria-label="Default select example">
                                    <option value="" disabled selected hidden>Choose Therapist</option>
                                    <?php
                                        $records = mysqli_query($con,"SELECT Name FROM employee WHERE Role = 'Therapist' ");
                                        while ($row = mysqli_fetch_array($records)){
                                            echo "<option value=\"". $row['Name'] ."\">". $row['Name'] ."</option>";
                                        }
                                    ?>
                                    </select>
                                    <input name="date" class="form-control" type="date" placeholder="Date">
                                    <input name="time" class="form-control" type="time" min="08:00" max="17:00"placeholder="Time">

                            <!-- Modal footer -->
                                 <div class="modal-footer d-flex">
                                     <button name="Intake" type="submit" class="flex-grow-1 btn btn-primary"
                                        >Save</button>
                                 </div>                                
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            </a>
            <!-- END of New Intake Modal-->



            <!-- Appointments Table -->
            <div class="table-responsive">

                <table class="table center">
                    <thead>
                        <tr>
                            <th scope="col">Patient</th>
                            <th scope="col">Therapist</th>
                            <th scope="col">Visit</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?= $row['file_number'] ?></td>
                            <td><?= $row['Therapist_Name'] ?></td>
                            <td>DX</td>
                            <td><?= $row['Appointment_Time'] ?></td>
                            <td><?= $row['status'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>