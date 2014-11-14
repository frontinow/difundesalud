<?php

class CalendarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', /* Acciones Permitidas*/
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),			
			array('deny',
				'users'=>array('*'),
			),
		);
	}
        
         public $modulo = "";

	/**
	 * 
	 * 
	 */
	public function actionView($id)
	{
         if (Yii::app()->authRBAC->checkAccess($this->modulo . '_view')) {
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
                    }
                  else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
	}

	
	public function actionIndex()
	{
        
          if (Yii::app()->authRBAC->checkAccess($this->modulo . '_index')) {
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Events'])){
			$model->attributes=$_GET['Events'];
                        }
		$this->render('index',array(
			'model'=>$model,
		));
                 }
                  else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
	}

	}
