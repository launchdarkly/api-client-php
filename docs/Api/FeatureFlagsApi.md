# LaunchDarklyApi\FeatureFlagsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**copyFeatureFlag()**](FeatureFlagsApi.md#copyFeatureFlag) | **POST** /api/v2/flags/{projectKey}/{featureFlagKey}/copy | Copy feature flag
[**deleteFeatureFlag()**](FeatureFlagsApi.md#deleteFeatureFlag) | **DELETE** /api/v2/flags/{projectKey}/{featureFlagKey} | Delete feature flag
[**getExpiringUserTargets()**](FeatureFlagsApi.md#getExpiringUserTargets) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for feature flag
[**getFeatureFlag()**](FeatureFlagsApi.md#getFeatureFlag) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey} | Get feature flag
[**getFeatureFlagStatus()**](FeatureFlagsApi.md#getFeatureFlagStatus) | **GET** /api/v2/flag-statuses/{projectKey}/{environmentKey}/{featureFlagKey} | Get feature flag status
[**getFeatureFlagStatusAcrossEnvironments()**](FeatureFlagsApi.md#getFeatureFlagStatusAcrossEnvironments) | **GET** /api/v2/flag-status/{projectKey}/{featureFlagKey} | Get flag status across environments
[**getFeatureFlagStatuses()**](FeatureFlagsApi.md#getFeatureFlagStatuses) | **GET** /api/v2/flag-statuses/{projectKey}/{environmentKey} | List feature flag statuses
[**getFeatureFlags()**](FeatureFlagsApi.md#getFeatureFlags) | **GET** /api/v2/flags/{projectKey} | List feature flags
[**patchExpiringUserTargets()**](FeatureFlagsApi.md#patchExpiringUserTargets) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Update expiring user targets on feature flag
[**patchFeatureFlag()**](FeatureFlagsApi.md#patchFeatureFlag) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey} | Update feature flag
[**postFeatureFlag()**](FeatureFlagsApi.md#postFeatureFlag) | **POST** /api/v2/flags/{projectKey} | Create a feature flag


## `copyFeatureFlag()`

```php
copyFeatureFlag($project_key, $feature_flag_key, $flag_copy_config_post): \LaunchDarklyApi\Model\FeatureFlag
```

Copy feature flag

The includedActions and excludedActions define the parts of the flag configuration that are copied or not copied. By default, the entire flag configuration is copied.  You can have either `includedActions` or `excludedActions` but not both.  Valid `includedActions` and `excludedActions` include:  - `updateOn` - `updatePrerequisites` - `updateTargets` - `updateRules` - `updateFallthrough` - `updateOffVariation`    The `source` and `target` must be JSON objects if using curl, specifying the environment key and (optional) current flag configuration version in that environment. For example:  ```json {   \"key\": \"production\",   \"currentVersion\": 3 } ```  If target is specified as above, the API will test to ensure that the current flag version in the `production` environment is `3`, and reject attempts to copy settings to `production` otherwise. You can use this to enforce optimistic locking on copy attempts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key. The key identifies the flag in your code.
$flag_copy_config_post = new \LaunchDarklyApi\Model\FlagCopyConfigPost(); // \LaunchDarklyApi\Model\FlagCopyConfigPost

try {
    $result = $apiInstance->copyFeatureFlag($project_key, $feature_flag_key, $flag_copy_config_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->copyFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key. The key identifies the flag in your code. |
 **flag_copy_config_post** | [**\LaunchDarklyApi\Model\FlagCopyConfigPost**](../Model/FlagCopyConfigPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteFeatureFlag()`

```php
deleteFeatureFlag($project_key, $feature_flag_key)
```

Delete feature flag

Delete a feature flag in all environments. Use with caution: only delete feature flags your application no longer uses.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key. The key identifies the flag in your code.

try {
    $apiInstance->deleteFeatureFlag($project_key, $feature_flag_key);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->deleteFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key. The key identifies the flag in your code. |

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

## `getExpiringUserTargets()`

```php
getExpiringUserTargets($project_key, $environment_key, $feature_flag_key): \LaunchDarklyApi\Model\ExpiringUserTargetGetResponse
```

Get expiring user targets for feature flag

Get a list of user targets on a feature flag that are scheduled for removal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key

try {
    $result = $apiInstance->getExpiringUserTargets($project_key, $environment_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getExpiringUserTargets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |

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

## `getFeatureFlag()`

```php
getFeatureFlag($project_key, $feature_flag_key, $env): \LaunchDarklyApi\Model\FeatureFlag
```

Get feature flag

Get a single feature flag by key. By default, this returns the configurations for all environments. You can filter environments with the `env` query parameter. For example, setting `env=production` restricts the returned configurations to just the `production` environment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$env = 'env_example'; // string | Filter configurations by environment

try {
    $result = $apiInstance->getFeatureFlag($project_key, $feature_flag_key, $env);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **env** | **string**| Filter configurations by environment | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFeatureFlagStatus()`

```php
getFeatureFlagStatus($project_key, $environment_key, $feature_flag_key): \LaunchDarklyApi\Model\FlagStatusRep
```

Get feature flag status

Get the status for a particular feature flag.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key

try {
    $result = $apiInstance->getFeatureFlagStatus($project_key, $environment_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlagStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |

### Return type

[**\LaunchDarklyApi\Model\FlagStatusRep**](../Model/FlagStatusRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFeatureFlagStatusAcrossEnvironments()`

```php
getFeatureFlagStatusAcrossEnvironments($project_key, $feature_flag_key, $env): \LaunchDarklyApi\Model\FeatureFlagStatusAcrossEnvironments
```

Get flag status across environments

Get the status for a particular feature flag across environments.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$env = 'env_example'; // string | Optional environment filter

try {
    $result = $apiInstance->getFeatureFlagStatusAcrossEnvironments($project_key, $feature_flag_key, $env);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlagStatusAcrossEnvironments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **env** | **string**| Optional environment filter | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagStatusAcrossEnvironments**](../Model/FeatureFlagStatusAcrossEnvironments.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFeatureFlagStatuses()`

```php
getFeatureFlagStatuses($project_key, $environment_key): \LaunchDarklyApi\Model\FeatureFlagStatuses
```

List feature flag statuses

Get a list of statuses for all feature flags. The status includes the last time the feature flag was requested, as well as a state, which is one of the following:  - `new`: the feature flag was created within the last seven days, and has not been requested yet - `active`: the feature flag was requested by your servers or clients within the last seven days - `inactive`: the feature flag was created more than seven days ago, and hasn't been requested by your servers or clients within the past seven days - `launched`: one variation of the feature flag has been rolled out to all your users for at least 7 days

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getFeatureFlagStatuses($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlagStatuses: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagStatuses**](../Model/FeatureFlagStatuses.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFeatureFlags()`

```php
getFeatureFlags($project_key, $env, $tag, $limit, $offset, $archived, $summary, $filter, $sort, $compare): \LaunchDarklyApi\Model\FeatureFlags
```

List feature flags

Get a list of all features in the given project. By default, each feature includes configurations for each environment. You can filter environments with the env query parameter. For example, setting `env=production` restricts the returned configurations to just your production environment. You can also filter feature flags by tag with the tag query parameter.  We support the following fields for filters:  - `query` is a string that matches against the flags' keys and names. It is not case sensitive. - `archived` is a boolean to filter the list to archived flags. When this is absent, only unarchived flags are returned. - `type` is a string allowing filtering to `temporary` or `permanent` flags. - `status` is a string allowing filtering to `new`, `inactive`, `active`, or `launched` flags in the specified environment. This filter also requires a `filterEnv` field to be set to a valid environment. For example: `filter=status:active,filterEnv:production`. - `tags` is a + separated list of tags. It filters the list to members who have all of the tags in the list. - `hasExperiment` is a boolean with values of true or false and returns any flags that have an attached metric. - `hasDataExport` is a boolean with values of true or false and returns any flags that are currently exporting data in the specified environment. This includes flags that are exporting data via Experimentation. This filter also requires a `filterEnv` field to be set to a valid environment key. e.g. `filter=hasExperiment:true,filterEnv:production` - `evaluated` is an object that contains a key of `after` and a value in Unix time in milliseconds. This returns all flags that have been evaluated since the time you specify in the environment provided. This filter also requires a `filterEnv` field to be set to a valid environment. For example: `filter=evaluated:{\"after\": 1590768455282},filterEnv:production`. - `filterEnv` is a string with the key of a valid environment. The filterEnv field is used for filters that are environment specific. If there are multiple environment specific filters you should only declare this parameter once. For example: `filter=evaluated:{\"after\": 1590768455282},filterEnv:production,status:active`.  An example filter is `query:abc,tags:foo+bar`. This matches flags with the string `abc` in their key or name, ignoring case, which also have the tags `foo` and `bar`.  By default, this returns all flags. You can page through the list with the `limit` parameter and by following the `first`, `prev`, `next`, and `last` links in the returned `_links` field. These links will not be present if the pages they refer to don't exist. For example, the `first` and `prev` links will be missing from the response on the first page.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$env = 'env_example'; // string | Filter configurations by environment
$tag = 'tag_example'; // string | Filter feature flags by tag
$limit = 56; // int | The number of feature flags to return. Defaults to -1, which returns all flags
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next limit items
$archived = True; // bool | A boolean to filter the list to archived flags. When this is absent, only unarchived flags will be returned
$summary = True; // bool | By default in API version >= 1, flags will _not_ include their list of prerequisites, targets or rules.  Set summary=0 to include these fields for each flag returned
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is of the form field:value
$sort = 'sort_example'; // string | A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order
$compare = True; // bool | A boolean to filter results by only flags that have differences between environments

try {
    $result = $apiInstance->getFeatureFlags($project_key, $env, $tag, $limit, $offset, $archived, $summary, $filter, $sort, $compare);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlags: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **env** | **string**| Filter configurations by environment | [optional]
 **tag** | **string**| Filter feature flags by tag | [optional]
 **limit** | **int**| The number of feature flags to return. Defaults to -1, which returns all flags | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next limit items | [optional]
 **archived** | **bool**| A boolean to filter the list to archived flags. When this is absent, only unarchived flags will be returned | [optional]
 **summary** | **bool**| By default in API version &gt;&#x3D; 1, flags will _not_ include their list of prerequisites, targets or rules.  Set summary&#x3D;0 to include these fields for each flag returned | [optional]
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form field:value | [optional]
 **sort** | **string**| A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order | [optional]
 **compare** | **bool**| A boolean to filter results by only flags that have differences between environments | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlags**](../Model/FeatureFlags.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchExpiringUserTargets()`

```php
patchExpiringUserTargets($project_key, $environment_key, $feature_flag_key, $patch_with_comment): \LaunchDarklyApi\Model\ExpiringUserTargetPatchResponse
```

Update expiring user targets on feature flag

Update the list of user targets on a feature flag that are scheduled for removal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$patch_with_comment = new \LaunchDarklyApi\Model\PatchWithComment(); // \LaunchDarklyApi\Model\PatchWithComment

try {
    $result = $apiInstance->patchExpiringUserTargets($project_key, $environment_key, $feature_flag_key, $patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->patchExpiringUserTargets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |
 **patch_with_comment** | [**\LaunchDarklyApi\Model\PatchWithComment**](../Model/PatchWithComment.md)|  |

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

## `patchFeatureFlag()`

```php
patchFeatureFlag($project_key, $feature_flag_key, $patch_with_comment): \LaunchDarklyApi\Model\FeatureFlag
```

Update feature flag

Perform a partial update to a feature flag.  ## Using JSON Patches on a feature flag  When using the update feature flag endpoint to add individual users to a specific variation, there are two different patch documents, depending on whether users are already being individually targeted for the variation.  If a flag variation already has users individually targeted, the path for the JSON Patch operation is:  ```json {   \"op\": \"add\",   \"path\": \"/environments/devint/targets/0/values/-\",   \"value\": \"TestClient10\" } ```  If a flag variation does not already have users individually targeted, the path for the JSON Patch operation is:  ```json [   {     \"op\": \"add\",     \"path\": \"/environments/devint/targets/-\",     \"value\": { \"variation\": 0, \"values\": [\"TestClient10\"] }   } ] ```  ## Using semantic patches on a feature flag  To use a [semantic patch](/reference#updates-via-semantic-patches) on a feature flag resource, you must include a header in the request. If you call a semantic patch resource without this header, you will receive a `400` response because your semantic patch will be interpreted as a JSON patch.  Use this header:  ``` Content-Type: application/json; domain-model=launchdarkly.semanticpatch ```  The body of a semantic patch request takes the following three properties:  1. `comment` (string): (Optional) A description of the update. 1. `environmentKey` (string): (Required) The key of the LaunchDarkly environment. 1. `instructions` (array): (Required) The list of actions to be performed by the update. Each action in the list must be an object/hash table with a `kind` property that indicates the instruction. Depending on the `kind`, the API may require other parameters. When this is the case, add the parameters as additional fields to the instruction object. Read below for more information on the specific supported semantic patch instructions.  If any instruction in the patch encounters an error, the error will be returned and the flag will not be changed. In general, instructions will silently do nothing if the flag is already in the state requested by the patch instruction. For example, `removeUserTargets` does nothing when the targets have already been removed. They will generally error if a parameter refers to something that does not exist, like a variation ID that doesn't correspond to a variation on the flag or a rule ID that doesn't belong to a rule on the flag. Other specific error conditions are noted in the instruction descriptions.  ### Instructions  #### `turnFlagOn`  Sets the flag's targeting state to on.  For example, to flip a flag on, use this request body:  ```json {   \"environmentKey\": \"example-environment-key\",   \"instructions\": [ { \"kind\": \"turnFlagOn\" } ] } ```  #### `turnFlagOff`  Sets the flag's targeting state to off.  For example, to flip a flag off, use this request body:  ```json {   \"environmentKey\": \"example-environment-key\",   \"instructions\": [ { \"kind\": \"turnFlagOff\" } ] } ```  #### `addUserTargets`  Adds the user keys in `values` to the individual user targets for the variation specified by `variationId`. Returns an error if this causes the same user key to be targeted in multiple variations.  ##### Parameters  - `values`: list of user keys - `variationId`: ID of a variation on the flag  #### `removeUserTargets`  Removes the user keys in `values` to the individual user targets for the variation specified by `variationId`. Does nothing if the user keys are not targeted.  ##### Parameters  - `values`: list of user keys - `variationId`: ID of a variation on the flag  #### `replaceUserTargets`  Completely replaces the existing set of user targeting. All variations must be provided. Example:  ```json {   \"kind\": \"replaceUserTargets\",   \"targets\": [     {       \"variationId\": \"variation-1\",       \"values\": [\"blah\", \"foo\", \"bar\"]     },     {       \"variationId\": \"variation-2\",       \"values\": [\"abc\", \"def\"]     }   ] } ```  ##### Parameters  - `targets`: a list of user targeting  #### `clearUserTargets`  Removes all individual user targets from the variation specified by `variationId`  ##### Parameters  - `variationId`: ID of a variation on the flag  #### `addPrerequisite`  Adds the flag indicated by `key` with variation `variationId` as a prerequisite to the flag.  ##### Parameters  - `key`: flag key of another flag - `variationId`: ID of a variation of the flag with key `key`  #### `removePrerequisite`  Removes the prerequisite indicated by `key`. Does nothing if this prerequisite does not exist.  ##### Parameters  - `key`: flag key of an existing prerequisite  #### `updatePrerequisite`  Changes the prerequisite with flag key `key` to the variation indicated by `variationId`. Returns an error if this prerequisite does not exist.  ##### Parameters  - `key`: flag key of an existing prerequisite - `variationId`: ID of a variation of the flag with key `key`  #### `replacePrerequisites`  Completely replaces the existing set of prerequisites for a given flag. Example:  ```json {   \"kind\": \"replacePrerequisites\",   \"prerequisites\": [     {       \"key\": \"flag-key\",       \"variationId\": \"variation-1\"     },     {       \"key\": \"another-flag\",       \"variationId\": \"variation-2\"     }   ] } ```  ##### Parameters  - `prerequisites`: a list of prerequisites  #### `addRule`  Adds a new rule to the flag with the given `clauses` which serves the variation indicated by `variationId` or the percent rollout indicated by `rolloutWeights` and `rolloutBucketBy`. If `beforeRuleId` is set, the rule will be added in the list of rules before the indicated rule. Otherwise, the rule will be added to the end of the list.  ##### Parameters  - `clauses`: Array of clauses (see `addClauses`) - `beforeRuleId`: Optional ID of a rule in the flag - `variationId`: ID of a variation of the flag - `rolloutWeights`: Map of variationId to weight in thousandths of a percent (0-100000) - `rolloutBucketBy`: Optional user attribute  #### `removeRule`  Removes the targeting rule specified by `ruleId`. Does nothing if the rule does not exist.  ##### Parameters  - `ruleId`: ID of a rule in the flag  #### `replaceRules`  Completely replaces the existing rules for a given flag. Example:  ```json {   \"kind\": \"replaceRules\",   \"rules\": [     {       \"variationId\": \"variation-1\",       \"description\": \"myRule\",       \"clauses\": [         {           \"attribute\": \"segmentMatch\",           \"op\": \"segmentMatch\",           \"values\": [\"test\"]         }       ],       \"trackEvents\": true     }   ] } ```  ##### Parameters  - `rules`: a list of rules  #### `addClauses`  Adds the given clauses to the rule indicated by `ruleId`.  ##### Parameters  - `ruleId`: ID of a rule in the flag - `clauses`: Array of clause objects, with `attribute` (string), `op` (string), and `values` (array of strings, numbers, or dates) properties.  #### `removeClauses`  Removes the clauses specified by `clauseIds` from the rule indicated by `ruleId`.  #### Parameters  - `ruleId`: ID of a rule in the flag - `clauseIds`: Array of IDs of clauses in the rule  #### `updateClause`  Replaces the clause indicated by `ruleId` and `clauseId` with `clause`.  ##### Parameters  - `ruleId`: ID of a rule in the flag - `clauseId`: ID of a clause in that rule - `clause`: Clause object  #### `addValuesToClause`  Adds `values` to the values of the clause indicated by `ruleId` and `clauseId`.  ##### Parameters  - `ruleId`: ID of a rule in the flag - `clauseId`: ID of a clause in that rule - `values`: Array of strings  #### `removeValuesFromClause`  Removes `values` from the values of the clause indicated by `ruleId` and `clauseId`.  ##### Parameters  `ruleId`: ID of a rule in the flag `clauseId`: ID of a clause in that rule `values`: Array of strings  #### `reorderRules`  Rearranges the rules to match the order given in `ruleIds`. Will return an error if `ruleIds` does not match the current set of rules on the flag.  ##### Parameters  - `ruleIds`: Array of IDs of all rules in the flag  #### `updateRuleVariationOrRollout`  Updates what the rule indicated by `ruleId` serves if its clauses evaluate to true. Can either be a fixed variation indicated by `variationId` or a percent rollout indicated by `rolloutWeights` and `rolloutBucketBy`.  ##### Parameters  - `ruleId`: ID of a rule in the flag - `variationId`: ID of a variation of the flag   or - `rolloutWeights`: Map of variationId to weight in thousandths of a percent (0-100000) - `rolloutBucketBy`: Optional user attribute  #### `updateFallthroughVariationOrRollout`  Updates the flag's fallthrough, which is served if none of the targeting rules match. Can either be a fixed variation indicated by `variationId` or a percent rollout indicated by `rolloutWeights` and `rolloutBucketBy`.  ##### Parameters  `variationId`: ID of a variation of the flag or `rolloutWeights`: Map of variationId to weight in thousandths of a percent (0-100000) `rolloutBucketBy`: Optional user attribute  #### `updateOffVariation`  Updates the variation served when the flag's targeting is off to the variation indicated by `variationId`.  ##### Parameters  `variationId`: ID of a variation of the flag  ### Example  ```json {   \"environmentKey\": \"production\",   \"instructions\": [     {       \"kind\": \"turnFlagOn\"     },     {       \"kind\": \"turnFlagOff\"     },     {       \"kind\": \"addUserTargets\",       \"variationId\": \"8bfb304e-d516-47e5-8727-e7f798e8992d\",       \"values\": [\"userId\", \"userId2\"]     },     {       \"kind\": \"removeUserTargets\",       \"variationId\": \"8bfb304e-d516-47e5-8727-e7f798e8992d\",       \"values\": [\"userId3\", \"userId4\"]     },     {       \"kind\": \"updateFallthroughVariationOrRollout\",       \"rolloutWeights\": {         \"variationId\": 50000,         \"variationId2\": 50000       },       \"rolloutBucketBy\": null     },     {       \"kind\": \"addRule\",       \"clauses\": [         {           \"attribute\": \"segmentMatch\",           \"negate\": false,           \"values\": [\"test-segment\"]         }       ],       \"variationId\": null,       \"rolloutWeights\": {         \"variationId\": 50000,         \"variationId2\": 50000       },       \"rolloutBucketBy\": \"key\"     },     {       \"kind\": \"removeRule\",       \"ruleId\": \"99f12464-a429-40fc-86cc-b27612188955\"     },     {       \"kind\": \"reorderRules\",       \"ruleIds\": [\"2f72974e-de68-4243-8dd3-739582147a1f\", \"8bfb304e-d516-47e5-8727-e7f798e8992d\"]     },     {       \"kind\": \"addClauses\",       \"ruleId\": \"1134\",       \"clauses\": [         {           \"attribute\": \"email\",           \"op\": \"in\",           \"negate\": false,           \"values\": [\"test@test.com\"]         }       ]     },     {       \"kind\": \"removeClauses\",       \"ruleId\": \"1242529\",       \"clauseIds\": [\"8bfb304e-d516-47e5-8727-e7f798e8992d\"]     },     {       \"kind\": \"updateClause\",       \"ruleId\": \"2f72974e-de68-4243-8dd3-739582147a1f\",       \"clauseId\": \"309845\",       \"clause\": {         \"attribute\": \"segmentMatch\",         \"negate\": false,         \"values\": [\"test-segment\"]       }     },     {       \"kind\": \"updateRuleVariationOrRollout\",       \"ruleId\": \"2342\",       \"rolloutWeights\": null,       \"rolloutBucketBy\": null     },     {       \"kind\": \"updateOffVariation\",       \"variationId\": \"3242453\"     },     {       \"kind\": \"addPrerequisite\",       \"variationId\": \"234235\",       \"key\": \"flagKey2\"     },     {       \"kind\": \"updatePrerequisite\",       \"variationId\": \"234235\",       \"key\": \"flagKey2\"     },     {       \"kind\": \"removePrerequisite\",       \"key\": \"flagKey\"     }   ] } ```  ## Using JSON patches on a feature flag  If you do not include the header described above, you can use [JSON patch](/reference#updates-via-json-patch).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key. The key identifies the flag in your code.
$patch_with_comment = {"patch":[{"op":"replace","path":"/description","value":"New description for this flag"}]}; // \LaunchDarklyApi\Model\PatchWithComment

try {
    $result = $apiInstance->patchFeatureFlag($project_key, $feature_flag_key, $patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->patchFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key. The key identifies the flag in your code. |
 **patch_with_comment** | [**\LaunchDarklyApi\Model\PatchWithComment**](../Model/PatchWithComment.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postFeatureFlag()`

```php
postFeatureFlag($project_key, $feature_flag_body, $clone): \LaunchDarklyApi\Model\FeatureFlag
```

Create a feature flag

Create a feature flag with the given name, key, and variations

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_body = {"key":"my-flag","name":"My Flag"}; // \LaunchDarklyApi\Model\FeatureFlagBody
$clone = 'clone_example'; // string | The key of the feature flag to be cloned. The key identifies the flag in your code. For example, setting `clone=flagKey` copies the full targeting configuration for all environments, including `on/off` state, from the original flag to the new flag.

try {
    $result = $apiInstance->postFeatureFlag($project_key, $feature_flag_body, $clone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->postFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_body** | [**\LaunchDarklyApi\Model\FeatureFlagBody**](../Model/FeatureFlagBody.md)|  |
 **clone** | **string**| The key of the feature flag to be cloned. The key identifies the flag in your code. For example, setting &#x60;clone&#x3D;flagKey&#x60; copies the full targeting configuration for all environments, including &#x60;on/off&#x60; state, from the original flag to the new flag. | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
