<?php
/**
 * FeatureFlagApprovalRequest
 *
 * PHP version 5
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * LaunchDarkly REST API
 *
 * Build custom integrations with the LaunchDarkly REST API
 *
 * OpenAPI spec version: 4.0.0
 * Contact: support@launchdarkly.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.8
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace LaunchDarklyApi\Model;

use \ArrayAccess;
use \LaunchDarklyApi\ObjectSerializer;

/**
 * FeatureFlagApprovalRequest Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FeatureFlagApprovalRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'FeatureFlagApprovalRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        '_id' => '\LaunchDarklyApi\Model\Id',
        '_version' => 'int',
        'creation_date' => 'int',
        'requestor_id' => 'string',
        'review_status' => '\LaunchDarklyApi\Model\FeatureFlagApprovalRequestReviewStatus',
        'status' => 'string',
        'applied_by_member_id' => 'string',
        'applied_date' => 'int',
        'all_reviews' => '\LaunchDarklyApi\Model\FeatureFlagApprovalRequestReview[]',
        'notify_member_ids' => 'string[]',
        'instructions' => '\LaunchDarklyApi\Model\SemanticPatchInstruction'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        '_id' => null,
        '_version' => null,
        'creation_date' => null,
        'requestor_id' => null,
        'review_status' => null,
        'status' => null,
        'applied_by_member_id' => null,
        'applied_date' => null,
        'all_reviews' => null,
        'notify_member_ids' => null,
        'instructions' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        '_id' => '_id',
        '_version' => '_version',
        'creation_date' => 'creationDate',
        'requestor_id' => 'requestorId',
        'review_status' => 'reviewStatus',
        'status' => 'status',
        'applied_by_member_id' => 'appliedByMemberID',
        'applied_date' => 'appliedDate',
        'all_reviews' => 'allReviews',
        'notify_member_ids' => 'notifyMemberIds',
        'instructions' => 'instructions'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        '_id' => 'setId',
        '_version' => 'setVersion',
        'creation_date' => 'setCreationDate',
        'requestor_id' => 'setRequestorId',
        'review_status' => 'setReviewStatus',
        'status' => 'setStatus',
        'applied_by_member_id' => 'setAppliedByMemberId',
        'applied_date' => 'setAppliedDate',
        'all_reviews' => 'setAllReviews',
        'notify_member_ids' => 'setNotifyMemberIds',
        'instructions' => 'setInstructions'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        '_id' => 'getId',
        '_version' => 'getVersion',
        'creation_date' => 'getCreationDate',
        'requestor_id' => 'getRequestorId',
        'review_status' => 'getReviewStatus',
        'status' => 'getStatus',
        'applied_by_member_id' => 'getAppliedByMemberId',
        'applied_date' => 'getAppliedDate',
        'all_reviews' => 'getAllReviews',
        'notify_member_ids' => 'getNotifyMemberIds',
        'instructions' => 'getInstructions'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_COMPLETED,
            self::STATUS_FAILED,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['_id'] = isset($data['_id']) ? $data['_id'] : null;
        $this->container['_version'] = isset($data['_version']) ? $data['_version'] : null;
        $this->container['creation_date'] = isset($data['creation_date']) ? $data['creation_date'] : null;
        $this->container['requestor_id'] = isset($data['requestor_id']) ? $data['requestor_id'] : null;
        $this->container['review_status'] = isset($data['review_status']) ? $data['review_status'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['applied_by_member_id'] = isset($data['applied_by_member_id']) ? $data['applied_by_member_id'] : null;
        $this->container['applied_date'] = isset($data['applied_date']) ? $data['applied_date'] : null;
        $this->container['all_reviews'] = isset($data['all_reviews']) ? $data['all_reviews'] : null;
        $this->container['notify_member_ids'] = isset($data['notify_member_ids']) ? $data['notify_member_ids'] : null;
        $this->container['instructions'] = isset($data['instructions']) ? $data['instructions'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets _id
     *
     * @return \LaunchDarklyApi\Model\Id
     */
    public function getId()
    {
        return $this->container['_id'];
    }

    /**
     * Sets _id
     *
     * @param \LaunchDarklyApi\Model\Id $_id _id
     *
     * @return $this
     */
    public function setId($_id)
    {
        $this->container['_id'] = $_id;

        return $this;
    }

    /**
     * Gets _version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['_version'];
    }

    /**
     * Sets _version
     *
     * @param int $_version _version
     *
     * @return $this
     */
    public function setVersion($_version)
    {
        $this->container['_version'] = $_version;

        return $this;
    }

    /**
     * Gets creation_date
     *
     * @return int
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param int $creation_date A unix epoch time in milliseconds specifying the date the approval request was requested
     *
     * @return $this
     */
    public function setCreationDate($creation_date)
    {
        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets requestor_id
     *
     * @return string
     */
    public function getRequestorId()
    {
        return $this->container['requestor_id'];
    }

    /**
     * Sets requestor_id
     *
     * @param string $requestor_id The id of the member that requested the change
     *
     * @return $this
     */
    public function setRequestorId($requestor_id)
    {
        $this->container['requestor_id'] = $requestor_id;

        return $this;
    }

    /**
     * Gets review_status
     *
     * @return \LaunchDarklyApi\Model\FeatureFlagApprovalRequestReviewStatus
     */
    public function getReviewStatus()
    {
        return $this->container['review_status'];
    }

    /**
     * Sets review_status
     *
     * @param \LaunchDarklyApi\Model\FeatureFlagApprovalRequestReviewStatus $review_status review_status
     *
     * @return $this
     */
    public function setReviewStatus($review_status)
    {
        $this->container['review_status'] = $review_status;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status | Name     | Description | | --------:| ----------- | | pending  | the feature flag approval request has not been applied yet | | completed| the feature flag approval request has been applied successfully | | failed   | the feature flag approval request has been applied but the changes were not applied successfully |
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets applied_by_member_id
     *
     * @return string
     */
    public function getAppliedByMemberId()
    {
        return $this->container['applied_by_member_id'];
    }

    /**
     * Sets applied_by_member_id
     *
     * @param string $applied_by_member_id The id of the member that applied the approval request
     *
     * @return $this
     */
    public function setAppliedByMemberId($applied_by_member_id)
    {
        $this->container['applied_by_member_id'] = $applied_by_member_id;

        return $this;
    }

    /**
     * Gets applied_date
     *
     * @return int
     */
    public function getAppliedDate()
    {
        return $this->container['applied_date'];
    }

    /**
     * Sets applied_date
     *
     * @param int $applied_date A unix epoch time in milliseconds specifying the date the approval request was applied
     *
     * @return $this
     */
    public function setAppliedDate($applied_date)
    {
        $this->container['applied_date'] = $applied_date;

        return $this;
    }

    /**
     * Gets all_reviews
     *
     * @return \LaunchDarklyApi\Model\FeatureFlagApprovalRequestReview[]
     */
    public function getAllReviews()
    {
        return $this->container['all_reviews'];
    }

    /**
     * Sets all_reviews
     *
     * @param \LaunchDarklyApi\Model\FeatureFlagApprovalRequestReview[] $all_reviews all_reviews
     *
     * @return $this
     */
    public function setAllReviews($all_reviews)
    {
        $this->container['all_reviews'] = $all_reviews;

        return $this;
    }

    /**
     * Gets notify_member_ids
     *
     * @return string[]
     */
    public function getNotifyMemberIds()
    {
        return $this->container['notify_member_ids'];
    }

    /**
     * Sets notify_member_ids
     *
     * @param string[] $notify_member_ids notify_member_ids
     *
     * @return $this
     */
    public function setNotifyMemberIds($notify_member_ids)
    {
        $this->container['notify_member_ids'] = $notify_member_ids;

        return $this;
    }

    /**
     * Gets instructions
     *
     * @return \LaunchDarklyApi\Model\SemanticPatchInstruction
     */
    public function getInstructions()
    {
        return $this->container['instructions'];
    }

    /**
     * Sets instructions
     *
     * @param \LaunchDarklyApi\Model\SemanticPatchInstruction $instructions instructions
     *
     * @return $this
     */
    public function setInstructions($instructions)
    {
        $this->container['instructions'] = $instructions;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


