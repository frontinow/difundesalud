<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'events-_form-form',
    'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-xs-12">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>
    </div>

<h3>Direccion del Evento</h3>
 <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <?php echo $form->labelEx($model,'state_id'); ?>
                                    <?php echo $form->dropDownList($model,'state_id',States::getListStates(), array('prompt' => 'Seleccione',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('listmunicipalities'),
                            'update' => '#' . CHtml::activeId($model, 'municipality_id'),
                        ),
                    )); ?>
                                    <?php echo $form->error($model,'state_id'); ?>
                                </div>
                          
                                <div class="col-xs-12 col-sm-4">
                                    <?php echo $form->labelEx($model,'municipality_id'); ?>
                                    <?php echo $form->dropDownList($model,'municipality_id',Municipalities::getListMunicipalities($model->state_id), array('prompt' => 'Seleccione',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('listparishes'),
                            'update' => '#' . CHtml::activeId($model, 'parishe_id'),
                        ))); ?>
                                    <?php echo $form->error($model,'municipality_id'); ?>
                                </div>
                            
                                <div class="col-xs-12 col-sm-4">
                                    <?php echo $form->labelEx($model,'parishe_id'); ?>
                                    <?php echo $form->dropDownList($model,'parishe_id',Parishes::getListParishes($model->municipality_id), array('prompt' => 'Seleccione')); ?>
                                    <?php echo $form->error($model,'parishe_id'); ?>
                                </div>
                            </div>
                     <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($model,'message'); ?>
                                    <?php echo $form->textArea($model,'message',array('rows'=>1)); ?>
                                    <?php echo $form->error($model,'message'); ?>
                                </div>
                            </div>
                    <hr />

                        <div class="row">
                            <div class="col-xs-12">
        <?php echo $form->labelEx($model,'flayer'); ?>
        <?php echo $form->fileField($model,'flayer'); ?>
        <?php echo $form->error($model,'flayer'); ?>
    </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
        <?php echo $form->labelEx($model,'observation'); ?>
        <?php echo $form->textArea($model,'observation',array('rows'=>2)); ?>
        <?php echo $form->error($model,'observation'); ?>
    </div>
</div>

    <hr />

    <h3>Dias del Evento</h3>



    <?php if (count($days) > 0) { ?>
        <div class="row">
        <div class="col-xs-12">

                <?php 
                echo CHtml::ajaxLink('<i class="fa fa-plus-circle"></i>', array('diasadd'), array('update' => '#diasadd', 'type' => 'POST'),array('class'=>'btn btn-info')); ?>


                <div id="diasadd">
                    
                        <?php
                        $i = 1;
                        foreach ($days as $num) {
                            $this->renderPartial('_formday', array('days' => $days, 'i' => $i, 'form' => $form));
                            $i++;
                        }
                        ?>
                   
                </div>
            </div>
            </div>
    <?php } ?>




            <hr />
            <div class="row">
            <div class="col-xs-12">
                
                <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn9-success btn-sm')); ?>
                <?php echo CHtml::link('Cancelar',Yii::app()->controller->createUrl('index'),array('class'=>'btn btn5-danger btn-sm')); ?>
            </div>
            </div>




<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript('time', "
   $('.tiempo').timepicker({
                        hourGrid: 4,
                        minuteGrid: 10,
                        timeFormat: 'hh:mm tt'
                       });

"); ?>

<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css'); ?>
