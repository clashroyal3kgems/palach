<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
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

    h1, h2, h3, h4 {
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

    .site-login .form-control {
        width: 100%;
        max-width: 100%;
        padding: 12px 15px;
        font-size: 1rem;
        border: 1.5px solid var(--light-brown);
        border-radius: 8px;
        transition: border-color 0.3s;
    }

    .site-login .form-control:focus {
        border-color: var(--accent-color);
        outline: none;
        box-shadow: 0 0 5px var(--accent-color);
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

    .form-check {
        margin-top: 20px;
        margin-bottom: 25px;
    }

    .form-check-label {
        color: var(--text-color);
        font-size: 0.95rem;
        user-select: none;
    }
</style>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните форму</p>

    <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

    <?= $form->field($us, 'surname')->textInput(['autofocus' => true]) ?>
    <?= $form->field($us, 'name')->textInput() ?>
    <?= $form->field($us, 'username')->textInput() ?>
    <?= $form->field($us, 'password')->passwordInput() ?>
    <?= $form->field($us, 'password_repeat')->passwordInput() ?>
    <?= $form->field($us, 'email')->textInput() ?>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
        <label class="form-check-label" for="flexCheckDefault">
            Согласен с правилами
        </label>
    </div>

    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>
