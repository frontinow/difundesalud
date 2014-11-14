<?php
/* @var $this PromotorController */
/* @var $model Promotor */
/* @var $form CActiveForm */
?>
<div class="block-center mt-xl wd-xl-form">
    <div class="row">

        <div class="col-xs-12">
            
            <div class="table-responsive" >
            <table class="table table-bordered">
                <tr>
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('promotor_type_id')); ?></th>
                    <td><?php echo $consulta->promotorType->name; ?></td>
                
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('name')); ?></th>
                    <td><?php echo $consulta->name; ?></td>
                </tr>
                 <tr>
                    <th>Solicitante</th>
                    <td><?php echo $consulta->user->username; ?></td>
                
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('email')); ?></th>
                    <td><?php echo $consulta->email; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('address')); ?></th>
                    <td colspan="3"><?php echo $consulta->address; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('state_id')); ?></th>
                    <td><?php echo $consulta->state->name; ?></td>
                
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('municipality_id')); ?></th>
                    <td><?php echo $consulta->municipality->name; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('parishe_id')); ?></th>
                    <td colspan="3"><?php echo $consulta->parishe->name; ?></td>
                </tr>               

                <tr>
                    <th>Telefono Oficina</th>
                    <td><?php echo $consulta->code_phone_office . $consulta->number_phone_office; ?></td>
                
                    <th>Telefono Personal</th>
                    <td><?php echo $consulta->code_phone_personal . $consulta->number_phone_personal; ?></td>
                </tr>
                 <tr>
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('date')); ?></th>
                    <td><?php echo Promotor::getEstatus($consulta->date); ?></td>
                
                    <th><?php echo CHtml::encode($consulta->getAttributeLabel('time')); ?></th>
                    <td><?php echo Promotor::getEstatus($consulta->time); ?></td>
                </tr>
            </table>
        </div>
            

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'promotor-form',
                'enableAjaxValidation' => false,
            ));
            ?>



            <?php //echo $form->errorSummary($model); ?>

            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <?php echo $form->labelEx($model, 'active'); ?>
                </div>
                <div class="col-xs-12 col-sm-9">

                    <?php echo $form->dropDownList($model, 'active', Promotor::getListEstatus(), array()); ?>
                    <?php echo $form->error($model, 'active'); ?>
                </div>
            </div>          
            <hr />
           
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