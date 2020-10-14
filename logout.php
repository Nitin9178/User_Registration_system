<?php 
     session_destroy();

     setcookie('mailcookie','',time()-240,'/');
     setcookie('passwordcookie','',time()-240 ,'/');
     echo "you are logged out";
     ?>
    <script>
        location.href = "form.php";
    </script>
     <?php
?>