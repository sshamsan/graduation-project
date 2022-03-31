<?php
require_once ("../../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Patient Files
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href='../css/PatientFile-admin.css'>

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
                <a href="HomeScreen.php" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item active">
                <a href="./PatientFile-admin.php"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./Calendarscreen.html"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-bell fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="Settings.php"><i class="fas fa-gear fa-2x"></i></a>
            </li>
        </ul>

    </div>


    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">
        <div class="container d-flex flex-wrap justify-content-center">
            <a class="d-flex align-items-right mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
              <div class="container">
                <!-- Button to Open the Modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    New File <i class="fas fa-plus"></i></button>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h3 class="modal-title"><strong>New File</strong></h3>
                    <button type="button" class="btn" data-dismiss="modal"><i
                            class="fas fa-close fa-2x"></i></button>
                    </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                       <pre><h3><strong>Patient Info</strong> </h3></pre> 
                        <form class="popupwindow"method="post">
                          <!--<label><h4><strong>Patient name</strong></h4></label><br>-->
                          <input name="name" class="inputb" type="text" placeholder="   Name"required pattern="[a-zA-Z]+ [a-zA-Z]*"><br><br>
                          <input name="phoneno" class="inputb"type="text" placeholder="   Phone Number"required pattern="[0-9]{10}" 
                        title="Phone number should be 10 digits only e.g. 05xxxxxxx"><br><br>
                          <select name="gender" class="form-select" aria-label="Default select example">
                            <option value="" disabled selected hidden>Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br>
                          <input name="natID" class="inputb" type="text" placeholder="   National ID" required pattern="[0-9]{10}"><br>
                          <label><h4><strong></strong></h4></label><br>
                          <select name="nat" class="form-select" aria-label="Default select example">
                            <option value="" disabled selected hidden>Choose Nationality</option>
                            <option value="Saudi">Saudi</option>
                            <option value="Non-Saudi">Non-Saudi</option>
                        </select><br>
                          <select name="lang"class="form-select" aria-label="Default select example">
                            <option value="" disabled selected hidden>Choose Languages</option>
                            <option value="Arabic">Arabic</option>
                            <option value="English">English</option>
                        </select><br>
                          <!-- <input type="date" placeholder=" Birthdate"><br><br> -->
                          <input name="bdate" class="inputdate inputb" type="text" placeholder="   Birthdate" 
                            onfocus="(this.type='date')"
                             onblur="(this.type='text')">
      
                          <select name="relig" class="form-select" aria-label="Default select example">
                            <option value="" disabled selected hidden>Choose Religion</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Non-Muslim">Non-Muslim</option>
                        </select><br>
                          <input   name="address" class="inputb" type="text" placeholder="   Address"><br><br>
                          <!-- Modal footer -->
                          <div class="modal-footer">
                        <button type="submit" name="ok"class="btn btn-primary flex-grow-1"
                        >Save</button>
                      </div>
                        </form>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            </a>
          
            <form class="search" method="post">
                <input type="search" name="searchID" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
        </div>
        <div class="row">
        <?php
              if(!empty($_POST['searchID'])) {
              $id=$_POST['searchID'];
              $result = mysqli_query($con,"SELECT * FROM patient where File_Number='$id' ");
              
              while ($row = mysqli_fetch_array($result)) {   
          ?>
          <div class="pricing-column col-lg-4 col-md-2">
            <div class="card">
              <div class="card-header">
                <h4><?= $row['Name'] ?></h4>
              </div>
              <div class="card-body">
                <h2 class="price-text"><i class="far fa-folder-open"></i></h2>
                <p><?=$row['File_Number'] ?></p>
                <p><?= $row['Birth_Date'] ?></p>
                <button type="submit" name='id' class="btn btn-primary flex-grow-1"><a style="color: black; text-decoration: none;" href=http://localhost/graduation-project/src/php/PatientData-therapist.php?id=<?=$row['File_Number'] ?>>Show File</a></button>
              </div>             
            </div>
          </div>
          <?php
    }
  }else{
    ?>
            <div class="row">
        <?php
              $result = mysqli_query($con,"SELECT * FROM patient");
              while ($row = mysqli_fetch_array($result)) {        
        ?>
          <div class="pricing-column col-lg-4 col-md-2">
            <div class="card">
              <div class="card-header">
                <h4><?= $row['Name'] ?></h4>
              </div>
              <div class="card-body">
                <h2 class="price-text"><i class="far fa-folder-open"></i></h2>
                <p><?=$row['File_Number'] ?></p>
                <p><?= $row['Birth_Date'] ?></p>
                <button type="submit" name='id' class="btn btn-primary flex-grow-1"><a style="color: black; text-decoration: none;" href=http://localhost/graduation-project-1/src/php/PatientData-therapist.php?id=<?=$row['File_Number'] ?>>Show File</a></button>
              </div>             
            </div>
          </div>
          <?php
    }
  }
    // ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
</body>

</html>
