<?php

namespace app\modules\admin\controllers;

use app\models\Author;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class AuthorController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new Author();
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if($model->save()){
                return $this->redirect('index');
            }
        }

        return $this->render('create',[
            'model' => $model
        ]);
    }

    public function actionDelete()
    {
        if(\Yii::$app->request->isPost){
            Author::deleteAll(['id'=>\Yii::$app->request->post('id')]);
        }
        return $this->redirect('index');
    }

    public function actionIndex()
    {
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

    public function actionUpdate()
    {
        $id = \Yii::$app->request->get('id');
        $model = Author::find()->where(['id'=>$id])->one();
        if(!$model)
            throw new \yii\web\NotFoundHttpException('Siz so\'ragan malumot opilmadi');
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if($model->save()){
                return $this->redirect('index');
            }
        }

        return $this->render('create',[
            'model' => $model
        ]);
    }

}
