<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "integrantes".
 *
 * @property integer $Id
 * @property string $nombre
 * @property string $correo
 * @property string $telefono
 * @property string $contrasenia
 * @property integer $idHistorias
 *
 * @property Historias $idHistorias0
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
            [['nombre', 'correo', 'telefono', 'contrasenia'], 'required'],
            [['correo'],'email'],
            ['telefono','integer','message'=>'error solo se admiten numeros enteros'],
            [['idHistorias'], 'integer'],
            [['nombre', 'correo', 'telefono', 'contrasenia'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
            [['contrasenia'], 'unique'],
            [['idHistorias'], 'exist', 'skipOnError' => true, 'targetClass' => Historias::className(), 'targetAttribute' => ['idHistorias' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'correo' => Yii::t('app', 'Correo'),
            'telefono' => Yii::t('app', 'Telefono'),
            'contrasenia' => Yii::t('app', 'Contrasenia'),
            'idHistorias' => Yii::t('app', 'Id Historias'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdHistorias0()
    {
        return $this->hasOne(Historias::className(), ['id' => 'idHistorias']);
    }
}
