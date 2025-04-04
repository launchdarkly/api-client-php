# LaunchDarklyApi\DataExportDestinationsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteDestination()**](DataExportDestinationsApi.md#deleteDestination) | **DELETE** /api/v2/destinations/{projectKey}/{environmentKey}/{id} | Delete Data Export destination
[**getDestination()**](DataExportDestinationsApi.md#getDestination) | **GET** /api/v2/destinations/{projectKey}/{environmentKey}/{id} | Get destination
[**getDestinations()**](DataExportDestinationsApi.md#getDestinations) | **GET** /api/v2/destinations | List destinations
[**patchDestination()**](DataExportDestinationsApi.md#patchDestination) | **PATCH** /api/v2/destinations/{projectKey}/{environmentKey}/{id} | Update Data Export destination
[**postDestination()**](DataExportDestinationsApi.md#postDestination) | **POST** /api/v2/destinations/{projectKey}/{environmentKey} | Create Data Export destination
[**postGenerateWarehouseDestinationKeyPair()**](DataExportDestinationsApi.md#postGenerateWarehouseDestinationKeyPair) | **POST** /api/v2/destinations/generate-warehouse-destination-key-pair | Generate Snowflake destination key pair


## `deleteDestination()`

```php
deleteDestination($project_key, $environment_key, $id)
```

Delete Data Export destination

Delete a Data Export destination by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\DataExportDestinationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The Data Export destination ID

try {
    $apiInstance->deleteDestination($project_key, $environment_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->deleteDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The Data Export destination ID |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDestination()`

```php
getDestination($project_key, $environment_key, $id): \LaunchDarklyApi\Model\Destination
```

Get destination

Get a single Data Export destination by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\DataExportDestinationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The Data Export destination ID

try {
    $result = $apiInstance->getDestination($project_key, $environment_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->getDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The Data Export destination ID |

### Return type

[**\LaunchDarklyApi\Model\Destination**](../Model/Destination.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDestinations()`

```php
getDestinations(): \LaunchDarklyApi\Model\Destinations
```

List destinations

Get a list of Data Export destinations configured across all projects and environments.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\DataExportDestinationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getDestinations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->getDestinations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\Destinations**](../Model/Destinations.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchDestination()`

```php
patchDestination($project_key, $environment_key, $id, $patch_operation): \LaunchDarklyApi\Model\Destination
```

Update Data Export destination

Update a Data Export destination. Updating a destination uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) or [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\DataExportDestinationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The Data Export destination ID
$patch_operation = [{"op":"replace","path":"/config/topic","value":"ld-pubsub-test-192302"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchDestination($project_key, $environment_key, $id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->patchDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The Data Export destination ID |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Destination**](../Model/Destination.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postDestination()`

```php
postDestination($project_key, $environment_key, $destination_post): \LaunchDarklyApi\Model\Destination
```

Create Data Export destination

Create a new Data Export destination.  In the `config` request body parameter, the fields required depend on the type of Data Export destination.  <details> <summary>Click to expand <code>config</code> parameter details</summary>  #### Azure Event Hubs  To create a Data Export destination with a `kind` of `azure-event-hubs`, the `config` object requires the following fields:  * `namespace`: The Event Hub Namespace name * `name`: The Event Hub name * `policyName`: The shared access signature policy name. You can find your policy name in the settings of your Azure Event Hubs Namespace. * `policyKey`: The shared access signature key. You can find your policy key in the settings of your Azure Event Hubs Namespace.  #### Google Cloud Pub/Sub  To create a Data Export destination with a `kind` of `google-pubsub`, the `config` object requires the following fields:  * `project`: The Google PubSub project ID for the project to publish to * `topic`: The Google PubSub topic ID for the topic to publish to  #### Amazon Kinesis  To create a Data Export destination with a `kind` of `kinesis`, the `config` object requires the following fields:  * `region`: The Kinesis stream's AWS region key * `roleArn`: The Amazon Resource Name (ARN) of the AWS role that will be writing to Kinesis * `streamName`: The name of the Kinesis stream that LaunchDarkly is sending events to. This is not the ARN of the stream.  #### mParticle  To create a Data Export destination with a `kind` of `mparticle`, the `config` object requires the following fields:  * `apiKey`: The mParticle API key * `secret`: The mParticle API secret * `userIdentity`: The type of identifier you use to identify your end users in mParticle * `anonymousUserIdentity`: The type of identifier you use to identify your anonymous end users in mParticle  #### Segment  To create a Data Export destination with a `kind` of `segment`, the `config` object requires the following fields:  * `writeKey`: The Segment write key. This is used to authenticate LaunchDarkly's calls to Segment.  #### Snowflake  To create a Data Export destination with a `kind` of `snowflake-v2`, the `config` object requires the following fields:  * `publicKey`: The `publicKey` is returned as part of the [Generate Snowflake destination key pair](https://launchdarkly.com/docs/api/data-export-destinations/post-generate-warehouse-destination-key-pair) response. It is the `public_key` field. * `snowflakeHostAddress`: Your Snowflake account URL.  </details>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\DataExportDestinationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$destination_post = {"config":{"project":"test-prod","topic":"ld-pubsub-test-192301"},"kind":"google-pubsub"}; // \LaunchDarklyApi\Model\DestinationPost

try {
    $result = $apiInstance->postDestination($project_key, $environment_key, $destination_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->postDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **destination_post** | [**\LaunchDarklyApi\Model\DestinationPost**](../Model/DestinationPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Destination**](../Model/Destination.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postGenerateWarehouseDestinationKeyPair()`

```php
postGenerateWarehouseDestinationKeyPair(): \LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep
```

Generate Snowflake destination key pair

Generate key pair to allow Data Export to authenticate into a Snowflake warehouse destination

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\DataExportDestinationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->postGenerateWarehouseDestinationKeyPair();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->postGenerateWarehouseDestinationKeyPair: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep**](../Model/GenerateWarehouseDestinationKeyPairPostRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
