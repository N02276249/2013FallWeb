<?Auth::HomeSecure();?>
<style type="text/css">
        .error {
                color: red;
        }
</style>

<?$user=Auth::GetUser();?>

<div class="container">
	<h3>Please select your method of payment and shipping address. Your total for today is: <?=$_REQUEST['total']?></h3>
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
        
        <form action="?action=save" method="post" class="form-horizontal row">
                
		<td class="col-sm-1 col-md-1 text-left"><strong><?=$user['FirstName']?> <?=$user['LastName']?></strong></td>     
                
                <div class="form-group <?= isset($errors['Address_id']) ? 'has-error' : '' ?>">
                        <label for="Address_id" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                                <select name="Address_id" id="Address_id" class="form-control ">                                
                                        <? foreach (Addresses::GetSelectList($user['id']) as $addressRs): ?>
                         <option value="<?=$addressRs['id'] ?>"><?=$addressRs['Street1'] ?></option>
                                        <? endforeach; ?>
                                </select>
                        </div>
                </div>        
                
                <div class="form-group <?= isset($errors['Payments_id']) ? 'has-error' : '' ?>">
                        <label for="Payments_id" class="col-sm-2 control-label">Payments</label>
                        <div class="col-sm-10">
                                <select name="Payments_id" id="Payments_id" class="form-control ">                                
                                        <? foreach (Payments::GetSelectList($user['id']) as $paymentsRs): ?>
                         <option value="<?=$paymentsRs['id'] ?>">XXXX-XXXX-XXXX-<?=substr($paymentsRs['Number'], -4);?> EXP: <?=substr($paymentsRs['Expiration'], 0, -3);?></option>
                                        <? endforeach; ?>
                                </select>
                        </div>
                </div>        
                                                
                <div class="form-group">
                        <div class="col-sm-offset-2 col-lg-10">
                                <input type="submit" class="form-control btn btn-primary" value="Save"/>
                        </div>
                </div>                
        </form>
</div>

<script type="text/javascript">
        $(function(){
$("#Users_id").val(<?=$model['Users_id'] ?>);
$("#Address_id").val(<?=$model["Address_id"] ?>);
$("#Payments_id").val(<?=$model["Payments_id"] ?>);
                                        })
</script>