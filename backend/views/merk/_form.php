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
    
    <?= $form->field($model, 'gambar')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
