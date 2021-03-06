<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JenisKegiatan;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use kartik\widgets\DateTimePicker;

use common\models\Barang;
use common\models\Warna;
use common\models\Kategori;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kegiatan-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => 20]) ?>

    <?php //= $form->field($model, 'warna')->dropDownList(Warna::getWarnaList()) ?>
    <?php
    // inisisasi warna pada saat update
    $array_warna = [];
    if (!$model->isNewRecord) {
        $warnas = Barang::find()->where(['kelompok' => $model->kelompok])->all();
        foreach ($warnas as $warna) {
            $array_warna[] = $warna->warna;
        }
        $model->array_warna = $array_warna;
    }
    ?>
    <?= $form->field($model, 'array_warna')->widget(Select2::classname(), [
        'data' => Warna::getWarnaList(),
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'Pilih warna', 'multiple' => true, "style"=>"width:100%"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])
    ?>
    <br>

    <?php //= $form->field($model, 'status')->dropDownList(['1' => 'Selesai', '0' => 'Sedang Berlangsung']) ?>

    <?= $form->field($model, 'harga_beli')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'harga_normal')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'harga_promo')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'kategori_id')->dropDownList(Kategori::getKategoriChild()) ?>

    <?= $form->field($model, 'overview_1')->textArea() ?>

    <?= $form->field($model, 'overview_2')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton("<i class='fa fa-save'></i> Simpan", ['class' => 'btn btn-success']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style type="text/css">
    .select2-container {
        display: inline !important;
        height: 50px !important;
        width: 100% !important;
    }
</style>