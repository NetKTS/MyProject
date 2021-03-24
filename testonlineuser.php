<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>hello</p>
<?
######################################################
# Configuration
######################################################

$server = "localhost"; // Your mySQL Server, most cases "localhost"
$db_user = "root"; // Your mySQL Username
$db_pass = ""; // Your mySQL Password
$database = "useronline"; // Database Name
$timeoutseconds = 300; //ตั้งเวลาสำหรับเช็คคนออนไลน์ เป็นวินาที 300= 5 นาที
$conn = mysqli_connect( $sever, $db_user, $db_pass );

if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );
# End Configuration - DO NOT EDIT BEHIND THIS LINE !!!
###############################################
if($action=="Install"){
mysqli_connect($server, $db_user, $db_pass) or die ("Useronline Database CONNECT Error");
mysqli_query($conn,$database, "CREATE TABLE useronline ( timestamp int(15) NOT NULL default '0', ip varchar(40) NOT NULL default '', file varchar(100) NOT NULL default '', PRIMARY KEY (timestamp), KEY ip (ip), KEY file (file)) TYPE=MyISAM") or die("Useronline Database Install Error");
echo "Useronline is install completed! ";
} else {
$timestamp=time();
$timeout=$timestamp-$timeoutseconds;
mysqli_connect($server, $db_user, $db_pass) or die ("Useronline Database CONNECT Error");
// เมื่อมีการโหลดเวบเพจขึ้นมา จะกำหนดให้เก็บค่า IP ของคนเยี่ยมชม และเวลาที่โหลดหน้าเวบเพจ ลงในฐานข้อมูลทันที
mysqli_query($conn,$database, "INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')") or die("Useronline Database INSERT Error");
//หลังจากนั้นเช็คว่า คนเยี่ยมชมหมายเลข IP ใด เกินกำหนดเวลาที่ตั้งไว้แล้ว ให้ลบออกฐานข้อมูล
mysqli_query($conn,$database, "DELETE FROM useronline WHERE timestamp<$timeout") or die("Useronline Database DELETE Error");
//ให้นับจำนวนเรคคอร์ดในตารางทั้งหมด ที่มี IP ต่างกัน ว่ามีเท่าไหร่ โดย IP เดียวกันให้นับเป็นคนเดียว
$result=mysqli_query($conn,$database, "SELECT DISTINCT ip FROM useronline WHERE file='$PHP_SELF'") or die("Useronline Database SELECT Error");
//ค่าที่ได้ ก็คือจำนวนคนออนไลน์นั่นเอง
$user =mysqli_num_rows($result);
mysqli_close($conn);
//Show Useronline
if ($user==1) {
echo"$user User online";
} else {
echo"$user Users online";
}
}
?>
    
</body>
</html>