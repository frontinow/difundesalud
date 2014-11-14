<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterAccess extends CFormModel {

    public $lausername;
    public $lapassword;
    public $laconfirmation;
    public $verifyCode;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('lausername, lapassword, laconfirmation', 'required','message'=>'El campo no puede estar vacio'),            
            array('lausername', 'email','message'=>'Formato de correo electronico errado'),  
            array('lausername', 'unique'),  
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'lausername' => 'Usuario',
            'lapassword' => 'Contraseña',
             'laconfirmation' => 'Confirmacion',
        );
    }



}
