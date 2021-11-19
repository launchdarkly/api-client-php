# LaunchDarklyApi\ScheduledChangesApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteFlagConfigScheduledChanges()**](ScheduledChangesApi.md#deleteFlagConfigScheduledChanges) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Delete scheduled changes workflow
[**getFeatureFlagScheduledChange()**](ScheduledChangesApi.md#getFeatureFlagScheduledChange) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Get a scheduled change
[**getFlagConfigScheduledChanges()**](ScheduledChangesApi.md#getFlagConfigScheduledChanges) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | List scheduled changes
[**patchFlagConfigScheduledChange()**](ScheduledChangesApi.md#patchFlagConfigScheduledChange) | **PATCH** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Update scheduled changes workflow
[**postFlagConfigScheduledChanges()**](ScheduledChangesApi.md#postFlagConfigScheduledChanges) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | Create scheduled changes workflow


## `deleteFlagConfigScheduledChanges()`

```php
deleteFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key, $id)
```

Delete scheduled changes workflow

Delete a scheduled changes workflow

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ScheduledChangesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The scheduled change id

try {
    $apiInstance->deleteFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling ScheduledChangesApi->deleteFlagConfigScheduledChanges: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The scheduled change id |

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

## `getFeatureFlagScheduledChange()`

```php
getFeatureFlagScheduledChange($project_key, $feature_flag_key, $environment_key, $id): \LaunchDarklyApi\Model\FeatureFlagScheduledChange
```

Get a scheduled change

Get a scheduled change that will be applied to the feature flag by ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ScheduledChangesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The scheduled change id

try {
    $result = $apiInstance->getFeatureFlagScheduledChange($project_key, $feature_flag_key, $environment_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduledChangesApi->getFeatureFlagScheduledChange: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The scheduled change id |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChange**](../Model/FeatureFlagScheduledChange.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFlagConfigScheduledChanges()`

```php
getFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key): \LaunchDarklyApi\Model\FeatureFlagScheduledChanges
```

List scheduled changes

Get a list of scheduled changes that will be applied to the feature flag.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ScheduledChangesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduledChangesApi->getFlagConfigScheduledChanges: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChanges**](../Model/FeatureFlagScheduledChanges.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchFlagConfigScheduledChange()`

```php
patchFlagConfigScheduledChange($project_key, $feature_flag_key, $environment_key, $id, $flag_scheduled_changes_input, $ignore_conflicts): \LaunchDarklyApi\Model\FeatureFlagScheduledChange
```

Update scheduled changes workflow

Update a scheduled change, overriding existing instructions with the new ones.<br /><br />Requires a semantic patch representation of the desired changes to the resource. To learn more about semantic patches, read [Updates](/#section/Updates/Updates-via-semantic-patches)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ScheduledChangesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The scheduled change ID
$flag_scheduled_changes_input = new \LaunchDarklyApi\Model\FlagScheduledChangesInput(); // \LaunchDarklyApi\Model\FlagScheduledChangesInput
$ignore_conflicts = True; // bool | Whether or not to succeed or fail when the new instructions conflict with existing scheduled changes

try {
    $result = $apiInstance->patchFlagConfigScheduledChange($project_key, $feature_flag_key, $environment_key, $id, $flag_scheduled_changes_input, $ignore_conflicts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduledChangesApi->patchFlagConfigScheduledChange: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The scheduled change ID |
 **flag_scheduled_changes_input** | [**\LaunchDarklyApi\Model\FlagScheduledChangesInput**](../Model/FlagScheduledChangesInput.md)|  |
 **ignore_conflicts** | **bool**| Whether or not to succeed or fail when the new instructions conflict with existing scheduled changes | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChange**](../Model/FeatureFlagScheduledChange.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postFlagConfigScheduledChanges()`

```php
postFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key, $post_flag_scheduled_changes_input, $ignore_conflicts): \LaunchDarklyApi\Model\FeatureFlagScheduledChange
```

Create scheduled changes workflow

Create scheduled changes for a feature flag. If the ignoreConficts query parameter is false and the new instructions would conflict with the current state of the feature flag or any existing scheduled changes, the request will fail. If the parameter is true and there are conflicts, the request will succeed as normal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ScheduledChangesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$post_flag_scheduled_changes_input = new \LaunchDarklyApi\Model\PostFlagScheduledChangesInput(); // \LaunchDarklyApi\Model\PostFlagScheduledChangesInput
$ignore_conflicts = True; // bool | Whether or not to succeed or fail when the new instructions conflict with existing scheduled changes

try {
    $result = $apiInstance->postFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key, $post_flag_scheduled_changes_input, $ignore_conflicts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScheduledChangesApi->postFlagConfigScheduledChanges: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **post_flag_scheduled_changes_input** | [**\LaunchDarklyApi\Model\PostFlagScheduledChangesInput**](../Model/PostFlagScheduledChangesInput.md)|  |
 **ignore_conflicts** | **bool**| Whether or not to succeed or fail when the new instructions conflict with existing scheduled changes | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChange**](../Model/FeatureFlagScheduledChange.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
