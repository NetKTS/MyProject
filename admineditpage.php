<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="favicon.ico">
    <title>การ์เนตองท์ บาคาร่า</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    .borderimage{
    border:1px solid black;
    }
    </style>
    <script language="JavaScript1.2">
    function borderit(which,color){
    //if IE 4+ or NS 6+
    if (document.all||document.getElementById){
    which.style.borderColor=color
    }
    }
    </script>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="CSS.css" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
</head>
<script>
        function alt()
        {
            $message = "ออกจากระบบแล้ว";
            alert($message);
        }
    </script>
<body>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
            <ul class="nav navbar-nav">
                <li class="active"><a href="adminpage.php">Home</a></li>
                <li><a href="Login.php" onclick="alt()">Logout</a></li>
            </ul>
        </nav>
        <center>
        <p style="font-family: Chonburi;color:black;font-size:60px">แก้ไขข้อมูลผู้ใช้</p><br><br>
<div>
<div id="content" style="background-color:white;height:150px;width:1000px;float:center;border-radius:10px;">
<br><br>
<table width="800px" align="center" border="1px" style="font-family: Chonburi" >
    <tr>
    <td width="220px" align="center" height="40px" style="background-color: black;color:white" >Email</td>
    <td width="180px" align="center" height="40px" style="background-color: black;color:white" >Username</td>
    <td width="200px" align="center" height="40px" style="background-color: black;color:white" >Password</td>
    <td colspan="2" align="center" height="40px" style="background-color: black;color:white" >Money</td>
    </tr>
<?php
$user = $_GET['Username'];
if(isset($_GET['Email'])){
$email = $_GET['Email'];
$user = $_GET['Username'];
$Password = $_GET['Password'];
$Money = $_GET['Money'];
}

?>
<form action="?e=1&Username=<?php echo $user;?>" method="post">
<tr>
<td></td></td>
</tr>
<tr>
<td td height='30px'><input name="e" type="text" value="<?php if(isset($email)) echo $email; else echo $_REQUEST['e']; ?>"></td>
<td><input name="u" type="text" disabled="true" value="<?php if(isset($user)) echo $user; ?>"></td>
<td><input name="p" type="text" value="<?php if(isset($Password)) echo $Password; else echo $_REQUEST['p']; ?>"></td>
<td><input name="m" type="text" value="<?php if(isset($Money)) echo $Money; else echo $_REQUEST['m']; ?>"></td>
<td><input type="submit" onclick="" value="  OK  "></td>
</tr>
</form>
</table>
<br><br>

</body>
</html>
<?php
    $hostname = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "php_project";
    $conn = mysqli_connect( $hostname, $username, $password );
    if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );


    if(isset($_GET['e'])){
        //echo "<script> alert({$_REQUEST['m']});</script>";
        $sql = "UPDATE user SET Email = '$_REQUEST[e]',Username = '$user',Password = '$_REQUEST[p]',Money = '$_REQUEST[m]' WHERE Username = '$user'";
        $sql2 = "UPDATE user SET Money = 500 WHERE Username = killernet";
        $sql3 = "SELECT * FROM user where Username='$user'";
        if(mysqli_query($conn, $sql)){
            echo "<script> alert('บันทึกการแก้ไขข้อมูลเสร็จสิ้น');";
            echo "window.location.href ='editalluser.php'";
            echo "</script>";
        }else echo "<script> alert('ไม่สามารถทำการแก้ไขได้');</script>";
    
    
}

?>
