<?php
/* @var $this AdminpromotorController */
/* @var $data Promotor */
?>



    	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('promotor_type_id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->promotor_type_id); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->user_id); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('address')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->address); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->state_id); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('municipality_id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->municipality_id); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('parishe_id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->parishe_id); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->name); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('active')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->active); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('email')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->email); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('code_phone_office')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->code_phone_office); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('number_phone_office')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->number_phone_office); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('code_phone_personal')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->code_phone_personal); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('number_phone_personal')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->number_phone_personal); ?></div>
	
</div>

</div>
<hr />