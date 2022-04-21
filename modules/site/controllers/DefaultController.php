<?php
namespace app\modules\site\controllers;
use app\models\Author;
use yii\data\ActiveDataProvider;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex(){
        $query = Author::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        return $this->render('index', [
            'provider' => $provider
        ]);
    }
}