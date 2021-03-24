<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="favicon.ico">
    <title>การ์เนตองท์ บาคาร่า</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        /* Note: Try to remove the following lines to see the effect of CSS positioning */
        .affix {
            top: 0;
            width: 100%;
            z-index: 9999 !important;
        }

        .affix + .container-fluid {
            padding-top: 70px;
        }
        </style>
</head>
<style>
    body {
        background-image: url("backgroundhp.jpg")
    }


</style>

<body>

<?php
        $hostname = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "php_project";
        $conn = mysqli_connect( $hostname, $username, $password );
        $money ;
        if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูลได้" );
        


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
    ?>
    
    <a href="Home2.php?user=<?php  $user = $_GET['user']; echo $user;?>">
    <img src="close.png" width="70px" height="70px" style="padding-top: 10px;padding-left:10px;">
    </a>


<p style="font-size: 16; font-weight: bold; color: black; "><p></p>




<center>
    <table ><tr bgcolor="green" ><td width="150px" height="50px" style="border-radius:10px;font-family: Chonburi;font-size:20px;color:black"><p align="center" style="color:white" id="showwin"></p></td></tr></table><br>

<progress value="0" max="10" id="progressBar"></progress></center>

    <br><br><br>

<?php 
$showornot = true;
    $randco = array(0,0,0,0,0,0);
    $randca = array(0,0,0,0,0,0);
    $checkco = array(0,0,0,0,0,0);
    $checkca = array(0,0,0,0,0,0);
    $card = array(0,0,0,0,0,0);
    $allcard = 0;
    $ck = true;
    while($ck){
        $randomcard = rand(1,52);
        $canuse = true;
        for($j=0 ;$j<=$allcard;$j++){
            if($card[$j]==$randomcard) $canuse = false;
        }
        if($canuse){
            $card[$allcard]=$randomcard;
            $allcard++;
        }
        if($allcard >5) $ck = false;
    }
    
    for($u=0 ;$u <6;$u++){
        $count=0;
        $showpic = true;
        while($showpic){
            if($card[$u]>13){
                $card[$u] = $card[$u]-13;
                $count++;
            }else $showpic = false;
        }
        $count ++;
        $randco[$u] = $count;
        $randca[$u] = $card[$u];
    }// การ์ด ?
    $show = isset($_GET['s'])? $_GET['s']:"0";
    if($show =='0') {
        for($u =0;$u<6;$u++)
            $randca[$u] = 0;

            $showornot = !$showornot;
            
    }
    
echo "<table align='left' border='0'> <tr height='200' bgcolor=''><td width='70'></td> <td width='100' align='center'> <font size ='6' style='font-family: Chonburi' color='white'>ห้อง 100</font> </td> <td width='400'  bgcolor='' align='center'> 
<font size='6' style='font-family: Chonburi' color='white'> USERNAME : </font><font size='6' style='font-family: Chonburi' color='yellow'>$user</font> <font size='6' style='font-family: Chonburi' color='white' ><br><a href='Wallet2.php?user=$user'>
<img src='plus.png' height='42' width='42'></a> MONEY : <font size='7' color='yellow' id='moneynow'> $money </font> </td> <td width='35'></td></tr> </table>";
 // RED   RED   RED   RED   RED   RED   RED   RED   RED   RED   
echo '<table align="left">';
echo '<tr bgcolor="red" >';
echo "<td colspan='3' style='border-radius: 10px;font-family: Chonburi'align='center'><font size='5' color='white'>RED</font></td>";
echo '</tr>';
echo "<tr><td height='10px'></td></tr>";
echo '<tr>';    
    $red = true;
    $c = 0;
    $scorecardred = array(0,0,0); 
    $scorered=0; 
    while($red){
        echo "<td><img src='card/$randco[$c]/$randca[$c].png'>  </td>";
        if($randca[$c]>10) $randca[$c]=10;
        $scorecardred[$c]=$randca[$c];
        if($c==1)
            if(($scorecardred[0]+$scorecardred[1])%10>=4)$red = !$red;
        if($c>=2) $red = !$red;
        $scorered += $randca[$c];
        
        $c++;
    }
    ?>
</tr>
<tr><td height='10px'></td></tr>
<tr bgcolor="red"><td style='border-radius: 10px' colspan="3" align="center">
     <font size=5 color="white" style="font-family: Chonburi"><?php $scorered = $scorered % 10; echo "$scorered" ?></font> 
    </td></tr>
</table>

<?php 
echo '<table align="left"><tr height="400"> <td width="200" id="showwin" align="center">';
echo '</td></tr> </table>';
//  BLUE   BLUE   BLUE   BLUE   BLUE   BLUE   BLUE   BLUE   
echo "<table align='left'>";
echo '<tr bgcolor="blue" >';
echo "<td colspan='3' style='border-radius: 10px;font-family: Chonburi' align='center'><font size='5' color='white'>BLUE</font></td>";
echo '</tr>';
echo "<tr><td height='10px'></td></tr>";
echo '<tr>';    
    $blue = true;
    $c = 3;
    $scorecardblue = array(0,0,0); 
    $scoreblue=0; 
    while($blue){
        echo "<td><img src='card/$randco[$c]/$randca[$c].png'>  </td>";
        if($randca[$c]>10) $randca[$c]=10;
        $scorecardblue[$c]=$randca[$c];
        if($c==4)
            if(($scorecardblue[3]+$scorecardblue[4])%10>=4)$blue = !$blue;
        if($c>=5) $blue = !$blue;
        $scoreblue += $randca[$c];
        
        $c++;
    }
    function showunknow(){
        for($i = 0 ; $i <6 ; $i++){
            $randca[$i] = 0;
        }
    }
    

    ?>
</tr>
<tr><td height='10px'></td></tr>
<tr bgcolor="blue"><td style='border-radius: 10px' colspan="3" align="center">
     <font size=5 color="white" style="font-family: Chonburi"><?php $scoreblue = $scoreblue % 10; echo "$scoreblue" ?></font> 
    </td></tr>
</table>
<?php
echo '<script type="text/javascript">';
    

echo '</script>';

$show = isset($_GET['s'])? $_GET['s']:"0";
if($show != 0){
    
}
if($show == 0){
    echo "<script>";
    echo 'var use = 1';
    echo"</script>";
}

echo '<script type="text/javascript">';

echo "var scorered = '$scorered';"; // ส่งค่า $data จาก PHP ไปยังตัวแปร data ของ Javascript
echo "var scoreblue = '$scoreblue';";

echo "var mes ='' ;";
echo "var whowin = 0 ;";
echo 'if(scorered>scoreblue) {mes = "Red Win"; whowin = 1;}';
echo "else if(scorered==scoreblue) { mes = 'Draw';";

    if($show == 0){
            echo "mes = 'Random';";}
echo "
    
     whowin = 3;}";
echo 'else {mes = "Blue Win"; whowin = 2;}';
echo 'document.getElementById("showwin").innerHTML = mes;';
$whowin=0;
if($scorered>$scoreblue) $whowin = 1;
else if($scorered == $scoreblue) $whowin = 3;
else {$whowin = 2;
//echo 'alert("hello");';

}

//echo "alert('$whowin');";
$show = isset($_GET['s'])? $_GET['s']:"";
$user=$_GET['user'];
$winorlose;
$pay= "";
if($show != 0){
if($show == $whowin){
    $winorlose = "WIN";
    $pay = "+100";
$money = $money + 100;
    if($whowin == 3){
        $pay = "+700";
        $money = $money +600;
    }
    $sql3 = "UPDATE user SET Money = '$money' WHERE Username = '$user'";
    if (mysqli_query($conn, $sql3)) {
        //$message = "เพิ่มเงินแล้ว";
        //echo "alert('$message');"; 
        echo "document.getElementById('moneynow').innerHTML = $money;";
    }


echo "alert('YOU WIN');";
}
else {
    $money = $money - 100;
    $pay = "-100";
    $winorlose = "LOSE";
    $sql3 = "UPDATE user SET Money = '$money' WHERE Username = '$user'";
    if (mysqli_query($conn, $sql3)) {
        //$message = "หักเงิน";
        //echo "alert('$message');"; 
        echo "document.getElementById('moneynow').innerHTML = $money;";
    }
    
    echo "alert('YOU LOSE');";
}
    $timetext = date('d/m/y H-i-s');
    $sqlre = "INSERT INTO details (Username,Result,Money,Game,Time) VALUES ('$user','$winorlose','$pay','baccarat','$timetext') ";
    if(mysqli_query($conn, $sqlre)){

    }


}


echo 'var youc = 0;';
echo 'var timeleft = 10;';
echo 'var showornot = false;';
echo 'var downloadTimer = setInterval(function(){';
echo ' document.getElementById("progressBar").value = timeleft--;';

echo 'if(timeleft < 0){';

//echo 'document.getElementById("showwin").innerHTML = "Blue Win";';
echo 'timeleft =10;';
    $show = isset($_GET['s'])? $_GET['s']:"0";
    if($show !=0){
        
        echo 'var use = 1;';
        echo 'if(choosenow == "red"){';
        echo 'youc =1}';
        echo 'if(choosenow == "green"){';
        echo 'youc =3}';
        echo 'if(choosenow == "blue"){';
        echo 'youc =2}';
        
        echo    "window.location.href = 'game100.php?user=$user&s=' + youc";
        echo ';';
    }
    if($show ==0) {
        
        echo 'var use = 1;';
        echo 'if(choosenow == "red"){';
        echo 'youc =1}';
        echo 'if(choosenow == "green"){';
        echo 'youc =3}';
        echo 'if(choosenow == "blue"){';
        echo 'youc =2}';
        
        echo    "window.location.href = 'game100.php?user=$user&s=' + youc";
        echo ';';
    }else {echo    "window.location.href = 'game100.php?user=$user' ;";
        echo 'var use = 2;';
    }
echo  '}';
echo '},1000);';
echo '</script>';

?>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    

<table align="center" >
    <tr height="250">
        <td width="400" style="border-radius: 20px;" id="cred" onclick="choose('red')" bgcolor="red" align="center"><font size="10" style="font-family: Chonburi" color="white"> RED WIN<br>x1!</font></td>
        <td width="100"></td>
        <td width="400" style="border-radius: 20px" id="cgreen" onclick="choose('green')" bgcolor="green"align="center"><font size="10" style="font-family: Chonburi" color="white"> DRAW<br>x7!</font></td>
        <td width="100"></td>
        <td width="400" style="border-radius: 20px" id="cblue" onclick="choose('blue')" bgcolor="blue"align="center"><font size="10" style="font-family: Chonburi" color="white"> BLUE WIN<br>x1!</font></td>
    </tr>
</table>
<?php
    echo "<script>";
    echo "var money = $money;";
    echo "var show = $show;";
    echo "</script>";
?>
<script>
    
    var choosenow ="";
    var already = false;

   function choose($c){
       if(show!=0) alert("Wait for Random . . .");
       if(money >= 100) {
        if(use != null){
        if($c=='red'&&choosenow!="green"&&choosenow!="blue"){
            if(document.getElementById('cred').style.backgroundColor== "pink"){
            document.getElementById('cred').style.backgroundColor = "red";
            choosenow = "";
            already =false;
            }
            else {document.getElementById('cred').style.backgroundColor = "pink";
                choosenow = "red";
                already =true;}
        }

        if($c=='green'&&choosenow!="red"&&choosenow!="blue"){
        if(document.getElementById('cgreen').style.backgroundColor== "pink"){
            document.getElementById('cgreen').style.backgroundColor = "green";
            choosenow = "";
            already =false;
            }
            else {document.getElementById('cgreen').style.backgroundColor = "pink";
                choosenow = "green";
                already =true;}
        }

        if($c=='blue'&&choosenow!="green"&&choosenow!="red"){
            if(document.getElementById('cblue').style.backgroundColor== "pink"){
            document.getElementById('cblue').style.backgroundColor = "blue";
            choosenow = "";
            already =false;
            }
            else {document.getElementById('cblue').style.backgroundColor = "pink";
                choosenow = "blue";
                already =true;}
        }
        }
       }else alert("Please Top-up");
   }
</script>

<?php

   
    echo "<script>";
    
    echo 'var result = ';echo $show;echo ";";
    echo 'if(result == whowin) alert("YOU WIN");';
    echo 'if(choosenow = "red"||choosenow = "green"||choosenow = "blue") alert("YOU LOSE");';
    echo"</script>" ;
    mysqli_close($conn);
?>


</body>
</html>