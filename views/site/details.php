<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */
/** @var app\models\PerformanceDetails|null $details */

$this->title = $model->title;
?>

<div class="performance-view">

    <h1><?= Html::encode($model->title) ?></h1>

    <div class="poster">
        <?= Html::img("@web/uploads/{$model->image}", ['alt' => $model->title, 'style' => 'max-width:300px']) ?>
    </div>

    <p><strong>Описание:</strong> <?= Html::encode($model->description) ?></p>
    <p><strong>Время начала:</strong> <?= $model->start_time ?></p>
    <p><strong>Время окончания:</strong> <?= $model->end_time ?></p>
    <p><strong>Продолжительность:</strong> <?= $model->duration ?> минут</p>
    <p><strong>Возрастное ограничение:</strong> <?= $model->age_limit ?>+</p>
    <p><strong>Цена билета:</strong> <?= Yii::$app->formatter->asCurrency($model->price, 'RUB') ?></p>

    <?php if ($details): ?>
        <hr>
        <h2>Подробности</h2>

        <p><strong>Полное описание:</strong></p>
        <p><?= nl2br(Html::encode($details->full_description)) ?></p>

        <p><strong>Актёрский состав:</strong></p>
        <p><?= Html::encode($details->cast) ?></p>

        <p><strong>Особенности постановки:</strong></p>
        <p><?= Html::encode($details->production_notes) ?></p>

        <?php if ($details->intermission_duration): ?>
            <p><strong>Антракт:</strong> <?= $details->intermission_duration ?> минут</p>
        <?php endif; ?>

        <?php if ($details->awards): ?>
            <p><strong>Награды:</strong> <?= Html::encode($details->awards) ?></p>
        <?php endif; ?>
    <?php else: ?>
        <p><em>Дополнительная информация недоступна.</em></p>
    <?php endif; ?>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::a('Купить билет', ['dates', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>


<style>
    :root {
        --primary: #8B4513;
        --primary-light: #CD853F;
        --text: #333333;
        --text-light: #5A5A5A;
        --bg: #FFF9F5;
        --card-bg: #FFFFFF;
        --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    /* Основной контейнер */
    .performance-view {
        max-width: 900px;
        margin: 2rem auto;
        padding: 2.5rem;
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        font-family: 'Georgia', 'Times New Roman', serif;
        color: var(--text);
        line-height: 1.6;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(139, 69, 19, 0.1);
    }

    .performance-view::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg opacity="0.03" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%238B4513"><path d="M30,10 Q50,5 70,10 T90,30 Q95,50 90,70 T70,90 Q50,95 30,90 T10,70 Q5,50 10,30 T30,10Z"/></svg>');
        pointer-events: none;
    }

    .performance-view h1 {
        color: var(--primary);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        position: relative;
        text-align: center;
        font-family: 'Playfair Display', serif;
    }

    .performance-view .poster {
        margin: 2rem auto;
        text-align: center;
        max-width: 80%;
        position: relative;
    }

    .performance-view .poster img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(139, 69, 19, 0.2);
        transition: var(--transition);
        border: 1px solid rgba(139, 69, 19, 0.1);
    }

    .performance-view .poster:hover img {
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(139, 69, 19, 0.3);
    }

    .performance-view p {
        font-size: 1.1rem;
        margin-bottom: 1.25rem;
        color: var(--text);
    }

    /* Акцентные элементы */
    .performance-view strong {
        color: var(--primary);
        font-weight: 600;
    }

    .performance-view hr {
        margin: 2rem 0;
        border: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--primary-light), transparent);
    }

    .performance-view h2 {
        color: var(--primary);
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
        text-align: center;
        position: relative;
    }

    .performance-view h2::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 2px;
        background: var(--primary-light);
    }

    /* Кнопки (как билеты) */
    .performance-view .btn {
        display: inline-block;
        padding: 0.8rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 50px;
        transition: var(--transition);
        text-align: center;
        margin: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .performance-view .btn-secondary {
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
    }

    .performance-view .btn-secondary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
    }

    .performance-view .btn-primary {
        background: var(--primary);
        color: white;
        border: none;
        box-shadow: 0 4px 15px rgba(139, 69, 19, 0.3);
    }

    .performance-view .btn-primary:hover {
        background: var(--primary-light);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(139, 69, 19, 0.4);
    }

    .performance-view em {
        display: block;
        padding: 1rem;
        background: rgba(139, 69, 19, 0.05);
        border-left: 3px solid var(--primary-light);
        color: var(--text-light);
        font-style: italic;
        text-align: center;
        border-radius: 0 4px 4px 0;
    }

    @media (max-width: 768px) {
        .performance-view {
            padding: 1.5rem;
            margin: 1rem;
        }

        .performance-view h1 {
            font-size: 2rem;
        }

        .performance-view .poster {
            max-width: 100%;
        }

        .performance-view .btn {
            width: 100%;
            margin: 0.5rem 0;
        }
    }
</style>