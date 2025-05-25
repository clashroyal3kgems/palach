<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genres".
 *
 * @property int $id
 * @property string $name
 *
 * @property Performances[] $performances
 */
class Genres extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
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
        return $this->hasMany(Performances::class, ['genre_id' => 'id']);
    }

}
