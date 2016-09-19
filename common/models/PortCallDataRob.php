<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "port_call_data_rob".
 *
 * @property integer $id
 * @property integer $appointment_id
 * @property integer $fo_arrival_unit
 * @property integer $fo_arrival_quantity
 * @property integer $do_arrival_unit
 * @property integer $do_arrival_quantity
 * @property integer $go_arrival_unit
 * @property integer $go_arrival_quantity
 * @property integer $lo_arrival_unit
 * @property integer $lo_arrival_quantity
 * @property integer $fresh_water_arrival_unit
 * @property integer $fresh_water_arrival_quantity
 * @property integer $fo_sailing_unit
 * @property integer $fo_sailing_quantity
 * @property integer $do_sailing_unit
 * @property integer $do_sailing_quantity
 * @property integer $go_sailing_unit
 * @property integer $go_sailing_quantity
 * @property integer $lo_sailing_unit
 * @property integer $lo_sailing_quantity
 * @property integer $fresh_water_sailing_unit
 * @property integer $fresh_water_sailing_quantity
 * @property integer $additional_info
 * @property string $comments
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class PortCallDataRob extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'port_call_data_rob';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['appointment_id'], 'required'],
            [['appointment_id', 'fo_arrival_unit', 'fo_arrival_quantity', 'do_arrival_unit', 'do_arrival_quantity', 'go_arrival_unit', 'go_arrival_quantity', 'lo_arrival_unit', 'lo_arrival_quantity', 'fresh_water_arrival_unit', 'fresh_water_arrival_quantity', 'fo_sailing_unit', 'fo_sailing_quantity', 'do_sailing_unit', 'do_sailing_quantity', 'go_sailing_unit', 'go_sailing_quantity', 'lo_sailing_unit', 'lo_sailing_quantity', 'fresh_water_sailing_unit', 'fresh_water_sailing_quantity', 'additional_info', 'status', 'CB', 'UB'], 'integer'],
            [['comments'], 'string'],
            [['DOC', 'DOU'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'appointment_id' => 'Appointment ID',
            'fo_arrival_unit' => 'Fuel Oil Arrival Unit',
            'fo_arrival_quantity' => 'Fuel Oil Arrival Quantity',
            'do_arrival_unit' => 'Diesel Oil Arrival Unit',
            'do_arrival_quantity' => 'Diesel Oil Arrival Quantity',
            'go_arrival_unit' => 'Gas Oil Arrival Unit',
            'go_arrival_quantity' => 'Gas Oil Arrival Quantity',
            'lo_arrival_unit' => 'Lube Oil Arrival Unit',
            'lo_arrival_quantity' => 'Lube Oil Arrival Quantity',
            'fresh_water_arrival_unit' => 'Fresh Water Arrival Unit',
            'fresh_water_arrival_quantity' => 'Fresh Water Arrival Quantity',
            'fo_sailing_unit' => 'Fuel Oil Sailing Unit',
            'fo_sailing_quantity' => 'Fuel Oil Sailing Quantity',
            'do_sailing_unit' => 'Diesel Oil Sailing Unit',
            'do_sailing_quantity' => 'Diesel Oil Sailing Quantity',
            'go_sailing_unit' => 'Gas Oil Sailing Unit',
            'go_sailing_quantity' => 'Gas Oil Sailing Quantity',
            'lo_sailing_unit' => 'Lube Oil Sailing Unit',
            'lo_sailing_quantity' => 'Lube Oil Sailing Quantity',
            'fresh_water_sailing_unit' => 'Fresh Water Sailing Unit',
            'fresh_water_sailing_quantity' => 'Fresh Water Sailing Quantity',
            'additional_info' => 'Additional Info',
            'comments' => 'Comments',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

    public function getAppointment() {
        return $this->hasOne(Appointment::className(), ['id' => 'appointment_id']);
    }

}
