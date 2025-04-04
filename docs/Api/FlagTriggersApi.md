# LaunchDarklyApi\FlagTriggersApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTriggerWorkflow()**](FlagTriggersApi.md#createTriggerWorkflow) | **POST** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey} | Create flag trigger
[**deleteTriggerWorkflow()**](FlagTriggersApi.md#deleteTriggerWorkflow) | **DELETE** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Delete flag trigger
[**getTriggerWorkflowById()**](FlagTriggersApi.md#getTriggerWorkflowById) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Get flag trigger by ID
[**getTriggerWorkflows()**](FlagTriggersApi.md#getTriggerWorkflows) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey} | List flag triggers
[**patchTriggerWorkflow()**](FlagTriggersApi.md#patchTriggerWorkflow) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Update flag trigger


## `createTriggerWorkflow()`

```php
createTriggerWorkflow($project_key, $environment_key, $feature_flag_key, $trigger_post): \LaunchDarklyApi\Model\TriggerWorkflowRep
```

Create flag trigger

Create a new flag trigger.

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$trigger_post = new \LaunchDarklyApi\Model\TriggerPost(); // \LaunchDarklyApi\Model\TriggerPost

try {
    $result = $apiInstance->createTriggerWorkflow($project_key, $environment_key, $feature_flag_key, $trigger_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->createTriggerWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |
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
deleteTriggerWorkflow($project_key, $environment_key, $feature_flag_key, $id)
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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$id = 'id_example'; // string | The flag trigger ID

try {
    $apiInstance->deleteTriggerWorkflow($project_key, $environment_key, $feature_flag_key, $id);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->deleteTriggerWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |
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
getTriggerWorkflowById($project_key, $feature_flag_key, $environment_key, $id): \LaunchDarklyApi\Model\TriggerWorkflowRep
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
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$id = 'id_example'; // string | The flag trigger ID

try {
    $result = $apiInstance->getTriggerWorkflowById($project_key, $feature_flag_key, $environment_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->getTriggerWorkflowById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |
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
getTriggerWorkflows($project_key, $environment_key, $feature_flag_key): \LaunchDarklyApi\Model\TriggerWorkflowCollectionRep
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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key

try {
    $result = $apiInstance->getTriggerWorkflows($project_key, $environment_key, $feature_flag_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->getTriggerWorkflows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |

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
patchTriggerWorkflow($project_key, $environment_key, $feature_flag_key, $id, $flag_trigger_input): \LaunchDarklyApi\Model\TriggerWorkflowRep
```

Update flag trigger

Update a flag trigger. Updating a flag trigger uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating flag triggers.  <details> <summary>Click to expand instructions for <strong>updating flag triggers</strong></summary>  #### replaceTriggerActionInstructions  Removes the existing trigger action and replaces it with the new instructions.  ##### Parameters  - `value`: An array of the new `kind`s of actions to perform when triggering. Supported flag actions are `turnFlagOn` and `turnFlagOff`.  Here's an example that replaces the existing action with new instructions to turn flag targeting off:  ```json {   \"instructions\": [     {       \"kind\": \"replaceTriggerActionInstructions\",       \"value\": [ {\"kind\": \"turnFlagOff\"} ]     }   ] } ```  #### cycleTriggerUrl  Generates a new URL for this trigger. You must update any clients using the trigger to use this new URL.  Here's an example:  ```json {   \"instructions\": [{ \"kind\": \"cycleTriggerUrl\" }] } ```  #### disableTrigger  Disables the trigger. This saves the trigger configuration, but the trigger stops running. To re-enable, use `enableTrigger`.  Here's an example:  ```json {   \"instructions\": [{ \"kind\": \"disableTrigger\" }] } ```  #### enableTrigger  Enables the trigger. If you previously disabled the trigger, it begins running again.  Here's an example:  ```json {   \"instructions\": [{ \"kind\": \"enableTrigger\" }] } ```  </details>

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
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$id = 'id_example'; // string | The flag trigger ID
$flag_trigger_input = new \LaunchDarklyApi\Model\FlagTriggerInput(); // \LaunchDarklyApi\Model\FlagTriggerInput

try {
    $result = $apiInstance->patchTriggerWorkflow($project_key, $environment_key, $feature_flag_key, $id, $flag_trigger_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagTriggersApi->patchTriggerWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **feature_flag_key** | **string**| The feature flag key |
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
