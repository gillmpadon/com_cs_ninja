<?php
$id  = $_SESSION['id'];
$userQuery = "SELECT a.username as username, a.level as level, av.photo as photo, av.intelligence as intelligence, av.strength as strength, av.speed as speed from account a INNER JOIN avatar av on a.avatar = av.id where a.id = $id";
$userResult = mysqli_query($conn, $userQuery);
$user = mysqli_fetch_assoc($userResult);
$level = $user['level'];
$photo = $user['photo'];
?>
            <div class="userProfile" onclick="goPage('profile')">
                <img src="../images/hiroshi.png" alt="">
                <p id="name"><?php echo $user['username']; ?></p>
                <p id="lvl"><?php echo "LVL ".$level; ?></p>
            </div>
            <div class="imageProfile">
                <img src="../images/<?php echo $photo; ?>" alt="">
            </div>
            <div class="userStats">
                <div class="content">
                    <div class="entry">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="56.89" viewBox="0 0 576 512"><path fill="white" d="M208 0c-29.9 0-54.7 20.5-61.8 48.2c-.8 0-1.4-.2-2.2-.2c-35.3 0-64 28.7-64 64c0 4.8.6 9.5 1.7 14C52.5 138 32 166.6 32 200c0 12.6 3.2 24.3 8.3 34.9C16.3 248.7 0 274.3 0 304c0 33.3 20.4 61.9 49.4 73.9c-.9 4.6-1.4 9.3-1.4 14.1c0 39.8 32.2 72 72 72c4.1 0 8.1-.5 12-1.2c9.6 28.5 36.2 49.2 68 49.2c39.8 0 72-32.2 72-72V64c0-35.3-28.7-64-64-64zm368 304c0-29.7-16.3-55.3-40.3-69.1c5.2-10.6 8.3-22.3 8.3-34.9c0-33.4-20.5-62-49.7-74c1-4.5 1.7-9.2 1.7-14c0-35.3-28.7-64-64-64c-.8 0-1.5.2-2.2.2C422.7 20.5 397.9 0 368 0c-35.3 0-64 28.6-64 64v376c0 39.8 32.2 72 72 72c31.8 0 58.4-20.7 68-49.2c3.9.7 7.9 1.2 12 1.2c39.8 0 72-32.2 72-72c0-4.8-.5-9.5-1.4-14.1c29-12 49.4-40.6 49.4-73.9z"/></svg>
                        <p><?php echo $user['intelligence']; ?></p>
                    </div>
                    <div class="entry">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="73.15" viewBox="0 0 448 512"><path fill="white" d="M192 0c17.7 0 32 14.3 32 32v112h-64V32c0-17.7 14.3-32 32-32zM64 64c0-17.7 14.3-32 32-32s32 14.3 32 32v80H64V64zm192 0c0-17.7 14.3-32 32-32s32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V64zm96 64c0-17.7 14.3-32 32-32s32 14.3 32 32v64c0 17.7-14.3 32-32 32s-32-14.3-32-32v-64zm-96 88v-.6c9.4 5.4 20.3 8.6 32 8.6c13.2 0 25.4-4 35.6-10.8c8.7 24.9 32.5 42.8 60.4 42.8c11.7 0 22.6-3.1 32-8.6v8.6c0 52.3-25.1 98.8-64 128v96c0 17.7-14.3 32-32 32H160c-17.7 0-32-14.3-32-32v-78.4c-17.3-7.9-33.2-18.8-46.9-32.5l-11.6-11.6c-24-24-37.5-56.6-37.5-90.5v-27c0-35.3 28.7-64 64-64h88c22.1 0 40 17.9 40 40s-17.9 40-40 40h-56c-8.8 0-16 7.2-16 16s7.2 16 16 16h56c39.8 0 72-32.2 72-72z"/></svg>
                        <p><?php echo $user['strength']; ?></p>
                    </div>
                    <div class="entry">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="white" d="m7 22l4-7.5l-8-1L15 2h2l-4 7.5l8 1L9 22H7Z"/></svg>
                        <p><?php echo $user['speed']; ?></p>
                    </div>
                </div>
            </div>