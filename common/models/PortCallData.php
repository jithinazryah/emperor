<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "port_call_data".
 *
 * @property integer $id
 * @property integer $appointment_id
 * @property string $eta
 * @property string $ets
 * @property string $eosp
 * @property string $arrived_anchorage
 * @property string $nor_tendered
 * @property string $dropped_anchor
 * @property string $anchor_aweigh
 * @property string $arrived_pilot_station
 * @property string $pob_inbound
 * @property string $first_line_ashore
 * @property string $all_fast
 * @property string $gangway_down
 * @property string $agent_on_board
 * @property string $immigration_commenced
 * @property string $immigartion_completed
 * @property string $cargo_commenced
 * @property string $cargo_completed
 * @property string $pob_outbound
 * @property string $lastline_away
 * @property string $cleared_channel
 * @property string $cosp
 * @property string $fasop
 * @property string $eta_next_port
 * @property integer $additional_info
 * @property string $comments
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class PortCallData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_call_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appointment_id', 'CB', 'UB'], 'required'],
            [['appointment_id', 'additional_info', 'status', 'CB', 'UB'], 'integer'],
            [['eta', 'ets', 'eosp', 'arrived_anchorage', 'nor_tendered', 'dropped_anchor', 'anchor_aweigh', 'arrived_pilot_station', 'pob_inbound', 'first_line_ashore', 'all_fast', 'gangway_down', 'agent_on_board', 'immigration_commenced', 'immigartion_completed', 'cargo_commenced', 'cargo_completed', 'pob_outbound', 'lastline_away', 'cleared_channel', 'cosp', 'fasop', 'eta_next_port', 'DOC', 'DOU'], 'safe'],
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
            'eta' => 'Eta',
            'ets' => 'Ets',
            'eosp' => 'Eosp',
            'arrived_anchorage' => 'Arrived Anchorage',
            'nor_tendered' => 'Nor Tendered',
            'dropped_anchor' => 'Dropped Anchor',
            'anchor_aweigh' => 'Anchor Aweigh',
            'arrived_pilot_station' => 'Arrived Pilot Station',
            'pob_inbound' => 'Pob Inbound',
            'first_line_ashore' => 'First Line Ashore',
            'all_fast' => 'All Fast',
            'gangway_down' => 'Gangway Down',
            'agent_on_board' => 'Agent On Board',
            'immigration_commenced' => 'Immigration Commenced',
            'immigartion_completed' => 'Immigartion Completed',
            'cargo_commenced' => 'Cargo Commenced',
            'cargo_completed' => 'Cargo Completed',
            'pob_outbound' => 'Pob Outbound',
            'lastline_away' => 'Lastline Away',
            'cleared_channel' => 'Cleared Channel',
            'cosp' => 'Cosp',
            'fasop' => 'Fasop',
            'eta_next_port' => 'Eta Next Port',
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
