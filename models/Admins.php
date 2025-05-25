<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 */
class Admins extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'default', 'value' => null],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
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
            'phone' => 'Phone',
        ];
    }

}
