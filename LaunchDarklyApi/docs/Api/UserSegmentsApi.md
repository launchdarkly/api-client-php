# LaunchDarklyApi\UserSegmentsApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUserSegment**](UserSegmentsApi.md#deleteUserSegment) | **DELETE** /segments/{projectKey}/{environmentKey}/{userSegmentKey} | Delete a user segment.
[**getExpiringUserTargetsOnSegment**](UserSegmentsApi.md#getExpiringUserTargetsOnSegment) | **GET** /segments/{projectKey}/{userSegmentKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for user segment
[**getUserSegment**](UserSegmentsApi.md#getUserSegment) | **GET** /segments/{projectKey}/{environmentKey}/{userSegmentKey} | Get a single user segment by key.
[**getUserSegments**](UserSegmentsApi.md#getUserSegments) | **GET** /segments/{projectKey}/{environmentKey} | Get a list of all user segments in the given project.
[**patchExpiringUserTargetsOnSegment**](UserSegmentsApi.md#patchExpiringUserTargetsOnSegment) | **PATCH** /segments/{projectKey}/{userSegmentKey}/expiring-user-targets/{environmentKey} | Update, add, or delete expiring user targets on user segment
[**patchUserSegment**](UserSegmentsApi.md#patchUserSegment) | **PATCH** /segments/{projectKey}/{environmentKey}/{userSegmentKey} | Perform a partial update to a user segment.
[**postUserSegment**](UserSegmentsApi.md#postUserSegment) | **POST** /segments/{projectKey}/{environmentKey} | Creates a new user segment.
[**updateBigSegmentTargets**](UserSegmentsApi.md#updateBigSegmentTargets) | **POST** /segments/{projectKey}/{environmentKey}/{userSegmentKey}/users | Update targets included or excluded in a big segment


# **deleteUserSegment**
> deleteUserSegment($project_key, $environment_key, $user_segment_key)

Delete a user segment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$user_segment_key = "user_segment_key_example"; // string | The user segment's key. The key identifies the user segment in your code.

try {
    $apiInstance->deleteUserSegment($project_key, $environment_key, $user_segment_key);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->deleteUserSegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **user_segment_key** | **string**| The user segment&#39;s key. The key identifies the user segment in your code. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getExpiringUserTargetsOnSegment**
> \LaunchDarklyApi\Model\UserTargetingExpirationForSegment getExpiringUserTargetsOnSegment($project_key, $environment_key, $user_segment_key)

Get expiring user targets for user segment

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$user_segment_key = "user_segment_key_example"; // string | The user segment's key. The key identifies the user segment in your code.

try {
    $result = $apiInstance->getExpiringUserTargetsOnSegment($project_key, $environment_key, $user_segment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->getExpiringUserTargetsOnSegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **user_segment_key** | **string**| The user segment&#39;s key. The key identifies the user segment in your code. |

### Return type

[**\LaunchDarklyApi\Model\UserTargetingExpirationForSegment**](../Model/UserTargetingExpirationForSegment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUserSegment**
> \LaunchDarklyApi\Model\UserSegment getUserSegment($project_key, $environment_key, $user_segment_key)

Get a single user segment by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$user_segment_key = "user_segment_key_example"; // string | The user segment's key. The key identifies the user segment in your code.

try {
    $result = $apiInstance->getUserSegment($project_key, $environment_key, $user_segment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->getUserSegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **user_segment_key** | **string**| The user segment&#39;s key. The key identifies the user segment in your code. |

### Return type

[**\LaunchDarklyApi\Model\UserSegment**](../Model/UserSegment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUserSegments**
> \LaunchDarklyApi\Model\UserSegments getUserSegments($project_key, $environment_key, $tag)

Get a list of all user segments in the given project.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$tag = "tag_example"; // string | Filter by tag. A tag can be used to group flags across projects.

try {
    $result = $apiInstance->getUserSegments($project_key, $environment_key, $tag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->getUserSegments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **tag** | **string**| Filter by tag. A tag can be used to group flags across projects. | [optional]

### Return type

[**\LaunchDarklyApi\Model\UserSegments**](../Model/UserSegments.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchExpiringUserTargetsOnSegment**
> \LaunchDarklyApi\Model\UserTargetingExpirationForSegment patchExpiringUserTargetsOnSegment($project_key, $environment_key, $user_segment_key, $semantic_patch_with_comment)

Update, add, or delete expiring user targets on user segment

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$user_segment_key = "user_segment_key_example"; // string | The user segment's key. The key identifies the user segment in your code.
$semantic_patch_with_comment = new \stdClass; // object | Requires a Semantic Patch representation of the desired changes to the resource. 'https://apidocs.launchdarkly.com/reference#updates-via-semantic-patches'. The addition of comments is also supported.

try {
    $result = $apiInstance->patchExpiringUserTargetsOnSegment($project_key, $environment_key, $user_segment_key, $semantic_patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->patchExpiringUserTargetsOnSegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **user_segment_key** | **string**| The user segment&#39;s key. The key identifies the user segment in your code. |
 **semantic_patch_with_comment** | **object**| Requires a Semantic Patch representation of the desired changes to the resource. &#39;https://apidocs.launchdarkly.com/reference#updates-via-semantic-patches&#39;. The addition of comments is also supported. |

### Return type

[**\LaunchDarklyApi\Model\UserTargetingExpirationForSegment**](../Model/UserTargetingExpirationForSegment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchUserSegment**
> \LaunchDarklyApi\Model\UserSegment patchUserSegment($project_key, $environment_key, $user_segment_key, $patch_only)

Perform a partial update to a user segment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$user_segment_key = "user_segment_key_example"; // string | The user segment's key. The key identifies the user segment in your code.
$patch_only = array(new \LaunchDarklyApi\Model\PatchOperation()); // \LaunchDarklyApi\Model\PatchOperation[] | Requires a JSON Patch representation of the desired changes to the project. 'http://jsonpatch.com/' Feature flag patches also support JSON Merge Patch format. 'https://tools.ietf.org/html/rfc7386' The addition of comments is also supported.

try {
    $result = $apiInstance->patchUserSegment($project_key, $environment_key, $user_segment_key, $patch_only);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->patchUserSegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **user_segment_key** | **string**| The user segment&#39;s key. The key identifies the user segment in your code. |
 **patch_only** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)| Requires a JSON Patch representation of the desired changes to the project. &#39;http://jsonpatch.com/&#39; Feature flag patches also support JSON Merge Patch format. &#39;https://tools.ietf.org/html/rfc7386&#39; The addition of comments is also supported. |

### Return type

[**\LaunchDarklyApi\Model\UserSegment**](../Model/UserSegment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postUserSegment**
> \LaunchDarklyApi\Model\UserSegment postUserSegment($project_key, $environment_key, $user_segment_body)

Creates a new user segment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$user_segment_body = new \LaunchDarklyApi\Model\UserSegmentBody(); // \LaunchDarklyApi\Model\UserSegmentBody | Create a new user segment.

try {
    $result = $apiInstance->postUserSegment($project_key, $environment_key, $user_segment_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->postUserSegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **user_segment_body** | [**\LaunchDarklyApi\Model\UserSegmentBody**](../Model/UserSegmentBody.md)| Create a new user segment. |

### Return type

[**\LaunchDarklyApi\Model\UserSegment**](../Model/UserSegment.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateBigSegmentTargets**
> updateBigSegmentTargets($project_key, $environment_key, $user_segment_key, $big_segment_targets_body)

Update targets included or excluded in a big segment

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new LaunchDarklyApi\Api\UserSegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key, used to tie together flag configuration and users under one environment so they can be managed together.
$user_segment_key = "user_segment_key_example"; // string | The user segment's key. The key identifies the user segment in your code.
$big_segment_targets_body = new \LaunchDarklyApi\Model\BigSegmentTargetsBody(); // \LaunchDarklyApi\Model\BigSegmentTargetsBody | Add or remove user targets to the included or excluded lists on a big segment. Contact your account manager for early access to this feature.

try {
    $apiInstance->updateBigSegmentTargets($project_key, $environment_key, $user_segment_key, $big_segment_targets_body);
} catch (Exception $e) {
    echo 'Exception when calling UserSegmentsApi->updateBigSegmentTargets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key, used to tie together flag configuration and users under one environment so they can be managed together. |
 **user_segment_key** | **string**| The user segment&#39;s key. The key identifies the user segment in your code. |
 **big_segment_targets_body** | [**\LaunchDarklyApi\Model\BigSegmentTargetsBody**](../Model/BigSegmentTargetsBody.md)| Add or remove user targets to the included or excluded lists on a big segment. Contact your account manager for early access to this feature. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

