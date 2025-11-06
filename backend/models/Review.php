<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $classificacao
 * @property int $userprofileid
 * @property int $anuncioid
 *
 * @property Anuncio $anuncio
 * @property Userprofile $userprofile
 */
class Review extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classificacao', 'userprofileid', 'anuncioid'], 'required'],
            [['classificacao', 'userprofileid', 'anuncioid'], 'integer'],
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
            'classificacao' => 'Classificacao',
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
