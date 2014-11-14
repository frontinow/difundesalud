<?php
/* @var $this AdminpromotorController */
/* @var $model Promotor */

$this->breadcrumbs = array(
    'Promotors' => array('index'),
    'Manage',
);

/* $this->menu=array(
  array('label'=>'Listar Promotor', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
  array('label'=>'Nuevo Promotor', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
  ); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#promotor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-2 col-sm-3 tool-title">Solicitudes de Promotor</div>            
            <div class="col-xs-10 col-sm-9"> 
                <div class="tool-button">
                    <div class="tool-pagesize">
                        <?php $dataProvider = $this->PageSize('promotor-grid', $model); ?>
                    </div>
                    <div class="tool-menu" >
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
    </div>
    <div class="panel-body"> 


        <?php echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button')); ?>
        <div class="search-form" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>
        </div><!-- search-form -->
        <div class="table-responsive">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'promotor-grid',
                'dataProvider' => $dataProvider,
                'filter' => $model,
                'columns' => array(
                    array('name' => 'id', 'value' => '$data->id', 'header' => '#'),
                    array('name' => 'promotor_type_id', 'value' => '$data->promotorType->name', 'filter' => PromotorTypes::getListPromotorType()),
                    'name',
                    array('name' => 'user_id', 'value' => '$data->user->username', 'header' => 'Solicitante'),
                    'email',
                    array('name' => 'active', 'type' => 'html', 'value' => 'Promotor::getEstatus(@$data->active)', 'filter' => Promotor::getListEstatus()),
                    'date',
                    'time',
                    array(
                        'class' => 'CLinkColumn',
                        'header' => 'Detalle',
                        'label' => Yii::app()->params['icon-view'],
                        'linkHtmlOptions' => array('class' => 'view btn btn4-primary'),
                        'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                    ),
                    array(
                        'class' => 'CLinkColumn',
                        'header' => 'Editar',
                        'label' => Yii::app()->params['icon-edit'],
                        'linkHtmlOptions' => array('class' => 'edit btn btn10-danger'),
                        'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                    ),
                    array(
                        'class' => 'CLinkColumn',
                        'header' => 'Seguimiento',
                        'label' => Yii::app()->params['icon-edit'],
                        'linkHtmlOptions' => array('class' => 'edit btn btn-success'),
                        'urlExpression' => 'Yii::app()->controller->createUrl("follow",array("id"=>$data->id))',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
