# LaunchDarklyApi\ApprovalsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteApprovalRequest()**](ApprovalsBetaApi.md#deleteApprovalRequest) | **DELETE** /api/v2/approval-requests/{id} | Delete approval request
[**getApprovalRequest()**](ApprovalsBetaApi.md#getApprovalRequest) | **GET** /api/v2/approval-requests/{id} | Get approval request
[**getApprovalRequests()**](ApprovalsBetaApi.md#getApprovalRequests) | **GET** /api/v2/approval-requests | List approval requests
[**postApprovalRequest()**](ApprovalsBetaApi.md#postApprovalRequest) | **POST** /api/v2/approval-requests | Create approval request
[**postApprovalRequestApply()**](ApprovalsBetaApi.md#postApprovalRequestApply) | **POST** /api/v2/approval-requests/{id}/apply | Apply approval request
[**postApprovalRequestReview()**](ApprovalsBetaApi.md#postApprovalRequestReview) | **POST** /api/v2/approval-requests/{id}/reviews | Review approval request


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


$apiInstance = new LaunchDarklyApi\Api\ApprovalsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The approval request ID

try {
    $apiInstance->deleteApprovalRequest($id);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsBetaApi->deleteApprovalRequest: ', $e->getMessage(), PHP_EOL;
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

## `getApprovalRequest()`

```php
getApprovalRequest($id, $expand): \LaunchDarklyApi\Model\ExpandableApprovalRequestResponse
```

Get approval request

Get an approval request by approval request ID.  ### Expanding approval response  LaunchDarkly supports the `expand` query param to include additional fields in the response, with the following fields:  - `flag` includes the flag the approval request belongs to - `project` includes the project the approval request belongs to - `environments` includes the environments the approval request relates to  For example, `expand=project,flag` includes the `project` and `flag` fields in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsBetaApi(
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
    echo 'Exception when calling ApprovalsBetaApi->getApprovalRequest: ', $e->getMessage(), PHP_EOL;
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

Get all approval requests.  ### Filtering approvals  LaunchDarkly supports the `filter` query param for filtering, with the following fields:  - `notifyMemberIds` filters for only approvals that are assigned to a member in the specified list. For example: `filter=notifyMemberIds anyOf [\"memberId1\", \"memberId2\"]`. - `requestorId` filters for only approvals that correspond to the ID of the member who requested the approval. For example: `filter=requestorId equals 457034721476302714390214`. - `resourceId` filters for only approvals that correspond to the the specified resource identifier. For example: `filter=resourceId equals proj/my-project:env/my-environment:flag/my-flag`. - `reviewStatus` filters for only approvals which correspond to the review status in the specified list. The possible values are `approved`, `declined`, and `pending`. For example: `filter=reviewStatus anyOf [\"pending\", \"approved\"]`. - `status` filters for only approvals which correspond to the status in the specified list. The possible values are `pending`, `scheduled`, `failed`, and `completed`. For example: `filter=status anyOf [\"pending\", \"scheduled\"]`.  You can also apply multiple filters at once. For example, setting `filter=projectKey equals my-project, reviewStatus anyOf [\"pending\",\"approved\"]` matches approval requests which correspond to the `my-project` project key, and a review status of either `pending` or `approved`.  ### Expanding approval response  LaunchDarkly supports the `expand` query param to include additional fields in the response, with the following fields:  - `flag` includes the flag the approval request belongs to - `project` includes the project the approval request belongs to - `environments` includes the environments the approval request relates to  For example, `expand=project,flag` includes the `project` and `flag` fields in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is of the form `field operator value`. Supported fields are explained above.
$expand = 'expand_example'; // string | A comma-separated list of fields to expand in the response. Supported fields are explained above.
$limit = 56; // int | The number of approvals to return. Defaults to -1, which returns all approvals.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getApprovalRequests($filter, $expand, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsBetaApi->getApprovalRequests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. | [optional]
 **expand** | **string**| A comma-separated list of fields to expand in the response. Supported fields are explained above. | [optional]
 **limit** | **int**| The number of approvals to return. Defaults to -1, which returns all approvals. | [optional]
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

## `postApprovalRequest()`

```php
postApprovalRequest($create_approval_request_request): \LaunchDarklyApi\Model\ApprovalRequestResponse
```

Create approval request

Create an approval request.  This endpoint currently supports creating an approval request for a flag across all environments with the following instructions:  - `addVariation` - `removeVariation` - `updateVariation` - `updateDefaultVariation`  For details on using these instructions, read [Update feature flag](/tag/Feature-flags#operation/patchFeatureFlag).  To create an approval for a flag specific to an environment, use [Create approval request for a flag](/tag/Approvals#operation/postApprovalRequestForFlag).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsBetaApi(
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
    echo 'Exception when calling ApprovalsBetaApi->postApprovalRequest: ', $e->getMessage(), PHP_EOL;
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

Apply an approval request that has been approved.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApprovalsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The feature flag approval request ID
$post_approval_request_apply_request = new \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest(); // \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest

try {
    $result = $apiInstance->postApprovalRequestApply($id, $post_approval_request_apply_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsBetaApi->postApprovalRequestApply: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The feature flag approval request ID |
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


$apiInstance = new LaunchDarklyApi\Api\ApprovalsBetaApi(
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
    echo 'Exception when calling ApprovalsBetaApi->postApprovalRequestReview: ', $e->getMessage(), PHP_EOL;
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
