<?php
/***CREDENTIALS OF USER ACCOUNT:
 * fullname: Sohayla Ihab 
 * username: sue_hamed / full
 * email: ihabsohaila@example.com
 * pass: example / test2
 * 
 * CREDENTIALS OF ADMIN ACCOUNT:
 * fullname: Smithson
 * username: admin
 * email: admin@rentals.com
 * pass: admin
 */
session_start();
$_SESSION["logged"] = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  ###connect
  include_once("includes/conn.php");
  ###sign up
  if(isset($_POST["signup"])){
    $fullname = $_POST["fullname"];
    $username = $_POST["username2"];
    $email = $_POST["email"];
    #$_SESSION["password"] = $_POST["password"];##just to try
    $pass = password_hash($_POST["password2"], PASSWORD_DEFAULT);
    try{
      $sql = "INSERT INTO `users_table`(`fullname`, `username`, `email`, `password`) VALUES (?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$fullname, $username, $email, $pass]);
      #echo "DATA INSERTED SUCCESSFULLY";
      ##admin index page VS user index page
      header("Location: ./login.php");
      die();
    }catch(PDOException $e){
      header("Location: ./includes/404.php");
      die();
      #echo "FAILED:" . $e->getMessage();
    }
  }
  elseif(isset($_POST["signin"])){
    $pass = $_POST["password"];
    $username = $_POST["username"];
    try{
      $sql = "SELECT `password`, `fullname` FROM `users_table` WHERE `username` = ? AND `active` = 1";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);
      if($stmt->rowCount() > 0){
        #echo "EMAIL FOUND";
        $result = $stmt->fetch();
        $fullname = $result["fullname"];
        #$username = $result["username"];
        $hash = $result["password"];
        $verify = password_verify($pass, $hash);
        if($verify){
          $_SESSION["logged"] = true;
          $_SESSION["fullname"] = $fullname;
          $_SESSION["user_check"] = $username;
          #echo $fullname;
          #echo "<br>";
          #echo "SUCCESSFUL";
          header("Location: ./users.php");
          die();
        }
        else{
          $_SESSION["logged"] = false;
          echo "USER NOT FOUND OR INCORRECT PASSWORD"; #when wrong username or password 
        }
      }
      else{
        echo "USERNAME NOT FOUND"; #when activate = 0
      }
    }catch(PDOException $e){
      echo "FAILED:" . $e->getMessage();
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rent Car Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <!--<a class="btn btn-default submit" href="index.html">Log in</a>-->
                <input type="submit" name="signin" value="Log in">
                <a class="reset_pass" href="includes/resetPassword.php" value="reset">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-car"></i></i> Rent Car Admin</h1>
                  <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Fullname" name="fullname" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username2" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password2" required="" />
              </div>
              <div>
                <!--<a class="btn btn-default submit" href= "index.html">Submit</a>
                href="index.html"-->
                <input type="submit" name="signup" value="Submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-car"></i></i> Rent Car Admin</h1>
                  <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
