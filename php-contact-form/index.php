<?php

    $error = "";

    $successMessage = "";

    //if post exists we will check that items were sent and get by from here that there is an error showing.
    if($_POST){
        if(!$_POST["email"]){
            $error .= "An email address is required.<br>";
        }

        if(!$_POST["content"]){
            $error .= "A message is required.<br>";
        }

        if(!$_POST["subject"]){
            $error .= "A subject line is required.<br>";
        }

        if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false){
            $error .= "The email address is invalid.<br>";
        }

        //check if there are errors

        if($error != ""){
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
        }
        else{ //email is good
            $emailTo = "devlynchelin6@gmail.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: " . $_POST['email'];

            //try sending the email.

            if (mail($emailTo, $subject, $content, $headers)){
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, ' . 'we will get back to you ASAP!</div>';
            }
            else{
                $error = '<div class="alert alert-danger" role="alert">Your message could not be sent, please try again later.</div>';

            }

        }
    }

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-wa-compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container"><!--- start of container-->
            <h1>Get in touch!</h1>
            <div id="error"><?php echo $error.$successMessage; ?></div>

            <form method="post"><!--- start of the form-->
                <fieldset class="form-group mt-1 mb-1">
                    <label for="email">Please enter your email address*</label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="on">
                    <small class="text-muted">We will never share your email with anyone else.</small>
                </fieldset>

                <fieldset class="form-group mt-1 mb-1">
                    <label for="subject">Subject*</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </fieldset>

                <fieldset class="form-group mt-1 mb-1">
                    <label for="content">Please enter your message*</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </fieldset>

                <button type="submit" id="submit" class="btn btn-primary">Submit</button>

            </form><!--- end of the form-->

        </div><!---end of conatiner div-->

        <!--- download of jQuery-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!--- download Bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
        <!--- validating the data-->
        <script type="text/javascript">
            $("form").submit(function(e){
                let error = "";

                //checking that the email field is valid and filled in.
                if($("#email").val() == ""){
                    error += "The email field is required.<br>";
                }
                //checking the subject field is valid and filled in.
                if($("#subject").val() == ""){
                    error += "The subject field is required.<br>";
                }
                //checking the message field is valid and filled in.
                if($("#content").val() == ""){
                    error += "The message field is required.<br>";
                }

                //test if there is an error or not

                if(error !=""){
                    $("#error").html('<div class="alert alert-danger" ' +
                    'role="alert"><p><strong>There were error(s) in your form: </strong></p>' + error + '</div>');
                    
                    return false;
                }
                else{ //no errors
                    return true;
                }
            });
        </script>

    </body>

</html>
