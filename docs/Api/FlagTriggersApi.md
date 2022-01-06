# LaunchDarklyApi\FlagTriggersApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTriggerWorkflow()**](FlagTriggersApi.md#createTriggerWorkflow) | **POST** /api/v2/flags/{projKey}/{flagKey}/triggers/{envKey} | Create flag trigger
[**deleteTriggerWorkflow()**](FlagTriggersApi.md#deleteTriggerWorkflow) | **DELETE** /api/v2/flags/{projKey}/{flagKey}/triggers/{envKey}/{id} | Delete flag trigger
[**getTriggerWorkflowById()**](FlagTriggersApi.md#getTriggerWorkflowById) | **GET** /api/v2/flags/{projKey}/{flagKey}/triggers/{envKey}/{id} | Get flag trigger by ID
[**getTriggerWorkflows()**](FlagTriggersApi.md#getTriggerWorkflows) | **GET** /api/v2/flags/{projKey}/{flagKey}/triggers/{envKey} | List flag triggers
[**patchTriggerWorkflow()**](FlagTriggersApi.md#patchTriggerWorkflow) | **PATCH** /api/v2/flags/{projKey}/{flagKey}/triggers/{envKey}/{id} | Update flag trigger


## `createTriggerWorkflow()`

```php
createTriggerWorkflow($proj_key, $env_key, $flag_key, $trigger_post): \LaunchDarklyApi\Model\TriggerWorkflowRep
```

Create flag trigger

Create a new flag trigger. Triggers let you initiate changes to flag targeting remotely using a unique webhook URL.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagTriggersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$flag_key = 'flag_key_example'; // string | The flag key
$trigger_post = new \LaunchDarklyApi\Model\TriggerPost(); // \LaunchDarklyApi\Model\TriggerPost

try {
    $result = $apiInstance->createTriggerWorkflow($proj_key, $env_key, $flag_key, $trigger_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->createTriggerWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **flag_key** | **string**| The flag key |
 **trigger_post** | [**\LaunchDarklyApi\Model\TriggerPost**](../Model/TriggerPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\TriggerWorkflowRep**](../Model/TriggerWorkflowRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTriggerWorkflow()`

```php
deleteTriggerWorkflow($proj_key, $env_key, $flag_key, $id)
```

Delete flag trigger

Delete a flag trigger by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagTriggersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$flag_key = 'flag_key_example'; // string | The flag key
$id = 'id_example'; // string | The flag trigger ID

try {
    $apiInstance->deleteTriggerWorkflow($proj_key, $env_key, $flag_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->deleteTriggerWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **flag_key** | **string**| The flag key |
 **id** | **string**| The flag trigger ID |

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

## `getTriggerWorkflowById()`

```php
getTriggerWorkflowById($proj_key, $flag_key, $env_key, $id): \LaunchDarklyApi\Model\TriggerWorkflowRep
```

Get flag trigger by ID

Get a flag trigger by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagTriggersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$flag_key = 'flag_key_example'; // string | The flag key
$env_key = 'env_key_example'; // string | The environment key
$id = 'id_example'; // string | The flag trigger ID

try {
    $result = $apiInstance->getTriggerWorkflowById($proj_key, $flag_key, $env_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->getTriggerWorkflowById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **flag_key** | **string**| The flag key |
 **env_key** | **string**| The environment key |
 **id** | **string**| The flag trigger ID |

### Return type

[**\LaunchDarklyApi\Model\TriggerWorkflowRep**](../Model/TriggerWorkflowRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTriggerWorkflows()`

```php
getTriggerWorkflows($proj_key, $env_key, $flag_key): \LaunchDarklyApi\Model\TriggerWorkflowCollectionRep
```

List flag triggers

Get a list of all flag triggers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagTriggersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$flag_key = 'flag_key_example'; // string | The flag key

try {
    $result = $apiInstance->getTriggerWorkflows($proj_key, $env_key, $flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->getTriggerWorkflows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **flag_key** | **string**| The flag key |

### Return type

[**\LaunchDarklyApi\Model\TriggerWorkflowCollectionRep**](../Model/TriggerWorkflowCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchTriggerWorkflow()`

```php
patchTriggerWorkflow($proj_key, $env_key, $flag_key, $id, $flag_trigger_input): \LaunchDarklyApi\Model\TriggerWorkflowRep
```

Update flag trigger

Update a flag trigger. The request body must be a valid JSON patch or JSON merge patch document. To learn more, read [Updates](/#section/Overview/Updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\FlagTriggersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$flag_key = 'flag_key_example'; // string | The flag key
$id = 'id_example'; // string | The flag trigger ID
$flag_trigger_input = new \LaunchDarklyApi\Model\FlagTriggerInput(); // \LaunchDarklyApi\Model\FlagTriggerInput

try {
    $result = $apiInstance->patchTriggerWorkflow($proj_key, $env_key, $flag_key, $id, $flag_trigger_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->patchTriggerWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **flag_key** | **string**| The flag key |
 **id** | **string**| The flag trigger ID |
 **flag_trigger_input** | [**\LaunchDarklyApi\Model\FlagTriggerInput**](../Model/FlagTriggerInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\TriggerWorkflowRep**](../Model/TriggerWorkflowRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
