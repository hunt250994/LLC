<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lliso;

/**
 * LlisoSearch represents the model behind the search form about `app\models\Lliso`.
 */
class LlisoSearch extends Lliso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iso_id', 'is_deleted'], 'integer'],
            [['iso_code', 'created_at'], 'safe'],
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
        $query = Lliso::find();

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
            'iso_id' => $this->iso_id,
            'created_at' => $this->created_at,
            'is_deleted' => 0,
        ]);

        $query->andFilterWhere(['like', 'iso_code', $this->iso_code]);

        return $dataProvider;
    }
}
