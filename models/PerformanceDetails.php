<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "performance_details".
 *
 * @property int $id
 * @property int $performance_id
 * @property string|null $full_description
 * @property string|null $cast
 * @property string|null $production_notes
 * @property int|null $intermission_duration
 * @property string|null $awards
 *
 * @property Performances $performance
 */
class PerformanceDetails extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performance_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_description', 'cast', 'production_notes', 'intermission_duration', 'awards'], 'default', 'value' => null],
            [['performance_id'], 'required'],
            [['performance_id', 'intermission_duration'], 'integer'],
            [['full_description', 'cast', 'production_notes', 'awards'], 'string'],
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
            'full_description' => 'Full Description',
            'cast' => 'Cast',
            'production_notes' => 'Production Notes',
            'intermission_duration' => 'Intermission Duration',
            'awards' => 'Awards',
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

}
