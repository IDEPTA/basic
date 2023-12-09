<?php

use yii\db\Migration;

/**
 * Class mXXXXXXXXXXXX_add_category_to_posts
 */
class m231209_081544_add_category_to_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('posts', 'ADDCOLUMNS', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('posts', 'ADDCOLUMNS');
    }
}
