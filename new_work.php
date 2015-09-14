<?php
include 'inc/config.php';
session_start();
$id =  $_SESSION['id'];
$imgProfileCode = md5( strtolower( trim( $_SESSION['uemail'] ) ) );
?>
<?php
 if(isset($_SESSION['ufname'])){
     ?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Create a new workspace</title>
        <link href="style/w3.css" rel="stylesheet" type="text/css"/>
        <link href="style/dashboard.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="w3-row" >
        <main id="main">
            <div>
              <?php include 'inc/headerIN.php'; ?>
                <div id="wrapper-main">
                    <div>
                     <!--<?php include 'inc/sidebarIN.php'; ?> -->
                    </div>
                    <div>
                        <div id="wrapper-right">
                            <div class="wrap w3-row " >
                                <div><h1>Create a new workspace</h1></div>
                                <div>
                                    <div class="w3-content">
                                        <form class="w3-container w3-card-4 w3-white" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                            <?php
                                            if (isset($_POST['go'])) {
                                                $idI = htmlspecialchars($_POST['u_id']);
                                                $insert = mysql_query("Insert into `workspace` VALUES (NULL, '".htmlspecialchars($_POST['name'])."', '".htmlspecialchars($_POST['des'])."', '".htmlspecialchars($_POST['privacy'])."', '$idI')");
                                            if($insert){
                            $sql  = mysql_query("SELECT * FROM `workspace`  WHERE w_u_id='$idI'")OR DIE (MYSQL_ERROR());
                            $row1  =  mysql_fetch_assoc($sql);
                            $_SESSION['wid'] = $row1['w_id'];
                            $_SESSION['wname'] = $row1['w_name'];
                                            echo "<meta http-equiv='refresh' content='0;URL=http://localhost/EasyDev/u/6/".$_SESSION['wname']."'>";
                                            
                                            }else {
                                                
                                                echo MYSQL_ERROR();
                                                }
                                            }
                                            ?>
                                        <input type="hidden" name="u_id" value="<?php
                                             echo $id;
                                        ?>" />
                                      <h2>Input</h2>
                                      <br>	
                                      <div class="w3-group">      
                                          <input id="workspace" name="name" class="w3-input" type="text" style="width:95%" required="">
                                          <label for="workspace" class="w3-label">Workspace Name</label>
                                      </div>
                                      <div class="w3-group">      
                                          <textarea id="textarea" name="des" class="w3-input" style="width:95%" required=""></textarea>
                                          <label for="textarea" class="w3-label">Description</label>
                                      </div>

                                      <div class="w3-row">
                                      <div class="w3-half">
                                        <label class="w3-checkbox">
                                          <input type="radio" name="privacy" value="public" checked="">
                                          <div class="w3-checkmark"></div> Public
                                        </label><br>
                                      </div>
                                      <div class="w3-half">
                                        <label class="w3-checkbox">
                                          <input type="radio" name="privacy" value="private">
                                          <div class="w3-checkmark"></div> Private
                                        </label><br>
                                      </div>
                                      <div class="w3-half">
                                        <div class="w3-group">      
                                            <button class="w3-btn w3-blue" name="go" type="submit">Create workspace</button>
                                        </div>                                      
                                      </div>
                                      </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php echo '<style>'
. '#footer{'
        . 'position: relative;'
        . '}'
        . '</style>'; include 'inc/footerIN.php'; ?>
            </div>
        </main>
    </body>
</html>
<?php  

 }  else {
     echo "<meta http-equiv='refresh' content='0;URL=$url/index.php'>";     
}
