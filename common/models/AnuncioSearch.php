<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Anuncio;
use common\models\Userprofile;
use Yii;

/**
 * AnuncioSearch represents the model behind the search form of `common\models\Anuncio`.
 */
class AnuncioSearch extends Anuncio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'area', 'userprofileid', 'categoriaid', 'localizacaoid', 'estadoanuncioid'], 'integer'],
            [['titulo', 'descricao', 'tipologia', 'caracteristicasadicionais', 'datapublicacao', 'dataexpiracao'], 'safe'],
            [['preco'], 'number'],
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
     * @param int|null $userProfileId ID do userprofile a filtrar (se null, filtra pelo utilizador logado)
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null, $userProfileId = null)
    {
        $query = Anuncio::find();

        $userProfile = Userprofile::findOne(['user_id' => Yii::$app->user->id]);
        $userProfileId = $userProfile->id;

        // Aplicar filtro de userProfileId se existir
        if ($userProfileId !== null) {
            $query->andWhere(['userprofileid' => $userProfileId]);
        }

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
            'preco' => $this->preco,
            'area' => $this->area,
            'datapublicacao' => $this->datapublicacao,
            'dataexpiracao' => $this->dataexpiracao,
            'userprofileid' => $this->userprofileid,
            'categoriaid' => $this->categoriaid,
            'localizacaoid' => $this->localizacaoid,
            'estadoanuncioid' => $this->estadoanuncioid,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'tipologia', $this->tipologia])
            ->andFilterWhere(['like', 'caracteristicasadicionais', $this->caracteristicasadicionais]);

        return $dataProvider;
    }
}