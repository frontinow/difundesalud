<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="row">

    <div class="col-xs-12">
        <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'id'); ?>
                    <?php echo $form->textField($model,'id'); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'name'); ?>
                    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500)); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'institution'); ?>
                    <?php echo $form->textField($model,'institution',array('size'=>60,'maxlength'=>100)); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'message'); ?>
                    <?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'ambulatory'); ?>
                    <?php echo $form->textField($model,'ambulatory'); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'state_id'); ?>
                    <?php echo $form->textField($model,'state_id'); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'city_id'); ?>
                    <?php echo $form->textField($model,'city_id'); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'municipality_id'); ?>
                    <?php echo $form->textField($model,'municipality_id'); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'parishe_id'); ?>
                    <?php echo $form->textField($model,'parishe_id'); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'active'); ?>
                    <?php echo $form->textField($model,'active'); ?>
                </div>
            </div>

                                <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->label($model,'observation'); ?>
                    <?php echo $form->textArea($model,'observation',array('rows'=>6, 'cols'=>50)); ?>
                </div>
            </div>

                <br />
         <div class="row">
                <div class="col-xs-12">
            <?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn18-primary btn-sm')); ?>
        </div>
             </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- search-form -->