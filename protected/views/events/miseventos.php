<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#events-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-default">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-2 col-sm-3 tool-title">Mis Eventos Publicados</div>            
        
           
        </div>
    </div>
    <div class="panel-body"> 

<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'name',
		
			
                array(
                       'name' => 'state_id',
                       'value' => '@$data->state->name',
                       'type' => 'text',
                       'header' => 'Estado',                            
                    ),
		
//		'city_id',

                array(
                       'name' => 'municipality_id',
                       'value' => '@$data->municipality->name',
                       'type' => 'text',
                       'header' => 'municipio',                            
                ),
//		'parishe_id',
//		'active',
//		'observation',
		
	array(
            'class' => 'CLinkColumn',
            'header' => 'Detalle',            
            'label' => Yii::app()->params['icon-view'],
            'linkHtmlOptions' => array('class' => 'view btn btn4-primary'),
            'urlExpression' => 'Yii::app()->createUrl("site/detail",array("id"=>$data->id))',           
        ),
        array(
            'class' => 'CLinkColumn',
            'header' => 'Editar',            
            'label' => Yii::app()->params['icon-edit'],
            'linkHtmlOptions' => array('class' => 'edit btn btn10-danger'),
            'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',           
        ),      
	),
)); ?>
</div>
    </div>
    </div>

<script>
    /* Click a boton Delete en el GridView */

    jQuery(document).on('click', '.view', function() {        

        $('#myModal').modal({show: true});        

        url =  $(this).attr('href');
                
         jQuery.ajax({
            'type':'POST',
            'url':url,
            'cache':false,
            'data':jQuery(this).parents("form").serialize(),
            'success':function(html){jQuery("#detailviewagenda").html(html)}
        });
        return false;

    });
        jQuery(document).on('click', '.favorito', function() {   

        

        url = $(this).attr('href');
                
         jQuery.ajax({
            'type':'POST',
            'url':url,
            'cache':false,
            'data':jQuery(this).parents("form").serialize(),
            'success':function(html){
                jQuery("#fav").html(html);
                $('#users-favorites-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
    }
        });
        return false;

    });

       
        


    /* Click de Confirmacion de Boton Delete */

   /* jQuery(document).on('click', '#dialogsubmit', function() {

        $('#loading').addClass('grid-view-loading');

        var url = jQuery(this).attr('href');

        jQuery('#users-filters-grid').yiiGridView('update', {

            type: 'POST',

            url: url,

            success: function(data) {

                $('#loading').removeClass('grid-view-loading');

                $('#users-filters-grid').yiiGridView('update', {

		data: $(this).serialize()

	});

            }

        });

        return false;

    });*/
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content" id="detailviewagenda">            

        </div>

    </div>

</div>