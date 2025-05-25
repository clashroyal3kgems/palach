<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Управление спектаклями';

$this->registerCss(<<<CSS
    .custom-grid-container {
        background: #f5f0ea;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
    }

    .custom-grid-container h1 {
        color: #6B4226;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .btn-success {
        background-color: #6B4226;
        border-color: #6B4226;
        border-radius: 30px;
        padding: 8px 22px;
        font-weight: 500;
    }

    .btn-success:hover {
        background-color: #4e2f1a;
        border-color: #4e2f1a;
    }

    table.table th {
        background-color: #e8ddd4;
        color: #6B4226;
        font-weight: 600;
        border: none;
    }

    table.table td {
        vertical-align: middle;
        border: none;
        color: #2e2e2e;
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #fefcfa;
    }

    .table-hover tbody tr:hover {
        background-color: #f0e9e2;
    }

    .action-column a {
        margin-right: 8px;
        font-size: 1.2rem;
        text-decoration: none;
    }
CSS);
?>

<div class="container mt-5">
    <div class="custom-grid-container">
        <h1><?= Html::encode($this->title) ?></h1>

        <p><?= Html::a('Добавить спектакль', ['admin/create-performance'], ['class' => 'btn btn-success']) ?></p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'title',
                [
                    'attribute' => 'author_id',
                    'value' => 'author.name',
                    'label' => 'Автор',
                ],
                [
                    'attribute' => 'genre_id',
                    'value' => 'genre.name',
                    'label' => 'Жанр',
                ],
                [
                    'attribute' => 'director_id',
                    'value' => 'director.name',
                    'label' => 'Режиссёр',
                ],
                [
                    'attribute' => 'age_limit',
                    'label' => 'Возрастное ограничение',
                ],
                [
                    'attribute' => 'price',
                    'label' => 'Цена',
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'controller' => 'admin',
                    'template' => '{update} {delete}',
                    'contentOptions' => ['class' => 'action-column'],
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('✏️', ['admin/update-performance', 'id' => $model->id], ['title' => 'Редактировать']);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('🗑', ['admin/delete-performance', 'id' => $model->id], [
                                'title' => 'Удалить',
                                'data' => [
                                    'confirm' => 'Удалить спектакль?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                ],
            ],
            'tableOptions' => ['class' => 'table table-striped table-hover'],
        ]) ?>
    </div>
</div>
