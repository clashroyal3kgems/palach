<?php
/** @var yii\web\View $this */
$this->title = 'Админ-панель';
?>

<div class="admin-dashboard container mt-5">
    <h1 class="mb-4 text-uppercase" style="color: #6B4226;">Панель администратора</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <a href="<?= \yii\helpers\Url::to(['admin/manage-news']) ?>" class="btn btn-block btn-lg button w-100">
                    Управление новостями
                </a>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <a href="<?= \yii\helpers\Url::to(['admin/manage-performances']) ?>" class="btn btn-block btn-lg button w-100">
                    Управление спектаклями
                </a>
            </div>
        </div>
    </div>
</div>
<style>
    .custom-box {
        box-shadow: 0 4px 10px var(--shadow-color);
        border-radius: 12px;
        border-bottom: 2px solid #d5c4b8 !important;
        transition: box-shadow 0.3s ease;
    }
</style>