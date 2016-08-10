<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
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
 * @property string $branch_id
 * @property string $employee_code
 * @property integer $gender
 * @property string $date_of_join
 * @property integer $maritual_status
 * @property integer $salary_package
 * @property string $photo
 *
 * @property AdminPosts $post
 */
class Employee extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'employee';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    // [['post_id', 'user_name', 'password', 'CB', 'UB'], 'required'],
                    [['post_id', 'status', 'CB', 'UB', 'gender', 'maritual_status', 'salary_package'], 'integer'],
                    [['address'], 'string'],
                    [['DOC', 'DOU', 'date_of_join'], 'safe'],
                    [['user_name', 'password'], 'string', 'max' => 30],
                    [['name', 'email', 'branch_id', 'employee_code', 'photo'], 'string', 'max' => 100],
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
                    'branch_id' => 'Branch ID',
                    'employee_code' => 'Employee Code',
                    'gender' => 'Gender',
                    'date_of_join' => 'Date Of Join',
                    'maritual_status' => 'Maritual Status',
                    'salary_package' => 'Salary Package',
                    'photo' => 'Photo',
                ];
        }

        public function validatedata($data) {
                if ($data == '') {
                        $this->addError('password', 'Incorrect username or password');
                        return true;
                }
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPost() {
                return $this->hasOne(AdminPosts::className(), ['id' => 'post_id']);
        }

}
