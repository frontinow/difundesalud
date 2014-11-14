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
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->modelClass; ?>', 'url'=>array('admin'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Nuevo <?php echo $this->modelClass; ?>', 'url'=>array('create'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Detalle <?php echo $this->modelClass; ?>', 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
	array('label'=>'Administrar <?php echo $this->modelClass; ?>', 'url'=>array('index'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title">Editar <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></div>            
            <div class="col-xs-9"> 
                <div class="tool-button">
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
    <div class="panel-body">
<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
    </div>
    </div>