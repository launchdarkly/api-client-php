# Swagger\Client\EnvironmentsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteEnvironment**](EnvironmentsApi.md#deleteEnvironment) | **DELETE** /environments/{projectKey}/{environmentKey} | Delete an environment by ID
[**getEnvironment**](EnvironmentsApi.md#getEnvironment) | **GET** /environments/{projectKey}/{environmentKey} | Get an environment given a project and key.
[**patchEnvironment**](EnvironmentsApi.md#patchEnvironment) | **PATCH** /environments/{projectKey}/{environmentKey} | Modify an environment by ID
[**postEnvironment**](EnvironmentsApi.md#postEnvironment) | **POST** /environments/{projectKey} | Create a new environment in a specified project with a given name, key, and swatch color.


# **deleteEnvironment**
> deleteEnvironment($project_key, $environment_key)

Delete an environment by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\EnvironmentsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key

try {
    $api_instance->deleteEnvironment($project_key, $environment_key);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->deleteEnvironment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |

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
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\EnvironmentsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key

try {
    $result = $api_instance->getEnvironment($project_key, $environment_key);
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
 **environment_key** | **string**| The environment key |

### Return type

[**\Swagger\Client\Model\Environment**](../Model/Environment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchEnvironment**
> patchEnvironment($project_key, $environment_key, $patch_delta)

Modify an environment by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\EnvironmentsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$patch_delta = array(new \Swagger\Client\Model\PatchDelta()); // \Swagger\Client\Model\PatchDelta[] | http://jsonpatch.com/

try {
    $api_instance->patchEnvironment($project_key, $environment_key, $patch_delta);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->patchEnvironment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **patch_delta** | [**\Swagger\Client\Model\PatchDelta[]**](../Model/PatchDelta.md)| http://jsonpatch.com/ |

### Return type

void (empty response body)

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
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\EnvironmentsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_body = new \Swagger\Client\Model\EnvironmentBody(); // \Swagger\Client\Model\EnvironmentBody | New environment

try {
    $api_instance->postEnvironment($project_key, $environment_body);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->postEnvironment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_body** | [**\Swagger\Client\Model\EnvironmentBody**](../Model/EnvironmentBody.md)| New environment |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

