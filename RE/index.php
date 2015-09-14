    <!DOCTYPE html>
    <?php
    include 'function.php';
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <script>
  $(function() {
    var availableTags = [
      "نص ",
      "قيمته"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags;
    });
  });
  
  </script>

        </head>
        <body dir="rtl">
<div id="example-one" contenteditable="true">
<style scoped>
  #example-one { margin-bottom: 10px; }
  [contenteditable="true"] { padding: 10px; outline: 2px dashed #CCC; }
  [contenteditable="true"]:hover { outline: 2px dashed #0090D2; }
</style>
<p>Everything contained within this div is editable in browsers that support <code>HTML5</code>. Go on, give it a try: click it and start typing.</p>
</div>
            <form method="post"> 
                <code>
                <textarea  name="text" contenteditable="true" id="tags" class="ui-autocomplete-input" autocomplete="on" style="width: 652px;float: right; margin: 0px; height: 616px;"
                ><?php
              $text = @$_POST['text']; // المدخلات
                    echo $text;
                    ?></textarea> </code> 
                
                <input  type="submit" name="go" />
            </form>
            <div style="float: left;" >
            <?php 
    if (@$_POST['go']) {

                $placeholder = "قيمته";
            if(stristr($text, $placeholder)){  
              $textP = explode(' ', $text);
              $val = array_search($placeholder,$textP) + 1;

            }
            @$inputT ='<form id="test"  style="width: 500px;height: 500px; background: #eee;">'
                    . '<input type="text" placeholder="'.$textP[$val].'"  />'
                    . '</form>'; 
            //اذا طلب فورم نص 
            if(@stristr($text,نص)){  
            echo $inputT;  
            }else{  
            echo"لا توجد الكلمة المراد البحث عنها ضمن النص";  
            }


            }
$alooo = "aloo";
            ?>
         <div id="demo" ></div>
<script>
    var red = "ffff" ;
     red.style.color = "red";
document.getElementById("demo").innerHTML = red;
</script>
<script>
    red.setAttribute("s", "http://www.w3schools.com");
    document.body.appendChild(x);
</script>


                </div>
        </body>
    </html>
