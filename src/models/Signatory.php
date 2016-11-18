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
 * Signatory
 *
 * @property integer $id
 * @property integer $document_id
 * @property integer $user_id
 * @property string $signatory
 * @property string $updated_at
 * @property string $created_at
 *
 * @property Document $document
 */
class Signatory extends ActiveRecord
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
            static::STATUS_ARCHIVED => Yii::t('document/signatory', 'const.status.archived'),
            static::STATUS_DELETED => Yii::t('document/signatory', 'const.status.deleted'),
            static::STATUS_ACTIVE => Yii::t('document/signatory', 'const.status.active'),
        ];
    }

    /**
     * @inheritdoc
     * @return query\SignatoryActiveQuery the newly created [[ActiveQuery]] instance.
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
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors[] = [
            'class' => TimestampBehavior::className(),
            'value' => new Expression('NOW()'),
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('document/signatory', 'label.id'),
            'document_id' => Yii::t('document/signatory', 'label.document_id'),
            'user_id' => Yii::t('document/signatory', 'label.user_id'),
            'signatory' => Yii::t('document/signatory', 'label.signatory'),
            'updated_at' => Yii::t('document/signatory', 'label.updated_at'),
            'created_at' => Yii::t('document/signatory', 'label.created_at'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('document/signatory', 'hint.id'),
            'document_id' => Yii::t('document/signatory', 'hint.document_id'),
            'user_id' => Yii::t('document/signatory', 'hint.user_id'),
            'signatory' => Yii::t('document/signatory', 'hint.signatory'),
            'updated_at' => Yii::t('document/signatory', 'hint.updated_at'),
            'created_at' => Yii::t('document/signatory', 'hint.created_at'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributePlaceholders()
    {
        return [
            'id' => Yii::t('document/signatory', 'placeholder.id'),
            'document_id' => Yii::t('document/signatory', 'placeholder.document_id'),
            'user_id' => Yii::t('document/signatory', 'placeholder.user_id'),
            'signatory' => Yii::t('document/signatory', 'placeholder.signatory'),
            'updated_at' => Yii::t('document/signatory', 'placeholder.updated_at'),
            'created_at' => Yii::t('document/signatory', 'placeholder.created_at'),
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
     * Get value from DocumentId
     *
     * @return string
     */
    public function getDocumentId()
    {
        return $this->document_id;
    }

    /**
     * Set value to DocumentId
     *
     * @param $value
     * @return $this
     */
    public function setDocumentId($value)
    {
        $this->document_id = $value;
        return $this;
    }

    /**
     * Get value from UserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set value to UserId
     *
     * @param $value
     * @return $this
     */
    public function setUserId($value)
    {
        $this->user_id = $value;
        return $this;
    }

    /**
     * Get value from Signatory
     *
     * @return string
     */
    public function getSignatory()
    {
        return $this->signatory;
    }

    /**
     * Set value to Signatory
     *
     * @param $value
     * @return $this
     */
    public function setSignatory($value)
    {
        $this->signatory = $value;
        return $this;
    }

    /**
     * Get value from UpdatedAt
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set value to UpdatedAt
     *
     * @param $value
     * @return $this
     */
    public function setUpdatedAt($value)
    {
        $this->updated_at = $value;
        return $this;
    }

    /**
     * Get value from CreatedAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set value to CreatedAt
     *
     * @param $value
     * @return $this
     */
    public function setCreatedAt($value)
    {
        $this->created_at = $value;
        return $this;
    }

    /**
     * Get relation Document
     *
     * @param string $class
     * @return query\DocumentActiveQuery
     */
    public function getDocument($class = '\Document')
    {
        return $this->hasOne(static::findClass($class, __NAMESPACE__), ['id' => 'document_id']);
    }

}
