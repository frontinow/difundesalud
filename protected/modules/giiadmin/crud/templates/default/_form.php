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
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

        <p class="note">Campos con <span class="errorMessage">*</span> son requeridos.</p>

        <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

        <?php
        foreach ($this->tableSchema->columns as $column) {
            if ($column->autoIncrement)
                continue;
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
                    <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
                    <?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
                </div>
            </div>

            <?php
        }
        ?>
        <br />
        <div class="row">
            <div class="col-xs-12">
                
                <?php echo "<?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn9-success btn-sm')); ?>\n"; ?>
                <?php echo "<?php echo CHtml::link('Cancelar',Yii::app()->controller->createUrl('index'),array('class'=>'btn btn5-danger btn-sm')); ?>\n"; ?>
            </div>
        </div>

        <?php echo "<?php \$this->endWidget(); ?>\n"; ?>

    </div>
</div>