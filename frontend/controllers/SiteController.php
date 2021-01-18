<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Test;
use Yii;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Test();

        if ( $model->load(Yii::$app->request->post()) ) {
            if ($model->validate()) {
                $result = $model->send();
                Yii::$app->session->setFlash('success', $result);
            } else {
                Yii::$app->session->setFlash('error', 'Что-то пошло не так...');
            }
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }
}
