<?php
/* @var $this AdminpromotorController */
/* @var $model Promotor */
/* @var $form CActiveForm */
?>

<div class="row">

    <div class="col-xs-12">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
        ));
        ?>       

        

        <div class="row">
            <div class="col-xs-12">
                <?php echo $form->label($model, 'state_id'); ?>
                <?php
                echo $form->dropDownList($model, 'state_id', States::getListStates(), array('prompt' => 'Seleccione',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('listmunicipalities'),
                        'update' => '#' . CHtml::activeId($model, 'municipality_id'),
                    ),
                ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <?php echo $form->label($model, 'municipality_id'); ?>
                <?php
                echo $form->dropDownList($model, 'municipality_id', Municipalities::getListMunicipalities($model->state_id), array('prompt' => 'Seleccione',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('listparishes'),
                        'update' => '#' . CHtml::activeId($model, 'parishe_id'),
                    ),));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
<?php echo $form->label($model, 'parishe_id'); ?>
<?php echo $form->dropDownList($model, 'parishe_id', Parishes::getListParishes($model->municipality_id), array('prompt' => 'Seleccione')); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
<?php echo $form->label($model, 'address'); ?>
<?php echo $form->textArea($model, 'address', array('rows' => 1)); ?>
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
            <div class="col-xs-12">
<?php echo CHtml::submitButton('Buscar', array('class' => 'btn btn18-primary btn-sm')); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>
    </div>
</div><!-- search-form -->