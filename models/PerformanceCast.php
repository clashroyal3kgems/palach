<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "performance_cast".
 *
 * @property int $id
 * @property int|null $performance_id
 * @property int|null $cast_member_id
 *
 * @property CastMembers $castMember
 * @property Performances $performance
 */
class PerformanceCast extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performance_cast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['performance_id', 'cast_member_id'], 'default', 'value' => null],
            [['performance_id', 'cast_member_id'], 'integer'],
            [['performance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Performances::class, 'targetAttribute' => ['performance_id' => 'id']],
            [['cast_member_id'], 'exist', 'skipOnError' => true, 'targetClass' => CastMembers::class, 'targetAttribute' => ['cast_member_id' => 'id']],
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
            'cast_member_id' => 'Cast Member ID',
        ];
    }

    /**
     * Gets query for [[CastMember]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCastMember()
    {
        return $this->hasOne(CastMembers::class, ['id' => 'cast_member_id']);
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
