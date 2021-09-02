# LaunchDarklyApi\SegmentsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteSegment()**](SegmentsApi.md#deleteSegment) | **DELETE** /api/v2/segments/{projKey}/{envKey}/{key} | Delete segment
[**getExpiringUserTargetsForSegment()**](SegmentsApi.md#getExpiringUserTargetsForSegment) | **GET** /api/v2/segments/{projKey}/{segmentKey}/expiring-user-targets/{envKey} | Get expiring user targets for segment
[**getSegment()**](SegmentsApi.md#getSegment) | **GET** /api/v2/segments/{projKey}/{envKey}/{key} | Get segment
[**getSegmentMembershipForUser()**](SegmentsApi.md#getSegmentMembershipForUser) | **GET** /api/v2/segments/{projKey}/{envKey}/{key}/users/{userKey} | Get Big Segment membership for user
[**getSegments()**](SegmentsApi.md#getSegments) | **GET** /api/v2/segments/{projKey}/{envKey} | List segments
[**patchExpiringUserTargetsForSegment()**](SegmentsApi.md#patchExpiringUserTargetsForSegment) | **PATCH** /api/v2/segments/{projKey}/{segmentKey}/expiring-user-targets/{envKey} | Update expiring user targets for segment
[**patchSegment()**](SegmentsApi.md#patchSegment) | **PATCH** /api/v2/segments/{projKey}/{envKey}/{key} | Patch segment
[**postSegment()**](SegmentsApi.md#postSegment) | **POST** /api/v2/segments/{projKey}/{envKey} | Create segment
[**updateBigSegmentTargets()**](SegmentsApi.md#updateBigSegmentTargets) | **POST** /api/v2/segments/{projKey}/{envKey}/{key}/users | Update targets on a Big Segment


## `deleteSegment()`

```php
deleteSegment($proj_key, $env_key, $key)
```

Delete segment

Delete a user segment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$key = 'key_example'; // string | The user segment key.

try {
    $apiInstance->deleteSegment($proj_key, $env_key, $key);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->deleteSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **key** | **string**| The user segment key. |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExpiringUserTargetsForSegment()`

```php
getExpiringUserTargetsForSegment($proj_key, $env_key, $segment_key): \LaunchDarklyApi\Model\ExpiringUserTargetGetResponse
```

Get expiring user targets for segment

Get a list of a segment's user targets that are scheduled for removal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$segment_key = 'segment_key_example'; // string | The segment key.

try {
    $result = $apiInstance->getExpiringUserTargetsForSegment($proj_key, $env_key, $segment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getExpiringUserTargetsForSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **segment_key** | **string**| The segment key. |

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

## `getSegment()`

```php
getSegment($proj_key, $env_key, $key): \LaunchDarklyApi\Model\UserSegment
```

Get segment

Get a single user segment by key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$key = 'key_example'; // string | The segment key

try {
    $result = $apiInstance->getSegment($proj_key, $env_key, $key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **key** | **string**| The segment key |

### Return type

[**\LaunchDarklyApi\Model\UserSegment**](../Model/UserSegment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSegmentMembershipForUser()`

```php
getSegmentMembershipForUser($proj_key, $env_key, $key, $user_key): \LaunchDarklyApi\Model\BigSegmentTarget
```

Get Big Segment membership for user

Returns the membership status (included/excluded) for a given user in this segment. Note this operation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$key = 'key_example'; // string | The segment key.
$user_key = 'user_key_example'; // string | The user key.

try {
    $result = $apiInstance->getSegmentMembershipForUser($proj_key, $env_key, $key, $user_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getSegmentMembershipForUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **key** | **string**| The segment key. |
 **user_key** | **string**| The user key. |

### Return type

[**\LaunchDarklyApi\Model\BigSegmentTarget**](../Model/BigSegmentTarget.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSegments()`

```php
getSegments($proj_key, $env_key): \LaunchDarklyApi\Model\UserSegments
```

List segments

Get a list of all user segments in the given project

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.

try {
    $result = $apiInstance->getSegments($proj_key, $env_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getSegments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |

### Return type

[**\LaunchDarklyApi\Model\UserSegments**](../Model/UserSegments.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchExpiringUserTargetsForSegment()`

```php
patchExpiringUserTargetsForSegment($proj_key, $env_key, $segment_key, $patch_segment_request): \LaunchDarklyApi\Model\ExpiringUserTargetPatchResponse
```

Update expiring user targets for segment

Update the list of a segment's user targets that are scheduled for removal<br /><br />Requires a semantic patch representation of the desired changes to the resource. To learn more about semantic patches, read [Updates](/#section/Updates/Updates-via-semantic-patches).<br /><br />If the request is well-formed but any of its instructions failed to process, this operation returns status code `200`. In this case, the response `errors` array will be non-empty.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$segment_key = 'segment_key_example'; // string | The user segment key.
$patch_segment_request = new \LaunchDarklyApi\Model\PatchSegmentRequest(); // \LaunchDarklyApi\Model\PatchSegmentRequest

try {
    $result = $apiInstance->patchExpiringUserTargetsForSegment($proj_key, $env_key, $segment_key, $patch_segment_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->patchExpiringUserTargetsForSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **segment_key** | **string**| The user segment key. |
 **patch_segment_request** | [**\LaunchDarklyApi\Model\PatchSegmentRequest**](../Model/PatchSegmentRequest.md)|  |

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

## `patchSegment()`

```php
patchSegment($proj_key, $env_key, $key, $patch_with_comment): \LaunchDarklyApi\Model\UserSegment
```

Patch segment

Update a user segment. The request body must be a valid JSON patch or JSON merge patch document. To learn more about semantic patches, read [Updates](/#section/Updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$key = 'key_example'; // string | The user segment key.
$patch_with_comment = new \LaunchDarklyApi\Model\PatchWithComment(); // \LaunchDarklyApi\Model\PatchWithComment

try {
    $result = $apiInstance->patchSegment($proj_key, $env_key, $key, $patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->patchSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **key** | **string**| The user segment key. |
 **patch_with_comment** | [**\LaunchDarklyApi\Model\PatchWithComment**](../Model/PatchWithComment.md)|  |

### Return type

[**\LaunchDarklyApi\Model\UserSegment**](../Model/UserSegment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postSegment()`

```php
postSegment($proj_key, $env_key, $segment_body): \LaunchDarklyApi\Model\UserSegment
```

Create segment

Create a new user segment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$segment_body = new \LaunchDarklyApi\Model\SegmentBody(); // \LaunchDarklyApi\Model\SegmentBody

try {
    $result = $apiInstance->postSegment($proj_key, $env_key, $segment_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->postSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **segment_body** | [**\LaunchDarklyApi\Model\SegmentBody**](../Model/SegmentBody.md)|  |

### Return type

[**\LaunchDarklyApi\Model\UserSegment**](../Model/UserSegment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateBigSegmentTargets()`

```php
updateBigSegmentTargets($proj_key, $env_key, $key, $segment_user_state)
```

Update targets on a Big Segment

Update targets included or excluded in a Big Segment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key.
$env_key = 'env_key_example'; // string | The environment key.
$key = 'key_example'; // string | The segment key.
$segment_user_state = new \LaunchDarklyApi\Model\SegmentUserState(); // \LaunchDarklyApi\Model\SegmentUserState

try {
    $apiInstance->updateBigSegmentTargets($proj_key, $env_key, $key, $segment_user_state);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->updateBigSegmentTargets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key. |
 **env_key** | **string**| The environment key. |
 **key** | **string**| The segment key. |
 **segment_user_state** | [**\LaunchDarklyApi\Model\SegmentUserState**](../Model/SegmentUserState.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
