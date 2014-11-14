<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Events', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Nuevo Events', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Detalle Events', 'url'=>array('view', 'id'=>$model->id), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Administrar Events', 'url'=>array('index'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-6 tool-title">Actilizar Evento: <strong><?php echo $model->name; ?></strong></div>            
            <div class="col-xs-6"> 
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
<?php $this->renderPartial('_form', array('model'=>$model, 'days'=>$days)); ?>    </div>
    </div>