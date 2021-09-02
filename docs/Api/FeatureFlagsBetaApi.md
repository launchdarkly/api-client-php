# LaunchDarklyApi\FeatureFlagsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDependentFlags()**](FeatureFlagsBetaApi.md#getDependentFlags) | **GET** /api/v2/flags/{projKey}/{flagKey}/dependent-flags | List dependent feature flags
[**getDependentFlagsByEnv()**](FeatureFlagsBetaApi.md#getDependentFlagsByEnv) | **GET** /api/v2/flags/{projKey}/{envKey}/{flagKey}/dependent-flags | List dependent feature flags by environment


## `getDependentFlags()`

```php
getDependentFlags($proj_key, $flag_key): \LaunchDarklyApi\Model\MultiEnvironmentDependentFlags
```

List dependent feature flags

List dependent flags across all environments for the flag specified in the path parameters. A dependent flag is a flag that uses another flag as a prerequisite.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$flag_key = 'flag_key_example'; // string | The flag key

try {
    $result = $apiInstance->getDependentFlags($proj_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsBetaApi->getDependentFlags: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |

### Return type

[**\LaunchDarklyApi\Model\MultiEnvironmentDependentFlags**](../Model/MultiEnvironmentDependentFlags.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDependentFlagsByEnv()`

```php
getDependentFlagsByEnv($proj_key, $env_key, $flag_key): \LaunchDarklyApi\Model\DependentFlagsByEnvironment
```

List dependent feature flags by environment

List dependent flags across all environments for the flag specified in the path parameters. A dependent flag is a flag that uses another flag as a prerequisite.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FeatureFlagsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$flag_key = 'flag_key_example'; // string | The flag key

try {
    $result = $apiInstance->getDependentFlagsByEnv($proj_key, $env_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FeatureFlagsBetaApi->getDependentFlagsByEnv: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **flag_key** | **string**| The flag key |

### Return type

[**\LaunchDarklyApi\Model\DependentFlagsByEnvironment**](../Model/DependentFlagsByEnvironment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
