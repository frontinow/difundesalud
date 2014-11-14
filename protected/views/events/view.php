<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'Listar Events', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
array('label'=>'Nuevo Events', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
array('label'=>'Editar Events', 'url'=>array('update', 'id'=>$model->id), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
array('label'=>'Administrar Events', 'url'=>array('index'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-7 tool-title">Detalle Events  <strong><?php echo $model->name; ?></strong> </div>            
            <div class="col-xs-5"> 
                <div class="tool-button">
                    <?php 
                    $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'encodeLabel' => FALSE,
                    'htmlOptions' => array('class' => 'cmenuhorizontal'),
                    ));
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <div class="panel-body">

        <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
               array(
                  'label'=>'flayer',
                  'type'=>'raw',
                  'value'=>Chtml::image(Yii::app()->baseUrl.'/uploads/flayer/'.$model->flayer,'',array('width' => 200))
                   
               ),
		'name',
		'institution',
		'message',
		'ambulatory',
		'state_id',
		'city_id',
		array(
                       'name' => 'municipality_id',
                       'value' => '@$data->municipality->name',
                       'type' => 'text',
                       'header' => 'municipio',                            
                ),
		'parishe_id',
		'active',
		'observation',
        ),
        )); ?>
    </div>
</div>