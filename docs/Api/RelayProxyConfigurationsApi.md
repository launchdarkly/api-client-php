# LaunchDarklyApi\RelayProxyConfigurationsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteRelayAutoConfig()**](RelayProxyConfigurationsApi.md#deleteRelayAutoConfig) | **DELETE** /api/v2/account/relay-auto-configs/{id} | Delete Relay Proxy config by ID
[**getRelayProxyConfig()**](RelayProxyConfigurationsApi.md#getRelayProxyConfig) | **GET** /api/v2/account/relay-auto-configs/{id} | Get Relay Proxy config
[**getRelayProxyConfigs()**](RelayProxyConfigurationsApi.md#getRelayProxyConfigs) | **GET** /api/v2/account/relay-auto-configs | List Relay Proxy configs
[**patchRelayAutoConfig()**](RelayProxyConfigurationsApi.md#patchRelayAutoConfig) | **PATCH** /api/v2/account/relay-auto-configs/{id} | Update a Relay Proxy config
[**postRelayAutoConfig()**](RelayProxyConfigurationsApi.md#postRelayAutoConfig) | **POST** /api/v2/account/relay-auto-configs | Create a new Relay Proxy config
[**resetRelayAutoConfig()**](RelayProxyConfigurationsApi.md#resetRelayAutoConfig) | **POST** /api/v2/account/relay-auto-configs/{id}/reset | Reset Relay Proxy configuration key


## `deleteRelayAutoConfig()`

```php
deleteRelayAutoConfig($id)
```

Delete Relay Proxy config by ID

Delete a Relay Proxy config.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The relay auto config id

try {
    $apiInstance->deleteRelayAutoConfig($id);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->deleteRelayAutoConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The relay auto config id |

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

## `getRelayProxyConfig()`

```php
getRelayProxyConfig($id): \LaunchDarklyApi\Model\RelayAutoConfigRep
```

Get Relay Proxy config

Get a single Relay Proxy auto config by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The relay auto config id

try {
    $result = $apiInstance->getRelayProxyConfig($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->getRelayProxyConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The relay auto config id |

### Return type

[**\LaunchDarklyApi\Model\RelayAutoConfigRep**](../Model/RelayAutoConfigRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRelayProxyConfigs()`

```php
getRelayProxyConfigs(): \LaunchDarklyApi\Model\RelayAutoConfigCollectionRep
```

List Relay Proxy configs

Get a list of Relay Proxy configurations in the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRelayProxyConfigs();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->getRelayProxyConfigs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\RelayAutoConfigCollectionRep**](../Model/RelayAutoConfigCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchRelayAutoConfig()`

```php
patchRelayAutoConfig($id, $patch_with_comment): \LaunchDarklyApi\Model\RelayAutoConfigRep
```

Update a Relay Proxy config

Update a Relay Proxy configuration. Updating a configuration uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) or [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The relay auto config id
$patch_with_comment = {"patch":[{"op":"replace","path":"/policy/0","value":{"actions":["*"],"effect":"allow","resources":["proj/*:env/qa"]}}]}; // \LaunchDarklyApi\Model\PatchWithComment

try {
    $result = $apiInstance->patchRelayAutoConfig($id, $patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->patchRelayAutoConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The relay auto config id |
 **patch_with_comment** | [**\LaunchDarklyApi\Model\PatchWithComment**](../Model/PatchWithComment.md)|  |

### Return type

[**\LaunchDarklyApi\Model\RelayAutoConfigRep**](../Model/RelayAutoConfigRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postRelayAutoConfig()`

```php
postRelayAutoConfig($relay_auto_config_post): \LaunchDarklyApi\Model\RelayAutoConfigRep
```

Create a new Relay Proxy config

Create a Relay Proxy config.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$relay_auto_config_post = {"name":"Sample Relay Proxy config for all proj and env","policy":[{"actions":["*"],"effect":"allow","resources":["proj/*:env/*"]}]}; // \LaunchDarklyApi\Model\RelayAutoConfigPost

try {
    $result = $apiInstance->postRelayAutoConfig($relay_auto_config_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->postRelayAutoConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **relay_auto_config_post** | [**\LaunchDarklyApi\Model\RelayAutoConfigPost**](../Model/RelayAutoConfigPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\RelayAutoConfigRep**](../Model/RelayAutoConfigRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resetRelayAutoConfig()`

```php
resetRelayAutoConfig($id, $expiry): \LaunchDarklyApi\Model\RelayAutoConfigRep
```

Reset Relay Proxy configuration key

Reset a Relay Proxy configuration's secret key with an optional expiry time for the old key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The Relay Proxy configuration ID
$expiry = 56; // int | An expiration time for the old Relay Proxy configuration key, expressed as a Unix epoch time in milliseconds. By default, the Relay Proxy configuration will expire immediately.

try {
    $result = $apiInstance->resetRelayAutoConfig($id, $expiry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->resetRelayAutoConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The Relay Proxy configuration ID |
 **expiry** | **int**| An expiration time for the old Relay Proxy configuration key, expressed as a Unix epoch time in milliseconds. By default, the Relay Proxy configuration will expire immediately. | [optional]

### Return type

[**\LaunchDarklyApi\Model\RelayAutoConfigRep**](../Model/RelayAutoConfigRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
