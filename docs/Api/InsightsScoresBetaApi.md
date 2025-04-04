# LaunchDarklyApi\InsightsScoresBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createInsightGroup()**](InsightsScoresBetaApi.md#createInsightGroup) | **POST** /api/v2/engineering-insights/insights/group | Create insight group
[**deleteInsightGroup()**](InsightsScoresBetaApi.md#deleteInsightGroup) | **DELETE** /api/v2/engineering-insights/insights/groups/{insightGroupKey} | Delete insight group
[**getInsightGroup()**](InsightsScoresBetaApi.md#getInsightGroup) | **GET** /api/v2/engineering-insights/insights/groups/{insightGroupKey} | Get insight group
[**getInsightGroups()**](InsightsScoresBetaApi.md#getInsightGroups) | **GET** /api/v2/engineering-insights/insights/groups | List insight groups
[**getInsightsScores()**](InsightsScoresBetaApi.md#getInsightsScores) | **GET** /api/v2/engineering-insights/insights/scores | Get insight scores
[**patchInsightGroup()**](InsightsScoresBetaApi.md#patchInsightGroup) | **PATCH** /api/v2/engineering-insights/insights/groups/{insightGroupKey} | Patch insight group


## `createInsightGroup()`

```php
createInsightGroup($post_insight_group_params): \LaunchDarklyApi\Model\InsightGroup
```

Create insight group

Create insight group

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsScoresBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$post_insight_group_params = new \LaunchDarklyApi\Model\PostInsightGroupParams(); // \LaunchDarklyApi\Model\PostInsightGroupParams

try {
    $result = $apiInstance->createInsightGroup($post_insight_group_params);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsScoresBetaApi->createInsightGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **post_insight_group_params** | [**\LaunchDarklyApi\Model\PostInsightGroupParams**](../Model/PostInsightGroupParams.md)|  |

### Return type

[**\LaunchDarklyApi\Model\InsightGroup**](../Model/InsightGroup.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteInsightGroup()`

```php
deleteInsightGroup($insight_group_key)
```

Delete insight group

Delete insight group

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsScoresBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$insight_group_key = 'insight_group_key_example'; // string | The insight group key

try {
    $apiInstance->deleteInsightGroup($insight_group_key);
} catch (Exception $e) {
    echo 'Exception when calling InsightsScoresBetaApi->deleteInsightGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **insight_group_key** | **string**| The insight group key |

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

## `getInsightGroup()`

```php
getInsightGroup($insight_group_key, $expand): \LaunchDarklyApi\Model\InsightGroup
```

Get insight group

Get insight group  ### Expanding the insight group response  LaunchDarkly supports expanding the insight group response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `scores` includes details on all of the scores used in the engineering insights metrics views for this group * `environment` includes details on each environment associated with this group  For example, use `?expand=scores` to include the `scores` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsScoresBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$insight_group_key = 'insight_group_key_example'; // string | The insight group key
$expand = 'expand_example'; // string | Options: `scores`, `environment`

try {
    $result = $apiInstance->getInsightGroup($insight_group_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsScoresBetaApi->getInsightGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **insight_group_key** | **string**| The insight group key |
 **expand** | **string**| Options: &#x60;scores&#x60;, &#x60;environment&#x60; | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightGroup**](../Model/InsightGroup.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInsightGroups()`

```php
getInsightGroups($limit, $offset, $sort, $query, $expand): \LaunchDarklyApi\Model\InsightGroupCollection
```

List insight groups

List groups for which you are collecting insights  ### Expanding the insight groups collection response  LaunchDarkly supports expanding the insight groups collection response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `scores` includes details on all of the scores used in the engineering insights metrics views for each group * `environment` includes details on each environment associated with each group * `metadata` includes counts of the number of insight groups with particular indicators, such as \"excellent,\" \"good,\" \"fair,\" and so on.  For example, use `?expand=scores` to include the `scores` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsScoresBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | The number of insight groups to return. Default is 20. Must be between 1 and 20 inclusive.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$sort = 'sort_example'; // string | Sort flag list by field. Prefix field with <code>-</code> to sort in descending order. Allowed fields: name
$query = 'query_example'; // string | Filter list of insights groups by name.
$expand = 'expand_example'; // string | Options: `scores`, `environment`, `metadata`

try {
    $result = $apiInstance->getInsightGroups($limit, $offset, $sort, $query, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsScoresBetaApi->getInsightGroups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**| The number of insight groups to return. Default is 20. Must be between 1 and 20 inclusive. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]
 **sort** | **string**| Sort flag list by field. Prefix field with &lt;code&gt;-&lt;/code&gt; to sort in descending order. Allowed fields: name | [optional]
 **query** | **string**| Filter list of insights groups by name. | [optional]
 **expand** | **string**| Options: &#x60;scores&#x60;, &#x60;environment&#x60;, &#x60;metadata&#x60; | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightGroupCollection**](../Model/InsightGroupCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInsightsScores()`

```php
getInsightsScores($project_key, $environment_key, $application_key): \LaunchDarklyApi\Model\InsightScores
```

Get insight scores

Return insights scores, based on the given parameters. This data is also used in engineering insights metrics views.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsScoresBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys

try {
    $result = $apiInstance->getInsightsScores($project_key, $environment_key, $application_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsScoresBetaApi->getInsightsScores: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **application_key** | **string**| Comma separated list of application keys | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightScores**](../Model/InsightScores.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchInsightGroup()`

```php
patchInsightGroup($insight_group_key, $patch_operation): \LaunchDarklyApi\Model\InsightGroup
```

Patch insight group

Update an insight group. Updating an insight group uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsScoresBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$insight_group_key = 'insight_group_key_example'; // string | The insight group key
$patch_operation = [{"op":"replace","path":"/name","value":"Prod group"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchInsightGroup($insight_group_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsScoresBetaApi->patchInsightGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **insight_group_key** | **string**| The insight group key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\InsightGroup**](../Model/InsightGroup.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
