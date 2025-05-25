<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $performance_date_id
 * @property int|null $seat_id
 * @property string|null $purchase_time
 *
 * @property PerformanceDates $performanceDate
 * @property Seats $seat
 * @property User $user
 */
class Tickets extends \yii\db\ActiveRecord
{

    const STATUS_RESERVED = 1;
    const STATUS_BOUGHT = 2;
    const STATUS_CANCELLED = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'performance_date_id', 'seat_id', 'purchase_time'], 'default', 'value' => null],
            [['user_id', 'performance_date_id', 'seat_id'], 'integer'],
            [['purchase_time'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['performance_date_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerformanceDates::class, 'targetAttribute' => ['performance_date_id' => 'id']],
            [['seat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seats::class, 'targetAttribute' => ['seat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'performance_date_id' => 'Performance Date ID',
            'seat_id' => 'Seat ID',
            'purchase_time' => 'Purchase Time',
        ];
    }

    /**
     * Gets query for [[PerformanceDate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerformanceDate()
    {
        return $this->hasOne(PerformanceDates::class, ['id' => 'performance_date_id']);
    }

    /**
     * Gets query for [[Seat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeat()
    {
        return $this->hasOne(Seats::class, ['id' => 'seat_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
