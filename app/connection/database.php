<?php
   $conn = mysqli_connect("sql303.infinityfree.com","if0_36278329","d1DXNtU1OjuXps","if0_36278329_mydb");
    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }