<?php

session_start();

$_SESSION["strName"] = "Kittisak Thamwattana";

$_SESSION["strSiteName"] = "ThaiCreate.Com";

session_write_close();

?>

<html>

<head>

<title>ThaiCreate.Com Tutorial</title>

</head>

<body>

Session Created.<br><br>

<a href="PageSession2.php?user=guygam&check=1">Check Session</a>

</body>

</html>