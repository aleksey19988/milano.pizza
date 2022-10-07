<?php

namespace app\models\backend;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\backend\Diameters;

/**
 * DiametersSearch represents the model behind the search form of `app\models\backend\Diameters`.
 */
class DiametersSearch extends Diameters
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'diameter_value', 'is_active'], 'integer'],
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
        $query = Diameters::find();

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
            'diameter_value' => $this->diameter_value,
            'is_active' => $this->is_active,
        ]);

        return $dataProvider;
    }
}
