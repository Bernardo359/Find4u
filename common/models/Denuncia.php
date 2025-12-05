<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "denuncia".
 *
 * @property int $id
 * @property string $motivo
 * @property string $descricao
 * @property string $estado
 * @property string $datadenuncia
 * @property int $userprofileid
 * @property int $anuncioid
 *
 * @property Anuncio $anuncio
 * @property Userprofile $userprofile
 */
class Denuncia extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'denuncia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['motivo', 'descricao', 'estado', 'datadenuncia', 'userprofileid', 'anuncioid'], 'required'],
            [['datadenuncia'], 'safe'],
            [['userprofileid', 'anuncioid'], 'integer'],
            [['motivo', 'estado'], 'string', 'max' => 45],
            [['descricao'], 'string', 'max' => 100],
            [['anuncioid'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncio::class, 'targetAttribute' => ['anuncioid' => 'id']],
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
            'motivo' => 'Motivo',
            'descricao' => 'Descricao',
            'estado' => 'Estado',
            'datadenuncia' => 'Datadenuncia',
            'userprofileid' => 'Userprofileid',
            'anuncioid' => 'Anuncioid',
        ];
    }

    /**
     * Gets query for [[Anuncio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncio()
    {
        return $this->hasOne(Anuncio::class, ['id' => 'anuncioid']);
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

}
