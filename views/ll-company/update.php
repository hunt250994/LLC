<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LlCompany */

$this->title = 'Update Ll Company: ' . $model->Comapny_name;
$this->params['breadcrumbs'][] = ['label' => 'Ll Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Comapny_name, 'url' => ['view', 'id' => $model->company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ll-company-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
