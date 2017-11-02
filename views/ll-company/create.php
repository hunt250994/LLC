<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LlCompany */

$this->title = 'Create Ll Company';
$this->params['breadcrumbs'][] = ['label' => 'Ll Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ll-company-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
