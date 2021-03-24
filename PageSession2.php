<?php

session_start();
    $hostname = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "php_project";
        $conn = mysqli_connect( $hostname, $username, $password );
        if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );

        if(isset($_GET['user']))
        {
            $check = isset($_GET['check'])?$_GET['check']:"0";
            $user = $_GET['user'];
            $status="Offline";
            $sql = "SELECT * FROM user where Username='$user'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {

                    $sql3 = "UPDATE user SET Status = 'Online' WHERE Username = '$user'";
            
                    if (mysqli_query($conn, $sql3)) {
                        echo "<script>alert('online');</script>"; 
                    }


                        if($check!=0)
                        echo "<script type='text/javascript'>alert('hello');window.location.href = 'PageSession2.php?user=$user';</script>";

                    }
            } 
            
            mysqli_close($conn);
        }
?>

<html>

<head>

<title>ThaiCreate.Com Tutorial</title>

</head>

<body>

Session Check.<br>

session_id(); = <?php echo session_id();?><br>

$strName = <?php echo $_SESSION["strName"];?><br>

$strSiteName = <?php echo $_SESSION["strSiteName"];?><br>

<br>

<a href="PageSession3.php">Delete Session</a>

</body>

</html>