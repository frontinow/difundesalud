<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ForgetPass extends CFormModel {

    public $lausername;
    public $verifyCode;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('lausername', 'required', 'message' => 'El campo no puede estar vacio'),
            array('lausername', 'email', 'message' => 'Formato de correo electronico errado'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            array('lausername','validaemail'),
        );
    }

    /* Valida que exista ese correo y que sea un usuario 4 o 5 */

    public function validaemail() {

        /* Consulto Usuario */
        $usuario = Users::model()->find(array(
            'select' => 'id, username, active, rol_id',
            'condition' => "username = :username",
            'params' => array('username' => $this->lausername)
        ));
        
        if($usuario === NULL){
            Yii::app()->user->setFlash('error', "El usuario no es valido. Por favor verifique");
        } else {
            
            if($usuario->active == 1){
              if($usuario->rol_id == 4 OR $usuario->rol_id == 5){
                
                
                
            } else {
              Yii::app()->user->setFlash('error', "Esta opcion solo es valida para usuarios o promotores");  
            }  
                
                
            } else {
              Yii::app()->user->setFlash('error', "El usuario no se encuentra activo para procesar esta opcion");  
            }
            
        }
        
        
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'lausername' => 'Usuario',
        );
    }

}
