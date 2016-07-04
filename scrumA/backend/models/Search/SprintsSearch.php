<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sprints;

/**
 * SprintsSearch represents the model behind the search form about `app\models\Sprints`.
 */
class SprintsSearch extends Sprints
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Id_Historia'], 'integer'],
            [['NombreSprint', 'DescripcionSprint', 'Historias', 'F_inicio', 'F_final', 'NumeroDias', 'Status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Sprints::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
            'F_inicio' => $this->F_inicio,
            'F_final' => $this->F_final,
            'Id_Historia' => $this->Id_Historia,
        ]);

        $query->andFilterWhere(['like', 'NombreSprint', $this->NombreSprint])
            ->andFilterWhere(['like', 'DescripcionSprint', $this->DescripcionSprint])
            ->andFilterWhere(['like', 'Historias', $this->Historias])
            ->andFilterWhere(['like', 'NumeroDias', $this->NumeroDias])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
