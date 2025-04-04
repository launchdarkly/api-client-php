# LaunchDarklyApi\ContextsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteContextInstances()**](ContextsApi.md#deleteContextInstances) | **DELETE** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-instances/{id} | Delete context instances
[**evaluateContextInstance()**](ContextsApi.md#evaluateContextInstance) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/flags/evaluate | Evaluate flags for context instance
[**getContextAttributeNames()**](ContextsApi.md#getContextAttributeNames) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-attributes | Get context attribute names
[**getContextAttributeValues()**](ContextsApi.md#getContextAttributeValues) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-attributes/{attributeName} | Get context attribute values
[**getContextInstances()**](ContextsApi.md#getContextInstances) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-instances/{id} | Get context instances
[**getContextKindsByProjectKey()**](ContextsApi.md#getContextKindsByProjectKey) | **GET** /api/v2/projects/{projectKey}/context-kinds | Get context kinds
[**getContexts()**](ContextsApi.md#getContexts) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/contexts/{kind}/{key} | Get contexts
[**putContextKind()**](ContextsApi.md#putContextKind) | **PUT** /api/v2/projects/{projectKey}/context-kinds/{key} | Create or update context kind
[**searchContextInstances()**](ContextsApi.md#searchContextInstances) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-instances/search | Search for context instances
[**searchContexts()**](ContextsApi.md#searchContexts) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/contexts/search | Search for contexts


## `deleteContextInstances()`

```php
deleteContextInstances($project_key, $environment_key, $id)
```

Delete context instances

Delete context instances by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The context instance ID

try {
    $apiInstance->deleteContextInstances($project_key, $environment_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->deleteContextInstances: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The context instance ID |

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

## `evaluateContextInstance()`

```php
evaluateContextInstance($project_key, $environment_key, $request_body, $limit, $offset, $sort, $filter): \LaunchDarklyApi\Model\ContextInstanceEvaluations
```

Evaluate flags for context instance

Evaluate flags for a context instance, for example, to determine the expected flag variation. **Do not use this API instead of an SDK.** The LaunchDarkly SDKs are specialized for the tasks of evaluating feature flags in your application at scale and generating analytics events based on those evaluations. This API is not designed for that use case. Any evaluations you perform with this API will not be reflected in features such as flag statuses and flag insights. Context instances evaluated by this API will not appear in the Contexts list. To learn more, read [Comparing LaunchDarkly's SDKs and REST API](https://launchdarkly.com/docs/guides/api/comparing-sdk-rest-api).  ### Filtering  LaunchDarkly supports the `filter` query param for filtering, with the following fields:  - `query` filters for a string that matches against the flags' keys and names. It is not case sensitive. For example: `filter=query equals dark-mode`. - `tags` filters the list to flags that have all of the tags in the list. For example: `filter=tags contains [\"beta\",\"q1\"]`.  You can also apply multiple filters at once. For example, setting `filter=query equals dark-mode, tags contains [\"beta\",\"q1\"]` matches flags which match the key or name `dark-mode` and are tagged `beta` and `q1`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$request_body = {"key":"user-key-123abc","kind":"user","otherAttribute":"other attribute value"}; // array<string,mixed>
$limit = 56; // int | The number of feature flags to return. Defaults to -1, which returns all flags
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$sort = 'sort_example'; // string | A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is of the form `field operator value`. Supported fields are explained above.

try {
    $result = $apiInstance->evaluateContextInstance($project_key, $environment_key, $request_body, $limit, $offset, $sort, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->evaluateContextInstance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **request_body** | [**array<string,mixed>**](../Model/mixed.md)|  |
 **limit** | **int**| The number of feature flags to return. Defaults to -1, which returns all flags | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]
 **sort** | **string**| A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order | [optional]
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ContextInstanceEvaluations**](../Model/ContextInstanceEvaluations.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getContextAttributeNames()`

```php
getContextAttributeNames($project_key, $environment_key, $filter, $limit): \LaunchDarklyApi\Model\ContextAttributeNamesCollection
```

Get context attribute names

Get context attribute names.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$filter = 'filter_example'; // string | A comma-separated list of context filters. This endpoint only accepts `kind` filters, with the `equals` operator, and `name` filters, with the `startsWith` operator. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances).
$limit = 56; // int | Specifies the maximum number of items in the collection to return (max: 100, default: 100)

try {
    $result = $apiInstance->getContextAttributeNames($project_key, $environment_key, $filter, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->getContextAttributeNames: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **filter** | **string**| A comma-separated list of context filters. This endpoint only accepts &#x60;kind&#x60; filters, with the &#x60;equals&#x60; operator, and &#x60;name&#x60; filters, with the &#x60;startsWith&#x60; operator. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). | [optional]
 **limit** | **int**| Specifies the maximum number of items in the collection to return (max: 100, default: 100) | [optional]

### Return type

[**\LaunchDarklyApi\Model\ContextAttributeNamesCollection**](../Model/ContextAttributeNamesCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getContextAttributeValues()`

```php
getContextAttributeValues($project_key, $environment_key, $attribute_name, $filter, $limit): \LaunchDarklyApi\Model\ContextAttributeValuesCollection
```

Get context attribute values

Get context attribute values.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$attribute_name = 'attribute_name_example'; // string | The attribute name
$filter = 'filter_example'; // string | A comma-separated list of context filters. This endpoint only accepts `kind` filters, with the `equals` operator, and `value` filters, with the `startsWith` operator. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances).
$limit = 56; // int | Specifies the maximum number of items in the collection to return (max: 100, default: 50)

try {
    $result = $apiInstance->getContextAttributeValues($project_key, $environment_key, $attribute_name, $filter, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->getContextAttributeValues: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **attribute_name** | **string**| The attribute name |
 **filter** | **string**| A comma-separated list of context filters. This endpoint only accepts &#x60;kind&#x60; filters, with the &#x60;equals&#x60; operator, and &#x60;value&#x60; filters, with the &#x60;startsWith&#x60; operator. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). | [optional]
 **limit** | **int**| Specifies the maximum number of items in the collection to return (max: 100, default: 50) | [optional]

### Return type

[**\LaunchDarklyApi\Model\ContextAttributeValuesCollection**](../Model/ContextAttributeValuesCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getContextInstances()`

```php
getContextInstances($project_key, $environment_key, $id, $limit, $continuation_token, $sort, $filter, $include_total_count): \LaunchDarklyApi\Model\ContextInstances
```

Get context instances

Get context instances by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The context instance ID
$limit = 56; // int | Specifies the maximum number of context instances to return (max: 50, default: 20)
$continuation_token = 'continuation_token_example'; // string | Limits results to context instances with sort values after the value specified. You can use this for pagination, however, we recommend using the `next` link we provide instead.
$sort = 'sort_example'; // string | Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying `ts` for this value, or descending order by specifying `-ts`.
$filter = 'filter_example'; // string | A comma-separated list of context filters. This endpoint only accepts an `applicationId` filter. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances).
$include_total_count = True; // bool | Specifies whether to include or omit the total count of matching context instances. Defaults to true.

try {
    $result = $apiInstance->getContextInstances($project_key, $environment_key, $id, $limit, $continuation_token, $sort, $filter, $include_total_count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->getContextInstances: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The context instance ID |
 **limit** | **int**| Specifies the maximum number of context instances to return (max: 50, default: 20) | [optional]
 **continuation_token** | **string**| Limits results to context instances with sort values after the value specified. You can use this for pagination, however, we recommend using the &#x60;next&#x60; link we provide instead. | [optional]
 **sort** | **string**| Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying &#x60;ts&#x60; for this value, or descending order by specifying &#x60;-ts&#x60;. | [optional]
 **filter** | **string**| A comma-separated list of context filters. This endpoint only accepts an &#x60;applicationId&#x60; filter. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). | [optional]
 **include_total_count** | **bool**| Specifies whether to include or omit the total count of matching context instances. Defaults to true. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ContextInstances**](../Model/ContextInstances.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getContextKindsByProjectKey()`

```php
getContextKindsByProjectKey($project_key): \LaunchDarklyApi\Model\ContextKindsCollectionRep
```

Get context kinds

Get all context kinds for a given project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key

try {
    $result = $apiInstance->getContextKindsByProjectKey($project_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->getContextKindsByProjectKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |

### Return type

[**\LaunchDarklyApi\Model\ContextKindsCollectionRep**](../Model/ContextKindsCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getContexts()`

```php
getContexts($project_key, $environment_key, $kind, $key, $limit, $continuation_token, $sort, $filter, $include_total_count): \LaunchDarklyApi\Model\Contexts
```

Get contexts

Get contexts based on kind and key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$kind = 'kind_example'; // string | The context kind
$key = 'key_example'; // string | The context key
$limit = 56; // int | Specifies the maximum number of items in the collection to return (max: 50, default: 20)
$continuation_token = 'continuation_token_example'; // string | Limits results to contexts with sort values after the value specified. You can use this for pagination, however, we recommend using the `next` link we provide instead.
$sort = 'sort_example'; // string | Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying `ts` for this value, or descending order by specifying `-ts`.
$filter = 'filter_example'; // string | A comma-separated list of context filters. This endpoint only accepts an `applicationId` filter. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances).
$include_total_count = True; // bool | Specifies whether to include or omit the total count of matching contexts. Defaults to true.

try {
    $result = $apiInstance->getContexts($project_key, $environment_key, $kind, $key, $limit, $continuation_token, $sort, $filter, $include_total_count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->getContexts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **kind** | **string**| The context kind |
 **key** | **string**| The context key |
 **limit** | **int**| Specifies the maximum number of items in the collection to return (max: 50, default: 20) | [optional]
 **continuation_token** | **string**| Limits results to contexts with sort values after the value specified. You can use this for pagination, however, we recommend using the &#x60;next&#x60; link we provide instead. | [optional]
 **sort** | **string**| Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying &#x60;ts&#x60; for this value, or descending order by specifying &#x60;-ts&#x60;. | [optional]
 **filter** | **string**| A comma-separated list of context filters. This endpoint only accepts an &#x60;applicationId&#x60; filter. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). | [optional]
 **include_total_count** | **bool**| Specifies whether to include or omit the total count of matching contexts. Defaults to true. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Contexts**](../Model/Contexts.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putContextKind()`

```php
putContextKind($project_key, $key, $upsert_context_kind_payload): \LaunchDarklyApi\Model\UpsertResponseRep
```

Create or update context kind

Create or update a context kind by key. Only the included fields will be updated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$key = 'key_example'; // string | The context kind key
$upsert_context_kind_payload = new \LaunchDarklyApi\Model\UpsertContextKindPayload(); // \LaunchDarklyApi\Model\UpsertContextKindPayload

try {
    $result = $apiInstance->putContextKind($project_key, $key, $upsert_context_kind_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->putContextKind: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **key** | **string**| The context kind key |
 **upsert_context_kind_payload** | [**\LaunchDarklyApi\Model\UpsertContextKindPayload**](../Model/UpsertContextKindPayload.md)|  |

### Return type

[**\LaunchDarklyApi\Model\UpsertResponseRep**](../Model/UpsertResponseRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `searchContextInstances()`

```php
searchContextInstances($project_key, $environment_key, $context_instance_search, $limit, $continuation_token, $sort, $filter, $include_total_count): \LaunchDarklyApi\Model\ContextInstances
```

Search for context instances

Search for context instances.  You can use either the query parameters or the request body parameters. If both are provided, there is an error.  To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). To learn more about context instances, read [Context instances](https://launchdarkly.com/docs/home/observability/multi-contexts#context-instances).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$context_instance_search = new \LaunchDarklyApi\Model\ContextInstanceSearch(); // \LaunchDarklyApi\Model\ContextInstanceSearch
$limit = 56; // int | Specifies the maximum number of items in the collection to return (max: 50, default: 20)
$continuation_token = 'continuation_token_example'; // string | Limits results to context instances with sort values after the value specified. You can use this for pagination, however, we recommend using the `next` link we provide instead.
$sort = 'sort_example'; // string | Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying `ts` for this value, or descending order by specifying `-ts`.
$filter = 'filter_example'; // string | A comma-separated list of context filters. This endpoint only accepts an `applicationId` filter. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances).
$include_total_count = True; // bool | Specifies whether to include or omit the total count of matching context instances. Defaults to true.

try {
    $result = $apiInstance->searchContextInstances($project_key, $environment_key, $context_instance_search, $limit, $continuation_token, $sort, $filter, $include_total_count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->searchContextInstances: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **context_instance_search** | [**\LaunchDarklyApi\Model\ContextInstanceSearch**](../Model/ContextInstanceSearch.md)|  |
 **limit** | **int**| Specifies the maximum number of items in the collection to return (max: 50, default: 20) | [optional]
 **continuation_token** | **string**| Limits results to context instances with sort values after the value specified. You can use this for pagination, however, we recommend using the &#x60;next&#x60; link we provide instead. | [optional]
 **sort** | **string**| Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying &#x60;ts&#x60; for this value, or descending order by specifying &#x60;-ts&#x60;. | [optional]
 **filter** | **string**| A comma-separated list of context filters. This endpoint only accepts an &#x60;applicationId&#x60; filter. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). | [optional]
 **include_total_count** | **bool**| Specifies whether to include or omit the total count of matching context instances. Defaults to true. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ContextInstances**](../Model/ContextInstances.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `searchContexts()`

```php
searchContexts($project_key, $environment_key, $context_search, $limit, $continuation_token, $sort, $filter, $include_total_count): \LaunchDarklyApi\Model\Contexts
```

Search for contexts

Search for contexts.  You can use either the query parameters or the request body parameters. If both are provided, there is an error.  To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). To learn more about contexts, read [Contexts and context kinds](https://launchdarkly.com/docs/home/observability/contexts#contexts-and-context-kinds).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$context_search = new \LaunchDarklyApi\Model\ContextSearch(); // \LaunchDarklyApi\Model\ContextSearch
$limit = 56; // int | Specifies the maximum number of items in the collection to return (max: 50, default: 20)
$continuation_token = 'continuation_token_example'; // string | Limits results to contexts with sort values after the value specified. You can use this for pagination, however, we recommend using the `next` link we provide instead.
$sort = 'sort_example'; // string | Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying `ts` for this value, or descending order by specifying `-ts`.
$filter = 'filter_example'; // string | A comma-separated list of context filters. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances).
$include_total_count = True; // bool | Specifies whether to include or omit the total count of matching contexts. Defaults to true.

try {
    $result = $apiInstance->searchContexts($project_key, $environment_key, $context_search, $limit, $continuation_token, $sort, $filter, $include_total_count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsApi->searchContexts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **context_search** | [**\LaunchDarklyApi\Model\ContextSearch**](../Model/ContextSearch.md)|  |
 **limit** | **int**| Specifies the maximum number of items in the collection to return (max: 50, default: 20) | [optional]
 **continuation_token** | **string**| Limits results to contexts with sort values after the value specified. You can use this for pagination, however, we recommend using the &#x60;next&#x60; link we provide instead. | [optional]
 **sort** | **string**| Specifies a field by which to sort. LaunchDarkly supports sorting by timestamp in ascending order by specifying &#x60;ts&#x60; for this value, or descending order by specifying &#x60;-ts&#x60;. | [optional]
 **filter** | **string**| A comma-separated list of context filters. To learn more about the filter syntax, read [Filtering contexts and context instances](https://launchdarkly.com/docs/ld-docs/api/contexts#filtering-contexts-and-context-instances). | [optional]
 **include_total_count** | **bool**| Specifies whether to include or omit the total count of matching contexts. Defaults to true. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Contexts**](../Model/Contexts.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
