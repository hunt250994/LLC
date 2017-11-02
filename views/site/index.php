<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<img border="0" src="<?= yii\helpers\BaseUrl::home().'images/bg.jpg' ?>" width="100%">

<div class="container-fluid">
      <h2 class="check-code">Check your <br>validity code</h2>
      <div class="row">
            <div class="col-md-4 col-md-offset-4">

                  <INPUT TYPE="text" NAME="Code_cert" SIZE="20" style="border:1px solid #50648C; color: #50648C; font-family: Verdana; font-size: 10pt; background-color:#F2F2F2" maxlength="15">
                  <INPUT TYPE="submit" VALUE="Check" style="font-family:Verdana; font-size:10pt; color:#FFFAFA; background-color:#1E90FF">
            </div>
      </div>
</div>

