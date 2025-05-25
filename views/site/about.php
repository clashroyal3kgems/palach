<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $performances */
/** @var array $news */

$this->title = 'О театре';
?>

<div class="about-page container my-5">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <section class="mb-5">
        <h2>Наша история</h2>
        <p>
            Театр был основан в 1953 году и с тех пор стал культурной жемчужиной региона. На его сцене выступали как именитые актёры, так и талантливая молодёжь, каждый раз создавая волшебство на глазах у зрителей.
        </p>
    </section>

    <section class="mb-5">
        <h2>Миссия и ценности</h2>
        <p>
            Мы стремимся делать искусство доступным каждому, вдохновляя и объединяя поколения через живое театральное слово. В центре нашего внимания — зритель, а в основе — честность, профессионализм и любовь к сцене.
        </p>
    </section>

    <section class="mb-5">
        <h2>Избранные спектакли</h2>
        <div class="row">
            <?php foreach ($performances as $performance): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= Yii::getAlias('@web') ?>/uploads/posters/<?= Html::encode($performance->image) ?>" class="card-img-top" alt="<?= Html::encode($performance->title) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($performance->title) ?></h5>
                            <p class="card-text"><?= Html::encode($performance->description) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mb-5">
        <h2>Жизнь театра</h2>
        <ul class="list-group">
            <?php foreach ($news as $item): ?>
                <li class="list-group-item">
                    <h5><?= Html::encode($item->title) ?></h5>
                    <p><?= Html::encode($item->short_description) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="mb-5">
        <h2>Отзывы зрителей</h2>
        <blockquote class="review-quote">
            <p>“Каждое представление — как откровение. Благодарю за эмоции!”</p>
            <footer class="blockquote-footer">Зритель из Тюмени</footer>
        </blockquote>
    </section>

    <section class="map-section mt-5">
        <h2>Как нас найти</h2>
        <p>Наш театр находится в самом центре города, рядом с главной площадью. Мы всегда рады видеть вас!</p>
        <div class="map-container mt-4">
            <!-- Вставка Google Maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21992.468031853215!2d30.3267971!3d59.9342805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTnCsDI5JzA4LjQiTiAzMMKwMTcnNTIuNSJX!5e0!3m2!1sru!2sru!4v1621609895961!5m2!1sru!2sru" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

</div>

<style>
    :root {
        --accent-color: #6B4226;
        --background-color: #fdf8f4;
        --text-color: #2e2e2e;
        --light-brown: #c9a384;
        --hover-brown: #5a3820;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--background-color);
        color: var(--text-color);
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
    }

    .card img {
        object-fit: cover;
        height: 300px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 10px;
    }

    .list-group-item {
        border: none;
        background-color: #f8f5f2;
        padding: 15px;
        margin-bottom: 15px;
    }

    .review-quote {
        font-style: italic;
        margin: 20px auto;
        max-width: 700px;
        color: #4a3b2a;
        border-left: 5px solid var(--accent-color);
        padding-left: 20px;
        font-size: 1.2rem;
    }

    .review-quote footer {
        margin-top: 10px;
        font-size: 1rem;
        color: var(--hover-brown);
    }

    .map-section h2 {
        color: var(--accent-color);
        margin-bottom: 15px;
    }

    .map-container iframe {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .map-section p {
        color: var(--text-color);
        font-size: 1rem;
    }

    .partners img {
        height: 60px;
        margin: 15px;
        filter: grayscale(100%);
        transition: filter 0.3s;
    }

    .partners img:hover {
        filter: none;
    }
</style>
