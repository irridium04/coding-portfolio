<!DOCTYPE html>
<html>
    <head>
        <title>Your Pictures</title>
        <link rel="stylesheet" href="style.css">
                    
        <?php
            //DB connctions
            require('dbconnect.php');
            $sql = 'SELECT * FROM tbl_img ' . 
            'LEFT JOIN tbl_user ON tbl_img.user_id = tbl_user.user_id ' .
            'WHERE username LIKE "' . $_SESSION['username'] . '"';

            // query the database
            $rs = $pdo->query($sql);


        
        
    
        ?>

    </head>
    <body>
        <div class="top-bar">
            <nav class="navigation">
                <a href="index.html">Home</a>
                <a href="imginput.php">Add Images</a>
                <a href="getimg.php">View Images</a>
                <a href="logout.php">Logout</a>
            </nav>
        </div>

        <div class="content">
            <?php
                if(isset($_POST) && !empty($_POST['pk']))
                {
                    $deleteID = $_POST['pk'];
        
                    $pdo->exec('DELETE FROM tbl_img WHERE img_id = '.$deleteID);

                    
                    header('Location:getimg.php');
                }
                else
                {
                    echo('<h1>Your Images</h1>');
                    while($row = $rs->fetch())
                    {
                        
                        echo('<div class="dbimg">');
                        echo('<h1>'.$row['imgname'].'</h1><br>');
                        echo('<p>'.$row['imgdesc'].'</p><br>');
                        try
                        {
                            // build image string
                            $imagesrc = '"data:'.$row['imgtype'].';base64,'.$row['img'].'"';

                            echo('<img src='.$imagesrc.'>');
                        }
                        catch(PDOException $e)
                        {
                            echo('<div id="errorbox">'.$e->getMessage().'</div><br>');
                        }

                        
                        echo('
                        <form method="POST" action="getimg.php">
                            <input type="hidden" name="pk" value="' . $row['img_id'] . '">
                            <input type="submit" value="Delete Image">
                        </form>
                        </div>
                        ');

                        
                    }
                }
            ?>
            
        </div>
    </body>
</html>