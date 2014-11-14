<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Create',
);

    
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title">Nuevo Evento</div>            
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

        <?php $this->renderPartial('_form', array('model'=>$model, 'days'=>$days)); ?>
    </div>
</div>