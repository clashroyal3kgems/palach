<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "directors".
 *
 * @property int $id
 * @property string $name
 *
 * @property Performances[] $performances
 */
class Directors extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Performances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerformances()
    {
        return $this->hasMany(Performances::class, ['director_id' => 'id']);
    }

}
