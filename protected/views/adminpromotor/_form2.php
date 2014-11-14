<?php
/* @var $this AdminpromotorController */
/* @var $model Promotor */
/* @var $form CActiveForm */
?>

<div class="row">

    <div class="col-xs-12">

        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'promotor-form',
	'enableAjaxValidation'=>false,
)); ?>

        <p class="note">Campos con <span class="errorMessage">*</span> son requeridos.</p>

        <?php echo $form->errorSummary($model); ?>

                    <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'promotor_type_id'); ?>
                    <?php echo $form->textField($model,'promotor_type_id'); ?>
                    <?php echo $form->error($model,'promotor_type_id'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'user_id'); ?>
                    <?php echo $form->textField($model,'user_id'); ?>
                    <?php echo $form->error($model,'user_id'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'address'); ?>
                    <?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
                    <?php echo $form->error($model,'address'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'state_id'); ?>
                    <?php echo $form->textField($model,'state_id'); ?>
                    <?php echo $form->error($model,'state_id'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'municipality_id'); ?>
                    <?php echo $form->textField($model,'municipality_id'); ?>
                    <?php echo $form->error($model,'municipality_id'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'parishe_id'); ?>
                    <?php echo $form->textField($model,'parishe_id'); ?>
                    <?php echo $form->error($model,'parishe_id'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
                    <?php echo $form->error($model,'name'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'active'); ?>
                    <?php echo $form->textField($model,'active'); ?>
                    <?php echo $form->error($model,'active'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'email'); ?>
                    <?php echo $form->textArea($model,'email',array('rows'=>6, 'cols'=>50)); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'code_phone_office'); ?>
                    <?php echo $form->textField($model,'code_phone_office',array('size'=>4,'maxlength'=>4)); ?>
                    <?php echo $form->error($model,'code_phone_office'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'number_phone_office'); ?>
                    <?php echo $form->textField($model,'number_phone_office',array('size'=>7,'maxlength'=>7)); ?>
                    <?php echo $form->error($model,'number_phone_office'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'code_phone_personal'); ?>
                    <?php echo $form->textField($model,'code_phone_personal',array('size'=>4,'maxlength'=>4)); ?>
                    <?php echo $form->error($model,'code_phone_personal'); ?>
                </div>
            </div>

                        <div class="row">
                <div class="col-xs-12">
                    <?php echo $form->labelEx($model,'number_phone_personal'); ?>
                    <?php echo $form->textField($model,'number_phone_personal',array('size'=>7,'maxlength'=>7)); ?>
                    <?php echo $form->error($model,'number_phone_personal'); ?>
                </div>
            </div>

                    <br />
        <div class="row">
            <div class="col-xs-12">
                
                <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn9-success btn-sm')); ?>
                <?php echo CHtml::link('Cancelar',Yii::app()->controller->createUrl('index'),array('class'=>'btn btn5-danger btn-sm')); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>
</div>