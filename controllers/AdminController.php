<?php

namespace app\controllers;

use app\models\News;
use app\models\Performances;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AdminController extends Controller
{
    public function actionManagePerformances()
    {
        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
            return $this->redirect(['site/login']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Performances::find()->with(['author', 'genre', 'director']),
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        return $this->render('manage-performances', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreatePerformance()
    {
        $model = new \app\models\Performances();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Спектакль создан');
            return $this->redirect(['admin/manage-performances']);
        }

        return $this->render('performance-form', ['model' => $model]);
    }
    public function actionUpdatePerformance($id)
    {
        $model = Performances::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Спектакль не найден');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Спектакль обновлён');
            return $this->redirect(['admin/manage-performances']);
        }

        return $this->render('performance-form', ['model' => $model]);
    }

    public function actionManageNews()
    {
        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
            return $this->redirect(['site/login']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->orderBy(['id' => SORT_DESC]),
            'pagination' => ['pageSize' => 10],
        ]);

        return $this->render('manage-news', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateNews()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Новость создана');
            return $this->redirect(['admin/manage-news']);
        }

        return $this->render('news-form', ['model' => $model]);
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdateNews($id)
    {
        $model = News::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Новость не найдена');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Новость обновлена');
            return $this->redirect(['admin/manage-news']);
        }

        return $this->render('news-form', ['model' => $model]);
    }

    public function actionDeleteNews($id)
    {
        $model = News::findOne($id);
        if ($model) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Новость удалена');
        }
        return $this->redirect(['admin/manage-news']);
    }

}