<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ll_company".
 *
 * @property integer $company_id
 * @property string $Comapny_name
 * @property string $company_email
 * @property string $company_mobile
 * @property string $flat_no
 * @property string $street
 * @property string $landmark
 * @property string $area
 * @property string $pincode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $created_at
 * @property integer $is_deleted
 *
 * @property Certificate[] $certificates
 */
class LlCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'll_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Comapny_name', 'company_email', 'company_mobile', 'flat_no', 'street', 'landmark', 'area', 'pincode', 'city', 'state', 'country'], 'required'],
            [['created_at'], 'safe'],
            [['is_deleted'], 'integer'],
            [['Comapny_name', 'company_email'], 'string', 'max' => 100],
            [['company_mobile'], 'string', 'max' => 20],
            [['flat_no', 'street', 'landmark', 'area', 'pincode', 'city', 'state', 'country'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company',
            'Comapny_name' => 'Comapny Name',
            'company_email' => 'Company Email',
            'company_mobile' => 'Company Mobile',
            'flat_no' => 'Flat No',
            'street' => 'Street',
            'landmark' => 'Landmark',
            'area' => 'Area',
            'pincode' => 'Pincode',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'created_at' => 'Created At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificates()
    {
        return $this->hasMany(Certificate::className(), ['company_id' => 'company_id']);
    }
}
