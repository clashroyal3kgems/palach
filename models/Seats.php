<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seats".
 *
 * @property int $id
 * @property int|null $seat_row
 * @property int|null $seat_number
 * @property string|null $zone
 *
 * @property Tickets[] $tickets
 */
class Seats extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seat_row', 'seat_number', 'zone'], 'default', 'value' => null],
            [['seat_row', 'seat_number'], 'integer'],
            [['zone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seat_row' => 'Seat Row',
            'seat_number' => 'Seat Number',
            'zone' => 'Zone',
        ];
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::class, ['seat_id' => 'id']);
    }

}
