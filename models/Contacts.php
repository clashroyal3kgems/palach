<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string|null $address
 * @property string|null $work_schedule
 * @property string|null $box_office_info
 * @property string|null $reception_phone
 * @property string|null $reception_email
 */
class Contacts extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'work_schedule', 'box_office_info', 'reception_phone', 'reception_email'], 'default', 'value' => null],
            [['box_office_info'], 'string'],
            [['address', 'work_schedule'], 'string', 'max' => 255],
            [['reception_phone'], 'string', 'max' => 20],
            [['reception_email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'work_schedule' => 'Work Schedule',
            'box_office_info' => 'Box Office Info',
            'reception_phone' => 'Reception Phone',
            'reception_email' => 'Reception Email',
        ];
    }

}
