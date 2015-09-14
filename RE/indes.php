<?php
session_start();
#------------------------------------------------#
 $DBhost = 'localhost';
 $DBname = 'easydev';
 $DBuser = 'root';
 $DBpass = '';
 
 $Connect = @mysql_connect($DBhost,$DBuser,$DBpass);
 if(!$Connect){

      echo 'خطأ';
 exit;
     
 }

 $Select = @mysql_select_db($DBname);
 if(!$Select){
      echo 'خطأ';
 exit;
}
#-------------------------------------------------#

$Q = mysql_query("SELECT * FROM filepro");
include 'function.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <title>اسم المشروع</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="http://4.bp.blogspot.com/-asBOjtcr5U8/UvDwfXiD3zI/AAAAAAAAAbI/Y9SBcoXfImI/s1600/2013-06-05_224532.png" rel="icon" type="image/gif"/>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<div id='tryitLeaderboard'>
<!-- TryitLeaderboard -->
<div id='ads'>
اعلان
</div>
</div>

<div class="container">
  <div class="textareacontainer" >               
      <form method="post" id="iframeSource" style="overflow:auto;">
    <div class="textarea" > 
        <button class="seeResult" name="seeResult" >مشاهدة المعاينة &raquo;</button>
      <div class="textareawrapper">
        
          <textarea autocomplete="on" name="text"  id="textareaCode"><?php
         if(isset($_POST['seeResult'])){
            $text = @$_POST['text']; // المدخلات
            $textarea = $_SESSION["text"];
            $_SESSION["text"] = $text;
            @$rep = str_replace(":)","<img src='http://www.taistozatti.com/wp-content/uploads/2013/01/smiley.png'/> , ".$text." ");
            echo $text;

            }
          ?></textarea>
       </div>               
    </div>               
      </form>

  </div>
  <div class="iframecontainer">
    <div class="iframe">
        <div style="overflow:auto;" id="ifr">
            <div class="headerText">معاينة  <i>
                    الرئيسية
                
                </i>:</div>
      </div>
      <div class="iframewrapper">
        <iframe id="iframeResult" src="tryit_view.php" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  <div class="menucontainer">
    <div class="menu">
        <div style="overflow:auto;" id="ifr">
        <div class="headerText">ملفات المشروع</div>
      </div>
      <div class="menuwrapper">
          <div id="SourceFile">
            <div class="BoxName">
                <ul class="namefile">
                   <?php
                   while($row = mysql_fetch_array($Q)){
                       echo '<li class="liFile"> <img alt="🏠" style="width: 20px;height: 22px;"><a href="#"> <span class="readonly" >'. $row["f_name"];'</span><small style="font-size: 9px" ><span class="readonly" > - (index.php)</span></small></a></li>';
                   }
                   ?>
                    
                </ul>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="footerText">Try it Yourself - &copy; <a href="http://www.w3schools.com">w3schools.com</a></div>      
</div>
 
</html>