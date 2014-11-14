<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Events', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Nuevo Events', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#events-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-2 col-sm-3 tool-title">Administrar Events</div>            
            <div class="col-xs-10 col-sm-9"> 
                <div class="tool-button">
                    <div class="tool-pagesize">
                        <?php $dataProvider = $this->PageSize('events-grid', $model); ?>
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


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		
		'name',
		'institution',
		'message',
		'ambulatory',		
                array(
                       'name' => 'state_id',
                       'value' => '@$data->state->name',
                       'type' => 'text',
                       'header' => 'Estado',                            
                    ),
		
//		'city_id',

                array(
                       'name' => 'municipality_id',
                       'value' => '@$data->municipality->name',
                       'type' => 'text',
                       'header' => 'municipio',                            
                ),
//		'parishe_id',
//		'active',
//		'observation',
		
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
	),
)); ?>
</div>
    </div>
    </div>
