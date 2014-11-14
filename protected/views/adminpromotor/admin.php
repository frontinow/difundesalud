<?php
/* @var $this AdminpromotorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Promotors',
);

$this->menu=array(
	array('label'=>'Nuevo Promotor', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Administrar Promotor', 'url'=>array('index'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title">Lista Promotors</div>            
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

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

    </div>
    </div>
