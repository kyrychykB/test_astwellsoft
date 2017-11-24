<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work`.
 */
class m171123_135846_create_work_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        /**
         * Creates `work` table
         * @inheritdoc
         */
        $this->createTable('work', [
            'id' => $this->primaryKey(),
            'shop_id'=> $this->integer(),
            'status' => $this->smallInteger(),
            'date' => $this->date()->notNull(),
            'time_open' => $this->time(),
            'time_close' => $this->time(),
        ]);

        /**
         * Creates index for column `shop_id`.
         */
        $this->createIndex(
            'idx-work-shop_id',
            'work',
            'shop_id'
        );

        /**
         * Adds foreign key `shop_id` for table `work`.
         */
        $this->addForeignKey(
            'fk-work-shop_id',
            'work',
            'shop_id',
            'shop',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        /**
         * Drops foreign key `fk-work-shop_id` for table `work`.
         */
        $this->dropForeignKey(
            'fk-work-shop_id',
            'work'
        );

        /**
         * Drops index `idx-work-shop_id` for column `category_id`.
         */
        $this->dropIndex(
            'idx-work-shop_id',
            'post'
        );

        /**
         * Drops `work` table
         * @inheritdoc
         */
        $this->dropTable('work');
    }
}
