<style type="text/css">
        .error {
                color: red;
        }
</style>

<div class="container">
	<h3>Purchase <?=$product['Model'] ?> for $<?=$product['Price']?></h3>
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
        <form action="./receipt.php" method="post" class="form-horizontal row">
                
                <input type="hidden" name="product_id" value="<?=$product['id'] ?>" />
                <input type="hidden" name="product_price" value="<?=$product['Price'] ?>" />
                
                <div class="form-group <?= isset($errors['Users_id']) ? 'has-error' : '' ?>">
                        <label for="Users_id" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                                <select name="Users_id" id="Users_id" class="form-control ">                                
                                        <? foreach (Users::GetSelectList() as $UsersRs): ?>
                         <option value="<?=$UsersRs['id'] ?>"><?=$UsersRs['FirstName'] ?> <?=$UsersRs['LastName'] ?></option>
                                        <? endforeach; ?>
                                </select>
                        </div>
                </div>        
                
                <div class="form-group <?= isset($errors['Address_id']) ? 'has-error' : '' ?>">
                        <label for="Address_id" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                                <select name="Address_id" id="Address_id" class="form-control ">                                
                                        <? foreach (Addresses::GetSelectList(2) as $addressRs): ?>
                         <option value="<?=$addressRs['id'] ?>"><?=$addressRs['Street1'] ?></option>
                                        <? endforeach; ?>
                                </select>
                        </div>
                </div>        
                
                <div class="form-group <?= isset($errors['Payments_id']) ? 'has-error' : '' ?>">
                        <label for="Payments_id" class="col-sm-2 control-label">Payments</label>
                        <div class="col-sm-10">
                                <select name="Payments_id" id="Payments_id" class="form-control ">                                
                                        <? foreach (Payments::GetSelectList(2) as $paymentsRs): ?>
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