# LaunchDarklyApi\ExperimentsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getExperiment()**](ExperimentsBetaApi.md#getExperiment) | **GET** /api/v2/flags/{projKey}/{flagKey}/experiments/{envKey}/{metricKey} | Get experiment results
[**resetExperiment()**](ExperimentsBetaApi.md#resetExperiment) | **DELETE** /api/v2/flags/{projKey}/{flagKey}/experiments/{envKey}/{metricKey}/results | Reset experiment results


## `getExperiment()`

```php
getExperiment($proj_key, $flag_key, $env_key, $metric_key, $from, $to): \LaunchDarklyApi\Model\ExperimentResultsRep
```

Get experiment results

Get detailed experiment result data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$flag_key = 'flag_key_example'; // string | The flag key
$env_key = 'env_key_example'; // string | The environment key
$metric_key = 'metric_key_example'; // string | The metric key
$from = 56; // int | A timestamp denoting the start of the data collection period, expressed as a Unix epoch time in milliseconds.
$to = 56; // int | A timestamp denoting the end of the data collection period, expressed as a Unix epoch time in milliseconds.

try {
    $result = $apiInstance->getExperiment($proj_key, $flag_key, $env_key, $metric_key, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsBetaApi->getExperiment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |
 **env_key** | **string**| The environment key |
 **metric_key** | **string**| The metric key |
 **from** | **int**| A timestamp denoting the start of the data collection period, expressed as a Unix epoch time in milliseconds. | [optional]
 **to** | **int**| A timestamp denoting the end of the data collection period, expressed as a Unix epoch time in milliseconds. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ExperimentResultsRep**](../Model/ExperimentResultsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resetExperiment()`

```php
resetExperiment($proj_key, $flag_key, $env_key, $metric_key)
```

Reset experiment results

Reset all experiment results by deleting all existing data for an experiment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$flag_key = 'flag_key_example'; // string | The feature flag's key
$env_key = 'env_key_example'; // string | The environment key
$metric_key = 'metric_key_example'; // string | The metric's key

try {
    $apiInstance->resetExperiment($proj_key, $flag_key, $env_key, $metric_key);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsBetaApi->resetExperiment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **flag_key** | **string**| The feature flag&#39;s key |
 **env_key** | **string**| The environment key |
 **metric_key** | **string**| The metric&#39;s key |

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
