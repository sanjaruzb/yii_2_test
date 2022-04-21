<?php

namespace app\modules\v1;

use yii\rest\Controller;
use yii\rest\ActiveController;


class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\v1\controllers';


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        \Yii::$app->request->parsers = ['application/json' => 'yii\web\JsonParser'];
        parent::init();

        // custom initialization code goes here
    }
}