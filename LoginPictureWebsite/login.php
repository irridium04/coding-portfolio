<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="top-bar">
            <nav class="navigation">
                <a href="login.php">Login</a>
                <a href="signup.php">Sign Up</a>
                <a href="memberpage.php">Memberpage</a>
            </nav>
        </div>
        <div class="content">
            <h1>Login</h1>
            <form method="POST" action="login.php">
                <table border="1">
                    <tr>
                        <td id="titles">Username</td>
                        <td><input type="text" name="username" 
                            placeholder="Username" size="25" require>
                        </td>
                    </tr>
                    <tr>
                        <td id="titles">Password</td>
                        <td><input type="password" name="pwd" 
                            size="25" require>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Login">
                        </td>
                    </tr>
                </table>
            </form>
            <?php

                // turn off error reporting
                error_reporting(0);

                require('dbconnect.php');

                if(isset($_POST['username']) && !empty($_POST['username']) )
                {
                    $sql_login =    "SELECT username,pwd "
                                    ."FROM  tbl_user "
                                    ."WHERE username = :username";

                    // prepare
                    $sql_login = $pdo->prepare($sql_login);

                    // sanitize
                    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

                    // bind param
                    $sql_login->bindParam(":username", $username);

                    // execute
                    $sql_login->execute();

                    // ----- Next get dataset

                    // get the dataset
                    $result = $sql_login->fetch();

                    if($result['pwd'] == null)
                    {
                        echo('<div id="errorbox">');
                        echo('<br>Bad Username / or Password <br>');
                        echo('</div>');
                    }
                    else
                    {
                        //for your information only - not in production
                        print_r($result);

                        $hashed_pwd = $result['pwd'];

                        if(password_verify($_POST['pwd'], $hashed_pwd))
                        {
                            echo('<br><br>Password is valid');

                            // This session variable will be a flag to 
                            // let users log into a members page

                            $_SESSION['LoginStatus'] = true;
                            $_SESSION['username'] = $username;
                            header('Location:memberpage.php');

                        }
                        else
                        {
                            // bad login
                            $_SESSION['LoginStatus'] = false;

                            echo('<br><br>Password is INVALID');
                        }
                    }
                    
                }
                else
                {

                }

            ?>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

        </div>
    </body>
</html>
