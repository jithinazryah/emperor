<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property integer $id
 * @property integer $vessel_type
 * @property integer $vessel
 * @property integer $port_of_call
 * @property integer $terminal
 * @property string $birth_no
 * @property string $appointment_no
 * @property string $no_of_principal
 * @property integer $principal
 * @property integer $nominator
 * @property integer $charterer
 * @property integer $shipper
 * @property string $purpose
 * @property string $cargo
 * @property string $quantity
 * @property string $last_port
 * @property string $next_port
 * @property string $eta
 * @property integer $stage
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vessel_type', 'vessel', 'port_of_call', 'stage'], 'required'],
            [['vessel_type', 'vessel', 'port_of_call', 'terminal', 'principal', 'nominator', 'charterer', 'shipper', 'stage', 'status', 'CB', 'UB'], 'integer'],
            [['eta', 'DOC', 'DOU'], 'safe'],
            [['birth_no', 'appointment_no'], 'string', 'max' => 50],
            [['no_of_principal', 'quantity'], 'string', 'max' => 15],
            [['purpose', 'last_port', 'next_port'], 'string', 'max' => 200],
            [['cargo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vessel_type' => 'Vessel Type',
            'vessel' => 'Vessel',
            'port_of_call' => 'Port Of Call',
            'terminal' => 'Terminal',
            'birth_no' => 'Birth No',
            'appointment_no' => 'Appointment No',
            'no_of_principal' => 'No Of Principal',
            'principal' => 'Principal',
            'nominator' => 'Nominator',
            'charterer' => 'Charterer',
            'shipper' => 'Shipper',
            'purpose' => 'Purpose',
            'cargo' => 'Cargo',
            'quantity' => 'Quantity',
            'last_port' => 'Last Port',
            'next_port' => 'Next Port',
            'eta' => 'Eta',
            'stage' => 'Stage',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }
}