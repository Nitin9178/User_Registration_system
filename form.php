<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="user_forms">
        <div class="container">
            <h2 class="text-center text-capitalize text-white pt-3">
                User registration system using php mvc
            </h2>
            <div class="all_forms text-white">
                <form id="login_form">
                    <h4 class="text-center text-capitalize pb-3">login form</h4>
                    <span id="result" class="p-2 text-white"></span>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="example@gmail.com" id="mail" name="mail"
                            required autocomplete="off" value="<?php if(isset($_COOKIE['mailcookie'])){
                                echo $_COOKIE['mailcookie'];
                            } ?>">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password please" id="pass_key"
                            name="pass_key" required autocomplete="off"  value="<?php if(isset($_COOKIE['passwordcookie'])){
                                echo $_COOKIE['passwordcookie'];
                            } ?>">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember"> <span>Remember me !!!</span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning btn-block text-uppercase">login</button>
                    </div>

                    <div class="form-group">
                        <div class="options text-capitalize">
                            <a href="#forgot_form" id="recover">Recover password</a>
                            <a href="#Reg_form" id="new_acc">create account</a>
                        </div>
                    </div>
                </form>

                <form id="Reg_form">
                    <h4 class="text-center text-capitalize pb-3">Rgistration form</h4>
                    <span id="response" class="pt-2 pb-2"></span>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Your Full name" id="user_name"
                            name="user_name" required autocomplete="off">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="example@gmail.com" id="user_mail"
                            name="user_mail" required autocomplete="off">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="contact number" id="contact"
                            name="contact" required autocomplete="off">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password please" id="pass" name="pass"
                            required autocomplete="off">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="confirm password" id="con_pass"
                            name="con_pass" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning btn-block text-uppercase regbtn">register</button>
                    </div>

                    <div class="form-group">
                        <div class="options text-capitalize text-center">
                            <a href="" class="pt-3 pb-2" id="log_acc">Aleady have an account ?</a>
                        </div>
                    </div>
                </form>

                <form id="forgot_form">
                    <h4 class="text-center text-capitalize pb-3">Password Recovery form</h4>
                    <span id="msg"></span>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="example@gmail.com" id="u_mail"
                            name="u_mail" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning btn-block text-uppercase">Check</button>
                    </div>

                </form>

                <form id="reset_form">
                    <h4 class="text-center text-capitalize pb-3">Password Recovery form</h4>
                    <span id="res_msg"></span>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="Enter otp" id="otp" name="otp" required
                            autocomplete="off">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="set new password" id="new_pass"
                            name="new_pass" required autocomplete="off">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="confirm new password" id="con_new_pass"
                            name="con_new_pass" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning btn-block text-uppercase">Check</button>
                    </div>

                </form>

                <form id="verify">
                    <h4 class="text-center text-capitalize pb-3">Verification form</h4>
                    <span id="res"></span>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="Enter otp" id="verify_otp"
                            name="verify_otp" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning btn-block text-uppercase">verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="assets/js/validate.js"></script>
</body>

</html>