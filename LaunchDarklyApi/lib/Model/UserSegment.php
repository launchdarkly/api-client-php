<?php
/**
 * UserSegment
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
 * UserSegment Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class UserSegment implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UserSegment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'key' => 'string',
        'name' => 'string',
        'description' => 'string',
        'tags' => 'string[]',
        'creation_date' => 'int',
        'included' => 'string[]',
        'excluded' => 'string[]',
        'rules' => '\LaunchDarklyApi\Model\UserSegmentRule[]',
        'unbounded' => 'bool',
        'version' => 'int',
        '_links' => '\LaunchDarklyApi\Model\Links',
        '_flags' => '\LaunchDarklyApi\Model\FlagListItem[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'key' => null,
        'name' => null,
        'description' => null,
        'tags' => null,
        'creation_date' => 'int64',
        'included' => null,
        'excluded' => null,
        'rules' => null,
        'unbounded' => null,
        'version' => null,
        '_links' => null,
        '_flags' => null
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
        'key' => 'key',
        'name' => 'name',
        'description' => 'description',
        'tags' => 'tags',
        'creation_date' => 'creationDate',
        'included' => 'included',
        'excluded' => 'excluded',
        'rules' => 'rules',
        'unbounded' => 'unbounded',
        'version' => 'version',
        '_links' => '_links',
        '_flags' => '_flags'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'key' => 'setKey',
        'name' => 'setName',
        'description' => 'setDescription',
        'tags' => 'setTags',
        'creation_date' => 'setCreationDate',
        'included' => 'setIncluded',
        'excluded' => 'setExcluded',
        'rules' => 'setRules',
        'unbounded' => 'setUnbounded',
        'version' => 'setVersion',
        '_links' => 'setLinks',
        '_flags' => 'setFlags'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'key' => 'getKey',
        'name' => 'getName',
        'description' => 'getDescription',
        'tags' => 'getTags',
        'creation_date' => 'getCreationDate',
        'included' => 'getIncluded',
        'excluded' => 'getExcluded',
        'rules' => 'getRules',
        'unbounded' => 'getUnbounded',
        'version' => 'getVersion',
        '_links' => 'getLinks',
        '_flags' => 'getFlags'
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
        $this->container['key'] = isset($data['key']) ? $data['key'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['creation_date'] = isset($data['creation_date']) ? $data['creation_date'] : null;
        $this->container['included'] = isset($data['included']) ? $data['included'] : null;
        $this->container['excluded'] = isset($data['excluded']) ? $data['excluded'] : null;
        $this->container['rules'] = isset($data['rules']) ? $data['rules'] : null;
        $this->container['unbounded'] = isset($data['unbounded']) ? $data['unbounded'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['_links'] = isset($data['_links']) ? $data['_links'] : null;
        $this->container['_flags'] = isset($data['_flags']) ? $data['_flags'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['key'] === null) {
            $invalidProperties[] = "'key' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['creation_date'] === null) {
            $invalidProperties[] = "'creation_date' can't be null";
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
     * @param string $key Unique identifier for the user segment.
     *
     * @return $this
     */
    public function setKey($key)
    {
        $this->container['key'] = $key;

        return $this;
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
     * @param string $name Name of the user segment.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Description of the user segment.
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

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
     * @param string[] $tags An array of tags for this user segment.
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

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
     * @param int $creation_date A unix epoch time in milliseconds specifying the creation time of this flag.
     *
     * @return $this
     */
    public function setCreationDate($creation_date)
    {
        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets included
     *
     * @return string[]
     */
    public function getIncluded()
    {
        return $this->container['included'];
    }

    /**
     * Sets included
     *
     * @param string[] $included An array of user keys that are included in this segment.
     *
     * @return $this
     */
    public function setIncluded($included)
    {
        $this->container['included'] = $included;

        return $this;
    }

    /**
     * Gets excluded
     *
     * @return string[]
     */
    public function getExcluded()
    {
        return $this->container['excluded'];
    }

    /**
     * Sets excluded
     *
     * @param string[] $excluded An array of user keys that should not be included in this segment, unless they are also listed in \"included\".
     *
     * @return $this
     */
    public function setExcluded($excluded)
    {
        $this->container['excluded'] = $excluded;

        return $this;
    }

    /**
     * Gets rules
     *
     * @return \LaunchDarklyApi\Model\UserSegmentRule[]
     */
    public function getRules()
    {
        return $this->container['rules'];
    }

    /**
     * Sets rules
     *
     * @param \LaunchDarklyApi\Model\UserSegmentRule[] $rules An array of rules that can cause a user to be included in this segment.
     *
     * @return $this
     */
    public function setRules($rules)
    {
        $this->container['rules'] = $rules;

        return $this;
    }

    /**
     * Gets unbounded
     *
     * @return bool
     */
    public function getUnbounded()
    {
        return $this->container['unbounded'];
    }

    /**
     * Sets unbounded
     *
     * @param bool $unbounded Controls whether this is considered a \"big segment\" which can support an unlimited numbers of users. Include/exclude lists sent with this payload are not used in big segments. Contact your account manager for early access to this feature.
     *
     * @return $this
     */
    public function setUnbounded($unbounded)
    {
        $this->container['unbounded'] = $unbounded;

        return $this;
    }

    /**
     * Gets version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param int $version version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

        return $this;
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
     * Gets _flags
     *
     * @return \LaunchDarklyApi\Model\FlagListItem[]
     */
    public function getFlags()
    {
        return $this->container['_flags'];
    }

    /**
     * Sets _flags
     *
     * @param \LaunchDarklyApi\Model\FlagListItem[] $_flags _flags
     *
     * @return $this
     */
    public function setFlags($_flags)
    {
        $this->container['_flags'] = $_flags;

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


