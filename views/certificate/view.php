<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */

$this->title = $model->certificate_code;
$this->params['breadcrumbs'][] = ['label' => 'Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->certificate_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->certificate_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'certificate_id',
            'certificate_code',
            'company.Comapny_name',
            'iso.iso_code',
            'ea_code',
            'services',
            'from_date',
            'to_date',
            'reminder_date',
            'created_at',
            //'is_deleted',
            //'is_published',
        ],
    ]) ?>

</div>
