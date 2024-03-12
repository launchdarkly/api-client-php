# LaunchDarklyApi\ReleasesBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getReleaseByFlagKey()**](ReleasesBetaApi.md#getReleaseByFlagKey) | **GET** /api/v2/flags/{projectKey}/{flagKey}/release | Get release for flag
[**patchReleaseByFlagKey()**](ReleasesBetaApi.md#patchReleaseByFlagKey) | **PATCH** /api/v2/flags/{projectKey}/{flagKey}/release | Patch release for flag


## `getReleaseByFlagKey()`

```php
getReleaseByFlagKey($project_key, $flag_key): \LaunchDarklyApi\Model\Release
```

Get release for flag

Get currently active release for a flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$flag_key = 'flag_key_example'; // string | The flag key

try {
    $result = $apiInstance->getReleaseByFlagKey($project_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasesBetaApi->getReleaseByFlagKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |

### Return type

[**\LaunchDarklyApi\Model\Release**](../Model/Release.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchReleaseByFlagKey()`

```php
patchReleaseByFlagKey($project_key, $flag_key, $patch_operation): \LaunchDarklyApi\Model\Release
```

Patch release for flag

Update currently active release for a flag. Updating releases requires the [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) format. To learn more, read [Updates](/#section/Overview/Updates).  You can only use this endpoint to mark a release phase complete or incomplete. To indicate which phase to update, use the array index in the `path`. For example, to mark the first phase of a release as complete, use the following request body:  ```   [     {       \"op\": \"replace\",       \"path\": \"/phase/0/complete\",       \"value\": true     }   ] ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$flag_key = 'flag_key_example'; // string | The flag key
$patch_operation = [{"op":"replace","path":"/phases/0/complete","value":true}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchReleaseByFlagKey($project_key, $flag_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasesBetaApi->patchReleaseByFlagKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Release**](../Model/Release.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
