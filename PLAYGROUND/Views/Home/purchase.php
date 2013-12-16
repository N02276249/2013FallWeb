<?Auth::HomeSecure();?>
<?$_SESSION['url'] = $_SERVER['REQUEST_URI'];?>
<style type="text/css">
        .error {
                color: red;
        }
</style>

<?$user=Auth::GetUser();?>

<div class="container">
	<h3>Please select your method of payment and shipping address. Your total for today is: $<?=$_REQUEST['total']?></h3>
	<br>
        
        <? if (isset($errors) && $errors): ?>
                <ul class="error">
                        <? foreach ($errors as $key => $value): ?>
                                <li>
                                        <label><?=$key ?>:</label><?=$value ?>
                                </li>
                        <? endforeach; ?>
                </ul>
        <? endif; ?>
		<br><br> 
        <form action="?action=finalPurchase" method="post" class="form-horizontal row">
                

		
				<input type="hidden" name="Users_id" value="<?=$user['id'] ?>" />	
				
				<div class="form-group ">
                        <label for="UserName" class="col-sm-2 control-label">User</label>
                        <div class="col-sm-10">
                                <input type="text" name="UserName" id="UserName" placeholder="UserName" class="form-control " value="<?=$user['FirstName'] ?> <?=$user['LastName'] ?>"  readonly/>
                                                  </div>
                </div>    
                
                <div class="form-group <?= isset($errors['Address_id']) ? 'has-error' : '' ?>">
                        <label for="Address_id" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                                <select name="Address_id" id="Address_id" class="form-control ">                                
                                        <? foreach (Addresses::GetSelectList($user['id']) as $addressRs): ?>
                         <option value="<?=$addressRs['A_id'] ?>"><?=$addressRs['Street1'] ?></option>
                                        <? endforeach; ?>
                                </select>
                        </div>
                </div>        
                
                <div class="form-group <?= isset($errors['Payments_id']) ? 'has-error' : '' ?>">
                        <label for="Payments_id" class="col-sm-2 control-label">Payments</label>
                        <div class="col-sm-10">
                                <select name="Payments_id" id="Payments_id" class="form-control ">                                
                                        <? foreach (Payments::GetSelectList($user['id']) as $paymentsRs): ?>               
                         <option value="<?=$paymentsRs['P_id'] ?>">XXXX-XXXX-XXXX-<?=substr($paymentsRs['Number'], -4);?> EXP: <?=substr($paymentsRs['Expiration'], 0, -3);?></option>
                                        <? endforeach; ?>
                                </select>
                        </div>
                </div>        
                                                
                <div class="form-group">
                        <div class="col-sm-offset-2 col-lg-10">
                                <input type="submit" class="form-control btn btn-primary" value="Finalize Order"/>
                        </div>
                </div>                
        </form>
	<div class="col-sm-offset-2 col-md-4">
		<a href="?action=newAddress" class="btn btn-success " role="button" align="center">Add Address</a>
		<a href="?action=newPayment" class="btn btn-success" role="button">Add Payment</a>
	</div>
</div>