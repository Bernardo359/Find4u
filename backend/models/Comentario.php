<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property string $comentario
 * @property string $data
 * @property int $userprofileid
 * @property int $anuncioid
 *
 * @property Anuncio $anuncio
 * @property Userprofile $userprofile
 */
class Comentario extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comentario', 'data', 'userprofileid', 'anuncioid'], 'required'],
            [['userprofileid', 'anuncioid'], 'integer'],
            [['comentario', 'data'], 'string', 'max' => 45],
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
            'comentario' => 'Comentario',
            'data' => 'Data',
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
