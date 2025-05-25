<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cast_members".
 *
 * @property int $id
 * @property string $name
 * @property string|null $role
 *
 * @property PerformanceCast[] $performanceCasts
 */
class CastMembers extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cast_members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role'], 'default', 'value' => null],
            [['name'], 'required'],
            [['name', 'role'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[PerformanceCasts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerformanceCasts()
    {
        return $this->hasMany(PerformanceCast::class, ['cast_member_id' => 'id']);
    }

}
