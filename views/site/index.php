<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var array $performances */
/** @var array $upcomingDates */
/** @var array $news */

$this->registerCssFile('@web/css/index.css');
$this->title = 'Главная';
?>

<div class="w-100">
    <div id="posterCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($performances as $index => $performance): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= Yii::getAlias('@web') ?>/uploads/posters/<?= Html::encode($performance->image) ?>" class="d-block w-100" alt="<?= Html::encode($performance->title) ?>" style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h5><?= Html::encode($performance->title) ?></h5>
                        <p><?= Html::encode($performance->description) ?></p>
                        <a href="<?= Url::to(['site/details', 'id' => $performance->id]) ?>" class="btn btn-primary">Подробнее</a>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#posterCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Назад</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#posterCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Вперёд</span>
        </button>
    </div>
</div>

<div class="site-index">

    <div class="upcoming">
        <h2>Ближайшие спектакли</h2>
        <div class="row">
            <?php foreach ($upcomingDates as $item): ?>
                <?php $performance = $item->performance; ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?= Yii::getAlias('@web') ?>/uploads/posters/<?= Html::encode($performance->image) ?>" class="card-img-top" alt="<?= Html::encode($performance->title) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($performance->title) ?></h5>
                            <p class="card-text">
                                <?= Yii::$app->formatter->asDate($item->date) ?> <br>
                                <?= Html::encode($performance->start_time) ?> - <?= Html::encode($performance->end_time) ?>
                            </p>
                            <a href="<?= Url::to(['site/details', 'id' => $performance->id]) ?>" class="btn btn-primary">Подробнее</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="news mt-5">
        <h2>Новости и события</h2>
        <div class="list-group">
            <?php foreach ($news as $n): ?>
                <div class="list-group-item">
                    <h5><?= Html::encode($n->title) ?></h5>
                    <p><?= Html::encode($n->short_description) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="awards mt-5 text-center">
        <h2>Отзывы и достижения</h2>
        <blockquote class="review-quote">
            <p>“Потрясающие спектакли! Атмосфера, игра актеров — всё на высоте.”</p>
            <footer>— Зритель из Кургана</footer>
        </blockquote>


    </div>

</div>
<style>
    :root {
        --accent-color: #6B4226;
        --background-color: #fdf8f4;
        --text-color: #2e2e2e;
        --light-brown: #c9a384;
        --hover-brown: #5a3820;
        --shadow-color: rgba(0, 0, 0, 0.1);
        --hover-shadow-color: rgba(0, 0, 0, 0.2);
        --button-hover-bg: #3e2c1c;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--background-color);
        color: var(--text-color);
        margin: 0;
        padding: 0;
    }

    a {
        color: var(--accent-color);
        text-decoration: none;
        transition: 0.3s;
    }

    a:hover {
        color: var(--hover-brown);
    }

    h1, h2, h3, h4 {
        color: var(--accent-color);
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .button, .btn {
        background-color: var(--accent-color);
        color: #fff;
        padding: 12px 25px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .button:hover, .btn:hover {
        background-color: var(--button-hover-bg);
        transform: scale(1.05);
    }

    .carousel {
        width: 100%;
        height: 570px;
    }

    .carousel-inner {
        width: 100%;
        height: 100%;
    }

    .carousel-item img {
        object-fit: cover;
        width: 100%;
        height: 600px;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item img:hover {
        transform: scale(1.1);
    }

    .carousel-caption {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        background-color: rgba(0, 0, 0, 0.6);
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
    }

    .upcoming h2 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 40px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .upcoming{

    }

    .card {
        box-shadow: 0 4px 10px var(--shadow-color);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px var(--hover-shadow-color);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card-text {
        font-size: 1rem;
        margin: 15px 0;
        color: var(--text-color);
    }

    .news h2 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 40px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .list-group-item {
        padding: 20px;
        border: none;
        background-color: #fff;
        box-shadow: 0 2px 10px var(--shadow-color);
        margin-bottom: 20px; /* Увеличен отступ между новостями */
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .list-group-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px var(--hover-shadow-color);
    }

    .review-quote {
        font-style: italic;
        margin: 20px auto;
        max-width: 700px;
        color: #4a3b2a;
        font-size: 1.1rem;
        text-align: center;
    }

    footer {
        background-color: var(--accent-color);
        color: white;
        padding: 30px;
        text-align: center;
        margin-top: 50px;
    }

    .partner-logos img {
        height: 60px;
        margin: 20px;
        filter: grayscale(100%);
        transition: filter 0.3s, transform 0.3s;
    }

    .partner-logos img:hover {
        filter: none;
        transform: scale(1.1);
    }

    .site-index {
        ///background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(245, 245, 245, 0.8)), url('/images/background.jpg') no-repeat center center;
        background-size: cover;
        padding-bottom: 50px;
    }

</style>

