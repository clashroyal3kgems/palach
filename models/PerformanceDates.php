<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "performance_dates".
 *
 * @property int $id
 * @property int|null $performance_id
 * @property string|null $date
 *
 * @property Performances $performance
 * @property Tickets[] $tickets
 */
class PerformanceDates extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performance_dates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['performance_id', 'date'], 'default', 'value' => null],
            [['performance_id'], 'integer'],
            [['date'], 'safe'],
            [['performance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Performances::class, 'targetAttribute' => ['performance_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'performance_id' => 'Performance ID',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Performance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerformance()
    {
        return $this->hasOne(Performances::class, ['id' => 'performance_id']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::class, ['performance_date_id' => 'id']);
    }
    public function getFormattedDate()
    {
        return Yii::$app->formatter->asDate($this->date, 'php:d.m.Y');
    }


}
