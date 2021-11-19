# LaunchDarklyApi\ApprovalsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteApprovalRequest()**](ApprovalsApi.md#deleteApprovalRequest) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Delete approval request
[**getApproval()**](ApprovalsApi.md#getApproval) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Get approval request
[**getApprovals()**](ApprovalsApi.md#getApprovals) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | List all approval requests
[**postApprovalRequest()**](ApprovalsApi.md#postApprovalRequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | Create approval request
[**postApprovalRequestApplyRequest()**](ApprovalsApi.md#postApprovalRequestApplyRequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/apply | Apply approval request
[**postApprovalRequestReview()**](ApprovalsApi.md#postApprovalRequestReview) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/reviews | Review approval request
[**postFlagCopyConfigApprovalRequest()**](ApprovalsApi.md#postFlagCopyConfigApprovalRequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests-flag-copy | Create approval request to copy flag configurations across environments


## `deleteApprovalRequest()`

```php
deleteApprovalRequest($project_key, $feature_flag_key, $environment_key, $id)
```

Delete approval request

Delete an approval request for a feature flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID

try {
    $apiInstance->deleteApprovalRequest($project_key, $feature_flag_key, $environment_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->deleteApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The feature flag approval request ID |

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

## `getApproval()`

```php
getApproval($project_key, $feature_flag_key, $environment_key, $id): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Get approval request

Get a single approval request for a feature flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID

try {
    $result = $apiInstance->getApproval($project_key, $feature_flag_key, $environment_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->getApproval: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The feature flag approval request ID |

### Return type

[**\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse**](../Model/FlagConfigApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApprovals()`

```php
getApprovals($project_key, $feature_flag_key, $environment_key): \LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse
```

List all approval requests

Get all approval requests for a feature flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getApprovals($project_key, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->getApprovals: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse**](../Model/FlagConfigApprovalRequestsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApprovalRequest()`

```php
postApprovalRequest($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Create approval request

Create an approval request for a feature flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$create_flag_config_approval_request_request = new \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest(); // \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest

try {
    $result = $apiInstance->postApprovalRequest($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **create_flag_config_approval_request_request** | [**\LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest**](../Model/CreateFlagConfigApprovalRequestRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse**](../Model/FlagConfigApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApprovalRequestApplyRequest()`

```php
postApprovalRequestApplyRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Apply approval request

Apply approval request by either approving or declining changes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID
$post_approval_request_apply_request = new \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest(); // \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest

try {
    $result = $apiInstance->postApprovalRequestApplyRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequestApplyRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The feature flag approval request ID |
 **post_approval_request_apply_request** | [**\LaunchDarklyApi\Model\PostApprovalRequestApplyRequest**](../Model/PostApprovalRequestApplyRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse**](../Model/FlagConfigApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApprovalRequestReview()`

```php
postApprovalRequestReview($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Review approval request

Review approval request by either approving or declining changes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID
$post_approval_request_review_request = new \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest(); // \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest

try {
    $result = $apiInstance->postApprovalRequestReview($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequestReview: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The feature flag approval request ID |
 **post_approval_request_review_request** | [**\LaunchDarklyApi\Model\PostApprovalRequestReviewRequest**](../Model/PostApprovalRequestReviewRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse**](../Model/FlagConfigApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postFlagCopyConfigApprovalRequest()`

```php
postFlagCopyConfigApprovalRequest($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Create approval request to copy flag configurations across environments

Create an approval request to copy a feature flag's configuration across environments.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$create_copy_flag_config_approval_request_request = new \LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest(); // \LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest

try {
    $result = $apiInstance->postFlagCopyConfigApprovalRequest($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postFlagCopyConfigApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **create_copy_flag_config_approval_request_request** | [**\LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest**](../Model/CreateCopyFlagConfigApprovalRequestRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse**](../Model/FlagConfigApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
