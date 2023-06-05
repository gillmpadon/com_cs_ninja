<?php
require('connection/database.php');
if(isset($_POST['submit'])){
    if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query = "INSERT INTO account(username, password, email) VALUES('$username', '$password', '$email')";
        $results = mysqli_query($conn,$query);
        if($results){
            echo "<script>alert('Succesful');</script>";
        }else{
            echo "Query error: " . mysqli_error($conn);
        }
    }else{
        echo "<script>alert('Username, Password and Email Must have value');</script>";
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
    <link rel="stylesheet" href="../css/form.css">
    <script src="../script/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="topBox" >
            <div class="entry" id="head">
                <h2>SIGN UP</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path fill="white" d="M297.688 21.063c-15.634.137-31.488 4.074-46.657 12.343c34.997-2.542 65.762 8.182 74.345 33.938c-128.86-16.852-260.25 113.34-31.72 245.187c62.006 35.773 19.38 127.795-104.31 75.095C24.494 317.39 36.47 186.86 95.844 118.562c7.322 12.328 13.418 26.194 18.936 40.75c19.067-48.595 56.388-68.62 93.595-88.812c-52.197-24.58-102.01-14.783-150.906 8.406c10.362 5.744 19.104 13.503 26.655 22.72c-113.558 67.915-77.773 280.4 71.406 366.53c189.853 109.61 414.786-132.238 208.157-211.062c-151.438-57.77-111.705-139.905-38.03-126.156l2.624 42.625l141.345 39.375l20.906-60.657c-28.94-12.513-52.207-26.577-71.092-43.843c1.268-28.244-10.66-56.505-33.907-84.75c.757 13.793.603 27.582-1.592 41.376c-22.21-28.084-53.733-44.287-86.25-44zm43.437 65.374c23 7.268 44.722 20.866 62 44.094c-33.73 15.82-69.124-5.32-62-44.093z"/></svg>
            </div>
        </div>

        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">

            <div class="topBox">
                <div class="entry">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><path fill="white" d="M7.5 0a3.499 3.499 0 1 0 0 6.996A3.499 3.499 0 1 0 7.5 0Zm-2 8.994a3.5 3.5 0 0 0-3.5 3.5v2.497h11v-2.497a3.5 3.5 0 0 0-3.5-3.5h-4Z"/></svg>
                    <input type="text" placeholder="username" name="username">
                </div>
            </div>
            <div class="topBox" id="passEntry">
                <div class="entry">
                    <svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" viewBox="0 0 256 256"><path fill="white" d="M160 16a80.07 80.07 0 0 0-76.09 104.78l-57.57 57.56A8 8 0 0 0 24 184v40a8 8 0 0 0 8 8h40a8 8 0 0 0 8-8v-16h16a8 8 0 0 0 8-8v-16h16a8 8 0 0 0 5.66-2.34l9.56-9.57A80 80 0 1 0 160 16Zm20 76a16 16 0 1 1 16-16a16 16 0 0 1-16 16Z"/></svg>
                    <input class="password-input" type="password" placeholder="password" name="password">
                </div>
                <svg onclick="togglePasswordVisibility()"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5Z"/></svg>
            </div>
            <div class="topBox">
                <div class="entry">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z"/></svg>
                    <input type="text" placeholder="email" name="email">
                </div>
            </div>

            <div class="botBtn">
                <button name="submit" type="submit">SUBMIT</button>
                <p onclick="goPage('signin')">LOGIN HERE NOW!</p>
            </div>
            
        </form>

    </div>
</body>
</html>