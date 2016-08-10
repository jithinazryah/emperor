<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin_users".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $user_name
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property AdminPosts $post
 */
class AdminUsers extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'admin_users';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    //[['post_id', 'user_name', 'password', 'CB', 'UB'], 'required'],
                    [['post_id', 'status', 'CB', 'UB'], 'integer'],
                    [['address'], 'string'],
                    [['DOC', 'DOU'], 'safe'],
                    [['user_name', 'password'], 'string', 'max' => 30],
                    [['name', 'email'], 'string', 'max' => 100],
                    [['phone'], 'string', 'max' => 15],
                    [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminPosts::className(), 'targetAttribute' => ['post_id' => 'id']],
                    [['user_name', 'password'], 'required', 'on' => 'login'],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'post_id' => 'Post ID',
                    'user_name' => 'User Name',
                    'password' => 'Password',
                    'name' => 'Name',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'address' => 'Address',
                    'status' => 'Status',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                ];
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPost() {
                return $this->hasOne(AdminPosts::className(), ['id' => 'post_id']);
        }

}
