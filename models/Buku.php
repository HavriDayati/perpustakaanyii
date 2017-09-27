<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\Helpers\ArrayHelper;
use app\models\Penulis;
use app\models\Peminjaman;
use yii\helpers\Html;
/**
 * This is the model class for table "buku".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $id_jenis
 * @property string $cover
 * @property integer $id_penulis
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis', 'id_penulis'], 'integer'],
            [['id_jenis'], 'string', 'max' => 33],
            [['id_penulis'], 'required'],
            [['nama', 'cover'], 'string', 'max' => 255],
            [['id_penulis'], 'string', 'max' =>40],
            [['id_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['id_jenis' => 'id']],
            [['id_penulis'], 'exist', 'skipOnError' => true, 'targetClass' => Penulis::className(), 'targetAttribute' => ['id_penulis' => 'id']],
        ];
    }
        

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'id_jenis' => 'Jenis Buku',
            'cover' => 'Cover',
            'id_penulis' => 'Penulis',
        ];
    }
     public static function getGrafikPerPenulis()
    {
        $chart = null;

        foreach(Penulis::find()->all() as $data)
        {
            $chart .= '{"label":"'.$data->nama.'","value":"'.$data->getCountGrafik().'"},';
        }
        return $chart;
    }    
        public function getCountGrafikBuku()

        {
            return Peminjaman::find()
            ->andWhere(['id_buku' => $this->id])
            ->count();
        }

    public function getIdJenis()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'id_jenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPenulis()
    {
        return $this->hasOne(Penulis::className(), ['id' => 'id_penulis']);
    }

    //cara pertama pake fungsi getRelationField
    public function getRelationField($relation, $field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;
        } else {
            return null;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['id_buku' => 'id']);
    }
    
    public static function getList()
    {
        return ArrayHelper::map(Buku::find()->all(),'id','nama');
    }
    public static function getCount()
    {
        return self::find()->count();
    }
    public function getGambar($htmlOptions=[])
    {
        //jika file ada dalam direktori
        if($this->cover == null && ! file_exists('@web/uploads/'.$this->cover)){
            return Html::img('@web/images/Basis Data.jpg',$htmlOptions);
        } else {
            return Html::img('@web/uploads/'. $this->cover,$htmlOptions);
        }
    }
}