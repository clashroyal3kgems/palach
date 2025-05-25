<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var array $performances */

$this->title = 'Афиша';
?>

<div class="performances-index">

    <h2 class="performances-title">Афиша</h2>

    <div class="row">
        <?php foreach ($performances as $performance): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-img-wrapper">
                        <img src="<?= Yii::getAlias('@web') ?>/uploads/posters/<?= Html::encode($performance->image) ?>" class="card-img-top" alt="<?= Html::encode($performance->title) ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= Html::encode($performance->title) ?></h5>
                        <p class="card-text"><?= Html::encode($performance->description) ?></p>
                        <a href="<?= Url::to(['site/details', 'id' => $performance->id]) ?>" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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

    .performances-title {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 40px;
        text-transform: uppercase;
        letter-spacing: 1px;
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

    .card-img-wrapper {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Стиль для фона страницы */
    .performances-index {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(245, 245, 245, 0.8)), url('/images/background.jpg') no-repeat center center;
        background-size: cover;
        padding-bottom: 50px;
    }

</style>
