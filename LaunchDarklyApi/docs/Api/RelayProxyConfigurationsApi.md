# LaunchDarklyApi\RelayProxyConfigurationsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteRelayProxyConfig**](RelayProxyConfigurationsApi.md#deleteRelayProxyConfig) | **DELETE** /account/relay-auto-configs/{id} | Delete a relay proxy configuration by ID.
[**getRelayProxyConfig**](RelayProxyConfigurationsApi.md#getRelayProxyConfig) | **GET** /account/relay-auto-configs/{id} | Get a single relay proxy configuration by ID.
[**getRelayProxyConfigs**](RelayProxyConfigurationsApi.md#getRelayProxyConfigs) | **GET** /account/relay-auto-configs | Returns a list of relay proxy configurations in the account.
[**patchRelayProxyConfig**](RelayProxyConfigurationsApi.md#patchRelayProxyConfig) | **PATCH** /account/relay-auto-configs/{id} | Modify a relay proxy configuration by ID.
[**postRelayAutoConfig**](RelayProxyConfigurationsApi.md#postRelayAutoConfig) | **POST** /account/relay-auto-configs | Create a new relay proxy config.
[**resetRelayProxyConfig**](RelayProxyConfigurationsApi.md#resetRelayProxyConfig) | **POST** /account/relay-auto-configs/{id}/reset | Reset a relay proxy configuration&#39;s secret key with an optional expiry time for the old key.


# **deleteRelayProxyConfig**
> deleteRelayProxyConfig($id)

Delete a relay proxy configuration by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | The relay proxy configuration ID

try {
    $apiInstance->deleteRelayProxyConfig($id);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->deleteRelayProxyConfig: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The relay proxy configuration ID |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRelayProxyConfig**
> \LaunchDarklyApi\Model\RelayProxyConfig getRelayProxyConfig($id)

Get a single relay proxy configuration by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | The relay proxy configuration ID

try {
    $result = $apiInstance->getRelayProxyConfig($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->getRelayProxyConfig: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The relay proxy configuration ID |

### Return type

[**\LaunchDarklyApi\Model\RelayProxyConfig**](../Model/RelayProxyConfig.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRelayProxyConfigs**
> \LaunchDarklyApi\Model\RelayProxyConfigs getRelayProxyConfigs()

Returns a list of relay proxy configurations in the account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
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
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\RelayProxyConfigs**](../Model/RelayProxyConfigs.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchRelayProxyConfig**
> \LaunchDarklyApi\Model\RelayProxyConfig patchRelayProxyConfig($id, $patch_delta)

Modify a relay proxy configuration by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | The relay proxy configuration ID
$patch_delta = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[] | Requires a JSON Patch representation of the desired changes to the project. 'http://jsonpatch.com/'

try {
    $result = $apiInstance->patchRelayProxyConfig($id, $patch_delta);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->patchRelayProxyConfig: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The relay proxy configuration ID |
 **patch_delta** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)| Requires a JSON Patch representation of the desired changes to the project. &#39;http://jsonpatch.com/&#39; |

### Return type

[**\LaunchDarklyApi\Model\RelayProxyConfig**](../Model/RelayProxyConfig.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postRelayAutoConfig**
> \LaunchDarklyApi\Model\RelayProxyConfig postRelayAutoConfig($relay_proxy_config_body)

Create a new relay proxy config.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$relay_proxy_config_body = new \LaunchDarklyApi\Model\RelayProxyConfigBody(); // \LaunchDarklyApi\Model\RelayProxyConfigBody | Create a new relay proxy configuration

try {
    $result = $apiInstance->postRelayAutoConfig($relay_proxy_config_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->postRelayAutoConfig: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **relay_proxy_config_body** | [**\LaunchDarklyApi\Model\RelayProxyConfigBody**](../Model/RelayProxyConfigBody.md)| Create a new relay proxy configuration |

### Return type

[**\LaunchDarklyApi\Model\RelayProxyConfig**](../Model/RelayProxyConfig.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resetRelayProxyConfig**
> \LaunchDarklyApi\Model\RelayProxyConfig resetRelayProxyConfig($id, $expiry)

Reset a relay proxy configuration's secret key with an optional expiry time for the old key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\RelayProxyConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | The relay proxy configuration ID
$expiry = 789; // int | An expiration time for the old relay proxy configuration key, expressed as a Unix epoch time in milliseconds. By default, the relay proxy configuration will expire immediately

try {
    $result = $apiInstance->resetRelayProxyConfig($id, $expiry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RelayProxyConfigurationsApi->resetRelayProxyConfig: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The relay proxy configuration ID |
 **expiry** | **int**| An expiration time for the old relay proxy configuration key, expressed as a Unix epoch time in milliseconds. By default, the relay proxy configuration will expire immediately | [optional]

### Return type

[**\LaunchDarklyApi\Model\RelayProxyConfig**](../Model/RelayProxyConfig.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

