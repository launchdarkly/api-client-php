<?php
/**
 * TokenBody
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
 * OpenAPI spec version: 5.3.0
 * Contact: support@launchdarkly.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.17
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
 * TokenBody Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TokenBody implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'tokenBody';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'role' => 'string',
        'custom_role_ids' => 'string[]',
        'inline_role' => '\LaunchDarklyApi\Model\Statement[]',
        'service_token' => 'bool',
        'default_api_version' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'role' => null,
        'custom_role_ids' => null,
        'inline_role' => null,
        'service_token' => null,
        'default_api_version' => null
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
        'name' => 'name',
        'role' => 'role',
        'custom_role_ids' => 'customRoleIds',
        'inline_role' => 'inlineRole',
        'service_token' => 'serviceToken',
        'default_api_version' => 'defaultApiVersion'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'role' => 'setRole',
        'custom_role_ids' => 'setCustomRoleIds',
        'inline_role' => 'setInlineRole',
        'service_token' => 'setServiceToken',
        'default_api_version' => 'setDefaultApiVersion'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'role' => 'getRole',
        'custom_role_ids' => 'getCustomRoleIds',
        'inline_role' => 'getInlineRole',
        'service_token' => 'getServiceToken',
        'default_api_version' => 'getDefaultApiVersion'
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['role'] = isset($data['role']) ? $data['role'] : null;
        $this->container['custom_role_ids'] = isset($data['custom_role_ids']) ? $data['custom_role_ids'] : null;
        $this->container['inline_role'] = isset($data['inline_role']) ? $data['inline_role'] : null;
        $this->container['service_token'] = isset($data['service_token']) ? $data['service_token'] : null;
        $this->container['default_api_version'] = isset($data['default_api_version']) ? $data['default_api_version'] : null;
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
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name A human-friendly name for the access token
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->container['role'];
    }

    /**
     * Sets role
     *
     * @param string $role The name of a built-in role for the token
     *
     * @return $this
     */
    public function setRole($role)
    {
        $this->container['role'] = $role;

        return $this;
    }

    /**
     * Gets custom_role_ids
     *
     * @return string[]
     */
    public function getCustomRoleIds()
    {
        return $this->container['custom_role_ids'];
    }

    /**
     * Sets custom_role_ids
     *
     * @param string[] $custom_role_ids A list of custom role IDs to use as access limits for the access token
     *
     * @return $this
     */
    public function setCustomRoleIds($custom_role_ids)
    {
        $this->container['custom_role_ids'] = $custom_role_ids;

        return $this;
    }

    /**
     * Gets inline_role
     *
     * @return \LaunchDarklyApi\Model\Statement[]
     */
    public function getInlineRole()
    {
        return $this->container['inline_role'];
    }

    /**
     * Sets inline_role
     *
     * @param \LaunchDarklyApi\Model\Statement[] $inline_role inline_role
     *
     * @return $this
     */
    public function setInlineRole($inline_role)
    {
        $this->container['inline_role'] = $inline_role;

        return $this;
    }

    /**
     * Gets service_token
     *
     * @return bool
     */
    public function getServiceToken()
    {
        return $this->container['service_token'];
    }

    /**
     * Sets service_token
     *
     * @param bool $service_token Whether the token will be a service token https://docs.launchdarkly.com/home/account-security/api-access-tokens#service-tokens
     *
     * @return $this
     */
    public function setServiceToken($service_token)
    {
        $this->container['service_token'] = $service_token;

        return $this;
    }

    /**
     * Gets default_api_version
     *
     * @return int
     */
    public function getDefaultApiVersion()
    {
        return $this->container['default_api_version'];
    }

    /**
     * Sets default_api_version
     *
     * @param int $default_api_version The default API version for this token
     *
     * @return $this
     */
    public function setDefaultApiVersion($default_api_version)
    {
        $this->container['default_api_version'] = $default_api_version;

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


