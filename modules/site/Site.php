<?php

namespace app\modules\site;

/**
 * admin module definition class
 */
class Site extends \yii\base\Module
{
    public $layout = 'layout.php';
    public $layoutPath = 'app/modules/site/views';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\site\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        \Yii::$app->name = 'Site Front End';
        parent::init();

        // custom initialization code goes here
    }
}
