<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sprints".
 *
 * @property integer $Id
 * @property string $NombreSprint
 * @property string $DescripcionSprint
 * @property string $F_inicio
 * @property string $F_final
 * @property string $Status
 *
 * @property Historias[] $historias
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
            [['NombreSprint', 'F_inicio', 'F_final', 'Status'], 'required'],
            [['DescripcionSprint'], 'string'],
            [['F_inicio', 'F_final'], 'safe'],
            [['NumeroDias'], 'integer'],
            [['NombreSprint', 'Status'], 'string', 'max' => 255],
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
            'F_inicio' => Yii::t('app', 'F Inicio'),
            'F_final' => Yii::t('app', 'F Final'),
            'Status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorias()
    {
        return $this->hasMany(Historias::className(), ['Id_Sprints' => 'Id']);
    }
}
