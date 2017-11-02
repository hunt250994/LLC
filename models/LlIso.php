<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ll_iso".
 *
 * @property integer $iso_id
 * @property string $iso_code
 * @property string $created_at
 * @property integer $is_deleted
 *
 * @property Certificate[] $certificates
 */
class LlIso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'll_iso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iso_code'], 'required'],
            [['created_at'], 'safe'],
            [['is_deleted'], 'integer'],
            [['iso_code'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iso_id' => 'Iso ID',
            'iso_code' => 'Iso Code',
            'created_at' => 'Created At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificates()
    {
        return $this->hasMany(Certificate::className(), ['iso_id' => 'iso_id']);
    }
}
