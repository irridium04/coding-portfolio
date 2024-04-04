<div id="form">

    <div>
        <h1>New User Registration</h1>
        <form method= "POST" action= "signup.php">
            <table border="1">
                <tr>
                    <td id="titles">First Name</td>
                    <td><input type="text" name="firstname" size="25" value="Bubba"></td>
                </tr>
                <tr>
                    <td id="titles">Last Name</td>
                    <td><input type="text" name="lastname" size="25" value="Smith"></td>
                </tr>
                <tr>
                    <td id="titles">Username</td>
                    <td><input type="text" name="username" size="25" value="bsmith123" placeholder="username" required></td>
                </tr>
                <tr>
                    <td id="titles">Password</td>
                    <td><input type="password" name="pwd" size="25" value="hotdog" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type = "submit" value= "Sign Up"></td>
                </tr>

            </table>
            <br>
            
                <?php
                    // test with in production
                    if(isset($_SESSION['logerr_message']))
                    {
                        echo('<div id="errorbox">');
                        echo('Warning: '.$_SESSION['logerr_message'].'<br><br>');
                        unset($_SESSION['logerr_message']);
                        echo("</div>");
                    }   
                ?>
        </form>
    </div>
</div>
