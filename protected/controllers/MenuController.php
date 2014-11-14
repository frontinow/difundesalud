<?php

class MenuController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','rolesitems'),
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
		$model=new Menus;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menus']))
		{
			$model->attributes=$_POST['Menus'];
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

		if(isset($_POST['Menus']))
		{
			$model->attributes=$_POST['Menus'];
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
		$model=new Menus('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Menus'])){
			$model->attributes=$_GET['Menus'];
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
                $dataProvider=new CActiveDataProvider('Menus');
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
	 * @return Menus the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Menus::model()->find(array('condition'=>'id = :id','params'=>array(':id'=>$id)));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Menus $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menus-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionRolesitems() {
             //if (Yii::app()->authRBAC->checkAccess($this->modulo . '_rolesitems')) {

        /* Inicio de la Transaccion */
        $transaccion_sql = Yii::app()->db->beginTransaction();

        $model = new RolesItems;

        $options = array();

        if (isset($_POST['RolesItems'])) {
            $model->attributes = $_POST['RolesItems'];
        }

        if ($model->rol_id != NULL) {

            if (isset($_POST['yt0'])) {

                RolesItems::model()->updateAll(
                        array('active' => 0), "rol_id = :rol_id", array(':rol_id' => $model->rol_id)
                );

                if (isset($_POST['Items'])) {

                    foreach ($_POST['Items'] as $a => $b) {

                        $rol = RolesItems::model()->find(array(
                            'condition' => "item_id = :item_id AND rol_id = :rol_id",
                            'params' => array(':item_id' => $a, ':rol_id' => $model->rol_id)
                                )
                        );

                        if (count($rol) == 1) {
                            $rol->active = 1;
                        } else {
                            $rol = new RolesItems;
                            $rol->item_id = $a;
                            $rol->rol_id = $model->rol_id;
                            $rol->active = 1;
                        }
                        if ($rol->validate()) {
                            if ($rol->save()) {
                                
                            } else {
                                /* Defino una Variable que mas abajo genere un Rollback */
                                Yii::app()->params['rollback'] = TRUE;
                            }
                        } else {
                            /* Defino una Variable que mas abajo genere un Rollback */
                            Yii::app()->params['rollback'] = TRUE;
                        }
                    }
                }

                if (Yii::app()->params['rollback'] == FALSE) {
                    /* Hago el Commit de todas las Transacciones */
                    $transaccion_sql->commit();
                    Yii::app()->user->setFlash('success', Yii::app()->params['msjsuccess']);
                }
            }

            /* Consulta de Items */
            $sql = new CDbCriteria();

            $sql->condition = "t.active = 1 AND menu.active = 1";

            $sql->with = array('menu');

            $sql->order = "menu.position ASC, t.name ASC";

            $items = Items::model()->findAll($sql);

            foreach ($items as $item) {
                $options[$item->menu->name]['menu'] = $item->menu->name;
                $options[$item->menu->name]['menuicon'] = $item->menu->icon;
                $options[$item->menu->name]['data'][$item->id]['opcion'] = $item->id;
                $options[$item->menu->name]['data'][$item->id]['name'] = $item->name;
                $options[$item->menu->name]['data'][$item->id]['value'] = FALSE;
            }

            $sqlrol = new CDbCriteria();

            $sqlrol->condition = "t.rol_id = :rol_id AND item.active = 1 AND menu.active = 1 AND t.active = 1";

            $sqlrol->params = array(':rol_id' => intval($model->rol_id));

            $sqlrol->with = array('item' => array('with' => 'menu'));

            $sqlrol->order = "menu.position ASC, item.name ASC";

            $rolesitems = RolesItems::model()->findAll($sqlrol);

            foreach ($rolesitems as $list) {

                $options[$list->item->menu->name]['data'][$list->item->id]['value'] = TRUE;
            }
        }

        $this->render('rolesitems', array(
            'model' => $model,
            'options' => $options,
        ));
        /*   } else {
          throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
          } */
        }
}
