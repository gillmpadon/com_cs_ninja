<?php
require('connection/database.php');
if(isset($_POST['submit'])){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $query = "SELECT * FROM account where email='$email'";
        $results = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_array($results);
        if($fetch['email'] == $email){
            header("Location: reset.php?email=$email");
            exit();
        }else{
            echo "<script>alert('No user found by email');</script>";
        }
    }else{
        echo "<script>alert('Email must not be empty');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <div class="topBox" >
            <div class="entry" id="head">
                <h2>FORGOT PASS</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path fill="white" d="M297.688 21.063c-15.634.137-31.488 4.074-46.657 12.343c34.997-2.542 65.762 8.182 74.345 33.938c-128.86-16.852-260.25 113.34-31.72 245.187c62.006 35.773 19.38 127.795-104.31 75.095C24.494 317.39 36.47 186.86 95.844 118.562c7.322 12.328 13.418 26.194 18.936 40.75c19.067-48.595 56.388-68.62 93.595-88.812c-52.197-24.58-102.01-14.783-150.906 8.406c10.362 5.744 19.104 13.503 26.655 22.72c-113.558 67.915-77.773 280.4 71.406 366.53c189.853 109.61 414.786-132.238 208.157-211.062c-151.438-57.77-111.705-139.905-38.03-126.156l2.624 42.625l141.345 39.375l20.906-60.657c-28.94-12.513-52.207-26.577-71.092-43.843c1.268-28.244-10.66-56.505-33.907-84.75c.757 13.793.603 27.582-1.592 41.376c-22.21-28.084-53.733-44.287-86.25-44zm43.437 65.374c23 7.268 44.722 20.866 62 44.094c-33.73 15.82-69.124-5.32-62-44.093z"/></svg>
            </div>
        </div>

        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            <div class="topBox">
                <div class="entry">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z"/></svg>
                    <input type="email" placeholder="email" name="email">
                </div>
            </div>

            <div class="botBtn">
                <button name="submit" type="submit">SUBMIT</button>
                <p onclick="goPage('signin')">CANCEL PROCESS</p>
            </div>
            
        </form>

    </div>
    <audio id="background-music" src="music/bg_music.mp3" loop style="display:none;"></audio>
    <script src="mainscript.js"></script>
</body>
</html>