<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localizacao".
 *
 * @property int $id
 * @property string $distrito
 * @property string $concelho
 * @property string $freguesia
 * @property string $moradacompleta
 * @property int $porta
 * @property int $escolas
 * @property int $transportes
 * @property int $supermercados
 *
 * @property Anuncio[] $anuncios
 */
class Localizacao extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localizacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['distrito', 'concelho', 'freguesia', 'moradacompleta', 'porta', 'escolas', 'transportes', 'supermercados'], 'required'],
            [['porta', 'escolas', 'transportes', 'supermercados'], 'integer'],
            [['distrito', 'concelho', 'freguesia', 'moradacompleta'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'distrito' => 'Distrito',
            'concelho' => 'Concelho',
            'freguesia' => 'Freguesia',
            'moradacompleta' => 'Moradacompleta',
            'porta' => 'Porta',
            'escolas' => 'Escolas',
            'transportes' => 'Transportes',
            'supermercados' => 'Supermercados',
        ];
    }

    /**
     * Gets query for [[Anuncios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncio::class, ['localizacaoid' => 'id']);
    }

}
