<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CertificateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Certificates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Certificate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'certificate_id',
            'certificate_code',
            //'company_id',
            [
            'attribute' => 'company_id',
            'value' => 'company.Comapny_name',
            ],
            //'iso_id',
            [
            'attribute' => 'iso_id',
            'value' => 'iso.iso_code',
            ],
            'ea_code',
            // 'services',
            'from_date',
            'to_date',
            // 'reminder_date',
            'created_at',
            // 'is_deleted',
            // 'is_published',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
