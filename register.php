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
            <form id="login-form" method = "POST" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" id="username" class="fadeIn second" name="register_name" placeholder="Username"><span id="username-error-span"></span>
                <input type="text" id="email" class="fadeIn second" name="register_email" placeholder="Email"><span id="email-error-span"></span>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"><span id="password-error-span"></span>
                <input type="password" id="confirm_password" class="fadeIn third" name="confirm_password" placeholder="Confirm Password"><span id="confirm-password-error-span"></span>
                <input type="submit" class="fadeIn fourth" value="Register">
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
    </body>
    </html>
<?php
include_once 'utils/DBConnection.php';
$loginErr = "";
$connection = new DBConnection();
$link = $connection->connection();

$offErr= "";
//require_once 'utils/DBConnection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo "Inside Post";
    $email = test_input($_POST["register_email"]);
    $username = test_input($_POST["register_name"]);
    $password = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirm_password"]);

      //validate email address
    if(empty($email))
    {
        $offErr = "Please fill in all the fields";
    }

    //validate username
    if (!empty($username))
    {
        $usernameCheck = "SELECT username FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link,$usernameCheck))
        {
            mysqli_stmt_bind_param($stmt,"s",$param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $usernameErr = "That username already exists";
                }
            }
            else
            {
                echo "Oops something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }
    else
    {
        $offErr = "Please fill in all the fields";
    }
    //validate password
    if (!empty($password))
    {
        if(strlen($password) < 8)
        {
            $passwordErr = "Password should be at least 8 characters";
        }
    }
    else
    {
        $offErr = "Please fill in all the fields";
    }
    //confirm password
    if(!empty($confirmPassword))
    {
        if ($confirmPassword != $password)
        {
            $confirmPasswordErr = "Passwords do no match";
        }
    }
    else
    {
        $confirmPasswordErr = "Please confirm your password";
    }
    if (empty($offErr) && empty($confirmPasswordErr) && empty($passwordErr) && empty($offNameErr) &&
        empty($usernameErr) && empty($emailErr) && empty($offAddressErr))
    {
        $insertSql = "INSERT INTO users(username,email,user_pass) VALUES (?,?,?)";
        if ($stmt = mysqli_prepare($link, $insertSql))
        {
            mysqli_stmt_bind_param($stmt,"sss",$paramUsername,$paramEmail,$paramPassword);
            $paramEmail = $email;
            $paramPassword = password_hash($password,PASSWORD_DEFAULT);
            $paramUsername = $username;
            if (mysqli_stmt_execute($stmt))
            {
                header("location: index.php");
            }
            else
            {
                echo "Oops something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>