<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tenants;

/**
 * tenantsSearch represents the model behind the search form of `app\models\tenants`.
 */
class tenantsSearch extends tenants
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tenants';
    }
    public function rules()
    {
        return [
            [['id', 'account', 'phone'], 'integer'],
            [['Full_name', 'Sex'], 'safe'],
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
        $query = tenants::find();

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
            'account' => $this->account,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'Full_name', $this->Full_name])
            ->andFilterWhere(['like', 'Sex', $this->Sex]);

        return $dataProvider;
    }
}
