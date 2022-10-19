<?php

namespace app\models\backend;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\backend\PizzaParameters;

/**
 * PizzaParametersSearch represents the model behind the search form of `app\models\backend\PizzaParameters`.
 */
class PizzaParametersSearch extends PizzaParameters
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'diameter_id', 'weight', 'pizza_price', 'piece_price'], 'integer'],
            [['pizza_id'], 'string'],
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
        $query = PizzaParameters::find()
            ->JoinWith(['diameter', 'pizza']);

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
        $query->andFilterWhere(['like', 'pizzas.title', $this->pizza_id]);
        $query->andFilterWhere([
            'id' => $this->id,
            'diameters.value' => $this->diameter_id,
            'weight' => $this->weight,
            'pizza_price' => $this->pizza_price,
            'piece_price' => $this->piece_price,
        ]);

        return $dataProvider;
    }
}
