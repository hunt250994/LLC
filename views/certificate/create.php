<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Certificate */

$this->title = 'Create Certificate';
$this->params['breadcrumbs'][] = ['label' => 'Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
