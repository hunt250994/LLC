<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */

$this->title = 'Update Certificate: ' . $model->certificate_code;
$this->params['breadcrumbs'][] = ['label' => 'Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->certificate_code, 'url' => ['view', 'id' => $model->certificate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="certificate-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
