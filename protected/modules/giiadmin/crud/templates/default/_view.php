<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
?>



    <?php
    echo "\t<div class='row'>\n<div class='col-xs-1'><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?></div>\n";
    echo "\t<div class='col-xs-11'><?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view', 'id'=>\$data->{$this->tableSchema->primaryKey})); ?></div>\n\t\n</div>\n";
    $count = 0;
    foreach ($this->tableSchema->columns as $column) {
        if ($column->isPrimaryKey)
            continue;

        echo "\t<div class='row'>\n<div class='col-xs-1'><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?></div>\n";
        echo "\t<div class='col-xs-11'><?php echo CHtml::encode(\$data->{$column->name}); ?></div>\n\t\n</div>\n";
    }
    ?>

</div>
<hr />