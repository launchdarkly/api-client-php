<?php
/**
 * EnvironmentPost
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
 * OpenAPI spec version: 5.0.2
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
 * EnvironmentPost Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class EnvironmentPost implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'EnvironmentPost';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'key' => 'string',
        'color' => 'string',
        'default_ttl' => 'float',
        'secure_mode' => 'bool',
        'default_track_events' => 'bool',
        'tags' => 'string[]',
        'require_comments' => 'bool',
        'confirm_changes' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'key' => null,
        'color' => null,
        'default_ttl' => null,
        'secure_mode' => null,
        'default_track_events' => null,
        'tags' => null,
        'require_comments' => null,
        'confirm_changes' => null
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
        'key' => 'key',
        'color' => 'color',
        'default_ttl' => 'defaultTtl',
        'secure_mode' => 'secureMode',
        'default_track_events' => 'defaultTrackEvents',
        'tags' => 'tags',
        'require_comments' => 'requireComments',
        'confirm_changes' => 'confirmChanges'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'key' => 'setKey',
        'color' => 'setColor',
        'default_ttl' => 'setDefaultTtl',
        'secure_mode' => 'setSecureMode',
        'default_track_events' => 'setDefaultTrackEvents',
        'tags' => 'setTags',
        'require_comments' => 'setRequireComments',
        'confirm_changes' => 'setConfirmChanges'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'key' => 'getKey',
        'color' => 'getColor',
        'default_ttl' => 'getDefaultTtl',
        'secure_mode' => 'getSecureMode',
        'default_track_events' => 'getDefaultTrackEvents',
        'tags' => 'getTags',
        'require_comments' => 'getRequireComments',
        'confirm_changes' => 'getConfirmChanges'
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
        $this->container['key'] = isset($data['key']) ? $data['key'] : null;
        $this->container['color'] = isset($data['color']) ? $data['color'] : null;
        $this->container['default_ttl'] = isset($data['default_ttl']) ? $data['default_ttl'] : null;
        $this->container['secure_mode'] = isset($data['secure_mode']) ? $data['secure_mode'] : null;
        $this->container['default_track_events'] = isset($data['default_track_events']) ? $data['default_track_events'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['require_comments'] = isset($data['require_comments']) ? $data['require_comments'] : null;
        $this->container['confirm_changes'] = isset($data['confirm_changes']) ? $data['confirm_changes'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['key'] === null) {
            $invalidProperties[] = "'key' can't be null";
        }
        if ($this->container['color'] === null) {
            $invalidProperties[] = "'color' can't be null";
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
     * @param string $name The name of the new environment.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->container['key'];
    }

    /**
     * Sets key
     *
     * @param string $key A project-unique key for the new environment.
     *
     * @return $this
     */
    public function setKey($key)
    {
        $this->container['key'] = $key;

        return $this;
    }

    /**
     * Gets color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->container['color'];
    }

    /**
     * Sets color
     *
     * @param string $color A color swatch (as an RGB hex value with no leading '#', e.g. C8C8C8).
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->container['color'] = $color;

        return $this;
    }

    /**
     * Gets default_ttl
     *
     * @return float
     */
    public function getDefaultTtl()
    {
        return $this->container['default_ttl'];
    }

    /**
     * Sets default_ttl
     *
     * @param float $default_ttl The default TTL for the new environment.
     *
     * @return $this
     */
    public function setDefaultTtl($default_ttl)
    {
        $this->container['default_ttl'] = $default_ttl;

        return $this;
    }

    /**
     * Gets secure_mode
     *
     * @return bool
     */
    public function getSecureMode()
    {
        return $this->container['secure_mode'];
    }

    /**
     * Sets secure_mode
     *
     * @param bool $secure_mode Determines whether the environment is in secure mode.
     *
     * @return $this
     */
    public function setSecureMode($secure_mode)
    {
        $this->container['secure_mode'] = $secure_mode;

        return $this;
    }

    /**
     * Gets default_track_events
     *
     * @return bool
     */
    public function getDefaultTrackEvents()
    {
        return $this->container['default_track_events'];
    }

    /**
     * Sets default_track_events
     *
     * @param bool $default_track_events Set to true to send detailed event information for newly created flags.
     *
     * @return $this
     */
    public function setDefaultTrackEvents($default_track_events)
    {
        $this->container['default_track_events'] = $default_track_events;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return string[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string[] $tags An array of tags for this environment.
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets require_comments
     *
     * @return bool
     */
    public function getRequireComments()
    {
        return $this->container['require_comments'];
    }

    /**
     * Sets require_comments
     *
     * @param bool $require_comments Determines if this environment requires comments for flag and segment changes.
     *
     * @return $this
     */
    public function setRequireComments($require_comments)
    {
        $this->container['require_comments'] = $require_comments;

        return $this;
    }

    /**
     * Gets confirm_changes
     *
     * @return bool
     */
    public function getConfirmChanges()
    {
        return $this->container['confirm_changes'];
    }

    /**
     * Sets confirm_changes
     *
     * @param bool $confirm_changes Determines if this environment requires confirmation for flag and segment changes.
     *
     * @return $this
     */
    public function setConfirmChanges($confirm_changes)
    {
        $this->container['confirm_changes'] = $confirm_changes;

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


