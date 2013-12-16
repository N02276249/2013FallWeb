<!DOCTYPE html>

<html> 

<head> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<title>Auto Complete Input box</title>  

<script type="text/javascript" src="jquery.js"></script> 

<script type="text/javascript" src="jquery.ajaxcomplete.js"></script> 

<script> 

$(document).ready(function(){ 

 $("#US_Zip_Codes").autocomplete("ajaxcomplete.php", { 

selectFirst: true 

}); 

}); 

</script> 

</head> 

  

<body> 

    <label>Enter the Zip Code </label> 

    <input name="US_Zip_Codes" type="text" id="US_Zip_Codes" size="20"/> 

</body> 

</html> 