$("#recover").click(function(){
    $("#forgot_form").toggle();
    $("#login_form").toggle("hide");
});

$("#new_acc").click(function(){
    $("#Reg_form").toggle();
    $("#login_form").toggle("hide");
});

$("#log_acc").click(function(){
    $("#login_form").toggle();
    $("#Reg_form").toggle("hide");
});





///////////////////////////////////////////////////// FORM VALIDATION /////////////////////////////////////////////////////////

$(document).ready(function(){

    const mail_reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const pass_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    const text_reg = /^[A-Za-z ]{2,100}$/;
    const phone_reg = /^[6-9][0-9]{9}$/;

     $("#login_form").on("submit" , (e) => {
         e.preventDefault();

         const email = $("#mail").val();
         const password = $("#pass_key").val();

         if(!email.match(mail_reg))
         {
            alert("Please input valid email address");
            return false;
         }
         else if(!password.match(pass_reg))
         {
            alert("Make password strong");
            return false;
         }
         else
         {
             $.ajax({
                 url : "model.php",
                 method : "POST",
                 data : $("#login_form").serialize() + "&action=login",
                 success : function(response)
                 {
                     $("#result").html(response);
                     $("#login_form").trigger("reset");
                 }
             })
         }
     });

     $("#Reg_form").on("submit" , (e)=>{
        e.preventDefault();

        const mail = $("#user_mail").val();
        const name = $("#user_name").val();
        const phone = $("#contact").val();
        const pass1 = $("#pass").val();
        const pass2 = $("#con_pass").val();

        if(!mail.match(mail_reg))
        {
            alert("Invalid email address");
            return false;
        }
        else if(!name.match(text_reg))
        {
            alert("Name does not specify our specified charset");
            return false;
        }
        else if(!phone.match(phone_reg))
        {
            alert("Invalid contact number");
            return true;
        }
        else if(!pass1.match(pass_reg) || !pass2.match(pass_reg))
        {
            alert("Either password or confirm password did not match with specified pattern");
            return false;
        }
        else if(pass1 !== pass2)
        {
            alert("Password did not match");
            return false;
        }
        else
        {
            $.ajax({
               url : "model.php",
               method : "POST",
               data : $("#Reg_form").serialize() + '&action=register',
               success : function(response)
               {
                   $("#response").html(response);
                   $("#Reg_form").trigger("reset");
               }
            });
        }

     });


     $("#verify").on("submit", (e)=>{
        e.preventDefault();
        const otp = $("#verify_otp").val();

        if(!otp.match(/^[0-9]{5}$/))
        {
            alert("Enter valid OTP");
            return false;
        }
        else
        {
            $.ajax({
               url : "model.php",
               method : "POST",
               data : $("#verify").serialize() + '&action=verify',
               success : function(response)
               {
                   $("#res").html(response);
                   $("#verify").trigger("reset");
               }
            });
        }
     });

     $("#forgot_form").on("submit" , (e) => {
           e.preventDefault();

           const mail = $("#u_mail").val();

           if(!mail.match(mail_reg))
           {
               alert("Please input valid email");
               return false;
           }
           else
           {
            $.ajax({
                url : "model.php",
                method : "POST",
                data : $("#forgot_form").serialize() + '&action=forgot',
                success : function(response)
                {
                    $("#msg").html(response);
                    $("#forgot_form").trigger("reset");
                }
             });
           }
     });

     $("#reset_form").on("submit" , (e) => {
         e.preventDefault();

         const otp = $("#otp").val();
         const pass_1 = $("#new_pass").val();
         const pass_2 = $("#con_new_pass").val();

         if(!otp.match(/^[0-9]{5}$/))
         {
             alert("Please enter specified type OTP");
             return false;
         }
         else if(!pass_1.match(pass_reg))
         {
             alert("new password did not match with specified string");
             return false;
         }
         else if(!pass_2.match(pass_reg))
         {
             alert("confirm password did not match with specified string");
             return false;
         }
         else if(pass_1 !== pass_2)
         {
             alert("Password did not match");
             return false;
         }
         else
         {
             $.ajax({
                url : "model.php",
                method : "POST",
                data : $("#reset_form").serialize() + '&action=reset',
                success : function(response)
                {
                    $("#res_msg").html(response);
                    $("#reset_form").trigger("reset");
                }   
             });
         }
     });
});