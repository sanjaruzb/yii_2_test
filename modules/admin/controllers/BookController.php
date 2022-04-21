<?php

namespace app\modules\admin\controllers;

use app\models\Author;
use app\models\Book;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class BookController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new Book();
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if($model->save()){
                return $this->redirect('index');
            }
        }

        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'fio');



        return $this->render('create',[
            'model' => $model,
            'authors' => $authors
        ]);
    }

    public function actionDelete()
    {
        if(\Yii::$app->request->isPost){
            Book::deleteAll(['id'=>\Yii::$app->request->post('id')]);
        }
        return $this->redirect('index');
    }

    public function actionIndex()
    {
        $query = Book::find();
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
        $model = Book::find()->where(['id'=>$id])->one();
        if(!$model)
            throw new \yii\web\NotFoundHttpException('Siz so\'ragan malumot opilmadi');
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if($model->save()){
                return $this->redirect('index');
            }
        }
        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'fio');

        return $this->render('create',[
            'model' => $model,
            'authors' => $authors
        ]);
    }
}