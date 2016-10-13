<?php
/**
 * Created by ERDConverter
 */

use yii\db\Schema;
use yii\db\Migration;

/**
 * m161013_051442_005_create_group
 *
 */
class m161013_051442_005_create_group extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(\PrivateIT\modules\document\models\Group::tableName(), [
            'id' => $this->primaryKey(),
            'type_id' => $this->string()->defaultValue(""),
            'name' => $this->string()->defaultValue(""),
            'description' => $this->string()->defaultValue(""),
            'status' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(\PrivateIT\modules\document\models\Group::tableName());
    }
}