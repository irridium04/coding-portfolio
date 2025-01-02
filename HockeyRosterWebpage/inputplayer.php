<?php

    require 'dbconnect.php'; // database connection

    // form has been submitted
    if(isset($_POST['firstName']) && !empty($_POST['firstName']))
    {

        echo('<head>
        <title>Hockey Player Roster - Add Player</title>
        <link rel="stylesheet" href="style.css">
        </head>');
        // get the file
        $theFileName = $_FILES['img']['tmp_name'];

        $imagesize = filesize($theFileName);

        $imagetype = mime_content_type($theFileName);

        
    
        // encode to base 64
        // base 64 is a common form of handling data and is used
        // to ensure that the handling of bits across the network are correct

        $img = base64_encode(file_get_contents($_FILES['img']['tmp_name']));

        // ------------------------------------------------
        // sql statement

        // the following code was made by my custom Java program found in my github: https://github.com/irridium04/coding-portfolio

        // *** AUTO GENERATED BY PHP_SQL_Code_Generator.java *** 
        $sql_Insert =  	"INSERT INTO tbl_player".
        "(firstName,lastName,team,position,picture,imgtype,imgsize,points,goals,assists,gaa,save_percent,shutouts) ".
        "VALUES(:firstName,:lastName,:team,:position,:picture,:imgtype,:imgsize,:points,:goals,:assists,:gaa,:save_percent,:shutouts)";

        $sql_Insert =  $pdo->prepare($sql_Insert);
        $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
        $team = filter_var($_POST['team'], FILTER_SANITIZE_STRING);
        $position = filter_var($_POST['position'], FILTER_SANITIZE_STRING);
        
        $points = filter_var($_POST['points'], FILTER_SANITIZE_STRING);
        $goals = filter_var($_POST['goals'], FILTER_SANITIZE_STRING);
        $assists = filter_var($_POST['assists'], FILTER_SANITIZE_STRING);
        $gaa = filter_var($_POST['gaa'], FILTER_SANITIZE_STRING);
        $save_percent = filter_var($_POST['save_percent'], FILTER_SANITIZE_STRING);
        $shutouts = filter_var($_POST['shutouts'], FILTER_SANITIZE_STRING);

        $sql_Insert->bindparam("firstName", $firstName);
        $sql_Insert->bindparam("lastName", $lastName);
        $sql_Insert->bindparam("team", $team);
        $sql_Insert->bindparam("position", $position);
        $sql_Insert->bindparam("picture", $img);
        $sql_Insert->bindparam("imgtype",$imagetype);
        $sql_Insert->bindparam("imgsize",$imagesize);
        $sql_Insert->bindparam("points", $points);
        $sql_Insert->bindparam("goals", $goals);
        $sql_Insert->bindparam("assists", $assists);
        $sql_Insert->bindparam("gaa", $gaa);
        $sql_Insert->bindparam("save_percent", $save_percent);
        $sql_Insert->bindparam("shutouts", $shutouts);

        try
        {
            $upcheck = $sql_Insert->execute();
        }
        catch (PDOException $e)
        {
            $upcheck = false;
            echo('<div id="errorbox">Failed: '. $e->getMessage() .'</div>');
        }
        // *** END AUTO GENERATED CODE ***


        if ($upcheck)
        {
            echo('
            <div id="successbox">File uploaded correctly <a href="roster.php">View Roster</a></div><br>
            ');
        }
        else
        {
            echo('<br> <div id="errorbox">************* FILE UPLOAD FAILED **************</div>');
        }

    }
    else // html for if form has not been submitted
    {
        echo('
            <!DOCTYPE html>
            <html>
                <head>
                    <title>Hockey Player Roster - Add Player</title>
                    <link rel="stylesheet" href="style.css">
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
                        <form accept="inputplayer.php" method="POST" enctype="multipart/form-data">
                            <table id=imgtable>
                                
                                <tr>
                                    <td>Player Image</td>
                                    <td>
  
                                    <input  type="file" name="img" accept=".jpg,.jpeg,.png" oninput="pic.src=window.URL.createObjectURL(this.files[0])" required>
                                    
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="2"><img id="pic"></td>
                                </tr>
                                
                                <tr>
                                    <td>First Name</td>
                                    <td><input type="text" name="firstName" required></td>
                                </tr>

                                <tr>
                                    <td>Last Name</td>
                                    <td><input type="text" name="lastName" required></td>
                                </tr>

                                <tr>
                                    <td>Team</td>
                                    <td>
                                        <select id="team" name="team" required>
                                            <option value="ANA">Anaheim Ducks</option>
                                            <option value="ARI">Arizona Coyotes</option>
                                            <option value="BOS">Boston Bruins</option>
                                            <option value="BUF">Buffalo Sabres</option>
                                            <option value="CGY">Calgary Flames</option>
                                            <option value="CAR">Carolina Hurricanes</option>
                                            <option value="CHI">Chicago Blackhawks</option>
                                            <option value="COL">Colorado Avalanche</option>
                                            <option value="CBJ">Columbus Blue Jackets</option>
                                            <option value="DAL">Dallas Stars</option>
                                            <option value="DET">Detroit Red Wings</option>
                                            <option value="EDM">Edmonton Oilers</option>
                                            <option value="FLA">Florida Panthers</option>
                                            <option value="LAK">Los Angeles Kings</option>
                                            <option value="MIN">Minnesota Wild</option>
                                            <option value="MTL">Montreal Canadiens</option>
                                            <option value="NSH">Nashville Predators</option>
                                            <option value="NJD">New Jersey Devils</option>
                                            <option value="NYI">New York Islanders</option>
                                            <option value="NYR">New York Rangers</option>
                                            <option value="OTT">Ottawa Senators</option>
                                            <option value="PHI">Philadelphia Flyers</option>
                                            <option value="PIT">Pittsburgh Penguins</option>
                                            <option value="SJS">San Jose Sharks</option>
                                            <option value="SEA">Seattle Kraken</option>
                                            <option value="STL">St. Louis Blues</option>
                                            <option value="TBL">Tampa Bay Lightning</option>
                                            <option value="TOR">Toronto Maple Leafs</option>
                                            <option value="VAN">Vancouver Canucks</option>
                                            <option value="VGK">Vegas Golden Knights</option>
                                            <option value="WSH">Washington Capitals</option>
                                            <option value="WPG">Winnipeg Jets</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Position</td>
                                    <td>
                                        <select id="position" name="position">
                                            <option value="goaltender">Goaltender</option>
                                            <option value="defensemen">Defensemen</option>
                                            <option value="center">Center</option>
                                            <option value="left-wing">Left Wing</option>
                                            <option value="right-wing">Right Wing</option>
                                        </select>
                                    </td>

                                </tr>

                                <tr>
                                    <td>Points</td>
                                    <td><input type="number" name="points" min="0"></td>
                                </tr>

                                <tr>
                                    <td>Goals</td>
                                    <td><input type="number" name="goals" min="0"></td>
                                </tr>

                                <tr>
                                    <td>Assists</td>
                                    <td><input type="number" name="assists" min="0"></td>
                                </tr>

                                <tr>
                                    <td>GAA</td>
                                    <td><input type="number" name="gaa" step="0.01" min="0"></td>
                                </tr>

                                <tr>
                                    <td>SV%</td>
                                    <td><input type="number" name="save_percent" step="0.01" min="0" max="1"></td>
                                </tr>

                                <tr>
                                    <td>Shutouts</td>
                                    <td><input type="number" name="shutouts" min="0"></td>
                                </tr>

                                <tr>
                                    <td colspan="2"><input type="submit" value="Add Player To Roster"></td>
                                </tr>
                            </table>
                        </form>

                    
                    </div>
                </body>
            </html>
        ');
    }
?>