<?php
/**
 * Created by ERDConverter
 */
namespace PrivateIT\modules\document\models\query;

use PrivateIT\modules\document\models\Group;

/**
 * GroupActiveQuery
 *
 */
class GroupActiveQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return Group[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Group|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /*
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }
    */
}
