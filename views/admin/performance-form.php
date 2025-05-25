<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Authors;
use app\models\Genres;
use app\models\Directors;

/** @var yii\web\View $this */
/** @var app\models\Performances $model */

$this->title = $model->isNewRecord ? 'Создать спектакль' : 'Редактировать спектакль';

$this->registerCss(<<<CSS
    h1 {
        color: #6B4226;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .form-control {
        border-radius: 15px;
        border: 1.5px solid #6B4226;
        padding: 10px 15px;
        color: #2e2e2e;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #4e2f1a;
        box-shadow: 0 0 6px rgba(110, 70, 30, 0.4);
        outline: none;
    }

    label {
        font-weight: 600;
        color: #6B4226;
    }

    .btn-primary {
        background-color: #6B4226;
        border-color: #6B4226;
        border-radius: 30px;
        padding: 10px 28px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #4e2f1a;
        border-color: #4e2f1a;
    }

    .form-group {
        margin-bottom: 25px;
    }

    textarea.form-control {
        resize: vertical;
    }

    .container.mt-5 {
        max-width: 700px;
        background: #f5f0ea;
        padding: 30px 40px;
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.05);
    }
CSS
);
?>

<div class="container mt-5">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'start_time')->input('time') ?>

    <?= $form->field($model, 'end_time')->input('time') ?>

    <?= $form->field($model, 'duration')->input('number', ['min' => 1]) ?>

    <?= $form->field($model, 'genre_id')->dropDownList(
        ArrayHelper::map(Genres::find()->distinct()->all(), 'id', 'name'),
        ['prompt' => 'Выберите жанр']
    ) ?>

    <?= $form->field($model, 'author_id')->dropDownList(
        ArrayHelper::map(Authors::find()->distinct()->all(), 'id', 'name'),
        ['prompt' => 'Выберите автора']
    ) ?>

    <?= $form->field($model, 'director_id')->dropDownList(
        ArrayHelper::map(Directors::find()->distinct()->all(), 'id', 'name'),
        ['prompt' => 'Выберите режиссёра']
    ) ?>

    <?= $form->field($model, 'age_limit')->dropDownList([
        0 => '0+', 6 => '6+', 12 => '12+', 16 => '16+', 18 => '18+'
    ], ['prompt' => 'Выберите возрастной предел']) ?>

    <?= $form->field($model, 'price')->input('number', ['step' => '0.01']) ?>

    <?= $form->field($model, 'image')->textInput(['placeholder' => 'poster1.jpg']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения', [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
