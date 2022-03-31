<?php
require_once ("../../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Setting
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Setting.css">

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
 
// create function for generate random password
function generate_password($len = 8){
 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 $password = substr( str_shuffle( $chars ), 0, $len );
 return $password;
}

// Output: Your password is: 4GQnHTN8

if (isset($_POST['Emp'])) {
$Name = $_POST['name'];
$Emp_email = $_POST['Emp_email'];
$role = $_POST['role'];
$specilization   = $_POST['specialization'];
$Dep_ID   = '11';
$password = generate_password();
//$encpt_password= password_hash($password, PASSWORD_DEFAULT ); // using this now
$encpt_password= sha1($password);
$Hired_Date= date('Y-m-d H:i:s');
$res;
$res = mysqli_query($con, "INSERT INTO employee (Name , Role , Specialization,password,Hired_date,Department_ID,employee_email)
VALUES ('$Name','$role','$specilization','$encpt_password','$Hired_Date','$Dep_ID','$Emp_email') ");
if ($res == 1) {
    
    // $posted_data = var_export($password,true);
    // $message = '
    // <h4> Your password is  </h4>
    // <p>plah plah plah</p>
    // <pre>
    // '.$posted_data.'
    // </pre>
    // ';
    // mail('lubnasah@gmail.com', 'Export of the Posted Data', $message);
    echo "Your Password Is : ".$password;
  echo  
  '   
      <script>
      alert("Employee Added Sucessuflly");
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


if(isset($_POST["remove"])){
    mysqli_query($con,"DELETE FROM `employee` WHERE Employee_ID='{$_POST['remove']}'");
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
                <a href="./Homescreen.php" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./PatientFile-Admin.php"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./Calendarscreen.php"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-bell fa-2x"></i></a>
            </li>
            <li class="nav-item active">
                <a href="#"><i class="fa fa-gear fa-2x" style="font-size:24px"></i></a>
            </li>
        </ul>
    </div>
    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">
        <div id="new"class="container d-flex flex-wrap justify-content-center">
            <h4 class="Font"><strong>Company User</strong></h4>
            <a class="d-flex align-items-right mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
              <div class="container">
                <!-- Button to Open the Modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    New User <i class="fas fa-plus"></i></button>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h3 class="modal-title"><strong>New User</strong></h3>
                    <button type="button" class="btn" data-dismiss="modal"><i
                            class="fas fa-close fa-2x"></i></button>
                    </div>
                      <!-- Modal body -->
                    <div class="modal-body">
                        <h3>User Info</h3>
                    <form class="popupwindow"method="post">
                        <input name="name" class ="inputb" type="text" placeholder="   Name">
                        <input   name="Emp_email" class ="inputb" type="text" placeholder="   Email">
                        <select class="form-select" aria-label="Default select example">
                            <option value="" disabled selected hidden>Employee role</option>
                            <option value="Admin">Admin</option>
                            <option value="Front-desk Worker">Front-desk Worker</option>
                            <option value="Therapist">Therapist</option>
                        </select>
                        <input name="specialization" class ="inputb inputbottom" type="text" placeholder="   Specialization">
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button name="Emp" type="submit" class="btn btn-primary flex-grow-1"
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
          </div>
        <!-- <pre class="tab"><strong>      Name                ID                Role </strong></pre>
        <div class="Cointainer">
            <pre><h4>  <?=$row['Name'] ?>           <?=$row['Employee_ID'] ?>            <?=$row['Role'] ?>          
            <button type="button" class="btn btn-danger " data-dismiss="modal"><strong>Remove</strong></button></pre></h4>

        </div>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>


            <!-- Appointments Table -->
            <div class="table-responsive">

                <table class="table center">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">ID</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM employee");
                        $rows=mysqli_num_rows ( $result ); 
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Employee_ID'] ?></td>
                            <td><?= $row['Role'] ?></td>
                            <form method="post">
                            <td><button name="remove" value="<?=$row['Employee_ID']?>" type="submit" class="btn btn-danger" onclick="Ask()"><strong>Remove</strong></button></pre></h4>
                            </form>
                        <script>
                        </script>
                        </tr>
                        <?php
                        }
                        ?>
                        <script>
                        function Ask() {
                            if (confirm('Are you sure you want to remove this employee?')) {
                            // Save it!
                            echo('The employee was removed.');
                           } 
                        }
                        </script>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</body>

</html>