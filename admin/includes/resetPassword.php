<?php
session_start();
$_SESSION["logged"] = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  ###connect
  include_once("includes/conn.php");
  $user_check=$_SESSION['username'];

  #$old_pass=$_POST['old_pass'];
  $new_pass=$_POST['new_pass'];
  $c_pass=$_POST['c_pass'];
  if($new_pass!="" && $c_pass!=""){#<!--can add confirmation later to sql table-->
    if($new_pass == $c_pass){
        $sql="SELECT * FROM `users_table` WHERE `username`='$user_check'"; #AND `password` =PASSWORD($old_pass)";
        $db_check = $conn->query($sql);
        $stmt->execute([$username]);
        $count=$stmt->rowCount();

        if($count==1){
            $fetch=$db->query("UPDATE `users_table` SET `password` = PASSWORD($new_pass) WHERE `username`='$user_check'");
            $new_pass =''; $c_pass = '';
            $msg_sucess = "Password successfully updated!";
        }else{
            $error = "User does not exist, please create an account first";
        }
    }
  }else{
    echo "Passwords don't match";
  }
}
?>

    <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <h1>Reset Password</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="New Password" name="new_pass" required="required" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Confirm Password" name="c_pass" required="required" />
                    </div>
                    <div>
                        <input type="submit" name="resetpass" value="Reset">
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

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