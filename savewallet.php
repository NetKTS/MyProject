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

<body>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Home2.php?user=<?php  $user = $_GET['user']; echo $user;?>">Home</a></li>
                <li><a href="Wallet2.php?user=<?php  $user = $_GET['user']; echo $user;?>">Wallet</a></li>
                <li><a id = "us" style="padding-left: 1600px"></a></li>
                <li><a href="Home.php" onclick="alert()">Logout</a></li>
            </ul>
        </nav>
    <center>
        <div class="text">
            เติมเงิน เข้าระบบ
        </div>
        <br><br>
    <table>
        <form method="POST" action="Wallet2.php?user=<?php echo $user;?>">
        <tr>
            <td  style="font-family: Chonburi;color:white;font-size:20px">Code : &nbsp;</td> 
            <td> <input type="text" style="font-family: Chonburi;" maxlength="8" name="code"> </td> 
             <td> &nbsp; <input type="submit" id="inputcode" onclick="topup()"; style="font-family: Chonburi;color:black;font-size:16px"></td>
        </tr>
        </form>
    </table>
    </center>
    


    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <?php
        $user = $_GET['user'];
        echo "<script>document.getElementById('us').innerHTML = '$user'</script>";
    ?>
    <?php
        $money ;

            if(isset($_GET['user'])&&isset($_GET['topup']))
            {
                $hostname = "localhost";
                $username = "root";
                $password = "12345678";
                $dbname = "php_project";
                $conn = mysqli_connect( $hostname, $username, $password );
                if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
                mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );

                if(isset($_GET['user']))// แสดงจำนวนเงินในไอดี ลงตัวแปร $moneynow;
                {
                
                $user=$_GET['user'];
            
                $sql = "SELECT * FROM user where Username='$user'";
                $result = mysqli_query($conn, $sql);

                
            
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["Username"]==$user) $moneynow = $row["Money"];
                    }
                } 

            
        }

                $topup = $_POST['topup'];
                $user=$_GET['user'];
                $sql = "SELECT * FROM topup where code='$topup'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["code"]==$topup){ $money = $row["Money"];
                            $moneynow  = $moneynow + 500;
                            $sqltop = "UPDATE user SET Money = '$moneynow' WHERE Username = '$user'";
                            if (mysqli_query($conn, $sqltop)) {
                                //alert("top up finish");
                        }
                    }else echo "<script> alert('ไม่มีโค้ดนี้ในระบบ'); </script>";
                } 
                }
                mysqli_close($conn);
        }
        
    
        //  สำหรับเพิ่มเงิน
        /*$sql3 = "UPDATE user SET Money = '$money' WHERE Username = '$user'";
    if (mysqli_query($conn, $sql3)) {
        //$message = "เพิ่มเงินแล้ว";
        //echo "alert('$message');"; 
        echo "document.getElementById('moneynow').innerHTML = $money;";
    }*/
            
    ?>

    <?php

if(isset($_GET['user']))
{
    $user=$_GET['user'];
    
    $sql = "SELECT * FROM user where Username='$user'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row["Username"]==$user) $money = $row["Money"];
        }
    } 

    
}


    $code = $_POST['code'];
    echo "<script>";
   
    echo "function topup(){";
    echo "var abc ='$code' ;";
    echo "alert(abc)";
    echo "}";
    echo "</script>";
    ?>
</body>

</html>