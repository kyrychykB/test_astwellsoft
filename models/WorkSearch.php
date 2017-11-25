<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Work;

/**
 * WorkSearch represents the model behind the search form about `app\models\Work`.
 */

class WorkSearch extends Work
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shop_id', 'status'], 'integer'],
            [['date', 'time_open', 'time_close' ], 'safe'],
        ];
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
        $query = Work::find();

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
            'shop_id' => $this->shop_id,
            'status' => $this->status,
            'date' => $this->date,
        ]);

        if($this->status == Work::STATUS_OPEN) {
            $query->andWhere(
                'time_open <= :time_open' , [':time_open' => $this->time_open]
            );
            $query->andWhere(
                'time_close >= :time_close' , [':time_close' => $this->time_close]
            );
        }

        return $dataProvider;
    }
}
