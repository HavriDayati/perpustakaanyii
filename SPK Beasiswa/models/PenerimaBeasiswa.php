<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penerima_beasiswa".
 *
 * @property integer $id
 * @property integer $id_mhs
 * @property integer $id_semester
 * @property string $hasil
 * @property string $ket
 */
class PenerimaBeasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerima_beasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mhs', 'id_semester', 'hasil', 'ket'], 'required'],
            [['id_mhs', 'id_semester'], 'integer'],
            [['hasil', 'ket'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_mhs' => 'Nim',
            'id_semester' => 'Semester',
            'hasil' => 'Hasil',
            'ket' => 'Ket',
        ];
    }
}
