
<?php
    require('dbconnect.php');

    //print_r($_POST);
    //print('<br><hr><br>');

    if(isset($_POST['username']) && !empty($_POST['username']))
    {
        try
        {
            $sql_Insert =  	"INSERT INTO tbl_user".
            "(firstname,lastname,username,pwd) ".
            "VALUES(:firstname,:lastname,:username,:pwd)";

            $sql_Insert =  $pdo->prepare($sql_Insert);


            $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
            $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
            $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
            
            // *********** PASSWORD *************************

            $pwd = $_POST['pwd'];

            $password = password_hash($pwd, PASSWORD_DEFAULT);

            // **************************************************

            $sql_Insert->bindparam(":firstname",$firstname);
            $sql_Insert->bindparam(":lastname",$lastname);
            $sql_Insert->bindparam(":username",$username);
            $sql_Insert->bindparam(":pwd",$password);

            $sql_Insert->execute();

            echo('<div id="successbox">User sucessfully created! <a href="login.php">Login</a></div><br>');
        }
        catch(PDOException $ee)
        {
            //echo($ee->getMessage());
            echo("<br><br>");
            //echo($ee->getCode());

            if($ee->getCode())
            {
                //echo("Username already in use!");
                $_SESSION['logerr_message'] = "Please select different username";
                header('location: signup.php');
            }
        }
        


    }
    else
    {
        echo('
        <!DOCTYPE html>
        <html>
        <head>
        <title>Sign Up</title>
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
        ');

        include('signupform.php');

        echo('
        Already have an account? <a href="login.php">Login</a><br><br>
        </div>
        </body>
        </html>
        ');
    }

?>
