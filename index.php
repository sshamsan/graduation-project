<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html>

<head>

    <title>
        Login
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href='src/css/Login.css'>
</head>

  <body class="auth-screen">
  <?php
    $username = $password = '';
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
       // $pass=password_verify($_POST['password']);//should we use this?
        $qry1 = mysqli_query($con, "SELECT * FROM employee WHERE Employee_ID='$username' and Password='$password'") or die(mysqli_error($con));
        $qry2 = mysqli_num_rows($qry1);
        if ($qry2) {
            $row = mysqli_fetch_array($qry1);
            // $_SESSION['log'] = $row;
            
            if($row['Role']=='admin')
            $_SESSION['log1'] = "admin";
            elseif($row['Role']=='FDworker')
            $_SESSION['log1'] = "FDworker";
            else
            $_SESSION['log1'] = "therapist";
            echo'           
            <script>
            window.location.href = "src/php/Homescreen.php";
            </script>';
        // $json_data['url'] = $ST['site_url'].'/home';
        //print_r($row['log1']);
        } else {
          echo '
      <script>
        alert("Wrong Email ID or Password");
      </script>
      ';
      }
    } 
    ?>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

        <br>
        <br>
        <br>
        <br>
        <div>
            <img class="logo" src="src/images/logo.png" alt="Jish logo">
        </div>
        <br>
        <br>
        <br>

        <form method="post">
            <div class="d-flex flex-column" style="justify-content: center; align-items: center;">
                <div class="mb-3">
                    <label class="form-label" style="color: white;">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="username">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: white;">Password</label>
                    <input name="password"type="password" class="form-control" placeholder="password">
                </div>

                <!-- Change button type to submit -->
                <a href="src/php/Homescreen.php"><button name="login" type="submit" class="btn btn-primary mb-3">
                        LOGIN </button></a>
            </div>
        </form>
        <a style="align-self: flex-start;" href="src/html/ResetPassword.php">Forgot your password?</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

