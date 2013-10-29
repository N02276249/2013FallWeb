<div class="container">
	<dl class="dl-horizontal">
		<dt>First Name</dt>
		<dd><?=$model['FirstName']?></dd>
		<dt>Last Name</dt>
		<dd><?=$model['LastName']?></dd>
		<dt>created_at</dt>
		<dd><?=$model['created_at']?></dd>
		<dt>Password</dt>
		<dd><?=$model['Password']?></dd>	
		<dt>UserType</dt>
		<dd><?=$model['UserType']?></dd>
		<input action="action" type="submit" class="btn btn-primary btn-xs" value="Back" onclick="history.go(-1);" />
	</dl>
</div>
