<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "visita".
 *
 * @property int $id
 * @property string $datahoraagenda
 * @property string $estado
 * @property string $notas
 * @property string $datacriacao
 * @property int $userprofileid
 * @property int $anuncioid
 *
 * @property Anuncio $anuncio
 * @property Userprofile $userprofile
 */
class Visita extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datahoraagenda', 'estado', 'notas', 'datacriacao', 'userprofileid', 'anuncioid'], 'required'],
            [['datahoraagenda', 'datacriacao'], 'safe'],
            [['userprofileid', 'anuncioid'], 'integer'],
            [['estado', 'notas'], 'string', 'max' => 45],
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
            'datahoraagenda' => 'Datahoraagenda',
            'estado' => 'Estado',
            'notas' => 'Notas',
            'datacriacao' => 'Datacriacao',
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
