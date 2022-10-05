<?php

namespace app\models;

use Yii;
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $time
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    Country::EVENT_BEFORE_INSERT => 'time',

                ],
                'value' => function () {
                    return time();
                },
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'string', 'max' => 255],
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
            'code' => 'Code',
        ];
    }
    public function getFormAttribs()
    {
        return [
            // primary key column
            'id' => [ // primary key attribute
                'type' => TabularForm::INPUT_HIDDEN,
                'columnOptions' => ['hidden' => true]
            ],
            'name' => ['type' => TabularForm::INPUT_TEXT],
            'code' => ['type' => TabularForm::INPUT_TEXT],

            'time' => [
                'type' => TabularForm::INPUT_STATIC,
                'label' => 'Time',
                'format' => ['datetime', 'php:d.m.Y H:i:s'],
                'columnOptions' => ['hAlign' => GridView::ALIGN_RIGHT, 'width' => '90px']
            ],
        ];
    }
}
