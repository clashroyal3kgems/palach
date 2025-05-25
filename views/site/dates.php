<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Выбор даты спектакля';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="list-group">
    <?php foreach ($dates as $date): ?>
        <a href="<?= Url::to(['site/select', 'performanceDateId' => $date->id]) ?>" class="list-group-item list-group-item-action">
            Спектакль #<?= $date->performance_id ?> — <?= Html::encode($date->getFormattedDate()) ?>
        </a>
    <?php endforeach; ?>
</div>
