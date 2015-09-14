<?php
$text = "This would be fun :)";
$adapter = str_replace(":)", "<img alt=':)''>", $text);
echo $adapter; 
?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<br />
<span class="editName">5566</span>    
<script>
var switchToInput = function () {
        var $input = $("<input>", {
            val: $(this).text(),
            type: "text"
        });
        $input.addClass("editName");
        $(this).replaceWith($input);
        $input.on("blur", switchToSpan);
        $input.select();
    };
    var switchToSpan = function () {
        var $span = $("<span>", {
            text: $(this).val()
        });
        $span.addClass("editName");
        $(this).replaceWith($span);
        $span.on("click", switchToInput);
    }
    $(".editName").on("click", switchToInput);
    </script>
    <!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<body>

<div ng-app="">
 
<p>Input something in the input box:</p>
<textarea ng-model="name"></textarea>
<p ng-bind="name"><a href="#" >ff</a></p>

</div>

</body>
</html>

    