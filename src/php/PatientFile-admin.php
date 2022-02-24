<?php
require_once ("../../config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Patients' files</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/PatientFile-admin.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

<?php
if (isset($_POST['ok'])) {
$Name = $_POST['name'];
$Phone_Number = $_POST['phoneno'];
$Gender = $_POST['gender'];
$National_ID = $_POST['natID'];
$Nationality = $_POST['nat'];
$Birthdate = $_POST['bdate'];
$Languages = $_POST['lang'];
$Religion = $_POST['relig'];
$Address = $_POST['address'];
$res;
$res = mysqli_query($con, "INSERT INTO patient (National_ID,Religion, Address,Nationality, Birth_Date,Languages, Gender,Phone_Number,Name)
VALUES ('$National_ID','$Religion','$Address','$Nationality','$Birthdate','$Languages','$Gender','$Phone_Number','$Name')");
if ($res == 1) {
  echo  
  '   
      <script>
      alert("Insertion Sucesssful");
      //window.location.href = "update.php";
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
?>

  <header class="header">
    <img class="jish-logo" src="C:\Users\Rahaf\Desktop\CS\Level10\CPCS499\Front-End\jish logo.png" alt="Jish logo">
    <img class="user-logo circular" src="C:\Users\Rahaf\Desktop\CS\Level10\CPCS499\Front-End\user.png" alt="User logo">
    <h1>Username</h1>
  </header>
  <div class="wrapper">
    <div class="sidebar">
      <ul>
        <li><a href="#"><i class="fas fa-home fa-2x"></i>Home</a></li>
        <li><a href="#"><i class="fas fa-archive fa-2x"></i>Files</a></li>
        <li><a href="#"><i class="fas fa-calendar-alt fa-2x"></i>Calendar</a></li>
        <li><a href="#"><i class="fas fa-bell fa-2x"></i>Notification</a></li>
      </ul>
      <div class="logout">
        <a href="#"><i class="fas fa-sign-out-alt fa-2x"></i></a>
      </div>
    </div>
    <div class="main_content">
      <div class="info">
        <div class="container d-flex flex-wrap justify-content-center">
          <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <!-- <button type="button" class="btn btn-light">New Patient <i class="fas fa-plus"></i></button>-->
            <div class="container">
              <!-- Button to Open the Modal -->
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal">
                New Patient <i class="fas fa-plus"></i></button>

              <!-- The Modal -->
              <div class="modal" id="myModal">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">New Patient</h4><br>
                      <!--<button type="button" class="" data-dismiss="modal">🗙</button>-->
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <h3>Patient Info    123456</h3>
                      <form class="popupwindow" method="post">
                        <input name="name"type="text" placeholder="Name" required pattern="[a-zA-Z]+ [a-zA-Z]*" > <br><br>
                        <input name="phoneno"type="tel" placeholder="Phone Number" required pattern="[0-9]{10}" 
                        title="Phone number should be 10 digits only e.g. 05xxxxxxx"><br><br>
                        <input name="gender"type="text" placeholder="Gender" required pattern="[A-Za-z-]+"><br><br>
                        <input name="natID"type="text" placeholder="National ID" required pattern="[0-9]{10}"><br><br>
                        <input name="nat"type="text" placeholder="Nationality" required pattern="[A-Za-z]+"><br><br>
                        <input name="bdate"type="date" placeholder="Birthdate" ><br><br>
                        <input name="lang"type="text" placeholder="Languages" required pattern="[A-Za-z]+" ><br><br>
                        <input name="relig"type="text" placeholder="Religion" required pattern="[A-Za-z]+"><br><br>
                        <input name="address"type="text" placeholder="Address" required pattern="[A-Za-z]+"><br><br>
                         <!-- Modal footer -->
                         <div class="modal-footer">
                          <button type="submit" name="ok" class="sumbitbutton btn btn-success">Save</button>
                          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                         </div>
                      </form>
                    </div>
                    <!-- Modal footer -->
                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                      <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


          </a>
          <form class="col-12 col-lg-auto mb-3 mb-lg-4">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form>
        </div>

        <div class="row">
          <?php
              $result = mysqli_query($con,"SELECT * FROM patient");
              while ($row = mysqli_fetch_array($result)) {        
          ?>
          <div class="pricing-column col-lg-2 col-md-2">
            <div class="card">
              <div class="card-header">
                <h3><?= $row['Name'] ?></h3>
              </div>
              <div class="card-body">
                <h2 class="price-text"><i class="far fa-folder-open"></i></h2>
                <p><?=$row['File_Number'] ?></p>
                <p><?= $row['Birth_Date'] ?></p>
                <!-- <button name ="ShowFile" type="submit" form="myForm" class="btn btn-outline-secondary" method="post">Show File</button> -->
                <!-- <form action="" method = "GET"  id="myForm">                      -->
                <button type="submit" name='id'  class="sumbitbutton btn btn-success"><a style="color: black; text-decoration: none;" href=http://localhost/graduation-project/src/php/PatientData-Admin.php?id=<?=$row['File_Number'] ?>>Show File</a></button>
                <!-- </form> -->
              
              </div>
            </div>
          </div>
          
          <?php
    }
    // ?>
    </div>
          </body>