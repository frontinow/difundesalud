<?php
/* @var $this EventsController */
/* @var $data Events */
?>



    	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->name); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('institution')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->institution); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('message')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->message); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('ambulatory')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->ambulatory); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->state_id); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->city_id); ?></div>
	
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
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('active')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->active); ?></div>
	
</div>
	<div class='row'>
<div class='col-xs-1'><?php echo CHtml::encode($data->getAttributeLabel('observation')); ?></div>
	<div class='col-xs-11'><?php echo CHtml::encode($data->observation); ?></div>
	
</div>

</div>
<hr />