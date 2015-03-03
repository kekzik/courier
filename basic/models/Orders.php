<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $time_create
 * @property integer $user_create
 * @property string $name_order
 * @property integer $client
 * @property string $description
 * @property integer $status
 * @property integer $user_courier
 * @property string $pick_up
 * @property string $deliver
 * @property integer $metod_payment
 * @property integer $item_id
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }
    public function init(){
        parent::init();
        $this->time_create = date("Y-m-d H:i");
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_create', 'user_create', 'name_order', 'client', 'metod_payment', 'item_id'], 'required'],
            [['time_create', 'pick_up', 'deliver'], 'safe'],
            [['user_create', 'client', 'status', 'user_courier', 'metod_payment', 'item_id'], 'integer'],
            [['description'], 'string'],
            [['name_order'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time_create' => 'Время создания',
            'user_create' => 'Создатель',
            'name_order' => 'Имя заказа',
            'client' => 'Клиент',
            'description' => 'Описание',
            'status' => 'Статус',
            'user_courier' => 'Курьер',
            'pick_up' => 'Время отправки',
            'deliver' => 'Время доставки',
            'metod_payment' => 'Метод оплаты',
            'item_id' => 'Item ID',
        ];
    }
}
