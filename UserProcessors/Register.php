<?php
include_once '../utils/DBConnection.php';

$connection = new DBConnection();
$link = $connection->connection();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = test_input($_POST["register_email"]);
    $username = test_input($_POST["register_name"]);
    $password = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirm_password"]);

    //validate email address
    if(empty($email))
    {
        $offErr = "Email is required";
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
            Email is required</p></div>
        <?php
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
                    ?>
                    <hr><div class="alert alert-danger"><p align="center"><strong>
                            <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                        Username already exists</p></div>
                    <?php
                }
            }
            else
            {
                ?>
                <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    Registration failed</p></div>
                <?php
            }
            mysqli_stmt_close($stmt);
        }else{
            ?>
            <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    Registration failed</p></div>
            <?php
        }
    }
    else
    {
        $usernameErr="Password is required";
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
            Username is required</p></div>
        <?php
    }

    //validate password
    if (!empty($password))
    {
        if(strlen($password) < 8)
        {
            $passwordErr = "Password should be at least 8 characters";
            ?>
            <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                Password should be atleast 8 characters</p></div>
            <?php
        }
    }
    else
    {
        $offErr = "Please fill in all the fields";
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
            Password is required</p></div>
        <?php
    }
    //confirm password
    if(!empty($confirmPassword))
    {
        if ($confirmPassword != $password)
        {
            $confirmPasswordErr = "Passwords do no match";
            ?>
            <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                Password do not match</p></div>
            <?php
        }
    }
    else
    {
        $confirmPasswordErr = "Please confirm your password";
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
            Confirm password entered</p></div>
        <?php
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
                session_start();
                $_SESSION['user_id'] = $username;
                ?>
                <script>setTimeout(function(){ window.location.href= 'index.php';}, 1500);</script>
                <?php
//                header("location: index.php");
            }
            else
            {
                ?>
                <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    Registration Failed</p></div>
                <?php
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
