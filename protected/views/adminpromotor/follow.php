<?php
/* @var $this AdminpromotorController */
/* @var $model Promotor */

$this->breadcrumbs=array(
	'Promotors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Promotor', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Nuevo Promotor', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Detalle Promotor', 'url'=>array('view', 'id'=>$model->id), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Administrar Promotor', 'url'=>array('index'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title">Seguimiento a Solicitud #<?php echo $model->id; ?></div>            
            <div class="col-xs-9"> 
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
<?php $this->renderPartial('_formfollow', array('model'=>$model, 'consulta' => $consulta,)); ?>    </div>
    </div>