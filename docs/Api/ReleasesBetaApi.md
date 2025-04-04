# LaunchDarklyApi\ReleasesBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createReleaseForFlag()**](ReleasesBetaApi.md#createReleaseForFlag) | **PUT** /api/v2/projects/{projectKey}/flags/{flagKey}/release | Create a new release for flag
[**deleteReleaseByFlagKey()**](ReleasesBetaApi.md#deleteReleaseByFlagKey) | **DELETE** /api/v2/flags/{projectKey}/{flagKey}/release | Delete a release for flag
[**getReleaseByFlagKey()**](ReleasesBetaApi.md#getReleaseByFlagKey) | **GET** /api/v2/flags/{projectKey}/{flagKey}/release | Get release for flag
[**patchReleaseByFlagKey()**](ReleasesBetaApi.md#patchReleaseByFlagKey) | **PATCH** /api/v2/flags/{projectKey}/{flagKey}/release | Patch release for flag
[**updatePhaseStatus()**](ReleasesBetaApi.md#updatePhaseStatus) | **PUT** /api/v2/projects/{projectKey}/flags/{flagKey}/release/phases/{phaseId} | Update phase status for release


## `createReleaseForFlag()`

```php
createReleaseForFlag($project_key, $flag_key, $create_release_input): \LaunchDarklyApi\Model\Release
```

Create a new release for flag

Creates a release by adding a flag to a release pipeline

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
$create_release_input = new \LaunchDarklyApi\Model\CreateReleaseInput(); // \LaunchDarklyApi\Model\CreateReleaseInput

try {
    $result = $apiInstance->createReleaseForFlag($project_key, $flag_key, $create_release_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasesBetaApi->createReleaseForFlag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |
 **create_release_input** | [**\LaunchDarklyApi\Model\CreateReleaseInput**](../Model/CreateReleaseInput.md)|  |

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

## `deleteReleaseByFlagKey()`

```php
deleteReleaseByFlagKey($project_key, $flag_key)
```

Delete a release for flag

Deletes a release from a flag

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
    $apiInstance->deleteReleaseByFlagKey($project_key, $flag_key);
} catch (Exception $e) {
    echo 'Exception when calling ReleasesBetaApi->deleteReleaseByFlagKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |

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

This endpoint is only available for releases that are part of a legacy release pipeline. Releases for new release pipelines should use the [Update phase status for release](https://launchdarkly.com/docs/api/releases-beta/update-phase-status) endpoint. To learn more about migrating from legacy release pipelines to fully automated release pipelines, read the [Release pipeline migration guide](https://launchdarkly.com/docs/guides/flags/release-pipeline-migration).  Update currently active release for a flag. Updating releases requires the [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) format. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).  You can only use this endpoint to mark a release phase complete or incomplete. To indicate which phase to update, use the array index in the `path`. For example, to mark the first phase of a release as complete, use the following request body:  ```   [     {       \"op\": \"replace\",       \"path\": \"/phase/0/complete\",       \"value\": true     }   ] ```

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

## `updatePhaseStatus()`

```php
updatePhaseStatus($project_key, $flag_key, $phase_id, $update_phase_status_input): \LaunchDarklyApi\Model\Release
```

Update phase status for release

Updates the execution status of a phase of a release

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
$phase_id = 'phase_id_example'; // string | The phase ID
$update_phase_status_input = new \LaunchDarklyApi\Model\UpdatePhaseStatusInput(); // \LaunchDarklyApi\Model\UpdatePhaseStatusInput

try {
    $result = $apiInstance->updatePhaseStatus($project_key, $flag_key, $phase_id, $update_phase_status_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasesBetaApi->updatePhaseStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |
 **phase_id** | **string**| The phase ID |
 **update_phase_status_input** | [**\LaunchDarklyApi\Model\UpdatePhaseStatusInput**](../Model/UpdatePhaseStatusInput.md)|  |

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
