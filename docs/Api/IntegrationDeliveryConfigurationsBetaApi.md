# LaunchDarklyApi\IntegrationDeliveryConfigurationsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createIntegrationDeliveryConfiguration()**](IntegrationDeliveryConfigurationsBetaApi.md#createIntegrationDeliveryConfiguration) | **POST** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey} | Create delivery configuration
[**deleteIntegrationDeliveryConfiguration()**](IntegrationDeliveryConfigurationsBetaApi.md#deleteIntegrationDeliveryConfiguration) | **DELETE** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id} | Delete delivery configuration
[**getIntegrationDeliveryConfigurationByEnvironment()**](IntegrationDeliveryConfigurationsBetaApi.md#getIntegrationDeliveryConfigurationByEnvironment) | **GET** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey} | Get delivery configurations by environment
[**getIntegrationDeliveryConfigurationById()**](IntegrationDeliveryConfigurationsBetaApi.md#getIntegrationDeliveryConfigurationById) | **GET** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id} | Get delivery configuration by ID
[**getIntegrationDeliveryConfigurations()**](IntegrationDeliveryConfigurationsBetaApi.md#getIntegrationDeliveryConfigurations) | **GET** /api/v2/integration-capabilities/featureStore | List all delivery configurations
[**patchIntegrationDeliveryConfiguration()**](IntegrationDeliveryConfigurationsBetaApi.md#patchIntegrationDeliveryConfiguration) | **PATCH** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id} | Update delivery configuration
[**validateIntegrationDeliveryConfiguration()**](IntegrationDeliveryConfigurationsBetaApi.md#validateIntegrationDeliveryConfiguration) | **POST** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id}/validate | Validate delivery configuration


## `createIntegrationDeliveryConfiguration()`

```php
createIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $integration_delivery_configuration_post): \LaunchDarklyApi\Model\IntegrationDeliveryConfiguration
```

Create delivery configuration

Create a delivery configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationDeliveryConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key
$integration_delivery_configuration_post = {"config":{"optional":"example value for optional formVariables property for sample-integration","required":"example value for required formVariables property for sample-integration"},"name":"Sample integration","on":false,"tags":["example-tag"]}; // \LaunchDarklyApi\Model\IntegrationDeliveryConfigurationPost

try {
    $result = $apiInstance->createIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $integration_delivery_configuration_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationDeliveryConfigurationsBetaApi->createIntegrationDeliveryConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key |
 **integration_delivery_configuration_post** | [**\LaunchDarklyApi\Model\IntegrationDeliveryConfigurationPost**](../Model/IntegrationDeliveryConfigurationPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\IntegrationDeliveryConfiguration**](../Model/IntegrationDeliveryConfiguration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteIntegrationDeliveryConfiguration()`

```php
deleteIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $id)
```

Delete delivery configuration

Delete a delivery configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationDeliveryConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key
$id = 'id_example'; // string | The configuration ID

try {
    $apiInstance->deleteIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationDeliveryConfigurationsBetaApi->deleteIntegrationDeliveryConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key |
 **id** | **string**| The configuration ID |

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

## `getIntegrationDeliveryConfigurationByEnvironment()`

```php
getIntegrationDeliveryConfigurationByEnvironment($project_key, $environment_key): \LaunchDarklyApi\Model\IntegrationDeliveryConfigurationCollection
```

Get delivery configurations by environment

Get delivery configurations by environment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationDeliveryConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getIntegrationDeliveryConfigurationByEnvironment($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationDeliveryConfigurationsBetaApi->getIntegrationDeliveryConfigurationByEnvironment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\IntegrationDeliveryConfigurationCollection**](../Model/IntegrationDeliveryConfigurationCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getIntegrationDeliveryConfigurationById()`

```php
getIntegrationDeliveryConfigurationById($project_key, $environment_key, $integration_key, $id): \LaunchDarklyApi\Model\IntegrationDeliveryConfiguration
```

Get delivery configuration by ID

Get delivery configuration by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationDeliveryConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key
$id = 'id_example'; // string | The configuration ID

try {
    $result = $apiInstance->getIntegrationDeliveryConfigurationById($project_key, $environment_key, $integration_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationDeliveryConfigurationsBetaApi->getIntegrationDeliveryConfigurationById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key |
 **id** | **string**| The configuration ID |

### Return type

[**\LaunchDarklyApi\Model\IntegrationDeliveryConfiguration**](../Model/IntegrationDeliveryConfiguration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getIntegrationDeliveryConfigurations()`

```php
getIntegrationDeliveryConfigurations(): \LaunchDarklyApi\Model\IntegrationDeliveryConfigurationCollection
```

List all delivery configurations

List all delivery configurations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationDeliveryConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getIntegrationDeliveryConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationDeliveryConfigurationsBetaApi->getIntegrationDeliveryConfigurations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\IntegrationDeliveryConfigurationCollection**](../Model/IntegrationDeliveryConfigurationCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchIntegrationDeliveryConfiguration()`

```php
patchIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $id, $patch_operation): \LaunchDarklyApi\Model\IntegrationDeliveryConfiguration
```

Update delivery configuration

Update an integration delivery configuration. Updating an integration delivery configuration uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationDeliveryConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key
$id = 'id_example'; // string | The configuration ID
$patch_operation = [{"op":"replace","path":"/on","value":true}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationDeliveryConfigurationsBetaApi->patchIntegrationDeliveryConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key |
 **id** | **string**| The configuration ID |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\IntegrationDeliveryConfiguration**](../Model/IntegrationDeliveryConfiguration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateIntegrationDeliveryConfiguration()`

```php
validateIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $id): \LaunchDarklyApi\Model\IntegrationDeliveryConfigurationResponse
```

Validate delivery configuration

Validate the saved delivery configuration, using the `validationRequest` in the integration's `manifest.json` file.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationDeliveryConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$integration_key = 'integration_key_example'; // string | The integration key
$id = 'id_example'; // string | The configuration ID

try {
    $result = $apiInstance->validateIntegrationDeliveryConfiguration($project_key, $environment_key, $integration_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationDeliveryConfigurationsBetaApi->validateIntegrationDeliveryConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **integration_key** | **string**| The integration key |
 **id** | **string**| The configuration ID |

### Return type

[**\LaunchDarklyApi\Model\IntegrationDeliveryConfigurationResponse**](../Model/IntegrationDeliveryConfigurationResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
