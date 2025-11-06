<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Foto;

/**
 * FotoSearch represents the model behind the search form of `backend\models\Foto`.
 */
class FotoSearch extends Foto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ordem', 'anuncioid'], 'integer'],
            [['nomefoto'], 'safe'],
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
        $query = Foto::find();

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
            'ordem' => $this->ordem,
            'anuncioid' => $this->anuncioid,
        ]);

        $query->andFilterWhere(['like', 'nomefoto', $this->nomefoto]);

        return $dataProvider;
    }
}
