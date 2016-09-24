<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sub_services".
 *
 * @property integer $id
 * @property integer $service_id
 * @property string $sub_service
 * @property double $unit
 * @property double $unit_price
 * @property double $total
 * @property string $comments
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class SubServices extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'sub_services';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['service_id', 'sub_service'], 'required'],
                    [['service_id', 'status', 'CB', 'UB'], 'integer'],
                    [['unit', 'unit_price', 'total'], 'number'],
                    [['comments'], 'string'],
                    [['DOC', 'DOU'], 'safe'],
                    [['sub_service'], 'string', 'max' => 50],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'service_id' => 'Service ID',
                    'sub_service' => 'Sub Service',
                    'unit' => 'Unit',
                    'unit_price' => 'Unit Price',
                    'total' => 'Total',
                    'comments' => 'Comments',
                    'status' => 'Status',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                ];
        }

        public function getService() {
                return $this->hasOne(Services::className(), ['id' => 'service_id']);
        }

}
