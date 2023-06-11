<?php
require('connection/database.php');
session_start();
$user_id=$_SESSION['id'];
$id = (isset($_GET['id_quest']))? $_GET['id_quest']: 1;
$query  = "SELECT * from quiz where  id =$id and DATE(date_created) = CURDATE()";
$results = mysqli_query($conn,$query);
$assoc = mysqli_fetch_assoc($results);

$queryAll  = "SELECT * from quiz where DATE(date_created) = CURDATE()";
$resultsAll = mysqli_query($conn,$queryAll);
$assocAll = mysqli_fetch_assoc($results);


$checkTest = "SELECT quiz_id FROM test WHERE user_id = $user_id group by quiz_id";
$assocTestResult = mysqli_query($conn, $checkTest);
$testOkay = array();

if ($assocTestResult) {
    while ($row = mysqli_fetch_assoc($assocTestResult)) {
        $testOkay[] = $row['quiz_id'];
    }
} 

if(isset($_GET['output'])){
    $insertTest = "INSERT INTO test(user_id,quiz_id,status) values($user_id,$id,1);";
    $resultTest = mysqli_query($conn, $insertTest);
    if($resultTest){
        echo "<script>alert('You earned a Point');</script>";
        $pts = mysqli_num_rows($assocTestResult);
        $updateLevel ="UPDATE account set points = $pts , level = FLOOR($pts/2) where id = $user_id";
        $updateRes = mysqli_query($conn,$updateLevel);
        $id++;
        // echo "<script>setTimeout(function() { window.location.href = 'quest.php?id_quest=$id'; }, 1000);</script>";
        exit();
    }else{
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/quest.css">
</head>
<body>
    <div class="container">
        <div class="profile">
          
            <div class="coding">
                <div class="codeEntry">
                    <div class="problem">
                        <p>Question</p>
                        <p><?php echo "Q".$assoc['id'].". ".$assoc['question'] ?></p>
                    </div>
                </div>
                <div class="codeEntry">
                    <div class="problem">
                        <p>Problem</p>
                       <textarea  name="" id="solution" cols="30" rows="3"><?php echo $assoc['template'] ?></textarea>
                    </div>
                </div>
                <div class="codeEntry " >
                    <div class="problem">
                        <p>Output</p><br>
                        <p>Expected Output: <?php echo $assoc['output'] ?></p>
                        <p >Your Output: <span id="output"></span> </p>
                    </div>
                </div>
                <div class="btnCode">
                    <button onclick="getCode()">CHECK</button>
                    <button onclick="submitCode()" id="buttonSubmit">SUBMIT</button>
                </div>
            </div>
        </div>
        <div class="dashboard">
                <div class="entryDash active" id="menuItem" onclick="goPage('menu')">
                    <p>LEADERBOARDS</p>
                    <svg onclick="goPage('menu')" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 1024 1024"><path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z"/></svg>
                </div>
                <?php 
                while($assocAll = mysqli_fetch_assoc($resultsAll)){
                ?>
                <div class="entryDash <?php echo ($id == $assocAll['id'])? "activeItem":"" ?>  <?php echo (in_array($assocAll['id'],$testOkay))? "activeItem":""  ?> " onclick="window.location.href='quest.php?id_quest=<?php echo $assocAll['id'] ?>'">
                    <p><?php echo strtoupper($assocAll['name']) ?></p>
                    <div class="questNum">
                        <p><?php echo (in_array($assocAll['id'],$testOkay))? "Completed": "Q".$assocAll['id'];  ?></p>
                    </div>
                </div>
                <?php } ?>
                <div class="entryDash btnSubmit" >
                    <p onclick="goPage('menu')">SAVE PROGRESS</p>
                </div>

        </div>
    </div>

    <script>
        const buttonSubmit = document.getElementById('buttonSubmit');
        buttonSubmit.style.visibility='hidden';
        const compileCode = (str) => eval(str) ;
        function checkCode(){
            const textareaValue  = document.getElementById('solution').value;
            const answer = compileCode(textareaValue)
            const expectedOutput = "<?php echo $assoc['output'] ?>";
            if(answer == expectedOutput){
                buttonSubmit.style.visibility ='visible';
            }else{
                buttonSubmit.style.visibility = 'hidden';
            }
            console.log(answer+" output")
            console.log(expectedOutput+" expectedoutput")
            return answer
        }
        function getCode(){
            const code = checkCode()
            const setResults = document.getElementById('output')
            setResults.innerHTML = code;
            
        }
        function submitCode(){
            const code = checkCode()
            window.location.href='quest.php?id_quest=<?php echo $id ?>&output='+code
        }

    </script>
     <audio id="background-music" src="music/bg_music.mp3" loop style="display:none;"></audio>
    <script src="mainscript.js"></script>
</body>
</html>