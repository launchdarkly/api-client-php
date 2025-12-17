# LaunchDarklyApi\AccountUsageBetaApi

All URIs are relative to https://app.launchdarkly.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getContextsClientsideUsage()**](AccountUsageBetaApi.md#getContextsClientsideUsage) | **GET** /api/v2/usage/clientside-contexts | Get contexts clientside usage |
| [**getContextsServersideUsage()**](AccountUsageBetaApi.md#getContextsServersideUsage) | **GET** /api/v2/usage/serverside-contexts | Get contexts serverside usage |
| [**getContextsTotalUsage()**](AccountUsageBetaApi.md#getContextsTotalUsage) | **GET** /api/v2/usage/total-contexts | Get contexts total usage |
| [**getDataExportEventsUsage()**](AccountUsageBetaApi.md#getDataExportEventsUsage) | **GET** /api/v2/usage/data-export-events | Get data export events usage |
| [**getEvaluationsUsage()**](AccountUsageBetaApi.md#getEvaluationsUsage) | **GET** /api/v2/usage/evaluations/{projectKey}/{environmentKey}/{featureFlagKey} | Get evaluations usage |
| [**getEventsUsage()**](AccountUsageBetaApi.md#getEventsUsage) | **GET** /api/v2/usage/events/{type} | Get events usage |
| [**getExperimentationEventsUsage()**](AccountUsageBetaApi.md#getExperimentationEventsUsage) | **GET** /api/v2/usage/experimentation-events | Get experimentation events usage |
| [**getExperimentationKeysUsage()**](AccountUsageBetaApi.md#getExperimentationKeysUsage) | **GET** /api/v2/usage/experimentation-keys | Get experimentation keys usage |
| [**getMAUClientsideUsage()**](AccountUsageBetaApi.md#getMAUClientsideUsage) | **GET** /api/v2/usage/clientside-mau | Get MAU clientside usage |
| [**getMAUTotalUsage()**](AccountUsageBetaApi.md#getMAUTotalUsage) | **GET** /api/v2/usage/total-mau | Get MAU total usage |
| [**getMauSdksByType()**](AccountUsageBetaApi.md#getMauSdksByType) | **GET** /api/v2/usage/mau/sdks | Get MAU SDKs by type |
| [**getMauUsage()**](AccountUsageBetaApi.md#getMauUsage) | **GET** /api/v2/usage/mau | Get MAU usage |
| [**getMauUsageByCategory()**](AccountUsageBetaApi.md#getMauUsageByCategory) | **GET** /api/v2/usage/mau/bycategory | Get MAU usage by category |
| [**getObservabilityErrorsUsage()**](AccountUsageBetaApi.md#getObservabilityErrorsUsage) | **GET** /api/v2/usage/observability/errors | Get observability errors usage |
| [**getObservabilityLogsUsage()**](AccountUsageBetaApi.md#getObservabilityLogsUsage) | **GET** /api/v2/usage/observability/logs | Get observability logs usage |
| [**getObservabilitySessionsUsage()**](AccountUsageBetaApi.md#getObservabilitySessionsUsage) | **GET** /api/v2/usage/observability/sessions | Get observability sessions usage |
| [**getObservabilityTracesUsage()**](AccountUsageBetaApi.md#getObservabilityTracesUsage) | **GET** /api/v2/usage/observability/traces | Get observability traces usage |
| [**getServiceConnectionsUsage()**](AccountUsageBetaApi.md#getServiceConnectionsUsage) | **GET** /api/v2/usage/service-connections | Get service connections usage |
| [**getStreamUsage()**](AccountUsageBetaApi.md#getStreamUsage) | **GET** /api/v2/usage/streams/{source} | Get stream usage |
| [**getStreamUsageBySdkVersion()**](AccountUsageBetaApi.md#getStreamUsageBySdkVersion) | **GET** /api/v2/usage/streams/{source}/bysdkversion | Get stream usage by SDK version |
| [**getStreamUsageSdkversion()**](AccountUsageBetaApi.md#getStreamUsageSdkversion) | **GET** /api/v2/usage/streams/{source}/sdkversions | Get stream usage SDK versions |


## `getContextsClientsideUsage()`

```php
getContextsClientsideUsage($from, $to, $project_key, $environment_key, $context_kind, $sdk_name, $anonymous, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get contexts clientside usage

Get a detailed time series of the number of context key usages observed by LaunchDarkly in your account, including non-primary context kinds. Use this for breakdowns that go beyond the primary-only aggregation of MAU endpoints. The counts reflect data reported by client-side SDKs.<br/><br/>The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$context_kind = 'context_kind_example'; // string | A context kind to filter results by. Can be specified multiple times, one query parameter per context kind.
$sdk_name = 'sdk_name_example'; // string | An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name.
$anonymous = 'anonymous_example'; // string | An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.<br/>Valid values: `true`, `false`.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. `contextKind` is always included as a grouping dimension. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `projectId`, `environmentId`, `sdkName`, `sdkAppId`, `anonymousV2`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.

try {
    $result = $apiInstance->getContextsClientsideUsage($from, $to, $project_key, $environment_key, $context_kind, $sdk_name, $anonymous, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getContextsClientsideUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **context_kind** | **string**| A context kind to filter results by. Can be specified multiple times, one query parameter per context kind. | [optional] |
| **sdk_name** | **string**| An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name. | [optional] |
| **anonymous** | **string**| An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.&lt;br/&gt;Valid values: &#x60;true&#x60;, &#x60;false&#x60;. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. &#x60;contextKind&#x60; is always included as a grouping dimension. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;projectId&#x60;, &#x60;environmentId&#x60;, &#x60;sdkName&#x60;, &#x60;sdkAppId&#x60;, &#x60;anonymousV2&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |

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

## `getContextsServersideUsage()`

```php
getContextsServersideUsage($from, $to, $project_key, $environment_key, $context_kind, $sdk_name, $anonymous, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get contexts serverside usage

Get a detailed time series of the number of context key usages observed by LaunchDarkly in your account, including non-primary context kinds. Use this for breakdowns that go beyond the primary-only aggregation of MAU endpoints. The counts reflect data reported by server-side SDKs.<br/><br/>The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$context_kind = 'context_kind_example'; // string | A context kind to filter results by. Can be specified multiple times, one query parameter per context kind.
$sdk_name = 'sdk_name_example'; // string | An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name.
$anonymous = 'anonymous_example'; // string | An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.<br/>Valid values: `true`, `false`.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. `contextKind` is always included as a grouping dimension. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `projectId`, `environmentId`, `sdkName`, `sdkAppId`, `anonymousV2`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.

try {
    $result = $apiInstance->getContextsServersideUsage($from, $to, $project_key, $environment_key, $context_kind, $sdk_name, $anonymous, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getContextsServersideUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **context_kind** | **string**| A context kind to filter results by. Can be specified multiple times, one query parameter per context kind. | [optional] |
| **sdk_name** | **string**| An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name. | [optional] |
| **anonymous** | **string**| An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.&lt;br/&gt;Valid values: &#x60;true&#x60;, &#x60;false&#x60;. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. &#x60;contextKind&#x60; is always included as a grouping dimension. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;projectId&#x60;, &#x60;environmentId&#x60;, &#x60;sdkName&#x60;, &#x60;sdkAppId&#x60;, &#x60;anonymousV2&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |

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

## `getContextsTotalUsage()`

```php
getContextsTotalUsage($from, $to, $project_key, $environment_key, $context_kind, $sdk_name, $sdk_type, $anonymous, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get contexts total usage

Get a detailed time series of the number of context key usages observed by LaunchDarkly in your account, including non-primary context kinds. Use this for breakdowns that go beyond the primary-only aggregation of MAU endpoints.<br/><br/>The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$context_kind = 'context_kind_example'; // string | A context kind to filter results by. Can be specified multiple times, one query parameter per context kind.
$sdk_name = 'sdk_name_example'; // string | An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name.
$sdk_type = 'sdk_type_example'; // string | An SDK type to filter results by. Can be specified multiple times, one query parameter per SDK type.
$anonymous = 'anonymous_example'; // string | An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.<br/>Valid values: `true`, `false`.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. `contextKind` is always included as a grouping dimension. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `projectId`, `environmentId`, `sdkName`, `sdkType`, `sdkAppId`, `anonymousV2`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.

try {
    $result = $apiInstance->getContextsTotalUsage($from, $to, $project_key, $environment_key, $context_kind, $sdk_name, $sdk_type, $anonymous, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getContextsTotalUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **context_kind** | **string**| A context kind to filter results by. Can be specified multiple times, one query parameter per context kind. | [optional] |
| **sdk_name** | **string**| An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name. | [optional] |
| **sdk_type** | **string**| An SDK type to filter results by. Can be specified multiple times, one query parameter per SDK type. | [optional] |
| **anonymous** | **string**| An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.&lt;br/&gt;Valid values: &#x60;true&#x60;, &#x60;false&#x60;. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. &#x60;contextKind&#x60; is always included as a grouping dimension. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;projectId&#x60;, &#x60;environmentId&#x60;, &#x60;sdkName&#x60;, &#x60;sdkType&#x60;, &#x60;sdkAppId&#x60;, &#x60;anonymousV2&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |

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

## `getDataExportEventsUsage()`

```php
getDataExportEventsUsage($from, $to, $project_key, $environment_key, $event_kind, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get data export events usage

Get a time series array showing the number of data export events from your account. The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$event_kind = 'event_kind_example'; // string | An event kind to filter results by. Can be specified multiple times, one query parameter per event kind.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `environmentId`, `eventKind`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. `monthly` granularity is only supported with the **month_to_date** aggregation type.<br/>Valid values: `daily`, `hourly`, `monthly`.

try {
    $result = $apiInstance->getDataExportEventsUsage($from, $to, $project_key, $environment_key, $event_kind, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getDataExportEventsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **event_kind** | **string**| An event kind to filter results by. Can be specified multiple times, one query parameter per event kind. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;environmentId&#x60;, &#x60;eventKind&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. &#x60;monthly&#x60; granularity is only supported with the **month_to_date** aggregation type.&lt;br/&gt;Valid values: &#x60;daily&#x60;, &#x60;hourly&#x60;, &#x60;monthly&#x60;. | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_key** | **string**| The project key | |
| **environment_key** | **string**| The environment key | |
| **feature_flag_key** | **string**| The feature flag key | |
| **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional] |
| **tz** | **string**| The timezone to use for breaks between days when returning daily data. | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| The type of event to retrieve. Must be either &#x60;received&#x60; or &#x60;published&#x60;. | |
| **from** | **string**| The series of data returned starts from this timestamp. Defaults to 24 hours ago. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional] |

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

## `getExperimentationEventsUsage()`

```php
getExperimentationEventsUsage($from, $to, $project_key, $environment_key, $event_key, $event_kind, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get experimentation events usage

Get a time series array showing the number of experimentation events from your account. The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$event_key = 'event_key_example'; // string | An event key to filter results by. Can be specified multiple times, one query parameter per event key.
$event_kind = 'event_kind_example'; // string | An event kind to filter results by. Can be specified multiple times, one query parameter per event kind.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `environmentId`, `eventKey`, `eventKind`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. `monthly` granularity is only supported with the **month_to_date** aggregation type.<br/>Valid values: `daily`, `hourly`, `monthly`.

try {
    $result = $apiInstance->getExperimentationEventsUsage($from, $to, $project_key, $environment_key, $event_key, $event_kind, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getExperimentationEventsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **event_key** | **string**| An event key to filter results by. Can be specified multiple times, one query parameter per event key. | [optional] |
| **event_kind** | **string**| An event kind to filter results by. Can be specified multiple times, one query parameter per event kind. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;environmentId&#x60;, &#x60;eventKey&#x60;, &#x60;eventKind&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. &#x60;monthly&#x60; granularity is only supported with the **month_to_date** aggregation type.&lt;br/&gt;Valid values: &#x60;daily&#x60;, &#x60;hourly&#x60;, &#x60;monthly&#x60;. | [optional] |

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
getExperimentationKeysUsage($from, $to, $project_key, $environment_key, $experiment_id, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get experimentation keys usage

Get a time series array showing the number of experimentation keys from your account. The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$experiment_id = 'experiment_id_example'; // string | An experiment ID to filter results by. Can be specified multiple times, one query parameter per experiment ID.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `projectId`, `environmentId`, `experimentId`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. `monthly` granularity is only supported with the **month_to_date** aggregation type.<br/>Valid values: `daily`, `hourly`, `monthly`.

try {
    $result = $apiInstance->getExperimentationKeysUsage($from, $to, $project_key, $environment_key, $experiment_id, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getExperimentationKeysUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **experiment_id** | **string**| An experiment ID to filter results by. Can be specified multiple times, one query parameter per experiment ID. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;projectId&#x60;, &#x60;environmentId&#x60;, &#x60;experimentId&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. &#x60;monthly&#x60; granularity is only supported with the **month_to_date** aggregation type.&lt;br/&gt;Valid values: &#x60;daily&#x60;, &#x60;hourly&#x60;, &#x60;monthly&#x60;. | [optional] |

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

## `getMAUClientsideUsage()`

```php
getMAUClientsideUsage($from, $to, $project_key, $environment_key, $sdk_name, $anonymous, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get MAU clientside usage

Get a time series of the number of context key usages observed by LaunchDarkly in your account, for the primary context kind only. The counts reflect data reported from client-side SDKs.<br/><br/>For past months, the primary context kind is fixed and reflects the last known primary kind for that month. For the current month, it may vary as new primary context kinds are observed.<br/><br/>The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$sdk_name = 'sdk_name_example'; // string | An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name.
$anonymous = 'anonymous_example'; // string | An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.<br/>Valid values: `true`, `false`.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `projectId`, `environmentId`, `sdkName`, `sdkAppId`, `anonymousV2`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.

try {
    $result = $apiInstance->getMAUClientsideUsage($from, $to, $project_key, $environment_key, $sdk_name, $anonymous, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getMAUClientsideUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **sdk_name** | **string**| An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name. | [optional] |
| **anonymous** | **string**| An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.&lt;br/&gt;Valid values: &#x60;true&#x60;, &#x60;false&#x60;. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;projectId&#x60;, &#x60;environmentId&#x60;, &#x60;sdkName&#x60;, &#x60;sdkAppId&#x60;, &#x60;anonymousV2&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |

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

## `getMAUTotalUsage()`

```php
getMAUTotalUsage($from, $to, $project_key, $environment_key, $sdk_name, $sdk_type, $anonymous, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRep
```

Get MAU total usage

Get a time series of the number of context key usages observed by LaunchDarkly in your account, for the primary context kind only.<br/><br/>For past months, this reflects the context kind that was most recently marked as primary for that month. For the current month, the context kind may vary as new primary kinds are observed.<br/><br/>The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$sdk_name = 'sdk_name_example'; // string | An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name.
$sdk_type = 'sdk_type_example'; // string | An SDK type to filter results by. Can be specified multiple times, one query parameter per SDK type.
$anonymous = 'anonymous_example'; // string | An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.<br/>Valid values: `true`, `false`.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `projectId`, `environmentId`, `sdkName`, `sdkType`, `sdkAppId`, `anonymousV2`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.

try {
    $result = $apiInstance->getMAUTotalUsage($from, $to, $project_key, $environment_key, $sdk_name, $sdk_type, $anonymous, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getMAUTotalUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **sdk_name** | **string**| An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name. | [optional] |
| **sdk_type** | **string**| An SDK type to filter results by. Can be specified multiple times, one query parameter per SDK type. | [optional] |
| **anonymous** | **string**| An anonymous value to filter results by. Can be specified multiple times, one query parameter per anonymous value.&lt;br/&gt;Valid values: &#x60;true&#x60;, &#x60;false&#x60;. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;projectId&#x60;, &#x60;environmentId&#x60;, &#x60;sdkName&#x60;, &#x60;sdkType&#x60;, &#x60;sdkAppId&#x60;, &#x60;anonymousV2&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000. | [optional] |
| **to** | **string**| The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000. | [optional] |
| **sdktype** | **string**| The type of SDK with monthly active users (MAU) to list. Must be either &#x60;client&#x60; or &#x60;server&#x60;. | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional] |
| **project** | **string**| A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects. | [optional] |
| **environment** | **string**| An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project. | [optional] |
| **sdktype** | **string**| An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server | [optional] |
| **sdk** | **string**| An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK. | [optional] |
| **anonymous** | **string**| If specified, filters results to either anonymous or nonanonymous users. | [optional] |
| **groupby** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId | [optional] |
| **aggregation_type** | **string**| If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental | [optional] |
| **context_kind** | **string**| Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind. | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional] |

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

## `getObservabilityErrorsUsage()`

```php
getObservabilityErrorsUsage($from, $to, $project_key, $granularity, $aggregation_type): \LaunchDarklyApi\Model\SeriesListRep
```

Get observability errors usage

Get time-series arrays of the number of observability errors. Supports `daily` and `monthly` granularity.

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
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.

try {
    $result = $apiInstance->getObservabilityErrorsUsage($from, $to, $project_key, $granularity, $aggregation_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getObservabilityErrorsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |

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

## `getObservabilityLogsUsage()`

```php
getObservabilityLogsUsage($from, $to, $project_key, $granularity, $aggregation_type): \LaunchDarklyApi\Model\SeriesListRep
```

Get observability logs usage

Get time-series arrays of the number of observability logs. Supports `daily` and `monthly` granularity.

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
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.

try {
    $result = $apiInstance->getObservabilityLogsUsage($from, $to, $project_key, $granularity, $aggregation_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getObservabilityLogsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |

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

## `getObservabilitySessionsUsage()`

```php
getObservabilitySessionsUsage($from, $to, $project_key, $granularity, $aggregation_type): \LaunchDarklyApi\Model\SeriesListRep
```

Get observability sessions usage

Get time-series arrays of the number of observability sessions. Supports `daily` and `monthly` granularity.

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
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.

try {
    $result = $apiInstance->getObservabilitySessionsUsage($from, $to, $project_key, $granularity, $aggregation_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getObservabilitySessionsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |

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

## `getObservabilityTracesUsage()`

```php
getObservabilityTracesUsage($from, $to, $project_key, $granularity, $aggregation_type): \LaunchDarklyApi\Model\SeriesListRep
```

Get observability traces usage

Get time-series arrays of the number of observability traces. Supports `daily` and `monthly` granularity.

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
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. Valid values depend on `aggregationType`: **month_to_date** supports `daily` and `monthly`; **incremental** and **rolling_30d** support `daily` only.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`, `rolling_30d`.

try {
    $result = $apiInstance->getObservabilityTracesUsage($from, $to, $project_key, $granularity, $aggregation_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getObservabilityTracesUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. Valid values depend on &#x60;aggregationType&#x60;: **month_to_date** supports &#x60;daily&#x60; and &#x60;monthly&#x60;; **incremental** and **rolling_30d** support &#x60;daily&#x60; only. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;, &#x60;rolling_30d&#x60;. | [optional] |

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

## `getServiceConnectionsUsage()`

```php
getServiceConnectionsUsage($from, $to, $project_key, $environment_key, $connection_type, $relay_version, $sdk_name, $sdk_version, $sdk_type, $group_by, $aggregation_type, $granularity): \LaunchDarklyApi\Model\SeriesListRepFloat
```

Get service connections usage

Get a time series array showing the number of service connection minutes from your account. The supported granularity varies by aggregation type. The maximum time range is 365 days.

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
$from = 'from_example'; // string | The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month.
$to = 'to_example'; // string | The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time.
$project_key = 'project_key_example'; // string | A project key to filter results by. Can be specified multiple times, one query parameter per project key.
$environment_key = 'environment_key_example'; // string | An environment key to filter results by. If specified, exactly one `projectKey` must be provided. Can be specified multiple times, one query parameter per environment key.
$connection_type = 'connection_type_example'; // string | A connection type to filter results by. Can be specified multiple times, one query parameter per connection type.
$relay_version = 'relay_version_example'; // string | A relay version to filter results by. Can be specified multiple times, one query parameter per relay version.
$sdk_name = 'sdk_name_example'; // string | An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name.
$sdk_version = 'sdk_version_example'; // string | An SDK version to filter results by. Can be specified multiple times, one query parameter per SDK version.
$sdk_type = 'sdk_type_example'; // string | An SDK type to filter results by. Can be specified multiple times, one query parameter per SDK type.
$group_by = 'group_by_example'; // string | If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.<br/>Valid values: `projectId`, `environmentId`, `connectionType`, `relayVersion`, `sdkName`, `sdkVersion`, `sdkType`.
$aggregation_type = 'aggregation_type_example'; // string | Specifies the aggregation method. Defaults to `month_to_date`.<br/>Valid values: `month_to_date`, `incremental`.
$granularity = 'granularity_example'; // string | Specifies the data granularity. Defaults to `daily`. `monthly` granularity is only supported with the **month_to_date** aggregation type.<br/>Valid values: `daily`, `hourly`, `monthly`.

try {
    $result = $apiInstance->getServiceConnectionsUsage($from, $to, $project_key, $environment_key, $connection_type, $relay_version, $sdk_name, $sdk_version, $sdk_type, $group_by, $aggregation_type, $granularity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUsageBetaApi->getServiceConnectionsUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| The series of data returned starts from this timestamp (Unix milliseconds). Defaults to the beginning of the current month. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp (Unix milliseconds). Defaults to the current time. | [optional] |
| **project_key** | **string**| A project key to filter results by. Can be specified multiple times, one query parameter per project key. | [optional] |
| **environment_key** | **string**| An environment key to filter results by. If specified, exactly one &#x60;projectKey&#x60; must be provided. Can be specified multiple times, one query parameter per environment key. | [optional] |
| **connection_type** | **string**| A connection type to filter results by. Can be specified multiple times, one query parameter per connection type. | [optional] |
| **relay_version** | **string**| A relay version to filter results by. Can be specified multiple times, one query parameter per relay version. | [optional] |
| **sdk_name** | **string**| An SDK name to filter results by. Can be specified multiple times, one query parameter per SDK name. | [optional] |
| **sdk_version** | **string**| An SDK version to filter results by. Can be specified multiple times, one query parameter per SDK version. | [optional] |
| **sdk_type** | **string**| An SDK type to filter results by. Can be specified multiple times, one query parameter per SDK type. | [optional] |
| **group_by** | **string**| If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions, one query parameter per dimension.&lt;br/&gt;Valid values: &#x60;projectId&#x60;, &#x60;environmentId&#x60;, &#x60;connectionType&#x60;, &#x60;relayVersion&#x60;, &#x60;sdkName&#x60;, &#x60;sdkVersion&#x60;, &#x60;sdkType&#x60;. | [optional] |
| **aggregation_type** | **string**| Specifies the aggregation method. Defaults to &#x60;month_to_date&#x60;.&lt;br/&gt;Valid values: &#x60;month_to_date&#x60;, &#x60;incremental&#x60;. | [optional] |
| **granularity** | **string**| Specifies the data granularity. Defaults to &#x60;daily&#x60;. &#x60;monthly&#x60; granularity is only supported with the **month_to_date** aggregation type.&lt;br/&gt;Valid values: &#x60;daily&#x60;, &#x60;hourly&#x60;, &#x60;monthly&#x60;. | [optional] |

### Return type

[**\LaunchDarklyApi\Model\SeriesListRepFloat**](../Model/SeriesListRepFloat.md)

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source** | **string**| The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. | |
| **from** | **string**| The series of data returned starts from this timestamp. Defaults to 30 days ago. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional] |
| **tz** | **string**| The timezone to use for breaks between days when returning daily data. | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source** | **string**| The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. | |
| **from** | **string**| The series of data returned starts from this timestamp. Defaults to 24 hours ago. | [optional] |
| **to** | **string**| The series of data returned ends at this timestamp. Defaults to the current time. | [optional] |
| **tz** | **string**| The timezone to use for breaks between days when returning daily data. | [optional] |
| **sdk** | **string**| If included, this filters the returned series to only those that match this SDK name. | [optional] |
| **version** | **string**| If included, this filters the returned series to only those that match this SDK version. | [optional] |

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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source** | **string**| The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. | |

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
