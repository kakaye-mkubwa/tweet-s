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
        <form id="login-form" method = "POST" action = "">
            <input type="text" id="username" class="fadeIn second" name="register_name" placeholder="Username">
            <input type="text" id="email" class="fadeIn second" name="register_email" placeholder="Email">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="password" id="confirm_password" class="fadeIn third" name="confirm_password" placeholder="Confirm Password">
            <div id="error-message"></div>
            <input type="submit" id="register-button" class="fadeIn fourth" value="Register">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="login.php">Log In?</a>
        </div>

    </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<!-- <script src="js/popper.min.js"></script> -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validatorjs.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery(document).on('click','#register-button',function (e) {
            e.preventDefault();

            $.ajax({
                url:'UserProcessors/Register.php',
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
