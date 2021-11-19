# LaunchDarklyApi\DataExportDestinationsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteDestination()**](DataExportDestinationsApi.md#deleteDestination) | **DELETE** /api/v2/destinations/{projKey}/{envKey}/{id} | Delete Data Export destination
[**getDestination()**](DataExportDestinationsApi.md#getDestination) | **GET** /api/v2/destinations/{projKey}/{envKey}/{id} | Get destination
[**getDestinations()**](DataExportDestinationsApi.md#getDestinations) | **GET** /api/v2/destinations | List destinations
[**patchDestination()**](DataExportDestinationsApi.md#patchDestination) | **PATCH** /api/v2/destinations/{projKey}/{envKey}/{id} | Update Data Export destination
[**postDestination()**](DataExportDestinationsApi.md#postDestination) | **POST** /api/v2/destinations/{projKey}/{envKey} | Create data export destination


## `deleteDestination()`

```php
deleteDestination($proj_key, $env_key, $id)
```

Delete Data Export destination

Delete Data Export destination by ID

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$id = 'id_example'; // string | The Data Export destination ID

try {
    $apiInstance->deleteDestination($proj_key, $env_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->deleteDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
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
getDestination($proj_key, $env_key, $id): \LaunchDarklyApi\Model\Destination
```

Get destination

Get a single Data Export destination by ID

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$id = 'id_example'; // string | The Data Export destination ID

try {
    $result = $apiInstance->getDestination($proj_key, $env_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->getDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
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
patchDestination($proj_key, $env_key, $id, $patch_operation): \LaunchDarklyApi\Model\Destination
```

Update Data Export destination

Update a Data Export destination. This requires a JSON Patch representation of the modified destination.

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$id = 'id_example'; // string | The Data Export destination ID
$patch_operation = [{"op":"replace","path":"/config/topic","value":"ld-pubsub-test-192302"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchDestination($proj_key, $env_key, $id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->patchDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
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
postDestination($proj_key, $env_key, $destination_post): \LaunchDarklyApi\Model\Destination
```

Create data export destination

Create a new destination. The `config` body parameter represents the configuration parameters required for a destination type.

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$destination_post = {"config":{"project":"test-prod","topic":"ld-pubsub-test-192301"},"kind":"google-pubsub"}; // \LaunchDarklyApi\Model\DestinationPost

try {
    $result = $apiInstance->postDestination($proj_key, $env_key, $destination_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataExportDestinationsApi->postDestination: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
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
