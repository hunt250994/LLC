<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lliso */

$this->title = $model->iso_code;
$this->params['breadcrumbs'][] = ['label' => 'Llisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lliso-view">

  

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iso_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iso_id], [
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
            //'iso_id',
            'iso_code',
            'created_at',
            //'is_deleted',
        ],
    ]) ?>

</div>
