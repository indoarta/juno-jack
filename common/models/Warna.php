<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "warna".
 *
 * @property integer $id
 * @property string $nama
 * @property string $rgb
 *
 * @property Barang[] $barangs
 */
class Warna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'rgb'], 'required'],
            [['nama'], 'string', 'max' => 20],
            [['rgb'], 'string', 'max' => 6]
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
            'rgb' => 'Rgb',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['warna' => 'id']);
    }
}
