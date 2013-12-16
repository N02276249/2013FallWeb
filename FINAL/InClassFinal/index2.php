<html>
 <head>
 <script>
 function getZip(str)
 {
 if (str=="")
   {
   document.getElementById("txtHint").innerHTML="";
   return;
   } 
 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
     }
   }
 xmlhttp.open("GET","getZip.php?q="+str,true);
 xmlhttp.send();
 }
 </script>
 </head>
 <body>

 <form>
 <select name="users" onchange="getZip(this.value)">
 <option value="">Select a Zip:</option>
 <option value="1">501</option>
 <option value="2">544</option>
 <option value="3">601</option>
 <option value="4">602</option>
 </select>
 </form>
 <br>
 <div id="txtHint"><b>Person info will be listed here.</b></div>

 </body>
 </html> 