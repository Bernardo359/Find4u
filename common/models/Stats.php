<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stats".
 *
 * @property int $id
 * @property int $userprofileid
 * @property int $anuncioid
 *
 * @property Anuncio $anuncio
 * @property Userprofile $userprofile
 */
class Stats extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userprofileid', 'anuncioid'], 'required'],
            [['userprofileid', 'anuncioid'], 'integer'],
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
