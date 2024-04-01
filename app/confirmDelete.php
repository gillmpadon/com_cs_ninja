<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS NINJA</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/menu.css">
    <style>
        .entryDash input {
            width: 90%;
            margin: auto;
        }

        .entryDash input::placeholder {
            color: var(--colorText);
        }
    </style>
    <link rel="stylesheet" href="./includes/toast.css">
</head>

<body>
    <div class="container">
        <div class="profile">
            <?php
            session_start();
            require('connection/database.php');
            $idDelete = $_SESSION['id'];
            $idPass = $_SESSION['password'];
            if (isset($_GET['password'])) {
                $password = $_GET['password'];
                if ($idPass == $password) {
                    $queryDelete = "DELETE FROM account where id = $idDelete";
                    if (mysqli_query($conn, $queryDelete)) {
                        echo "<script>window.location.href='confirmDelete.php?delete=true'</script>";
                        exit();
                    } else {
                        echo mysqli_error($conn);
                    }
                } else {
                    echo "<script>window.location.href='confirmDelete.php?incorrect=true'</script>";
                }
            }
            include("includes/user.php"); ?>
        </div>
        <div class="dashboard">
            <div class="entryDash active" id="menuItem">
                <p>Confirmation</p>
                <svg onclick="goPage('menu')" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 1024 1024">
                    <path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z" />
                </svg>
            </div>
            <div class="entryDash">
                <input id="password" type="text" placeholder="Enter Password to Delete Account">
            </div>
            <div class="entryDash btnSubmit active">
                <p id="submit">Delete Account</p>
            </div>
        </div>
    </div>
    <?php include('./includes/toast.php'); ?>
    <script>
        const submit = document.getElementById('submit');
        submit.addEventListener('click', function() {
            const password = document.getElementById('password').value;
            if (password.length > 0) {
                window.location.href = 'confirmDelete.php?password=' + password;
            } else {
                alert('Password Cannot Be Empty');
            }

        })
    </script>
    <audio id="background-music" src="music/bg_music.mp3" loop style="display:none;"></audio>
    <script src="mainscript.js"></script>
</body>

</html>