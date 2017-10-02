# Swagger\Client\UserSettingsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getUserFlagSetting**](UserSettingsApi.md#getUserFlagSetting) | **GET** /users/{projectKey}/{environmentKey}/{userKey}/flags/{featureFlagKey} | Get a user by key.
[**getUserFlagSettings**](UserSettingsApi.md#getUserFlagSettings) | **GET** /users/{projectKey}/{environmentKey}/{userKey}/flags | Lists the current flag settings for a given user.
[**putFlagSetting**](UserSettingsApi.md#putFlagSetting) | **PUT** /users/{projectKey}/{environmentKey}/{userKey}/flags/{featureFlagKey} | Specifically enable or disable a feature flag for a user based on their key.


# **getUserFlagSetting**
> \Swagger\Client\Model\UserFlagSetting getUserFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key)

Get a user by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\UserSettingsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$user_key = "user_key_example"; // string | The user's key
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $result = $api_instance->getUserFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->getUserFlagSetting: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user&#39;s key |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

[**\Swagger\Client\Model\UserFlagSetting**](../Model/UserFlagSetting.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUserFlagSettings**
> \Swagger\Client\Model\UserFlagSettings getUserFlagSettings($project_key, $environment_key, $user_key)

Lists the current flag settings for a given user.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\UserSettingsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$user_key = "user_key_example"; // string | The user's key

try {
    $result = $api_instance->getUserFlagSettings($project_key, $environment_key, $user_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->getUserFlagSettings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user&#39;s key |

### Return type

[**\Swagger\Client\Model\UserFlagSettings**](../Model/UserFlagSettings.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **putFlagSetting**
> putFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key, $user_settings_body)

Specifically enable or disable a feature flag for a user based on their key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\UserSettingsApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$user_key = "user_key_example"; // string | The user's key
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$user_settings_body = new \Swagger\Client\Model\UserSettingsBody(); // \Swagger\Client\Model\UserSettingsBody | 

try {
    $api_instance->putFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key, $user_settings_body);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->putFlagSetting: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user&#39;s key |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **user_settings_body** | [**\Swagger\Client\Model\UserSettingsBody**](../Model/UserSettingsBody.md)|  |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

