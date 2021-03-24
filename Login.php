<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="favicon.ico">
    <title>การ์เนตองท์ บาคาร่า</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="CSS.css" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
</head>

<body>
<br>
    <center>
        <div class="text">
            การ์เนตองท์ บาคาร่า
        </div>
    </center>
</div>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="GET">
                <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="user" placeholder="Username" maxlength="20" required>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="pass" placeholder="Password" minlength="8" maxlength="20" required>
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
							Login
						</button>
                </div>
                <div class="text-center p-t-30">
                    <a class="txt1" href="Signup.php">
							Sign up
						</a>
                </div>
                <div class="text-center p-t-20">
                    <a class="txt1" href="Game.php">
							Cancel
						</a>
                </div>
            </form>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
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
        $hostname = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "php_project";
        $conn = mysqli_connect( $hostname, $username, $password );
        if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );
        if(isset($_GET['user'])&&isset($_GET['pass']))
        {
            $user=$_GET['user'];
            $pass=$_GET['pass'];
            $status="Offline";
            $sql = "SELECT * FROM user where Username='$user'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["Username"]==$user&&$row["Password"]==$pass)
                    {
                        $message = "เข้าสู่ระบบสำเร็จ";
                        $status="Online";
                        $sql3 = "UPDATE user SET Status = '$status' WHERE Username = '$user'";
                        if (mysqli_query($conn, $sql3)) {
                            echo "<script type='text/javascript'>alert('$message');window.location.href = 'Game2.php?user=$user';</script>";  
                        }
                    }
                    else if($row2["Username"]==$user&&$row2["Password"]!=$pass)
                    {
                        $message = "รหัสผ่านไม่ถูกต้อง";
                        echo "<script type='text/javascript'>alert('$message');window.location.href = 'Login.php';</script>";
                    }
                }
            } 
            $sql2 = "SELECT * FROM admin where Username='$user'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                while($row2 = mysqli_fetch_assoc($result2)) {
                    if($row2["Username"]==$user&&$row2["Password"]==$pass)
                    {
                        $message = "เข้าสู่ระบบด้วยรหัส ADMIN สำเร็จ";
                        echo "<script type='text/javascript'>alert('$message');window.location.href = 'adminpage.php';</script>";    
                    }
                    else if($row2["Username"]==$user&&$row2["Password"]!=$pass)
                    {
                        $message = "รหัสผ่านไม่ถูกต้อง";
                        echo "<script type='text/javascript'>alert('$message');window.location.href = 'Login.php';</script>";
                    }
                }
            } 
            else {
                $message = "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้องกรุณากรอกใหม่";
                echo "<script type='text/javascript'>alert('$message');window.location.href = 'Login.php';</script>";  
            }
            mysqli_close($conn);
        }
    ?>
</body>

</html>