<?php

use yii\db\Migration;

/**
 * Class m231209_121500_update_apartments_paid_column
 */
class m231209_090941_update_apartments_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('payment', ['paid' => 'Нет'], ['paid' => 'Да']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->update('payment', ['paid' => 'Да'], ['paid' => 'Нет']);
    }
}
