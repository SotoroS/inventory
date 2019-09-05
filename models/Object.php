<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "object".
 *
 * @property int $id
 * @property string $name
 * @property string $inventory_id
 * @property string $budget
 * @property string $date
 * @property int $count
 * @property double $cost
 * @property string $position
 * @property string $description
 * @property int $status_id
 *
 * @property Status $status
 */
class Object extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'object';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['count', 'status_id'], 'integer'],
            [['cost'], 'number'],
            [['name', 'inventory_id', 'budget', 'position', 'description'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'inventory_id' => 'Инвентарный номер',
            'budget' => 'Бюджет',
            'date' => 'Дата',
            'count' => 'Кол-во',
            'cost' => 'Стоимость',
            'position' => 'Местоположение',
            'description' => 'Описание',
            'status_id' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        $statuses = Status::find()->asArray()->all();
        $array = ArrayHelper::map($statuses, 'id', 'name');

        return $array;
    }
}
