<?php

namespace app\controllers;

use app\models\Category;
use app\models\Comments;
use app\models\News;
use app\models\PerformanceDates;
use app\models\Performances;
use app\models\Seats;
use app\models\SignupForm;
use app\models\Tickets;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $performances = Performances::find()->limit(5)->all();

        $upcomingDates = PerformanceDates::find()
            ->where(['>=', 'date', date('Y-m-d')])
            ->orderBy('date ASC')
            ->groupBy('performance_id')
            ->with('performance')
            ->limit(6)
            ->all();

        $news = News::find()->orderBy('created_at DESC')->limit(3)->all();

        return $this->render('index', [
            'performances' => $performances,
            'upcomingDates' => $upcomingDates,
            'news' => $news,
        ]);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $performances = Performances::find()->limit(3)->all();
        $news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        $this->layout = 'main';

        return $this->render('about', [
            'performances' => $performances,
            'news' => $news,
        ]);
    }
    public function actionDetails($id)
    {
        $model = $this->findModel($id);
        $details = $model->details;

        return $this->render('details', [
            'model' => $model,
            'details' => $details,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = \app\models\Performances::findOne($id)) !== null) {
            return $model;
        }

        throw new \yii\web\NotFoundHttpException('Запрашиваемая страница не найдена.');
    }




    public function actionNews($id)
    {
        $category = Category::findOne($id);
        $news = News::find()->where(['category_id' => $id])->all();

        $comments = Comments::find()->where(['news_id' => $id])->all();

        $commentModel = new Comments();

        if ($commentModel->load(Yii::$app->request->post())) {
            $commentModel->news_id = $id;
            $commentModel->user_id = Yii::$app->user->id;
            if ($commentModel->save()) {
                return $this->refresh();
            }
        }

        return $this->render('news', [
            'category' => $category,
            'news' => $news,
            'comments' => $comments,
            'commentModel' => $commentModel,
        ]);
    }
    public function actionSignup()
    {
        $us = new SignupForm();
        if ($us->load(Yii::$app->request->post()) && $us->signup()) {
            return $this->goHome();
        }
        return $this->render('signup', [
            'us' => $us
        ]);
    }


    public function actionAficha()
    {
        $performances = Performances::find()->all();


        return $this->render('aficha', [
            'performances' => $performances,
        ]);
    }
    public function actionSelect($performanceDateId)
    {
        if (!$performanceDateId) {
            throw new \yii\web\BadRequestHttpException('Не указан параметр даты выступления');
        }

        $seats = Seats::find()->orderBy(['seat_row' => SORT_ASC, 'seat_number' => SORT_ASC])->all();

        $booked = Tickets::find()
            ->select('seat_id')
            ->where(['performance_date_id' => $performanceDateId])
            ->column();

        return $this->render('select', [
            'seats' => $seats,
            'bookedSeats' => $booked,
            'performanceDateId' => $performanceDateId
        ]);
    }

    public function actionBuy()
    {
        $request = Yii::$app->request;

        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'Покупка доступна только авторизованным пользователям.');
            return $this->redirect(['site/login']);
        }

        if ($request->isPost) {
            $performanceDateId = $request->post('performance_date_id');
            $seatIdsRaw = $request->post('seat_ids', '[]');

            $seatIds = json_decode($seatIdsRaw, true);
            if (!is_array($seatIds)) {
                $seatIds = [$seatIdsRaw];
            }

            if (empty($seatIds)) {
                Yii::$app->session->setFlash('error', 'Выберите хотя бы одно место.');

                $performanceDate = PerformanceDates::findOne($performanceDateId);
                $performanceId = $performanceDate ? $performanceDate->performance_id : null;

                return $this->redirect(['site/dates', 'id' => $performanceId]);
            }

            $performanceDate = PerformanceDates::findOne($performanceDateId);
            if (!$performanceDate) {
                Yii::$app->session->setFlash('error', 'Неверная дата выступления.');
                return $this->redirect(['site/select', 'performanceDateId' => $performanceDateId]);
            }

            $bookedSeats = Tickets::find()
                ->select('seat_id')
                ->where(['performance_date_id' => $performanceDateId])
                ->andWhere(['in', 'seat_id', $seatIds])
                ->column();

            if (!empty($bookedSeats)) {
                Yii::$app->session->setFlash('error', 'Некоторые выбранные места уже заняты.');
                return $this->redirect(['site/dates', 'id' => $performanceDate->performance_id]);
            }
            foreach ($seatIds as $seatId) {
                $ticket = new Tickets();
                $ticket->performance_date_id = $performanceDateId;
                $ticket->seat_id = $seatId;
                $ticket->user_id = Yii::$app->user->id;
                $ticket->purchase_time = date('Y-m-d H:i:s');
                $ticket->status = Tickets::STATUS_RESERVED;
                $ticket->created_at = time();

                if (!$ticket->save()) {
                    Yii::$app->session->setFlash('error', 'Ошибка при сохранении билета для места №' . $seatId);
                    return $this->redirect(['site/dates', 'id' => $performanceDate->performance_id]);
                }
            }

            Yii::$app->session->setFlash('success', 'Билеты успешно забронированы!');
            return $this->redirect(['site/index']);
        }

        return $this->goHome();
    }

    public function actionDates($id)
    {
        $dates = \app\models\PerformanceDates::find()
            ->where(['performance_id' => $id])
            ->orderBy(['date' => SORT_ASC])
            ->all();

        return $this->render('dates', [
            'dates' => $dates,
            'performanceId' => $id,
        ]);
    }
    public function actionCabinet()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $userId = Yii::$app->user->id;

        $tickets = Tickets::find()
            ->where(['user_id' => $userId])
            ->with(['seat', 'performanceDate.performance'])
            ->orderBy(['purchase_time' => SORT_DESC])
            ->all();

        return $this->render('cabinet', ['tickets' => $tickets]);
    }


}
