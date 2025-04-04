# LaunchDarklyApi\AIConfigsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteAIConfig()**](AIConfigsBetaApi.md#deleteAIConfig) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Delete AI Config
[**deleteAIConfigVariation()**](AIConfigsBetaApi.md#deleteAIConfigVariation) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Delete AI Config variation
[**deleteModelConfig()**](AIConfigsBetaApi.md#deleteModelConfig) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/model-configs/{modelConfigKey} | Delete an AI model config
[**getAIConfig()**](AIConfigsBetaApi.md#getAIConfig) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Get AI Config
[**getAIConfigMetrics()**](AIConfigsBetaApi.md#getAIConfigMetrics) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/metrics | Get AI Config metrics
[**getAIConfigMetricsByVariation()**](AIConfigsBetaApi.md#getAIConfigMetricsByVariation) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/metrics-by-variation | Get AI Config metrics by variation
[**getAIConfigVariation()**](AIConfigsBetaApi.md#getAIConfigVariation) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Get AI Config variation
[**getAIConfigs()**](AIConfigsBetaApi.md#getAIConfigs) | **GET** /api/v2/projects/{projectKey}/ai-configs | List AI Configs
[**getModelConfig()**](AIConfigsBetaApi.md#getModelConfig) | **GET** /api/v2/projects/{projectKey}/ai-configs/model-configs/{modelConfigKey} | Get AI model config
[**listModelConfigs()**](AIConfigsBetaApi.md#listModelConfigs) | **GET** /api/v2/projects/{projectKey}/ai-configs/model-configs | List AI model configs
[**patchAIConfig()**](AIConfigsBetaApi.md#patchAIConfig) | **PATCH** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Update AI Config
[**patchAIConfigVariation()**](AIConfigsBetaApi.md#patchAIConfigVariation) | **PATCH** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Update AI Config variation
[**postAIConfig()**](AIConfigsBetaApi.md#postAIConfig) | **POST** /api/v2/projects/{projectKey}/ai-configs | Create new AI Config
[**postAIConfigVariation()**](AIConfigsBetaApi.md#postAIConfigVariation) | **POST** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations | Create AI Config variation
[**postModelConfig()**](AIConfigsBetaApi.md#postModelConfig) | **POST** /api/v2/projects/{projectKey}/ai-configs/model-configs | Create an AI model config


## `deleteAIConfig()`

```php
deleteAIConfig($ld_api_version, $project_key, $config_key)
```

Delete AI Config

Delete an existing AI Config.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$config_key = 'config_key_example'; // string

try {
    $apiInstance->deleteAIConfig($ld_api_version, $project_key, $config_key);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->deleteAIConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |

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

## `deleteAIConfigVariation()`

```php
deleteAIConfigVariation($ld_api_version, $project_key, $config_key, $variation_key)
```

Delete AI Config variation

Delete a specific variation of an AI Config by config key and variation key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$config_key = 'config_key_example'; // string
$variation_key = 'variation_key_example'; // string

try {
    $apiInstance->deleteAIConfigVariation($ld_api_version, $project_key, $config_key, $variation_key);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->deleteAIConfigVariation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |
 **variation_key** | **string**|  |

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

## `deleteModelConfig()`

```php
deleteModelConfig($ld_api_version, $project_key, $model_config_key)
```

Delete an AI model config

Delete an AI model config.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$model_config_key = 'model_config_key_example'; // string

try {
    $apiInstance->deleteModelConfig($ld_api_version, $project_key, $model_config_key);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->deleteModelConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **model_config_key** | **string**|  |

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

## `getAIConfig()`

```php
getAIConfig($ld_api_version, $project_key, $config_key): \LaunchDarklyApi\Model\AIConfig
```

Get AI Config

Retrieve a specific AI Config by its key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$config_key = 'config_key_example'; // string

try {
    $result = $apiInstance->getAIConfig($ld_api_version, $project_key, $config_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getAIConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |

### Return type

[**\LaunchDarklyApi\Model\AIConfig**](../Model/AIConfig.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAIConfigMetrics()`

```php
getAIConfigMetrics($ld_api_version, $project_key, $config_key, $from, $to, $env): \LaunchDarklyApi\Model\Metrics
```

Get AI Config metrics

Retrieve usage metrics for an AI Config by config key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$config_key = 'config_key_example'; // string
$from = 56; // int | The starting time, as milliseconds since epoch (inclusive).
$to = 56; // int | The ending time, as milliseconds since epoch (exclusive). May not be more than 100 days after `from`.
$env = 'env_example'; // string | An environment key. Only metrics from this environment will be included.

try {
    $result = $apiInstance->getAIConfigMetrics($ld_api_version, $project_key, $config_key, $from, $to, $env);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getAIConfigMetrics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |
 **from** | **int**| The starting time, as milliseconds since epoch (inclusive). |
 **to** | **int**| The ending time, as milliseconds since epoch (exclusive). May not be more than 100 days after &#x60;from&#x60;. |
 **env** | **string**| An environment key. Only metrics from this environment will be included. |

### Return type

[**\LaunchDarklyApi\Model\Metrics**](../Model/Metrics.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAIConfigMetricsByVariation()`

```php
getAIConfigMetricsByVariation($ld_api_version, $project_key, $config_key, $from, $to, $env): \LaunchDarklyApi\Model\MetricByVariation[]
```

Get AI Config metrics by variation

Retrieve usage metrics for an AI Config by config key, with results split by variation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$config_key = 'config_key_example'; // string
$from = 56; // int | The starting time, as milliseconds since epoch (inclusive).
$to = 56; // int | The ending time, as milliseconds since epoch (exclusive). May not be more than 100 days after `from`.
$env = 'env_example'; // string | An environment key. Only metrics from this environment will be included.

try {
    $result = $apiInstance->getAIConfigMetricsByVariation($ld_api_version, $project_key, $config_key, $from, $to, $env);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getAIConfigMetricsByVariation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |
 **from** | **int**| The starting time, as milliseconds since epoch (inclusive). |
 **to** | **int**| The ending time, as milliseconds since epoch (exclusive). May not be more than 100 days after &#x60;from&#x60;. |
 **env** | **string**| An environment key. Only metrics from this environment will be included. |

### Return type

[**\LaunchDarklyApi\Model\MetricByVariation[]**](../Model/MetricByVariation.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAIConfigVariation()`

```php
getAIConfigVariation($ld_api_version, $project_key, $config_key, $variation_key): \LaunchDarklyApi\Model\AIConfigVariationsResponse
```

Get AI Config variation

Get an AI Config variation by key. The response includes all variation versions for the given variation key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$config_key = default; // string
$variation_key = default; // string

try {
    $result = $apiInstance->getAIConfigVariation($ld_api_version, $project_key, $config_key, $variation_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getAIConfigVariation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |
 **variation_key** | **string**|  |

### Return type

[**\LaunchDarklyApi\Model\AIConfigVariationsResponse**](../Model/AIConfigVariationsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAIConfigs()`

```php
getAIConfigs($ld_api_version, $project_key, $sort, $limit, $offset, $filter): \LaunchDarklyApi\Model\AIConfigs
```

List AI Configs

Get a list of all AI Configs in the given project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$sort = 'sort_example'; // string | A sort to apply to the list of AI Configs.
$limit = 56; // int | The number of AI Configs to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$filter = 'filter_example'; // string | A filter to apply to the list of AI Configs.

try {
    $result = $apiInstance->getAIConfigs($ld_api_version, $project_key, $sort, $limit, $offset, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getAIConfigs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **sort** | **string**| A sort to apply to the list of AI Configs. | [optional]
 **limit** | **int**| The number of AI Configs to return. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]
 **filter** | **string**| A filter to apply to the list of AI Configs. | [optional]

### Return type

[**\LaunchDarklyApi\Model\AIConfigs**](../Model/AIConfigs.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getModelConfig()`

```php
getModelConfig($ld_api_version, $project_key, $model_config_key): \LaunchDarklyApi\Model\ModelConfig
```

Get AI model config

Get an AI model config by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$model_config_key = default; // string

try {
    $result = $apiInstance->getModelConfig($ld_api_version, $project_key, $model_config_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getModelConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **model_config_key** | **string**|  |

### Return type

[**\LaunchDarklyApi\Model\ModelConfig**](../Model/ModelConfig.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listModelConfigs()`

```php
listModelConfigs($ld_api_version, $project_key): \LaunchDarklyApi\Model\ModelConfig[]
```

List AI model configs

Get all AI model configs for a project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string

try {
    $result = $apiInstance->listModelConfigs($ld_api_version, $project_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->listModelConfigs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |

### Return type

[**\LaunchDarklyApi\Model\ModelConfig[]**](../Model/ModelConfig.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchAIConfig()`

```php
patchAIConfig($ld_api_version, $project_key, $config_key, $ai_config_patch): \LaunchDarklyApi\Model\AIConfig
```

Update AI Config

Edit an existing AI Config.  The request body must be a JSON object of the fields to update. The values you include replace the existing values for the fields.  Here's an example:   ```     {       \"description\": \"Example updated description\",       \"tags\": [\"new-tag\"]     }   ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$config_key = 'config_key_example'; // string
$ai_config_patch = new \LaunchDarklyApi\Model\AIConfigPatch(); // \LaunchDarklyApi\Model\AIConfigPatch | AI Config object to update

try {
    $result = $apiInstance->patchAIConfig($ld_api_version, $project_key, $config_key, $ai_config_patch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->patchAIConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |
 **ai_config_patch** | [**\LaunchDarklyApi\Model\AIConfigPatch**](../Model/AIConfigPatch.md)| AI Config object to update | [optional]

### Return type

[**\LaunchDarklyApi\Model\AIConfig**](../Model/AIConfig.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchAIConfigVariation()`

```php
patchAIConfigVariation($ld_api_version, $project_key, $config_key, $variation_key, $ai_config_variation_patch): \LaunchDarklyApi\Model\AIConfigVariation
```

Update AI Config variation

Edit an existing variation of an AI Config. This creates a new version of the variation.  The request body must be a JSON object of the fields to update. The values you include replace the existing values for the fields.  Here's an example: ```   {     \"messages\": [       {         \"role\": \"system\",         \"content\": \"The new message\"       }     ]   } ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$config_key = 'config_key_example'; // string
$variation_key = 'variation_key_example'; // string
$ai_config_variation_patch = new \LaunchDarklyApi\Model\AIConfigVariationPatch(); // \LaunchDarklyApi\Model\AIConfigVariationPatch | AI Config variation object to update

try {
    $result = $apiInstance->patchAIConfigVariation($ld_api_version, $project_key, $config_key, $variation_key, $ai_config_variation_patch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->patchAIConfigVariation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |
 **variation_key** | **string**|  |
 **ai_config_variation_patch** | [**\LaunchDarklyApi\Model\AIConfigVariationPatch**](../Model/AIConfigVariationPatch.md)| AI Config variation object to update | [optional]

### Return type

[**\LaunchDarklyApi\Model\AIConfigVariation**](../Model/AIConfigVariation.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postAIConfig()`

```php
postAIConfig($ld_api_version, $project_key, $ai_config_post): \LaunchDarklyApi\Model\AIConfig
```

Create new AI Config

Create a new AI Config within the given project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$ai_config_post = new \LaunchDarklyApi\Model\AIConfigPost(); // \LaunchDarklyApi\Model\AIConfigPost | AI Config object to create

try {
    $result = $apiInstance->postAIConfig($ld_api_version, $project_key, $ai_config_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->postAIConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **ai_config_post** | [**\LaunchDarklyApi\Model\AIConfigPost**](../Model/AIConfigPost.md)| AI Config object to create |

### Return type

[**\LaunchDarklyApi\Model\AIConfig**](../Model/AIConfig.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postAIConfigVariation()`

```php
postAIConfigVariation($ld_api_version, $project_key, $config_key, $ai_config_variation_post): \LaunchDarklyApi\Model\AIConfigVariation
```

Create AI Config variation

Create a new variation for a given AI Config.  The <code>model</code> in the request body requires a <code>modelName</code> and <code>parameters</code>, for example:  ```   \"model\": {     \"modelName\": \"claude-3-opus-20240229\",     \"parameters\": {       \"max_tokens\": 1024     }   } ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = 'project_key_example'; // string
$config_key = 'config_key_example'; // string
$ai_config_variation_post = new \LaunchDarklyApi\Model\AIConfigVariationPost(); // \LaunchDarklyApi\Model\AIConfigVariationPost | AI Config variation object to create

try {
    $result = $apiInstance->postAIConfigVariation($ld_api_version, $project_key, $config_key, $ai_config_variation_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->postAIConfigVariation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **config_key** | **string**|  |
 **ai_config_variation_post** | [**\LaunchDarklyApi\Model\AIConfigVariationPost**](../Model/AIConfigVariationPost.md)| AI Config variation object to create |

### Return type

[**\LaunchDarklyApi\Model\AIConfigVariation**](../Model/AIConfigVariation.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postModelConfig()`

```php
postModelConfig($ld_api_version, $project_key, $model_config_post): \LaunchDarklyApi\Model\ModelConfig
```

Create an AI model config

Create an AI model config. You can use this in any variation for any AI Config in your project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$model_config_post = new \LaunchDarklyApi\Model\ModelConfigPost(); // \LaunchDarklyApi\Model\ModelConfigPost | AI model config object to create

try {
    $result = $apiInstance->postModelConfig($ld_api_version, $project_key, $model_config_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->postModelConfig: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ld_api_version** | **string**| Version of the endpoint. |
 **project_key** | **string**|  |
 **model_config_post** | [**\LaunchDarklyApi\Model\ModelConfigPost**](../Model/ModelConfigPost.md)| AI model config object to create |

### Return type

[**\LaunchDarklyApi\Model\ModelConfig**](../Model/ModelConfig.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
