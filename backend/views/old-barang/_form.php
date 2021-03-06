<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JenisKegiatan;
use kartik\file\FileInput;
use kartik\widgets\DateTimePicker;

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

    <?= $form->field($model, 'warna')->dropDownList(Warna::getWarnaList()) ?>

    <?php //= $form->field($model, 'status')->dropDownList(['1' => 'Selesai', '0' => 'Sedang Berlangsung']) ?>

    <?= $form->field($model, 'review')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'kelompok')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'harga_beli')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'harga_normal')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'harga_promo')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'kategori_id')->dropDownList(Kategori::getKategoriList()) ?>

    <?= $form->field($model, 'overview_1')->textArea() ?>

    <?= $form->field($model, 'overview_2')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
