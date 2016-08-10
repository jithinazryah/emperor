<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller {

        /**
         * @inheritdoc
         */
        public function behaviors() {
                return [
                    'access' => [
                        'class' => AccessControl::className(),
                        'rules' => [
                            [
                                'actions' => ['login', 'error', 'index', 'home'],
                                'allow' => true,
                            ],
                            [
                                'actions' => ['logout', 'index', 'Home'],
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'logout' => ['post'],
                        ],
                    ],
                ];
        }

        /**
         * @inheritdoc
         */
        public function actions() {
                return [
                    'error' => [
                        'class' => 'yii\web\ErrorAction',
                    ],
                ];
        }

        /**
         * Displays homepage.
         *
         * @return string
         */
        public function actionIndex() {
                $this->layout = 'login';
                if (!Yii::$app->user->isGuest) {
                        return $this->goHome();
                }

                $model = new \common\models\Employee();
                $model->scenario = 'login';
                if ($model->load(Yii::$app->request->post())) {
                        $data = \common\models\Employee::find()->where('user_name = :uname and password = :password', ['uname' => $model->user_name, 'password' => $model->password])->one();

                        if ($data == '') {
                                $model->validatedata($data);
                                return $this->render('login', [
                                            'model' => $model,
                                ]);
                        } else {
                                $id = $data->post_id;
                                $post = \common\models\AdminPosts::find()->where(['id' => $id])->one();
                                Yii::$app->session['post'] = $post;

                                Yii::$app->session['admin'] = $data->attributes;
                                return $this->redirect(array('site/home'));
                        }
                } else {
                        return $this->render('login', [
                                    'model' => $model,
                        ]);
                }
                //return $this->render('index');
        }

        public function actionHome() {
                return $this->render('index');
        }

        /**
         * Login action.
         *
         * @return string
         */
        public function actionLogin() {
                $this->layout = 'login';
                if (!Yii::$app->user->isGuest) {
                        return $this->goHome();
                }

                $model = new LoginForm();
                if ($model->load(Yii::$app->request->post()) && $model->login()) {
                        return $this->goBack();
                } else {
                        return $this->render('login', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Logout action.
         *
         * @return string
         */
        public function actionLogout() {
                Yii::$app->user->logout();

                return $this->goHome();
        }

}
