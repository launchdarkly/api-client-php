# Swagger\Client\EnvironmentsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteEnvironment**](EnvironmentsApi.md#deleteEnvironment) | **DELETE** /projects/{projectKey}/environments/{environmentKey} | Delete an environment in a specific project.
[**getEnvironment**](EnvironmentsApi.md#getEnvironment) | **GET** /projects/{projectKey}/environments/{environmentKey} | Get an environment given a project and key.
[**patchEnvironment**](EnvironmentsApi.md#patchEnvironment) | **PATCH** /projects/{projectKey}/environments/{environmentKey} | Modify an environment by ID.
[**postEnvironment**](EnvironmentsApi.md#postEnvironment) | **POST** /projects/{projectKey}/environments | Create a new environment in a specified project with a given name, key, and swatch color.


# **deleteEnvironment**
> deleteEnvironment($project_key, $environment_key)

Delete an environment in a specific project.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.

try {
    $apiInstance->deleteEnvironment($project_key, $environment_key);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->deleteEnvironment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEnvironment**
> \Swagger\Client\Model\Environment getEnvironment($project_key, $environment_key)

Get an environment given a project and key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.

try {
    $result = $apiInstance->getEnvironment($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->getEnvironment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |

### Return type

[**\Swagger\Client\Model\Environment**](../Model/Environment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchEnvironment**
> \Swagger\Client\Model\Environment patchEnvironment($project_key, $environment_key, $patch_delta)

Modify an environment by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$patch_delta = array(new \Swagger\Client\Model\PatchOperation()); // \Swagger\Client\Model\PatchOperation[] | Requires a JSON Patch representation of the desired changes to the project. 'http://jsonpatch.com/'

try {
    $result = $apiInstance->patchEnvironment($project_key, $environment_key, $patch_delta);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->patchEnvironment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **patch_delta** | [**\Swagger\Client\Model\PatchOperation[]**](../Model/PatchOperation.md)| Requires a JSON Patch representation of the desired changes to the project. &#39;http://jsonpatch.com/&#39; |

### Return type

[**\Swagger\Client\Model\Environment**](../Model/Environment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postEnvironment**
> postEnvironment($project_key, $environment_body)

Create a new environment in a specified project with a given name, key, and swatch color.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_body = new \Swagger\Client\Model\EnvironmentBody(); // \Swagger\Client\Model\EnvironmentBody | New environment.

try {
    $apiInstance->postEnvironment($project_key, $environment_body);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->postEnvironment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_body** | [**\Swagger\Client\Model\EnvironmentBody**](../Model/EnvironmentBody.md)| New environment. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

