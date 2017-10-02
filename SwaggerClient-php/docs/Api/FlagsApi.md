# Swagger\Client\FlagsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteFeatureFlag**](FlagsApi.md#deleteFeatureFlag) | **DELETE** /flags/{projectKey}/{featureFlagKey} | Delete a feature flag by ID
[**getFeatureFlag**](FlagsApi.md#getFeatureFlag) | **GET** /flags/{projectKey}/{featureFlagKey} | Get a single feature flag by key.
[**getFeatureFlagStatus**](FlagsApi.md#getFeatureFlagStatus) | **GET** /flag-statuses/{projectKey}/{environmentKey} | Get a list of statuses for all feature flags
[**getFeatureFlagStatuses**](FlagsApi.md#getFeatureFlagStatuses) | **GET** /flag-statuses/{projectKey}/{environmentKey}/{featureFlagKey} | Get a list of statuses for all feature flags
[**getFeatureFlags**](FlagsApi.md#getFeatureFlags) | **GET** /flags/{projectKey} | Get a list of all features in the given project.
[**patchFeatureFlag**](FlagsApi.md#patchFeatureFlag) | **PATCH** /flags/{projectKey}/{featureFlagKey} | Modify a feature flag by ID
[**postFeatureFlag**](FlagsApi.md#postFeatureFlag) | **POST** /flags/{projectKey} | Create a feature flag


# **deleteFeatureFlag**
> deleteFeatureFlag($project_key, $feature_flag_key)

Delete a feature flag by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\FlagsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $api_instance->deleteFeatureFlag($project_key, $feature_flag_key);
} catch (Exception $e) {
    echo 'Exception when calling FlagsApi->deleteFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlag**
> \Swagger\Client\Model\FeatureFlag getFeatureFlag($project_key, $feature_flag_key, $environment_key_query)

Get a single feature flag by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\FlagsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key_query = "environment_key_query_example"; // string | The environment key

try {
    $result = $api_instance->getFeatureFlag($project_key, $feature_flag_key, $environment_key_query);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagsApi->getFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key_query** | **string**| The environment key | [optional]

### Return type

[**\Swagger\Client\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlagStatus**
> \Swagger\Client\Model\FeatureFlagStatuses getFeatureFlagStatus($project_key, $environment_key)

Get a list of statuses for all feature flags

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\FlagsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key

try {
    $result = $api_instance->getFeatureFlagStatus($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagsApi->getFeatureFlagStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |

### Return type

[**\Swagger\Client\Model\FeatureFlagStatuses**](../Model/FeatureFlagStatuses.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlagStatuses**
> \Swagger\Client\Model\FeatureFlagStatus getFeatureFlagStatuses($project_key, $environment_key, $feature_flag_key)

Get a list of statuses for all feature flags

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\FlagsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $result = $api_instance->getFeatureFlagStatuses($project_key, $environment_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagsApi->getFeatureFlagStatuses: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

[**\Swagger\Client\Model\FeatureFlagStatus**](../Model/FeatureFlagStatus.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlags**
> \Swagger\Client\Model\FeatureFlags getFeatureFlags($project_key, $environment_key_query, $tag)

Get a list of all features in the given project.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\FlagsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key_query = "environment_key_query_example"; // string | The environment key
$tag = "tag_example"; // string | Filter by tag. A tag can be used to group flags across projects.

try {
    $result = $api_instance->getFeatureFlags($project_key, $environment_key_query, $tag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagsApi->getFeatureFlags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key_query** | **string**| The environment key | [optional]
 **tag** | **string**| Filter by tag. A tag can be used to group flags across projects. | [optional]

### Return type

[**\Swagger\Client\Model\FeatureFlags**](../Model/FeatureFlags.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchFeatureFlag**
> \Swagger\Client\Model\FeatureFlag patchFeatureFlag($project_key, $feature_flag_key, $patch_delta)

Modify a feature flag by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\FlagsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$patch_delta = array(new \Swagger\Client\Model\PatchDelta()); // \Swagger\Client\Model\PatchDelta[] | http://jsonpatch.com/

try {
    $result = $api_instance->patchFeatureFlag($project_key, $feature_flag_key, $patch_delta);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagsApi->patchFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **patch_delta** | [**\Swagger\Client\Model\PatchDelta[]**](../Model/PatchDelta.md)| http://jsonpatch.com/ |

### Return type

[**\Swagger\Client\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postFeatureFlag**
> postFeatureFlag($project_key, $feature_flag_body)

Create a feature flag

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\FlagsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_body = new \Swagger\Client\Model\FeatureFlagBody(); // \Swagger\Client\Model\FeatureFlagBody | Create a new feature flag

try {
    $api_instance->postFeatureFlag($project_key, $feature_flag_body);
} catch (Exception $e) {
    echo 'Exception when calling FlagsApi->postFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_body** | [**\Swagger\Client\Model\FeatureFlagBody**](../Model/FeatureFlagBody.md)| Create a new feature flag |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

