<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\services;

/**
 * ServicesSearch represents the model behind the search form of `app\models\services`.
 */
class ServicesSearch extends services
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type_service', 'unit'], 'safe'],
            [['price'], 'number'],
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
        $query = services::find();

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
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'type_service', $this->type_service])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
