<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lliso */

$this->title = 'Create Lliso';
$this->params['breadcrumbs'][] = ['label' => 'Llisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lliso-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
