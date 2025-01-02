<!-- PHP to connect to the SQL database -->
<!-- Code by Collin Shook -->

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id = "div1">
            <?php
            // dbconnect.php

            // connect to database
            try
            {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=wp_final','root','');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

                //only for educational purposes
                $dbstatus = "Good db connection";

            }
            catch(PDOException $e)
            {
                $dbstatus = 	"Database connection failed<br>".
                            $e->getMessage();

                die();

            }


            SESSION_START();

            ?>
        </div>
    </body>
</html>

