<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\apartments;

/**
 * ApartmentsSearch represents the model behind the search form of `app\models\apartments`.
 */
class ApartmentsSearch extends apartments
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartments';
    }
    public function rules()
    {
        return [
            [['id', 'living', 'area', 'lodger'], 'integer'],
            [['adress'], 'safe'],
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
        $query = apartments::find();

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
            'living' => $this->living,
            'area' => $this->area,
            'lodger' => $this->lodger,
        ]);

        $query->andFilterWhere(['like', 'adress', $this->adress]);

        return $dataProvider;
    }
}
