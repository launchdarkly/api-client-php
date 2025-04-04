# LaunchDarklyApi\FlagImportConfigurationsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createFlagImportConfiguration()**](FlagImportConfigurationsBetaApi.md#createFlagImportConfiguration) | **POST** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey} | Create a flag import configuration
[**deleteFlagImportConfiguration()**](FlagImportConfigurationsBetaApi.md#deleteFlagImportConfiguration) | **DELETE** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId} | Delete a flag import configuration
[**getFlagImportConfiguration()**](FlagImportConfigurationsBetaApi.md#getFlagImportConfiguration) | **GET** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId} | Get a single flag import configuration
[**getFlagImportConfigurations()**](FlagImportConfigurationsBetaApi.md#getFlagImportConfigurations) | **GET** /api/v2/integration-capabilities/flag-import | List all flag import configurations
[**patchFlagImportConfiguration()**](FlagImportConfigurationsBetaApi.md#patchFlagImportConfiguration) | **PATCH** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId} | Update a flag import configuration
[**triggerFlagImportJob()**](FlagImportConfigurationsBetaApi.md#triggerFlagImportJob) | **POST** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId}/trigger | Trigger a single flag import run


## `createFlagImportConfiguration()`

```php
createFlagImportConfiguration($project_key, $integration_key, $flag_import_configuration_post): \LaunchDarklyApi\Model\FlagImportIntegration
```

Create a flag import configuration

Create a new flag import configuration. The `integrationKey` path parameter identifies the feature management system from which the import occurs, for example, `split`. The `config` object in the request body schema is described by the global integration settings, as specified by the <code>formVariables</code> in the <code>manifest.json</code> for this integration. It varies slightly based on the `integrationKey`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagImportConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$integration_key = 'integration_key_example'; // string | The integration key
$flag_import_configuration_post = {"config":{"environmentId":"The ID of the environment in the external system","ldApiKey":"An API key with create flag permissions in your LaunchDarkly account","ldMaintainer":"The ID of the member who will be the maintainer of the imported flags","ldTag":"A tag to apply to all flags imported to LaunchDarkly","splitTag":"If provided, imports only the flags from the external system with this tag. Leave blank to import all flags.","workspaceApiKey":"An API key with read permissions in the external feature management system","workspaceId":"The ID of the workspace in the external system"},"name":"Sample configuration","tags":["example-tag"]}; // \LaunchDarklyApi\Model\FlagImportConfigurationPost

try {
    $result = $apiInstance->createFlagImportConfiguration($project_key, $integration_key, $flag_import_configuration_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagImportConfigurationsBetaApi->createFlagImportConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **integration_key** | **string**| The integration key |
 **flag_import_configuration_post** | [**\LaunchDarklyApi\Model\FlagImportConfigurationPost**](../Model/FlagImportConfigurationPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FlagImportIntegration**](../Model/FlagImportIntegration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteFlagImportConfiguration()`

```php
deleteFlagImportConfiguration($project_key, $integration_key, $integration_id)
```

Delete a flag import configuration

Delete a flag import configuration by ID. The `integrationKey` path parameter identifies the feature management system from which the import occurs, for example, `split`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagImportConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$integration_key = 'integration_key_example'; // string | The integration key
$integration_id = 'integration_id_example'; // string | The integration ID

try {
    $apiInstance->deleteFlagImportConfiguration($project_key, $integration_key, $integration_id);
} catch (Exception $e) {
    echo 'Exception when calling FlagImportConfigurationsBetaApi->deleteFlagImportConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **integration_key** | **string**| The integration key |
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

## `getFlagImportConfiguration()`

```php
getFlagImportConfiguration($project_key, $integration_key, $integration_id): \LaunchDarklyApi\Model\FlagImportIntegration
```

Get a single flag import configuration

Get a single flag import configuration by ID. The `integrationKey` path parameter identifies the feature management system from which the import occurs, for example, `split`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagImportConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$integration_key = 'integration_key_example'; // string | The integration key, for example, `split`
$integration_id = 'integration_id_example'; // string | The integration ID

try {
    $result = $apiInstance->getFlagImportConfiguration($project_key, $integration_key, $integration_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagImportConfigurationsBetaApi->getFlagImportConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **integration_key** | **string**| The integration key, for example, &#x60;split&#x60; |
 **integration_id** | **string**| The integration ID |

### Return type

[**\LaunchDarklyApi\Model\FlagImportIntegration**](../Model/FlagImportIntegration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFlagImportConfigurations()`

```php
getFlagImportConfigurations(): \LaunchDarklyApi\Model\FlagImportIntegrationCollection
```

List all flag import configurations

List all flag import configurations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagImportConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getFlagImportConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagImportConfigurationsBetaApi->getFlagImportConfigurations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\FlagImportIntegrationCollection**](../Model/FlagImportIntegrationCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchFlagImportConfiguration()`

```php
patchFlagImportConfiguration($project_key, $integration_key, $integration_id, $patch_operation): \LaunchDarklyApi\Model\FlagImportIntegration
```

Update a flag import configuration

Updating a flag import configuration uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).<br/><br/>To add an element to the import configuration fields that are arrays, set the `path` to the name of the field and then append `/<array index>`. Use `/0` to add to the beginning of the array. Use `/-` to add to the end of the array.<br/><br/>You can update the `config`, `tags`, and `name` of the flag import configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagImportConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$integration_key = 'integration_key_example'; // string | The integration key
$integration_id = 'integration_id_example'; // string | The integration ID
$patch_operation = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchFlagImportConfiguration($project_key, $integration_key, $integration_id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagImportConfigurationsBetaApi->patchFlagImportConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **integration_key** | **string**| The integration key |
 **integration_id** | **string**| The integration ID |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FlagImportIntegration**](../Model/FlagImportIntegration.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `triggerFlagImportJob()`

```php
triggerFlagImportJob($project_key, $integration_key, $integration_id)
```

Trigger a single flag import run

Trigger a single flag import run for an existing flag import configuration. The `integrationKey` path parameter identifies the feature management system from which the import occurs, for example, `split`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagImportConfigurationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$integration_key = 'integration_key_example'; // string | The integration key
$integration_id = 'integration_id_example'; // string | The integration ID

try {
    $apiInstance->triggerFlagImportJob($project_key, $integration_key, $integration_id);
} catch (Exception $e) {
    echo 'Exception when calling FlagImportConfigurationsBetaApi->triggerFlagImportJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **integration_key** | **string**| The integration key |
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
