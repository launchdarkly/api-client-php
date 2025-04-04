# LaunchDarklyApi\MetricsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteMetric()**](MetricsApi.md#deleteMetric) | **DELETE** /api/v2/metrics/{projectKey}/{metricKey} | Delete metric
[**getMetric()**](MetricsApi.md#getMetric) | **GET** /api/v2/metrics/{projectKey}/{metricKey} | Get metric
[**getMetrics()**](MetricsApi.md#getMetrics) | **GET** /api/v2/metrics/{projectKey} | List metrics
[**patchMetric()**](MetricsApi.md#patchMetric) | **PATCH** /api/v2/metrics/{projectKey}/{metricKey} | Update metric
[**postMetric()**](MetricsApi.md#postMetric) | **POST** /api/v2/metrics/{projectKey} | Create metric


## `deleteMetric()`

```php
deleteMetric($project_key, $metric_key)
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
$metric_key = 'metric_key_example'; // string | The metric key

try {
    $apiInstance->deleteMetric($project_key, $metric_key);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->deleteMetric: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_key** | **string**| The metric key |

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
getMetric($project_key, $metric_key, $expand, $version_id): \LaunchDarklyApi\Model\MetricRep
```

Get metric

Get information for a single metric from the specific project.  ### Expanding the metric response LaunchDarkly supports four fields for expanding the \"Get metric\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  - `experiments` includes all experiments from the specific project that use the metric - `experimentCount` includes the number of experiments from the specific project that use the metric - `metricGroups` includes all metric groups from the specific project that use the metric - `metricGroupCount` includes the number of metric groups from the specific project that use the metric  For example, `expand=experiments` includes the `experiments` field in the response.

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
$metric_key = 'metric_key_example'; // string | The metric key
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.
$version_id = 'version_id_example'; // string | The specific version ID of the metric

try {
    $result = $apiInstance->getMetric($project_key, $metric_key, $expand, $version_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->getMetric: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_key** | **string**| The metric key |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]
 **version_id** | **string**| The specific version ID of the metric | [optional]

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
getMetrics($project_key, $expand, $limit, $offset, $sort, $filter): \LaunchDarklyApi\Model\MetricCollectionRep
```

List metrics

Get a list of all metrics for the specified project.  ### Filtering metrics  The `filter` parameter supports the following operators: `contains`, `equals`, `anyOf`.  #### Supported fields and operators  You can only filter certain fields in metrics when using the `filter` parameter. Additionally, you can only filter some fields with certain operators.  When you search for metrics, the `filter` parameter supports the following fields and operators:  |<div style=\"width:120px\">Field</div> |Description |Supported operators | |---|---|---| | `eventKind` | The metric event kind. One of `custom`, `pageview`, `click`. | `equals` | | `hasConnections` | Whether the metric has connections to experiments or guarded rollouts. One of `true`, `false`. | `equals` | | `isNumeric` | Whether the metric is numeric. One of `true`, `false`. | `equals` | | `maintainerIds` | A comma-separated list of metric maintainer IDs. | `anyOf` | | `maintainerTeamKey` | The metric maintainer team key. | `equals` | | `query` | A \"fuzzy\" search across metric key and name. Supply a string or list of strings to the operator. | `equals` | | `tags` | The metric tags. | `contains` | | `unitAggregationType` | The metric's unit aggregation type. One of `sum`, `average`. | `equals` |  For example, the filter `?filter=tags contains [\"tag1\", \"tag2\", \"tag3\"]` matches metrics that have all three tags.  The documented values for `filter` query parameters are prior to URL encoding. For example, the `[` in `?filter=tags contains [\"tag1\", \"tag2\", \"tag3\"]` must be encoded to `%5B`.  ### Expanding the metric list response  LaunchDarkly supports expanding the \"List metrics\" response. By default, the expandable field is **not** included in the response.  To expand the response, append the `expand` query parameter and add the following supported field:  - `experimentCount` includes the number of experiments from the specific project that use the metric  For example, `expand=experimentCount` includes the `experimentCount` field for each metric in the response.

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
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.
$limit = 56; // int | The number of metrics to return in the response. Defaults to 20. Maximum limit is 50.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next `limit` items.
$sort = 'sort_example'; // string | A field to sort the items by. Prefix field by a dash ( - ) to sort in descending order. This endpoint supports sorting by `createdAt` or `name`.
$filter = 'filter_example'; // string | A comma-separated list of filters. This endpoint accepts filtering by `query`, `tags`, 'eventKind', 'isNumeric', 'unitAggregationType`, `hasConnections`, `maintainerIds`, and `maintainerTeamKey`. To learn more about the filter syntax, read the 'Filtering metrics' section above.

try {
    $result = $apiInstance->getMetrics($project_key, $expand, $limit, $offset, $sort, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->getMetrics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]
 **limit** | **int**| The number of metrics to return in the response. Defaults to 20. Maximum limit is 50. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next &#x60;limit&#x60; items. | [optional]
 **sort** | **string**| A field to sort the items by. Prefix field by a dash ( - ) to sort in descending order. This endpoint supports sorting by &#x60;createdAt&#x60; or &#x60;name&#x60;. | [optional]
 **filter** | **string**| A comma-separated list of filters. This endpoint accepts filtering by &#x60;query&#x60;, &#x60;tags&#x60;, &#39;eventKind&#39;, &#39;isNumeric&#39;, &#39;unitAggregationType&#x60;, &#x60;hasConnections&#x60;, &#x60;maintainerIds&#x60;, and &#x60;maintainerTeamKey&#x60;. To learn more about the filter syntax, read the &#39;Filtering metrics&#39; section above. | [optional]

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
patchMetric($project_key, $metric_key, $patch_operation): \LaunchDarklyApi\Model\MetricRep
```

Update metric

Patch a metric by key. Updating a metric uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

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
$metric_key = 'metric_key_example'; // string | The metric key
$patch_operation = [{"op":"replace","path":"/name","value":"my-updated-metric"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchMetric($project_key, $metric_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsApi->patchMetric: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_key** | **string**| The metric key |
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

Create a new metric in the specified project. The expected `POST` body differs depending on the specified `kind` property.

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
$metric_post = {"eventKey":"Order placed","isNumeric":false,"key":"metric-key-123abc","kind":"custom"}; // \LaunchDarklyApi\Model\MetricPost

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
