<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kriteria;

/**
 * KriteriaSearch represents the model behind the search form of `app\models\Kriteria`.
 */
class KriteriaSearch extends Kriteria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'penghasilan_ortu', 'jml_tanggungan', 'id_semester', 'usia'], 'integer'],
            [['nama'], 'safe'],
            [['ipk'], 'number'],
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

    public function getQuerySearch($params)
    {
        $query = Kriteria::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ipk' => $this->ipk,
            'penghasilan_ortu' => $this->penghasilan_ortu,
            'jml_tanggungan' => $this->jml_tanggungan,
            'id_semester' => $this->id_semester,
            'usia' => $this->usia,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }


}
