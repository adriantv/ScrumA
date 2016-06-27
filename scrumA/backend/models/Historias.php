<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historias".
 *
 * @property integer $id
 * @property string $nombreHistoria
 * @property string $numeroHistoria
 * @property string $descripcionHistoria
 * @property string $pesoHistoria
 * @property string $status
 * @property integer $idSprint
 *
 * @property Integrantes[] $integrantes
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
            [['nombreHistoria', 'numeroHistoria', 'pesoHistoria', 'status'], 'required'],
            [['descripcionHistoria'], 'string'],
            [['idSprint'], 'integer'],
            [['nombreHistoria', 'numeroHistoria', 'pesoHistoria', 'status'], 'string', 'max' => 255],
            [['nombreHistoria'], 'unique'],
            [['numeroHistoria'], 'unique'],
            ['numeroHistoria','integer','message'=>'error solo se admiten numeros enteros'],
            ['pesoHistoria','integer','message'=>'error solo se admiten numeros enteros'],
            [['pesoHistoria'], 'unique'],
            [['status'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombreHistoria' => Yii::t('app', 'Nombre de la Historia'),
            'numeroHistoria' => Yii::t('app', 'Numero de la Historia'),
            'descripcionHistoria' => Yii::t('app', 'Descripcion de laHistoria'),
            'pesoHistoria' => Yii::t('app', 'Peso de la Historia'),
            'status' => Yii::t('app', 'Status'),
            'idSprint' => Yii::t('app', 'agregar un encargado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrantes()
    {
        return $this->hasMany(Integrantes::className(), ['idHistorias' => 'id']);
    }
}
