<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anuncio".
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property float $preco
 * @property string $tipologia
 * @property int $area
 * @property string $caracteristicasadicionais
 * @property string $datapublicacao
 * @property string $dataexpiracao
 * @property int $userprofileid
 * @property int $categoriaid
 * @property int $localizacaoid
 * @property int $estadoanuncioid
 *
 * @property Categoria $categoria
 * @property Comentario[] $comentarios
 * @property Denuncia[] $denuncias
 * @property Estadoanuncio $estadoanuncio
 * @property Favorito[] $favoritos
 * @property Foto[] $fotos
 * @property Localizacao $localizacao
 * @property Review[] $reviews
 * @property Stats[] $stats
 * @property Userprofile $userprofile
 * @property Visita[] $visitas
 */
class Anuncio extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anuncio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descricao', 'preco', 'tipologia', 'area', 'caracteristicasadicionais', 'datapublicacao', 'dataexpiracao', 'userprofileid', 'categoriaid', 'localizacaoid', 'estadoanuncioid'], 'required'],
            [['preco'], 'number'],
            [['area', 'userprofileid', 'categoriaid', 'localizacaoid', 'estadoanuncioid'], 'integer'],
            [['datapublicacao', 'dataexpiracao'], 'safe'],
            [['titulo', 'descricao', 'tipologia'], 'string', 'max' => 45],
            [['caracteristicasadicionais'], 'string', 'max' => 100],
            [['categoriaid'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['categoriaid' => 'id']],
            [['estadoanuncioid'], 'exist', 'skipOnError' => true, 'targetClass' => Estadoanuncio::class, 'targetAttribute' => ['estadoanuncioid' => 'id']],
            [['localizacaoid'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['localizacaoid' => 'id']],
            [['userprofileid'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::class, 'targetAttribute' => ['userprofileid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
            'tipologia' => 'Tipologia',
            'area' => 'Area',
            'caracteristicasadicionais' => 'Caracteristicasadicionais',
            'datapublicacao' => 'Datapublicacao',
            'dataexpiracao' => 'Dataexpiracao',
            'userprofileid' => 'Userprofileid',
            'categoriaid' => 'Categoriaid',
            'localizacaoid' => 'Localizacaoid',
            'estadoanuncioid' => 'Estadoanuncioid',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::class, ['id' => 'categoriaid']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::class, ['anuncioid' => 'id']);
    }

    /**
     * Gets query for [[Denuncias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDenuncias()
    {
        return $this->hasMany(Denuncia::class, ['anuncioid' => 'id']);
    }

    /**
     * Gets query for [[Estadoanuncio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoanuncio()
    {
        return $this->hasOne(Estadoanuncio::class, ['id' => 'estadoanuncioid']);
    }

    /**
     * Gets query for [[Favoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favorito::class, ['anuncioid' => 'id']);
    }

    public function getIsFavorito()
    {
        if (Yii::$app->user->isGuest) return false;

        $userprofile = Userprofile::find()
            ->where(['user_id' => Yii::$app->user->identity->id])
            ->one();

        return Favorito::find()
            ->where([
                'userprofileid' => $userprofile->id,
                'anuncioid' => $this->id
            ])
            ->exists();
    }


    /**
     * Gets query for [[Fotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Foto::class, ['anuncioid' => 'id']);
    }

    /**
     * Gets query for [[Localizacao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacao()
    {
        return $this->hasOne(Localizacao::class, ['id' => 'localizacaoid']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['anuncioid' => 'id']);
    }

    /**
     * Gets query for [[Stats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStats()
    {
        return $this->hasMany(Stats::class, ['anuncioid' => 'id']);
    }

    /**
     * Gets query for [[Userprofile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserprofile()
    {
        return $this->hasOne(Userprofile::class, ['id' => 'userprofileid']);
    }

    /**
     * Gets query for [[Visitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVisitas()
    {
        return $this->hasMany(Visita::class, ['anuncioid' => 'id']);
    }

    const ESTADO_ATIVO = 1;
    const ESTADO_DESATIVADO = 2;
    const ESTADO_EXPIRADO = 3;

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            // Se é criação nova
            if ($insert) {
                $this->datapublicacao = date('Y-m-d H:i:s'); // hoje
                $this->dataexpiracao = date('Y-m-d H:i:s', strtotime('+3 months'));
                $this->estadoanuncioid = self::ESTADO_ATIVO; // novo anúncio fica ativo
            } else {
                // Se já existe, verifica se já passou a data de expiração
                if (strtotime($this->dataexpiracao) < time()) {
                    $this->estadoanuncioid = self::ESTADO_EXPIRADO;
                }
            }

            return true;
        }
        return false;
    }

}
