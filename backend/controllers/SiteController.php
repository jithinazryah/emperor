<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Employee;
use common\models\AdminPosts;

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
                
                if (!Yii::$app->user->isGuest) {
                        return $this->redirect(array('site/home'));
                }
                $this->layout = 'login';
                $model = new Employee();
                $model->scenario = 'login';
                if ($model->load(Yii::$app->request->post()) && $model->login() && $this->setSession()) {
                        return $this->redirect(array('site/home'));
                } else {
                        return $this->render('login', [
                                    'model' => $model,
                        ]);
                }
        }

        public function setSession() {
                $post = AdminPosts::findOne(Yii::$app->user->identity->post_id);
                Yii::$app->session['post'] = $post->attributes;
                
                return true;
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
                unset(Yii::$app->session['post']);
                return $this->goHome();
        }

}
