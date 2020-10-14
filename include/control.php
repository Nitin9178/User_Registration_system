<?php 
    require 'phpmailer/PHPMailerAutoload.php';
   class Database
   {
     private $dsn = "mysql:host=localhost; dbname=user";
     private $user = "root";
     private $password = "";
     private $con ;

     public function __construct()
     {
         try
         {
             $this->con = new PDO($this->dsn, $this->user, $this->password);
         }
         catch(PDOException $e)
         {
             echo $e->getMessage();
         }
     }

  public function check_user($email,$contact)
  {
    $sql = "SELECT * FROM register WHERE email = '$email' AND contact = '$contact'";
    $stmt = $this->con->prepare($sql);
    $stmt->execute(['email'=>$email , 'contact'=>$contact]);
    $result = $stmt->rowCount();
    return $result;
  }


  public function check_exist($mail)
  {
      $sql = $this->con->prepare("SELECT * FROM register WHERE email = '$mail'");
      $sql->execute(['email'=>$mail]);
      $row = $sql->rowCount();
      return $row;
  }

 public function get_info($user_mail)
  {
      $data = array();
      $sql = $this->con->prepare("SELECT * FROM register WHERE email = '$user_mail'");
      $sql->execute(['email'=>$user_mail]);
      $result = $sql->fetch(PDO::FETCH_ASSOC);
      $row = $result['pass'];
      return $row;
  }

  public function get_name($user_m)
  {
    $sql = $this->con->prepare("SELECT * FROM register WHERE email = '$user_m'");
    $sql->execute(['email'=>$user_m]);
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $row = $result['Fullname'];
    return $row; 
  }

 public function registration($name , $contact , $mail , $pass , $otp)
  {
      $sql = $this->con->prepare("INSERT INTO register(Fullname,contact,email,pass,otp)VALUES(:Fullname, :contact , :email, :pass, :otp)");
      $sql->execute(['Fullname'=>$name, 'contact'=>$contact , 'email'=>$mail , 'pass'=>$pass, 'otp'=>$otp]);
      return true;
  }

 public function log_insert($u_mail)
  {
      $date = strtotime(date('yyyy-mm-dd'));
      $sql = $this->con->prepare("INSERT INTO user_log(user_mail , login_time)VALUES(:user_mail , :login_time)");
      $sql->execute(['user_mail'=>$u_mail, 'login_time'=>$date]);
  }

  public function verify_info_insert($u_mail , $otp)
  {
      $sql = $this->con->prepare("INSERT INTO recovery(email , otp)VALUES(:email , :otp)");
      if($sql->execute(['email'=>$u_mail, 'otp'=>$otp]))
      {
          return 1;
      }
      else
      {
          return 0;
      }
  }

  
  public function sendemail($email , $message)
  {
      
       $mail = new PHPMailer;
       $mail->Host = 'smtp.gmail.com';
       $mail->Port = 587;
       $mail->SMTPAuth=true;
       $mail->Username='nitinofficial231@gmail.com';
       $mail->Password='12345';

       $mail->setFrom("nitinofficial231@gmail.com");
       $mail->addAddress($email);
       
       $mail->isHTML(true);
       
       $mail->Subject="Verification mail";
       $mail->Body='<h2>Please keep this secret for the security purpose</h2>."'.$message.'"';

       if($mail->send())
       {
           return true;
       }
       else
       {
           return false;
       }
      
  }

  public function verify_otp($otp)
  {
     $sql = "SELECT * FROM register WHERE  otp = :otp ORDER BY User_id DESC LIMIT 1";
     $result = $this->con->prepare($sql);
     $result->execute(['otp'=>$otp]);
    $num = $result->rowCount();
    if($num > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
  }

  public function update_password($otp , $password)
  {
      $sql = "SELECT * FROM recovery WHERE otp = :otp ORDER BY id DESC limit 1";
      $result = $this->con->prepare($sql);
      if($result->execute(['otp'=>$otp]))
      {
          $row = $result->FETCH(PDO::FETCH_ASSOC);
          $email = $row['email'];
          
          $sql2 = "UPDATE register SET pass = :pass WHERE email = :email";
          $res = $this->con->prepare($sql2);
          if($res->execute(['pass'=>$password,'email'=>$email]))
          {
              return true;
          }
          else
          {
              return false;
          }
      }
      else
      {
          return 'otp did not match';
      }
  }
   }

?>