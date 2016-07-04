<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sprints".
 *
 * @property integer $Id
 * @property string $NombreSprint
 * @property string $DescripcionSprint
 * @property string $Historias
 * @property string $F_inicio
 * @property string $F_final
 * @property integer $NumeroDias
 * @property string $Status
 * @property integer $Id_Historia
 *
 * @property Historias $idHistoria
 */
class Sprints extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sprints';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreSprint', 'Historias', 'F_inicio', 'F_final', 'NumeroDias', 'Status', 'Id_Historia'], 'required'],
            [['DescripcionSprint'], 'string'],
            [['F_inicio', 'F_final'], 'safe'],
            [['NumeroDias', 'Id_Historia'], 'integer'],
            [['NombreSprint', 'Historias', 'Status'], 'string', 'max' => 255],
            [['Id_Historia'], 'exist', 'skipOnError' => true, 'targetClass' => Historias::className(), 'targetAttribute' => ['Id_Historia' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'NombreSprint' => Yii::t('app', 'Nombre Sprint'),
            'DescripcionSprint' => Yii::t('app', 'Descripcion Sprint'),
            'Historias' => Yii::t('app', 'Historias'),
            'F_inicio' => Yii::t('app', 'F Inicio'),
            'F_final' => Yii::t('app', 'F Final'),
            'NumeroDias' => Yii::t('app', 'Numero Dias'),
            'Status' => Yii::t('app', 'Status'),
            'Id_Historia' => Yii::t('app', 'Id  Historia'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdHistoria()
    {
        return $this->hasOne(Historias::className(), ['Id' => 'Id_Historia']);
    }
}
