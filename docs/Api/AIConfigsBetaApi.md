# LaunchDarklyApi\AIConfigsBetaApi

All URIs are relative to https://app.launchdarkly.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteAIConfig()**](AIConfigsBetaApi.md#deleteAIConfig) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Delete AI Config |
| [**deleteAIConfigVariation()**](AIConfigsBetaApi.md#deleteAIConfigVariation) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Delete AI Config variation |
| [**deleteAITool()**](AIConfigsBetaApi.md#deleteAITool) | **DELETE** /api/v2/projects/{projectKey}/ai-tools/{toolKey} | Delete AI tool |
| [**deleteModelConfig()**](AIConfigsBetaApi.md#deleteModelConfig) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/model-configs/{modelConfigKey} | Delete an AI model config |
| [**deleteRestrictedModels()**](AIConfigsBetaApi.md#deleteRestrictedModels) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/model-configs/restricted | Remove AI models from the restricted list |
| [**getAIConfig()**](AIConfigsBetaApi.md#getAIConfig) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Get AI Config |
| [**getAIConfigMetrics()**](AIConfigsBetaApi.md#getAIConfigMetrics) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/metrics | Get AI Config metrics |
| [**getAIConfigMetricsByVariation()**](AIConfigsBetaApi.md#getAIConfigMetricsByVariation) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/metrics-by-variation | Get AI Config metrics by variation |
| [**getAIConfigTargeting()**](AIConfigsBetaApi.md#getAIConfigTargeting) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/targeting | Show an AI Config&#39;s targeting |
| [**getAIConfigVariation()**](AIConfigsBetaApi.md#getAIConfigVariation) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Get AI Config variation |
| [**getAIConfigs()**](AIConfigsBetaApi.md#getAIConfigs) | **GET** /api/v2/projects/{projectKey}/ai-configs | List AI Configs |
| [**getAITool()**](AIConfigsBetaApi.md#getAITool) | **GET** /api/v2/projects/{projectKey}/ai-tools/{toolKey} | Get AI tool |
| [**getModelConfig()**](AIConfigsBetaApi.md#getModelConfig) | **GET** /api/v2/projects/{projectKey}/ai-configs/model-configs/{modelConfigKey} | Get AI model config |
| [**listAIToolVersions()**](AIConfigsBetaApi.md#listAIToolVersions) | **GET** /api/v2/projects/{projectKey}/ai-tools/{toolKey}/versions | List AI tool versions |
| [**listAITools()**](AIConfigsBetaApi.md#listAITools) | **GET** /api/v2/projects/{projectKey}/ai-tools | List AI tools |
| [**listAgentGraphs()**](AIConfigsBetaApi.md#listAgentGraphs) | **GET** /api/v2/projects/{projectKey}/agent-graphs | List agent graphs |
| [**listModelConfigs()**](AIConfigsBetaApi.md#listModelConfigs) | **GET** /api/v2/projects/{projectKey}/ai-configs/model-configs | List AI model configs |
| [**patchAIConfig()**](AIConfigsBetaApi.md#patchAIConfig) | **PATCH** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Update AI Config |
| [**patchAIConfigTargeting()**](AIConfigsBetaApi.md#patchAIConfigTargeting) | **PATCH** /api/v2/projects/{projectKey}/ai-configs/{configKey}/targeting | Update AI Config targeting |
| [**patchAIConfigVariation()**](AIConfigsBetaApi.md#patchAIConfigVariation) | **PATCH** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Update AI Config variation |
| [**patchAITool()**](AIConfigsBetaApi.md#patchAITool) | **PATCH** /api/v2/projects/{projectKey}/ai-tools/{toolKey} | Update AI tool |
| [**postAIConfig()**](AIConfigsBetaApi.md#postAIConfig) | **POST** /api/v2/projects/{projectKey}/ai-configs | Create new AI Config |
| [**postAIConfigVariation()**](AIConfigsBetaApi.md#postAIConfigVariation) | **POST** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations | Create AI Config variation |
| [**postAITool()**](AIConfigsBetaApi.md#postAITool) | **POST** /api/v2/projects/{projectKey}/ai-tools | Create an AI tool |
| [**postAgentGraph()**](AIConfigsBetaApi.md#postAgentGraph) | **POST** /api/v2/projects/{projectKey}/agent-graphs | Create new agent graph |
| [**postModelConfig()**](AIConfigsBetaApi.md#postModelConfig) | **POST** /api/v2/projects/{projectKey}/ai-configs/model-configs | Create an AI model config |
| [**postRestrictedModels()**](AIConfigsBetaApi.md#postRestrictedModels) | **POST** /api/v2/projects/{projectKey}/ai-configs/model-configs/restricted | Add AI models to the restricted list |


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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **variation_key** | **string**|  | |

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

## `deleteAITool()`

```php
deleteAITool($ld_api_version, $project_key, $tool_key)
```

Delete AI tool

Delete an existing AI tool.

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
$tool_key = 'tool_key_example'; // string

try {
    $apiInstance->deleteAITool($ld_api_version, $project_key, $tool_key);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->deleteAITool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **tool_key** | **string**|  | |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **model_config_key** | **string**|  | |

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

## `deleteRestrictedModels()`

```php
deleteRestrictedModels($ld_api_version, $project_key, $restricted_models_request)
```

Remove AI models from the restricted list

Remove AI models, by key, from the restricted list.

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
$restricted_models_request = new \LaunchDarklyApi\Model\RestrictedModelsRequest(); // \LaunchDarklyApi\Model\RestrictedModelsRequest | List of AI model keys to remove from the restricted list

try {
    $apiInstance->deleteRestrictedModels($ld_api_version, $project_key, $restricted_models_request);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->deleteRestrictedModels: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **restricted_models_request** | [**\LaunchDarklyApi\Model\RestrictedModelsRequest**](../Model/RestrictedModelsRequest.md)| List of AI model keys to remove from the restricted list | |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **from** | **int**| The starting time, as milliseconds since epoch (inclusive). | |
| **to** | **int**| The ending time, as milliseconds since epoch (exclusive). May not be more than 100 days after &#x60;from&#x60;. | |
| **env** | **string**| An environment key. Only metrics from this environment will be included. | |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **from** | **int**| The starting time, as milliseconds since epoch (inclusive). | |
| **to** | **int**| The ending time, as milliseconds since epoch (exclusive). May not be more than 100 days after &#x60;from&#x60;. | |
| **env** | **string**| An environment key. Only metrics from this environment will be included. | |

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

## `getAIConfigTargeting()`

```php
getAIConfigTargeting($ld_api_version, $project_key, $config_key): \LaunchDarklyApi\Model\AIConfigTargeting
```

Show an AI Config's targeting

Retrieves a specific AI Config's targeting by its key

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
    $result = $apiInstance->getAIConfigTargeting($ld_api_version, $project_key, $config_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getAIConfigTargeting: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |

### Return type

[**\LaunchDarklyApi\Model\AIConfigTargeting**](../Model/AIConfigTargeting.md)

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **variation_key** | **string**|  | |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **sort** | **string**| A sort to apply to the list of AI Configs. | [optional] |
| **limit** | **int**| The number of AI Configs to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |
| **filter** | **string**| A filter to apply to the list of AI Configs. | [optional] |

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

## `getAITool()`

```php
getAITool($ld_api_version, $project_key, $tool_key): \LaunchDarklyApi\Model\AITool
```

Get AI tool

Retrieve a specific AI tool by its key.

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
$tool_key = 'tool_key_example'; // string

try {
    $result = $apiInstance->getAITool($ld_api_version, $project_key, $tool_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->getAITool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **tool_key** | **string**|  | |

### Return type

[**\LaunchDarklyApi\Model\AITool**](../Model/AITool.md)

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **model_config_key** | **string**|  | |

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

## `listAIToolVersions()`

```php
listAIToolVersions($ld_api_version, $project_key, $tool_key, $sort, $limit, $offset): \LaunchDarklyApi\Model\AITools
```

List AI tool versions

Get a list of all versions of an AI tool in the given project.

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
$tool_key = 'tool_key_example'; // string
$sort = 'sort_example'; // string | A sort to apply to the list of AI Configs.
$limit = 56; // int | The number of AI Configs to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->listAIToolVersions($ld_api_version, $project_key, $tool_key, $sort, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->listAIToolVersions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **tool_key** | **string**|  | |
| **sort** | **string**| A sort to apply to the list of AI Configs. | [optional] |
| **limit** | **int**| The number of AI Configs to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |

### Return type

[**\LaunchDarklyApi\Model\AITools**](../Model/AITools.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAITools()`

```php
listAITools($ld_api_version, $project_key, $sort, $limit, $offset, $filter): \LaunchDarklyApi\Model\AITools
```

List AI tools

Get a list of all AI tools in the given project.

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
$sort = 'sort_example'; // string | A sort to apply to the list of AI Configs.
$limit = 56; // int | The number of AI Configs to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$filter = 'filter_example'; // string | A filter to apply to the list of AI Configs.

try {
    $result = $apiInstance->listAITools($ld_api_version, $project_key, $sort, $limit, $offset, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->listAITools: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **sort** | **string**| A sort to apply to the list of AI Configs. | [optional] |
| **limit** | **int**| The number of AI Configs to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |
| **filter** | **string**| A filter to apply to the list of AI Configs. | [optional] |

### Return type

[**\LaunchDarklyApi\Model\AITools**](../Model/AITools.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAgentGraphs()`

```php
listAgentGraphs($ld_api_version, $project_key, $limit, $offset): \LaunchDarklyApi\Model\AgentGraphs
```

List agent graphs

Get a list of all agent graphs in the given project. Returns metadata only, without edge data.

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
$limit = 56; // int | The number of AI Configs to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->listAgentGraphs($ld_api_version, $project_key, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->listAgentGraphs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **limit** | **int**| The number of AI Configs to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |

### Return type

[**\LaunchDarklyApi\Model\AgentGraphs**](../Model/AgentGraphs.md)

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
listModelConfigs($ld_api_version, $project_key, $restricted): \LaunchDarklyApi\Model\ModelConfig[]
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
$restricted = True; // bool | Whether to return only restricted models

try {
    $result = $apiInstance->listModelConfigs($ld_api_version, $project_key, $restricted);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->listModelConfigs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **restricted** | **bool**| Whether to return only restricted models | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **ai_config_patch** | [**\LaunchDarklyApi\Model\AIConfigPatch**](../Model/AIConfigPatch.md)| AI Config object to update | [optional] |

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

## `patchAIConfigTargeting()`

```php
patchAIConfigTargeting($ld_api_version, $project_key, $config_key, $ai_config_targeting_patch): \LaunchDarklyApi\Model\AIConfigTargeting
```

Update AI Config targeting

Perform a partial update to an AI Config's targeting. The request body must be a valid semantic patch.  ### Using semantic patches on an AI Config  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  The body of a semantic patch request for updating an AI Config's targeting takes the following properties:  * `comment` (string): (Optional) A description of the update. * `environmentKey` (string): The key of the LaunchDarkly environment. * `instructions` (array): (Required) A list of actions the update should perform. Each action in the list must be an object with a `kind` property that indicates the instruction. If the action requires parameters, you must include those parameters as additional fields in the object. The body of a single semantic patch can contain many different instructions.  ### Instructions  Semantic patch requests support the following `kind` instructions for updating AI Configs.  <details> <summary>Click to expand instructions for <strong>working with targeting and variations</strong> for AI Configs</summary>  #### addClauses  Adds the given clauses to the rule indicated by `ruleId`.  ##### Parameters  - `ruleId`: ID of a rule in the AI Config. - `clauses`: Array of clause objects, with `contextKind` (string), `attribute` (string), `op` (string), `negate` (boolean), and `values` (array of strings, numbers, or dates) properties. The `contextKind`, `attribute`, and `values` are case sensitive. The `op` must be lower-case.  Here's an example:  ```json {   \"environmentKey\": \"environment-key-123abc\",   \"instructions\": [{     \"kind\": \"addClauses\",     \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\",     \"clauses\": [{       \"contextKind\": \"user\",       \"attribute\": \"country\",       \"op\": \"in\",       \"negate\": false,       \"values\": [\"USA\", \"Canada\"]     }]   }] } ```  #### addRule  Adds a new targeting rule to the AI Config. The rule may contain `clauses` and serve the variation that `variationId` indicates, or serve a percentage rollout that `rolloutWeights`, `rolloutBucketBy`, and `rolloutContextKind` indicate.  If you set `beforeRuleId`, this adds the new rule before the indicated rule. Otherwise, adds the new rule to the end of the list.  ##### Parameters  - `clauses`: Array of clause objects, with `contextKind` (string), `attribute` (string), `op` (string), `negate` (boolean), and `values` (array of strings, numbers, or dates) properties. The `contextKind`, `attribute`, and `values` are case sensitive. The `op` must be lower-case. - `beforeRuleId`: (Optional) ID of a rule. - Either - `variationId`: ID of a variation.  or  - `rolloutWeights`: (Optional) Map of `variationId` to weight, in thousandths of a percent (0-100000). - `rolloutBucketBy`: (Optional) Context attribute available in the specified `rolloutContextKind`. - `rolloutContextKind`: (Optional) Context kind, defaults to `user`  Here's an example that uses a `variationId`:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"addRule\",   \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\",   \"clauses\": [{     \"contextKind\": \"organization\",     \"attribute\": \"located_in\",     \"op\": \"in\",     \"negate\": false,     \"values\": [\"Sweden\", \"Norway\"]   }] }] } ```  Here's an example that uses a percentage rollout:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"addRule\",   \"clauses\": [{     \"contextKind\": \"organization\",     \"attribute\": \"located_in\",     \"op\": \"in\",     \"negate\": false,     \"values\": [\"Sweden\", \"Norway\"]   }],   \"rolloutContextKind\": \"organization\",   \"rolloutWeights\": {     \"2f43f67c-3e4e-4945-a18a-26559378ca00\": 15000, // serve 15% this variation     \"e5830889-1ec5-4b0c-9cc9-c48790090c43\": 85000  // serve 85% this variation   } }] } ```  #### addTargets  Adds context keys to the individual context targets for the context kind that `contextKind` specifies and the variation that `variationId` specifies. Returns an error if this causes the AI Config to target the same context key in multiple variations.  ##### Parameters  - `values`: List of context keys. - `contextKind`: (Optional) Context kind to target, defaults to `user` - `variationId`: ID of a variation.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"addTargets\",   \"values\": [\"context-key-123abc\", \"context-key-456def\"],   \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\" }] } ```  #### addValuesToClause  Adds `values` to the values of the clause that `ruleId` and `clauseId` indicate. Does not update the context kind, attribute, or operator.  ##### Parameters  - `ruleId`: ID of a rule in the AI Config. - `clauseId`: ID of a clause in that rule. - `values`: Array of strings, case sensitive.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"addValuesToClause\",   \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\",   \"clauseId\": \"10a58772-3121-400f-846b-b8a04e8944ed\",   \"values\": [\"beta_testers\"] }] } ```  #### clearTargets  Removes all individual targets from the variation that `variationId` specifies. This includes both user and non-user targets.  ##### Parameters  - `variationId`: ID of a variation.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [ { \"kind\": \"clearTargets\", \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\" } ] } ```  #### removeClauses  Removes the clauses specified by `clauseIds` from the rule indicated by `ruleId`.  ##### Parameters  - `ruleId`: ID of a rule. - `clauseIds`: Array of IDs of clauses in the rule.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"removeClauses\",   \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\",   \"clauseIds\": [\"10a58772-3121-400f-846b-b8a04e8944ed\", \"36a461dc-235e-4b08-97b9-73ce9365873e\"] }] } ```  #### removeRule  Removes the targeting rule specified by `ruleId`. Does nothing if the rule does not exist.  ##### Parameters  - `ruleId`: ID of a rule.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [ { \"kind\": \"removeRule\", \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\" } ] } ```  #### removeTargets  Removes context keys from the individual context targets for the context kind that `contextKind` specifies and the variation that `variationId` specifies. Does nothing if the flag does not target the context keys.  ##### Parameters  - `values`: List of context keys. - `contextKind`: (Optional) Context kind to target, defaults to `user` - `variationId`: ID of a variation.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"removeTargets\",   \"values\": [\"context-key-123abc\", \"context-key-456def\"],   \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\" }] } ```  #### removeValuesFromClause  Removes `values` from the values of the clause indicated by `ruleId` and `clauseId`. Does not update the context kind, attribute, or operator.  ##### Parameters  - `ruleId`: ID of a rule. - `clauseId`: ID of a clause in that rule. - `values`: Array of strings, case sensitive.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"removeValuesFromClause\",   \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\",   \"clauseId\": \"10a58772-3121-400f-846b-b8a04e8944ed\",   \"values\": [\"beta_testers\"] }] } ```  #### reorderRules  Rearranges the rules to match the order given in `ruleIds`. Returns an error if `ruleIds` does not match the current set of rules on the AI Config.  ##### Parameters  - `ruleIds`: Array of IDs of all rules.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"reorderRules\",   \"ruleIds\": [\"a902ef4a-2faf-4eaf-88e1-ecc356708a29\", \"63c238d1-835d-435e-8f21-c8d5e40b2a3d\"] }] } ```  #### replaceRules  Removes all targeting rules for the AI Config and replaces them with the list you provide.  ##### Parameters  - `rules`: A list of rules.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [   {     \"kind\": \"replaceRules\",     \"rules\": [       {         \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\",         \"description\": \"My new rule\",         \"clauses\": [           {             \"contextKind\": \"user\",             \"attribute\": \"segmentMatch\",             \"op\": \"segmentMatch\",             \"values\": [\"test\"]           }         ]       }     ]   } ] } ```  #### replaceTargets  Removes all existing targeting and replaces it with the list of targets you provide.  ##### Parameters  - `targets`: A list of context targeting. Each item in the list includes an optional `contextKind` that defaults to `user`, a required `variationId`, and a required list of `values`.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [   {     \"kind\": \"replaceTargets\",     \"targets\": [       {         \"contextKind\": \"user\",         \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\",         \"values\": [\"user-key-123abc\"]       },       {         \"contextKind\": \"device\",         \"variationId\": \"e5830889-1ec5-4b0c-9cc9-c48790090c43\",         \"values\": [\"device-key-456def\"]       }     ]   } ] } ```  #### updateClause  Replaces the clause indicated by `ruleId` and `clauseId` with `clause`.  ##### Parameters  - `ruleId`: ID of a rule. - `clauseId`: ID of a clause in that rule. - `clause`: New `clause` object, with `contextKind` (string), `attribute` (string), `op` (string), `negate` (boolean), and `values` (array of strings, numbers, or dates) properties. The `contextKind`, `attribute`, and `values` are case sensitive. The `op` must be lower-case.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"updateClause\",   \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\",   \"clauseId\": \"10c7462a-2062-45ba-a8bb-dfb3de0f8af5\",   \"clause\": {     \"contextKind\": \"user\",     \"attribute\": \"country\",     \"op\": \"in\",     \"negate\": false,     \"values\": [\"Mexico\", \"Canada\"]   } }] } ```  #### updateDefaultVariation  Updates the default on or off variation of the AI Config.  ##### Parameters  - `onVariationValue`: (Optional) The value of the variation of the new on variation. - `offVariationValue`: (Optional) The value of the variation of the new off variation  Here's an example:  ```json { \"instructions\": [ { \"kind\": \"updateDefaultVariation\", \"OnVariationValue\": true, \"OffVariationValue\": false } ] } ```  #### updateFallthroughVariationOrRollout  Updates the default or \"fallthrough\" rule for the AI Config, which the AI Config serves when a context matches none of the targeting rules. The rule can serve either the variation that `variationId` indicates, or a percentage rollout that `rolloutWeights` and `rolloutBucketBy` indicate.  ##### Parameters  - `variationId`: ID of a variation.  or  - `rolloutWeights`: Map of `variationId` to weight, in thousandths of a percent (0-100000). - `rolloutBucketBy`: (Optional) Context attribute available in the specified `rolloutContextKind`. - `rolloutContextKind`: (Optional) Context kind, defaults to `user`  Here's an example that uses a `variationId`:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"updateFallthroughVariationOrRollout\",   \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\" }] } ```  Here's an example that uses a percentage rollout:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"updateFallthroughVariationOrRollout\",   \"rolloutContextKind\": \"user\",   \"rolloutWeights\": {     \"2f43f67c-3e4e-4945-a18a-26559378ca00\": 15000, // serve 15% this variation     \"e5830889-1ec5-4b0c-9cc9-c48790090c43\": 85000  // serve 85% this variation   } }] } ```  #### updateOffVariation  Updates the default off variation to `variationId`. The AI Config serves the default off variation when the AI Config's targeting is **Off**.  ##### Parameters  - `variationId`: ID of a variation.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [ { \"kind\": \"updateOffVariation\", \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\" } ] } ```  #### updateRuleDescription  Updates the description of the targeting rule.  ##### Parameters  - `description`: The new human-readable description for this rule. - `ruleId`: The ID of the rule. You can retrieve this by making a GET request for the AI Config.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"updateRuleDescription\",   \"description\": \"New rule description\",   \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\" }] } ```  #### updateRuleTrackEvents  Updates whether or not LaunchDarkly tracks events for the AI Config associated with this rule.  ##### Parameters  - `ruleId`: The ID of the rule. You can retrieve this by making a GET request for the AI Config. - `trackEvents`: Whether or not events are tracked.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"updateRuleTrackEvents\",   \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\",   \"trackEvents\": true }] } ```  #### updateRuleVariationOrRollout  Updates what `ruleId` serves when its clauses evaluate to true. The rule can serve either the variation that `variationId` indicates, or a percent rollout that `rolloutWeights` and `rolloutBucketBy` indicate.  ##### Parameters  - `ruleId`: ID of a rule. - `variationId`: ID of a variation.  or  - `rolloutWeights`: Map of `variationId` to weight, in thousandths of a percent (0-100000). - `rolloutBucketBy`: (Optional) Context attribute available in the specified `rolloutContextKind`. - `rolloutContextKind`: (Optional) Context kind, defaults to `user`  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [{   \"kind\": \"updateRuleVariationOrRollout\",   \"ruleId\": \"a902ef4a-2faf-4eaf-88e1-ecc356708a29\",   \"variationId\": \"2f43f67c-3e4e-4945-a18a-26559378ca00\" }] } ```  #### updateTrackEvents  Updates whether or not LaunchDarkly tracks events for the AI Config, for all rules.  ##### Parameters  - `trackEvents`: Whether or not events are tracked.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [ { \"kind\": \"updateTrackEvents\", \"trackEvents\": true } ] } ```  #### updateTrackEventsFallthrough  Updates whether or not LaunchDarkly tracks events for the AI Config, for the default rule.  ##### Parameters  - `trackEvents`: Whether or not events are tracked.  Here's an example:  ```json { \"environmentKey\": \"environment-key-123abc\", \"instructions\": [ { \"kind\": \"updateTrackEventsFallthrough\", \"trackEvents\": true } ] } ``` </details>

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
$ai_config_targeting_patch = new \LaunchDarklyApi\Model\AIConfigTargetingPatch(); // \LaunchDarklyApi\Model\AIConfigTargetingPatch | AI Config targeting semantic patch instructions

try {
    $result = $apiInstance->patchAIConfigTargeting($ld_api_version, $project_key, $config_key, $ai_config_targeting_patch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->patchAIConfigTargeting: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **ai_config_targeting_patch** | [**\LaunchDarklyApi\Model\AIConfigTargetingPatch**](../Model/AIConfigTargetingPatch.md)| AI Config targeting semantic patch instructions | [optional] |

### Return type

[**\LaunchDarklyApi\Model\AIConfigTargeting**](../Model/AIConfigTargeting.md)

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **variation_key** | **string**|  | |
| **ai_config_variation_patch** | [**\LaunchDarklyApi\Model\AIConfigVariationPatch**](../Model/AIConfigVariationPatch.md)| AI Config variation object to update | [optional] |

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

## `patchAITool()`

```php
patchAITool($ld_api_version, $project_key, $tool_key, $ai_tool_patch): \LaunchDarklyApi\Model\AITool
```

Update AI tool

Edit an existing AI tool.

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
$tool_key = 'tool_key_example'; // string
$ai_tool_patch = new \LaunchDarklyApi\Model\AIToolPatch(); // \LaunchDarklyApi\Model\AIToolPatch | AI tool object to update

try {
    $result = $apiInstance->patchAITool($ld_api_version, $project_key, $tool_key, $ai_tool_patch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->patchAITool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **tool_key** | **string**|  | |
| **ai_tool_patch** | [**\LaunchDarklyApi\Model\AIToolPatch**](../Model/AIToolPatch.md)| AI tool object to update | [optional] |

### Return type

[**\LaunchDarklyApi\Model\AITool**](../Model/AITool.md)

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **ai_config_post** | [**\LaunchDarklyApi\Model\AIConfigPost**](../Model/AIConfigPost.md)| AI Config object to create | |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **config_key** | **string**|  | |
| **ai_config_variation_post** | [**\LaunchDarklyApi\Model\AIConfigVariationPost**](../Model/AIConfigVariationPost.md)| AI Config variation object to create | |

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

## `postAITool()`

```php
postAITool($ld_api_version, $project_key, $ai_tool_post): \LaunchDarklyApi\Model\AITool
```

Create an AI tool

Create an AI tool

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
$ai_tool_post = new \LaunchDarklyApi\Model\AIToolPost(); // \LaunchDarklyApi\Model\AIToolPost | AI tool object to create

try {
    $result = $apiInstance->postAITool($ld_api_version, $project_key, $ai_tool_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->postAITool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **ai_tool_post** | [**\LaunchDarklyApi\Model\AIToolPost**](../Model/AIToolPost.md)| AI tool object to create | |

### Return type

[**\LaunchDarklyApi\Model\AITool**](../Model/AITool.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postAgentGraph()`

```php
postAgentGraph($ld_api_version, $project_key, $agent_graph_post): \LaunchDarklyApi\Model\AgentGraph
```

Create new agent graph

Create a new agent graph within the given project.

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
$agent_graph_post = new \LaunchDarklyApi\Model\AgentGraphPost(); // \LaunchDarklyApi\Model\AgentGraphPost | Agent graph object to create

try {
    $result = $apiInstance->postAgentGraph($ld_api_version, $project_key, $agent_graph_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->postAgentGraph: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **agent_graph_post** | [**\LaunchDarklyApi\Model\AgentGraphPost**](../Model/AgentGraphPost.md)| Agent graph object to create | |

### Return type

[**\LaunchDarklyApi\Model\AgentGraph**](../Model/AgentGraph.md)

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **model_config_post** | [**\LaunchDarklyApi\Model\ModelConfigPost**](../Model/ModelConfigPost.md)| AI model config object to create | |

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

## `postRestrictedModels()`

```php
postRestrictedModels($ld_api_version, $project_key, $restricted_models_request): \LaunchDarklyApi\Model\RestrictedModelsResponse
```

Add AI models to the restricted list

Add AI models, by key, to the restricted list. Keys are included in the response from the [List AI model configs](https://launchdarkly.com/docs/api/ai-configs-beta/list-model-configs) endpoint.

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
$restricted_models_request = new \LaunchDarklyApi\Model\RestrictedModelsRequest(); // \LaunchDarklyApi\Model\RestrictedModelsRequest | List of AI model keys to add to the restricted list.

try {
    $result = $apiInstance->postRestrictedModels($ld_api_version, $project_key, $restricted_models_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->postRestrictedModels: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **restricted_models_request** | [**\LaunchDarklyApi\Model\RestrictedModelsRequest**](../Model/RestrictedModelsRequest.md)| List of AI model keys to add to the restricted list. | |

### Return type

[**\LaunchDarklyApi\Model\RestrictedModelsResponse**](../Model/RestrictedModelsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
