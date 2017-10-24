<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "detail_mahasiswa".
 *
 * @property integer $id
 * @property integer $id_mhs
 * @property string $nama
 * @property integer $id_jurusan
 * @property integer $id_jenis_kelamin
 * @property string $ipk
 * @property string $penghasilan_ortu
 * @property string $jml_tanggungan
 * @property integer $id_semester
 * @property string $usia
 */
class DetailMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_mahasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mhs', 'nama', 'id_jurusan', 'id_jenis_kelamin', 'ipk', 'penghasilan_ortu', 'jml_tanggungan', 'id_semester', 'usia'], 'required'],
            [['id_mhs', 'id_jurusan', 'id_jenis_kelamin', 'id_semester'], 'integer'],
            [['ipk'], 'number'],
            [['nama', 'penghasilan_ortu', 'jml_tanggungan', 'usia'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mhs' => 'Nim',
            'nama' => 'Nama',
            'id_jurusan' => 'Jurusan',
            'id_jenis_kelamin' => 'Jenis Kelamin',
            'ipk' => 'Nilai Ipk',
            'penghasilan_ortu' => 'Penghasilan Ortu',
            'jml_tanggungan' => 'Jumlah Tanggungan',
            'id_semester' => 'Semester',
            'usia' => 'Umur',
        ];
    }
    public function getIdJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jenis_kelamin']);
    }
    public function getIdJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['id' => 'id_jurusan']);
    }
    public function getIdSemester()
    {
        return $this->hasOne(Semester::className(), ['id' => 'id_semester']);
    }

    public static function getList()
    {
        return ArrayHelper::map(DataMahasiswa::find()->all(),'id','nama');
    }
    public static function getCount()
    {
        return self::find()->count();
    }

    public function getRelationField($relation, $field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;
        } else {
            return null;
        }
    }
}
