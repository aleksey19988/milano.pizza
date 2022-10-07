<?php

namespace app\models\backend;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\backend\ReadyPizzas;

/**
 * ReadyPizzasSearch represents the model behind the search form of `app\models\backend\ReadyPizzas`.
 */
class ReadyPizzasSearch extends ReadyPizzas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_pizza', 'number_of_pieces'], 'integer'],
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
        $query = ReadyPizzas::find()->with('d_pizzas');

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
            'fk_pizza' => $this->fk_pizza,
            'number_of_pieces' => $this->number_of_pieces,
        ]);

        return $dataProvider;
    }
}
