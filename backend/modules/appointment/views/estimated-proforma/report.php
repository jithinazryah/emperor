<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\SubServices;
use common\models\Appointment;
use common\models\EstimatedProforma;
use common\models\Debtor;
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
    <scr
</head>
<body>
    <button onclick="window.print()">Print</button>
    <div class="main">

        <div class="header">
            <div class="main-left">
                <img src="<?= Yii::$app->homeUrl ?>/images/logoleft.jpg"/>
                <table class="">
                    <tr>
                        <td>TO </td> <td style="width: 50px;text-align: center">:</td>
                        <td style="max-width: 200px"><?= $appointment->getInvoiceAddress($appointment->principal); ?></td>
                    </tr>
                </table>
            </div>
            <div class="main-right">
                <img src="<?= Yii::$app->homeUrl ?>/images/logoright.jpg"/>
                <table class="">
                    <tr>
                        <td>Date </td> <td style="width: 50px;text-align: center">:</td>
                        <td style="max-width: 200px"><?= date("d/m/Y") ?></td>
                    </tr>
                    <tr>
                        <td>Client Code </td> <td style="width: 50px;text-align: center">:</td>
                        <td style="max-width: 200px"><?= $appointment->getClintCode($appointment->principal); ?></td>
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
                        <td>Port </td> <td>:</td>
                        <td><?= $appointment->portOfCall->port_name ?></td>
                    </tr>
                    <tr>
                        <td>ETA </td> <td>:</td>
                        <td><?= $appointment->eta ?></td>
                    </tr>
                    <tr>
                        <td>Details </td> <td>:</td>
                        <td>Loading Clinker - Free In Basis</td>
                    </tr>
                </table>
            </div>
            <div class="topcontent-center">
                <table class="">
                    <tr>
                        <td>Vessel </td> <td>:</td>
                        <td><?= $appointment->vessel0->vessel_name ?></td>
                    </tr>
                    <tr>
                        <td>Purpose </td> <td>:</td>
                        <td><?= $appointment->purpose0->purpose ?></td>
                    </tr>
                </table>
            </div>
            <div class="topcontent-right">
                <table class="">
                    <tr>
                        <td>Ref No </td> <td>:</td>
                        <td><?= $appointment->appointment_no ?></td>
                    </tr>
                    <tr>
                        <td>Ops no </td> <td>:</td>
                        <td>TBC</td>
                    </tr>
                </table>
            </div>

        </div>

        <div class="content">
            <table class="table tbl">
                <tr>
                    <td colspan="2" style="width: 60%; font-weight: bold;">Service Category</td>
                    <td rowspan="2" style="width: 8%;">Unit Tons/No</td>
                    <td rowspan="2" style="width: 16%;"><b>Comments</b></td>
                    <td rowspan="2" style="width: 8%;">Unit Price</td>
                    <td style="width: 8%;">Amount</td>
                </tr>
                <tr>
                    <td style="width: 30%;">&nbsp;</td>
                    <td style="width: 30%;color: red;">Comments/Rate to category</td>
                    <td style="width: 10%;">AED</td>

                </tr>
            </table>
        </div>

        <div class="content">
            <?php
            foreach ($estimates as $estimate) {
                    $subcategories = SubServices::findAll(['estid' => $estimate->id]);
                    if (!empty($subcategories)) {
                            $subtotal = 0;
                            ?>
                            <h6><?= $estimate->service->service ?></h6>
                            <table class="table">
                                <?php
                                foreach ($subcategories as $subcategory) {
                                        ?>
                                        <tr>
                                            <td style="width: 30%;"><?= $subcategory->sub->sub_service ?></td>
                                            <td style="width: 30%;"><?= $subcategory->rate_to_category ?></td>
                                            <td style="width: 8%;"><?= $subcategory->unit ?></td>
                                            <td style="width: 16%;"><?= $subcategory->comments ?></td>
                                            <td style="width: 8%;"><?= $subcategory->unit_price ?></td>
                                            <td style="width: 8%;"><?= $subcategory->total ?></td>
                                            <?php
                                            $subtotal += $subcategory->total;
                                            ?>
                                        </tr>
                                        <?php
                                }
                                $grandtotal+=$subtotal;
                                ?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">Sub total:</td>
                                    <td>AED <?= $subtotal ?></td>
                                </tr>
                            </table>
                    <?php } else {
                            ?>
                            <br/>
                            <table class="table">
                                <tr>
                                    <td style="width: 30%;"><?= $estimate->service->service ?></td>
                                    <td style="width: 30%;"></td>
                                    <td style="width: 8%;"><?= $estimate->unit ?></td>
                                    <td style="width: 16%;"><?= $estimate->comments ?></td>
                                    <td style="width: 8%;"><?= $estimate->unit_rate ?></td>
                                    <td style="width: 8%;"><?= $estimate->epda ?></td>
                                </tr>
                            </table>

                            <?php
                    }
            }
            ?>
        </div>
        <!--            <div class="content">
                        <h6>Vessel Expenses</h6>
                        <table class="table">
                            <tr>
                                <td style="width: 30%;">1</td>
                                <td style="width: 30%;">2</td>
                                <td style="width: 8%;">3</td>
                                <td style="width: 16%;">4</td>
                                <td style="width: 8%;">5</td>
                                <td style="width: 8%;">6</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: center;">Sub total:</td>
                                <td>AED125</td>
                            </tr>
                        </table>
                    </div>
                    <div class="content">
                        <h6>Agency Charges</h6>
                        <table class="table">
                            <tr>
                                <td style="width: 30%;">1</td>
                                <td style="width: 30%;">2</td>
                                <td style="width: 8%;">3</td>
                                <td style="width: 16%;">4</td>
                                <td style="width: 8%;">5</td>
                                <td style="width: 8%;">6</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: center;">Sub total:</td>
                                <td>AED125</td>
                            </tr>
                        </table>
                    </div>-->
        <br/>
        <div class="content">
            <table class="table">
                <tr>
                    <td style="width: 84%; text-align: center;"><b>Grand Total Estimate</b></td>
                    <td style="width: 8%;">USD 123456</td>
                    <td style="width: 8%;">AED <?= $grandtotal; ?></td>
                </tr>
            </table>
        </div>
        <br/>
        <div class="content">
            <p class="para-heading">- Additional scope of work other than mentioned in the tarrif to be mutually agreed between two parties prior initiation of service.</p>
            <p class="para-content">
                Please note that this is a pro-forma disbursement account only. It is intended to be an estimate of the actual disbursement account and is for guidance purposes only. 
                Whilst Emperor Shipping Lines does take every care to ensure that the figures and information contained in the pro-forma disbursement account are as accurate as possibles
                ,the actual disbursement account may, and often does, for various reasons beyond our control, vary from the pro-forma disbursement account. 
            </p>

            <p class="para-content">
                This duty exists regardless of any difference between the figures in this pro-forma disbursement account and the actual disbursement account.
            </p>
            <p class="para-content">
                To facilitate easy tracking, please include the ref number, vessel name & ETA on remittance advices and all correspondence.
                This will reduce the chance of delays due to mis-identification of funds
            </p>
            <p class="para-content1">
                All services from Third Party Service Providers are performed in accordance with the relevant service providers Standard Trading Terms & Conditions,
                which a copy can be obtained on request from our office.
            </p>

            <p class="para-content1">
                All services are performed in accordance with the ESL Standard Trading Terms & Conditions which can be viewed at www.emperor.ae and a copy
                of which is available on request.
            </p>
        </div>

        <div class="bankdetails">
            <div class="bankdetails-left">
                <h6>Bank Details</h6>
                <table>
                    <tr>
                        <td>NAME </td>
                        <td>:emperor</td>
                    </tr>
                    <tr>
                        <td>A/C NO</td>
                        <td>:4155663</td>
                    </tr>
                    <tr>
                        <td>IBAN</td>
                        <td>:125478996</td>
                    </tr>
                    <tr>
                        <td>SWIFT</td>
                        <td>:address</td>
                    </tr>
                    <tr>
                        <td>BRANCH</td>
                        <td>:branch name</td>
                    </tr>
                </table>
            </div>
            <div class="bankdetails-right">
                <table class="table">
                    <caption style="text-align: left; font-size: 12px;">Sign & Stamp</caption>
                    <tr>
                        <td style="height: 133px; text-align: center">IPC Marine Services LLC</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="footer">
            <span>
                <p>
                    Emperor Shipping Lines LLC, P.O.Box-328231, Saqr Port, Al Shaam, Ras Al Khaimah, UAE
                </p>
                <p>
                    Tel: +971 7 268 9676 / Fax: +917 7 268 9677
                </p>
                <p>
                    www.emperor.ae
                </p>
            </span>
        </div>


    </div>

</body>
</html>
