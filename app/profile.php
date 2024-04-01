<?php
require("connection/database.php");
session_start();
$id  = $_SESSION['id'];
$queryProfile = "SELECT a.*, av.name as avatar FROM account a INNER JOIN avatar av on a.avatar = av.id where a.id = $id";
$queryResults = mysqli_query($conn, $queryProfile);
$queryAssoc   = mysqli_fetch_assoc($queryResults);

if(isset($_POST['submit'])){
    if(isset($_POST['username']) and isset($_POST['email']) and isset($_POST['gender'])){
        $usernameUpdate = $_POST['username'];
        $emailUpdate = $_POST['email'];
        $genderUpdate = $_POST['gender'];
        $updateQuery  = "UPDATE account set username = '$usernameUpdate', email = '$emailUpdate', gender = '$genderUpdate' WHERE id = $id";
        $updateResults = mysqli_query($conn,$updateQuery);
        header("Location: profile.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS NINJA</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php include('includes/user.php'); ?>
        
        </div>
        <div class="dashboard">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="entryDash active" id="menuItem">
                    <p>PROFILE</p>
                    <svg onclick="goPage('menu')" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 1024 1024"><path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z"/></svg>
                </div>
                <div class="entryDash ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><g fill="currentColor"><circle cx="12" cy="6" r="4"/><path d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z"/></g></svg>
                    <input type="text" value="<?php echo $queryAssoc['username']; ?>" name="username">
                </div>
                <div class="entryDash ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="78.77" viewBox="0 0 13 16"><path fill="currentColor" d="M4 10h5c1.66 0 3 1.34 3 3v2H1v-2c0-1.66 1.34-3 3-3Zm0-6h5v2.5a2.5 2.5 0 0 1-5 0V4Zm5 0c.55 0 1 .45 1 1s-.45 1-1 1V4ZM4 6c-.55 0-1-.45-1-1s.45-1 1-1v2Z"/><path fill="currentColor" d="M4.12 4.12h-.5C2.87 3.5 3 2.55 3 1.75s.5-.26 1-.26s1 .5 1 .5c-.88 0-1-1-1-1h3c1.1 0 2 .9 2 2h.5s.25.75-.12 1.25l-5.25-.12Z"/></svg>
                    <input type="text" value="<?php echo $queryAssoc['avatar']; ?>" readonly>
                </div>
                <div class="entryDash ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z"/></svg>
                    <input type="email" value="<?php echo $queryAssoc['email']; ?>" name="email">
                </div>
                <div class="entryDash ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 256 256"><path fill="currentColor" d="M152 140a36 36 0 1 1-36-36a36 36 0 0 1 36 36Zm64-100v176a16 16 0 0 1-16 16H56a16 16 0 0 1-16-16V40a16 16 0 0 1 16-16h144a16 16 0 0 1 16 16Zm-24 32a8 8 0 0 0-8-8h-32a8 8 0 0 0 0 16h12.69l-18 18A52.08 52.08 0 1 0 158 109.35l18-18V104a8 8 0 0 0 16 0Z"/></svg>
                    <input type="text" value="<?php echo $queryAssoc['gender']; ?>" name="gender">
                </div>
                <div class="entryDash active btnSubmit">
                    <button type="submit" name="submit">Edit Profile</button>
                </div>
            </form>   
        </div>
    </div>
    <audio id="background-music" src="music/bg_music.mp3" loop style="display:none;"></audio>
    <script src="mainscript.js"></script>
</body>
</html>