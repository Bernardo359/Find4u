<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserProfile;

/**
 * UserProfileSearch represents the model behind the search form of `common\models\UserProfile`.
 */
class UserProfileSearch extends UserProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'contacto', 'contabloqueda', 'user_id'], 'integer'],
            [['nome', 'localizacao', 'fotoperfil', 'dataregisto'], 'safe'],
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
        $query = UserProfile::find();

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
            'contacto' => $this->contacto,
            'contabloqueda' => $this->contabloqueda,
            'dataregisto' => $this->dataregisto,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'localizacao', $this->localizacao])
            ->andFilterWhere(['like', 'fotoperfil', $this->fotoperfil]);

        return $dataProvider;
    }
}
