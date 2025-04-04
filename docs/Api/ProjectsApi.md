# LaunchDarklyApi\ProjectsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteProject()**](ProjectsApi.md#deleteProject) | **DELETE** /api/v2/projects/{projectKey} | Delete project
[**getFlagDefaultsByProject()**](ProjectsApi.md#getFlagDefaultsByProject) | **GET** /api/v2/projects/{projectKey}/flag-defaults | Get flag defaults for project
[**getProject()**](ProjectsApi.md#getProject) | **GET** /api/v2/projects/{projectKey} | Get project
[**getProjects()**](ProjectsApi.md#getProjects) | **GET** /api/v2/projects | List projects
[**patchFlagDefaultsByProject()**](ProjectsApi.md#patchFlagDefaultsByProject) | **PATCH** /api/v2/projects/{projectKey}/flag-defaults | Update flag default for project
[**patchProject()**](ProjectsApi.md#patchProject) | **PATCH** /api/v2/projects/{projectKey} | Update project
[**postProject()**](ProjectsApi.md#postProject) | **POST** /api/v2/projects | Create project
[**putFlagDefaultsByProject()**](ProjectsApi.md#putFlagDefaultsByProject) | **PUT** /api/v2/projects/{projectKey}/flag-defaults | Create or update flag defaults for project


## `deleteProject()`

```php
deleteProject($project_key)
```

Delete project

Delete a project by key. Use this endpoint with caution. Deleting a project will delete all associated environments and feature flags. You cannot delete the last project in an account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key

try {
    $apiInstance->deleteProject($project_key);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->deleteProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |

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

## `getFlagDefaultsByProject()`

```php
getFlagDefaultsByProject($project_key): \LaunchDarklyApi\Model\FlagDefaultsRep
```

Get flag defaults for project

Get the flag defaults for a specific project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key

try {
    $result = $apiInstance->getFlagDefaultsByProject($project_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getFlagDefaultsByProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |

### Return type

[**\LaunchDarklyApi\Model\FlagDefaultsRep**](../Model/FlagDefaultsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProject()`

```php
getProject($project_key, $expand): \LaunchDarklyApi\Model\Project
```

Get project

Get a single project by key.  ### Expanding the project response  LaunchDarkly supports one field for expanding the \"Get project\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields: * `environments` includes a paginated list of the project environments.  For example, `expand=environments` includes the `environments` field for the project in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key.
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.

try {
    $result = $apiInstance->getProject($project_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key. |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Project**](../Model/Project.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjects()`

```php
getProjects($limit, $offset, $filter, $sort, $expand): \LaunchDarklyApi\Model\Projects
```

List projects

Return a list of projects.  By default, this returns the first 20 projects. Page through this list with the `limit` parameter and by following the `first`, `prev`, `next`, and `last` links in the `_links` field that returns. If those links do not appear, the pages they refer to don't exist. For example, the `first` and `prev` links will be missing from the response on the first page, because there is no previous page and you cannot return to the first page when you are already on the first page.  ### Filtering projects  LaunchDarkly supports three fields for filters: - `query` is a string that matches against the projects' names and keys. It is not case sensitive. - `tags` is a `+`-separated list of project tags. It filters the list of projects that have all of the tags in the list. - `keys` is a `|` separated list of project keys. It filters the list to projects that have any of the keys in the list.  For example, the filter `filter=query:abc,tags:tag-1+tag-2` matches projects with the string `abc` in their name or key and also are tagged with `tag-1` and `tag-2`. The filter is not case-sensitive.  The documented values for `filter` query parameters are prior to URL encoding. For example, the `+` in `filter=tags:tag-1+tag-2` must be encoded to `%2B`.  ### Sorting projects  LaunchDarkly supports two fields for sorting: - `name` sorts by project name. - `createdOn` sorts by the creation date of the project.  For example, `sort=name` sorts the response by project name in ascending order.  ### Expanding the projects response  LaunchDarkly supports one field for expanding the \"List projects\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with the `environments` field.  * `environments` includes a paginated list of the project environments.  For example, `expand=environments` includes the `environments` field for each project in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | The number of projects to return in the response. Defaults to 20.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next `limit` items.
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is constructed as `field:value`.
$sort = 'sort_example'; // string | A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order.
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.

try {
    $result = $apiInstance->getProjects($limit, $offset, $filter, $sort, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjects: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**| The number of projects to return in the response. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next &#x60;limit&#x60; items. | [optional]
 **filter** | **string**| A comma-separated list of filters. Each filter is constructed as &#x60;field:value&#x60;. | [optional]
 **sort** | **string**| A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order. | [optional]
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Projects**](../Model/Projects.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchFlagDefaultsByProject()`

```php
patchFlagDefaultsByProject($project_key, $patch_operation): \LaunchDarklyApi\Model\UpsertPayloadRep
```

Update flag default for project

Update a flag default. Updating a flag default uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) or [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$patch_operation = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchFlagDefaultsByProject($project_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->patchFlagDefaultsByProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\UpsertPayloadRep**](../Model/UpsertPayloadRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchProject()`

```php
patchProject($project_key, $patch_operation): \LaunchDarklyApi\Model\ProjectRep
```

Update project

Update a project. Updating a project uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).<br/><br/>To add an element to the project fields that are arrays, set the `path` to the name of the field and then append `/<array index>`. Use `/0` to add to the beginning of the array. Use `/-` to add to the end of the array.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$patch_operation = [{"op":"add","path":"/tags/0","value":"another-tag"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchProject($project_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->patchProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ProjectRep**](../Model/ProjectRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postProject()`

```php
postProject($project_post): \LaunchDarklyApi\Model\ProjectRep
```

Create project

Create a new project with the given key and name. Project keys must be unique within an account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_post = {"key":"project-key-123abc","name":"My Project"}; // \LaunchDarklyApi\Model\ProjectPost

try {
    $result = $apiInstance->postProject($project_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->postProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_post** | [**\LaunchDarklyApi\Model\ProjectPost**](../Model/ProjectPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ProjectRep**](../Model/ProjectRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putFlagDefaultsByProject()`

```php
putFlagDefaultsByProject($project_key, $upsert_flag_defaults_payload): \LaunchDarklyApi\Model\UpsertPayloadRep
```

Create or update flag defaults for project

Create or update flag defaults for a project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$upsert_flag_defaults_payload = new \LaunchDarklyApi\Model\UpsertFlagDefaultsPayload(); // \LaunchDarklyApi\Model\UpsertFlagDefaultsPayload

try {
    $result = $apiInstance->putFlagDefaultsByProject($project_key, $upsert_flag_defaults_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->putFlagDefaultsByProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **upsert_flag_defaults_payload** | [**\LaunchDarklyApi\Model\UpsertFlagDefaultsPayload**](../Model/UpsertFlagDefaultsPayload.md)|  |

### Return type

[**\LaunchDarklyApi\Model\UpsertPayloadRep**](../Model/UpsertPayloadRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
