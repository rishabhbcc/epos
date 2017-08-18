<style>
	.col-sm-2 .control-label{font-weight:bolder}
</style>
<?php
$class = 'form-group';
//if($field->isInline) $class = 'col-sm-6';
for($count=0;$count<count($formFields);$count++)
{
	$field = $formFields[$count];
	$param = array();
	$param['conditionParam']['param']['id'] = $field['dataType'];
	$dataType = $System->get_field_type_details($param)['data'];
	switch($field['dataType'])
	{
		case 1: // text field
		case 2: // password field
		case 3: // number field
			?>
			<div class="<?= $class ?>" style="margin-bottom:10px;">
				<div class="col-sm-2 control-label"><?= $field['fieldName'] ?></div>
				<div class="col-sm-10" style="padding:0px;">
					<input class="form-control list_menu_1" type="<?= $dataType->fieldType ?>" name="<?= $field['fieldHandler'] ?>" size="<?= $field['size']>0?$field['size']:'auto' ?>" 
					maxlength="<?= $field['maxLength']>0?$field['maxLengh']:'auto' ?>" placeholder="<?= $field['placeholder'] ?>" 
					<?= ($field['isRequired']?'required':'') ?> 
					value="" />
				</div>
				<div class="clear"></div>
				
			</div>
			<?php
			break;
		case 8: // upload file field
			?>
			<div class="<?= $class ?>" style="margin-bottom:10px;">
				<div class="col-sm-2 right-aligned-label"><?= $field['fieldName'] ?></div>
				<div class="col-sm-2 no_pad">
	            	<div class="float-left relative aiupload-left">
						  <input type="<?= $dataType->fieldType ?>" accept="image/jpeg,image/gif,image/png,image/bmp" name="<?= $field['fieldHandler'] ?>" class="imageupload" tabindex="-1">
						  <div class="panel-dashed text-center pam">
						  <i class="fa fa-camera"></i>
						  </div>
						  <span class="btn btn-yellow mtxs js-aiupload-btn"> Add Photos </span> 
	  				</div>
	            </div>
				
				<div class="clear"></div>
				
			</div>
			<?php
			break;
			
		case 4: // drop down field
			$param = array();
			$param['conditionParam']['param']['category'] = $currentCategory;
			$param['conditionParam']['param']['fieldId'] = $field['id'];
			$param['orderBy'] = 'indexValue';
			$options = $Ad->get_field_option_list($param)['data'];
			?>
			<div class="<?= $class ?>" style="margin-bottom:10px;" >
				<div class="col-sm-2 right-aligned-label"><?= $field['fieldName'] ?></div>
				<div class="col-sm-10" style="padding:0px;">
					<select class="form-control list_menu_1" name="<?= $field['fieldHandler'] ?>" id="<?= $field['fieldHandler'].$field['id'] ?>"  
					<?= ($field['isRequired']?'required':'') ?>>
						<option value="">Select</option>
						<?php 
						for($countInner=0;$countInner<count($options);$countInner++)
						{
						?>
						<option value="<?= $options[$countInner]['id'] ?>"><?= $options[$countInner]['optionValue'] ?></option>
						<?php 	
						}
						?>
					</select>
				</div>
				<div class="clear"></div>
			</div>
			<?php
			break;
		case 9: // dependent list field
			$param = array();
			$param['conditionParam']['param']['id'] = $field['dependentField'];
			$dependentField = $Ad->get_category_field_details($param)['data'];
			?>
			<script>
				jQuery( document ).ready(function() {
					jQuery("#<?= $dependentField->fieldHandler.$dependentField->id ?>").change(function(){
						getDependentList("<?= $currentCategory ?>","<?= $field['id'] ?>","<?= $dependentField->fieldHandler.$dependentField->id ?>","<?= $field['fieldHandler'].$count ?>","statusLoading<?= $count ?>");
					});
				});
			</script>
			<div class="<?= $class ?>" style="margin-bottom:10px;" >
				<div class="col-sm-2 right-aligned-label"><?= $field['fieldName'] ?></div>
				<div class="col-sm-10" style="padding:0px;">
					<select class="form-control list_menu_1" name="<?= $field['fieldHandler'] ?>" id="<?= $field['fieldHandler'].$count ?>"  
					<?= ($field['isRequired']?'required':'') ?>>
						<option value="">Select</option>
					</select>
					<label id="statusLoading<?= $count ?>"></label>
				</div>
				<div class="clear"></div>
			</div>
			<?php
			break;
		case 5: // radio button field
			?>
			<div class="<?= $class ?>" style="margin-bottom:10px;">
				<div class="col-sm-2 right-aligned-label"><?= $field['fieldName'] ?></div>
				<div class="col-sm-10" style="padding:0px;">
					<input type="<?= $dataType->fieldType ?>" name="<?= $field['fieldHandler'] ?>" value="" /> 
					kk &nbsp; 
					
				</div>
				<div class="clear"></div>
			</div>
			<?php	
			break;
		case 6: // checkbox field
			?>
			<div class="<?= $class ?>" style="margin-bottom:10px;">
				<div class="col-sm-2 right-aligned-label"><?= $field['fieldName'] ?></div>
				<div class="col-sm-10" style="padding:0px;">
					<input type="<?= $dataType->fieldType ?>" name="<?= $field['fieldHandler'] ?>[]" value=""/> 
					kk &nbsp; 
					
				</div>
				<div class="clear"></div>
			</div>
			<?php	
			break;
		case 7: // text area field
			?>
			<div class="<?= $class ?>" style="margin-bottom:10px;">
				<div class="col-sm-2 right-aligned-label"><?= $field['fieldName'] ?></div>
				<div class="col-sm-10" style="padding:0px;">
					<textarea name="<?= $field['fieldHandler'] ?>" rows="<?= $field['rows'] ?>" cols="<?= $field['columns'] ?>" placeholder="<?= $field['placeholder'] ?>" 
					<?= ($field['isRequired']?'required':'') ?>></textarea>
				</div>
				<div class="clear"></div>
			</div>
			<?php	
			break;
	}
}
?>
	