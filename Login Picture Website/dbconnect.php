<?php
    // connect to database
    try
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=wp_login','root','');
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