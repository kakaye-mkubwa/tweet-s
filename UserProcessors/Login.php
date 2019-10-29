<?php
include_once '../utils/DBConnection.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = test_input($_POST["login_name"]);
    $user_pass = test_input($_POST["login_password"]);
    if (empty($username))
    {
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
            Username is required</p></div>
        <?php
    }elseif (empty($user_pass)){
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                Password is required</p></div>
        <?php
    }else{

        $connection = new DBConnection();
        $link = $connection->connection();

        $selectSql = "SELECT username,user_pass FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link,$selectSql))
        {

            mysqli_stmt_bind_param($stmt,"s",$paramUsername);
            $paramUsername = $username;

            if (mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt,$username,$hashedPassword);
                    if (mysqli_stmt_fetch($stmt))
                    {
                        if (password_verify($user_pass,$hashedPassword))
                        {
                            session_start();
                            $_SESSION['user_id'] = $username;
                            ?>
                            <script>setTimeout(function(){ window.location.href= 'index.php';}, 1500);</script>
                            <?php
//                            header("Location: ../index.php");
                        }
                        else
                        {
                            $loginErr = "Wrong username or password";
                            ?>
                            <hr><div class="alert alert-danger"><p align="center"><strong>
                                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                                Wrong Username or password </p></div>
                            <?php
                        }
                    }else{
                        ?>
                        <hr><div class="alert alert-danger"><p align="center"><strong>
                                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                                 Login Failed </p></div>
                        <?php
                    }
                } else
                {
                    $loginErr = "Wrong username or password";
                    ?>
                    <hr><div class="alert alert-danger"><p align="center"><strong>
                            <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                        Login Failed </p></div>
                    <?php
                }
            } else
            {?>
                <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    Login Failed </p></div>
                <?php
            }
            mysqli_free_result($stmt);
        }else{
            ?>
            <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    Login Failed </p></div>
            <?php
        }
        mysqli_stmt_close($stmt);
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

