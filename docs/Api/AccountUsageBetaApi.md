# LaunchDarklyApi\AccountUsageBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDataExportEventsUsage()**](AccountUsageBetaApi.md#getDataExportEventsUsage) | **GET** /api/v2/usage/data-export-events | Get data export events usage
[**getEvaluationsUsage()**](AccountUsageBetaApi.md#getEvaluationsUsage) | **GET** /api/v2/usage/evaluations/{projectKey}/{environmentKey}/{featureFlagKey} | Get evaluations usage
[**getEventsUsage()**](AccountUsageBetaApi.md#getEventsUsage) | **GET** /api/v2/usage/events/{type} | Get events usage
[**getExperimentationKeysUsage()**](AccountUsageBetaApi.md#getExperimentationKeysUsage) | **GET** /api/v2/usage/experimentation-keys | Get experimentation keys usage
[**getExperimentationUnitsUsage()**](AccountUsageBetaApi.md#getExperimentationUnitsUsage) | **GET** /api/v2/usage/experimentation-units | Get experimentation units usage
[**getMauSdksByType()**](AccountUsageBetaApi.md#getMauSdksByType) | **GET** /api/v2/usage/mau/sdks | Get MAU SDKs by type
[**getMauUsage()**](AccountUsageBetaApi.md#getMauUsage) | **GET** /api/v2/usage/mau | Get MAU usage
[**getMauUsageByCategory()**](AccountUsageBetaApi.md#getMauUsageByCategory) | **GET** /api/v2/usage/mau/bycategory | Get MAU usage by category
[**getServiceConnectionUsage()**](AccountUsageBetaApi.md#getServiceConnectionUsage) | **GET** /api/v2/usage/service-connections | Get service connection usage
[**getStreamUsage()**](AccountUsageBetaApi.md#getStreamUsage) | **GET** /api/v2/usage/streams/{source} | Get stream usage
[**getStreamUsageBySdkVersion()**](AccountUsageBetaApi.md#getStreamUsageBySdkVersion) | **GET** /api/v2/usage/streams/{source}/bysdkversion | Get stream usage by SDK version
[**getStreamUsageSdkversion()**](AccountUsageBetaApi.md#getStreamUsageSdkversion) | **GET** /api/v2/usage/streams/{source}/sdkversions | Get stream usage SDK versions


## `getDataExportEventsUsage()`

```php
getDataExportEventsUsage($from, $to, $project_key, $environment_key): \LaunchDarklyApi\Model\SeriesIntervalsRep
```

Get data export events usage

Get a time-series array of the number of monthly data export events from your account. The granularity is always daily, with a maximum of 31 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key. If specified, `environmentKey` is required and results apply to the corresponding environment in this project.
$environment_key = 'environment_key_example'; // string | An environment key. If specified, `projectKey` is required and results apply to the corresponding environment in this project.

try {
    $result = $apiInstance->getDataExportEventsUsage($from, $to, $project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getDataExportEventsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional]
 **project_key** | **string**| A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]
 **environment_key** | **string**| An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesIntervalsRep**](../Model/SeriesIntervalsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEvaluationsUsage()`

```php
getEvaluationsUsage($project_key, $environment_key, $feature_flag_key, $from, $to, $tz): \LaunchDarklyApi\Model\SeriesListRep
```

Get evaluations usage

Get time-series arrays of the number of times a flag is evaluated, broken down by the variation that resulted from that evaluation. The granularity of the data depends on the age of the data requested. If the requested range is within the past two hours, minutely data is returned. If it is within the last two days, hourly data is returned. Otherwise, daily data is returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$from = 'from_example'; // string | The series of data returned starts from this timestamp. Defaults to 30 days ago.
$to = 'to_example'; // string | The series of data returned ends at this timestamp. Defaults to the current time.
$tz = 'tz_example'; // string | The timezone to use for breaks between days when returning daily data.

try {
    $result = $apiInstance->getEvaluationsUsage($project_key, $environment_key, $feature_flag_key, $from, $to, $tz);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getEvaluationsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |
 **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional]
 **tz** | **string**| The timezone to use for breaks between days when returning daily data. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesListRep**](../Model/SeriesListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEventsUsage()`

```php
getEventsUsage($type, $from, $to): \LaunchDarklyApi\Model\SeriesListRep
```

Get events usage

Get time-series arrays of the number of times a flag is evaluated, broken down by the variation that resulted from that evaluation. The granularity of the data depends on the age of the data requested. If the requested range is within the past two hours, minutely data is returned. If it is within the last two days, hourly data is returned. Otherwise, daily data is returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = 'type_example'; // string | The type of event to retrieve. Must be either `received` or `published`.
$from = 'from_example'; // string | The series of data returned starts from this timestamp. Defaults to 24 hours ago.
$to = 'to_example'; // string | The series of data returned ends at this timestamp. Defaults to the current time.

try {
    $result = $apiInstance->getEventsUsage($type, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getEventsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | **string**| The type of event to retrieve. Must be either &#x60;received&#x60; or &#x60;published&#x60;. |
 **from** | **string**| The series of data returned starts from this timestamp. Defaults to 24 hours ago. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesListRep**](../Model/SeriesListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExperimentationKeysUsage()`

```php
getExperimentationKeysUsage($from, $to, $project_key, $environment_key): \LaunchDarklyApi\Model\SeriesIntervalsRep
```

Get experimentation keys usage

Get a time-series array of the number of monthly experimentation keys from your account. The granularity is always daily, with a maximum of 31 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key. If specified, `environmentKey` is required and results apply to the corresponding environment in this project.
$environment_key = 'environment_key_example'; // string | An environment key. If specified, `projectKey` is required and results apply to the corresponding environment in this project.

try {
    $result = $apiInstance->getExperimentationKeysUsage($from, $to, $project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getExperimentationKeysUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional]
 **project_key** | **string**| A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]
 **environment_key** | **string**| An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesIntervalsRep**](../Model/SeriesIntervalsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExperimentationUnitsUsage()`

```php
getExperimentationUnitsUsage($from, $to, $project_key, $environment_key): \LaunchDarklyApi\Model\SeriesIntervalsRep
```

Get experimentation units usage

Get a time-series array of the number of monthly experimentation units from your account. The granularity is always daily, with a maximum of 31 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key. If specified, `environmentKey` is required and results apply to the corresponding environment in this project.
$environment_key = 'environment_key_example'; // string | An environment key. If specified, `projectKey` is required and results apply to the corresponding environment in this project.

try {
    $result = $apiInstance->getExperimentationUnitsUsage($from, $to, $project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getExperimentationUnitsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional]
 **project_key** | **string**| A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]
 **environment_key** | **string**| An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesIntervalsRep**](../Model/SeriesIntervalsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMauSdksByType()`

```php
getMauSdksByType($from, $to, $sdktype): \LaunchDarklyApi\Model\SdkListRep
```

Get MAU SDKs by type

Get a list of SDKs. These are all of the SDKs that have connected to LaunchDarkly by monthly active users (MAU) in the requested time period.<br/><br/>Endpoints for retrieving monthly active users (MAU) do not return information about active context instances. After you have upgraded your LaunchDarkly SDK to use contexts instead of users, you should not rely on this endpoint. To learn more, read [Account usage metrics](https://launchdarkly.com/docs/home/account/metrics).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 'from_example'; // string | The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000.
$to = 'to_example'; // string | The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000.
$sdktype = 'sdktype_example'; // string | The type of SDK with monthly active users (MAU) to list. Must be either `client` or `server`.

try {
    $result = $apiInstance->getMauSdksByType($from, $to, $sdktype);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getMauSdksByType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **string**| The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000. | [optional]
 **to** | **string**| The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000. | [optional]
 **sdktype** | **string**| The type of SDK with monthly active users (MAU) to list. Must be either &#x60;client&#x60; or &#x60;server&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SdkListRep**](../Model/SdkListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMauUsage()`

```php
getMauUsage($from, $to, $project, $environment, $sdktype, $sdk, $anonymous, $groupby, $aggregation_type, $context_kind): \LaunchDarklyApi\Model\SeriesListRep
```

Get MAU usage

Get a time-series array of the number of monthly active users (MAU) seen by LaunchDarkly from your account. The granularity is always daily.<br/><br/>Endpoints for retrieving monthly active users (MAU) do not return information about active context instances. After you have upgraded your LaunchDarkly SDK to use contexts instead of users, you should not rely on this endpoint. To learn more, read [Account usage metrics](https://launchdarkly.com/docs/home/account/metrics).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 'from_example'; // string | The series of data returned starts from this timestamp. Defaults to 30 days ago.
$to = 'to_example'; // string | The series of data returned ends at this timestamp. Defaults to the current time.
$project = 'project_example'; // string | A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects.
$environment = 'environment_example'; // string | An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project.
$sdktype = 'sdktype_example'; // string | An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server
$sdk = 'sdk_example'; // string | An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK.
$anonymous = 'anonymous_example'; // string | If specified, filters results to either anonymous or nonanonymous users.
$groupby = 'groupby_example'; // string | If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId
$aggregation_type = 'aggregation_type_example'; // string | If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental
$context_kind = 'context_kind_example'; // string | Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind.

try {
    $result = $apiInstance->getMauUsage($from, $to, $project, $environment, $sdktype, $sdk, $anonymous, $groupby, $aggregation_type, $context_kind);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getMauUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional]
 **project** | **string**| A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects. | [optional]
 **environment** | **string**| An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project. | [optional]
 **sdktype** | **string**| An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server | [optional]
 **sdk** | **string**| An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK. | [optional]
 **anonymous** | **string**| If specified, filters results to either anonymous or nonanonymous users. | [optional]
 **groupby** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId | [optional]
 **aggregation_type** | **string**| If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental | [optional]
 **context_kind** | **string**| Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesListRep**](../Model/SeriesListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMauUsageByCategory()`

```php
getMauUsageByCategory($from, $to): \LaunchDarklyApi\Model\SeriesListRep
```

Get MAU usage by category

Get time-series arrays of the number of monthly active users (MAU) seen by LaunchDarkly from your account, broken down by the category of users. The category is either `browser`, `mobile`, or `backend`.<br/><br/>Endpoints for retrieving monthly active users (MAU) do not return information about active context instances. After you have upgraded your LaunchDarkly SDK to use contexts instead of users, you should not rely on this endpoint. To learn more, read [Account usage metrics](https://launchdarkly.com/docs/home/account/metrics).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 'from_example'; // string | The series of data returned starts from this timestamp. Defaults to 30 days ago.
$to = 'to_example'; // string | The series of data returned ends at this timestamp. Defaults to the current time.

try {
    $result = $apiInstance->getMauUsageByCategory($from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getMauUsageByCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesListRep**](../Model/SeriesListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getServiceConnectionUsage()`

```php
getServiceConnectionUsage($from, $to, $project_key, $environment_key): \LaunchDarklyApi\Model\SeriesIntervalsRep
```

Get service connection usage

Get a time-series array of the number of monthly service connections from your account. The granularity is always daily, with a maximum of 31 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key. If specified, `environmentKey` is required and results apply to the corresponding environment in this project.
$environment_key = 'environment_key_example'; // string | An environment key. If specified, `projectKey` is required and results apply to the corresponding environment in this project.

try {
    $result = $apiInstance->getServiceConnectionUsage($from, $to, $project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getServiceConnectionUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional]
 **project_key** | **string**| A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]
 **environment_key** | **string**| An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesIntervalsRep**](../Model/SeriesIntervalsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStreamUsage()`

```php
getStreamUsage($source, $from, $to, $tz): \LaunchDarklyApi\Model\SeriesListRep
```

Get stream usage

Get a time-series array of the number of streaming connections to LaunchDarkly in each time period. The granularity of the data depends on the age of the data requested. If the requested range is within the past two hours, minutely data is returned. If it is within the last two days, hourly data is returned. Otherwise, daily data is returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source = 'source_example'; // string | The source of streaming connections to describe. Must be either `client` or `server`.
$from = 'from_example'; // string | The series of data returned starts from this timestamp. Defaults to 30 days ago.
$to = 'to_example'; // string | The series of data returned ends at this timestamp. Defaults to the current time.
$tz = 'tz_example'; // string | The timezone to use for breaks between days when returning daily data.

try {
    $result = $apiInstance->getStreamUsage($source, $from, $to, $tz);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getStreamUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source** | **string**| The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. |
 **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional]
 **tz** | **string**| The timezone to use for breaks between days when returning daily data. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesListRep**](../Model/SeriesListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStreamUsageBySdkVersion()`

```php
getStreamUsageBySdkVersion($source, $from, $to, $tz, $sdk, $version): \LaunchDarklyApi\Model\SeriesListRep
```

Get stream usage by SDK version

Get multiple series of the number of streaming connections to LaunchDarkly in each time period, separated by SDK type and version. Information about each series is in the metadata array. The granularity of the data depends on the age of the data requested. If the requested range is within the past 2 hours, minutely data is returned. If it is within the last two days, hourly data is returned. Otherwise, daily data is returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source = 'source_example'; // string | The source of streaming connections to describe. Must be either `client` or `server`.
$from = 'from_example'; // string | The series of data returned starts from this timestamp. Defaults to 24 hours ago.
$to = 'to_example'; // string | The series of data returned ends at this timestamp. Defaults to the current time.
$tz = 'tz_example'; // string | The timezone to use for breaks between days when returning daily data.
$sdk = 'sdk_example'; // string | If included, this filters the returned series to only those that match this SDK name.
$version = 'version_example'; // string | If included, this filters the returned series to only those that match this SDK version.

try {
    $result = $apiInstance->getStreamUsageBySdkVersion($source, $from, $to, $tz, $sdk, $version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getStreamUsageBySdkVersion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source** | **string**| The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. |
 **from** | **string**| The series of data returned starts from this timestamp. Defaults to 24 hours ago. | [optional]
 **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional]
 **tz** | **string**| The timezone to use for breaks between days when returning daily data. | [optional]
 **sdk** | **string**| If included, this filters the returned series to only those that match this SDK name. | [optional]
 **version** | **string**| If included, this filters the returned series to only those that match this SDK version. | [optional]

### Return type

[**\LaunchDarklyApi\Model\SeriesListRep**](../Model/SeriesListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStreamUsageSdkversion()`

```php
getStreamUsageSdkversion($source): \LaunchDarklyApi\Model\SdkVersionListRep
```

Get stream usage SDK versions

Get a list of SDK version objects, which contain an SDK name and version. These are all of the SDKs that have connected to LaunchDarkly from your account in the past 60 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountUsageBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source = 'source_example'; // string | The source of streaming connections to describe. Must be either `client` or `server`.

try {
    $result = $apiInstance->getStreamUsageSdkversion($source);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getStreamUsageSdkversion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source** | **string**| The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. |

### Return type

[**\LaunchDarklyApi\Model\SdkVersionListRep**](../Model/SdkVersionListRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
