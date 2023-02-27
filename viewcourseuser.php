<html><body>
<style>
    body{
        background-image: url('https://wallpapercave.com/wp/wp1891107.jpg');
        background-repeat:no-repeat;
        background-size:cover;
    }
</style>
 <form action="requestcourse.php " method="POST">    
     
    <?php
    session_start();
    $stid=$_SESSION['stid'];
    ?>
    <input type="hidden" name="stid" value="<?php echo $stid; ?>" readonly>

 SERVICE ID:<input type="text" name="cid"autofocus/>
 <input type="hidden" readonly value="<?php session_start(); $stid=$_SESSION['stid']; echo $stid; ?>">
 <input type="submit" value="BOOK">
 <button><a href="Coursedisplay.php">HOME</a></button>
</form>
</body>
</html>