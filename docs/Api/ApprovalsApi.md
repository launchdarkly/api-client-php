# LaunchDarklyApi\ApprovalsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteApprovalRequest()**](ApprovalsApi.md#deleteApprovalRequest) | **DELETE** /api/v2/approval-requests/{id} | Delete approval request
[**deleteApprovalRequestForFlag()**](ApprovalsApi.md#deleteApprovalRequestForFlag) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Delete approval request for a flag
[**getApprovalForFlag()**](ApprovalsApi.md#getApprovalForFlag) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Get approval request for a flag
[**getApprovalRequest()**](ApprovalsApi.md#getApprovalRequest) | **GET** /api/v2/approval-requests/{id} | Get approval request
[**getApprovalRequests()**](ApprovalsApi.md#getApprovalRequests) | **GET** /api/v2/approval-requests | List approval requests
[**getApprovalsForFlag()**](ApprovalsApi.md#getApprovalsForFlag) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | List approval requests for a flag
[**postApprovalRequest()**](ApprovalsApi.md#postApprovalRequest) | **POST** /api/v2/approval-requests | Create approval request
[**postApprovalRequestApply()**](ApprovalsApi.md#postApprovalRequestApply) | **POST** /api/v2/approval-requests/{id}/apply | Apply approval request
[**postApprovalRequestApplyForFlag()**](ApprovalsApi.md#postApprovalRequestApplyForFlag) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/apply | Apply approval request for a flag
[**postApprovalRequestForFlag()**](ApprovalsApi.md#postApprovalRequestForFlag) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | Create approval request for a flag
[**postApprovalRequestReview()**](ApprovalsApi.md#postApprovalRequestReview) | **POST** /api/v2/approval-requests/{id}/reviews | Review approval request
[**postApprovalRequestReviewForFlag()**](ApprovalsApi.md#postApprovalRequestReviewForFlag) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/reviews | Review approval request for a flag
[**postFlagCopyConfigApprovalRequest()**](ApprovalsApi.md#postFlagCopyConfigApprovalRequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests-flag-copy | Create approval request to copy flag configurations across environments


## `deleteApprovalRequest()`

```php
deleteApprovalRequest($id)
```

Delete approval request

Delete an approval request.

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
$id = 'id_example'; // string | The approval request ID

try {
    $apiInstance->deleteApprovalRequest($id);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->deleteApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The approval request ID |

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

## `deleteApprovalRequestForFlag()`

```php
deleteApprovalRequestForFlag($project_key, $feature_flag_key, $environment_key, $id)
```

Delete approval request for a flag

Delete an approval request for a feature flag.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID

try {
    $apiInstance->deleteApprovalRequestForFlag($project_key, $feature_flag_key, $environment_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->deleteApprovalRequestForFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
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

## `getApprovalForFlag()`

```php
getApprovalForFlag($project_key, $feature_flag_key, $environment_key, $id): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Get approval request for a flag

Get a single approval request for a feature flag.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID

try {
    $result = $apiInstance->getApprovalForFlag($project_key, $feature_flag_key, $environment_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->getApprovalForFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
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

## `getApprovalRequest()`

```php
getApprovalRequest($id, $expand): \LaunchDarklyApi\Model\ExpandableApprovalRequestResponse
```

Get approval request

Get an approval request by approval request ID.  ### Expanding approval response  LaunchDarkly supports the `expand` query param to include additional fields in the response, with the following fields:  - `environments` includes the environments the approval request relates to - `flag` includes the flag the approval request belongs to - `project` includes the project the approval request belongs to - `resource` includes details on the resource (flag or segment) the approval request relates to  For example, `expand=project,flag` includes the `project` and `flag` fields in the response.

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
$id = 'id_example'; // string | The approval request ID
$expand = 'expand_example'; // string | A comma-separated list of fields to expand in the response. Supported fields are explained above.

try {
    $result = $apiInstance->getApprovalRequest($id, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->getApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The approval request ID |
 **expand** | **string**| A comma-separated list of fields to expand in the response. Supported fields are explained above. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ExpandableApprovalRequestResponse**](../Model/ExpandableApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApprovalRequests()`

```php
getApprovalRequests($filter, $expand, $limit, $offset): \LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse
```

List approval requests

Get all approval requests.  ### Filtering approvals  LaunchDarkly supports the `filter` query param for filtering, with the following fields:  - `notifyMemberIds` filters for only approvals that are assigned to a member in the specified list. For example: `filter=notifyMemberIds anyOf [\"memberId1\", \"memberId2\"]`. - `requestorId` filters for only approvals that correspond to the ID of the member who requested the approval. For example: `filter=requestorId equals 457034721476302714390214`. - `resourceId` filters for only approvals that correspond to the the specified resource identifier. For example: `filter=resourceId equals proj/my-project:env/my-environment:flag/my-flag`. - `resourceKind` filters for only approvals that correspond to the specified resource kind. For example: `filter=resourceKind equals flag`. Currently, `flag` and `segment` resource kinds are supported. - `reviewStatus` filters for only approvals which correspond to the review status in the specified list. The possible values are `approved`, `declined`, and `pending`. For example: `filter=reviewStatus anyOf [\"pending\", \"approved\"]`. - `status` filters for only approvals which correspond to the status in the specified list. The possible values are `pending`, `scheduled`, `failed`, and `completed`. For example: `filter=status anyOf [\"pending\", \"scheduled\"]`.  You can also apply multiple filters at once. For example, setting `filter=projectKey equals my-project, reviewStatus anyOf [\"pending\",\"approved\"]` matches approval requests which correspond to the `my-project` project key, and a review status of either `pending` or `approved`.  ### Expanding approval response  LaunchDarkly supports the `expand` query param to include additional fields in the response, with the following fields:  - `flag` includes the flag the approval request belongs to - `project` includes the project the approval request belongs to - `environments` includes the environments the approval request relates to  For example, `expand=project,flag` includes the `project` and `flag` fields in the response.

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
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is of the form `field operator value`. Supported fields are explained above.
$expand = 'expand_example'; // string | A comma-separated list of fields to expand in the response. Supported fields are explained above.
$limit = 56; // int | The number of approvals to return. Defaults to 20. Maximum limit is 200.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getApprovalRequests($filter, $expand, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->getApprovalRequests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. | [optional]
 **expand** | **string**| A comma-separated list of fields to expand in the response. Supported fields are explained above. | [optional]
 **limit** | **int**| The number of approvals to return. Defaults to 20. Maximum limit is 200. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse**](../Model/ExpandableApprovalRequestsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApprovalsForFlag()`

```php
getApprovalsForFlag($project_key, $feature_flag_key, $environment_key): \LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse
```

List approval requests for a flag

Get all approval requests for a feature flag.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getApprovalsForFlag($project_key, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->getApprovalsForFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
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
postApprovalRequest($create_approval_request_request): \LaunchDarklyApi\Model\ApprovalRequestResponse
```

Create approval request

Create an approval request.  This endpoint requires a list of `instructions`, in semantic patch format, that will be applied when the approval request is approved and applied.  If you are creating an approval request for a flag, you can use the following `instructions`:  - `addVariation` - `removeVariation` - `updateVariation` - `updateDefaultVariation`  For details on using these instructions, read [Update feature flag](https://launchdarkly.com/docs/api/feature-flags/patch-feature-flag).  To create an approval for a flag specific to an environment, use [Create approval request for a flag](https://launchdarkly.com/docs/api/approvals/post-approval-request-for-flag).  If you are creating an approval request for a segment, you can use the following read [Patch segment](https://launchdarkly.com/docs/api/segments/patch-segment) for details on the available `instructions`.

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
$create_approval_request_request = new \LaunchDarklyApi\Model\CreateApprovalRequestRequest(); // \LaunchDarklyApi\Model\CreateApprovalRequestRequest

try {
    $result = $apiInstance->postApprovalRequest($create_approval_request_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_approval_request_request** | [**\LaunchDarklyApi\Model\CreateApprovalRequestRequest**](../Model/CreateApprovalRequestRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequestResponse**](../Model/ApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApprovalRequestApply()`

```php
postApprovalRequestApply($id, $post_approval_request_apply_request): \LaunchDarklyApi\Model\ApprovalRequestResponse
```

Apply approval request

Apply an approval request that has been approved. This endpoint works with approval requests for either flag or segment changes.

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
$id = 'id_example'; // string | The approval request ID
$post_approval_request_apply_request = new \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest(); // \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest

try {
    $result = $apiInstance->postApprovalRequestApply($id, $post_approval_request_apply_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequestApply: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The approval request ID |
 **post_approval_request_apply_request** | [**\LaunchDarklyApi\Model\PostApprovalRequestApplyRequest**](../Model/PostApprovalRequestApplyRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequestResponse**](../Model/ApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApprovalRequestApplyForFlag()`

```php
postApprovalRequestApplyForFlag($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Apply approval request for a flag

Apply an approval request that has been approved. This endpoint requires a feature flag key, and can only be used for applying approval requests on flags.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID
$post_approval_request_apply_request = new \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest(); // \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest

try {
    $result = $apiInstance->postApprovalRequestApplyForFlag($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequestApplyForFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
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

## `postApprovalRequestForFlag()`

```php
postApprovalRequestForFlag($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Create approval request for a flag

Create an approval request for a feature flag.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$create_flag_config_approval_request_request = new \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest(); // \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest

try {
    $result = $apiInstance->postApprovalRequestForFlag($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequestForFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
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

## `postApprovalRequestReview()`

```php
postApprovalRequestReview($id, $post_approval_request_review_request): \LaunchDarklyApi\Model\ApprovalRequestResponse
```

Review approval request

Review an approval request by approving or denying changes.

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
$id = 'id_example'; // string | The approval request ID
$post_approval_request_review_request = new \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest(); // \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest

try {
    $result = $apiInstance->postApprovalRequestReview($id, $post_approval_request_review_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequestReview: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The approval request ID |
 **post_approval_request_review_request** | [**\LaunchDarklyApi\Model\PostApprovalRequestReviewRequest**](../Model/PostApprovalRequestReviewRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ApprovalRequestResponse**](../Model/ApprovalRequestResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApprovalRequestReviewForFlag()`

```php
postApprovalRequestReviewForFlag($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Review approval request for a flag

Review an approval request by approving or denying changes.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The feature flag approval request ID
$post_approval_request_review_request = new \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest(); // \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest

try {
    $result = $apiInstance->postApprovalRequestReviewForFlag($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsApi->postApprovalRequestReviewForFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key for the target environment
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
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key for the target environment |
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
