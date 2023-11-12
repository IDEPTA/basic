<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\payment;

/**
 * PaymentSearch represents the model behind the search form of `app\models\payment`.
 */
class PaymentSearch extends payment
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }
    public function rules()
    {
        return [
            [['id', 'lodger', 'service'], 'integer'],
            [['spent'], 'number'],
            [['pay_by', 'paid', 'date_payment'], 'safe'],
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
        $query = payment::find();

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
            'lodger' => $this->lodger,
            'service' => $this->service,
            'spent' => $this->spent,
            'pay_by' => $this->pay_by,
            'date_payment' => $this->date_payment,
        ]);

        $query->andFilterWhere(['like', 'paid', $this->paid]);

        return $dataProvider;
    }
}
