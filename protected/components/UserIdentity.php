<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        /* Valido que el usuario exista */

        $valido_usuario = Users::model()->find(array(
            'select' => 'count(*) as id',
            'condition' => 'username = :username',
            'params' => array(':username' => $this->username)
        ));
        if ($valido_usuario->id == 1) {
            /* Si existe el usuario consulto el usuario con su password */

            $valido_clave = Users::model()->find(array(
                'select' => 'count(*) as id',
                'condition' => 'username = :username AND password = :password',
                'params' => array(':username' => $this->username, ':password' => $this->password)
            ));

            if ($valido_clave->id == 1) {

                $sql = new CDbCriteria();

                $sql->params = array(':username' => $this->username, ':password' => $this->password);
                $sql->condition = 'username = :username AND password = :password';

                $model = Users::model()->find($sql);

                $sql->with = array('rol', 'statusUser');


                $consulto_usuario = Users::model()->find($sql);

                if ($consulto_usuario->status_user_id == 1) {

                    $this->setState('id', $consulto_usuario->id);
                                        $this->setState('rol', $consulto_usuario->rol_id);
                    $this->errorCode = self::ERROR_NONE;

                    /* Usuario Activo Procedo a crear la Session */
                } elseif ($consulto_usuario->status_user_id == 2) {
                    /* Usuario Inactivo */
                    Yii::app()->user->setFlash('alert-danger', "Usuario " . @$consulto_usuario->statusUser->name);
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                } elseif ($consulto_usuario->status_user_id == 3) {
                    /* Usuario Bloqueado */
                    Yii::app()->user->setFlash('alert-danger', "Usuario " . @$consulto_usuario->statusUser->name);
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                } elseif ($consulto_usuario->status_user_id == 4) {
                    /* Usuario Suspendido */
                    Yii::app()->user->setFlash('alert-danger', "Usuario " . @$consulto_usuario->statusUser->name);
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                } elseif ($consulto_usuario->status_user_id == 5) {
                    /* Usuario debe validar Email */
                    Yii::app()->user->setFlash('alert-danger', "Su usuario debe activarlo confirmando en su correo electronico ");
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                }
            } else {
                /* CONTRASEÑA ERRADA */
                Yii::app()->user->setFlash('alert-danger', "Contraseña Errada");
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            }
        } else {
            /* NO EXISTE USUARIO' */
            Yii::app()->user->setFlash('alert-danger', "Usuario no existe");
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }

        return !$this->errorCode;
    }
    
    public function SessionAuto($id = NULL){
        
        $this->setState('id', $consulto_usuario->id);
                                        $this->setState('rol', $consulto_usuario->rol_id);
    }
    

}
