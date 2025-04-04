# LaunchDarklyApi\IntegrationsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createIntegrationConfiguration()**](IntegrationsBetaApi.md#createIntegrationConfiguration) | **POST** /api/v2/integration-configurations/keys/{integrationKey} | Create integration configuration
[**deleteIntegrationConfiguration()**](IntegrationsBetaApi.md#deleteIntegrationConfiguration) | **DELETE** /api/v2/integration-configurations/{integrationConfigurationId} | Delete integration configuration
[**getAllIntegrationConfigurations()**](IntegrationsBetaApi.md#getAllIntegrationConfigurations) | **GET** /api/v2/integration-configurations/keys/{integrationKey} | Get all configurations for the integration
[**getIntegrationConfiguration()**](IntegrationsBetaApi.md#getIntegrationConfiguration) | **GET** /api/v2/integration-configurations/{integrationConfigurationId} | Get an integration configuration
[**updateIntegrationConfiguration()**](IntegrationsBetaApi.md#updateIntegrationConfiguration) | **PATCH** /api/v2/integration-configurations/{integrationConfigurationId} | Update integration configuration


## `createIntegrationConfiguration()`

```php
createIntegrationConfiguration($integration_key, $integration_configuration_post): \LaunchDarklyApi\Model\IntegrationConfigurationsRep
```

Create integration configuration

Create a new integration configuration. (Excludes [persistent store](https://launchdarkly.com/docs/api/persistent-store-integrations-beta) and [flag import configurations](https://launchdarkly.com/docs/api/flag-import-configurations-beta).)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = 'integration_key_example'; // string | The integration key
$integration_configuration_post = new \LaunchDarklyApi\Model\IntegrationConfigurationPost(); // \LaunchDarklyApi\Model\IntegrationConfigurationPost

try {
    $result = $apiInstance->createIntegrationConfiguration($integration_key, $integration_configuration_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsBetaApi->createIntegrationConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| The integration key |
 **integration_configuration_post** | [**\LaunchDarklyApi\Model\IntegrationConfigurationPost**](../Model/IntegrationConfigurationPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\IntegrationConfigurationsRep**](../Model/IntegrationConfigurationsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteIntegrationConfiguration()`

```php
deleteIntegrationConfiguration($integration_configuration_id)
```

Delete integration configuration

Delete an integration configuration by ID. (Excludes [persistent store](https://launchdarkly.com/docs/api/persistent-store-integrations-beta) and [flag import configurations](https://launchdarkly.com/docs/api/flag-import-configurations-beta).)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_configuration_id = 'integration_configuration_id_example'; // string | The ID of the integration configuration to be deleted

try {
    $apiInstance->deleteIntegrationConfiguration($integration_configuration_id);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsBetaApi->deleteIntegrationConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_configuration_id** | **string**| The ID of the integration configuration to be deleted |

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

## `getAllIntegrationConfigurations()`

```php
getAllIntegrationConfigurations($integration_key): \LaunchDarklyApi\Model\IntegrationConfigurationCollectionRep
```

Get all configurations for the integration

Get all integration configurations with the specified integration key. (Excludes [persistent store](https://launchdarkly.com/docs/api/persistent-store-integrations-beta) and [flag import configurations](https://launchdarkly.com/docs/api/flag-import-configurations-beta).).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_key = 'integration_key_example'; // string | Integration key

try {
    $result = $apiInstance->getAllIntegrationConfigurations($integration_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsBetaApi->getAllIntegrationConfigurations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_key** | **string**| Integration key |

### Return type

[**\LaunchDarklyApi\Model\IntegrationConfigurationCollectionRep**](../Model/IntegrationConfigurationCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getIntegrationConfiguration()`

```php
getIntegrationConfiguration($integration_configuration_id): \LaunchDarklyApi\Model\IntegrationConfigurationsRep
```

Get an integration configuration

Get integration configuration with the specified ID. (Excludes [persistent store](https://launchdarkly.com/docs/api/persistent-store-integrations-beta) and [flag import configurations](https://launchdarkly.com/docs/api/flag-import-configurations-beta).)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_configuration_id = 'integration_configuration_id_example'; // string | Integration configuration ID

try {
    $result = $apiInstance->getIntegrationConfiguration($integration_configuration_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsBetaApi->getIntegrationConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_configuration_id** | **string**| Integration configuration ID |

### Return type

[**\LaunchDarklyApi\Model\IntegrationConfigurationsRep**](../Model/IntegrationConfigurationsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateIntegrationConfiguration()`

```php
updateIntegrationConfiguration($integration_configuration_id, $patch_operation): \LaunchDarklyApi\Model\IntegrationConfigurationsRep
```

Update integration configuration

Update an integration configuration. Updating an integration configuration uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\IntegrationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$integration_configuration_id = 'integration_configuration_id_example'; // string | The ID of the integration configuration
$patch_operation = [{"op":"replace","path":"/on","value":false}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->updateIntegrationConfiguration($integration_configuration_id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsBetaApi->updateIntegrationConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **integration_configuration_id** | **string**| The ID of the integration configuration |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\IntegrationConfigurationsRep**](../Model/IntegrationConfigurationsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
