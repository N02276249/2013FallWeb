<?include_once '../inc/_global.php';?>
<html>
<head>
<script>
function showUser(str)
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
    document.getElementById("txtUser").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
function showUserByType(str)
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
    document.getElementById("txtUserByType").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuserbytype.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>


<div class="form-group">
	<label for="Users_id" class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10">
		<select name="users" onchange="showUser(this.value)">
			<option value="">Select a person:</option>				
			<? foreach (Users::GetSelectListBackend() as $UsersRs): ?>
            	<option value="<?=$UsersRs['id'] ?>"><?=$UsersRs['FirstName'] ?> <?=$UsersRs['LastName'] ?></option>
			<? endforeach; ?>
		</select>
	</div>
</div>	
<br>
<div id="txtUser"><b>Person info will be listed here.</b></div>
<br>

<div class="form-group">
	<label for="UserType" class="col-sm-2 control-label">User Type</label>
	<div class="col-sm-10">
		<select name="UserType" onchange="showUserByType(this.value)">	
			<option value="">Select a UserType</option>			
			<? foreach (Keywords::GetSelectListFor(2) as $keywordRs): ?>
            	<option value="<?=$keywordRs['id']?>"><?=$keywordRs['Name']?></option>
			<? endforeach; ?>
		</select>
	</div>
</div>
<br>
<div id="txtUserByType"><b>Person info will be listed here.</b></div>

</body>
</html> 