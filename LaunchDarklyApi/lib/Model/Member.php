<?php
/**
 * Member
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
 * OpenAPI spec version: 2.0.13
 * Contact: support@launchdarkly.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
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
 * Member Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Member implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Member';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        '_links' => '\LaunchDarklyApi\Model\Links',
        '_id' => '\LaunchDarklyApi\Model\Id',
        'role' => '\LaunchDarklyApi\Model\Role',
        'email' => 'string',
        '_pending_invite' => 'bool',
        'is_beta' => 'bool',
        'custom_roles' => '\LaunchDarklyApi\Model\Id[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        '_links' => null,
        '_id' => null,
        'role' => null,
        'email' => null,
        '_pending_invite' => null,
        'is_beta' => null,
        'custom_roles' => null
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
        '_links' => '_links',
        '_id' => '_id',
        'role' => 'role',
        'email' => 'email',
        '_pending_invite' => '_pendingInvite',
        'is_beta' => 'isBeta',
        'custom_roles' => 'customRoles'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        '_links' => 'setLinks',
        '_id' => 'setId',
        'role' => 'setRole',
        'email' => 'setEmail',
        '_pending_invite' => 'setPendingInvite',
        'is_beta' => 'setIsBeta',
        'custom_roles' => 'setCustomRoles'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        '_links' => 'getLinks',
        '_id' => 'getId',
        'role' => 'getRole',
        'email' => 'getEmail',
        '_pending_invite' => 'getPendingInvite',
        'is_beta' => 'getIsBeta',
        'custom_roles' => 'getCustomRoles'
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
        $this->container['_links'] = isset($data['_links']) ? $data['_links'] : null;
        $this->container['_id'] = isset($data['_id']) ? $data['_id'] : null;
        $this->container['role'] = isset($data['role']) ? $data['role'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['_pending_invite'] = isset($data['_pending_invite']) ? $data['_pending_invite'] : null;
        $this->container['is_beta'] = isset($data['is_beta']) ? $data['is_beta'] : null;
        $this->container['custom_roles'] = isset($data['custom_roles']) ? $data['custom_roles'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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

        return true;
    }


    /**
     * Gets _links
     *
     * @return \LaunchDarklyApi\Model\Links
     */
    public function getLinks()
    {
        return $this->container['_links'];
    }

    /**
     * Sets _links
     *
     * @param \LaunchDarklyApi\Model\Links $_links _links
     *
     * @return $this
     */
    public function setLinks($_links)
    {
        $this->container['_links'] = $_links;

        return $this;
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
     * Gets role
     *
     * @return \LaunchDarklyApi\Model\Role
     */
    public function getRole()
    {
        return $this->container['role'];
    }

    /**
     * Sets role
     *
     * @param \LaunchDarklyApi\Model\Role $role role
     *
     * @return $this
     */
    public function setRole($role)
    {
        $this->container['role'] = $role;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets _pending_invite
     *
     * @return bool
     */
    public function getPendingInvite()
    {
        return $this->container['_pending_invite'];
    }

    /**
     * Sets _pending_invite
     *
     * @param bool $_pending_invite _pending_invite
     *
     * @return $this
     */
    public function setPendingInvite($_pending_invite)
    {
        $this->container['_pending_invite'] = $_pending_invite;

        return $this;
    }

    /**
     * Gets is_beta
     *
     * @return bool
     */
    public function getIsBeta()
    {
        return $this->container['is_beta'];
    }

    /**
     * Sets is_beta
     *
     * @param bool $is_beta is_beta
     *
     * @return $this
     */
    public function setIsBeta($is_beta)
    {
        $this->container['is_beta'] = $is_beta;

        return $this;
    }

    /**
     * Gets custom_roles
     *
     * @return \LaunchDarklyApi\Model\Id[]
     */
    public function getCustomRoles()
    {
        return $this->container['custom_roles'];
    }

    /**
     * Sets custom_roles
     *
     * @param \LaunchDarklyApi\Model\Id[] $custom_roles custom_roles
     *
     * @return $this
     */
    public function setCustomRoles($custom_roles)
    {
        $this->container['custom_roles'] = $custom_roles;

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


