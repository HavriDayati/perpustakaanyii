<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailMahasiswa;

/**
 * DetailMahasiswaSearch represents the model behind the search form of `app\models\DetailMahasiswa`.
 */
class DetailMahasiswaSearch extends DetailMahasiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_mhs', 'id_jurusan', 'id_jenis_kelamin', 'id_semester'], 'integer'],
            [['nama', 'penghasilan_ortu', 'jml_tanggungan', 'usia'], 'safe'],
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
        $query = DetailMahasiswa::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_mhs' => $this->id_mhs,
            'id_jurusan' => $this->id_jurusan,
            'id_jenis_kelamin' => $this->id_jenis_kelamin,
            'ipk' => $this->ipk,
            'id_semester' => $this->id_semester,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'penghasilan_ortu', $this->penghasilan_ortu])
            ->andFilterWhere(['like', 'jml_tanggungan', $this->jml_tanggungan])
            ->andFilterWhere(['like', 'usia', $this->usia]);

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
