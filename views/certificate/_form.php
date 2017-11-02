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
    $cer_code =1;
} else {
    $cer_code = $maxId->certificate_id + 1;
}
if ($maxId->certificate_id >= 0 && $maxId->certificate_id <=9)
{
    $cer_code = '91000' . $cer_code;
}
else if ($maxId->certificate_id >= 10 && $maxId->certificate_id <=99)
{
    $cer_code = '9100' . $cer_code;
} else if ($maxId->certificate_id >= 100 && $maxId->certificate_id <=999){
    $cer_code = '910' . $cer_code;
}else 
{
    $cer_code = '91' . $cer_code;
}
?>
   
    <div class="certificate-form">

        <div class="row">
            <div class="col-md-4">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'company_id')->dropDownList(AppHelper::getCompanis(),
                    ['prompt' => 'Select Company']); ?>
                <?= $form->field($model, 'iso_id')->dropDownList(AppHelper::getisocodes(),
                    ['prompt' => 'Select ISO Code']); ?>

                <?= $form->field($model, 'ea_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'services')->textArea(['maxlength' => true]) ?>

                <?= $form->field($model, 'from_date')->widget(
                    DatePicker::className(), [
                    // inline too, not bad
                    //  'inline' => true,
                    // modify template for custom rendering
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd MM yyyy'
                    ]
                ]); ?>

                <?= $form->field($model, 'to_date')->widget(
                    DatePicker::className(), [
                    // inline too, not bad
                    //  'inline' => true,
                    // modify template for custom rendering
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-MM-yyyy'
                    ]
                ]); ?>
                <?= $form->field($model, 'reminder_date')->widget(
                    DatePicker::className(), [
                    // inline too, not bad
                    //  'inline' => true,
                    // modify template for custom rendering
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-MM-yyyy'
                    ]
                ]); ?>


                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>

            

            <div class="col-md-8">
                <div id="background">
                    <div id="Rectangle1"><img src="<?= yii\helpers\BaseUrl::home() ?>images/Rectangle1.png"></div>
                    <div id="VectorSmartObject"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/VectorSmartObject.png"></div>
                    <div id="VectorSmartObject_0"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/VectorSmartObject_0.png"></div>
                    <div id="VectorSmartObject_1"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/VectorSmartObject_1.png"></div>
                    <div id="CERTIFICATE"><img src="<?= yii\helpers\BaseUrl::home() ?>images/CERTIFICATE.png"></div>
                    <div id="No910551">
                        <p class="certificate_num" id="certificate_num">No. <?= $cer_code ?></p>
                    </div>
                    <div id="Thisistocertifythatt"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/Thisistocertifythatt.png"></div>
                    <div id="MSIntegratedInformat">
                        <img src="<?php yii\helpers\BaseUrl::home() ?>images/MSIntegratedInformat.png">
                        <h5 id="company-name" class="company_name"></h5>
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
                    <div id="Thecertificatehasbee">                        
                                <p class="certificate" id="certificate">The certificate has been issued under No. <strong><?= $cer_code ?></strong> for the registration
period from 9th March 2017 to 8th March 2020.</p>
                            </div>
                    <div id="ApprovedbyPrinted"><img
                                src="<?= yii\helpers\BaseUrl::home() ?>images/ApprovedbyPrinted.png"></div>
                    <div id="Layer1"><img src="<?= yii\helpers\BaseUrl::home() ?>images/Layer1.png"></div>
                    <div id="Layer2"><img src="<?= yii\helpers\BaseUrl::home() ?>images/Layer2.png"></div>
                    <div id="LLCCertificationCzec"><img src="images/LLCCertificationCzec.png"></div>
                </div>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

    </div>

<?php
$this->registerJs("

        $('#certificate-company_id').on('change',function(){

            
            var cid = $('#certificate-company_id').find(':selected').val();
           
            $.ajax({
              url: base_url + 'certificate/get-company-address',
              type: 'GET', 
              data: { 
                company_id: cid,                 
              },
              success: function(response) {
                $('#address').text(response);              
                //console.log(response);
              },
              error: function(xhr) {
                //Do Something to handle error
              }
            });

            var cname = $('#certificate-company_id').find(':selected').text();
            $('#company-name').text(cname);
            
        });
        $('#certificate-iso_id').on('change',function(){
             var iso = $('#certificate-iso_id').find(':selected').text();
            console.log(iso);
            $('#iso').text('ISO '+iso);
        });
        
        
        $('#certificate-ea_code').bind('change keydown keyup',function (){
            $('#ea_code').html('EA Code:'+$(this).val());
        });
        $('#certificate-services').bind('change keydown keyup',function (){
            $('#service').html($(this).val());
        });
        
         $('#certificate-from_date').bind('change keydown keyup',function (){         
            //console.log($(this).val());
            //var inputDate = $(this).val(); 
                        
                      
            
            
        });
        $('#certificate-from_date').change(function () {
            var dateStr = $(this).val();


          console.log(dateStr);
      
        

           

            
            
        });
        
        
        

        ", \yii\web\View::POS_END);

?>