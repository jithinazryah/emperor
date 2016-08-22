<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "port_call_data_draft".
 *
 * @property integer $id
 * @property integer $appointment_id
 * @property integer $data_id
 * @property string $intial_survey_commenced
 * @property string $intial_survey_completed
 * @property string $finial_survey_commenced
 * @property string $finial_survey_completed
 * @property integer $fwd_arrival_unit
 * @property integer $fwd_arrival_quantity
 * @property integer $aft_arrival_unit
 * @property integer $aft_arrival_quantity
 * @property integer $mean_arrival_unit
 * @property integer $mean_arrival_quantity
 * @property integer $fwd_sailing_unit
 * @property integer $fwd_sailing_quantity
 * @property integer $aft_sailing_unit
 * @property integer $aft_sailing_quantity
 * @property integer $mean_sailing_unit
 * @property integer $mean_sailing_quantity
 * @property integer $additional_info
 * @property string $comments
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class PortCallDataDraft extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_call_data_draft';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appointment_id', 'CB', 'UB'], 'required'],
            [['appointment_id', 'data_id', 'fwd_arrival_unit', 'fwd_arrival_quantity', 'aft_arrival_unit', 'aft_arrival_quantity', 'mean_arrival_unit', 'mean_arrival_quantity', 'fwd_sailing_unit', 'fwd_sailing_quantity', 'aft_sailing_unit', 'aft_sailing_quantity', 'mean_sailing_unit', 'mean_sailing_quantity', 'additional_info', 'status', 'CB', 'UB'], 'integer'],
            [['intial_survey_commenced', 'intial_survey_completed', 'finial_survey_commenced', 'finial_survey_completed', 'DOC', 'DOU'], 'safe'],
            [['comments'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appointment_id' => 'Appointment ID',
            'data_id' => 'Data ID',
            'intial_survey_commenced' => 'Intial Survey Commenced',
            'intial_survey_completed' => 'Intial Survey Completed',
            'finial_survey_commenced' => 'Finial Survey Commenced',
            'finial_survey_completed' => 'Finial Survey Completed',
            'fwd_arrival_unit' => 'Fwd Arrival Unit',
            'fwd_arrival_quantity' => 'Fwd Arrival Quantity',
            'aft_arrival_unit' => 'Aft Arrival Unit',
            'aft_arrival_quantity' => 'Aft Arrival Quantity',
            'mean_arrival_unit' => 'Mean Arrival Unit',
            'mean_arrival_quantity' => 'Mean Arrival Quantity',
            'fwd_sailing_unit' => 'Fwd Sailing Unit',
            'fwd_sailing_quantity' => 'Fwd Sailing Quantity',
            'aft_sailing_unit' => 'Aft Sailing Unit',
            'aft_sailing_quantity' => 'Aft Sailing Quantity',
            'mean_sailing_unit' => 'Mean Sailing Unit',
            'mean_sailing_quantity' => 'Mean Sailing Quantity',
            'additional_info' => 'Additional Info',
            'comments' => 'Comments',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }
}
