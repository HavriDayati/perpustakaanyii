<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;
use yii\helpers\Html;
/**
 * This is the model class for table "kriteria".
 *
 * @property integer $id
 * @property string $nama
 * @property string $ipk
 * @property integer $penghasilan_ortu
 * @property integer $jml_tanggungan
 * @property integer $id_semester
 * @property integer $usia
 */
class Kriteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kriteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'ipk', 'penghasilan_ortu', 'jml_tanggungan', 'id_semester', 'usia'], 'required'],
            [['ipk'], 'number'],
            [['penghasilan_ortu', 'jml_tanggungan', 'id_semester', 'usia'], 'integer'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nama' => 'Nama',
            'ipk' => 'Nilai Ipk',
            'penghasilan_ortu' => 'Penghasilan Ortu',
            'jml_tanggungan' => 'Jumlah Tanggungan',
            'id_semester' => 'Semester',
            'usia' => 'Umur',
        ];
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
}
