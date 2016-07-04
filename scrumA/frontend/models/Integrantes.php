<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "integrantes".
 *
 * @property integer $Id
 * @property string $NombreCompleto
 * @property string $Telefono
 * @property integer $Id_user
 *
 * @property Historias[] $historias
 * @property User $idUser
 */
class Integrantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'integrantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreCompleto', 'Telefono', 'Id_user'], 'required'],
            [['Id_user'], 'integer'],
            [['NombreCompleto', 'Telefono'], 'string', 'max' => 255],
            [['Id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'NombreCompleto' => Yii::t('app', 'Nombre Completo'),
            'Telefono' => Yii::t('app', 'Telefono'),
            'Id_user' => Yii::t('app', 'Id User'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorias()
    {
        return $this->hasMany(Historias::className(), ['Id_Integrante' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'Id_user']);
    }
}
