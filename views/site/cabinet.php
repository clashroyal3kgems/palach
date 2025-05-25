<?php
use yii\helpers\Html;

$this->title = 'Личный кабинет';
?>

<div class="container mt-5">
    <h1>Ваши билеты</h1>

    <?php if (empty($tickets)): ?>
        <p>У вас пока нет купленных билетов.</p>
    <?php else: ?>
        <div class="ticket-list">
            <?php foreach ($tickets as $ticket): ?>
                <div class="ticket-card card">
                    <div class="card-body">
                        <h3 class="card-title"><?= Html::encode($ticket->performanceDate->performance->title) ?></h3>
                        <p class="card-text">
                            <strong>Дата:</strong> <?= Html::encode($ticket->performanceDate->date) ?><br>
                            <strong>Ряд:</strong> <?= Html::encode($ticket->seat->seat_row) ?>,
                            <strong>Место:</strong> <?= Html::encode($ticket->seat->seat_number) ?><br>
                            <strong>Зона:</strong> <?= Html::encode($ticket->seat->zone) ?><br>
                            <strong>Время покупки:</strong> <?= Yii::$app->formatter->asDatetime($ticket->purchase_time) ?>
                        </p>
                        <span class="badge badge-success">Забронирован</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<style>
    .ticket-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 30px;
    }
    .ticket-card {
        box-shadow: 0 4px 10px var(--shadow-color);
        border-radius: 12px;
        background: #fff;
        transition: box-shadow 0.3s ease;
    }
    .ticket-card:hover {
        box-shadow: 0 10px 20px var(--hover-shadow-color);
    }
    .badge-success {
        display: inline-block;
        background-color: var(--accent-color);
        color: #fff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        text-transform: uppercase;
    }
</style>
