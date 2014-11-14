<link href='<?php echo Yii::app()->baseurl; ?>/css/fullcalendar.min.css' rel='stylesheet' />

<link href='<?php echo Yii::app()->baseurl; ?>/css/fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='<?php echo Yii::app()->baseurl; ?>/js/moment.min.js'></script>

<script src='<?php echo Yii::app()->baseurl; ?>/js/fullcalendar.min.js'></script>

<script src='<?php echo Yii::app()->baseurl; ?>/js/fullcalendar-lang-es.js'></script>

<script>



	$(document).ready(function() {



		var currentLangCode = 'es';

		$('#calendar').fullCalendar({

			defaultDate: '2014-09-12',

			lang: currentLangCode,

			editable: true,

			eventLimit: true, // allow "more" link when too many events

			events: [

				{

					title: 'Jornada de Vacunacion en Chacao',

					start: '2014-09-01'

				},

				{

					title: 'Atencion Medica Gratuita en Altamira',

					start: '2014-09-07',

					end: '2014-09-10'

				},

				{

					id: 999,

					title: 'Vacunacion Infantil',

					start: '2014-09-09T16:00:00'

				},

				{

					id: 999,

					title: 'Jornada de Vacunacion en Miranda',

					start: '2014-09-16T16:00:00'

				},

				{

					title: 'Atencion Medica para el Adulto Mayor',

					start: '2014-09-11',

					end: '2014-09-13'

				},

				{

					title: 'Vacunacion Infantil',

					start: '2014-09-12T10:30:00',

					end: '2014-09-12T12:30:00'

				},

				

				{

					title: 'Jornada Medica Comunitaria',

					start: '2014-09-12T14:30:00'

				},

				{

					title: 'Examenes de Perfil 20',

					start: '2014-09-12T17:30:00'

				},

				{

					title: 'Examenes Oftalmologicos en Petare',

					start: '2014-09-12T20:00:00'

				},

				{

					title: 'Jornada Medica Comunitaria',

					start: '2014-09-13T07:00:00'

				},

				{

					title: 'Vacunacion Infantil',

					url: 'http://google.com/',

					start: '2014-09-28'

				}

			]

		});

		

	});



</script>

<style>





	#calendar {

		max-width: 900px;

		margin: 0 auto;

	}



</style>





<div id='calendar'></div>