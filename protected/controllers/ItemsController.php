<?php

class ItemsController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        
        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_create')) {
		$model=new Items;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Items']))
		{
			$model->attributes=$_POST['Items'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
                                }
		}

		$this->render('create',array(
			'model'=>$model,
		));
                
                      }
                  else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        
         if (Yii::app()->authRBAC->checkAccess($this->modulo . '_update')) {
        
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Items']))
		{
			$model->attributes=$_POST['Items'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
		}
                }

		$this->render('update',array(
			'model'=>$model,
		));
                
                  }
                  else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        
         if (Yii::app()->authRBAC->checkAccess($this->modulo . '_delete')) {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])){
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                        }
                        
                                }
                  else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        
          if (Yii::app()->authRBAC->checkAccess($this->modulo . '_index')) {
		$model=new Items('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Items'])){
			$model->attributes=$_GET['Items'];
                        }
		$this->render('index',array(
			'model'=>$model,
		));
                 }
                  else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{       
                    if (Yii::app()->authRBAC->checkAccess($this->modulo . '_admin')) {
                $dataProvider=new CActiveDataProvider('Items');
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
                       }
                  else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Items the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Items::model()->find(array('condition'=>'id = :id','params'=>array(':id'=>$id)));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Items $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
