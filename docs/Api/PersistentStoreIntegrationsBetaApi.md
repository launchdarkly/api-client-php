# LaunchDarklyApi\PersistentStoreIntegrationsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createBigSegmentStoreIntegration()**](PersistentStoreIntegrationsBetaApi.md#createBigSegmentStoreIntegration) | **POST** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey} | Create big segment store integration
[**deleteBigSegmentStoreIntegration()**](PersistentStoreIntegrationsBetaApi.md#deleteBigSegmentStoreIntegration) | **DELETE** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey}/{integrationId} | Delete big segment store integration
[**getBigSegmentStoreIntegration()**](PersistentStoreIntegrationsBetaApi.md#getBigSegmentStoreIntegration) | **GET** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey}/{integrationId} | Get big segment store integration by ID
[**getBigSegmentStoreIntegrations()**](PersistentStoreIntegrationsBetaApi.md#getBigSegmentStoreIntegrations) | **GET** /api/v2/integration-capabilities/big-segment-store | List all big segment store integrations
[**patchBigSegmentStoreIntegration()**](PersistentStoreIntegrationsBetaApi.md#patchBigSegmentStoreIntegration) | **PATCH** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey}/{integrationId} | Update big segment store integration


## `createBigSegmentStoreIntegration()`

```php
createBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_delivery_configuration_post): \LaunchDarklyApi\Model\BigSegmentStoreIntegration
```

Create big segment store integration

Create a persistent store integration.  If you are using server-side SDKs, segments synced from external tools and larger list-based segments require a persistent store within your infrastructure. LaunchDarkly keeps the persistent store up to date and consults it during flag evaluation.  You can use either Redis or DynamoDB as your persistent store. When you create a persistent store integration, the fields in the `config` object in the request vary depending on which persistent store you use.  If you are using Redis to create your persistent store integration, you will need to know:  * Your Redis host * Your Redis port * Your Redis username * Your Redis password * Whether or not LaunchDarkly should connect using TLS  If you are using DynamoDB to create your persistent store integration, you will need to know:  * Your DynamoDB table name. The table must have the following schema:   * Partition key: `namespace` (string)   * Sort key: `key` (string) * Your DynamoDB Amazon Web Services (AWS) region. * Your AWS role Amazon Resource Name (ARN). This is the role that LaunchDarkly will assume to manage your DynamoDB table. * The External ID you specified when creating your Amazon Resource Name (ARN).  To learn more, read [Segment configuration](https://launchdarkly.com/docs/home/flags/segment-config).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\PersistentStoreIntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key, either `redis` or `dynamodb`
$integration_delivery_configuration_post = {"config":{"optional":"example value for optional formVariables property for sample-integration","required":"example value for required formVariables property for sample-integration"},"name":"Example persistent store integration","on":false,"tags":["example-tag"]}; // \LaunchDarklyApi\Model\IntegrationDeliveryConfigurationPost

try {
    $result = $apiInstance->createBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_delivery_configuration_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PersistentStoreIntegrationsBetaApi->createBigSegmentStoreIntegration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key, either &#x60;redis&#x60; or &#x60;dynamodb&#x60; |
 **integration_delivery_configuration_post** | [**\LaunchDarklyApi\Model\IntegrationDeliveryConfigurationPost**](../Model/IntegrationDeliveryConfigurationPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\BigSegmentStoreIntegration**](../Model/BigSegmentStoreIntegration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteBigSegmentStoreIntegration()`

```php
deleteBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_id)
```

Delete big segment store integration

Delete a persistent store integration. Each integration uses either Redis or DynamoDB.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\PersistentStoreIntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key, either `redis` or `dynamodb`
$integration_id = 'integration_id_example'; // string | The integration ID

try {
    $apiInstance->deleteBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_id);
} catch (Exception $e) {
    echo 'Exception when calling PersistentStoreIntegrationsBetaApi->deleteBigSegmentStoreIntegration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key, either &#x60;redis&#x60; or &#x60;dynamodb&#x60; |
 **integration_id** | **string**| The integration ID |

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

## `getBigSegmentStoreIntegration()`

```php
getBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_id): \LaunchDarklyApi\Model\BigSegmentStoreIntegration
```

Get big segment store integration by ID

Get a big segment store integration by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\PersistentStoreIntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key, either `redis` or `dynamodb`
$integration_id = 'integration_id_example'; // string | The integration ID

try {
    $result = $apiInstance->getBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PersistentStoreIntegrationsBetaApi->getBigSegmentStoreIntegration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key, either &#x60;redis&#x60; or &#x60;dynamodb&#x60; |
 **integration_id** | **string**| The integration ID |

### Return type

[**\LaunchDarklyApi\Model\BigSegmentStoreIntegration**](../Model/BigSegmentStoreIntegration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBigSegmentStoreIntegrations()`

```php
getBigSegmentStoreIntegrations(): \LaunchDarklyApi\Model\BigSegmentStoreIntegrationCollection
```

List all big segment store integrations

List all big segment store integrations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\PersistentStoreIntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getBigSegmentStoreIntegrations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PersistentStoreIntegrationsBetaApi->getBigSegmentStoreIntegrations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\BigSegmentStoreIntegrationCollection**](../Model/BigSegmentStoreIntegrationCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchBigSegmentStoreIntegration()`

```php
patchBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_id, $patch_operation): \LaunchDarklyApi\Model\BigSegmentStoreIntegration
```

Update big segment store integration

Update a big segment store integration. Updating a big segment store requires a [JSON Patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\PersistentStoreIntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key, either `redis` or `dynamodb`
$integration_id = 'integration_id_example'; // string | The integration ID
$patch_operation = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchBigSegmentStoreIntegration($project_key, $environment_key, $integration_key, $integration_id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PersistentStoreIntegrationsBetaApi->patchBigSegmentStoreIntegration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key, either &#x60;redis&#x60; or &#x60;dynamodb&#x60; |
 **integration_id** | **string**| The integration ID |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\BigSegmentStoreIntegration**](../Model/BigSegmentStoreIntegration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
