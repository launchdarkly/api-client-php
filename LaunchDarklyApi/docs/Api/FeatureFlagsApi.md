# LaunchDarklyApi\FeatureFlagsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**copyFeatureFlag**](FeatureFlagsApi.md#copyFeatureFlag) | **POST** /flags/{projectKey}/{featureFlagKey}/copy | Copies the feature flag configuration from one environment to the same feature flag in another environment.
[**deleteApprovalRequest**](FeatureFlagsApi.md#deleteApprovalRequest) | **DELETE** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{approvalRequestId} | Delete an approval request for a feature flag config
[**deleteFeatureFlag**](FeatureFlagsApi.md#deleteFeatureFlag) | **DELETE** /flags/{projectKey}/{featureFlagKey} | Delete a feature flag in all environments. Be careful-- only delete feature flags that are no longer being used by your application.
[**deleteFlagConfigScheduledChanges**](FeatureFlagsApi.md#deleteFlagConfigScheduledChanges) | **DELETE** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{scheduledChangeId} | Delete a scheduled change on a feature flag in an environment.
[**flagsProjectKeyEnvironmentKeyFeatureFlagKeyDependentFlagsGet**](FeatureFlagsApi.md#flagsProjectKeyEnvironmentKeyFeatureFlagKeyDependentFlagsGet) | **GET** /flags/{projectKey}/{environmentKey}/{featureFlagKey}/dependent-flags | Get dependent flags for the flag in the environment specified in path parameters
[**flagsProjectKeyFeatureFlagKeyDependentFlagsGet**](FeatureFlagsApi.md#flagsProjectKeyFeatureFlagKeyDependentFlagsGet) | **GET** /flags/{projectKey}/{featureFlagKey}/dependent-flags | Get dependent flags across all environments for the flag specified in the path parameters
[**getApprovalRequest**](FeatureFlagsApi.md#getApprovalRequest) | **GET** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{approvalRequestId} | Get a single approval request for a feature flag config
[**getApprovalRequests**](FeatureFlagsApi.md#getApprovalRequests) | **GET** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | Get all approval requests for a feature flag config
[**getExpiringUserTargets**](FeatureFlagsApi.md#getExpiringUserTargets) | **GET** /flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for feature flag
[**getFeatureFlag**](FeatureFlagsApi.md#getFeatureFlag) | **GET** /flags/{projectKey}/{featureFlagKey} | Get a single feature flag by key.
[**getFeatureFlagStatus**](FeatureFlagsApi.md#getFeatureFlagStatus) | **GET** /flag-statuses/{projectKey}/{environmentKey}/{featureFlagKey} | Get the status for a particular feature flag.
[**getFeatureFlagStatusAcrossEnvironments**](FeatureFlagsApi.md#getFeatureFlagStatusAcrossEnvironments) | **GET** /flag-status/{projectKey}/{featureFlagKey} | Get the status for a particular feature flag across environments
[**getFeatureFlagStatuses**](FeatureFlagsApi.md#getFeatureFlagStatuses) | **GET** /flag-statuses/{projectKey}/{environmentKey} | Get a list of statuses for all feature flags. The status includes the last time the feature flag was requested, as well as the state of the flag.
[**getFeatureFlags**](FeatureFlagsApi.md#getFeatureFlags) | **GET** /flags/{projectKey} | Get a list of all features in the given project.
[**getFlagConfigScheduledChange**](FeatureFlagsApi.md#getFlagConfigScheduledChange) | **GET** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{scheduledChangeId} | Get a scheduled change on a feature flag by id.
[**getFlagConfigScheduledChanges**](FeatureFlagsApi.md#getFlagConfigScheduledChanges) | **GET** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | Get all scheduled workflows for a feature flag by key.
[**getFlagConfigScheduledChangesConflicts**](FeatureFlagsApi.md#getFlagConfigScheduledChangesConflicts) | **POST** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes-conflicts | Lists conflicts between the given instructions and any existing scheduled changes for the feature flag. The actual HTTP verb should be REPORT, not POST.
[**patchExpiringUserTargets**](FeatureFlagsApi.md#patchExpiringUserTargets) | **PATCH** /flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Update, add, or delete expiring user targets on feature flag
[**patchFeatureFlag**](FeatureFlagsApi.md#patchFeatureFlag) | **PATCH** /flags/{projectKey}/{featureFlagKey} | Perform a partial update to a feature.
[**patchFlagConfigScheduledChange**](FeatureFlagsApi.md#patchFlagConfigScheduledChange) | **PATCH** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{scheduledChangeId} | Updates an existing scheduled-change on a feature flag in an environment.
[**postApplyApprovalRequest**](FeatureFlagsApi.md#postApplyApprovalRequest) | **POST** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{approvalRequestId}/apply | Apply approval request for a feature flag config
[**postApprovalRequest**](FeatureFlagsApi.md#postApprovalRequest) | **POST** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{approvalRequestId} | Create an approval request for a feature flag config
[**postFeatureFlag**](FeatureFlagsApi.md#postFeatureFlag) | **POST** /flags/{projectKey} | Creates a new feature flag.
[**postFlagConfigScheduledChanges**](FeatureFlagsApi.md#postFlagConfigScheduledChanges) | **POST** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | Creates a new scheduled change for a feature flag.
[**postReviewApprovalRequest**](FeatureFlagsApi.md#postReviewApprovalRequest) | **POST** /projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{approvalRequestId}/review | Review approval request for a feature flag config


# **copyFeatureFlag**
> \LaunchDarklyApi\Model\FeatureFlag copyFeatureFlag($project_key, $feature_flag_key, $feature_flag_copy_body)

Copies the feature flag configuration from one environment to the same feature flag in another environment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$feature_flag_copy_body = new \LaunchDarklyApi\Model\FeatureFlagCopyBody(); // \LaunchDarklyApi\Model\FeatureFlagCopyBody | Copy feature flag configurations between environments.

try {
    $result = $apiInstance->copyFeatureFlag($project_key, $feature_flag_key, $feature_flag_copy_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->copyFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **feature_flag_copy_body** | [**\LaunchDarklyApi\Model\FeatureFlagCopyBody**](../Model/FeatureFlagCopyBody.md)| Copy feature flag configurations between environments. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteApprovalRequest**
> deleteApprovalRequest($project_key, $environment_key, $feature_flag_key, $approval_request_id, $approval_request_config_body)

Delete an approval request for a feature flag config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$approval_request_id = "approval_request_id_example"; // string | The approval request ID
$approval_request_config_body = new \LaunchDarklyApi\Model\ApprovalRequestConfigBody(); // \LaunchDarklyApi\Model\ApprovalRequestConfigBody | Create a new approval request

try {
    $apiInstance->deleteApprovalRequest($project_key, $environment_key, $feature_flag_key, $approval_request_id, $approval_request_config_body);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->deleteApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **approval_request_id** | **string**| The approval request ID |
 **approval_request_config_body** | [**\LaunchDarklyApi\Model\ApprovalRequestConfigBody**](../Model/ApprovalRequestConfigBody.md)| Create a new approval request | [optional]

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteFeatureFlag**
> deleteFeatureFlag($project_key, $feature_flag_key)

Delete a feature flag in all environments. Be careful-- only delete feature flags that are no longer being used by your application.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $apiInstance->deleteFeatureFlag($project_key, $feature_flag_key);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->deleteFeatureFlag: ', $e->getMessage(), PHP_EOL;
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

# **deleteFlagConfigScheduledChanges**
> deleteFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key, $scheduled_change_id)

Delete a scheduled change on a feature flag in an environment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$scheduled_change_id = "scheduled_change_id_example"; // string | The id of the scheduled change

try {
    $apiInstance->deleteFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key, $scheduled_change_id);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->deleteFlagConfigScheduledChanges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **scheduled_change_id** | **string**| The id of the scheduled change |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagsProjectKeyEnvironmentKeyFeatureFlagKeyDependentFlagsGet**
> \LaunchDarklyApi\Model\DependentFlagsByEnvironment flagsProjectKeyEnvironmentKeyFeatureFlagKeyDependentFlagsGet($project_key, $environment_key, $feature_flag_key)

Get dependent flags for the flag in the environment specified in path parameters

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $result = $apiInstance->flagsProjectKeyEnvironmentKeyFeatureFlagKeyDependentFlagsGet($project_key, $environment_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->flagsProjectKeyEnvironmentKeyFeatureFlagKeyDependentFlagsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

[**\LaunchDarklyApi\Model\DependentFlagsByEnvironment**](../Model/DependentFlagsByEnvironment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagsProjectKeyFeatureFlagKeyDependentFlagsGet**
> \LaunchDarklyApi\Model\MultiEnvironmentDependentFlags flagsProjectKeyFeatureFlagKeyDependentFlagsGet($project_key, $feature_flag_key)

Get dependent flags across all environments for the flag specified in the path parameters

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $result = $apiInstance->flagsProjectKeyFeatureFlagKeyDependentFlagsGet($project_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->flagsProjectKeyFeatureFlagKeyDependentFlagsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

[**\LaunchDarklyApi\Model\MultiEnvironmentDependentFlags**](../Model/MultiEnvironmentDependentFlags.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getApprovalRequest**
> \LaunchDarklyApi\Model\ApprovalRequests getApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id)

Get a single approval request for a feature flag config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$approval_request_id = "approval_request_id_example"; // string | The approval request ID

try {
    $result = $apiInstance->getApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **approval_request_id** | **string**| The approval request ID |

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequests**](../Model/ApprovalRequests.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getApprovalRequests**
> \LaunchDarklyApi\Model\ApprovalRequests getApprovalRequests($project_key, $feature_flag_key, $environment_key)

Get all approval requests for a feature flag config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.

try {
    $result = $apiInstance->getApprovalRequests($project_key, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getApprovalRequests: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequests**](../Model/ApprovalRequests.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getExpiringUserTargets**
> \LaunchDarklyApi\Model\UserTargetingExpirationForFlags getExpiringUserTargets($project_key, $environment_key, $feature_flag_key)

Get expiring user targets for feature flag

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $result = $apiInstance->getExpiringUserTargets($project_key, $environment_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getExpiringUserTargets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

[**\LaunchDarklyApi\Model\UserTargetingExpirationForFlags**](../Model/UserTargetingExpirationForFlags.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlag**
> \LaunchDarklyApi\Model\FeatureFlag getFeatureFlag($project_key, $feature_flag_key, $env)

Get a single feature flag by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$env = array("env_example"); // string[] | By default, each feature will include configurations for each environment. You can filter environments with the env query parameter. For example, setting env=[\"production\"] will restrict the returned configurations to just your production environment.

try {
    $result = $apiInstance->getFeatureFlag($project_key, $feature_flag_key, $env);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **env** | [**string[]**](../Model/string.md)| By default, each feature will include configurations for each environment. You can filter environments with the env query parameter. For example, setting env&#x3D;[\&quot;production\&quot;] will restrict the returned configurations to just your production environment. | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlagStatus**
> \LaunchDarklyApi\Model\FeatureFlagStatus getFeatureFlagStatus($project_key, $environment_key, $feature_flag_key)

Get the status for a particular feature flag.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $result = $apiInstance->getFeatureFlagStatus($project_key, $environment_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlagStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagStatus**](../Model/FeatureFlagStatus.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlagStatusAcrossEnvironments**
> \LaunchDarklyApi\Model\FeatureFlagStatusAcrossEnvironments getFeatureFlagStatusAcrossEnvironments($project_key, $feature_flag_key)

Get the status for a particular feature flag across environments

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.

try {
    $result = $apiInstance->getFeatureFlagStatusAcrossEnvironments($project_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlagStatusAcrossEnvironments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagStatusAcrossEnvironments**](../Model/FeatureFlagStatusAcrossEnvironments.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlagStatuses**
> \LaunchDarklyApi\Model\FeatureFlagStatuses getFeatureFlagStatuses($project_key, $environment_key)

Get a list of statuses for all feature flags. The status includes the last time the feature flag was requested, as well as the state of the flag.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.

try {
    $result = $apiInstance->getFeatureFlagStatuses($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlagStatuses: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagStatuses**](../Model/FeatureFlagStatuses.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFeatureFlags**
> \LaunchDarklyApi\Model\FeatureFlags getFeatureFlags($project_key, $env, $summary, $archived, $limit, $offset, $filter, $sort, $tag)

Get a list of all features in the given project.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$env = array("env_example"); // string[] | By default, each feature will include configurations for each environment. You can filter environments with the env query parameter. For example, setting env=[\"production\"] will restrict the returned configurations to just your production environment.
$summary = true; // bool | By default in api version >= 1, flags will _not_ include their list of prerequisites, targets or rules.  Set summary=0 to include these fields for each flag returned.
$archived = true; // bool | When set to 1, only archived flags will be included in the list of flags returned.  By default, archived flags are not included in the list of flags.
$limit = 8.14; // float | The number of objects to return. Defaults to -1, which returns everything.
$offset = 8.14; // float | Where to start in the list. This is for use with pagination. For example, an offset of 10 would skip the first 10 items and then return the next limit items.
$filter = "filter_example"; // string | A comma-separated list of filters. Each filter is of the form field:value.
$sort = "sort_example"; // string | A comma-separated list of fields to sort by. A field prefixed by a - will be sorted in descending order.
$tag = "tag_example"; // string | Filter by tag. A tag can be used to group flags across projects.

try {
    $result = $apiInstance->getFeatureFlags($project_key, $env, $summary, $archived, $limit, $offset, $filter, $sort, $tag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFeatureFlags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **env** | [**string[]**](../Model/string.md)| By default, each feature will include configurations for each environment. You can filter environments with the env query parameter. For example, setting env&#x3D;[\&quot;production\&quot;] will restrict the returned configurations to just your production environment. | [optional]
 **summary** | **bool**| By default in api version &gt;&#x3D; 1, flags will _not_ include their list of prerequisites, targets or rules.  Set summary&#x3D;0 to include these fields for each flag returned. | [optional]
 **archived** | **bool**| When set to 1, only archived flags will be included in the list of flags returned.  By default, archived flags are not included in the list of flags. | [optional]
 **limit** | **float**| The number of objects to return. Defaults to -1, which returns everything. | [optional]
 **offset** | **float**| Where to start in the list. This is for use with pagination. For example, an offset of 10 would skip the first 10 items and then return the next limit items. | [optional]
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form field:value. | [optional]
 **sort** | **string**| A comma-separated list of fields to sort by. A field prefixed by a - will be sorted in descending order. | [optional]
 **tag** | **string**| Filter by tag. A tag can be used to group flags across projects. | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlags**](../Model/FeatureFlags.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFlagConfigScheduledChange**
> \LaunchDarklyApi\Model\FeatureFlagScheduledChange getFlagConfigScheduledChange($project_key, $feature_flag_key, $environment_key, $scheduled_change_id)

Get a scheduled change on a feature flag by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$scheduled_change_id = "scheduled_change_id_example"; // string | The id of the scheduled change

try {
    $result = $apiInstance->getFlagConfigScheduledChange($project_key, $feature_flag_key, $environment_key, $scheduled_change_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFlagConfigScheduledChange: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **scheduled_change_id** | **string**| The id of the scheduled change |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChange**](../Model/FeatureFlagScheduledChange.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFlagConfigScheduledChanges**
> \LaunchDarklyApi\Model\FeatureFlagScheduledChanges getFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key)

Get all scheduled workflows for a feature flag by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.

try {
    $result = $apiInstance->getFlagConfigScheduledChanges($project_key, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFlagConfigScheduledChanges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChanges**](../Model/FeatureFlagScheduledChanges.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFlagConfigScheduledChangesConflicts**
> \LaunchDarklyApi\Model\FeatureFlagScheduledChangesConflicts getFlagConfigScheduledChangesConflicts($project_key, $feature_flag_key, $environment_key, $flag_config_scheduled_changes_conflicts_body)

Lists conflicts between the given instructions and any existing scheduled changes for the feature flag. The actual HTTP verb should be REPORT, not POST.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$flag_config_scheduled_changes_conflicts_body = new \LaunchDarklyApi\Model\FlagConfigScheduledChangesConflictsBody(); // \LaunchDarklyApi\Model\FlagConfigScheduledChangesConflictsBody | Used to determine if a semantic patch will result in conflicts with scheduled changes on a feature flag.

try {
    $result = $apiInstance->getFlagConfigScheduledChangesConflicts($project_key, $feature_flag_key, $environment_key, $flag_config_scheduled_changes_conflicts_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->getFlagConfigScheduledChangesConflicts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **flag_config_scheduled_changes_conflicts_body** | [**\LaunchDarklyApi\Model\FlagConfigScheduledChangesConflictsBody**](../Model/FlagConfigScheduledChangesConflictsBody.md)| Used to determine if a semantic patch will result in conflicts with scheduled changes on a feature flag. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChangesConflicts**](../Model/FeatureFlagScheduledChangesConflicts.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchExpiringUserTargets**
> \LaunchDarklyApi\Model\UserTargetingExpirationForFlags patchExpiringUserTargets($project_key, $environment_key, $feature_flag_key, $semantic_patch_with_comment)

Update, add, or delete expiring user targets on feature flag

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$semantic_patch_with_comment = new \stdClass; // object | Requires a Semantic Patch representation of the desired changes to the resource. 'https://apidocs.launchdarkly.com/reference#updates-via-semantic-patches'. The addition of comments is also supported.

try {
    $result = $apiInstance->patchExpiringUserTargets($project_key, $environment_key, $feature_flag_key, $semantic_patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->patchExpiringUserTargets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **semantic_patch_with_comment** | **object**| Requires a Semantic Patch representation of the desired changes to the resource. &#39;https://apidocs.launchdarkly.com/reference#updates-via-semantic-patches&#39;. The addition of comments is also supported. |

### Return type

[**\LaunchDarklyApi\Model\UserTargetingExpirationForFlags**](../Model/UserTargetingExpirationForFlags.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchFeatureFlag**
> \LaunchDarklyApi\Model\FeatureFlag patchFeatureFlag($project_key, $feature_flag_key, $patch_comment)

Perform a partial update to a feature.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$patch_comment = new \LaunchDarklyApi\Model\PatchComment(); // \LaunchDarklyApi\Model\PatchComment | Requires a JSON Patch representation of the desired changes to the project, and an optional comment. 'http://jsonpatch.com/' Feature flag patches also support JSON Merge Patch format. 'https://tools.ietf.org/html/rfc7386' The addition of comments is also supported.

try {
    $result = $apiInstance->patchFeatureFlag($project_key, $feature_flag_key, $patch_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->patchFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **patch_comment** | [**\LaunchDarklyApi\Model\PatchComment**](../Model/PatchComment.md)| Requires a JSON Patch representation of the desired changes to the project, and an optional comment. &#39;http://jsonpatch.com/&#39; Feature flag patches also support JSON Merge Patch format. &#39;https://tools.ietf.org/html/rfc7386&#39; The addition of comments is also supported. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchFlagConfigScheduledChange**
> \LaunchDarklyApi\Model\FeatureFlagScheduledChange patchFlagConfigScheduledChange($project_key, $feature_flag_key, $flag_config_scheduled_changes_patch_body, $environment_key, $scheduled_change_id)

Updates an existing scheduled-change on a feature flag in an environment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$flag_config_scheduled_changes_patch_body = new \LaunchDarklyApi\Model\FlagConfigScheduledChangesPatchBody(); // \LaunchDarklyApi\Model\FlagConfigScheduledChangesPatchBody | Update scheduled changes on a feature flag.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$scheduled_change_id = "scheduled_change_id_example"; // string | The id of the scheduled change

try {
    $result = $apiInstance->patchFlagConfigScheduledChange($project_key, $feature_flag_key, $flag_config_scheduled_changes_patch_body, $environment_key, $scheduled_change_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->patchFlagConfigScheduledChange: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **flag_config_scheduled_changes_patch_body** | [**\LaunchDarklyApi\Model\FlagConfigScheduledChangesPatchBody**](../Model/FlagConfigScheduledChangesPatchBody.md)| Update scheduled changes on a feature flag. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **scheduled_change_id** | **string**| The id of the scheduled change |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChange**](../Model/FeatureFlagScheduledChange.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postApplyApprovalRequest**
> \LaunchDarklyApi\Model\ApprovalRequests postApplyApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id, $approval_request_apply_config_body)

Apply approval request for a feature flag config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$approval_request_id = "approval_request_id_example"; // string | The approval request ID
$approval_request_apply_config_body = new \LaunchDarklyApi\Model\ApprovalRequestApplyConfigBody(); // \LaunchDarklyApi\Model\ApprovalRequestApplyConfigBody | Apply an approval request

try {
    $result = $apiInstance->postApplyApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id, $approval_request_apply_config_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->postApplyApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **approval_request_id** | **string**| The approval request ID |
 **approval_request_apply_config_body** | [**\LaunchDarklyApi\Model\ApprovalRequestApplyConfigBody**](../Model/ApprovalRequestApplyConfigBody.md)| Apply an approval request |

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequests**](../Model/ApprovalRequests.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postApprovalRequest**
> \LaunchDarklyApi\Model\ApprovalRequest postApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id, $approval_request_config_body)

Create an approval request for a feature flag config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$approval_request_id = "approval_request_id_example"; // string | The approval request ID
$approval_request_config_body = new \LaunchDarklyApi\Model\ApprovalRequestConfigBody(); // \LaunchDarklyApi\Model\ApprovalRequestConfigBody | Create a new approval request

try {
    $result = $apiInstance->postApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id, $approval_request_config_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->postApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **approval_request_id** | **string**| The approval request ID |
 **approval_request_config_body** | [**\LaunchDarklyApi\Model\ApprovalRequestConfigBody**](../Model/ApprovalRequestConfigBody.md)| Create a new approval request | [optional]

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequest**](../Model/ApprovalRequest.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postFeatureFlag**
> \LaunchDarklyApi\Model\FeatureFlag postFeatureFlag($project_key, $feature_flag_body, $clone)

Creates a new feature flag.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_body = new \LaunchDarklyApi\Model\FeatureFlagBody(); // \LaunchDarklyApi\Model\FeatureFlagBody | Create a new feature flag.
$clone = "clone_example"; // string | The key of the feature flag to be cloned. The key identifies the flag in your code.  For example, setting clone=flagKey will copy the full targeting configuration for all environments (including on/off state) from the original flag to the new flag.

try {
    $result = $apiInstance->postFeatureFlag($project_key, $feature_flag_body, $clone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->postFeatureFlag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_body** | [**\LaunchDarklyApi\Model\FeatureFlagBody**](../Model/FeatureFlagBody.md)| Create a new feature flag. |
 **clone** | **string**| The key of the feature flag to be cloned. The key identifies the flag in your code.  For example, setting clone&#x3D;flagKey will copy the full targeting configuration for all environments (including on/off state) from the original flag to the new flag. | [optional]

### Return type

[**\LaunchDarklyApi\Model\FeatureFlag**](../Model/FeatureFlag.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postFlagConfigScheduledChanges**
> \LaunchDarklyApi\Model\FeatureFlagScheduledChange postFlagConfigScheduledChanges($project_key, $flag_config_scheduled_changes_post_body, $feature_flag_key, $environment_key)

Creates a new scheduled change for a feature flag.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$flag_config_scheduled_changes_post_body = new \LaunchDarklyApi\Model\FlagConfigScheduledChangesPostBody(); // \LaunchDarklyApi\Model\FlagConfigScheduledChangesPostBody | Create scheduled changes on a feature flag.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.

try {
    $result = $apiInstance->postFlagConfigScheduledChanges($project_key, $flag_config_scheduled_changes_post_body, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->postFlagConfigScheduledChanges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **flag_config_scheduled_changes_post_body** | [**\LaunchDarklyApi\Model\FlagConfigScheduledChangesPostBody**](../Model/FlagConfigScheduledChangesPostBody.md)| Create scheduled changes on a feature flag. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |

### Return type

[**\LaunchDarklyApi\Model\FeatureFlagScheduledChange**](../Model/FeatureFlagScheduledChange.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postReviewApprovalRequest**
> \LaunchDarklyApi\Model\ApprovalRequests postReviewApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id, $approval_request_review_config_body)

Review approval request for a feature flag config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$feature_flag_key = "feature_flag_key_example"; // string | The feature flag's key. The key identifies the flag in your code.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$approval_request_id = "approval_request_id_example"; // string | The approval request ID
$approval_request_review_config_body = new \LaunchDarklyApi\Model\ApprovalRequestReviewConfigBody(); // \LaunchDarklyApi\Model\ApprovalRequestReviewConfigBody | Review an approval request

try {
    $result = $apiInstance->postReviewApprovalRequest($project_key, $feature_flag_key, $environment_key, $approval_request_id, $approval_request_review_config_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsApi->postReviewApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **feature_flag_key** | **string**| The feature flag&#39;s key. The key identifies the flag in your code. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **approval_request_id** | **string**| The approval request ID |
 **approval_request_review_config_body** | [**\LaunchDarklyApi\Model\ApprovalRequestReviewConfigBody**](../Model/ApprovalRequestReviewConfigBody.md)| Review an approval request |

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequests**](../Model/ApprovalRequests.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

