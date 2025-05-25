<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        :root {
            --accent-color: #6B4226;
            --hover-color: #4e2f1a;
            --text-color: #2e2e2e;
            --header-bg: linear-gradient(to right, #f5f0ea, #e8ddd4);
        }

        .custom-header {
            background: var(--header-bg);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .navbar {
            background: var(--header-bg) !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-size: 1.6rem;
            color: var(--accent-color);
            transition: color 0.3s ease;
        }
        .navbar-brand img {
            height: 45px !important;
        }

        #mainNavBar {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }
        #mainNavBar.scrolled {
            background-color: #3a2417;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand:hover {
            color: var(--hover-color);
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: var(--accent-color) !important;
            padding: 10px 15px;
            transition: color 0.3s ease, background 0.3s ease;
            border-radius: 30px;
        }

        .navbar-nav .nav-link:hover {
            background-color: var(--accent-color);
            color: #fff !important;
        }

        .navbar-toggler {
            border: none;
            color: var(--accent-color);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(107,66,38, 0.8)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .logout {
            color: var(--accent-color) !important;
            font-weight: 500;
        }

        .logout:hover {
            color: #fff !important;
            background-color: var(--accent-color);
        }

        @media (max-width: 768px) {
            .navbar-nav .nav-link {
                margin: 5px 0;
                text-align: center;
            }
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/22.png', ['alt' => 'Логотип', 'style' => 'height:60px; ']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'id' => 'mainNavBar',
            'class' => 'navbar navbar-expand-md fixed-top'
        ]
    ]);


    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Афиша', 'url' => ['/site/aficha']],
        ['label' => 'О театре', 'url' => ['/site/about']],
        ['label' => 'Мои билеты', 'url' => ['/site/cabinet']],
        ['label' => 'Регистрация', 'url' => ['/site/signup']],
    ];

    // Только для админов
    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1) {
        $menuItems[] = ['label' => 'Админка', 'url' => ['/admin/index']];
    }

    $menuItems[] = Yii::$app->user->isGuest
        ? ['label' => 'Войти', 'url' => ['/site/login']]
        : [
            'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
            'url' => '#',
            'linkOptions' => [
                'class' => 'logout-link nav-link',
                'data-method' => 'post',
                'data-confirm' => 'Вы уверены, что хотите выйти?',
                'data-href' => Url::to(['/site/logout'])
            ]
        ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.getElementById("mainNavBar");
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    });
</script>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy;NishaMandarinov<?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

