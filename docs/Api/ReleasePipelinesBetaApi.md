# LaunchDarklyApi\ReleasePipelinesBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteReleasePipeline()**](ReleasePipelinesBetaApi.md#deleteReleasePipeline) | **DELETE** /api/v2/projects/{projectKey}/release-pipelines/{pipelineKey} | Delete release pipeline
[**getAllReleasePipelines()**](ReleasePipelinesBetaApi.md#getAllReleasePipelines) | **GET** /api/v2/projects/{projectKey}/release-pipelines | Get all release pipelines
[**getReleasePipelineByKey()**](ReleasePipelinesBetaApi.md#getReleasePipelineByKey) | **GET** /api/v2/projects/{projectKey}/release-pipelines/{pipelineKey} | Get release pipeline by key
[**patchReleasePipeline()**](ReleasePipelinesBetaApi.md#patchReleasePipeline) | **PATCH** /api/v2/projects/{projectKey}/release-pipelines/{pipelineKey} | Update a release pipeline
[**postReleasePipeline()**](ReleasePipelinesBetaApi.md#postReleasePipeline) | **POST** /api/v2/projects/{projectKey}/release-pipelines | Create a release pipeline


## `deleteReleasePipeline()`

```php
deleteReleasePipeline($project_key, $pipeline_key)
```

Delete release pipeline

Deletes a release pipeline.  You cannot delete the default release pipeline.  If you want to delete a release pipeline that is currently the default, create a second release pipeline and set it as the default. Then delete the first release pipeline. To change the default release pipeline, use the [Update project](/tag/Projects#operation/patchProject) API to set the `defaultReleasePipelineKey`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePipelinesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$pipeline_key = 'pipeline_key_example'; // string | The release pipeline key

try {
    $apiInstance->deleteReleasePipeline($project_key, $pipeline_key);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePipelinesBetaApi->deleteReleasePipeline: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **pipeline_key** | **string**| The release pipeline key |

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

## `getAllReleasePipelines()`

```php
getAllReleasePipelines($project_key, $filter, $limit, $offset): \LaunchDarklyApi\Model\ReleasePipelineCollection
```

Get all release pipelines

Get all release pipelines for a project.  ### Filtering release pipelines  LaunchDarkly supports the following fields for filters:  - `query` is a string that matches against the release pipeline `key`, `name`, and `description`. It is not case sensitive. For example: `?filter=query:examplePipeline`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePipelinesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is of the form field:value. Read the endpoint description for a full list of available filter fields.
$limit = 56; // int | The maximum number of items to return. Defaults to 20.
$offset = 56; // int | Where to start in the list. Defaults to 0. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getAllReleasePipelines($project_key, $filter, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePipelinesBetaApi->getAllReleasePipelines: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form field:value. Read the endpoint description for a full list of available filter fields. | [optional]
 **limit** | **int**| The maximum number of items to return. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. Defaults to 0. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ReleasePipelineCollection**](../Model/ReleasePipelineCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReleasePipelineByKey()`

```php
getReleasePipelineByKey($project_key, $pipeline_key): \LaunchDarklyApi\Model\ReleasePipeline
```

Get release pipeline by key

Get a release pipeline by key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePipelinesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$pipeline_key = 'pipeline_key_example'; // string | The release pipeline key

try {
    $result = $apiInstance->getReleasePipelineByKey($project_key, $pipeline_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePipelinesBetaApi->getReleasePipelineByKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **pipeline_key** | **string**| The release pipeline key |

### Return type

[**\LaunchDarklyApi\Model\ReleasePipeline**](../Model/ReleasePipeline.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchReleasePipeline()`

```php
patchReleasePipeline($project_key, $pipeline_key): \LaunchDarklyApi\Model\ReleasePipeline
```

Update a release pipeline

Updates a release pipeline. Updating a release pipeline uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](/#section/Overview/Updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePipelinesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$pipeline_key = 'pipeline_key_example'; // string | The release pipeline key

try {
    $result = $apiInstance->patchReleasePipeline($project_key, $pipeline_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePipelinesBetaApi->patchReleasePipeline: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **pipeline_key** | **string**| The release pipeline key |

### Return type

[**\LaunchDarklyApi\Model\ReleasePipeline**](../Model/ReleasePipeline.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postReleasePipeline()`

```php
postReleasePipeline($project_key, $create_release_pipeline_input): \LaunchDarklyApi\Model\ReleasePipeline
```

Create a release pipeline

Creates a new release pipeline.  The first release pipeline you create is automatically set as the default release pipeline for your project. To change the default release pipeline, use the [Update project](/tag/Projects#operation/patchProject) API to set the `defaultReleasePipelineKey`.  You can create up to 20 release pipelines per project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePipelinesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$create_release_pipeline_input = new \LaunchDarklyApi\Model\CreateReleasePipelineInput(); // \LaunchDarklyApi\Model\CreateReleasePipelineInput

try {
    $result = $apiInstance->postReleasePipeline($project_key, $create_release_pipeline_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePipelinesBetaApi->postReleasePipeline: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **create_release_pipeline_input** | [**\LaunchDarklyApi\Model\CreateReleasePipelineInput**](../Model/CreateReleasePipelineInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ReleasePipeline**](../Model/ReleasePipeline.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
