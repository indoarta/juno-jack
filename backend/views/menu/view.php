<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = $model->halaman->judul;
$this->params['breadcrumbs'][] = ['label' => $letakMenu->nama, 'url' => ['index', 'lmid' => $letakMenu->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6"><h2><?= Html::encode($this->title) ?></h2></div>
            <div class="col-md-6" style="text-align: right;"><br>
                <?= Html::a('Update', ['update', 'lmid' => $letakMenu->id, 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['delete', 'lmid' => $letakMenu->id, 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'letakMenu.nama',
                'halaman.judul',
                'urutan',
            ],
        ]) ?>                   


    </div>
</div>