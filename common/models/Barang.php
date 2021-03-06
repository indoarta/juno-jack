<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "barang".
 *
 * @property integer $id
 * @property string $nama
 * @property string $kode
 * @property integer $warna
 * @property string $review
 * @property integer $kelompok
 * @property integer $harga_beli
 * @property integer $harga_normal
 * @property integer $harga_promo
 * @property integer $kategori_id
 * @property string $overview_1
 * @property string $overview_2
 *
 * @property Warna $warna0
 * @property BarangStok[] $barangStoks
 * @property BarangThumbnail[] $barangThumbnails
 * @property KeranjangDetail[] $keranjangDetails
 * @property Pembelian[] $pembelians
 * @property Penjualan[] $penjualans
 */
class Barang extends ActiveRecord
{
    public $array_warna;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kode', 'warna', 'kelompok', 'harga_beli', 'harga_normal', 'harga_promo', 'kategori_id', 'overview_2', 'array_warna'], 'required'],
            [['warna', 'kelompok', 'harga_beli', 'harga_normal', 'harga_promo', 'kategori_id'], 'integer'],
            [['review'], 'number'],
            [['overview_1', 'overview_2'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['kode'], 'string', 'max' => 20],
            [['nama'], 'unique'],
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
            'kode' => 'Kode',
            'warna' => 'Warna',
            'review' => 'Review',
            'kelompok' => 'Kelompok',
            'harga_beli' => 'Harga Beli',
            'harga_normal' => 'Harga Normal',
            'harga_promo' => 'Harga Promo',
            'kategori_id' => 'Kategori',
            'overview_1' => 'Overview #1',
            'overview_2' => 'Overview #2',

            'barangThumbnailsLink' => 'Thumbnails',
            'array_warna' => 'Warna pilihan',
        ];
    }


    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'kategori_id']);
    }
    
    public function getUrl()
    {
        $url = Url::find()->where(["jenis"=>"b", "data_id"=>$this->id])->one();
        return ["/".$url->url];
    }
    
    public function getHarga()
    {
        if($this->harga_promo == NULL) return $this->harga_normal;
        else return $this->harga_promo;
    }

    /**
     * @return ActiveQuery
     */
    public function getBarangWarna()
    {
        return $this->hasOne(Warna::className(), ['id' => 'warna']);
    }

    public function getWarnaRgb()
    {
        $warna_lains = Barang::find()->where(['kelompok' => $this->kelompok])->all();
        $daftar_warna = '';
        foreach ($warna_lains as $warna) {
            $daftar_warna .= '<span class="label" style="background: #'.$warna->barangWarna->rgb.';">&nbsp;</span> ';
        }
        return $daftar_warna;
    }

    /**
     * @return ActiveQuery
     */
    public function getBarangStoks()
    {
        return $this->hasMany(BarangStok::className(), ['barang_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getBarangThumbnails()
    {
        return $this->hasMany(BarangThumbnail::className(), ['barang_id' => 'id']);
    }

    public function getBarangThumbnailsCount()
    {
        return count($this->barangThumbnails);
    }

    public function getBarangThumbnailsLink()
    {
        return count($this->barangThumbnails) . ' ' . Html::a('<span class="glyphicon glyphicon-picture"></span>', ['barang-thumbnails/index', 'id' => $this->id]);
    }

    /**
     * @return ActiveQuery
     */
    public function getKeranjangDetails()
    {
        return $this->hasMany(KeranjangDetail::className(), ['barang_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['barang_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['barang_id' => 'id']);
    }
    
    /**
     * Mendapatkan thumbnail pertama dari detail tabel thumbnail
     */
    public function getThumbnailUtama()
    {
        $thumbnail = BarangThumbnail::find()->where(['barang_id' => $this->id])->one();
        if (count($thumbnail) > 0) {
            return \Yii::getAlias('@frontend_url').'/uploads/thumbnails/'.$thumbnail->url;
        } else {
            return \yii\helpers\Url::to(['images/barang/kasur.jpg']);
        }
    }
    /**
     * Mendapatkan thumbnail kedua dari detail tabel thumbnail
     */
    public function getThumbnailAlternatif()
    {
        $thumbnail = BarangThumbnail::find()->where(['barang_id' => $this->id])->one();
        if (count($thumbnail) > 0) {
            return \Yii::getAlias('@frontend_url').'/uploads/thumbnails/'.$thumbnail->url;
        } else {
            return \yii\helpers\Url::to(['images/barang/kasur.jpg']);
        }
    }
}
