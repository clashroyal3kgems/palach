<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Выбор мест';
$this->registerCssFile('@web/css/seats.css');
?>

<h1 class="text-center mb-4"><?= Html::encode($this->title) ?></h1>

<div class="seat-legend d-flex justify-content-center mb-4 gap-4">
    <div class="d-flex align-items-center gap-2">
        <div class="seat available"></div> Свободно
    </div>
    <div class="d-flex align-items-center gap-2">
        <div class="seat booked"></div> Занято
    </div>
    <div class="d-flex align-items-center gap-2">
        <div class="seat selected"></div> Выбрано
    </div>
</div>

<div class="seat-map">
    <?php
    $seatsByRow = [];
    foreach ($seats as $seat) {
        $seatsByRow[$seat->seat_row][] = $seat;
    }
    ?>

    <?php foreach ($seatsByRow as $rowNumber => $rowSeats): ?>
        <div class="seat-row">
            <div class="row-label">Ряд <?= Html::encode($rowNumber) ?></div>
            <div class="seats-in-row">
                <?php foreach ($rowSeats as $seat): ?>
                    <?php
                    $isBooked = in_array($seat->id, $bookedSeats);
                    $seatClass = $isBooked ? 'booked' : 'available';
                    ?>
                    <div class="seat <?= $seatClass ?>"
                         data-seat-id="<?= $seat->id ?>"
                         data-zone="<?= Html::encode($seat->zone) ?>"
                         data-row="<?= $seat->seat_row ?>"
                         data-number="<?= $seat->seat_number ?>"
                         title="<?= Html::encode("{$seat->zone} - Ряд {$seat->seat_row}, Место {$seat->seat_number}") ?>">
                        <?= $seat->seat_number ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php $form = ActiveForm::begin(['action' => ['site/buy'], 'method' => 'post']); ?>
<input type="hidden" name="performance_date_id" value="<?= $performanceDateId ?>">
<input type="hidden" id="selected-seats" name="seat_ids">

<div class="form-group text-center mt-4">
    <?= Html::submitButton('Купить билеты', ['class' => 'btn btn-success px-4 py-2']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php
$this->registerJs(<<<JS
let selected = [];

function updateBuyButton() {
    const btn = $('button[type=submit]');
    btn.prop('disabled', selected.length === 0);
}

$('.seat.available').on('click', function () {
    const seatId = $(this).data('seat-id');
    $(this).toggleClass('selected');
    if ($(this).hasClass('selected')) {
        selected.push(seatId);
    } else {
        selected = selected.filter(id => id !== seatId);
    }
$('#selected-seats').val(JSON.stringify(selected));

    updateBuyButton();
});

updateBuyButton(); // Disable on load
JS);
?>

<style>
    .seat-map {
        display: flex;
        flex-direction: column;
        gap: 16px;
        max-width: 700px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #fafafa;
    }

    .seat-row {
        display: flex;
        align-items: center;
    }

    .row-label {
        width: 80px;
        font-weight: bold;
        margin-right: 10px;
        text-align: right;
        user-select: none;
        font-size: 16px;
    }

    .seats-in-row {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .seat {
        width: 36px;
        height: 36px;
        border-radius: 6px;
        line-height: 36px;
        text-align: center;
        cursor: pointer;
        user-select: none;
        border: 1px solid #bbb;
        font-size: 14px;
        background-color: #f5f5f5;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .seat.available:hover {
        background-color: #8B4513;
        color: #fff;
        transform: scale(1.1);
    }

    .seat.booked {
        background-color: #d1d1d1;
        cursor: not-allowed;
        color: #888;
        border: 1px solid #aaa;
    }

    .seat.selected {
        background-color: #CD853F;
        color: white;
        font-weight: bold;
        border: 2px solid #8B4513;
    }

    .seat-legend {
        font-size: 16px;
    }

    .seat-legend .seat {
        width: 24px;
        height: 24px;
        line-height: 24px;
    }

    button[disabled] {
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>