<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

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

    h1 {
        color: var(--accent-color);
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .site-login {
        max-width: 480px;
        margin: 50px auto;
        padding: 25px 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px var(--shadow-color);
    }

    .site-login p {
        margin-bottom: 30px;
        font-size: 1.1rem;
    }

    .form-control {
        width: 100% !important;
        max-width: 100%;
        padding: 12px 15px;
        font-size: 1rem;
        border: 1.5px solid var(--light-brown);
        border-radius: 8px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: var(--accent-color);
        outline: none;
        box-shadow: 0 0 5px var(--accent-color);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--accent-color);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .invalid-feedback {
        color: #dc3545;
        margin-top: 6px;
        font-size: 0.9rem;
        display: block;
    }

    .btn-primary {
        background-color: var(--accent-color);
        color: #fff;
        padding: 12px 30px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s, transform 0.2s;
        display: inline-block;
        margin-top: 20px;
    }

    .btn-primary:hover {
        background-color: var(--button-hover-bg);
        transform: scale(1.05);
    }

    .custom-control {
        display: flex;
        align-items: center;
        margin-top: 20px;
        user-select: none;
    }

    .custom-control input[type="checkbox"] {
        margin-right: 10px;
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .custom-control label {
        margin: 0;
        font-size: 0.95rem;
        color: var(--text-color);
        text-transform: none;
        letter-spacing: normal;
    }

</style>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для входа:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => ''],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"custom-control\">{input} {label}</div>\n{error}",
        'labelOptions' => ['class' => ''],
        'label' => 'Запомнить меня',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>


