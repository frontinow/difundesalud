<?php

class PerfilController extends Controller {

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

    public $modulo = 'perfil';
    public $modulo_name = 'Perfil';
    public $modulo_singular = 'Perfil';
    public $modulo_icon = '<i class="icon-titulo"></i>';
    
    public function accessRules()
    {
        return array(
            array('allow',
                 'actions' => array('index', 'changepassword'),
                'users'=>array('*'),
            ),            
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
           public function __construct($id, $module = null) {

        parent::__construct($id, $module);

        
    }
        
            public function actionIndex() {

        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_view')) {

            $model = Users::model()->find(array('condition'=>'id = :id','params'=>array(':id'=>Yii::app()->user->id)));


            $this->render('index', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }
        
        

     public function actionChangepassword() {

        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_changepassword')) {

            $model = Users::model()->find(array('condition'=>'id = :id','params'=>array(':id'=>Yii::app()->user->id)));

            
            if(isset($_POST['submit'])){
                
                $model->attributes = $_POST['Users'];
                
                $result  = ValidateSafePassword::main($model->password, $model->passwordconfirm);
                
                if($result['resultado'] == TRUE) {

                    $model->password = ValidateSafePassword::Hash($model->password);
                    
                    if($model->save()) {
                        $this->redirect(array('default/index'));
                    }
                    
                } else {
                    $error = $result['error'];
                }                   
            }
            
            $this->render('changepassword', array(
                'model' => $model,'error'=>@$error
            ));
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }
    
}