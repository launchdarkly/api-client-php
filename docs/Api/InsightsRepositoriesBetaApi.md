# LaunchDarklyApi\InsightsRepositoriesBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**associateRepositoriesAndProjects()**](InsightsRepositoriesBetaApi.md#associateRepositoriesAndProjects) | **PUT** /api/v2/engineering-insights/repositories/projects | Associate repositories with projects
[**deleteRepositoryProject()**](InsightsRepositoriesBetaApi.md#deleteRepositoryProject) | **DELETE** /api/v2/engineering-insights/repositories/{repositoryKey}/projects/{projectKey} | Remove repository project association
[**getInsightsRepositories()**](InsightsRepositoriesBetaApi.md#getInsightsRepositories) | **GET** /api/v2/engineering-insights/repositories | List repositories


## `associateRepositoriesAndProjects()`

```php
associateRepositoriesAndProjects($insights_repository_project_mappings): \LaunchDarklyApi\Model\InsightsRepositoryProjectCollection
```

Associate repositories with projects

Associate repositories with projects

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsRepositoriesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$insights_repository_project_mappings = new \LaunchDarklyApi\Model\InsightsRepositoryProjectMappings(); // \LaunchDarklyApi\Model\InsightsRepositoryProjectMappings

try {
    $result = $apiInstance->associateRepositoriesAndProjects($insights_repository_project_mappings);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsRepositoriesBetaApi->associateRepositoriesAndProjects: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **insights_repository_project_mappings** | [**\LaunchDarklyApi\Model\InsightsRepositoryProjectMappings**](../Model/InsightsRepositoryProjectMappings.md)|  |

### Return type

[**\LaunchDarklyApi\Model\InsightsRepositoryProjectCollection**](../Model/InsightsRepositoryProjectCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRepositoryProject()`

```php
deleteRepositoryProject($repository_key, $project_key)
```

Remove repository project association

Remove repository project association

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsRepositoriesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$repository_key = 'repository_key_example'; // string | The repository key
$project_key = 'project_key_example'; // string | The project key

try {
    $apiInstance->deleteRepositoryProject($repository_key, $project_key);
} catch (Exception $e) {
    echo 'Exception when calling InsightsRepositoriesBetaApi->deleteRepositoryProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **repository_key** | **string**| The repository key |
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

## `getInsightsRepositories()`

```php
getInsightsRepositories($expand): \LaunchDarklyApi\Model\InsightsRepositoryCollection
```

List repositories

Get a list of repositories  ### Expanding the repository collection response  LaunchDarkly supports expanding the repository collection response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `projects` includes details on all of the LaunchDarkly projects associated with each repository  For example, use `?expand=projects` to include the `projects` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsRepositoriesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$expand = 'expand_example'; // string | Expand properties in response. Options: `projects`

try {
    $result = $apiInstance->getInsightsRepositories($expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsRepositoriesBetaApi->getInsightsRepositories: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **expand** | **string**| Expand properties in response. Options: &#x60;projects&#x60; | [optional]

### Return type

[**\LaunchDarklyApi\Model\InsightsRepositoryCollection**](../Model/InsightsRepositoryCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
