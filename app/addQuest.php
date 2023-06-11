<?php
require('connection/database.php');
session_start();
$queryAll = "SELECT * FROM quiz order by date_created desc";
$resultAll = mysqli_query($conn,$queryAll);
$first = false;
$create = false;
$operation = false;

if (!isset($_GET['read']) && !isset($_GET['edit']) && !isset($_GET['update']) && !isset($_GET['delete'])  && !isset($_GET['create'])) {
    $first = true;
    $queryFirst = "SELECT * FROM quiz where id = 1 order by date_created desc";
    $resultFirst = mysqli_query($conn,$queryFirst);
    $assocFirst =  mysqli_fetch_assoc($resultFirst);
    $operation = true;
}

if(isset($_GET['create'])){
    $create = true;
    if(isset($_GET['problem_name']) && isset($_GET['problem_question']) && isset($_GET['problem_template']) && isset($_GET['problem_output'])){
        $problem_name = $_GET['problem_name'];
        $problem_question = $_GET['problem_question'];
        $problem_template = $_GET['problem_template'];
        $problem_output = $_GET['problem_output'];
        $queryInsert = "INSERT INTO quiz(name,question,template,output) VALUES('$problem_name', '$problem_question', '$problem_template', '$problem_output')";
        $resultInsert = mysqli_query($conn,$queryInsert);
        if($resultInsert){
            echo "<script>alert('Create Successful')</script>";
            echo "<script>window.location.href='addQuest.php'</script>";
            exit();
        }else{
            echo "<script>alert('Create Unsuccessful')</script>";
            echo mysqli_error($conn);
        }
    }
}

if(isset($_GET['read'])){
    $id = $_GET['read'];
    $query = "SELECT * FROM quiz WHERE id = $id";
    $resultQuery = mysqli_query($conn,$query);
    $assocQuery = mysqli_fetch_assoc($resultQuery);
    $operation = true;
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $query = "SELECT * FROM quiz WHERE id = $id";
    $resultQuery = mysqli_query($conn,$query);
    $assocQuery = mysqli_fetch_assoc($resultQuery);
    $operation = false;
}

if(isset($_GET['update'])){
    $id = $_GET['update'];
    if(isset($_GET['problem_name']) && isset($_GET['problem_question']) && isset($_GET['problem_template']) && isset($_GET['problem_output'])){
        $problem_name = $_GET['problem_name'];
        $problem_question = $_GET['problem_question'];
        $problem_template = $_GET['problem_template'];
        $problem_output = $_GET['problem_output'];
        $query = "UPDATE quiz SET  name = '$problem_name', question = '$problem_question', template = '$problem_template', output = '$problem_output' where id = $id";
        $resultUpdate = mysqli_query($conn,$query);
        if($resultUpdate){
            echo "<script>alert('Update Done')</script>";
            echo "<script>window.location.href='addQuest.php'</script>";
        }else{
            echo mysqli_error($conn);
        }
    }else{
        echo "<script>alert('All inputs must have values')</script>";
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM quiz where id = $id";
    $resultQuery = mysqli_query($conn,$query);
    echo "<script>alert('Delete Succesful')</script>";
    echo "<script>window.location.href='addQuest.php'</script>";
    exit();
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
    <link rel="stylesheet" href="css/addQuest.css">
</head>
<body>
    <div class="container">
        <div class="profile">
          
            <div class="coding">
                <div class="codeEntry">
                    <div class="problem">
                        <p>FUNCTION NAME</p>
                        <input type="text" id="input_problem_name" <?php echo $create ? '' : ($first ? 'value=' . $assocFirst['name'] : 'value=' . $assocQuery['name']) ?> <?php echo $operation ? 'readonly' : '' ?>>

                        <p>QUESTION</p>
                        <textarea  id="input_problem" cols="3" rows="1" <?php echo ($operation)? "readonly":"" ?>><?php echo $create ? '' :($first? $assocFirst['question'] : $assocQuery['question']) ?></textarea>
                    </div>
                </div>
                <div class="codeEntry">
                    <div class="problem">
                        <p>SOLUTION</p>
                       <textarea  id="input_template" cols="30" rows="3" <?php echo ($operation)? "readonly":"" ?>><?php echo $create ? '' :($first? $assocFirst['template'] : $assocQuery['template']) ?></textarea>
                    </div>
                </div>
                <div class="codeEntry " >
                    <div class="problem">
                        <p>OUTPUT<input  type="text" id="input_output" <?php echo  $create ? '' :($first? "value=".$assocFirst['output']."" : "value=".$assocQuery['output']."") ?> <?php echo ($operation)? "readonly":"" ?>></p>
                    </div>
                </div>
                <div class="btnCode">
                    <button onclick="editItem(<?php echo $assocQuery['id'] ?>)">EDIT</button>
                    <button onclick="updateItem(<?php echo $create? '1': $assocQuery['id'] ?>,'<?php echo $create? 'create':'update' ?>')" id="buttonSubmit" >SAVE</button>

                </div>
            </div>

        </div>
        <div class="dashboard">
                <div class="entryDash active" id="menuItem" onclick="goPage('menu')">
                    <p>LEADERBOARDS</p>
                    <svg onclick="goPage('menu')" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 1024 1024"><path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z"/></svg>
                </div>
                <div class="scrollQuest">
                    <?php while($assocAll = mysqli_fetch_assoc($resultAll)){ ?>
                    <div class="entryDash" >
                        <p onclick="readItem(<?php echo $assocAll['id']?>)"><?php echo $assocAll['name'] ?></p>
                        <div class="questNum">
                           <?php 
                           $row_count= mysqli_num_rows($resultAll);
                           if($row_count!=1){ ?>
                           <svg onclick="deleteItem(<?php echo $assocAll['id']?>)" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="white" d="M12 4c-4.419 0-8 3.582-8 8s3.581 8 8 8s8-3.582 8-8s-3.581-8-8-8zm3.707 10.293a.999.999 0 1 1-1.414 1.414L12 13.414l-2.293 2.293a.997.997 0 0 1-1.414 0a.999.999 0 0 1 0-1.414L10.586 12L8.293 9.707a.999.999 0 1 1 1.414-1.414L12 10.586l2.293-2.293a.999.999 0 1 1 1.414 1.414L13.414 12l2.293 2.293z"/></svg>
                           <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                   
                </div>

                <div class="entryDash btnSubmit" >
                    <p onclick="createItem()">CREATE QUEST</p>
                </div>

        </div>
    </div>

    <audio id="background-music" src="music/bg_music.mp3" loop style="display:none;"></audio>
    <script src="mainscript.js"></script>
    <script>
        const createItem = ()=> window.location.href = "addQuest.php?create=1";
        const readItem = (item)=> window.location.href = "addQuest.php?read="+item;
        const editItem = (item)=> window.location.href = "addQuest.php?edit="+item;
        const deleteItem = (item) => window.location.href = "addQuest.php?delete="+item;
        const updateItem = (item,query)=> {
            const input_name = document.getElementById('input_problem_name').value;
            const input_problem = document.getElementById('input_problem').value;
            const input_template = document.getElementById('input_template').value;
            const input_output = document.getElementById('input_output').value;
            if(input_name==''||input_problem==''||input_output==''||input_template==''){
                alert('Do not leave empty input');
            }else{
                window.location.href =`addQuest.php?${query}=${item}&problem_name=${input_name}&problem_question=${input_problem}&problem_template=${input_template}&problem_output=${input_output}`;
            }
        }
    </script>
</body>
</html>