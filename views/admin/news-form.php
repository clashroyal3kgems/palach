<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\News $model */

$this->title = $model->isNewRecord ? 'Создать новость' : 'Редактировать новость';

$this->registerCss(<<<CSS
    .news-form-container {
        background: #f5f0ea;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
    }

    .news-form-container h1 {
        color: #6B4226;
        margin-bottom: 30px;
        font-weight: 600;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #d6ccc2;
    }

    .form-control:focus {
        border-color: #6B4226;
        box-shadow: 0 0 0 0.2rem rgba(107, 66, 38, 0.2);
    }

    .form-label {
        color: #6B4226;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #6B4226;
        border-color: #6B4226;
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #4e2f1a;
        border-color: #4e2f1a;
    }
CSS);
?>

<div class="container mt-5" style="max-width:700px;">
    <div class="news-form-container">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'short_description')->textarea(['rows' => 3]) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 8]) ?>

        <?= $form->field($model, 'created_at')->input('datetime-local', [
            'value' => $model->created_at ? date('Y-m-d\TH:i', strtotime($model->created_at)) : date('Y-m-d\TH:i'),
        ]) ?>

        <div class="form-group mt-4">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения', [
                'class' => 'btn btn-primary'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
