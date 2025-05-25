<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "theatre_info".
 *
 * @property int $id
 * @property string|null $about
 */
class TheatreInfo extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theatre_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about'], 'default', 'value' => null],
            [['about'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'about' => 'About',
        ];
    }

}
