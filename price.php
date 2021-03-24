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
        <p style="font-family: Chonburi;color:black;font-size:60px">ประวัติการเล่น</p><br><br>
<div>
<div id="content" style="background-color:white;height:600px;width:1000px;float:center;border-radius:10px;overflow: scroll;">
<br><br>
<table width="800px" align="center" border="1px" style="font-family: Chonburi" >
    <tr>
    <td width="220px" align="center" height="40px" style="background-color: black;color:white" >Username</td>
    <td width="180px" align="center" height="40px" style="background-color: black;color:white" >Game</td>
    <td width="120px" align="center" height="40px" style="background-color: black;color:white" >Result</td>
    <td width="120px" align="center" height="40px" style="background-color: black;color:white" >Money</td>
    <td align="center" height="40px" style="background-color: black;color:white" >Time</td>
    </tr>

<?php
    $hostname = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "php_project";
    $conn = mysqli_connect( $hostname, $username, $password );
    if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );

    
    
        $status="Offline";
        $sql = "SELECT * FROM details ORDER BY Time Desc";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td height='30px'>";
                echo $row["Username"];
                echo "</td>
                <td>{$row['Game']}</td>
                <td>{$row["Result"]}</td>
                <td>{$row["Money"]}</td>
                <td>{$row["Time"]}</td>
                </tr>";
            }
        } 
        mysqli_close($conn);
    
?>
    </table>
</body>
</html>