<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "jenis_kelamin".
 *
 * @property integer $id
 * @property string $nama
 */
class JenisKelamin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_kelamin';
    }

    public static function getList()
    {
        return ArrayHelper::map(JenisKelamin::find()->all(),'id','nama');
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'integer'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Jenis Kelamin',
        ];
    }
}
