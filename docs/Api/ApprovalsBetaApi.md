# LaunchDarklyApi\ApprovalsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**patchApprovalRequest()**](ApprovalsBetaApi.md#patchApprovalRequest) | **PATCH** /api/v2/approval-requests/{id} | Update approval request
[**patchFlagConfigApprovalRequest()**](ApprovalsBetaApi.md#patchFlagConfigApprovalRequest) | **PATCH** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Update flag approval request


## `patchApprovalRequest()`

```php
patchApprovalRequest($id): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Update approval request

Perform a partial update to an approval request. Updating an approval request uses the semantic patch format. This endpoint works with approval requests for either flag or segment changes.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instruction for updating an approval request.  #### addReviewers  Adds the specified members and teams to the existing list of reviewers. You must include at least one of `notifyMemberIds` and `notifyTeamKeys`.  ##### Parameters  - `notifyMemberIds`: (Optional) List of member IDs. - `notifyTeamKeys`: (Optional) List of team keys.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"addReviewers\",     \"notifyMemberIds\": [ \"user-key-123abc\", \"user-key-456def\" ],     \"notifyTeamKeys\": [ \"team-key-789abc\"]   }] } ```

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
$id = 'id_example'; // string | The approval ID

try {
    $result = $apiInstance->patchApprovalRequest($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsBetaApi->patchApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The approval ID |

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

## `patchFlagConfigApprovalRequest()`

```php
patchFlagConfigApprovalRequest($project_key, $feature_flag_key, $environment_key, $id): \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse
```

Update flag approval request

Perform a partial update to an approval request. Updating an approval request uses the semantic patch format. This endpoint requires a feature flag key, and can only be used for updating approval requests for flags.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instruction for updating an approval request.  #### addReviewers  Adds the specified members and teams to the existing list of reviewers. You must include at least one of `notifyMemberIds` and `notifyTeamKeys`.  ##### Parameters  - `notifyMemberIds`: (Optional) List of member IDs. - `notifyTeamKeys`: (Optional) List of team keys.

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
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The approval ID

try {
    $result = $apiInstance->patchFlagConfigApprovalRequest($project_key, $feature_flag_key, $environment_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApprovalsBetaApi->patchFlagConfigApprovalRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |
 **id** | **string**| The approval ID |

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
