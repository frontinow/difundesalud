<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->modelClass; ?>', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Nuevo <?php echo $this->modelClass; ?>', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-2 col-sm-3 tool-title">Administrar <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></div>            
            <div class="col-xs-10 col-sm-9"> 
                <div class="tool-button">
                    <div class="tool-pagesize">
                        <?php echo "<?php"; ?> $dataProvider = $this->PageSize('<?php echo $this->class2id($this->modelClass); ?>-grid', $model); ?>
                    </div>
                    <div class="tool-menu" >
                   <?php echo "<?php"; ?> 
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


<?php echo "<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->
<div class="table-responsive">
<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
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
