<?php

namespace app\models\backend;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\backend\Pizzas;

/**
 * PizzasSearch represents the model behind the search form of `app\models\backend\Pizzas`.
 */
class PizzasSearch extends Pizzas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'weight', 'fk_diameter', 'ingredients', 'price', 'piece_price', 'is_active'], 'integer'],
            [['title', 'image_path'], 'safe'],
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
        $query = Pizzas::find()->with('d_diameters');

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
            'weight' => $this->weight,
            'fk_diameter' => $this->fk_diameter,
            'ingredients' => $this->ingredients,
            'price' => $this->price,
            'piece_price' => $this->piece_price,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image_path', $this->image_path]);

        return $dataProvider;
    }
}
