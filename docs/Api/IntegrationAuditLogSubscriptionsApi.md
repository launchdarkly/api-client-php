# LaunchDarklyApi\IntegrationAuditLogSubscriptionsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createSubscription()**](IntegrationAuditLogSubscriptionsApi.md#createSubscription) | **POST** /api/v2/integrations/{integrationKey} | Create audit log subscription
[**deleteSubscription()**](IntegrationAuditLogSubscriptionsApi.md#deleteSubscription) | **DELETE** /api/v2/integrations/{integrationKey}/{id} | Delete audit log subscription
[**getSubscriptionByID()**](IntegrationAuditLogSubscriptionsApi.md#getSubscriptionByID) | **GET** /api/v2/integrations/{integrationKey}/{id} | Get audit log subscription by ID
[**getSubscriptions()**](IntegrationAuditLogSubscriptionsApi.md#getSubscriptions) | **GET** /api/v2/integrations/{integrationKey} | Get audit log subscriptions by integration
[**updateSubscription()**](IntegrationAuditLogSubscriptionsApi.md#updateSubscription) | **PATCH** /api/v2/integrations/{integrationKey}/{id} | Update audit log subscription


## `createSubscription()`

```php
createSubscription($integration_key, $subscription_post): \LaunchDarklyApi\Model\Integration
```

Create audit log subscription

Create an audit log subscription.<br /><br />For each subscription, you must specify the set of resources you wish to subscribe to audit log notifications for. You can describe these resources using a custom role policy. To learn more, read [Custom role concepts](https://launchdarkly.com/docs/home/account/role-concepts).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationAuditLogSubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = 'integration_key_example'; // string | The integration key
$subscription_post = {"config":{"optional":"an optional property","required":"the required property","url":"https://example.com"},"name":"Example audit log subscription.","on":false,"statements":[{"actions":["*"],"effect":"allow","resources":["proj/*:env/*:flag/*;testing-tag"]}],"tags":["testing-tag"]}; // \LaunchDarklyApi\Model\SubscriptionPost

try {
    $result = $apiInstance->createSubscription($integration_key, $subscription_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationAuditLogSubscriptionsApi->createSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The integration key |
 **subscription_post** | [**\LaunchDarklyApi\Model\SubscriptionPost**](../Model/SubscriptionPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Integration**](../Model/Integration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSubscription()`

```php
deleteSubscription($integration_key, $id)
```

Delete audit log subscription

Delete an audit log subscription.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationAuditLogSubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = 'integration_key_example'; // string | The integration key
$id = 'id_example'; // string | The subscription ID

try {
    $apiInstance->deleteSubscription($integration_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationAuditLogSubscriptionsApi->deleteSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The integration key |
 **id** | **string**| The subscription ID |

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

## `getSubscriptionByID()`

```php
getSubscriptionByID($integration_key, $id): \LaunchDarklyApi\Model\Integration
```

Get audit log subscription by ID

Get an audit log subscription by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationAuditLogSubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = 'integration_key_example'; // string | The integration key
$id = 'id_example'; // string | The subscription ID

try {
    $result = $apiInstance->getSubscriptionByID($integration_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationAuditLogSubscriptionsApi->getSubscriptionByID: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The integration key |
 **id** | **string**| The subscription ID |

### Return type

[**\LaunchDarklyApi\Model\Integration**](../Model/Integration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSubscriptions()`

```php
getSubscriptions($integration_key): \LaunchDarklyApi\Model\Integrations
```

Get audit log subscriptions by integration

Get all audit log subscriptions associated with a given integration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationAuditLogSubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = 'integration_key_example'; // string | The integration key

try {
    $result = $apiInstance->getSubscriptions($integration_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationAuditLogSubscriptionsApi->getSubscriptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The integration key |

### Return type

[**\LaunchDarklyApi\Model\Integrations**](../Model/Integrations.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSubscription()`

```php
updateSubscription($integration_key, $id, $patch_operation): \LaunchDarklyApi\Model\Integration
```

Update audit log subscription

Update an audit log subscription configuration. Updating an audit log subscription uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationAuditLogSubscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = 'integration_key_example'; // string | The integration key
$id = 'id_example'; // string | The ID of the audit log subscription
$patch_operation = [{"op":"replace","path":"/on","value":false}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->updateSubscription($integration_key, $id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationAuditLogSubscriptionsApi->updateSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The integration key |
 **id** | **string**| The ID of the audit log subscription |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Integration**](../Model/Integration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
