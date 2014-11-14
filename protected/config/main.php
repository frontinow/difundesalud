<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'The Factory HKA',
    'language' => 'es',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

    
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
         'authRBAC' => array(
            'class' => 'AuthRBAC',
        ),
        'widgetFactory' => array(
            'widgets' => array(
                'CGridView' => array(
                    'itemsCssClass' => 'table table-bordered table-hover table-striped table-condensed table-gridview',
                    'pagerCssClass' => 'gridview-pagination',
                    //'htmlOptions' => array('class' => 'container-grid-view'),
                    'cssFile' => false,
                    'pager' => array(
                        'cssFile' => false,
                        'header' => '',
                        'class' => 'CLinkPager',
                        'firstPageLabel' => '<<',
                        'prevPageLabel' => '<',
                        'nextPageLabel' => '>',
                        'lastPageLabel' => '>>',
                        'maxButtonCount' => 15,
                    ),
                ),
                'CListView' => array(
                    'pagerCssClass' => 'gridview-pagination',
                    'cssFile' => false,
                    'pager' => array(
                        'cssFile' => false,
                        'header' => '',
                        'class' => 'CLinkPager',
                        'firstPageLabel' => '<<',
                        'prevPageLabel' => '<',
                        'nextPageLabel' => '>',
                        'lastPageLabel' => '>>',
                        'maxButtonCount' => 15,
                    ),
                ),
                'CDetailView' => array(
                    'cssFile' => false,
                    'htmlOptions' => array(
                        'class' => 'table table-bordered table-hover table-striped table-condensed table-gridview',
                    ),
                ),
            ),
        ),
        // uncomment the following to enable URLs in path-format
     'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
  
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=********',
            'emulatePrepare' => true,
            'username' => '******',
            'password' => '********',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => '**************',
        'cantregistros_defecto_gridview' => '10',
        'registros_pagina_gridview' => array(10 => 10, 20 => 20, 50 => 50, 100 => 100),
        'boton' => 'btn-sm btn btn6-default',
        'icon-view' => '<span class="glyphicon glyphicon-eye-open"></span>',
        'icon-edit' => '<span class="glyphicon glyphicon-pencil"></span>',
        'ErrorAccesoDenegado'=>'Acceso denegado',
        'message'=>'',
        'menu'=>''
    ),
);
