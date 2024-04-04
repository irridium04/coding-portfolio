<?php
    require('dbconnect.php');

    // *** MAKE SURE TO DO THIS STEP
    //  *** TO PREVENT UNAUTHORISED ACCESS

    if(!isset($_SESSION['LoginStatus']) || $_SESSION['LoginStatus'] == false )
    {
        header('Location:login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Members Page</title>
        <link rel="stylesheet" href="style.css">
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
                
                $sql = 'SELECT * FROM tbl_user ' . 
                'WHERE username LIKE "' . $_SESSION['username'] . '"';

                // query the database
                $rs = $pdo->query($sql);


                while($row = $rs->fetch())
                {
                    $fn = $row['firstname'];
                }

                echo('
                <h1>Welcome ' . $fn . '</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus arcu bibendum at varius vel pharetra vel turpis. Mi sit amet mauris commodo quis imperdiet massa. Imperdiet dui accumsan sit amet nulla facilisi. Libero volutpat sed cras ornare arcu dui vivamus arcu. Urna nec tincidunt praesent semper. Ullamcorper sit amet risus nullam eget felis eget nunc lobortis. Pulvinar etiam non quam lacus suspendisse faucibus interdum. Aenean euismod elementum nisi quis eleifend quam adipiscing. Viverra aliquet eget sit amet. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Risus ultricies tristique nulla aliquet enim tortor at. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Sed felis eget velit aliquet sagittis. Nibh praesent tristique magna sit amet purus gravida quis. Elementum sagittis vitae et leo duis.

Velit laoreet id donec ultrices tincidunt arcu non sodales neque. Lacus vel facilisis volutpat est velit egestas dui id ornare. Ut sem nulla pharetra diam sit amet nisl suscipit. Pharetra massa massa ultricies mi quis hendrerit dolor magna eget. Est pellentesque elit ullamcorper dignissim. Tempor orci eu lobortis elementum nibh. Sed felis eget velit aliquet sagittis id consectetur purus. Mauris ultrices eros in cursus turpis massa. Dui sapien eget mi proin sed. Aliquet nec ullamcorper sit amet risus nullam eget felis eget.

Morbi blandit cursus risus at ultrices. Non blandit massa enim nec dui. Mattis ullamcorper velit sed ullamcorper. Donec pretium vulputate sapien nec sagittis aliquam. Ornare arcu dui vivamus arcu felis bibendum ut tristique et. Blandit libero volutpat sed cras ornare arcu dui. Sem integer vitae justo eget magna fermentum iaculis. Nec feugiat in fermentum posuere. Morbi quis commodo odio aenean sed. Convallis aenean et tortor at risus. Turpis massa sed elementum tempus egestas sed sed. At ultrices mi tempus imperdiet nulla malesuada. Interdum velit laoreet id donec ultrices tincidunt arcu non sodales. Dictum at tempor commodo ullamcorper a. Pretium viverra suspendisse potenti nullam ac tortor. Eget lorem dolor sed viverra ipsum. Lobortis feugiat vivamus at augue eget arcu dictum. Egestas maecenas pharetra convallis posuere morbi leo urna molestie. Pretium fusce id velit ut tortor pretium viverra suspendisse. Elementum facilisis leo vel fringilla.

Ultrices tincidunt arcu non sodales neque sodales ut etiam sit. Et malesuada fames ac turpis egestas maecenas. Adipiscing bibendum est ultricies integer quis auctor elit. Tempus urna et pharetra pharetra massa massa. Curabitur gravida arcu ac tortor dignissim convallis. Dolor morbi non arcu risus quis. Orci sagittis eu volutpat odio facilisis mauris sit amet. Viverra orci sagittis eu volutpat odio facilisis mauris sit. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Diam maecenas sed enim ut sem viverra. Mauris pharetra et ultrices neque ornare aenean euismod. Risus pretium quam vulputate dignissim suspendisse in. Mi quis hendrerit dolor magna eget. Consequat id porta nibh venenatis cras sed felis eget. Lectus sit amet est placerat in egestas. Aliquam sem fringilla ut morbi tincidunt augue. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Hendrerit dolor magna eget est lorem. Pellentesque habitant morbi tristique senectus et netus et.

Id faucibus nisl tincidunt eget nullam non nisi est sit. Blandit turpis cursus in hac habitasse platea dictumst quisque. Libero nunc consequat interdum varius sit. Arcu risus quis varius quam quisque id diam vel quam. Donec massa sapien faucibus et molestie ac feugiat sed. Lectus mauris ultrices eros in cursus turpis. Dui accumsan sit amet nulla facilisi morbi tempus. Est ullamcorper eget nulla facilisi etiam dignissim diam. Dictum varius duis at consectetur lorem. At tellus at urna condimentum. Sit amet consectetur adipiscing elit. Amet nulla facilisi morbi tempus iaculis urna id volutpat lacus. Quisque egestas diam in arcu cursus euismod quis viverra. Lectus urna duis convallis convallis tellus id interdum velit.

Phasellus faucibus scelerisque eleifend donec pretium vulputate. Augue eget arcu dictum varius duis at consectetur lorem. Pulvinar mattis nunc sed blandit libero volutpat sed cras ornare. Fringilla ut morbi tincidunt augue interdum velit euismod in. Dictum varius duis at consectetur. Tempus iaculis urna id volutpat lacus laoreet non. Cursus turpis massa tincidunt dui ut. Interdum posuere lorem ipsum dolor. Bibendum arcu vitae elementum curabitur vitae nunc. Est lorem ipsum dolor sit amet consectetur adipiscing. Blandit turpis cursus in hac habitasse platea dictumst quisque. Tortor posuere ac ut consequat semper viverra. Elementum nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Enim facilisis gravida neque convallis a cras semper auctor. Maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum.

Facilisis gravida neque convallis a cras semper auctor neque. Faucibus in ornare quam viverra orci. At imperdiet dui accumsan sit. Laoreet suspendisse interdum consectetur libero id. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae. Semper eget duis at tellus at urna. In iaculis nunc sed augue lacus viverra vitae congue eu. Dolor sed viverra ipsum nunc aliquet bibendum enim. Vulputate dignissim suspendisse in est ante in. Et netus et malesuada fames ac turpis. Erat nam at lectus urna. Aliquam nulla facilisi cras fermentum odio. Morbi enim nunc faucibus a pellentesque sit amet porttitor eget. Enim nunc faucibus a pellentesque sit amet porttitor eget dolor. Mattis pellentesque id nibh tortor id aliquet lectus proin nibh. Id faucibus nisl tincidunt eget nullam. A arcu cursus vitae congue mauris rhoncus. At tellus at urna condimentum mattis pellentesque id nibh tortor.

Amet nisl purus in mollis. Vitae ultricies leo integer malesuada nunc vel. Neque convallis a cras semper auctor neque. Eros donec ac odio tempor orci. Mattis nunc sed blandit libero. Turpis egestas integer eget aliquet nibh praesent. Nulla at volutpat diam ut venenatis. Molestie at elementum eu facilisis. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Ac turpis egestas sed tempus. Odio ut sem nulla pharetra diam. Integer quis auctor elit sed vulputate. Viverra vitae congue eu consequat.

Neque ornare aenean euismod elementum nisi quis eleifend quam. Volutpat ac tincidunt vitae semper quis. Interdum velit laoreet id donec ultrices tincidunt. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Sit amet consectetur adipiscing elit. Feugiat nisl pretium fusce id velit ut tortor. Consequat ac felis donec et odio. Suspendisse faucibus interdum posuere lorem ipsum dolor. Duis at consectetur lorem donec massa sapien faucibus et. Sit amet cursus sit amet dictum sit amet justo donec. Laoreet id donec ultrices tincidunt. Ac felis donec et odio pellentesque. Magna ac placerat vestibulum lectus mauris ultrices eros. Tincidunt nunc pulvinar sapien et. Lorem sed risus ultricies tristique. Sagittis orci a scelerisque purus semper eget. Purus non enim praesent elementum facilisis leo.

Sed augue lacus viverra vitae. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Non nisi est sit amet facilisis magna etiam. In dictum non consectetur a erat nam. Pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna. Turpis massa tincidunt dui ut. Est ante in nibh mauris cursus mattis molestie a iaculis. A cras semper auctor neque vitae tempus quam pellentesque. Scelerisque felis imperdiet proin fermentum leo vel orci porta non. Vulputate dignissim suspendisse in est ante in. Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Felis eget velit aliquet sagittis id consectetur purus ut faucibus. A iaculis at erat pellentesque. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Nunc lobortis mattis aliquam faucibus purus in. Amet volutpat consequat mauris nunc congue nisi.</p>

            <br><br>
            <p>Logged in as ' . $_SESSION['username'] . ' </p>
                
                ');  
            ?>
        
            
        </div>
    </body>
</html>