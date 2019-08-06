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
                <form id="login-form" method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <input type="text" id="login_username" class="fadeIn second" name="login_name" placeholder="login"><span id="username-error"></span>
                    <input type="password" id="login_password" class="fadeIn third" name="login_password" placeholder="password"><span id="password-error"></span>
                    <input type="submit" class="fadeIn fourth" value="Log In">
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

    </body>
</html>
<?php
include_once 'utils/DBConnection.php';
$voterId = $user_pass = "";
$loginErr = "";
$connection = new DBConnection();
$link = $connection->connection();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = test_input($_POST["login_name"]);
    $user_pass = test_input($_POST["login_password"]);
    if (empty($username) || empty($user_pass))
    {
        $loginErr = "Please fill in all the fields";
    }
    if(empty($loginErr))
    {
        $selectSql = "SELECT username,user_pass FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($link,$selectSql))
        {
            mysqli_stmt_bind_param($stmt,"s",$paramusername);
            $paramusername = $username;
            if (mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) >= "1")
                {
                    mysqli_stmt_bind_result($stmt,$username,$hashedPassword);
                    if (mysqli_stmt_fetch($stmt))
                    {
                        if (password_verify($user_pass,$hashedPassword))
                        {
                            session_start();
                            $_SESSION['user_id'] = $username;
                            header("location: index.php");
                        }
                        else
                        {
                            $loginErr = "Wrong username or password";
                        }
                    }
                }
                else
                {
                    $loginErr = "Wrong username or password";
                }
            }
            else
            {
                echo "Something went wrong";
            }
            mysqli_free_result($stmt);
        }
        mysqli_stmt_close($stmt);
    }
    else{
        echo "Fill in all the fields";
    }
    mysqli_close($link);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>