<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */

$this->title = 'Покупка билета: ' . $model->title;
?>

<div class="ticket-purchase">

    <h1><?= Html::encode($model->title) ?></h1>

    <div class="ticket-form">
        <?php $form = ActiveForm::begin(); ?>

        <div class="form-group">
            <label for="date">Выберите дату:</label>
            <select class="form-control" id="date" name="date">
                <option value="2025-05-20">20 мая 2025</option>
                <option value="2025-05-21">21 мая 2025</option>
                <option value="2025-05-22">22 мая 2025</option>
            </select>
        </div>

        <div class="form-group">
            <label for="time">Выберите время:</label>
            <select class="form-control" id="time" name="time">
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
            </select>
        </div>

        <div class="seat-map">
            <p><strong>Выберите места:</strong></p>
            <div class="seats">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="row">
                        <?php for ($j = 1; $j <= 10; $j++):
                            $seatId = "R{$i}S{$j}";
                            ?>
                            <label class="seat">
                                <input type="checkbox" name="seats[]" value="<?= $seatId ?>">
                                <?= $seatId ?>
                            </label>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


<style>
    .ticket-purchase {
        max-width: 960px;
        margin: 40px auto;
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        font-family: 'Inter', sans-serif;
    }

    .ticket-purchase h1 {
        font-size: 2rem;
        margin-bottom: 30px;
        color: #2e2e2e;
        text-align: center;
    }

    .ticket-form .form-group {
        margin-bottom: 25px;
    }

    .ticket-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .ticket-form select {
        width: 100%;
        padding: 10px 12px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .seat-map {
        margin: 30px 0;
    }

    .seats .row {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .seat {
        position: relative;
        margin: 4px;
        cursor: pointer;
        display: inline-block;
    }

    .seat input {
        display: none;
    }

    .seat::before {
        content: '';
        display: inline-block;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        background-color: #eee;
        border: 1px solid #ccc;
        transition: background-color 0.3s;
    }

    .seat input:checked + span,
    .seat input:checked::before {
        background-color: #4caf50;
        border-color: #388e3c;
    }

    .seat:hover::before {
        background-color: #ddd;
    }

    .seat input:checked + span::after {
        content: '✓';
        position: absolute;
        color: white;
        left: 10px;
        top: 4px;
        font-size: 16px;
    }

    .seat {
        font-size: 0.8rem;
        text-align: center;
        color: #555;
    }

    .btn-primary {
        background-color: #6B4226;
        border: none;
        padding: 12px 28px;
        font-weight: 600;
        border-radius: 8px;
        color: #fff;
        text-transform: uppercase;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #5a3820;
        transform: translateY(-2px);
    }
</style>
