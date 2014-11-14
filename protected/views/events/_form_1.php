<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="row">

    <div class="col-xs-12">

        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'events-form','enableAjaxValidation'=>false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
        
        <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong> Aqui podras agregar la joranada y que dia se realzará
        </div>
        
        <p class="note">Campos con <span class="errorMessage">*</span> son requeridos.</p>
     
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->errorSummary($days); ?>      
        <?php echo $form->errorSummary($Services); ?>      
        <?php echo $form->errorSummary($Promotor); ?>      
        <?php //echo $form->errorSummary($DaysServices); ?>      
        
        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" role="tab" data-toggle="tab">EVENTOS</a></li>
              <li role="presentation"><a href="#profile" role="tab" data-toggle="tab">DIAS</a></li>                      
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <!--------------------------------------------------------------------------------->
                           
                             <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($model,'name'); ?>
                                    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500,'required'=>'required')); ?>
                                    <?php echo $form->error($model,'name'); ?>
                                </div>
                            </div>                      

                            <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($model,'ambulatory'); ?>
                                    <?php echo $form->textField($model,'ambulatory'); ?>
                                    <?php echo $form->error($model,'ambulatory'); ?>
                                </div>
                            </div>
                    <hr />

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
                                   <?php echo CHtml::activeFileField($model,'flayer'); ?>
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
                    <!--------------------------------------------------------------------------------->     
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                    <!--------------------------------------------------------------------------------->
                             <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($Services,'name'); ?>
                                    <?php echo $form->dropDownList($Services,'name', CHtml::listData(Services::model()->findAll(array('order' => 'name ASC')), 'id', 'name'), array('data-placeholder' => 'Seleccione tipo de servivio', 'class' => 'chzn-select form-control', 'tabindex' => '2')); ?>
                                    <?php echo $form->error($Services,'name'); ?>
                                </div>
                            </div>    
                    
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($days,'name'); ?>
                                    <?php echo $form->textField($days,'name',array('size'=>60,'maxlength'=>100)); ?>
                                    <?php echo $form->error($days,'name'); ?>
                                </div>
                            </div>

                                
                            <br />
                            <div class="row">
                                <div class="col-xs-12">
                                      <?php echo $form->labelEx($days,'data'); ?>
                                   <?php               
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                    'model'=>$days,
                                            'attribute'=>'date',
                                            'value'=>'2014-12-30',
                                            'language' => 'es',
                                            'htmlOptions' => array('readonly'=>"readonly",'style'=>'height:40px;'),    
                                            'options'=>array(
                                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                            'autoSize'=>'true',                                    
                                            'defaultDate'=>'2014-12-30',
                                            'dateFormat'=>'yy-mm-dd',
                                            'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
                                            'buttonImageOnly'=>'true',
                                            'selectOtherMonths'=>'true',
                                            'showAnim'=>'fold',//slide
                                            'showButtonPanel'=>'true',
                                            'showOn'=>'button',
                                            'showOtherMonths'=>'true',
                                            'showOtherYears'=>'true',
                                            'changeMonth' => 'true',
                                            'changeYear' => 'true',
                                            'minDate'=>Date('Y-m-d'), //fecha minima
                                            //'maxDate'=>'0' , //fecha maxima
                                    ),

                                ));
                                ?>
                                <?php echo $form->error($days,'date'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($days,'ini_hour'); ?>                    
                                    <?php echo $form->textField($days,'ini_hour',array('class'=>'tiempo')); ?>                  
                                    <?php echo $form->error($days,'ini_hour'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($days,'fin_hour'); ?>
                                    <?php echo $form->textField($days,'fin_hour',array('class'=>'tiempo_fin')); ?>
                                    <?php echo $form->error($days,'fin_hour'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <?php echo $form->labelEx($days,'all_day'); ?>
                                    <?php
                                        $this->widget('application.extensions.SwitchToggleJD.SwitchToggleJD', array(
                                            'attribute' => 'all_day',
                                            'model'=>$days)
                                        );
                                        ?>
                                    <?php echo $form->error($days,'all_day'); ?>
                                </div>
                            </div>
                    
                    <!--------------------------------------------------------------------------------->
            </div>
                    
            </div>


            <hr />
            <div class="row">
            <div class="col-xs-12">
                
                <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn9-success btn-sm')); ?>
                <?php echo CHtml::link('Cancelar',Yii::app()->controller->createUrl('index'),array('class'=>'btn btn5-danger btn-sm')); ?>
            </div>
            </div>

        <?php $this->endWidget(); ?>

    </div>
</div>
<?php Yii::app()->clientScript->registerScript('time', "
   $('.tiempo').timepicker({
                        hourGrid: 4,
                        minuteGrid: 10,
                        timeFormat: 'hh:mm tt'
                       });

"); ?>

<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css'); ?>
