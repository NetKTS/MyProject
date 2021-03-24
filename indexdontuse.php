<html>
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
  <body background="fbbg.jpg">
  <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Game2.php?user=<?php  $user = $_GET['user']; echo $user;?>">Home</a></li>
                <li><a href="Wallet2.php?user=<?php  $user = $_GET['user']; echo $user;?>">Wallet</a></li>
                <li><a id = "us"></a></li>
                <li><a href="userprice.php?user=<?php echo $user?>" id = "showmoney"></a></li>
                <li><a href="Game.php" onclick="alt()">Logout</a></li>
            </ul>
        </nav>
    <center>
    <br><br><br>
   <h3 style="font-family: Chonburi;color:#ffde59;font-size:40px">-. Flappy Bird Game .-</h3>
   <br>
   <canvas id="canvas" width="288" height="512" style="border-radius: 10px"></canvas>
   
   <script src="flappyBird.js"></script>
  </center>
  <script>
        function alt()
        {
            $message = "ออกจากระบบแล้ว";
            alert($message);
        }
    </script>
  <?php
  $user = $_GET['user'];
  echo "<script>document.getElementById('us').innerHTML = '$user'</script>";
        $hostname = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "php_project";
        $conn = mysqli_connect( $hostname, $username, $password );
        if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );
        
        $topup = isset($_GET['topup'])? $_GET['topup']:"0";
        $sql = "SELECT * FROM user where Username='$user'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["Username"]==$user) $money = $row["Money"];
                    
                    $money += $topup;
                    $sql3 = "UPDATE user SET Money = '$money' WHERE Username = '$user'";
                    if($topup!=0)
                    if (mysqli_query($conn, $sql3)) {
                        $message = "ทำการเติมเงินแล้ว $topup บาท" ;
                        echo "<script>alert('$message');</script>"; 
                    }
                    
                }
            } 

        
        
        if($topup != 0){
            echo "<script>
            //alert('topup = 100');
            window.location.href = 'Wallet2.php?user=$user';
            </script>"; 
        }
    
        echo "<script>";
        

        echo "function topup(abc){";
        echo "window.location.href = 'Wallet2.php?user=$user&topup=' + abc;";
            
            
            $sql = "SELECT * FROM user where Username='$user'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["Username"]==$user) $money = $row["Money"];
                    
                    $sql3 = "UPDATE user SET Money = '$money' WHERE Username = '$user'";
                    if($topup!=0)
                    if (mysqli_query($conn, $sql3)) {
                        $message = "เพิ่มเงินแล้ว";
                        echo "alert('$message');"; 
                    }
                    
                }
            } 

        //$money = $money +100;
    
    
        //echo "alert(abc) ";
        //echo "window.location.href = 'Wallet2.php?user=$user';";
        echo "}";
        echo "document.getElementById('showmoney').innerHTML = 'Money $money ฿';
        </script>";
        if($topup != 0){
            echo "<script>
            //alert('topup = 100');
            window.location.href = 'Wallet2.php?user=$user';
            </script>"; 
        }
    
        mysqli_close($conn);
    ?>
  </body>
</html>