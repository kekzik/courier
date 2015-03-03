<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrderSearch represents the model behind the search form about `app\models\Orders`.
 */
class OrderSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_create', 'client', 'status', 'user_courier', 'metod_payment', 'item_id'], 'integer'],
            [['time_create', 'name_order', 'description', 'pick_up', 'deliver'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'time_create' => $this->time_create,
            'user_create' => $this->user_create,
            'client' => $this->client,
            'status' => $this->status,
            'user_courier' => $this->user_courier,
            'pick_up' => $this->pick_up,
            'deliver' => $this->deliver,
            'metod_payment' => $this->metod_payment,
            'item_id' => $this->item_id,
        ]);

        $query->andFilterWhere(['like', 'name_order', $this->name_order])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
