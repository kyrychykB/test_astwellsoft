<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop`.
 */
class m171123_135558_create_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        /**
         * Creates `shop` table
         */
        $this->createTable('shop', [
            'id' => $this->primaryKey(),
            'name' =>$this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        /**
         * Drops `shop` table
         */
        $this->dropTable('shop');
    }
}
