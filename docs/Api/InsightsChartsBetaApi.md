# LaunchDarklyApi\InsightsChartsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDeploymentFrequencyChart()**](InsightsChartsBetaApi.md#getDeploymentFrequencyChart) | **GET** /api/v2/engineering-insights/charts/deployments/frequency | Get deployment frequency chart data
[**getFlagStatusChart()**](InsightsChartsBetaApi.md#getFlagStatusChart) | **GET** /api/v2/engineering-insights/charts/flags/status | Get flag status chart data
[**getLeadTimeChart()**](InsightsChartsBetaApi.md#getLeadTimeChart) | **GET** /api/v2/engineering-insights/charts/lead-time | Get lead time chart data
[**getReleaseFrequencyChart()**](InsightsChartsBetaApi.md#getReleaseFrequencyChart) | **GET** /api/v2/engineering-insights/charts/releases/frequency | Get release frequency chart data
[**getStaleFlagsChart()**](InsightsChartsBetaApi.md#getStaleFlagsChart) | **GET** /api/v2/engineering-insights/charts/flags/stale | Get stale flags chart data


## `getDeploymentFrequencyChart()`

```php
getDeploymentFrequencyChart($project_key, $environment_key, $application_key, $from, $to, $bucket_type, $bucket_ms, $group_by, $expand): \LaunchDarklyApi\Model\InsightsChart
```

Get deployment frequency chart data

Get deployment frequency chart data. Engineering insights displays deployment frequency data in the [deployment frequency metric view](https://launchdarkly.com/docs/home/observability/deployments).  ### Expanding the chart response  LaunchDarkly supports expanding the chart response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `metrics` includes details on the metrics related to deployment frequency  For example, use `?expand=metrics` to include the `metrics` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsChartsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys
$from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Unix timestamp in milliseconds. Default value is 7 days ago.
$to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Unix timestamp in milliseconds. Default value is now.
$bucket_type = 'bucket_type_example'; // string | Specify type of bucket. Options: `rolling`, `hour`, `day`. Default: `rolling`.
$bucket_ms = 56; // int | Duration of intervals for x-axis in milliseconds. Default value is one day (`86400000` milliseconds).
$group_by = 'group_by_example'; // string | Options: `application`, `kind`
$expand = 'expand_example'; // string | Options: `metrics`

try {
    $result = $apiInstance->getDeploymentFrequencyChart($project_key, $environment_key, $application_key, $from, $to, $bucket_type, $bucket_ms, $group_by, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsChartsBetaApi->getDeploymentFrequencyChart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key | [optional]
 **environment_key** | **string**| The environment key | [optional]
 **application_key** | **string**| Comma separated list of application keys | [optional]
 **from** | **\DateTime**| Unix timestamp in milliseconds. Default value is 7 days ago. | [optional]
 **to** | **\DateTime**| Unix timestamp in milliseconds. Default value is now. | [optional]
 **bucket_type** | **string**| Specify type of bucket. Options: &#x60;rolling&#x60;, &#x60;hour&#x60;, &#x60;day&#x60;. Default: &#x60;rolling&#x60;. | [optional]
 **bucket_ms** | **int**| Duration of intervals for x-axis in milliseconds. Default value is one day (&#x60;86400000&#x60; milliseconds). | [optional]
 **group_by** | **string**| Options: &#x60;application&#x60;, &#x60;kind&#x60; | [optional]
 **expand** | **string**| Options: &#x60;metrics&#x60; | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightsChart**](../Model/InsightsChart.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFlagStatusChart()`

```php
getFlagStatusChart($project_key, $environment_key, $application_key): \LaunchDarklyApi\Model\InsightsChart
```

Get flag status chart data

Get flag status chart data. To learn more, read [Flag statuses](https://launchdarkly.com/docs/home/observability/flag-health#flag-statuses).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsChartsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys

try {
    $result = $apiInstance->getFlagStatusChart($project_key, $environment_key, $application_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsChartsBetaApi->getFlagStatusChart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **application_key** | **string**| Comma separated list of application keys | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightsChart**](../Model/InsightsChart.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLeadTimeChart()`

```php
getLeadTimeChart($project_key, $environment_key, $application_key, $from, $to, $bucket_type, $bucket_ms, $group_by, $expand): \LaunchDarklyApi\Model\InsightsChart
```

Get lead time chart data

Get lead time chart data. The engineering insights UI displays lead time data in the [lead time metric view](https://launchdarkly.com/docs/home/observability/lead-time).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsChartsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys
$from = 56; // int | Unix timestamp in milliseconds. Default value is 7 days ago.
$to = 56; // int | Unix timestamp in milliseconds. Default value is now.
$bucket_type = 'bucket_type_example'; // string | Specify type of bucket. Options: `rolling`, `hour`, `day`. Default: `rolling`.
$bucket_ms = 56; // int | Duration of intervals for x-axis in milliseconds. Default value is one day (`86400000` milliseconds).
$group_by = 'group_by_example'; // string | Options: `application`, `stage`. Default: `stage`.
$expand = 'expand_example'; // string | Options: `metrics`, `percentiles`.

try {
    $result = $apiInstance->getLeadTimeChart($project_key, $environment_key, $application_key, $from, $to, $bucket_type, $bucket_ms, $group_by, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsChartsBetaApi->getLeadTimeChart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key | [optional]
 **application_key** | **string**| Comma separated list of application keys | [optional]
 **from** | **int**| Unix timestamp in milliseconds. Default value is 7 days ago. | [optional]
 **to** | **int**| Unix timestamp in milliseconds. Default value is now. | [optional]
 **bucket_type** | **string**| Specify type of bucket. Options: &#x60;rolling&#x60;, &#x60;hour&#x60;, &#x60;day&#x60;. Default: &#x60;rolling&#x60;. | [optional]
 **bucket_ms** | **int**| Duration of intervals for x-axis in milliseconds. Default value is one day (&#x60;86400000&#x60; milliseconds). | [optional]
 **group_by** | **string**| Options: &#x60;application&#x60;, &#x60;stage&#x60;. Default: &#x60;stage&#x60;. | [optional]
 **expand** | **string**| Options: &#x60;metrics&#x60;, &#x60;percentiles&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightsChart**](../Model/InsightsChart.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReleaseFrequencyChart()`

```php
getReleaseFrequencyChart($project_key, $environment_key, $application_key, $has_experiments, $global, $group_by, $from, $to, $bucket_type, $bucket_ms, $expand): \LaunchDarklyApi\Model\InsightsChart
```

Get release frequency chart data

Get release frequency chart data. Engineering insights displays release frequency data in the [release frequency metric view](https://launchdarkly.com/docs/home/observability/releases).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsChartsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys
$has_experiments = True; // bool | Filter events to those associated with an experiment (`true`) or without an experiment (`false`)
$global = 'global_example'; // string | Filter to include or exclude global events. Default value is `include`. Options: `include`, `exclude`
$group_by = 'group_by_example'; // string | Property to group results by. Options: `impact`
$from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Unix timestamp in milliseconds. Default value is 7 days ago.
$to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Unix timestamp in milliseconds. Default value is now.
$bucket_type = 'bucket_type_example'; // string | Specify type of bucket. Options: `rolling`, `hour`, `day`. Default: `rolling`.
$bucket_ms = 56; // int | Duration of intervals for x-axis in milliseconds. Default value is one day (`86400000` milliseconds).
$expand = 'expand_example'; // string | Options: `metrics`

try {
    $result = $apiInstance->getReleaseFrequencyChart($project_key, $environment_key, $application_key, $has_experiments, $global, $group_by, $from, $to, $bucket_type, $bucket_ms, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsChartsBetaApi->getReleaseFrequencyChart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **application_key** | **string**| Comma separated list of application keys | [optional]
 **has_experiments** | **bool**| Filter events to those associated with an experiment (&#x60;true&#x60;) or without an experiment (&#x60;false&#x60;) | [optional]
 **global** | **string**| Filter to include or exclude global events. Default value is &#x60;include&#x60;. Options: &#x60;include&#x60;, &#x60;exclude&#x60; | [optional]
 **group_by** | **string**| Property to group results by. Options: &#x60;impact&#x60; | [optional]
 **from** | **\DateTime**| Unix timestamp in milliseconds. Default value is 7 days ago. | [optional]
 **to** | **\DateTime**| Unix timestamp in milliseconds. Default value is now. | [optional]
 **bucket_type** | **string**| Specify type of bucket. Options: &#x60;rolling&#x60;, &#x60;hour&#x60;, &#x60;day&#x60;. Default: &#x60;rolling&#x60;. | [optional]
 **bucket_ms** | **int**| Duration of intervals for x-axis in milliseconds. Default value is one day (&#x60;86400000&#x60; milliseconds). | [optional]
 **expand** | **string**| Options: &#x60;metrics&#x60; | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightsChart**](../Model/InsightsChart.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStaleFlagsChart()`

```php
getStaleFlagsChart($project_key, $environment_key, $application_key, $group_by, $maintainer_id, $maintainer_team_key, $expand): \LaunchDarklyApi\Model\InsightsChart
```

Get stale flags chart data

Get stale flags chart data. Engineering insights displays stale flags data in the [flag health metric view](https://launchdarkly.com/docs/home/observability/flag-health).  ### Expanding the chart response  LaunchDarkly supports expanding the chart response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `metrics` includes details on the metrics related to stale flags  For example, use `?expand=metrics` to include the `metrics` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsChartsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys
$group_by = 'group_by_example'; // string | Property to group results by. Options: `maintainer`
$maintainer_id = 'maintainer_id_example'; // string | Comma-separated list of individual maintainers to filter results.
$maintainer_team_key = 'maintainer_team_key_example'; // string | Comma-separated list of team maintainer keys to filter results.
$expand = 'expand_example'; // string | Options: `metrics`

try {
    $result = $apiInstance->getStaleFlagsChart($project_key, $environment_key, $application_key, $group_by, $maintainer_id, $maintainer_team_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsChartsBetaApi->getStaleFlagsChart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **application_key** | **string**| Comma separated list of application keys | [optional]
 **group_by** | **string**| Property to group results by. Options: &#x60;maintainer&#x60; | [optional]
 **maintainer_id** | **string**| Comma-separated list of individual maintainers to filter results. | [optional]
 **maintainer_team_key** | **string**| Comma-separated list of team maintainer keys to filter results. | [optional]
 **expand** | **string**| Options: &#x60;metrics&#x60; | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightsChart**](../Model/InsightsChart.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
