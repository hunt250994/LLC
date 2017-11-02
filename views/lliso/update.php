<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lliso */

$this->title = 'Update Lliso: ' . $model->iso_code;
$this->params['breadcrumbs'][] = ['label' => 'Llisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iso_code, 'url' => ['view', 'id' => $model->iso_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lliso-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
