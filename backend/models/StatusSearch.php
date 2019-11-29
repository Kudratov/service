<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Status;

/**
 * StatusSearch represents the model behind the search form of `backend\models\Status`.
 */
class StatusSearch extends Status
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stuff_id', 'comp_inn', 'credit_id', 'status', 'open_status'], 'integer'],
            [['comment'], 'safe'],
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
        $query = Status::find();

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
            'stuff_id' => $this->stuff_id,
            'comp_inn' => $this->comp_inn,
            'credit_id' => $this->credit_id,
            'status' => $this->status,
            'open_status' => $this->open_status,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
