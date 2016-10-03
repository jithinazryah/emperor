<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\SubServices;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
        <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>/css/pdf.css">
    </head>
    <body>
        <div class="main">

            <div class="header">
                <div class="main-left">
                    <img src="<?= Yii::$app->homeUrl ?>/images/logoleft.jpg"/>
                    <table class="">
                        <tr>
                            <td>TO </td> <td style="width: 50px;text-align: center">:</td>
                            <td style="max-width: 200px">jithin wails Plaiickal, pullopram</td>
                        </tr>
                    </table>
                </div>
                <div class="main-right">
                    <img src="<?= Yii::$app->homeUrl ?>/images/logoright.jpg"/>
                    <table class="">
                        <tr>
                            <td>Date </td> <td style="width: 50px;text-align: center">:</td>
                            <td style="max-width: 200px">13/08/2016</td>
                        </tr>
                        <tr>
                            <td>Client Code </td> <td style="width: 50px;text-align: center">:</td>
                            <td style="max-width: 200px">IPC</td>
                        </tr>
                    </table>
                </div>
                <br/>
            </div>
            <div class="heading">ESTIMATED PORT COST</div>
            <div class="topcontent">
                <div class="topcontent-left">
                    <table class="">
                        <tr>
                            <td>Port </td> <td style="width: 246px;text-align: center">:MINA SAQR PORT</td>
                            <td style="max-width: 246px"></td>
                        </tr>
                         <tr>
                            <td>ETA </td> <td style="width: 246px;text-align: center">:TBA</td>
                            <td style="max-width: 246px"></td>
                        </tr>
                         <tr>
                            <td>Details </td> <td style="width: 246px;text-align: center">:Loading Clinker - Free In Basis</td>
                            <td style="max-width: 246px"></td>
                        </tr>
                    </table>
                </div>

            </div>


        </div>

    </body>
</html>
