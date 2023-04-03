<?php
session_start();
$email=$_SESSION['email'];
   
    require_once 'conn.php'; 
    if(ISSET($_POST['save'])){      
	$sqlq="SELECT logid from tbl_login where email='$email'";
    $resu = mysqli_query($conn, $sqlq);
    $row = mysqli_fetch_assoc($resu);
	  $logid= $row['logid'];
      echo $email;
        $cname = $_POST['cname'];
        $class = $_POST['class'];
        $title = $_POST['title'];
        $file_name = $_FILES['video']['name'];
        $file_temp = $_FILES['video']['tmp_name'];
        $file_size = $_FILES['video']['size'];
 
        if($file_size < 50000000){
            $file = explode('.', $file_name);
            $end = end($file);
            $allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
            if(in_array($end, $allowed_ext)){
                $name = date("Ymd").time();
                $location = 'video/'.$name.".".$end;
                if(move_uploaded_file($file_temp, $location)){
                    mysqli_query($conn, "INSERT INTO `video` (`logid`, `cname`, `class`, `title`, `name`, `location`) VALUES('$logid', '$cname', '$class', '$title', '$name', '$location')");
                    echo "<script>alert('Video Uploaded successfully')</script>";
                    echo "<script>window.location = 'index.php'</script>";
                }
            }else{
                echo "<script>alert('Wrong video format')</script>";
                echo "<script>window.location = '#'</script>";
            }
        }else{
            echo "<script>alert('File too large to upload')</script>";
            echo "<script>window.location = '#'</script>";
        }
    }
?>