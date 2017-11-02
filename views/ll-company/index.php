<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LlCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ll Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ll-company-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ll Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'company_id',
            'Comapny_name',
            'company_email:email',
            'company_mobile',
            'flat_no',
            // 'street',
            // 'landmark',
            // 'area',
            // 'pincode',
            // 'city',
            // 'state',
            // 'country',
            'created_at',
            // 'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
