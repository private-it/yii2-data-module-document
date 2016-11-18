<?php
/**
 * Created by ERDConverter
 */
namespace PrivateIT\modules\document\models\query;

use PrivateIT\modules\document\models\Document;

/**
 * DocumentActiveQuery
 *
 */
class DocumentActiveQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return Document[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Document|array|null
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
