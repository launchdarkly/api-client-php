# LaunchDarklyApi\FollowFlagsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteFlagFollower()**](FollowFlagsApi.md#deleteFlagFollower) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers/{memberId} | Remove a member as a follower of a flag in a project and environment
[**getFlagFollowers()**](FollowFlagsApi.md#getFlagFollowers) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers | Get followers of a flag in a project and environment
[**getFollowersByProjEnv()**](FollowFlagsApi.md#getFollowersByProjEnv) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/followers | Get followers of all flags in a given project and environment
[**putFlagFollower()**](FollowFlagsApi.md#putFlagFollower) | **PUT** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers/{memberId} | Add a member as a follower of a flag in a project and environment


## `deleteFlagFollower()`

```php
deleteFlagFollower($project_key, $feature_flag_key, $environment_key, $member_id)
```

Remove a member as a follower of a flag in a project and environment

Remove a member as a follower to a flag in a project and environment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FollowFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$member_id = 'member_id_example'; // string | The memberId of the member to remove as a follower of the flag. Reader roles can only remove themselves.

try {
    $apiInstance->deleteFlagFollower($project_key, $feature_flag_key, $environment_key, $member_id);
} catch (Exception $e) {
    echo 'Exception when calling FollowFlagsApi->deleteFlagFollower: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |
 **member_id** | **string**| The memberId of the member to remove as a follower of the flag. Reader roles can only remove themselves. |

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

## `getFlagFollowers()`

```php
getFlagFollowers($project_key, $feature_flag_key, $environment_key): \LaunchDarklyApi\Model\FlagFollowersGetRep
```

Get followers of a flag in a project and environment

Get a list of members following a flag in a project and environment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FollowFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getFlagFollowers($project_key, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FollowFlagsApi->getFlagFollowers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\FlagFollowersGetRep**](../Model/FlagFollowersGetRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFollowersByProjEnv()`

```php
getFollowersByProjEnv($project_key, $environment_key): \LaunchDarklyApi\Model\FlagFollowersByProjEnvGetRep
```

Get followers of all flags in a given project and environment

Get followers of all flags in a given environment and project

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FollowFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getFollowersByProjEnv($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FollowFlagsApi->getFollowersByProjEnv: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\FlagFollowersByProjEnvGetRep**](../Model/FlagFollowersByProjEnvGetRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putFlagFollower()`

```php
putFlagFollower($project_key, $feature_flag_key, $environment_key, $member_id)
```

Add a member as a follower of a flag in a project and environment

Add a member as a follower to a flag in a project and environment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FollowFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$member_id = 'member_id_example'; // string | The memberId of the member to add as a follower of the flag. Reader roles can only add themselves.

try {
    $apiInstance->putFlagFollower($project_key, $feature_flag_key, $environment_key, $member_id);
} catch (Exception $e) {
    echo 'Exception when calling FollowFlagsApi->putFlagFollower: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |
 **member_id** | **string**| The memberId of the member to add as a follower of the flag. Reader roles can only add themselves. |

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
