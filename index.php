<?php
include 'inc/config.php';
session_start();
$user = @$_GET['u'];
$pro_work = @$_GET['w'];
if(isset($_GET['u'])){
    $get_pro=  mysql_query("SELECT * FROM users WHERE u_id ='".$user."'")or die(mysql_error());

        $row_pro = mysql_fetch_array($get_pro);
        
}
        $sql = mysql_query("SELECT * FROM users WHERE u_id ='".$user."'")OR DIE (MYSQL_ERROR());
        $row_title = mysql_fetch_assoc($sql);
if(isset($_GET['w'])){
    $get_work =  mysql_query("SELECT * FROM `workspace` WHERE w_name ='".$pro_work."'")or die(mysql_error());

        $row_work = mysql_fetch_array($get_work);
        
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php
        if(!isset($_SESSION['ufname'])){
            echo 'log in';
        }elseif (!$_GET["u"]) {
           
        }  else {
        echo $row_title['u_fname'];
        echo " ";
        echo $row_title['u_lname'];
        $checkU= mysql_query("SELECT * FROM users where u_id ='".$user."'");
                        @$num1 = mysql_num_rows($checkU);
                        if($num1 <= 0){
                        echo '404 Error×💔';

        
        }}
        ?></title>
        <?php
if(!isset($_SESSION['ufname'])){
            echo '<style>'
            . 'body {
      height: auto;
      background: #2ECC71;
      color: #fff;
    }'
                . '</style>';
}
        ?>
        <link href="style/index.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    </head>
    <body dir='ltr'>
        <?php
        if (!isset($_SESSION['ufname'])) {
            echo '<div id="session">';
            echo '<center>';
             if (isset($_POST['go1'])) {

          $uemail =  mysql_real_escape_string( $_POST['email']);

          $upass  = mysql_real_escape_string($_POST['pass']);

            if (!$uemail || !$upass ) {
            //التأكد ان المدخلات فارغة 

            Die('<meta http-equiv="refresh" content="2;">enter all fields');

        }else {
            $valEmail = $_POST['email'];
            $level_check = mysql_query("SELECT * FROM users where u_email ='".$valEmail."'");
                        $rowLevel = mysql_fetch_array($level_check);
                        if($rowLevel['u_level'] ==   0){
                        echo '
                          <b>If you have registered ..You need to activate the account</b>';
                        }  else {
        //التأكد المدخلات صحيحة
        $sql  = mysql_query("SELECT * FROM users WHERE u_email='".$uemail."' AND u_pass='".$upass."' ")OR DIE (MYSQL_ERROR());
        $row  =  mysql_fetch_assoc($sql);
        if (!$row) {
            Die('Password or E-mail error !! .. <meta http-equiv="refresh" content="3;">');
        }

          }
          
          if($uemail ==$row['u_email'] ||$upass==$row['u_pass']){



            $_SESSION['id']=$row['u_id'];
            $_SESSION['ufname']=$row['u_fname'];
            $_SESSION['ulname']=$row['u_lname'];
            $_SESSION['uemail']=$row['u_email'];
            $_SESSION['upass']=$row['u_pass'];
            $_SESSION['country']=$row['u_country'];
            $_SESSION['address']=$row['u_address'];
            $_SESSION['city']=$row['u_city'];
            $_SESSION['membership']=$row['u_membership'];

            echo '<meta http-equiv="refresh" content="1;">It has been successfully LogIN ';

             }}}
            echo '</center>';
            
            echo '<div>
            <h2>log in</h2>
        </div>
    <form class="commonForm" id="session-form" method="post" accept-charset="utf-8">
        <fieldset>
            <p>
                <input type="text" placeholder="Email" name="email"  />
            </p>
            <p>
                <input type="password" placeholder="Password" name="pass" id="id_password" /></p>
            <div class="submitCont">
                <input type="submit" name="go1" value="log in" />
            </div>
        </fieldset>
        <p  class="reset" >
            <b><a href="SignUp.php">register</a><span class="oor" ><i><b>OR</b></i></span><a href="#">Forgot Your Password</a></b>
        </p>
    </form> <!-- /commonForm -->
  </div> <!-- /session -->
';
           include 'inc/footerOUT.php';

            
        }elseif (!$user) {
            echo "<meta http-equiv='refresh' content='0;URL=dashboard.php'>";
        }else {
            
$imgProfileCode = md5( strtolower( trim( $row_pro['u_email'] ) ) );
        
if($num1 <= 0){
    echo '<h1>404  Page not found · 💔</h1>';
exit;}  
if (!empty($_GET['w'])) {
    echo 'ff';
}
if($user == $_SESSION["id"]){
    echo "<meta http-equiv='refresh' content='0;URL=../dashboard.php'>";
}
?>
<link href="../style/dashboard.css" rel="stylesheet" type="text/css"/>
<link href="../style/w3.css" rel="stylesheet" type="text/css"/>
        <link href="../../style/w3.css" rel="stylesheet" type="text/css"/>
        <link href="../../style/dashboard.css" rel="stylesheet" type="text/css"/>
        <link href="../../../style/w3.css" rel="stylesheet" type="text/css"/>
        <link href="../../../style/dashboard.css" rel="stylesheet" type="text/css"/>
        <main id="main">
            <div>
                <?php include 'inc/headerIN.php'; ?>
                <div id="wrapper-main">
                    <div>
      <div id="sidebar">
                            <div id="PicProfile" class="center" >
                                <a href="#">
                                    <img height="80" class="profile-picture" size="80" 
                                         src="https://secure.gravatar.com/avatar/<?php echo $imgProfileCode; ?>.png">
                                </a>
                                <div>
                                    <h3 class="h3PIC" ><a href="#"><span><?php echo $row_pro['u_fname'] ; ?></span>
                                            <br />
                                    <span style="font-size: 3px" ><?php echo $row_pro['u_lname'] ; ?></span></a></h3>
                                </div>                            
                            </div>
                            <nav class="w3-nav w3-white w3-card-2">
                                <header class="w3-container">
                                <h5>Menu</h5>
                                </header>
                                <a class="w3-small" href="#">Link</a>		
                                <a class="w3-small" href="#">Link</a>		
                                <a class="w3-small" href="#">Link</a>		
                                <a class="w3-small" href="#">Link</a>		
                                <a class="w3-small" href="#">Link</a>		
                            </nav>
                        </div>                    
                    </div>
                    <div>
                        <div id="wrapper-right">
                            <div class="wrap" >
                                <div><h1>Workspaces</h1></div>
                                <div>
                                    <div class="new-work">
                                        <div>
                                            <div class="w3-col s3 box-new box">
                                                <p class="pbox-new" ><span class="Create-a-new-workspace" >🔄</span>
                                                <br/> <p style="color: #BDBDBD;">Create a new workspace</p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include 'inc/footerIN.php'; ?>
            </div>
        </main>

         <?php   
        }
        ?>

    
    </body>
</html>
