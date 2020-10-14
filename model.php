   <?php 
    session_start();
   require 'include/control.php';
   ?>

<?php 
$db = new Database();
 if(isset($_POST['action']) && $_POST['action'] === 'login')
 {
     $user_mail = $_POST['mail'];
     $pass = $_POST['pass_key'];

     $otp = rand(11111,99999);

     $num = $db->check_exist($user_mail);
     if($num > 0)
     {
         $db_pass = $db->get_info($user_mail);
         if(password_verify($pass,  $db_pass))
         {
           $db->log_insert($user_mail);
           $name = $db->get_name($user_mail);
           $_SESSION['login'] = $name;
           $_SESSION['auto_logout'] = time();
           echo "You are logged in successfully";

           if(isset($_POST['remember']))
           {
               setcookie('mailcookie', $user_mail , time()+240, '/');
               setcookie('passwordcookie', $user_mail , time()+240 , '/');
           }
           ?>
           <script>
              location.href = "index.php";
           </script>
           <?php
         }
         else
         {
             echo "Password did not match";
             header("location:index.php");
         }
     }
     else
     {
         echo "No such email exists";
     }
 }
?>

<?php 
    if(isset($_POST['action']) && $_POST['action'] === 'register')
    {
        $name = $_POST['user_name'];
        $phone = $_POST['contact'];
        $mail = $_POST['user_mail'];
        $pass = $_POST['pass'];
        $otp = rand(11111,99999);

        $new_pass = password_hash($pass, PASSWORD_BCRYPT);

        $data = $db->check_user($mail , $phone);
        if($data > 0)
        {
           echo "You are already register";
           header("location:index.php");
        }
        else
        {
           $result = $db->sendemail($mail , $otp);
           if($result === true)
           {
               
               $check = $db->registration($name , $phone,  $mail , $new_pass , $otp);
               if($check === true);
               {
                  echo "<h3>You are registered ut verify yourself first. A mail has been sent on your registered email id</h3>";
                  ?>
                      <script>
                         $("#verify").toggle();
                         $("#Reg_form").toggle("hide");
                      </script>
                  <?php
               }
           }
           else
           {
               echo "mail did not sent";
           }
        }
    }
?>

<?php 
    if(isset($_POST['action']) && $_POST['action'] === 'verify')
    {
        $otp = $_POST['verify_otp'];
        $res = $db->verify_otp($otp);
        if($res === true)
        {
           echo "You have successfully registered";
           ?>
                <script>
                    $("#login_form").toggle();
                    $("#verify").toggle("hide");
                </script>
           <?php 
        }
        else
        {
            echo "You input wrong otp. Please register yourself again";
        }
    }
?>

<?php 
   if(isset($_POST['action']) && $_POST['action'] === 'forgot')
   {
       $mail = $_POST['u_mail'];
       $otp = rand(11111,99999);
       $row = $db->check_exist($mail);
       if($row > 0)
       {
         $res = $db->sendemail($mail , $otp);
           if($res === true)
           {
            if($db->verify_info_insert($mail , $otp))
            {
                echo "A mail has been sent. Please verify yourself";
                ?>
                    <script>
                       $("#reset_form").toggle();
                       $("#forgot_form").toggle("hide");
                    </script>
                <?php
            }
           }
       }
   }
?>

<?php 
   if(isset($_POST['action']) && $_POST['action'] === 'reset')
   {
       $gen_otp = $_POST['otp'];
       $pass = $_POST['new_pass'];
       $n_pass = password_hash($pass , PASSWORD_BCRYPT);

      $res = $db->update_password($gen_otp , $n_pass);
      if($res === true)
      {
          echo "Password Updated";
      }
       else
       {
           echo "OTP did not match";
       }
   }
?>