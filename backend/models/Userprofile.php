<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "userprofile".
 *
 * @property int $id
 * @property string $nome
 * @property int $contacto
 * @property string $fotoperfil
 * @property int $contabloqueda
 * @property string $dataregisto
 * @property int $user_id
 *
 * @property Anuncio[] $anuncios
 * @property Comentario[] $comentarios
 * @property Denuncia[] $denuncias
 * @property Favorito[] $favoritos
 * @property Review[] $reviews
 * @property Stats[] $stats
 * @property User $user
 * @property Visita[] $visitas
 */
class Userprofile extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'contacto', 'contabloqueda', 'dataregisto', 'user_id'], 'required'],
            ['fotoperfil', 'safe'],
            [['contacto', 'contabloqueda', 'user_id'], 'integer'],
            [['dataregisto'], 'safe'],
            [['nome', 'fotoperfil'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'contacto' => 'Contacto',
            'fotoperfil' => 'Fotoperfil',
            'contabloqueda' => 'Contabloqueda',
            'dataregisto' => 'Dataregisto',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Anuncios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncio::class, ['userprofileid' => 'id']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::class, ['userprofileid' => 'id']);
    }

    /**
     * Gets query for [[Denuncias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDenuncias()
    {
        return $this->hasMany(Denuncia::class, ['userprofileid' => 'id']);
    }

    /**
     * Gets query for [[Favoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favorito::class, ['userprofileid' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['userprofileid' => 'id']);
    }

    /**
     * Gets query for [[Stats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStats()
    {
        return $this->hasMany(Stats::class, ['userprofileid' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Visitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVisitas()
    {
        return $this->hasMany(Visita::class, ['userprofileid' => 'id']);
    }
}
