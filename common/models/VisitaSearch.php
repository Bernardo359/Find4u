<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Visita;

/**
 * VisitaSearch represents the model behind the search form of `common\models\Visita`.
 */
class VisitaSearch extends Visita
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userprofileid', 'anuncioid'], 'integer'],
            [['datahoraagenda', 'estado', 'notas', 'datacriacao'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Visita::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'datahoraagenda' => $this->datahoraagenda,
            'datacriacao' => $this->datacriacao,
            'userprofileid' => $this->userprofileid,
            'anuncioid' => $this->anuncioid,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'notas', $this->notas]);

        return $dataProvider;
    }
}
