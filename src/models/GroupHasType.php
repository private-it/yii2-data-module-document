<?php
/**
 * Created by ERDConverter
 */
namespace PrivateIT\modules\document\models;

use PrivateIT\modules\document\DocumentModule;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * GroupHasType
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $group_id
 *
 * @property Group $group
 * @property Type $type
 */
class GroupHasType extends ActiveRecord
{
    const STATUS_ARCHIVED = -1;
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * Get object statuses
     *
     * @return array
     */
    static function getStatuses()
    {
        return [
            static::STATUS_ARCHIVED => Yii::t('document/group-has-type', 'const.status.archived'),
            static::STATUS_DELETED => Yii::t('document/group-has-type', 'const.status.deleted'),
            static::STATUS_ACTIVE => Yii::t('document/group-has-type', 'const.status.active'),
        ];
    }

    /**
     * @inheritdoc
     * @return query\GroupHasTypeActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function find()
    {
        return parent::find();
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return DocumentModule::tableName(__CLASS__);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('document/group-has-type', 'label.id'),
            'type_id' => Yii::t('document/group-has-type', 'label.type_id'),
            'group_id' => Yii::t('document/group-has-type', 'label.group_id'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('document/group-has-type', 'hint.id'),
            'type_id' => Yii::t('document/group-has-type', 'hint.type_id'),
            'group_id' => Yii::t('document/group-has-type', 'hint.group_id'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributePlaceholders()
    {
        return [
            'id' => Yii::t('document/group-has-type', 'placeholder.id'),
            'type_id' => Yii::t('document/group-has-type', 'placeholder.type_id'),
            'group_id' => Yii::t('document/group-has-type', 'placeholder.group_id'),
        ];
    }

    /**
     * Get value from Id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value to Id
     *
     * @param $value
     * @return $this
     */
    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Get value from TypeId
     *
     * @return string
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set value to TypeId
     *
     * @param $value
     * @return $this
     */
    public function setTypeId($value)
    {
        $this->type_id = $value;
        return $this;
    }

    /**
     * Get value from GroupId
     *
     * @return string
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set value to GroupId
     *
     * @param $value
     * @return $this
     */
    public function setGroupId($value)
    {
        $this->group_id = $value;
        return $this;
    }

    /**
     * Get relation Group
     *
     * @param string $class
     * @return query\GroupActiveQuery
     */
    public function getGroup($class = '\Group')
    {
        return $this->hasOne(static::findClass($class, __NAMESPACE__), ['id' => 'group_id']);
    }

    /**
     * Get relation Type
     *
     * @param string $class
     * @return query\TypeActiveQuery
     */
    public function getType($class = '\Type')
    {
        return $this->hasOne(static::findClass($class, __NAMESPACE__), ['id' => 'type_id']);
    }

}
