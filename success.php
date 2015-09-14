<?php
include 'inc/config.php';
?>
<?php 
session_start();
$emailS = $_SESSION["email"];
include 'function.php';
$ip = get_ip();
$buttonPaypal = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thank You...</title>
    </head>
    <body>
        <h2>Thank you ... Log in to your account is activated immediately</h2>
        <h4>To login,<a href="index.php" >click here</a></h4>
        <input type="hidden" name="<?php echo $buttonPaypal; ?>" />
        <?php
        echo "<span style='text-transform: capitalize;' >Thank you ".$emailS."</span>";
if(isset($buttonPaypal)){
 mysql_query("UPDATE users SET u_level='1' WHERE u_email='$emailS' ")or die(mysql_error());
} // u_level='1' يعني انه تم تفعيل الحساب
        ?>
    </body>
</html>
