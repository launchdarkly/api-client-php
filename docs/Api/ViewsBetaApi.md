# LaunchDarklyApi\ViewsBetaApi

All URIs are relative to https://app.launchdarkly.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createView()**](ViewsBetaApi.md#createView) | **POST** /api/v2/projects/{projectKey}/views | Create view |
| [**deleteView()**](ViewsBetaApi.md#deleteView) | **DELETE** /api/v2/projects/{projectKey}/views/{viewKey} | Delete view |
| [**getLinkedResources()**](ViewsBetaApi.md#getLinkedResources) | **GET** /api/v2/projects/{projectKey}/views/{viewKey}/linked/{resourceType} | Get linked resources |
| [**getLinkedViews()**](ViewsBetaApi.md#getLinkedViews) | **GET** /api/v2/projects/{projectKey}/view-associations/{resourceType}/{resourceKey} | Get linked views for a given resource |
| [**getView()**](ViewsBetaApi.md#getView) | **GET** /api/v2/projects/{projectKey}/views/{viewKey} | Get view |
| [**getViews()**](ViewsBetaApi.md#getViews) | **GET** /api/v2/projects/{projectKey}/views | List views |
| [**linkResource()**](ViewsBetaApi.md#linkResource) | **POST** /api/v2/projects/{projectKey}/views/{viewKey}/link/{resourceType} | Link resource |
| [**unlinkResource()**](ViewsBetaApi.md#unlinkResource) | **DELETE** /api/v2/projects/{projectKey}/views/{viewKey}/link/{resourceType} | Unlink resource |
| [**updateView()**](ViewsBetaApi.md#updateView) | **PATCH** /api/v2/projects/{projectKey}/views/{viewKey} | Update view |


## `createView()`

```php
createView($ld_api_version, $project_key, $view_post): \LaunchDarklyApi\Model\View
```

Create view

Create a new view in the given project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$view_post = new \LaunchDarklyApi\Model\ViewPost(); // \LaunchDarklyApi\Model\ViewPost | View object to create

try {
    $result = $apiInstance->createView($ld_api_version, $project_key, $view_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->createView: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **view_post** | [**\LaunchDarklyApi\Model\ViewPost**](../Model/ViewPost.md)| View object to create | |

### Return type

[**\LaunchDarklyApi\Model\View**](../Model/View.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteView()`

```php
deleteView($ld_api_version, $project_key, $view_key)
```

Delete view

Delete a specific view by its key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$view_key = my-view; // string

try {
    $apiInstance->deleteView($ld_api_version, $project_key, $view_key);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->deleteView: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **view_key** | **string**|  | |

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

## `getLinkedResources()`

```php
getLinkedResources($ld_api_version, $project_key, $view_key, $resource_type, $limit, $offset, $sort): \LaunchDarklyApi\Model\ViewLinkedResources
```

Get linked resources

Get a list of all linked resources for a given view.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$view_key = my-view; // string
$resource_type = flags; // string
$limit = 56; // int | The number of views to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$sort = 'linkedAt'; // string | Field to sort by. Default field is `linkedAt`, default order is ascending.

try {
    $result = $apiInstance->getLinkedResources($ld_api_version, $project_key, $view_key, $resource_type, $limit, $offset, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->getLinkedResources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **view_key** | **string**|  | |
| **resource_type** | **string**|  | |
| **limit** | **int**| The number of views to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |
| **sort** | **string**| Field to sort by. Default field is &#x60;linkedAt&#x60;, default order is ascending. | [optional] [default to &#39;linkedAt&#39;] |

### Return type

[**\LaunchDarklyApi\Model\ViewLinkedResources**](../Model/ViewLinkedResources.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLinkedViews()`

```php
getLinkedViews($ld_api_version, $project_key, $resource_type, $resource_key, $environment_id, $limit, $offset): \LaunchDarklyApi\Model\Views
```

Get linked views for a given resource

Get a list of all linked views for a resource. Flags, AI configs and metrics are identified by key. Segments are identified by segment ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$resource_type = flags; // string
$resource_key = my-flag; // string
$environment_id = 6890ff25c3e3830ba1a352e4; // string | Environment ID. Required when resourceType is 'segments'
$limit = 56; // int | The number of views to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getLinkedViews($ld_api_version, $project_key, $resource_type, $resource_key, $environment_id, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->getLinkedViews: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **resource_type** | **string**|  | |
| **resource_key** | **string**|  | |
| **environment_id** | **string**| Environment ID. Required when resourceType is &#39;segments&#39; | [optional] |
| **limit** | **int**| The number of views to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |

### Return type

[**\LaunchDarklyApi\Model\Views**](../Model/Views.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getView()`

```php
getView($ld_api_version, $project_key, $view_key, $sort, $limit, $offset, $filter, $expand): \LaunchDarklyApi\Model\View
```

Get view

Retrieve a specific view by its key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$view_key = my-view; // string
$sort = 'sort_example'; // string | A sort to apply to the list of views.
$limit = 56; // int | The number of views to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$filter = 'filter_example'; // string | A filter to apply to the list of views.
$expand = array('expand_example'); // string[] | A comma-separated list of fields to expand.

try {
    $result = $apiInstance->getView($ld_api_version, $project_key, $view_key, $sort, $limit, $offset, $filter, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->getView: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **view_key** | **string**|  | |
| **sort** | **string**| A sort to apply to the list of views. | [optional] |
| **limit** | **int**| The number of views to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |
| **filter** | **string**| A filter to apply to the list of views. | [optional] |
| **expand** | [**string[]**](../Model/string.md)| A comma-separated list of fields to expand. | [optional] |

### Return type

[**\LaunchDarklyApi\Model\View**](../Model/View.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getViews()`

```php
getViews($ld_api_version, $project_key, $sort, $limit, $offset, $filter, $expand): \LaunchDarklyApi\Model\Views
```

List views

Get a list of all views in the given project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$sort = 'sort_example'; // string | A sort to apply to the list of views.
$limit = 56; // int | The number of views to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$filter = 'filter_example'; // string | A filter to apply to the list of views.
$expand = array('expand_example'); // string[] | A comma-separated list of fields to expand.

try {
    $result = $apiInstance->getViews($ld_api_version, $project_key, $sort, $limit, $offset, $filter, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->getViews: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **sort** | **string**| A sort to apply to the list of views. | [optional] |
| **limit** | **int**| The number of views to return. | [optional] |
| **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional] |
| **filter** | **string**| A filter to apply to the list of views. | [optional] |
| **expand** | [**string[]**](../Model/string.md)| A comma-separated list of fields to expand. | [optional] |

### Return type

[**\LaunchDarklyApi\Model\Views**](../Model/Views.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `linkResource()`

```php
linkResource($ld_api_version, $project_key, $view_key, $resource_type, $view_link_request): \LaunchDarklyApi\Model\LinkResourceSuccessResponse
```

Link resource

Link one or multiple resources to a view: - Link flags using flag keys - Link AI configs using AI config keys - Link metrics using metric keys - Link segments using segment IDs

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$view_key = my-view; // string
$resource_type = flags; // string
$view_link_request = new \LaunchDarklyApi\Model\ViewLinkRequest(); // \LaunchDarklyApi\Model\ViewLinkRequest | The resource to link to the view. Flags are identified by key. Segments are identified by segment ID.

try {
    $result = $apiInstance->linkResource($ld_api_version, $project_key, $view_key, $resource_type, $view_link_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->linkResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **view_key** | **string**|  | |
| **resource_type** | **string**|  | |
| **view_link_request** | [**\LaunchDarklyApi\Model\ViewLinkRequest**](../Model/ViewLinkRequest.md)| The resource to link to the view. Flags are identified by key. Segments are identified by segment ID. | |

### Return type

[**\LaunchDarklyApi\Model\LinkResourceSuccessResponse**](../Model/LinkResourceSuccessResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `unlinkResource()`

```php
unlinkResource($ld_api_version, $project_key, $view_key, $resource_type, $view_link_request): \LaunchDarklyApi\Model\UnlinkResourceSuccessResponse
```

Unlink resource

Unlink one or multiple resources from a view: - Unlink flags using flag keys - Unlink segments using segment IDs - Unlink AI configs using AI config keys - Unlink metrics using metric keys

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$view_key = my-view; // string
$resource_type = flags; // string
$view_link_request = new \LaunchDarklyApi\Model\ViewLinkRequest(); // \LaunchDarklyApi\Model\ViewLinkRequest | The resource to link to the view. Flags are identified by key. Segments are identified by segment ID.

try {
    $result = $apiInstance->unlinkResource($ld_api_version, $project_key, $view_key, $resource_type, $view_link_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->unlinkResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **view_key** | **string**|  | |
| **resource_type** | **string**|  | |
| **view_link_request** | [**\LaunchDarklyApi\Model\ViewLinkRequest**](../Model/ViewLinkRequest.md)| The resource to link to the view. Flags are identified by key. Segments are identified by segment ID. | |

### Return type

[**\LaunchDarklyApi\Model\UnlinkResourceSuccessResponse**](../Model/UnlinkResourceSuccessResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateView()`

```php
updateView($ld_api_version, $project_key, $view_key, $view_patch): \LaunchDarklyApi\Model\View
```

Update view

Edit an existing view.  The request body must be a JSON object of the fields to update. The values you include replace the existing values for the fields.  Here's an example:   ```     {       \"description\": \"Example updated description\",       \"tags\": [\"new-tag\"]     }   ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ViewsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$view_key = my-view; // string
$view_patch = new \LaunchDarklyApi\Model\ViewPatch(); // \LaunchDarklyApi\Model\ViewPatch | A JSON representation of the view including only the fields to update.

try {
    $result = $apiInstance->updateView($ld_api_version, $project_key, $view_key, $view_patch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ViewsBetaApi->updateView: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**|  | |
| **view_key** | **string**|  | |
| **view_patch** | [**\LaunchDarklyApi\Model\ViewPatch**](../Model/ViewPatch.md)| A JSON representation of the view including only the fields to update. | |

### Return type

[**\LaunchDarklyApi\Model\View**](../Model/View.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
