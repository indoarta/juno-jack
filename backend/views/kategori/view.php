<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6"><h2><?= Html::encode($this->title) ?></h2></div>
            <div class="col-md-6" style="text-align: right;"><br>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'nama',
                        ['attribute' => 'parentString', 'label' => 'Parent'],
                        'tingkat',
                        'jumlah_barang',
                        
                        
                    ],
                ]) ?>                
            </div>
            <div class="col-md-3">
                <?php
                if ($model->gambar == '') {
                    echo '<div class="alert alert-danger">Tidak ada gambar</div>';
                } else {
                    echo '
                    <div class="thumbnail">
                        '. Html::img('uploads/kategori/'.$model->gambar).'
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</div>