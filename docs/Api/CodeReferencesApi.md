# LaunchDarklyApi\CodeReferencesApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteBranches()**](CodeReferencesApi.md#deleteBranches) | **POST** /api/v2/code-refs/repositories/{repo}/branch-delete-tasks | Delete branches
[**deleteRepository()**](CodeReferencesApi.md#deleteRepository) | **DELETE** /api/v2/code-refs/repositories/{repo} | Delete repository
[**getBranch()**](CodeReferencesApi.md#getBranch) | **GET** /api/v2/code-refs/repositories/{repo}/branches/{branch} | Get branch
[**getBranches()**](CodeReferencesApi.md#getBranches) | **GET** /api/v2/code-refs/repositories/{repo}/branches | List branches
[**getExtinctions()**](CodeReferencesApi.md#getExtinctions) | **GET** /api/v2/code-refs/extinctions | List extinctions
[**getRepositories()**](CodeReferencesApi.md#getRepositories) | **GET** /api/v2/code-refs/repositories | List repositories
[**getRepository()**](CodeReferencesApi.md#getRepository) | **GET** /api/v2/code-refs/repositories/{repo} | Get repository
[**getRootStatistic()**](CodeReferencesApi.md#getRootStatistic) | **GET** /api/v2/code-refs/statistics | Get number of code references for flags
[**getStatistics()**](CodeReferencesApi.md#getStatistics) | **GET** /api/v2/code-refs/statistics/{projKey} | Get number of code references for flags
[**patchRepository()**](CodeReferencesApi.md#patchRepository) | **PATCH** /api/v2/code-refs/repositories/{repo} | Update repository
[**postExtinction()**](CodeReferencesApi.md#postExtinction) | **POST** /api/v2/code-refs/repositories/{repo}/branches/{branch} | Create extinction
[**postRepository()**](CodeReferencesApi.md#postRepository) | **POST** /api/v2/code-refs/repositories | Create repository
[**putBranch()**](CodeReferencesApi.md#putBranch) | **PUT** /api/v2/code-refs/repositories/{repo}/branches/{branch} | Upsert branch


## `deleteBranches()`

```php
deleteBranches($repo, $request_body)
```

Delete branches

Asynchronously delete a number of branches.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name to delete branches for.
$request_body = array('request_body_example'); // string[]

try {
    $apiInstance->deleteBranches($repo, $request_body);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->deleteBranches: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name to delete branches for. |
 **request_body** | [**string[]**](../Model/string.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRepository()`

```php
deleteRepository($repo)
```

Delete repository

Delete a repository with the specified name

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name

try {
    $apiInstance->deleteRepository($repo);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->deleteRepository: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBranch()`

```php
getBranch($repo, $branch, $proj_key, $flag_key): \LaunchDarklyApi\Model\BranchRep
```

Get branch

Get a specific branch in a repository

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name
$branch = 'branch_example'; // string | The url-encoded branch name
$proj_key = 'proj_key_example'; // string | Filter results to a specific project
$flag_key = 'flag_key_example'; // string | Filter results to a specific flag key

try {
    $result = $apiInstance->getBranch($repo, $branch, $proj_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->getBranch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name |
 **branch** | **string**| The url-encoded branch name |
 **proj_key** | **string**| Filter results to a specific project | [optional]
 **flag_key** | **string**| Filter results to a specific flag key | [optional]

### Return type

[**\LaunchDarklyApi\Model\BranchRep**](../Model/BranchRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBranches()`

```php
getBranches($repo): \LaunchDarklyApi\Model\BranchCollectionRep
```

List branches

Get a list of branches.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name

try {
    $result = $apiInstance->getBranches($repo);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->getBranches: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name |

### Return type

[**\LaunchDarklyApi\Model\BranchCollectionRep**](../Model/BranchCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExtinctions()`

```php
getExtinctions($repo_name, $branch_name, $proj_key, $flag_key): \LaunchDarklyApi\Model\ExtinctionCollectionRep
```

List extinctions

Get a list of all extinctions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo_name = 'repo_name_example'; // string | Filter results to a specific repository
$branch_name = 'branch_name_example'; // string | Filter results to a specific branch
$proj_key = 'proj_key_example'; // string | Filter results to a specific project
$flag_key = 'flag_key_example'; // string | Filter results to a specific flag key

try {
    $result = $apiInstance->getExtinctions($repo_name, $branch_name, $proj_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->getExtinctions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo_name** | **string**| Filter results to a specific repository | [optional]
 **branch_name** | **string**| Filter results to a specific branch | [optional]
 **proj_key** | **string**| Filter results to a specific project | [optional]
 **flag_key** | **string**| Filter results to a specific flag key | [optional]

### Return type

[**\LaunchDarklyApi\Model\ExtinctionCollectionRep**](../Model/ExtinctionCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRepositories()`

```php
getRepositories($with_branches, $with_references_for_default_branch, $proj_key, $flag_key): \LaunchDarklyApi\Model\RepositoryCollectionRep
```

List repositories

Get a list of connected repositories. Optionally, you can include branch metadata with the `withBranches` query parameter. Embed references for the default branch with `ReferencesForDefaultBranch`. You can also filter the list of code references by project key and flag key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$with_branches = 'with_branches_example'; // string | If set to any value, the endpoint returns repositories with associated branch data
$with_references_for_default_branch = 'with_references_for_default_branch_example'; // string | If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch
$proj_key = 'proj_key_example'; // string | A LaunchDarkly project key. If provided, this filters code reference results to the specified project.
$flag_key = 'flag_key_example'; // string | If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch

try {
    $result = $apiInstance->getRepositories($with_branches, $with_references_for_default_branch, $proj_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->getRepositories: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **with_branches** | **string**| If set to any value, the endpoint returns repositories with associated branch data | [optional]
 **with_references_for_default_branch** | **string**| If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch | [optional]
 **proj_key** | **string**| A LaunchDarkly project key. If provided, this filters code reference results to the specified project. | [optional]
 **flag_key** | **string**| If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch | [optional]

### Return type

[**\LaunchDarklyApi\Model\RepositoryCollectionRep**](../Model/RepositoryCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRepository()`

```php
getRepository($repo): \LaunchDarklyApi\Model\RepositoryRep
```

Get repository

Get a single repository by name.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name

try {
    $result = $apiInstance->getRepository($repo);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->getRepository: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name |

### Return type

[**\LaunchDarklyApi\Model\RepositoryRep**](../Model/RepositoryRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRootStatistic()`

```php
getRootStatistic(): \LaunchDarklyApi\Model\StatisticsRoot
```

Get number of code references for flags

Get links for all projects that have Code References.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRootStatistic();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->getRootStatistic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\StatisticsRoot**](../Model/StatisticsRoot.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStatistics()`

```php
getStatistics($proj_key, $flag_key): \LaunchDarklyApi\Model\StatisticCollectionRep
```

Get number of code references for flags

Get the number of code references across repositories for all flags in your project that have code references in the default branch (for example: master). You can optionally include the `flagKey` query parameter to get the number of code references across repositories for a single flag. This endpoint returns the number of times your flag keys are referenced in your repositories. You can filter to a single flag with by passing in a flag key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$flag_key = 'flag_key_example'; // string | Filter results to a specific flag key

try {
    $result = $apiInstance->getStatistics($proj_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->getStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **flag_key** | **string**| Filter results to a specific flag key | [optional]

### Return type

[**\LaunchDarklyApi\Model\StatisticCollectionRep**](../Model/StatisticCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchRepository()`

```php
patchRepository($repo, $patch_operation): \LaunchDarklyApi\Model\RepositoryRep
```

Update repository

Update a repository's settings. The request must be a valid JSON Patch document describing the changes to be made to the repository.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name
$patch_operation = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchRepository($repo, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->patchRepository: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\RepositoryRep**](../Model/RepositoryRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postExtinction()`

```php
postExtinction($repo, $branch, $inline_object)
```

Create extinction

Create a new extinction

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name
$branch = 'branch_example'; // string | The url-encoded branch name
$inline_object = array(new \LaunchDarklyApi\Model\InlineObject()); // \LaunchDarklyApi\Model\InlineObject[]

try {
    $apiInstance->postExtinction($repo, $branch, $inline_object);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->postExtinction: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name |
 **branch** | **string**| The url-encoded branch name |
 **inline_object** | [**\LaunchDarklyApi\Model\InlineObject[]**](../Model/InlineObject.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postRepository()`

```php
postRepository($repository_post)
```

Create repository

Create a repository with the specified name.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repository_post = new \LaunchDarklyApi\Model\RepositoryPost(); // \LaunchDarklyApi\Model\RepositoryPost

try {
    $apiInstance->postRepository($repository_post);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->postRepository: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repository_post** | [**\LaunchDarklyApi\Model\RepositoryPost**](../Model/RepositoryPost.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putBranch()`

```php
putBranch($repo, $branch, $branch_rep)
```

Upsert branch

Create a new branch if it doesn't exist, or updates the branch if it already exists.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CodeReferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repo = 'repo_example'; // string | The repository name
$branch = 'branch_example'; // string | The url-encoded branch name
$branch_rep = new \LaunchDarklyApi\Model\BranchRep(); // \LaunchDarklyApi\Model\BranchRep

try {
    $apiInstance->putBranch($repo, $branch, $branch_rep);
} catch (Exception $e) {
    echo 'Exception when calling CodeReferencesApi->putBranch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repo** | **string**| The repository name |
 **branch** | **string**| The url-encoded branch name |
 **branch_rep** | [**\LaunchDarklyApi\Model\BranchRep**](../Model/BranchRep.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)