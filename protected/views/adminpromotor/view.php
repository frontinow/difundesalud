<?php
/* @var $this AdminpromotorController */
/* @var $model Promotor */

$this->breadcrumbs=array(
	'Promotors'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'Seguimiento', 'url'=>array('follow', 'id'=>$model->id), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
    array('label'=>'Editar Solicitud', 'url'=>array('update', 'id'=>$model->id), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
array('label'=>'Administrar Solicitudes', 'url'=>array('index'), 'linkOptions' => array('class' => Yii::app()->params['boton'])),
);
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title">Detalle Solicitud #<?php echo $model->id; ?></div>            
            <div class="col-xs-9"> 
                <div class="tool-button">
                    <?php 
                    $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'encodeLabel' => FALSE,
                    'htmlOptions' => array('class' => 'cmenuhorizontal'),
                    ));
                    ?>
                </div>
            </div>            
        </div>
    </div>
    <div class="panel-body">
  <div class="table-responsive" >
            <table class="table table-bordered">
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('promotor_type_id')); ?></th>
                    <td><?php echo $model->promotorType->name; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('name')); ?></th>
                    <td><?php echo $model->name; ?></td>
                </tr>
                 <tr>
                    <th>Solicitante</th>
                    <td><?php echo $model->user->username; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('address')); ?></th>
                    <td><?php echo $model->address; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('state_id')); ?></th>
                    <td><?php echo $model->state->name; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('municipality_id')); ?></th>
                    <td><?php echo $model->municipality->name; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('parishe_id')); ?></th>
                    <td><?php echo $model->parishe->name; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
                    <td><?php echo $model->email; ?></td>
                </tr>

                <tr>
                    <th>Telefono Oficina</th>
                    <td><?php echo $model->code_phone_office . $model->number_phone_office; ?></td>
                </tr>
                <tr>
                    <th>Telefono Personal</th>
                    <td><?php echo $model->code_phone_personal . $model->number_phone_personal; ?></td>
                </tr>
                <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('active')); ?></th>
                    <td><?php echo Promotor::getEstatus($model->active); ?></td>
                </tr>
                 <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('date')); ?></th>
                    <td><?php echo Promotor::getEstatus($model->date); ?></td>
                </tr>
                 <tr>
                    <th><?php echo CHtml::encode($model->getAttributeLabel('time')); ?></th>
                    <td><?php echo Promotor::getEstatus($model->time); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>