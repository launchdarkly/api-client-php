# LaunchDarklyApi\UserSettingsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getExpiringFlagsForUser()**](UserSettingsApi.md#getExpiringFlagsForUser) | **GET** /api/v2/users/{projectKey}/{userKey}/expiring-user-targets/{environmentKey} | Get expiring dates on flags for user
[**getUserFlagSetting()**](UserSettingsApi.md#getUserFlagSetting) | **GET** /api/v2/users/{projectKey}/{environmentKey}/{userKey}/flags/{featureFlagKey} | Get flag setting for user
[**getUserFlagSettings()**](UserSettingsApi.md#getUserFlagSettings) | **GET** /api/v2/users/{projectKey}/{environmentKey}/{userKey}/flags | List flag settings for user
[**patchExpiringFlagsForUser()**](UserSettingsApi.md#patchExpiringFlagsForUser) | **PATCH** /api/v2/users/{projectKey}/{userKey}/expiring-user-targets/{environmentKey} | Update expiring user target for flags
[**putFlagSetting()**](UserSettingsApi.md#putFlagSetting) | **PUT** /api/v2/users/{projectKey}/{environmentKey}/{userKey}/flags/{featureFlagKey} | Update flag settings for user


## `getExpiringFlagsForUser()`

```php
getExpiringFlagsForUser($project_key, $user_key, $environment_key): \LaunchDarklyApi\Model\ExpiringUserTargetGetResponse
```

Get expiring dates on flags for user

Get a list of flags for which the given user is scheduled for removal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UserSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$user_key = 'user_key_example'; // string | The user key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getExpiringFlagsForUser($project_key, $user_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->getExpiringFlagsForUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **user_key** | **string**| The user key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\ExpiringUserTargetGetResponse**](../Model/ExpiringUserTargetGetResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserFlagSetting()`

```php
getUserFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key): \LaunchDarklyApi\Model\UserFlagSetting
```

Get flag setting for user

Get a single flag setting for a user by flag key. <br /><br />The `_value` is the flag variation that the user receives. The `setting` indicates whether you've explicitly targeted a user to receive a particular variation. For example, if you have turned off a feature flag for a user, this setting will be `false`. The example response indicates that the user `Abbie_Braun` has the `sort.order` flag enabled.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UserSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$user_key = 'user_key_example'; // string | The user key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key

try {
    $result = $apiInstance->getUserFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->getUserFlagSetting: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user key |
 **feature_flag_key** | **string**| The feature flag key |

### Return type

[**\LaunchDarklyApi\Model\UserFlagSetting**](../Model/UserFlagSetting.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserFlagSettings()`

```php
getUserFlagSettings($project_key, $environment_key, $user_key): \LaunchDarklyApi\Model\UserFlagSettings
```

List flag settings for user

Get the current flag settings for a given user. <br /><br />The `_value` is the flag variation that the user receives. The `setting` indicates whether you've explicitly targeted a user to receive a particular variation. For example, if you have turned off a feature flag for a user, this setting will be `false`. The example response indicates that the user `Abbie_Braun` has the `sort.order` flag enabled and the `alternate.page` flag disabled, and that the user has not been explicitly targeted to receive a particular variation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UserSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$user_key = 'user_key_example'; // string | The user key

try {
    $result = $apiInstance->getUserFlagSettings($project_key, $environment_key, $user_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->getUserFlagSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user key |

### Return type

[**\LaunchDarklyApi\Model\UserFlagSettings**](../Model/UserFlagSettings.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchExpiringFlagsForUser()`

```php
patchExpiringFlagsForUser($project_key, $user_key, $environment_key, $patch_users_request): \LaunchDarklyApi\Model\ExpiringUserTargetPatchResponse
```

Update expiring user target for flags

Schedule the specified user for removal from individual targeting on one or more flags. The user must already be individually targeted for each flag.  You can add, update, or remove a scheduled removal date. You can only schedule a user for removal on a single variation per flag.  Updating an expiring target uses the semantic patch format. To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating expiring user targets.  <details> <summary>Click to expand instructions for <strong>updating expiring user targets</strong></summary>  #### addExpireUserTargetDate  Adds a date and time that LaunchDarkly will remove the user from the flag's individual targeting.  ##### Parameters  * `flagKey`: The flag key * `variationId`: ID of a variation on the flag * `value`: The time, in Unix milliseconds, when LaunchDarkly should remove the user from individual targeting for this flag.  #### updateExpireUserTargetDate  Updates the date and time that LaunchDarkly will remove the user from the flag's individual targeting.  ##### Parameters  * `flagKey`: The flag key * `variationId`: ID of a variation on the flag * `value`: The time, in Unix milliseconds, when LaunchDarkly should remove the user from individual targeting for this flag. * `version`: The version of the expiring user target to update. If included, update will fail if version doesn't match current version of the expiring user target.  #### removeExpireUserTargetDate  Removes the scheduled removal of the user from the flag's individual targeting. The user will remain part of the flag's individual targeting until explicitly removed, or until another removal is scheduled.  ##### Parameters  * `flagKey`: The flag key * `variationId`: ID of a variation on the flag  </details>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UserSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$user_key = 'user_key_example'; // string | The user key
$environment_key = 'environment_key_example'; // string | The environment key
$patch_users_request = new \LaunchDarklyApi\Model\PatchUsersRequest(); // \LaunchDarklyApi\Model\PatchUsersRequest

try {
    $result = $apiInstance->patchExpiringFlagsForUser($project_key, $user_key, $environment_key, $patch_users_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->patchExpiringFlagsForUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **user_key** | **string**| The user key |
 **environment_key** | **string**| The environment key |
 **patch_users_request** | [**\LaunchDarklyApi\Model\PatchUsersRequest**](../Model/PatchUsersRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ExpiringUserTargetPatchResponse**](../Model/ExpiringUserTargetPatchResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putFlagSetting()`

```php
putFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key, $value_put)
```

Update flag settings for user

Enable or disable a feature flag for a user based on their key.  Omitting the `setting` attribute from the request body, or including a `setting` of `null`, erases the current setting for a user.  If you previously patched the flag, and the patch included the user's data, LaunchDarkly continues to use that data. If LaunchDarkly has never encountered the user's key before, it calculates the flag values based on the user key alone.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UserSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$user_key = 'user_key_example'; // string | The user key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$value_put = new \LaunchDarklyApi\Model\ValuePut(); // \LaunchDarklyApi\Model\ValuePut

try {
    $apiInstance->putFlagSetting($project_key, $environment_key, $user_key, $feature_flag_key, $value_put);
} catch (Exception $e) {
    echo 'Exception when calling UserSettingsApi->putFlagSetting: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user key |
 **feature_flag_key** | **string**| The feature flag key |
 **value_put** | [**\LaunchDarklyApi\Model\ValuePut**](../Model/ValuePut.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
