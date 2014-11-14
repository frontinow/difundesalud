<?php
/* @var $this PromotorController */
/* @var $model Promotor */
/* @var $form CActiveForm */
?>
<div class="block-center mt-xl wd-xl-form">
    <div class="row">

        <div class="col-xs-12">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'promotor-form',
                'enableAjaxValidation' => false,
            ));
            ?>



            <?php //echo $form->errorSummary($model); ?>

            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <?php echo $form->labelEx($model, 'promotor_type_id'); ?>
                </div>
                <div class="col-xs-12 col-sm-9">

                    <?php echo $form->dropDownList($model, 'promotor_type_id', PromotorTypes::getListPromotorType(), array('prompt' => 'Seleccione')); ?>
                    <?php echo $form->error($model, 'promotor_type_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <?php echo $form->labelEx($model, 'name'); ?>
                </div>
                <div class="col-xs-12 col-sm-9">

                    <?php echo $form->textField($model, 'name', array()); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <?php echo $form->labelEx($model, 'state_id'); ?>
                </div>
                <div class="col-xs-12 col-sm-9">

                    <?php echo $form->dropDownList($model, 'state_id', States::getListStates(), array('prompt' => 'Seleccione',
                        
                        'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('listmunicipalities'),
                        'update' => '#' . CHtml::activeId($model, 'municipality_id'),
                    ),
                        )); ?>
                    <?php echo $form->error($model, 'state_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <?php echo $form->labelEx($model, 'municipality_id'); ?>
                </div>
                <div class="col-xs-12 col-sm-9">

                    <?php echo $form->dropDownList($model, 'municipality_id', Municipalities::getListMunicipalities($model->state_id), array('prompt' => 'Seleccione',
                        'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('listparishes'),
                        'update' => '#' . CHtml::activeId($model, 'parishe_id'),
                    ),)); ?>
                    <?php echo $form->error($model, 'municipality_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <?php echo $form->labelEx($model, 'parishe_id'); ?>
                </div>
                <div class="col-xs-12 col-sm-9">

                    <?php echo $form->dropDownList($model, 'parishe_id', Parishes::getListParishes($model->municipality_id), array('prompt' => 'Seleccione')); ?>
                    <?php echo $form->error($model, 'parishe_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model, 'address'); ?>
                </div>
                <div class="col-xs-12 col-sm-9">
                    
                    <?php echo $form->textArea($model, 'address', array('rows' => 1)); ?>
                    <?php echo $form->error($model, 'address'); ?>
                </div>
            </div>
            <hr />

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <?php echo $form->labelEx($model, 'email'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">

                    <?php echo $form->textField($model, 'email'); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <label>Telefono Oficina</label>
                </div>
                <div class="col-xs-12 col-sm-8">

                    <div class="row">                       

                        <div class="col-xs-4">

                            <?php echo $form->textField($model, 'code_phone_office', array('size' => 4, 'maxlength' => 4,'class'=>'')); ?>

                        </div>

                        <div class="col-xs-8">

                            <?php echo $form->textField($model, 'number_phone_office', array('size' => 7, 'maxlength' => 7)); ?>

                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12">

                            <?php echo $form->error($model, 'code_phone_office'); ?>
                            <?php echo $form->error($model, 'number_phone_office'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <label>Telefono personal</label>
                </div>
                <div class="col-xs-12 col-sm-8">

                    <div class="row">                       

                        <div class="col-xs-4">                            
                            <?php echo $form->textField($model, 'code_phone_personal', array('size' => 4, 'maxlength' => 4)); ?>

                        </div>

                        <div class="col-xs-8">                            
                            <?php echo $form->textField($model, 'number_phone_personal', array('size' => 7, 'maxlength' => 7)); ?>                            
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12">

                            <?php echo $form->error($model, 'code_phone_personal'); ?>
                            <?php echo $form->error($model, 'number_phone_personal'); ?>
                        </div>
                    </div> 
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <?php echo CHtml::submitButton('Guardar', array('class' => 'btn btn9-success btn-sm')); ?>
                    <?php echo CHtml::link('Cancelar', Yii::app()->controller->createUrl('index'), array('class' => 'btn btn5-danger btn-sm')); ?>
                </div>
                <div class="col-xs-12 col-sm-6"><p class="text-right">Campos con <span class="errorMessage">*</span> son requeridos.</p></div>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>
</div>
<style>
    
    .block-center {
        margin: 0px auto;
    }
    .mt-xl {
        margin-top: 30px !important;
    }
</style>