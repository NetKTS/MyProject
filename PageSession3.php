<?php

session_start();

//unset($_SESSION["strName"]); // ลบบาง Session

$hostname = "localhost";
$username = "root";
$password = "12345678";
$dbname = "php_project";
$money;
$conn = mysqli_connect( $hostname, $username, $password );
if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );

//unset($_SESSION["strSiteName"]); // ลบบาง Session

if(session_destroy()){

        $sql = "SELECT * FROM user where Username='$user'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["Username"]==$user) $money = $row["Money"];
                    
                    
                    $sql3 = "UPDATE user SET Status = 'Offline' WHERE Username = '$user'";
            
                    if (mysqli_query($conn, $sql3)) {
                        echo "<script>alert('offline');</script>"; 
                    }
                    
                }
            } 

        
        
        if($topup != 0){
            echo "<script>
            //alert('topup = 100');
            window.location.href = 'Wallet2.php?user=$user';
            </script>"; 
        }

}; // ลบ Session ทั้งหมด


?>

<html>

<head>

<title>ThaiCreate.Com Tutorial</title>

</head>

<body>

Created Check.<br>

$strName = <?php echo $_SESSION["strName"];?><br>

$strSiteName = <?php echo $_SESSION["strSiteName"];?><br>

<br>

<a href="PageSession1.php">Create Session</a><br>

<a href="PageSession2.php">Check Session</a><br>

</body>

</html>