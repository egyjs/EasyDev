<?php
session_start();
    $buy = $_SESSION["buy"];
include 'inc/config.php';
include 'function.php';


//
    /////////////////price////////////////
    $price = 0;
    if(@$_SESSION['buy'] == "golden"){
     $price =120;   
    }elseif (@$_SESSION['buy'] == "silver") {
     $price =60;   
    }elseif (@$_SESSION['buy'] == "bronze") {
     $price =20;   
    }
    /////////////////ENDprice////////////////
    /////////////////id////////////////
    $pro_id = 0;
    if(@$_SESSION['buy'] == "golden"){
     $pro_id =3;   
    }elseif (@$_SESSION['buy'] == "silver") {
     $pro_id =2;   
    }elseif (@$_SESSION['buy'] == "bronze") {
     $pro_id =1;   
    }
    /////////////////ENDid////////////////
        
    $qty = 1;
    
    if($qty == 0){
        
        $qty =1;
    }  else {
        
        $qty = $qty;
        
        
        
}
?>



<center>
<div class="w3-row w3-container w3-right white w3-padding-64  "style="width:100%;">
    <div class="w3-half  white"  style="width:100%;" >
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="business@personal.com">

        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">

       <!-- Specify details about the item that buyers will purchase. -->
       <input type="hidden" name="item_name" value="<?php echo $buy;?>">
       <input type="hidden" name="item_number" value="<?php echo $pro_id;?>">
       <input type="hidden" name="amount" value="<?php echo $price;?>">
       <input type="hidden" name="currency_code" value="USD">
       <input type="hidden" name="quantity" value="<?php echo $qty; ?>">

       <input type="hidden" name="return" value="http://localhost/EasyDev/success.php">
       <input type="hidden" name="cancel_return" value="cancel_pay.php">



       <!-- Display the payment button. -->
       <input type="image" name="submit" border="0"
              src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_buynow_pp_142x27.png"
       alt="PayPal - The safer, easier way to pay online">
       <img alt="" border="0" width="1" height="1"
       src="http://www.4programmer.com/img/4programmerLogo1.png" >

       </form> 
</div>

    
</div>
</center>



