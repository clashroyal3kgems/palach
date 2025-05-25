<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Управление новостями';
?>

<?php
$this->registerCss(<<<CSS
    .news-panel {
        background: #f5f0ea;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.05);
    }

    .news-panel h1 {
        color: #6B4226;
        margin-bottom: 20px;
    }

    .btn-success {
        background-color: #6B4226;
        border-color: #6B4226;
        border-radius: 30px;
        padding: 8px 20px;
        font-weight: 500;
    }

    .btn-success:hover {
        background-color: #4e2f1a;
        border-color: #4e2f1a;
    }

    table.table {
        border-radius: 12px;
        overflow: hidden;
    }

    table.table thead th {
        background-color: #e8ddd4 !important;
        color: #6B4226 !important;
        font-weight: bold !important;
        border-bottom: 2px solid #d5c4b8 !important;
    }

    table.table td {
        vertical-align: middle;
        color: #2e2e2e;
    }

    .action-buttons a {
        margin-right: 8px;
        font-size: 1.2rem;
        color: #6B4226;
        transition: color 0.2s ease;
    }

    .action-buttons a:hover {
        color: #4e2f1a;
    }
CSS);
?>


<div class="container mt-5 news-panel">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('Добавить новость', ['admin/create-news'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            [
                'attribute' => 'short_description',
                'label' => 'Краткое описание',
                'contentOptions' => [
                    'style' => 'max-width:300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;',
                ],
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y H:i'],
                'label' => 'Дата создания',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin',
                'template' => '<div class="action-buttons">{update} {delete}</div>',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('✏️', ['admin/update-news', 'id' => $model->id], ['title' => 'Редактировать']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('🗑', ['admin/delete-news', 'id' => $model->id], [
                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Удалить новость?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
        'tableOptions' => ['class' => 'table table-striped table-hover'],
    ]); ?>
</div>
