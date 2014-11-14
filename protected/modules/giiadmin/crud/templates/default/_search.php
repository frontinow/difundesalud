<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="row">

    <div class="col-xs-12">
        <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
)); ?>\n"; ?>

        <?php foreach ($this->tableSchema->columns as $column): ?>
            <?php
            $field = $this->generateInputField($this->modelClass, $column);
            if (strpos($field, 'password') !== false)
                continue;
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php echo "<?php echo \$form->label(\$model,'{$column->name}'); ?>\n"; ?>
                    <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
                </div>
            </div>

        <?php endforeach; ?>
        <br />
         <div class="row">
                <div class="col-xs-12">
            <?php echo "<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn18-primary btn-sm')); ?>\n"; ?>
        </div>
             </div>

        <?php echo "<?php \$this->endWidget(); ?>\n"; ?>
    </div>
</div><!-- search-form -->