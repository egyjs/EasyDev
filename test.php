<?php 
error_reporting(0);
 include 'config/conreglog.php';
 $p_id = @$_GET['id'];

$sql = mysql_query("SELECT * FROM products WHERE id ='".$p_id."'")OR DIE (MYSQL_ERROR());
$row_title = mysql_fetch_assoc($sql)
?>
<title><?php echo $row_title['name']; ?></title>   
<?php
 include 'head.php';
include ("file/header.php");

$p_id = $_GET['id'];
        
if(isset($_GET['id'])){
    $get_pro_d =  mysql_query("SELECT * FROM products WHERE id ='".$p_id."'");

        $row_pro_d = mysql_fetch_array($get_pro_d);
}



    ?>
<div class="w3-row w3-container w3-center w3-padding-64  ">
                    <div class="w3-half w3-center white" style="width:100%;"  >
  <div class="w3-col l12 ">                      
<div class="panel" >
    
    <div class="panel_title text-r"><h1><?php echo $row_pro_d['name'];?></h1></div>
    <div class="panel_body"> 
        <img style="width: 60%;height: 195px;" src="<?php echo$row_pro_d['image'];?>">      
<p><?php echo$row_pro_d['describe'];?></p>
    </div>
</div>
  </div>
<div class="w3-col l12">
<div class="panel"  >
        <div class="panel_title text-c"><h5>معلمومات المنتج </h5></div>
        <div class="panel_body">
            <div class="p_info text-r">السعر بعد الخصم :<?php echo$row_pro_d['pricenow'];?>$</div>
            <div class="p_info text-r sale">السعر الاصلي :<?php echo$row_pro_d['price'];?>$</div>
            <div class="p_info text-r">  التصنيف: <?php echo$row_pro_d['cat'];?></div>
            <div class="p_info text-l w3-btn"><?php echo '<a href="index.php?add_cart='.$row_pro_d['id'].'">شراء المنتج</a>';?></div>
        </div>
  
</div>
</div>
</div>
</div>


<?php
include ("file/footer.php");
?>