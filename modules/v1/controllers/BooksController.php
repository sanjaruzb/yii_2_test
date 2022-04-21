<?php

namespace app\modules\v1\controllers;




use app\models\Book;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class BooksController extends \yii\rest\ActiveController
{
    protected function verbs()
    {
        return [
            'list' => ['GET'],
            'by-id' => ['GET'],
            'update' => ['POST'],
            'delete' => ['DELETE'],
        ];
    }

    public $modelClass = 'app\\models\\Book';
    public function actions()
    {
        return [];
    }
    public function actionList(){
        $res = array_map(function ($m){
            /**
             * @var $m Book
             */
            return [
                "id" => $m->id,
                "title" => $m->title,
                "author" => $m->author->fio
            ];
        }, Book::find()->all());
        return $res;
    }

    public function actionById($id){
        $model = Book::findOne(['id'=>$id]);

        if($model instanceof Book){
            return [
                "id" => $model->id,
                "title" => $model->title,
                "author" => $model->author->fio
            ];
        }
        throw new NotFoundHttpException(" id = $id bo'lgan kitob topilmadi ");
//        return [
//            'status' => false,
//            'message' => " id = $id bo'lgan kitob topilmadi "
//        ];
    }

    public function actionDelete($id){
        Book::deleteAll(['id'=>$id]);
        return [
            'status' => true,
            'message' => 'success'
        ];
    }

    public function actionUpdate(){
        $data = \Yii::$app->request->post();

        if(!isset($data['id']) || !is_numeric($data['id'])){
            throw new \yii\web\HttpException('400','Bad request');
        }

        $model = Book::findOne(['id' => $data['id']]);

        if($model instanceof Book){
            $model->load(['Book'=>$data]);
        }

        throw new NotFoundHttpException('Model topilmadi');

    }

}