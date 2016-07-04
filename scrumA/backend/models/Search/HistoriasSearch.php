<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Historias;

/**
 * HistoriasSearch represents the model behind the search form about `app\models\Historias`.
 */
class HistoriasSearch extends Historias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Id_Integrante'], 'integer'],
            [['NombreHistoria', 'NumeroHistoria', 'DescripcionHistoria', 'PesoHistoria', 'Status'], 'safe'],
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
        $query = Historias::find();

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
            'Id_Integrante' => $this->Id_Integrante,
        ]);

        $query->andFilterWhere(['like', 'NombreHistoria', $this->NombreHistoria])
            ->andFilterWhere(['like', 'NumeroHistoria', $this->NumeroHistoria])
            ->andFilterWhere(['like', 'DescripcionHistoria', $this->DescripcionHistoria])
            ->andFilterWhere(['like', 'PesoHistoria', $this->PesoHistoria])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
