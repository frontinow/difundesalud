<?php
/* @var $this AdminpromotorController */
/* @var $model Promotor */

$this->breadcrumbs=array(
	'Promotors'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Promotor', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
array('label'=>'Administrar Promotor', 'url'=>array('index'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title">Nuevo Promotor</div>            
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

        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>