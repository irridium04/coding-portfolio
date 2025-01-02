<?php

session_start();


// unset/delete the session variable
unset($_SESSION['LoginStatus']);

// redirect to home page
header('Location: index.html');


?>