<?php
session_start();

$imgProfileCode = md5( strtolower( trim( $_SESSION['uemail'] ) ) );
?>
<?php
 if(isset($_SESSION['ufname'])){
     ?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Dashboard</title>
        <link href="style/w3.css" rel="stylesheet" type="text/css"/>
        <link href="style/dashboard.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main id="main">
            <div>
              <?php include 'inc/headerIN.php'; ?>
                <div id="wrapper-main">
                    <div>
                  <?php include 'inc/sidebarIN.php'; ?>
                    </div>
                    <div>
                        <div id="wrapper-right">
                            <div class="wrap w3-row " >
                                <div><h1>Workspaces</h1></div>
                                <div>
                                    <a href="new_work" >
                                        <div class="new-work">
                                            <div >
                                                <div class="w3-col s3 box-new box">
                                                    <p class="pbox-new" ><span class="Create-a-new-workspace" >🔄</span>
                                                    <br/> <p style="color: #BDBDBD;">Create a new workspace</p>
                                                    </p>
                                                </div>
                                            </div>
                                       </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include 'inc/footerIN.php'; ?>
            </div>
        </main>
    </body>
</html>
<?php  
 }  else {
     echo "<meta http-equiv='refresh' content='0;URL=index.php'>";     
}
