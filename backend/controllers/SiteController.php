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

                $model = new \common\models\AdminUsers();
                $model->scenario = 'login';
                $check = \Yii::$app->getRequest();
                if ($check->isPost && $model->load($request->post())) {

                        return $this->goBack();
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
