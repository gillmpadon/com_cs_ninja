<?php
   $conn = mysqli_connect("localhost","root","","csninja");
    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }