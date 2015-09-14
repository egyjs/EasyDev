<?php
session_start();
$buy = "";
if (isset($_POST['buy'])){
    $_SESSION['buy'] = $_POST['buy'];
}
if (isset($_SESSION['buy'])){
    $buy = $_SESSION['buy'];
}
?>
<!DOCTYPE html>
<html>
<?php
include 'inc/config.php';
?>
    <head>
        <meta charset="UTF-8">
        <title>تسجيل الدخول</title>
        <link href="style/SignUp.css" rel="stylesheet" type="text/css" media="all" />
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body dir="ltr">
        <div class="container">
            <div class="allBox">
                <div id="Bronze" class="boxSize">
                    <h3>
                        <div>
                            <span class="right" >Membership bronze</span>
                            <span class="left"  >$14/الشهر</span>
                        </div> 
                    </h3>
                    <div>
                        <p>
                            ideiw7gduoug7duiuig78a
                        </p>
                    </div>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
                        <a href="#"  class="buy-now" ><input class="buy-now" type="submit" value="bronze" name="buy"></a>
                    </form>
                </div>
                <div id="Silver" class="boxSize">
                    <h3>
                        <div>
                            <span class="right" >Membership silver</span>
                            <span class="left"  >$14/الشهر</span>
                        </div> 
                    </h3>
                    <div>
                        <p>
                            ideiw7gduoug7duiuig78a
                        </p>
                    </div>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
                        <a href="#"  class="buy-now" ><input class="buy-now" type="submit" value="silver" name="buy"></a>
                    </form>
                </div>
                <div id="Bronze" class="boxSize">
                    <h3>
                        <div>
                            <span class="right SunFlower" >Membership golden</span>
                            <span class="left  SunFlower" >$14</span>
                        </div> 
                    </h3>
                    <div>
                        <p>
                            ideiw7gduoug7duiuig78a
                        </p>
                    </div>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
                        <a href="#"  class="buy-now" ><input class="buy-now" type="submit" value="golden" name="buy"></a>
                    </form>                </div>

            </div>
        </div>
<?php include 'inc/footerOUT.php'; ?>
</html>

<?php
if (isset($_POST['buy'])) {
    echo '<meta http-equiv="refresh" content="0000000; url=Checkout.php">';
}