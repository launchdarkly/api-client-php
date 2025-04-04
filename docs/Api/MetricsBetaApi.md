# LaunchDarklyApi\MetricsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createMetricGroup()**](MetricsBetaApi.md#createMetricGroup) | **POST** /api/v2/projects/{projectKey}/metric-groups | Create metric group
[**deleteMetricGroup()**](MetricsBetaApi.md#deleteMetricGroup) | **DELETE** /api/v2/projects/{projectKey}/metric-groups/{metricGroupKey} | Delete metric group
[**getMetricGroup()**](MetricsBetaApi.md#getMetricGroup) | **GET** /api/v2/projects/{projectKey}/metric-groups/{metricGroupKey} | Get metric group
[**getMetricGroups()**](MetricsBetaApi.md#getMetricGroups) | **GET** /api/v2/projects/{projectKey}/metric-groups | List metric groups
[**patchMetricGroup()**](MetricsBetaApi.md#patchMetricGroup) | **PATCH** /api/v2/projects/{projectKey}/metric-groups/{metricGroupKey} | Patch metric group


## `createMetricGroup()`

```php
createMetricGroup($project_key, $metric_group_post): \LaunchDarklyApi\Model\MetricGroupRep
```

Create metric group

Create a new metric group in the specified project

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$metric_group_post = new \LaunchDarklyApi\Model\MetricGroupPost(); // \LaunchDarklyApi\Model\MetricGroupPost

try {
    $result = $apiInstance->createMetricGroup($project_key, $metric_group_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsBetaApi->createMetricGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_group_post** | [**\LaunchDarklyApi\Model\MetricGroupPost**](../Model/MetricGroupPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\MetricGroupRep**](../Model/MetricGroupRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteMetricGroup()`

```php
deleteMetricGroup($project_key, $metric_group_key)
```

Delete metric group

Delete a metric group by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$metric_group_key = 'metric_group_key_example'; // string | The metric group key

try {
    $apiInstance->deleteMetricGroup($project_key, $metric_group_key);
} catch (Exception $e) {
    echo 'Exception when calling MetricsBetaApi->deleteMetricGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_group_key** | **string**| The metric group key |

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

## `getMetricGroup()`

```php
getMetricGroup($project_key, $metric_group_key, $expand): \LaunchDarklyApi\Model\MetricGroupRep
```

Get metric group

Get information for a single metric group from the specific project.  ### Expanding the metric group response LaunchDarkly supports two fields for expanding the \"Get metric group\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with either or both of the following fields:  - `experiments` includes all experiments from the specific project that use the metric group - `experimentCount` includes the number of experiments from the specific project that use the metric group  For example, `expand=experiments` includes the `experiments` field in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$metric_group_key = 'metric_group_key_example'; // string | The metric group key
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.

try {
    $result = $apiInstance->getMetricGroup($project_key, $metric_group_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsBetaApi->getMetricGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_group_key** | **string**| The metric group key |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]

### Return type

[**\LaunchDarklyApi\Model\MetricGroupRep**](../Model/MetricGroupRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMetricGroups()`

```php
getMetricGroups($project_key, $filter, $sort, $expand, $limit, $offset): \LaunchDarklyApi\Model\MetricGroupCollectionRep
```

List metric groups

Get a list of all metric groups for the specified project.  ### Expanding the metric groups response LaunchDarkly supports one field for expanding the \"Get metric groups\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with the following field:  - `experiments` includes all experiments from the specific project that use the metric group  For example, `expand=experiments` includes the `experiments` field in the response.  ### Filtering metric groups  The `filter` parameter supports the following operators: `contains`, `equals`, `anyOf`.  #### Supported fields and operators  You can only filter certain fields in metrics when using the `filter` parameter. Additionally, you can only filter some fields with certain operators.  When you search for metrics, the `filter` parameter supports the following fields and operators:  |<div style=\"width:120px\">Field</div> |Description |Supported operators | |---|---|---| | `experimentStatus` | The experiment's status. One of `not_started`, `running`, `stopped`, `started`. | `equals` | | `hasConnections` | Whether the metric group has connections to experiments or guarded rollouts. One of `true`, `false`. | `equals` | | `kind` | The metric group kind. One of `funnel`, `standard`. | `equals` | | `maintainerIds` | The metric maintainer IDs. | `anyOf` | | `maintainerTeamKey` | The metric maintainer team key. | `equals` | | `query` | A \"fuzzy\" search across metric group key and name. Supply a string or list of strings to the operator. | `equals` |  ### Sorting metric groups  LaunchDarkly supports the following fields for sorting:  - `name` sorts by metric group name. - `createdAt` sorts by the creation date of the metric group. - `connectionCount` sorts by the number of connections to experiments the metric group has.  By default, the sort is in ascending order. Use `-` to sort in descending order. For example, `?sort=name` sorts the response by metric group name in ascending order, and `?sort=-name` sorts in descending order.  #### Sample query  `filter=experimentStatus equals 'not_started' and query equals 'metric name'`

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$filter = 'filter_example'; // string | Accepts filter by `experimentStatus`, `query`, `kind`, `hasConnections`, `maintainerIds`, and `maintainerTeamKey`. Example: `filter=experimentStatus equals 'running' and query equals 'test'`.
$sort = 'sort_example'; // string | A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order. Read the endpoint description for a full list of available sort fields.
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.
$limit = 56; // int | The number of metric groups to return in the response. Defaults to 20. Maximum limit is 50.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next `limit` items.

try {
    $result = $apiInstance->getMetricGroups($project_key, $filter, $sort, $expand, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsBetaApi->getMetricGroups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **filter** | **string**| Accepts filter by &#x60;experimentStatus&#x60;, &#x60;query&#x60;, &#x60;kind&#x60;, &#x60;hasConnections&#x60;, &#x60;maintainerIds&#x60;, and &#x60;maintainerTeamKey&#x60;. Example: &#x60;filter&#x3D;experimentStatus equals &#39;running&#39; and query equals &#39;test&#39;&#x60;. | [optional]
 **sort** | **string**| A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order. Read the endpoint description for a full list of available sort fields. | [optional]
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]
 **limit** | **int**| The number of metric groups to return in the response. Defaults to 20. Maximum limit is 50. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next &#x60;limit&#x60; items. | [optional]

### Return type

[**\LaunchDarklyApi\Model\MetricGroupCollectionRep**](../Model/MetricGroupCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchMetricGroup()`

```php
patchMetricGroup($project_key, $metric_group_key, $patch_operation): \LaunchDarklyApi\Model\MetricGroupRep
```

Patch metric group

Patch a metric group by key. Updating a metric group uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\MetricsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$metric_group_key = 'metric_group_key_example'; // string | The metric group key
$patch_operation = [{"op":"replace","path":"/name","value":"my-updated-metric-group"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchMetricGroup($project_key, $metric_group_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetricsBetaApi->patchMetricGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **metric_group_key** | **string**| The metric group key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\MetricGroupRep**](../Model/MetricGroupRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
