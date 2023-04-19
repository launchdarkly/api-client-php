# LaunchDarklyApi\ContextSettingsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**putContextFlagSetting()**](ContextSettingsApi.md#putContextFlagSetting) | **PUT** /api/v2/projects/{projectKey}/environments/{environmentKey}/contexts/{contextKind}/{contextKey}/flags/{featureFlagKey} | Update flag settings for context


## `putContextFlagSetting()`

```php
putContextFlagSetting($project_key, $environment_key, $context_kind, $context_key, $feature_flag_key, $value_put)
```

Update flag settings for context

Enable or disable a feature flag for a context based on its context kind and key.  Omitting the `setting` attribute from the request body, or including a `setting` of `null`, erases the current setting for a context.  If you previously patched the flag, and the patch included the context's data, LaunchDarkly continues to use that data. If LaunchDarkly has never encountered the combination of the context's key and kind before, it calculates the flag values based on the context kind and key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$context_kind = 'context_kind_example'; // string | The context kind
$context_key = 'context_key_example'; // string | The context key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$value_put = new \LaunchDarklyApi\Model\ValuePut(); // \LaunchDarklyApi\Model\ValuePut

try {
    $apiInstance->putContextFlagSetting($project_key, $environment_key, $context_kind, $context_key, $feature_flag_key, $value_put);
} catch (Exception $e) {
    echo 'Exception when calling ContextSettingsApi->putContextFlagSetting: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **context_kind** | **string**| The context kind |
 **context_key** | **string**| The context key |
 **feature_flag_key** | **string**| The feature flag key |
 **value_put** | [**\LaunchDarklyApi\Model\ValuePut**](../Model/ValuePut.md)|  |

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
