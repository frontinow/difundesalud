<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function PageSize($id = NULL, $model = NULL) {

        $this->widget('application.extensions.PageSize.PageSize', array(
            'gridViewId' => $id,
            'pageSize' => Yii::app()->request->getParam('pageSize', null),
            'defaultPageSize' => Yii::app()->params['cantregistros_defecto_gridview'],
            'pageSizeOptions' => Yii::app()->params['registros_pagina_gridview'],
        ));
        $dataProvider = $model->search();
        $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['cantregistros_defecto_gridview']);
        $dataProvider->getPagination()->setPageSize($pageSize);
        return $dataProvider;
    }

    public function obtenerUrl() {
        $pageURL = 'http://';
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

}
