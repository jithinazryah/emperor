<?php

use yii\db\Migration;

class m160820_101658_altr extends Migration
{
    public function up()
    {
            $this->execute("ALTER TABLE `estimated_proforma` ADD `principal` INT NOT NULL AFTER `epda`;");
    }

    public function down()
    {
        echo "m160820_101658_altr cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
