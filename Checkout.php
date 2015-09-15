<?php
include 'inc/config.php';
?>
<?php 
include 'function.php';
session_start();
$_SESSION["email"] = $_POST['email']; 
$emailS = $_SESSION["email"];

?>
<?php
$buy = $_SESSION["buy"];

@$email =  htmlspecialchars($_POST['email']);
$valEmail = "";
if(isset($email)){
    @$valEmail =  mysql_real_escape_string($_POST['email']);
}
@$fname =  htmlspecialchars($_POST['fname']);
$valfname = "";
if(isset($fname)){
    @$valfname = mysql_real_escape_string($_POST['fname']);
}
@$lname =  htmlspecialchars($_POST['lname']);
$vallname = "";
if(isset($lname)){
    @$vallname = mysql_real_escape_string($_POST['lname']);
}

@$address =  htmlspecialchars($_POST['address']);
$valaddress = "";
if(isset($address)){
    @$valaddress = mysql_real_escape_string($_POST['address']);
}
@$city =  htmlspecialchars($_POST['city']);
$valcity = "";
if(isset($city)){
    @$valcity = mysql_real_escape_string($_POST['city']);
}
@$pass1 =  htmlspecialchars(mysql_real_escape_string($_POST['pass1']));
@$country =  htmlspecialchars(mysql_real_escape_string($_POST['country']));



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Checkout</title>
        <link href="style/dashboard.css" rel="stylesheet" type="text/css"/>
        <link href="style/Checkout.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
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
   
    ?>
    <body dir="ltr" >
        
        <div class="container">
            <center>  
                <?php
        if (isset($_POST['go'])) {
                    if ($valEmail == "" || $valEmail == "a' OR 1=1" ) {
                        echo '<p style=" background-color: #FDC0C0;
                        padding: 15px;
                        border: 1px solid #FF0000;
                        color: #fff;">
                        <span id="error">
                            E-mail is wrong
                        </span>
                    </p> ';}else{
                        if ($_POST['pass1'] != $_POST['pass2']) {
                      echo '<p style=" background-color: #FDC0C0;
                        padding: 15px;
                        border: 1px solid #FF0000;
                        color: #fff;">
                        <span id="error">
                            Passwords are not identical
                        </span>
                       </p>';}else {
                        if ($_POST['country'] == "no") {
                        echo '<p style=" background-color: #FDC0C0;
                        padding: 15px;
                        border: 1px solid #FF0000;
                        color: #fff;">
                        <span id="error">
                            Please enter Country *
                        </span>
                    </p> ';}else{
                        if ($_POST['email'] == "" || $_POST['fname'] == "" || $_POST['lname'] == "" || $_POST['pass1'] == "" || $_POST['pass2'] == "" || $_POST['country'] == "no"|| $_POST['address'] == "" ||$_POST['city'] == "") {
                        echo '<p style=" background-color: #FDC0C0;
                        padding: 15px;
                        border: 1px solid #FF0000;
                        color: #fff;">
                        <span id="error">
                            Please enter all fields
                        </span>
                    </p> ';}else {
    $email_check1 = mysql_query("SELECT * FROM users where u_email ='".$valEmail."'");
                        @$num1 = mysql_num_rows($email_check1);
                        if($num1 > 0){
                        echo '<p style=" background-color: #FDC0C0;
                        padding: 15px;
                        border: 1px solid #FF0000;
                        color: #fff;">
                        <span id="error">
                          Email already exists ...<br />
                          <b><a href="#">activate the account</a></b> or <b><a href="#" >Forgot your password</a></b>
                        </span>
                       </p> ';
                        }else {
$insert = mysql_query("Insert into users VALUES(null,'$valfname','$vallname','$valEmail','$pass1','$country','$valaddress','$valcity','0','$buy')");
                        if($insert){
echo 'Registration has been successfully your hello '.$_POST['fname']
        .'<meta http-equiv="refresh" content="2; url=payment.php">';    
                        }else {
                            echo 'There are an unknown error';
                        }
                        }                        
                        }
                        }
                        }  
                    }
                    
                         
        
        }
        

            /////////////////TOmysql////////////////


           /////////////////ENDtoMysql////////////////
                ?>           
            </center>
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
               <?php
                $txt4Frc =''
                         .'<input type="hidden" name="ip"  value="'.$ip.'" />'
                        . '<div class="container"> 
                <table class="table" >
                    <tr>
                        <th>Product:</th>
                        <th>Price:</th>
                    </tr>
                    <tr>
                        <td>Membership '.$buy .'</td>
                        <td>'.$price.'$</td>
                    </tr>
                </table>
           
                <div class="list">
                    <h3>Account information</h3>
                    
                    <div class="group">
                        <label for="email" >E-mail address *</label>
                        <input type="email" name="email" id="email" value="'.$valEmail.'"/>                        
                    </div>
                    
                    <div class="group">
                        <label for="fname" >First name *</label>
                        <input name="fname" type="text" id="fname" value="'.$valfname.'" /> 
                    </div>
                    
                    <div class="group">
                        <label for="lname" >last name *</label>
                        <input name="lname" type="text" id="lname" value="'.$vallname.'"/>   
                    </div>
                    <div class="group">
                        <label  for="pass1" >Password *</label>
                        <input name="pass1" valeu type="password" id="pass1"/>   
                    </div>
                    <div class="group">
                        <label  for="pass2" >Confirm Password: *</label>
                        <input name="pass2" type="password" id="pass2"/>   
                    </div>
                </div>
                <div class="list">
                    <h3>Billing information</h3>
                    
                    <div class="group">
                        <label for="country" >Country *</label>
                        <select name="country" id="country" >
                            <option value="no">--Choose--</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d&rsquo;Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People&rsquo;s Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People&rsquo;s Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>                    
                    </div>
                    
                    <div class="group">
                        <label for="address1" >Address 1 *</label>
                        <input name="address" type="text"  value="'.$valaddress.'" id="address1"/> 
                    </div>

                    <div class="group">
                        <label for="city" >City *</label>
                        <input name="city"  value="'.$valcity.'" type="text" id="city"/>   
                    </div>
                </div>            
                <div class="list">
                    <h3>Payment</h3>
                    
                   <div class="group">
                       <label for="paypal" >
                           <p>
                               <b>Only you can pay by Paypal now :)</b>
                           </p>
                       </label>                       
                    </div>
                <div class="list">
                    
                   <div class="group">
                       <input name="go" type="submit" value="Purchase"/>
                    </div>
                </div>            
                </div>            
            </div>'
                        . '';
                $adapter = str_replace("*", '<span title="required-مطلوب" style="color: #ff0000;">*</span>', $txt4Frc );
                echo $adapter; 
            ?>  
            </form>
        </div>
        <style>
            #footer{
                  position: relative;

            }
        </style>
        <?php include 'inc/footerIN.php';?>
    </body>
</html>
<?php

