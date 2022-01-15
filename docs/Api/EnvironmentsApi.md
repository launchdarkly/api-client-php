# LaunchDarklyApi\EnvironmentsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteEnvironment()**](EnvironmentsApi.md#deleteEnvironment) | **DELETE** /api/v2/projects/{projectKey}/environments/{environmentKey} | Delete environment
[**getEnvironment()**](EnvironmentsApi.md#getEnvironment) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey} | Get environment
[**patchEnvironment()**](EnvironmentsApi.md#patchEnvironment) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey} | Update environment
[**postEnvironment()**](EnvironmentsApi.md#postEnvironment) | **POST** /api/v2/projects/{projectKey}/environments | Create environment
[**resetEnvironmentMobileKey()**](EnvironmentsApi.md#resetEnvironmentMobileKey) | **POST** /api/v2/projects/{projectKey}/environments/{envKey}/mobileKey | Reset environment mobile SDK key
[**resetEnvironmentSDKKey()**](EnvironmentsApi.md#resetEnvironmentSDKKey) | **POST** /api/v2/projects/{projectKey}/environments/{envKey}/apiKey | Reset environment SDK key


## `deleteEnvironment()`

```php
deleteEnvironment($project_key, $environment_key)
```

Delete environment

Delete a environment by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $apiInstance->deleteEnvironment($project_key, $environment_key);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->deleteEnvironment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |

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

## `getEnvironment()`

```php
getEnvironment($project_key, $environment_key): \LaunchDarklyApi\Model\Environment
```

Get environment

> ### Approval settings > > The `approvalSettings` key is only returned when the Flag Approvals feature is enabled.  Get an environment given a project and key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getEnvironment($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->getEnvironment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\Environment**](../Model/Environment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchEnvironment()`

```php
patchEnvironment($project_key, $environment_key, $patch_operation): \LaunchDarklyApi\Model\Environment
```

Update environment

Update an environment. Requires a [JSON Patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes to the environment.  To update fields in the environment object that are arrays, set the `path` to the name of the field and then append `/<array index>`. Using `/0` appends to the beginning of the array.  ### Approval settings  This request only returns the `approvalSettings` key if the [Flag Approvals](https://docs.launchdarkly.com/home/feature-workflows/approvals) feature is enabled.  Only the `canReviewOwnRequest`, `canApplyDeclinedChanges`, `minNumApprovals`, `required` and `requiredApprovalTagsfields` are editable.  If you try to patch the environment by setting both `required` and `requiredApprovalTags`, the request fails and an error appears. You can specify either required approvals for all flags in an environment or those with specific tags, but not both. Only customers on a Pro or Enterprise plan can require approval for flag updates by either mechanism.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$patch_operation = [{"op":"replace","path":"/requireComments","value":true}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchEnvironment($project_key, $environment_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->patchEnvironment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Environment**](../Model/Environment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postEnvironment()`

```php
postEnvironment($project_key, $environment_post): \LaunchDarklyApi\Model\Environment
```

Create environment

> ### Approval settings > > The `approvalSettings` key is only returned when the Flag Approvals feature is enabled. > > You cannot update approval settings when creating new environments. Update approval settings with the PATCH Environment API.  Create a new environment in a specified project with a given name, key, swatch color, and default TTL.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_post = {"color":"DADBEE","key":"my-environment","name":"My Environment"}; // \LaunchDarklyApi\Model\EnvironmentPost

try {
    $result = $apiInstance->postEnvironment($project_key, $environment_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->postEnvironment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_post** | [**\LaunchDarklyApi\Model\EnvironmentPost**](../Model/EnvironmentPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Environment**](../Model/Environment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resetEnvironmentMobileKey()`

```php
resetEnvironmentMobileKey($project_key, $env_key): \LaunchDarklyApi\Model\Environment
```

Reset environment mobile SDK key

Reset an environment's mobile key. The optional expiry for the old key is deprecated for this endpoint, so the old key will always expire immediately.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key

try {
    $result = $apiInstance->resetEnvironmentMobileKey($project_key, $env_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->resetEnvironmentMobileKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **env_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\Environment**](../Model/Environment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resetEnvironmentSDKKey()`

```php
resetEnvironmentSDKKey($project_key, $env_key, $expiry): \LaunchDarklyApi\Model\Environment
```

Reset environment SDK key

Reset an environment's SDK key with an optional expiry time for the old key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\EnvironmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$expiry = 56; // int | The time at which you want the old SDK key to expire, in UNIX milliseconds. By default, the key expires immediately.

try {
    $result = $apiInstance->resetEnvironmentSDKKey($project_key, $env_key, $expiry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnvironmentsApi->resetEnvironmentSDKKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **expiry** | **int**| The time at which you want the old SDK key to expire, in UNIX milliseconds. By default, the key expires immediately. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Environment**](../Model/Environment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
