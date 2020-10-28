# LaunchDarklyApi\IntegrationsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteIntegrationSubscription**](IntegrationsApi.md#deleteIntegrationSubscription) | **DELETE** /integrations/{integrationKey}/{integrationId} | Delete an integration subscription by ID.
[**getIntegrationSubscription**](IntegrationsApi.md#getIntegrationSubscription) | **GET** /integrations/{integrationKey}/{integrationId} | Get a single integration subscription by ID.
[**getIntegrationSubscriptions**](IntegrationsApi.md#getIntegrationSubscriptions) | **GET** /integrations/{integrationKey} | Get a list of all configured integrations of a given kind.
[**getIntegrations**](IntegrationsApi.md#getIntegrations) | **GET** /integrations | Get a list of all configured audit log event integrations associated with this account.
[**patchIntegrationSubscription**](IntegrationsApi.md#patchIntegrationSubscription) | **PATCH** /integrations/{integrationKey}/{integrationId} | Modify an integration subscription by ID.
[**postIntegrationSubscription**](IntegrationsApi.md#postIntegrationSubscription) | **POST** /integrations/{integrationKey} | Create a new integration subscription of a given kind.


# **deleteIntegrationSubscription**
> deleteIntegrationSubscription($integration_key, $integration_id)

Delete an integration subscription by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = "integration_key_example"; // string | The key used to specify the integration kind.
$integration_id = "integration_id_example"; // string | The integration ID.

try {
    $apiInstance->deleteIntegrationSubscription($integration_key, $integration_id);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->deleteIntegrationSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The key used to specify the integration kind. |
 **integration_id** | **string**| The integration ID. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getIntegrationSubscription**
> \LaunchDarklyApi\Model\IntegrationSubscription getIntegrationSubscription($integration_key, $integration_id)

Get a single integration subscription by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = "integration_key_example"; // string | The key used to specify the integration kind.
$integration_id = "integration_id_example"; // string | The integration ID.

try {
    $result = $apiInstance->getIntegrationSubscription($integration_key, $integration_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->getIntegrationSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The key used to specify the integration kind. |
 **integration_id** | **string**| The integration ID. |

### Return type

[**\LaunchDarklyApi\Model\IntegrationSubscription**](../Model/IntegrationSubscription.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getIntegrationSubscriptions**
> \LaunchDarklyApi\Model\Integration getIntegrationSubscriptions($integration_key)

Get a list of all configured integrations of a given kind.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = "integration_key_example"; // string | The key used to specify the integration kind.

try {
    $result = $apiInstance->getIntegrationSubscriptions($integration_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->getIntegrationSubscriptions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The key used to specify the integration kind. |

### Return type

[**\LaunchDarklyApi\Model\Integration**](../Model/Integration.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getIntegrations**
> \LaunchDarklyApi\Model\Integrations getIntegrations()

Get a list of all configured audit log event integrations associated with this account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getIntegrations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->getIntegrations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\Integrations**](../Model/Integrations.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchIntegrationSubscription**
> \LaunchDarklyApi\Model\IntegrationSubscription patchIntegrationSubscription($integration_key, $integration_id, $patch_delta)

Modify an integration subscription by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = "integration_key_example"; // string | The key used to specify the integration kind.
$integration_id = "integration_id_example"; // string | The integration ID.
$patch_delta = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[] | Requires a JSON Patch representation of the desired changes to the project. 'http://jsonpatch.com/'

try {
    $result = $apiInstance->patchIntegrationSubscription($integration_key, $integration_id, $patch_delta);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->patchIntegrationSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The key used to specify the integration kind. |
 **integration_id** | **string**| The integration ID. |
 **patch_delta** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)| Requires a JSON Patch representation of the desired changes to the project. &#39;http://jsonpatch.com/&#39; |

### Return type

[**\LaunchDarklyApi\Model\IntegrationSubscription**](../Model/IntegrationSubscription.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postIntegrationSubscription**
> \LaunchDarklyApi\Model\IntegrationSubscription postIntegrationSubscription($integration_key, $subscription_body)

Create a new integration subscription of a given kind.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = "integration_key_example"; // string | The key used to specify the integration kind.
$subscription_body = new \LaunchDarklyApi\Model\SubscriptionBody(); // \LaunchDarklyApi\Model\SubscriptionBody | Create a new integration subscription.

try {
    $result = $apiInstance->postIntegrationSubscription($integration_key, $subscription_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->postIntegrationSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The key used to specify the integration kind. |
 **subscription_body** | [**\LaunchDarklyApi\Model\SubscriptionBody**](../Model/SubscriptionBody.md)| Create a new integration subscription. |

### Return type

[**\LaunchDarklyApi\Model\IntegrationSubscription**](../Model/IntegrationSubscription.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

