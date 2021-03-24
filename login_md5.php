<form action="">
<H1>Login</h1>
  Username: <input type="text" name="username"><br>
  Password: <input type="text" name="password"><br>
  <input type="submit" value="Login">
</form>
<?php

$hostname = "localhost";
$username = "root";
$password = "12345678";
$dbname = "guy";
$conn = mysqli_connect( $hostname, $username, $password );
if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );

if(isset($_GET['username'])&&isset($_GET['password']))
{
    $user=$_GET['username'];
    $pass=$_GET['password'];
    
    $sql = "SELECT * FROM user where username='$user'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row["username"]==$user&&$row["password"]==$pass)
            {
                $message = "wrong answer";
                echo "<script type='text/javascript'>alert('$message');window.location.href = 'Login.php';</script>";
                
            }
        }
    } 
    mysqli_close($conn);
}

?>