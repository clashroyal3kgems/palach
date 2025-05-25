<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "performances".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $start_time
 * @property string|null $end_time
 * @property int|null $duration
 * @property int|null $genre_id
 * @property int|null $author_id
 * @property int|null $director_id
 * @property int|null $age_limit
 * @property string|null $image
 * @property float|null $price
 *
 * @property Authors $author
 * @property Directors $director
 * @property Genres $genre
 * @property PerformanceCast[] $performanceCasts
 * @property PerformanceDates[] $performanceDates
 */
class Performances extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performances';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'start_time', 'end_time', 'duration', 'genre_id', 'author_id', 'director_id', 'age_limit', 'image', 'price'], 'default', 'value' => null],
            [['description'], 'string'],
            [['start_time', 'end_time'], 'safe'],
            [['duration', 'genre_id', 'author_id', 'director_id', 'age_limit'], 'integer'],
            [['price'], 'number'],
            [['title', 'image'], 'string', 'max' => 255],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genres::class, 'targetAttribute' => ['genre_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::class, 'targetAttribute' => ['author_id' => 'id']],
            [['director_id'], 'exist', 'skipOnError' => true, 'targetClass' => Directors::class, 'targetAttribute' => ['director_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'duration' => 'Duration',
            'genre_id' => 'Genre ID',
            'author_id' => 'Author ID',
            'director_id' => 'Director ID',
            'age_limit' => 'Age Limit',
            'image' => 'Image',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Director]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirector()
    {
        return $this->hasOne(Directors::class, ['id' => 'director_id']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genres::class, ['id' => 'genre_id']);
    }

    /**
     * Gets query for [[PerformanceCasts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerformanceCasts()
    {
        return $this->hasMany(PerformanceCast::class, ['performance_id' => 'id']);
    }

    /**
     * Gets query for [[PerformanceDates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerformanceDates()
    {
        return $this->hasMany(PerformanceDates::class, ['performance_id' => 'id']);
    }
    public function getDetails()
    {
        return $this->hasOne(PerformanceDetails::class, ['performance_id' => 'id']);
    }

}
