<?php

namespace app\models\backend;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\backend\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\backend\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_order_status', 'total'], 'integer'],
            [['order_content', 'created_at', 'closed_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'closed_at' => $this->closed_at,
            'fk_order_status' => $this->fk_order_status,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'order_content', $this->order_content]);

        return $dataProvider;
    }
}
