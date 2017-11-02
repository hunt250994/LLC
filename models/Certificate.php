<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certificate".
 *
 * @property integer $certificate_id
 * @property integer $certificate_code
 * @property integer $company_id
 * @property integer $iso_id
 * @property string $ea_code
 * @property string $services
 * @property string $from_date
 * @property string $to_date
 * @property string $reminder_date
 * @property string $created_at
 * @property integer $is_deleted
 * @property integer $is_published
 *
 * @property LlCompany $company
 * @property LlIso $iso
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certificate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['certificate_code', 'company_id', 'iso_id', 'ea_code', 'services', 'from_date', 'to_date', 'reminder_date'], 'required'],
            [['certificate_code', 'company_id', 'iso_id', 'is_deleted', 'is_published'], 'integer'],
            [['from_date', 'to_date', 'reminder_date', 'created_at'], 'safe'],
            [['ea_code'], 'string', 'max' => 50],
            [['services'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => LlCompany::className(), 'targetAttribute' => ['company_id' => 'company_id']],
            [['iso_id'], 'exist', 'skipOnError' => true, 'targetClass' => LlIso::className(), 'targetAttribute' => ['iso_id' => 'iso_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'certificate_id' => 'Certificate ID',
            'certificate_code' => 'Certificate Code',
            'company_id' => 'Company',
            'iso_id' => 'Iso',
            'ea_code' => 'Ea Code',
            'services' => 'Services',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'reminder_date' => 'Reminder Date',
            'created_at' => 'Created At',
            'is_deleted' => 'Is Deleted',
            'is_published' => 'Is Published',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(LlCompany::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIso()
    {
        return $this->hasOne(LlIso::className(), ['iso_id' => 'iso_id']);
    }
}
