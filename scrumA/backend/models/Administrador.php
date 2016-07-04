<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administrador".
 *
 * @property integer $Id
 * @property string $NombreCompleto
 * @property string $Telefono
 * @property integer $Id_user
 *
 * @property User $idUser
 */
class Administrador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'administrador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreCompleto', 'Telefono', 'Id_user'], 'required'],
            [['Id_user'], 'integer'],
            [['NombreCompleto'], 'string', 'max' => 100],
            [['Telefono'], 'string', 'max' => 10],
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
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'Id_user']);
    }
}
