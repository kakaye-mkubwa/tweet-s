<?php

?>
<html>
<head>
    <title>G-Tweet</title>
<!--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <link href="css/login-design.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/solid.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<!--    <script src="plugins/jquery-1.8.3/jquery-1.8.3.min.js"></script>-->
<!--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
<!--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <!------ Include the above in your HEAD tag ---------->
</head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
<!--                    <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />-->
                    <a class="navbar-brand">G-Tweet</a>
                </div>

                <!-- Login Form -->
                <form id="login-form" method="POST" action="">
                    <input type="text" id="login_username" class="fadeIn second" name="login_name" placeholder="login">
                    <input type="password" id="login_password" class="fadeIn third" name="login_password" placeholder="password">
                    <div id="error-message"></div>
                    <input type="submit" id="submit-button" class="fadeIn fourth" value="Log In">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="register.php">Register?</a>
                    <a class="underlineHover" href="#">Forgot Password?</a>
                </div>

            </div>
        </div>
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- <script src="js/popper.min.js"></script> -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/login_validator.js"></script>

        <script>
            jQuery(document).ready(function () {
                jQuery(document).on('click','#submit-button',function (e) {
                    e.preventDefault();

                    $.ajax({
                        url:'UserProcessors/Login.php',
                        type:'POST',
                        data:$('#login-form').serialize()
                    }).done(function (data) {
                        $('#error-message').html(data);
                    }).fail(function (xhr, status, error) {
                        $('#error-message').html('<hr><div class="alert alert-warning"><p align="center"><strong><i class="fa fa-exclamation-triangle"></i> Oops!</strong> Something went wrong, Please try again... </p></div>');
                    });

                });
            });
        </script>

    </body>
</html>
