<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

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
class Employee extends ActiveRecord implements IdentityInterface {

        private $_user;
        public $rememberMe = true;

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
                    [['password'], 'validatePassword', 'on' => 'login'],
                ];
        }

        public function validatePassword($attribute, $params) {
                if (!$this->hasErrors()) {
                        $user = $this->getUser();
                        if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password)) {
                                $this->addError($attribute, 'Incorrect username or password.');
                        }
                }
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

        /*
         * 
         */

        public function login() {
                if ($this->validate()) {
                        return Yii::$app->user->login($this->getUser(), /* $this->rememberMe ? 3600 * 24 * 30 : */ 0);
                } else {
                        return false;
                }
        }
        
        

        protected function getUser() {
                if ($this->_user === null) {
                        $this->_user = static::find()->where('user_name = :uname and status = :stat', ['uname' => $this->user_name, 'stat' => '1'])->one();
                }

                return $this->_user;
        }

        public function validatedata($data) {
                if ($data == '') {
                        $this->addError('password', 'Incorrect username or password');
                        return true;
                }
        }

        /**
         * @inheritdoc
         */
        public static function findIdentity($id) {
                return static::findOne(['id' => $id, 'status' => 1]);
        }

        /**
         * @inheritdoc
         */
        public static function findIdentityByAccessToken($token, $type = null) {
                throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
        }

        public function getId() {
                return $this->getPrimaryKey();
        }

        /**
         * @inheritdoc
         */
        public function getAuthKey() {
                return $this->auth_key;
        }

        /**
         * @inheritdoc
         */
        public function validateAuthKey($authKey) {
                return $this->getAuthKey() === $authKey;
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getPost() {
                return $this->hasOne(AdminPosts::className(), ['id' => 'post_id']);
        }

}
