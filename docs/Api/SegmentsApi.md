# LaunchDarklyApi\SegmentsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteSegment()**](SegmentsApi.md#deleteSegment) | **DELETE** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Delete segment
[**getExpiringUserTargetsForSegment()**](SegmentsApi.md#getExpiringUserTargetsForSegment) | **GET** /api/v2/segments/{projectKey}/{segmentKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for segment
[**getSegment()**](SegmentsApi.md#getSegment) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Get segment
[**getSegmentMembershipForUser()**](SegmentsApi.md#getSegmentMembershipForUser) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/users/{userKey} | Get Big Segment membership for user
[**getSegments()**](SegmentsApi.md#getSegments) | **GET** /api/v2/segments/{projectKey}/{environmentKey} | List segments
[**patchExpiringUserTargetsForSegment()**](SegmentsApi.md#patchExpiringUserTargetsForSegment) | **PATCH** /api/v2/segments/{projectKey}/{segmentKey}/expiring-user-targets/{environmentKey} | Update expiring user targets for segment
[**patchSegment()**](SegmentsApi.md#patchSegment) | **PATCH** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Patch segment
[**postSegment()**](SegmentsApi.md#postSegment) | **POST** /api/v2/segments/{projectKey}/{environmentKey} | Create segment
[**updateBigSegmentTargets()**](SegmentsApi.md#updateBigSegmentTargets) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/users | Update targets on a Big Segment


## `deleteSegment()`

```php
deleteSegment($project_key, $environment_key, $segment_key)
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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key

try {
    $apiInstance->deleteSegment($project_key, $environment_key, $segment_key);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->deleteSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |

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

## `getExpiringUserTargetsForSegment()`

```php
getExpiringUserTargetsForSegment($project_key, $environment_key, $segment_key): \LaunchDarklyApi\Model\ExpiringUserTargetGetResponse
```

Get expiring user targets for segment

Get a list of a segment's user targets that are scheduled for removal.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key

try {
    $result = $apiInstance->getExpiringUserTargetsForSegment($project_key, $environment_key, $segment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getExpiringUserTargetsForSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |

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
getSegment($project_key, $environment_key, $segment_key): \LaunchDarklyApi\Model\UserSegment
```

Get segment

Get a single user segment by key.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key

try {
    $result = $apiInstance->getSegment($project_key, $environment_key, $segment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |

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
getSegmentMembershipForUser($project_key, $environment_key, $segment_key, $user_key): \LaunchDarklyApi\Model\BigSegmentTarget
```

Get Big Segment membership for user

Get the membership status (included/excluded) for a given user in this Big Segment. This operation does not support standard segments.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key
$user_key = 'user_key_example'; // string | The user key

try {
    $result = $apiInstance->getSegmentMembershipForUser($project_key, $environment_key, $segment_key, $user_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getSegmentMembershipForUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |
 **user_key** | **string**| The user key |

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
getSegments($project_key, $environment_key): \LaunchDarklyApi\Model\UserSegments
```

List segments

Get a list of all user segments in the given project.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getSegments($project_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->getSegments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |

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
patchExpiringUserTargetsForSegment($project_key, $environment_key, $segment_key, $patch_segment_request): \LaunchDarklyApi\Model\ExpiringUserTargetPatchResponse
```

Update expiring user targets for segment

Update expiring user targets for a segment. Updating a user target expiration uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](/reference#updates-using-semantic-patch).  If the request is well-formed but any of its instructions failed to process, this operation returns status code `200`. In this case, the response `errors` array will be non-empty.  ### Instructions  Semantic patch requests support the following `kind` instructions for updating user targets.  #### addExpireUserTargetDate  Schedules a date and time when LaunchDarkly will remove a user from segment targeting.  ##### Parameters  - `targetType`: A segment's target type, must be either `included` or `excluded`. - `userKey`: The user key. - `value`: The date when the user should expire from the segment targeting, in Unix milliseconds.  #### updateExpireUserTargetDate  Updates the date and time when LaunchDarkly will remove a user from segment targeting.  ##### Parameters  - `targetType`: A segment's target type, must be either `included` or `excluded`. - `userKey`: The user key. - `value`: The new date when the user should expire from the segment targeting, in Unix milliseconds. - `version`: The segment version.  #### removeExpireUserTargetDate  Removes the scheduled expiration for the user in the segment.  ##### Parameters  - `targetType`: A segment's target type, must be either `included` or `excluded`. - `userKey`: The user key.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key
$patch_segment_request = new \LaunchDarklyApi\Model\PatchSegmentRequest(); // \LaunchDarklyApi\Model\PatchSegmentRequest

try {
    $result = $apiInstance->patchExpiringUserTargetsForSegment($project_key, $environment_key, $segment_key, $patch_segment_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->patchExpiringUserTargetsForSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |
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
patchSegment($project_key, $environment_key, $segment_key, $patch_with_comment): \LaunchDarklyApi\Model\UserSegment
```

Patch segment

Update a user segment. The request body must be a valid semantic patch, JSON patch, or JSON merge patch.  ### Using semantic patches on a segment  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](/reference#updates-using-semantic-patch).  The body of a semantic patch request for updating segments requires an `environmentKey` in addition to `instructions` and an optional `comment`. The body of the request takes the following properties:  * `comment` (string): (Optional) A description of the update. * `environmentKey` (string): (Required) The key of the LaunchDarkly environment. * `instructions` (array): (Required) A list of actions the update should perform. Each action in the list must be an object with a `kind` property that indicates the instruction. If the action requires parameters, you must include those parameters as additional fields in the object.  ### Instructions  Semantic patch requests support the following `kind` instructions for updating segments.  #### addIncludedUsers  Adds user keys to the individual user targets included in the segment. Returns an error if this causes the same user key to be both included and excluded.  ##### Parameters  - `values`: List of user keys.  #### addExcludedUsers  Adds user keys to the individual user targets excluded from the segment. Returns an error if this causes the same user key to be both included and excluded.  ##### Parameters  - `values`: List of user keys.  #### removeIncludedUsers  Removes user keys from the individual user targets included in the segment.  ##### Parameters  - `values`: List of user keys.  #### removeExcludedUsers  Removes user keys from the individual user targets excluded from the segment.  ##### Parameters  - `values`: List of user keys.  #### updateName  Updates the name of the segment.  ##### Parameters  - `value`: Name of the segment.  ## Using JSON patches on a segment  You can also use JSON patch. To learn more, read [Updates using JSON patches](/reference#updates-using-json-patch).  For example, to update the description for a segment, use the following request body:  ```json {   \"patch\": [     {       \"op\": \"replace\",       \"path\": \"/description\",       \"value\": \"new description\"     }   ] } ```  To update fields in the segment that are arrays, set the `path` to the name of the field and then append `/<array index>`. Using `/0` adds the new entry to the beginning of the array.  For example, to add a rule to a segment, use the following request body:  ```json {   \"patch\":[     {       \"op\": \"add\",       \"path\": \"/rules/0\",       \"value\": {         \"clauses\": [{ \"attribute\": \"email\", \"op\": \"endsWith\", \"values\": [\".edu\"], \"negate\": false }]       }     }   ] } ```  To add or remove users from segments, we recommend using semantic patch. Semantic patch for segments includes specific `instructions` for adding and removing both included and excluded users.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key
$patch_with_comment = {"patch":[{"op":"replace","path":"/description","value":"New description for this segment"},{"op":"add","path":"/tags/0","value":"example"}]}; // \LaunchDarklyApi\Model\PatchWithComment

try {
    $result = $apiInstance->patchSegment($project_key, $environment_key, $segment_key, $patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->patchSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |
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
postSegment($project_key, $environment_key, $segment_body): \LaunchDarklyApi\Model\UserSegment
```

Create segment

Create a new user segment.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_body = new \LaunchDarklyApi\Model\SegmentBody(); // \LaunchDarklyApi\Model\SegmentBody

try {
    $result = $apiInstance->postSegment($project_key, $environment_key, $segment_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->postSegment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
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
updateBigSegmentTargets($project_key, $environment_key, $segment_key, $segment_user_state)
```

Update targets on a Big Segment

Update targets included or excluded in a Big Segment.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key
$segment_user_state = new \LaunchDarklyApi\Model\SegmentUserState(); // \LaunchDarklyApi\Model\SegmentUserState

try {
    $apiInstance->updateBigSegmentTargets($project_key, $environment_key, $segment_key, $segment_user_state);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->updateBigSegmentTargets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |
 **segment_user_state** | [**\LaunchDarklyApi\Model\SegmentUserState**](../Model/SegmentUserState.md)|  |

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
