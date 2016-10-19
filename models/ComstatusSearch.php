<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ComStatus;

/**
 * ComstatusSearch represents the model behind the search form about `app\models\ComStatus`.
 */
class ComstatusSearch extends ComStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_status_id'], 'integer'],
            [['com_status_name'], 'safe'],
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
        $query = ComStatus::find();

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
            'com_status_id' => $this->com_status_id,
        ]);

        $query->andFilterWhere(['like', 'com_status_name', $this->com_status_name]);

        return $dataProvider;
    }
}
