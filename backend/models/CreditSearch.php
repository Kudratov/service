<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Credit;
use backend\models\Stuff;


/**
 * CreditSearch represents the model behind the search form of `backend\models\Credit`.
 */
class CreditSearch extends Credit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'company_id', 'expire_date'], 'integer'],
            [['c_type', 'viloyat', 'fillial', 'type', 'summa', 'supply'], 'safe'],
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
        $stuff_vil='';
        $stuff_tum= '';
        $cur_stuff =  Yii::$app->user->getId();
        // take current users viloyat and tuman 
         $inf_stuff = Stuff::find()->where(['id'=>$cur_stuff])->all();
         foreach ($inf_stuff as $inf_stuffs) {
            $stuff_vil = $inf_stuffs->viloyat;
            $stuff_tum = $inf_stuffs->tuman;
         }

        $query = Credit::find()->where(['viloyat'=>$stuff_vil,'fillial'=>$stuff_tum]);

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
            'user_id' => $this->user_id,
            'company_id' => $this->company_id,
            'expire_date' => $this->expire_date,
        ]);

        $query->andFilterWhere(['like', 'c_type', $this->c_type])
            ->andFilterWhere(['like', 'viloyat', $this->viloyat])
            ->andFilterWhere(['like', 'fillial', $this->fillial])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'summa', $this->summa])
            ->andFilterWhere(['like', 'supply', $this->supply]);

        return $dataProvider;
    }
}
