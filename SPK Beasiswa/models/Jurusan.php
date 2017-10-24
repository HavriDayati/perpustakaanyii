<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;



/**
 * This is the model class for table "jurusan".
 *
 * @property integer $id
 * @property string $nama
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurusan';
    }


    public static function getList()
    {
        return ArrayHelper::map(Jurusan::find()->all(),'id','nama');
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
            'nama' => 'Jurusan',
        ];
    }
}
