 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\helper\AppHelper;
use dosamigos\datepicker\DatePicker;
use app\models\Certificate;




/* @var $this yii\web\View */
/* @var $model app\models\Certificate */
/* @var $form yii\widgets\ActiveForm */
$maxId = Certificate::find()->select('certificate_id')->orderBy('certificate_id DESC')->one();
if (empty($maxId)) {
    $cer_code = '91' . +1;
} else {
    $cer_code = '91' . $maxId->certificate_id + 1;
}
?>

<div id="background" style=" width: 720px; height: 1018px;">
                    <div id="Rectangle1" style="width: 722px; height: 1021px;"><img src="<?= yii\helpers\BaseUrl::home() ?>images/Rectangle1.png"></div>
                    <div id="VectorSmartObject" style=" width: 868px; height: 1186px;"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/VectorSmartObject.png"></div>
                    <div id="VectorSmartObject_0" style="width: 190px; height: 1018px;"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/VectorSmartObject_0.png"></div>
                    <div id="VectorSmartObject_1" style="width: 49px; height: 99px;"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/VectorSmartObject_1.png"></div>
                    <div id="CERTIFICATE" style="width: 325px; height: 33px;"><img src="<?= yii\helpers\BaseUrl::home() ?>images/CERTIFICATE.png"></div>
                    <div id="No910551" style="width: 109px; height: 15px;">
                        <p class="certificate_num" id="certificate_num">No. <?= $cer_code ?></p>
                    </div>
                    <div id="Thisistocertifythatt" style=" width: 327px; height: 13px;"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/Thisistocertifythatt.png"></div>
                    <div id="MSIntegratedInformat" style=" width: 351px; height: 80px;">
                        <img src="<?php yii\helpers\BaseUrl::home() ?>images/MSIntegratedInformat.png">
                        <h5 id="company-name" style="font-size: 20px; font-family: 'Arial'; color: rgb(35, 75, 149); line-height: 1; left: -215.951px; top: 225.615px; font-weight: 700; width: 500px;" class="company_name">FUCK</h5>
                        <p id="address" class="company_address"></p>
                    </div>
                    <div id="hasbeenassessedandfo"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/hasbeenassessedandfo.png"></div>
                    <div id="ISO90012015">
                        <p id="iso" class="iso">
                        </p>
                    </div>

                    <div id="applicableto"><img src="images/applicableto.png"></div>
                    <div id="ProvidingInformation">
                        <p id="service" class="service"></p>
                    </div>
                    <div id="EACode29">

                        <p id="ea_code" class="ea_code"></p>
                    </div>
                    <div id="Thecertificatehasbee"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/Thecertificatehasbee.png"></div>
                    <div id="ApprovedbyPrinted"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/ApprovedbyPrinted.png"></div>
                    <div id="Layer1"><img src="<?= yii\helpers\BaseUrl::home() ?>images/Layer1.png"></div>
                    <div id="Layer2"><img src="<?= yii\helpers\BaseUrl::home() ?>images/Layer2.png"></div>
                    <div id="<?= yii\helpers\BaseUrl::home() ?>LLCCertificationCzec"><img src="images/LLCCertificationCzec.png"></div>
                </div>
            