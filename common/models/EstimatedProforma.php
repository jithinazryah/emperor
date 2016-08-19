<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estimated_proforma".
 *
 * @property integer $id
 * @property integer $apponitment_id
 * @property integer $service_id
 * @property integer $supplier
 * @property integer $currency
 * @property string $unit_rate
 * @property string $unit
 * @property string $roe
 * @property integer $epda
 * @property integer $invoice_type
 * @property string $comments
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class EstimatedProforma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estimated_proforma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apponitment_id', 'service_id', 'CB', 'UB'], 'required'],
            [['apponitment_id', 'service_id', 'supplier', 'currency', 'epda', 'invoice_type', 'status', 'CB', 'UB'], 'integer'],
            [['comments'], 'string'],
            [['DOC', 'DOU'], 'safe'],
            [['unit_rate', 'unit'], 'string', 'max' => 50],
            [['roe'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apponitment_id' => 'Apponitment ID',
            'service_id' => 'Service ID',
            'supplier' => 'Supplier',
            'currency' => 'Currency',
            'unit_rate' => 'Unit Rate',
            'unit' => 'Unit',
            'roe' => 'Roe',
            'epda' => 'Epda',
            'invoice_type' => 'Invoice Type',
            'comments' => 'Comments',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }
}
