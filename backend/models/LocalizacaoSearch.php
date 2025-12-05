<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Localizacao;

/**
 * LocalizacaoSearch represents the model behind the search form of `backend\models\Localizacao`.
 */
class LocalizacaoSearch extends Localizacao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'porta', 'escolas', 'transportes', 'supermercados'], 'integer'],
            [['distrito', 'concelho', 'freguesia', 'moradacompleta'], 'safe'],
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
        $query = Localizacao::find();

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
            'porta' => $this->porta,
            'escolas' => $this->escolas,
            'transportes' => $this->transportes,
            'supermercados' => $this->supermercados,
        ]);

        $query->andFilterWhere(['like', 'distrito', $this->distrito])
            ->andFilterWhere(['like', 'concelho', $this->concelho])
            ->andFilterWhere(['like', 'freguesia', $this->freguesia])
            ->andFilterWhere(['like', 'moradacompleta', $this->moradacompleta]);

        return $dataProvider;
    }
}
