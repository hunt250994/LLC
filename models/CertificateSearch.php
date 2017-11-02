<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Certificate;

/**
 * CertificateSearch represents the model behind the search form about `app\models\Certificate`.
 */
class CertificateSearch extends Certificate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['certificate_id', 'company_id', 'iso_id', 'is_deleted', 'is_published'], 'integer'],
            [['certificate_code', 'ea_code', 'services', 'from_date', 'to_date', 'reminder_date', 'created_at'], 'safe'],
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
        $query = Certificate::find();

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
            'certificate_id' => $this->certificate_id,
            'company_id' => $this->company_id,
            'iso_id' => $this->iso_id,
           // 'from_date' => $this->from_date,
           // 'to_date' => $this->to_date,
            'reminder_date' => $this->reminder_date,
          //  'created_at' => $this->created_at,
            'is_deleted' => 0,
            'is_published' => $this->is_published,
        ]);

        $query->andFilterWhere(['like', 'certificate_code', $this->certificate_code])
            ->andFilterWhere(['like', 'ea_code', $this->ea_code])
            ->andFilterWhere(['like', 'services', $this->services])
            ->andFilterWhere(['like', 'from_date', $this->from_date])
            ->andFilterWhere(['like', 'to_date', $this->to_date])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
}
