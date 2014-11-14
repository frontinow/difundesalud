<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionCalendario() {


       /* if (Yii::app()->user->id == NULL) {
            $this->redirect('site/login');
        }*/

        Yii::app()->params['menu'] = 'calendario';
        $listado = Events::model()->findAll();

        $data = "";
        $i = 10;
        foreach ($listado as $list) {

            $data .= '{';
            $data .= "title:'" . $list->name . "',";
            $data .= "url:'" . $list->id . "',";
            $data .= "id:'" . $list->id . "',";
            
            $fecha_inicio = Days::model()->find(array('condition'=>"event_id = '$list->id'",'order'=>'id ASC'));
            $fecha_fin = Days::model()->find(array('condition'=>"event_id = '$list->id'",'order'=>'id DESC'));
            
            $data .= "start:'" . $fecha_inicio->date . "',";
            $data .= "end:'" . $fecha_fin->date . "',";
            $data .= '},';
            $i++;
        }
        $data = substr($data, 0, -1);

        $listado = "{id:1,url:'#',title:'titulo',start:'2014-11-01',end:'2014-11-01'},";


        $this->render('calendar', array('data' => $data));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginAccess;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'form-loginaccess') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginAccess'])) {
            $model->lausername = trim(@$_POST['LoginAccess']['lausername']);
            $model->lapassword = trim(@$_POST['LoginAccess']['lapassword']);
            $model->lapassword = ValidateSafePassword::Hash($model->lapassword);

            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(array('site/calendario'));
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegistro() {
        $transaction = Yii::app()->db->beginTransaction();
        $model = new RegisterAccess();

        if (isset($_POST['RegisterAccess'])) {
            $model->attributes = $_POST['RegisterAccess'];
            $model->lausername = $_POST['RegisterAccess']['lausername'];
            $clave = trim($_POST['RegisterAccess']['lapassword']);
            $confirmacion = trim($_POST['RegisterAccess']['laconfirmation']);
            $error = ValidateSafePassword::main($clave, $confirmacion);

            $model->lapassword = ValidateSafePassword::Hash($_POST['RegisterAccess']['lapassword']);
            $model->laconfirmation = ValidateSafePassword::Hash($_POST['RegisterAccess']['laconfirmation']);

            //if ($model->validate()) {


            /* Validar que usuario existe */

            $uservalida = Users::model()->find(array(
                'select' => 'count(*) as id',
                'condition' => 'username = :username',
                'params' => array(':username' => $model->lausername)
            ));

            if (@$uservalida->id > 0) {
                $error['error'] = 'Correo Electronico Registrado, ingrese otro por favor';
                $error['resultado'] = FALSE;
            }

            if ($error['resultado']) {

                $user = new Users();
                $user->username = $model->lausername;
                $user->password = $model->lapassword;
                $user->rol_id = 5;
                $user->failed_attempt = 0;
                $user->status_user_id = 5;
                $user->active = 0;
                if ($user->save()) {
                    /* Enviar Email */
                    $token = md5(Date('Y-m-d H:i:s'));
                    $url = 'http://localhost/' . Yii::app()->createUrl('site/activation', array('token' => $token));

                    $user_token = new UsersToken();
                    $user_token->user_id = $user->id;
                    $user_token->token = $token;
                    $user_token->url = $url;
                    $user_token->date = Date('Y-m-d');
                    $user_token->time = Date('H:i:s');
                    $user_token->active = 1;
                    $user_token->type = 1;
                    if ($user_token->save()) {

                        Yii::import('application.extensions.phpmailer.JPhpMailer');
                        $mail = new JPhpMailer;
                        $mail->IsSMTP();
                        $mail->Host = 'host.caracashosting30.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'contacto@frontinow.com';
                        $mail->Password = 'q8neeSiHk7ld';
                        $mail->SetFrom('contacto@frontinow.com', 'FrontinoW');
                        $mail->Subject = 'Registro en DifundeSalud';
                        $mail->AddBCC($user->username);
                        $contentido = "<table width='802' height='158' border='0' style='background-repeat: repeat-x; background-image: url(http://www.frontinow.com/salud/ico/barra.png);'>
  <tr>
    <td width='792' class='background'><table width='792' height='29' border='0'>
      <tr>
        <td width='123' height='23'><img src='http://www.frontinow.com/salud/ico/logo.png' width='123' height='118' /></td>
        <td width='653' valign='bottom'><h3 style='color: #666666; font-size: 18px; font-family: Arial, Helvetica, sans-serif;'>Gracias por suscribirse a la&nbsp;<strong>DifundeSalud</strong></h3></td>
      </tr>
	   <tr>
        <td width='123' height='23'>&nbsp;</td>
        <td width='123' height='23'><b>Usuario: " . $user->username . "</b></td>
        <td width='123' height='23'><b>Contraseña: " . $clave . "</b></td>
        <td width='653' valign='middle'><p class='Estilo3'>&nbsp;</p>
          <p style='font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	color: #999999;'>Para activar tu cuenta y tener el acceso al sistema solo debes hacer click en este enlace: <a href='" . $url . "'>activar</a></p>
          <p>___________________________________________________________________________________________</p>
          </td>
      </tr>
	   <tr>
        <td width='123' height='23'>&nbsp;</td>
        <td width='653'><div align='right' style='color: #0099CC; font-size: 14px; font-family: Arial, Helvetica, sans-serif;'>
          <p style='font-size: 10px'>App difundeSalud   2014</p>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>";
                        $mail->MsgHTML($contentido);

                        $mail->AltBody = $contentido;
                        $mail->AddBCC('frontinow@gmail.com', 'FrontinoW');
                        //if ($mail->Send()) {
                        $transaction->commit();
                        Yii::app()->user->setFlash('alert-success', 'Se ha Enviado un correo');
                        $this->redirect(array('login'));
                        //} else {
                        //  print_r($mail->ErrorInfo());
                        //}
                    }
                }
            } else {
                Yii::app()->user->setFlash('alert-danger', $error['error']);
            }
            // }
        }
        $transaction->rollBack();

        $this->render('register', array('model' => $model, 'link' => @$link));
    }

    public function actionActivation($token = NULL) {

        $token = trim($token);
        $pase = FALSE;
        if ($token == NULL) {
            $mensaje = 'El Token esta vacio';
        } elseif (strlen($token) != 32) {
            $mensaje = 'El Token es Invalido la cantidad de digitos es errado';
        } elseif (preg_match("[a-z0-9]", $token)) {
            $mensaje = 'Tiene caracteres errados';
        } else {
            $mensaje = 'si';
            /* Consulta q token es */
            $model_count = UsersToken::model()->find(array(
                'select' => 'count(*) as id',
                'condition' => 'token = :valtoken',
                'params' => array(':valtoken' => $token),
            ));
            if ($model_count->id == 1) {
                /* Si existe el token consulto sus datos */
                $model = UsersToken::model()->find(array(
                    'condition' => 'token = :valtoken',
                    'params' => array(':valtoken' => $token),
                ));

                if ($model->url != $this->obtenerUrl()) {
                    $mensaje = 'url errado';
                } elseif ($model->active != 1) {
                    $mensaje = 'Ya fue usado';
                } elseif ($model->type != 1) {
                    $mensaje = 'Token corresponde a otro proceso';
                } else {
                    $mensaje = "ok";
                    $pase = true;

                    /* Actualizaciones */
                    $usuario = Users::model()->find(array('condition' => 'id = :iduser', 'params' => array(':iduser' => $model->user_id)));
                    $usuario->active = 1;
                    $usuario->status_user_id = 1;
                    if ($usuario->save()) {
                        $model->active = 0;
                        if ($model->save()) {
                            $mensaje = "guardo";
                            Yii::app()->user->setFlash('alert-success', "Se ha activado con exito el usuario. por favor ingrese");
                            $this->redirect('login');
                        }
                    }
                }
            } else {
                $mensaje = 'no existe ese token';
            }
        }

        $this->render('activation', array('mensaje' => @$mensaje));
    }

    public function actionForgetpass() {

        $model = new ForgetPass();

        if (isset($_POST['ForgetPass'])) {
            $model->attributes = $_POST['ForgetPass'];


            if ($model->validate()) {

                $usuario = Users::model()->find(array(
                    'select' => 'id, username, active, rol_id',
                    'condition' => "username = :username",
                    'params' => array('username' => $model->lausername)
                ));

                $token = md5(Date('Y-m-d H:i:s'));
                $url = 'http://difundesalud.org.ve' . Yii::app()->createUrl('site/resetpass', array('token' => $token));

                $user_token = new UsersToken();
                $user_token->user_id = $usuario->id;
                $user_token->token = $token;
                $user_token->url = $url;
                $user_token->date = Date('Y-m-d');
                $user_token->time = Date('H:i:s');
                $user_token->active = 1;
                $user_token->type = 2;
                if ($user_token->save()) {
                    Yii::app()->user->setFlash('alert-success', 'Se ha enviado un correo electronico con los pasos a seguir');
                    $this->redirect(array('login'));
                }
            }
        }






        $this->render('forgetpass', array('model' => @$model));
    }
    
    
    public function actionDetail($id = NULL){
        
        
        /* Evento */
        
        $sql = new CDbCriteria();
        
        $sql->with = array('state','municipality','parishe','promotor');
        
        $evento = Events::model()->find("id = '$id'");
        
        
        /* Dia */
        
        $dias = Days::model()->findAll(array('condition'=>"event_id = '$id'",'order'=>'id ASC'));
        
        $user = Yii::app()->user->id;
        $favorito = UsersFavorites::model()->find(array('select'=>'count(*) as id','condition'=>"user_id = '$user' AND event_id = '$id'"));
        
        if(@$favorito->id > 0){
            $fav = 0;
        } else {
            $fav = 1;
        }
        
        $this->renderPartial('detailagenda', array(
                'evento' => @$evento,
                  'dias' => @$dias,
            'fav'=>@$fav
                
            ));
    }
    
    
    public function actionIndex(){
        
        Yii::app()->params['menu'] = 'index';
       $this->render('index', array());  
        
    }
    
        public function actionAplicacion(){
        
         Yii::app()->params['menu'] = 'aplicacion';
       $this->render('aplicacion', array());  
        
    }
        public function actionFeedback(){
        
        Yii::app()->params['menu'] = 'feedback';
       $this->render('feedback', array());  
        
    }
        public function actionNosotros(){
        
        Yii::app()->params['menu'] = 'nosotros';
       $this->render('nosotros', array());  
        
    }
        public function actionContacto(){
        
        Yii::app()->params['menu'] = 'contacto';
       $this->render('contacto', array());  
        
    }
    
    
    public function actionFavorito($id = NULL , $val = NULL){
        $user_id = Yii::app()->user->id;
        if($val == 1){
            $model = new UsersFavorites;
            $model->user_id = Yii::app()->user->id;
            $model->event_id = $id;
            $model->save();
            
            echo '<a id="dialogsubmit" class="btn btn6-warning favorito" href="'.Yii::app()->createUrl('site/favorito',array('id'=>$id,'val'=>0)).'"><i class="fa fa-star-o"></i></a>';
            
        } else {
            $post=UsersFavorites::model()->find("user_id = '$user_id' AND event_id = '$id'"); // asumiendo que existe un post cuyo ID es 10
            $post->delete();
            echo '<a id="dialogsubmit" class="btn btn9-default favorito" href="'.Yii::app()->createUrl('site/favorito',array('id'=>$id,'val'=>1)).'"><i class="fa fa-star-o"></i></a>';
        }
        
        
        
        
    }

    
    
    

}
