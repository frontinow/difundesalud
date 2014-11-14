<?php

class AppmovilController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('search2', 'detalle', 'favoritos', 'login'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function __construct($id, $module = null) {

        parent::__construct($id, $module);
    }

    public function actionSearch2() {

        header('Access-Control-Allow-Origin: *');


        $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
        header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

        // We don't need action for this tutorial, but in a complex code you need a way to determine Ajax action nature
        $action = @$_POST['action'];

        // Decode parameters into readable PHP object
        parse_str(@$_POST['formData'], $output);

        // Get username
        $username = @$_GET['username'];
        // Get password
        $password = @$output['password'];

        // Lets say everything is in order
        $output = array('status' => true, 'massage' => $username);
        $output = array(
            array(
                'tipo' => 'fecha',
                'numero' => '2',
                'titulo' => 'Viernes, 15 de Noviembre de 2014',
                'fecha' => '',
                'promotor' => '',
                'servicios' => '',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Jornada de Salud Chacao',
                'fecha' => '15/11/2014',
                'promotor' => 'Salud Chacao',
                'servicios' => 'vacunacion de ni���os, Atencion medica, Odontologia',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Jornada de Salud Antimano',
                'fecha' => '15/11/2014',
                'promotor' => 'Salud Chacao',
                'servicios' => 'vacunacion de ni���os, Atencion medica, Odontologia',
            ),
            array(
                'tipo' => 'fecha',
                'numero' => '1',
                'titulo' => 'Sabado, 21 de Noviembre de 2014',
                'fecha' => '',
                'promotor' => '',
                'servicios' => '',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Atencio Medica Gratuita',
                'fecha' => '21/11/2014',
                'promotor' => 'Farmatodo',
                'servicios' => 'Oftalmologia y vacunacion de Adultos',
            ),
            array(
                'tipo' => 'fecha',
                'numero' => '2',
                'titulo' => 'Martes, 25 de Noviembre de 2014',
                'fecha' => '',
                'promotor' => '',
                'servicios' => '',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Atencio Medica en Petare',
                'fecha' => '25/11/2014',
                'promotor' => 'Hospital Los Magallanes',
                'servicios' => 'vacunacion de ni���os, Atencion medica, Odontologia',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Atencio Medica en Petare',
                'fecha' => '25/11/2014',
                'promotor' => 'Hospital Los Magallanes',
                'servicios' => 'vacunacion de ni���os, Atencion medica, Odontologia',
            ),
            array(
                'tipo' => 'fecha',
                'numero' => '1',
                'titulo' => 'Martes, 01 de Diciembre de 2014',
                'fecha' => '',
                'promotor' => '',
                'servicios' => '',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Atencio Medica en Plaza Venezuela',
                'fecha' => '01/12/2014',
                'promotor' => 'Farmacias SAS',
                'servicios' => 'Oftalmologia y vacunacion de Adultos',
            ),
            array(
                'tipo' => 'fecha',
                'numero' => '3',
                'titulo' => 'Miercoles, 02 de Noviembre de 2014',
                'fecha' => '',
                'promotor' => '',
                'servicios' => '',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Vacunaciones Infantiles',
                'fecha' => '02/12/2014',
                'promotor' => 'Sanitas Venezuela',
                'servicios' => 'Oftalmologia y vacunacion de Adultos',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Vacunaciones Infantiles',
                'fecha' => '02/12/2014',
                'promotor' => 'Sanitas Venezuela',
                'servicios' => 'Oftalmologia y vacunacion de Adultos',
            ),
            array(
                'tipo' => 'evento',
                'numero' => '',
                'titulo' => 'Vacunaciones Infantiles',
                'fecha' => '02/12/2014',
                'promotor' => 'Sanitas Venezuela',
                'servicios' => 'Oftalmologia y vacunacion de Adultos',
            ),
        );
        echo ($callback ? $callback . '(' : '') . json_encode($output) . ($callback ? ')' : '');
    }

    public function actionDetalle($id = NULL) {

        header('Access-Control-Allow-Origin: *');


        $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
        header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

        // We don't need action for this tutorial, but in a complex code you need a way to determine Ajax action nature
        $action = @$_POST['action'];

        // Decode parameters into readable PHP object
        parse_str(@$_POST['formData'], $output);

        // Get username
        $username = @$_GET['username'];
        // Get password
        $password = @$output['password'];

        
        $sql = new CDbCriteria();

        $sql->with = array('state', 'municipality', 'parishe', 'promotor', 'days', 'fav');

        $sql->condition = "t.id = '$id'";

        $listado = Events::model()->findAll($sql);

        $i = 0;
        foreach ($listado as $list) {
            $output[$i]['id'] = $list->id;
            $output[$i]['titulo'] = $list->name;
            $output[$i]['direccion'] = $list->message;
            $output[$i]['fecha'] = $list->days[0]->date;
            $output[$i]['hora'] = $list->days[0]->ini_hour.' '.$list->days[0]->fin_hour;
            $output[$i]['servicios'] = $list->days[0]->name;
            $output[$i]['promotor'] = $list->promotor->name;
            $i++;
        }
        
       
        echo ($callback ? $callback . '(' : '') . json_encode($output) . ($callback ? ')' : '');
    }

    public function actionFavoritos($id = NULL) {

        header('Access-Control-Allow-Origin: *');


        $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', @$_GET['callback']) : false;
        header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

        // We don't need action for this tutorial, but in a complex code you need a way to determine Ajax action nature
        $action = @$_POST['action'];

        // Decode parameters into readable PHP object
        parse_str(@$_POST['formData'], $output);

        // Get username
        $username = @$_GET['username'];
        // Get password
        $password = @$output['password'];

        // Lets say everything is in order
        //$output = array('status' => true, 'massage' => $username);





        $sql = new CDbCriteria();

        $sql->with = array('state', 'municipality', 'parishe', 'promotor', 'days', 'fav');

        $sql->condition = "fav.user_id = '$id'";

        $listado = Events::model()->findAll($sql);

        $i = 0;
        foreach ($listado as $list) {
            $output[$i]['id'] = $list->id;
            $output[$i]['titulo'] = $list->name;
            $output[$i]['direccion'] = $list->message;
            $output[$i]['fecha'] = $list->days[0]->date;
            $output[$i]['servicios'] = $list->days[0]->name;
            $output[$i]['promotor'] = $list->promotor->name;
            $i++;
        }




        /* $output = array(


          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Jornada de Salud Chacao',
          'fecha'=>'15/11/2014',
          'promotor'=>'Salud Chacao'.$id,
          'servicios'=>'vacunacion de niños, Atencion medica, Odontologia',

          ),
          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Jornada de Salud Antimano',
          'fecha'=>'15/11/2014',
          'promotor'=>'Salud Chacao',
          'servicios'=>'vacunacion de niños, Atencion medica, Odontologia',

          ),

          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Atencio Medica Gratuita',
          'fecha'=>'21/11/2014',
          'promotor'=>'Farmatodo',
          'servicios'=>'Oftalmologia y vacunacion de Adultos',

          ),

          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Atencio Medica en Petare',
          'fecha'=>'25/11/2014',
          'promotor'=>'Hospital Los Magallanes',
          'servicios'=>'vacunacion de niños, Atencion medica, Odontologia',

          ),
          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Atencio Medica en Petare',
          'fecha'=>'25/11/2014',
          'promotor'=>'Hospital Los Magallanes',
          'servicios'=>'vacunacion de niños, Atencion medica, Odontologia',

          ),

          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Atencio Medica en Plaza Venezuela',
          'fecha'=>'01/12/2014',
          'promotor'=>'Farmacias SAS',
          'servicios'=>'Oftalmologia y vacunacion de Adultos',

          ),

          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Vacunaciones Infantiles',
          'fecha'=>'02/12/2014',
          'promotor'=>'Sanitas Venezuela',
          'servicios'=>'Oftalmologia y vacunacion de Adultos',

          ),
          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Vacunaciones Infantiles',
          'fecha'=>'02/12/2014',
          'promotor'=>'Sanitas Venezuela',
          'servicios'=>'Oftalmologia y vacunacion de Adultos',

          ),
          array(
          'tipo'=>'evento',
          'numero'=>'',
          'titulo'=>'Vacunaciones Infantiles',
          'fecha'=>'02/12/2014',
          'promotor'=>'Sanitas Venezuela',
          'servicios'=>'Oftalmologia y vacunacion de Adultos',

          )

          ); */
        echo ($callback ? $callback . '(' : '') . json_encode($output) . ($callback ? ')' : '');
    }

    public function actionLogin($id = NULL) {

        header('Access-Control-Allow-Origin: *');


        $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
        header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

        // We don't need action for this tutorial, but in a complex code you need a way to determine Ajax action nature
        //$action = @$_POST['action'];
        // Decode parameters into readable PHP object
        //parse_str(@$_POST['formData'], $output);
        // Get username
        $username = @$_GET['lgu'];
        // Get password
        $password = ValidateSafePassword::Hash(@$_GET['lgp']);

        $mensaje = "";
        $usuario = "";
        $name = "";

        $valido_usuario = Users::model()->find(array(
            'select' => 'count(*) as id',
            'condition' => 'username = :username',
            'params' => array(':username' => $username)
        ));
        if ($valido_usuario->id == 1) {
            /* Si existe el usuario consulto el usuario con su password */

            $valido_clave = Users::model()->find(array(
                'select' => 'count(*) as id',
                'condition' => 'username = :username AND password = :password',
                'params' => array(':username' => $username, ':password' => $password)
            ));

            if ($valido_clave->id == 1) {

                $sql = new CDbCriteria();

                $sql->params = array(':username' => $username, ':password' => $password);
                $sql->condition = 'username = :username AND password = :password';

                $model = Users::model()->find($sql);

                $sql->with = array('rol', 'statusUser');


                $consulto_usuario = Users::model()->find($sql);

                if ($consulto_usuario->status_user_id == 1) {

                    $mensaje = "TRUE";
                    $usuario = $consulto_usuario->id;
                    $name = $consulto_usuario->username;


                    /* Usuario Activo Procedo a crear la Session */
                } elseif ($consulto_usuario->status_user_id == 2) {
                    /* Usuario Inactivo */
                    $mensaje = "Usuario Inactivo";
                } elseif ($consulto_usuario->status_user_id == 3) {
                    /* Usuario Bloqueado */
                    $mensaje = "Usuario Bloqueado";
                } elseif ($consulto_usuario->status_user_id == 4) {
                    /* Usuario Suspendido */
                    $mensaje = "Usuario Suspendido";
                } elseif ($consulto_usuario->status_user_id == 5) {
                    /* Usuario debe validar Email */
                    $mensaje = "Debe Verificar su Correo electronico para activar la cuenta";
                }
            } else {
                /* CONTRASEÑA ERRADA */
                $mensaje = "Contraseña Errada";
            }
        } else {
            /* NO EXISTE USUARIO' */
            $mensaje = "Usuario no existe";
        }




        // Lets say everything is in order
        //$output = array('status' => true, 'massage' => $username);
        $output = array(
            array(
                'mensaje' => @$mensaje,
                'usuario' => @$usuario,
                'name' => @$name,
            )
        );
        echo ($callback ? $callback . '(' : '') . json_encode($output) . ($callback ? ')' : '');
    }

}
