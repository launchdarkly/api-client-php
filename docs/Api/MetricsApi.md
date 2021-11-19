# LaunchDarklyApi\MetricsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteMetric()**](MetricsApi.md#deleteMetric) | **DELETE** /api/v2/metrics/{projectKey}/{key} | Delete metric
[**getMetric()**](MetricsApi.md#getMetric) | **GET** /api/v2/metrics/{projectKey}/{key} | Get metric
[**getMetrics()**](MetricsApi.md#getMetrics) | **GET** /api/v2/metrics/{projectKey} | List metrics
[**patchMetric()**](MetricsApi.md#patchMetric) | **PATCH** /api/v2/metrics/{projectKey}/{key} | Update metric
[**postMetric()**](MetricsApi.md#postMetric) | **POST** /api/v2/metrics/{projectKey} | Create metric


## `deleteMetric()`

```php
deleteMetric($project_key, $key)
```

Delete metric

Delete a metric by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$key = 'key_example'; // string | The metric key

try {
    $apiInstance->deleteMetric($project_key, $key);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->deleteMetric: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **key** | **string**| The metric key |

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

## `getMetric()`

```php
getMetric($project_key, $key): \LaunchDarklyApi\Model\MetricRep
```

Get metric

Get information for a single metric from the specific project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$key = 'key_example'; // string | The metric key

try {
    $result = $apiInstance->getMetric($project_key, $key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->getMetric: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **key** | **string**| The metric key |

### Return type

[**\LaunchDarklyApi\Model\MetricRep**](../Model/MetricRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMetrics()`

```php
getMetrics($project_key): \LaunchDarklyApi\Model\MetricCollectionRep
```

List metrics

Get a list of all metrics for the specified project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key

try {
    $result = $apiInstance->getMetrics($project_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->getMetrics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |

### Return type

[**\LaunchDarklyApi\Model\MetricCollectionRep**](../Model/MetricCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchMetric()`

```php
patchMetric($project_key, $key, $patch_operation): \LaunchDarklyApi\Model\MetricRep
```

Update metric

Patch a environment by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$key = 'key_example'; // string | The metric key
$patch_operation = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchMetric($project_key, $key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->patchMetric: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **key** | **string**| The metric key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\MetricRep**](../Model/MetricRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postMetric()`

```php
postMetric($project_key, $metric_post): \LaunchDarklyApi\Model\MetricRep
```

Create metric

Create a new metric in the specified project. Note that the expected POST body differs depending on the specified kind property.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$metric_post = {"key":"my-metric","kind":"pageview","urls":[{"kind":"substring","substring":"foo"}]}; // \LaunchDarklyApi\Model\MetricPost

try {
    $result = $apiInstance->postMetric($project_key, $metric_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->postMetric: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_post** | [**\LaunchDarklyApi\Model\MetricPost**](../Model/MetricPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\MetricRep**](../Model/MetricRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
