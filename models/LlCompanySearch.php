<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LlCompany;

/**
 * LlCompanySearch represents the model behind the search form about `app\models\LlCompany`.
 */
class LlCompanySearch extends LlCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'is_deleted'], 'integer'],
            [['Comapny_name', 'company_email', 'company_mobile', 'flat_no', 'street', 'landmark', 'area', 'pincode', 'city', 'state', 'country', 'created_at'], 'safe'],
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
        $query = LlCompany::find();

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
            'company_id' => $this->company_id,
            'created_at' => $this->created_at,
            'is_deleted' => 0,
        ]);

        $query->andFilterWhere(['like', 'Comapny_name', $this->Comapny_name])
            ->andFilterWhere(['like', 'company_email', $this->company_email])
            ->andFilterWhere(['like', 'company_mobile', $this->company_mobile])
            ->andFilterWhere(['like', 'flat_no', $this->flat_no])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'landmark', $this->landmark])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'pincode', $this->pincode])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
