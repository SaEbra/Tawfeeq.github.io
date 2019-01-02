<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page try</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type = "text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type = "text/javascript"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "Stylesheet" type="text/css" /> 
<script type = "text/javascript">
    
    $(function () {
        $("#txtDate").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0"
        });
    });
     
</script>
 
</head>
<body>
 
 </body>

<input type = "text" id = "txtDate" />	 
 </body>
 </html>