<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historias".
 *
 * @property integer $Id
 * @property string $NombreHistoria
 * @property integer $NumeroHistoria
 * @property string $DescripcionHistoria
 * @property integer $PesoHistoria
 * @property integer $Status
 * @property integer $Id_Integrante
 *
 * @property Integrantes $idIntegrante
 * @property Sprints[] $sprints
 */
class Historias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreHistoria', 'NumeroHistoria', 'PesoHistoria', 'Status', 'Id_Integrante'], 'required'],
            [['NumeroHistoria', 'PesoHistoria', 'Status', 'Id_Integrante'], 'integer'],
            [['DescripcionHistoria'], 'string'],
            [['NombreHistoria'], 'string', 'max' => 255],
            [['NumeroHistoria'], 'unique'],
            [['Id_Integrante'], 'exist', 'skipOnError' => true, 'targetClass' => Integrantes::className(), 'targetAttribute' => ['Id_Integrante' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'NombreHistoria' => Yii::t('app', 'Nombre Historia'),
            'NumeroHistoria' => Yii::t('app', 'Numero Historia'),
            'DescripcionHistoria' => Yii::t('app', 'Descripcion Historia'),
            'PesoHistoria' => Yii::t('app', 'Peso Historia'),
            'Status' => Yii::t('app', 'Status'),
            'Id_Integrante' => Yii::t('app', 'Id  Integrante'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdIntegrante()
    {
        return $this->hasOne(Integrantes::className(), ['Id' => 'Id_Integrante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSprints()
    {
        return $this->hasMany(Sprints::className(), ['Id_Historia' => 'Id']);
    }
}
