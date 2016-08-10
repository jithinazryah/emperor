<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="login-container">

    <div class="row">

        <div class="col-sm-6">

            <script type="text/javascript">
                    jQuery(document).ready(function ($)
                    {
                        setTimeout(function () {
                            $(".fade-in-effect").addClass('in');
                        }, 1);

                    });
            </script>
            <!-- Errors container -->
            <div class="errors-container">
            </div>

            <!-- Add class "fade-in-effect" for login form effect -->
            <?php
            $form = ActiveForm::begin(
                            [
                                'id' => 'login',
                                'method' => 'post',
                                'options' => [
                                    'class' => 'login-form fade-in-effect'
                                ]
                            ]
            );
            ?>

            <div class="login-header">
                <a href="" class="logo">
                    <?php echo Html::img('@web/images/logoo.png') ?>
                    <span>Emperor Admin log in</span>
                </a>

                <p>Dear user, log in to access the admin area!</p>
            </div>


            <div class="form-group">
                <?= $form->field($model, 'user_name')->textInput(['class' => 'form-control input-dark']) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'password')->textInput(['class' => 'form-control input-dark']) ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-dark  btn-block text-left">
                    <i class="fa-lock"></i>
                    Log In
                </button>
            </div>

            <div class="login-footer">
                <a href="#">Forgot your password?</a>

                <div class="info-links">
                    <a href="#">ToS</a> -
                    <a href="#">Privacy Policy</a>
                </div>

            </div>

            <?php ActiveForm::end(); ?>


        </div>

    </div>

</div>
