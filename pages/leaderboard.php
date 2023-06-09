<?php
require("connection/database.php");
session_start();
$query = "SELECT a.username as username, a.level as level, av.photo as photo from account a INNER JOIN avatar av on a.avatar = av.id  order by a.points desc limit 5";
$results = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/leaderboard.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php include("includes/user.php"); ?>
        </div>
        <div class="dashboard">
                <div class="entryDash active" id="menuItem">
                    <p>LEADERBOARDS</p>
                    <svg onclick="goPage('menu')" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 1024 1024"><path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z"/></svg>
                </div>
                <?php 
                while($row = mysqli_fetch_assoc($results)){
                ?>
                <div class="entryDash ">
                    <img src="../images/<?php echo $row['photo']; ?>" alt="">
                    <p><?php echo $row['username']; ?></p>
                    <div class="questNum">
                        <p><?php echo "LVL ".$row['level']; ?></p>
                    </div>
                </div>
                <?php } ?>
                
                <div class="entryDash active" >
                    <img src="../images/<?php echo $photo; ?>" alt="">
                    <p><?php echo $user['username']; ?></p>
                    <div class="questNum">
                        <p><?php echo "LVL ".$user['level'];; ?></p>
                    </div>
                </div>

        </div>
    </div>
    <audio id="background-music" src="music/bg_music.mp3" loop style="display:none;"></audio>
    <script src="mainscript.js"></script>

</body>
</html>