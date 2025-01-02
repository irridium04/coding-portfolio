<!DOCTYPE html>
<html>
    <head>
        <title>Hockey Player Roster - Roster</title>
        <link rel="stylesheet" href="style.css">
                    
        <?php
            //DB connctions
            require('dbconnect.php');
            $sql = 'SELECT * FROM tbl_player';

            // query the database
            $rs = $pdo->query($sql);
    
        ?>

    </head>
    <body>
        <div class="top-bar">
            <nav class="navigation">
                <a href="index.html">Home</a>
                <a href="inputplayer.php">Add Players</a>
                <a href="roster.php">View Roster</a>
            </nav>
        </div>

        <div class="content">
            <?php
                // convert 3 letter codes in database back to team names
                $teamCodes = array(
                    'ANA' => 'Anaheim Ducks',
                    'ARI' => 'Arizona Coyotes',
                    'BOS' => 'Boston Bruins',
                    'BUF' => 'Buffalo Sabres',
                    'CGY' => 'Calgary Flames',
                    'CAR' => 'Carolina Hurricanes',
                    'CHI' => 'Chicago Blackhawks',
                    'COL' => 'Colorado Avalanche',
                    'CBJ' => 'Columbus Blue Jackets',
                    'DAL' => 'Dallas Stars',
                    'DET' => 'Detroit Red Wings',
                    'EDM' => 'Edmonton Oilers',
                    'FLA' => 'Florida Panthers',
                    'LAK' => 'Los Angeles Kings',
                    'MIN' => 'Minnesota Wild',
                    'MTL' => 'Montreal Canadiens',
                    'NSH' => 'Nashville Predators',
                    'NJD' => 'New Jersey Devils',
                    'NYI' => 'New York Islanders',
                    'NYR' => 'New York Rangers',
                    'OTT' => 'Ottawa Senators',
                    'PHI' => 'Philadelphia Flyers',
                    'PIT' => 'Pittsburgh Penguins',
                    'SJS' => 'San Jose Sharks',
                    'SEA' => 'Seattle Kraken',
                    'STL' => 'St. Louis Blues',
                    'TBL' => 'Tampa Bay Lightning',
                    'TOR' => 'Toronto Maple Leafs',
                    'VAN' => 'Vancouver Canucks',
                    'VGK' => 'Vegas Golden Knights',
                    'WSH' => 'Washington Capitals',
                    'WPG' => 'Winnipeg Jets'
                );

                
                if(isset($_POST) && !empty($_POST['pk']))
                {
                    $deleteID = $_POST['pk'];
        
                    $pdo->exec('DELETE FROM tbl_player WHERE player_id = '.$deleteID);

                    
                    header('Location:rosteredit.php');
                }
                else
                {
                    echo('
                    <h1>Your Players</h1>
                    <table>
                    <tr>
                        <td>Image</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Team</td>
                        <td>Position</td>
                        <td>Points</td>
                        <td>Goals</td>
                        <td>Assists</td>
                        <td>GAA</td>
                        <td>SV%</td>
                        <td>Shutouts</td>
                        <td></td>
                    </tr>');
                    while($row = $rs->fetch())
                    {
                        echo('<tr>');
                    
                        try
                        {
                            // build image string
                            $imagesrc = '"data:'.$row['imgtype'].';base64,'.$row['picture'].'"';

                            echo('<td><img src='.$imagesrc.' class="playerimg"></td>');
                        }
                        catch(PDOException $e)
                        {
                            echo('<div id="errorbox">'.$e->getMessage().'</div><br>');
                        }

                        echo('<td>' . $row['firstName'] . '</td>');
                        echo('<td>' . $row['lastName'] . '</td>');
                        echo('<td>' . $teamCodes[$row['team']] . '</td>');
                        echo('<td>' . $row['position'] . '</td>');
                        echo('<td>' . $row['points'] . '</td>');
                        echo('<td>' . $row['goals'] . '</td>');
                        echo('<td>' . $row['assists'] . '</td>');
                        echo('<td>' . $row['gaa'] . '</td>');
                        echo('<td>' . $row['save_percent'] . '</td>');
                        echo('<td>' . $row['shutouts'] . '</td>');

                        echo('<td>
                        <form method="POST" action="rosteredit.php">
                            <input type="hidden" name="pk" value="' . $row['player_id'] . '">
                            <input type="submit" value="Delete Player">
                        </form>
                        </div>
                        </td>
                        ');

                        echo('</tr>');

                    

                        
                    }
                    echo('</table>
                    <br><br>
                    <a href="roster.php">Exit</a>
                    </div>
                    ');
                }
            ?>
            
        </div>
    </body>
</html>