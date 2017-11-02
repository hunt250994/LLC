<?php

namespace app\helper;

use app\models\Permissions;
use app\models\Projects;
use yii;
use yii\helpers\ArrayHelper;
use app\models\LlCompany;
use app\models\Lliso;
use app\models\LlEa;



class AppHelper
{


   static public function getCompanis()
   {
      $company=LlCompany::find()->Where(['is_deleted' =>0])->all();
      $list=ArrayHelper::map($company,'company_id','Comapny_name');
      return $list;
   }
   static public function getisocodes()
   {
        $iso=Lliso::find()->Where(['is_deleted' =>0])->all();
        $isolist=ArrayHelper::map($iso,'iso_id','iso_code');
        return $isolist;
   }
   static public function geteacodes()
   {
      $ea=LlEa::find()->Where(['is_deleted' =>0])->all();
      $ealist=ArrayHelper::map($ea,'ea_id','ea_code');
      return $ealist;
   }

 
}