<?php
error_reporting(0);
session_start();
unset($_SESSION['ufname']);
$_SESSION['ufname'] = '';
session_destroy();

?>



 <head>
        <title>تم تسجيل الخروج بنجاح</title>
        <meta charset="UTF-8">
</head>
<br>
<br>
<br>
<br>
<br>
<br>
<meta http-equiv='refresh' content='0;URL=index.php'>
