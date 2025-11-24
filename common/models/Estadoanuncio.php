<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estadoanuncio".
 *
 * @property int $id
 * @property string $estado
 * @property string $descricao
 *
 * @property Anuncio[] $anuncios
 */
class Estadoanuncio extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estadoanuncio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado', 'descricao'], 'required'],
            [['estado'], 'string', 'max' => 45],
            [['descricao'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado' => 'Estado',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[Anuncios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncio::class, ['estadoanuncioid' => 'id']);
    }

}
