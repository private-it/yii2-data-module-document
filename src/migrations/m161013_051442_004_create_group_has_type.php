<?php
/**
 * Created by ERDConverter
 */

use yii\db\Schema;
use yii\db\Migration;

/**
 * m161013_051442_004_create_group_has_type
 *
 */
class m161013_051442_004_create_group_has_type extends Migration
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

        $this->createTable(\PrivateIT\modules\document\models\GroupHasType::tableName(), [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->defaultValue(0),
            'group_id' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(\PrivateIT\modules\document\models\GroupHasType::tableName());
    }
}