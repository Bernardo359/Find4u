<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property int $id
 * @property string $nomefoto
 * @property int|null $ordem
 * @property int $anuncioid
 *
 * @property Anuncio $anuncio
 */
class Foto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ordem'], 'default', 'value' => null],
            [['nomefoto', 'anuncioid'], 'required'],
            [['ordem', 'anuncioid'], 'integer'],
            [['nomefoto'], 'string', 'max' => 45],
            [['anuncioid'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncio::class, 'targetAttribute' => ['anuncioid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomefoto' => 'Nomefoto',
            'ordem' => 'Ordem',
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

}
