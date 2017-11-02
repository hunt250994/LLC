<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LlCompany */

$this->title = $model->Comapny_name;
$this->params['breadcrumbs'][] = ['label' => 'Ll Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ll-company-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->company_id], [
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
            //'company_id',
            'Comapny_name',
            'company_email:email',
            'company_mobile',
            'flat_no',
            'street',
            'landmark',
            'area',
            'pincode',
            'city',
            'state',
            'country',
            'created_at',
            //'is_deleted',
        ],
    ]) ?>

</div>
