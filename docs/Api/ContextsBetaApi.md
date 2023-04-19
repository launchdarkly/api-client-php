# LaunchDarklyApi\ContextsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getContextKindsByProjectKey()**](ContextsBetaApi.md#getContextKindsByProjectKey) | **GET** /api/v2/projects/{projectKey}/context-kinds | Get context kinds
[**putContextKind()**](ContextsBetaApi.md#putContextKind) | **PUT** /api/v2/projects/{projectKey}/context-kinds/{key} | Create or update context kind


## `getContextKindsByProjectKey()`

```php
getContextKindsByProjectKey($project_key): \LaunchDarklyApi\Model\ContextKindsCollectionRep
```

Get context kinds

Get all context kinds for a given project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key

try {
    $result = $apiInstance->getContextKindsByProjectKey($project_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsBetaApi->getContextKindsByProjectKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |

### Return type

[**\LaunchDarklyApi\Model\ContextKindsCollectionRep**](../Model/ContextKindsCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putContextKind()`

```php
putContextKind($project_key, $key, $upsert_context_kind_payload): \LaunchDarklyApi\Model\UpsertResponseRep
```

Create or update context kind

Create or update a context kind by key. Only the included fields will be updated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ContextsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$key = 'key_example'; // string | The context kind key
$upsert_context_kind_payload = new \LaunchDarklyApi\Model\UpsertContextKindPayload(); // \LaunchDarklyApi\Model\UpsertContextKindPayload

try {
    $result = $apiInstance->putContextKind($project_key, $key, $upsert_context_kind_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContextsBetaApi->putContextKind: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **key** | **string**| The context kind key |
 **upsert_context_kind_payload** | [**\LaunchDarklyApi\Model\UpsertContextKindPayload**](../Model/UpsertContextKindPayload.md)|  |

### Return type

[**\LaunchDarklyApi\Model\UpsertResponseRep**](../Model/UpsertResponseRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
