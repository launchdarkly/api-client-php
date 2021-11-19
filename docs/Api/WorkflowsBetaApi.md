# LaunchDarklyApi\WorkflowsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteWorkflow()**](WorkflowsBetaApi.md#deleteWorkflow) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Delete workflow
[**getWorkflows()**](WorkflowsBetaApi.md#getWorkflows) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Get workflows
[**postWorkflow()**](WorkflowsBetaApi.md#postWorkflow) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Create workflow


## `deleteWorkflow()`

```php
deleteWorkflow($project_key, $feature_flag_key, $environment_key, $workflow_id)
```

Delete workflow

Delete a workflow from a feature flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\WorkflowsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$workflow_id = 'workflow_id_example'; // string | The workflow id

try {
    $apiInstance->deleteWorkflow($project_key, $feature_flag_key, $environment_key, $workflow_id);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowsBetaApi->deleteWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **workflow_id** | **string**| The workflow id |

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

## `getWorkflows()`

```php
getWorkflows($project_key, $feature_flag_key, $environment_key): \LaunchDarklyApi\Model\CustomWorkflowsListingOutputRep
```

Get workflows

Get workflows from a feature flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\WorkflowsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key

try {
    $result = $apiInstance->getWorkflows($project_key, $feature_flag_key, $environment_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowsBetaApi->getWorkflows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\CustomWorkflowsListingOutputRep**](../Model/CustomWorkflowsListingOutputRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postWorkflow()`

```php
postWorkflow($project_key, $feature_flag_key, $environment_key, $custom_workflow_input_rep): \LaunchDarklyApi\Model\CustomWorkflowOutputRep
```

Create workflow

Create a workflow for a feature flag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\WorkflowsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag's key
$environment_key = 'environment_key_example'; // string | The environment key
$custom_workflow_input_rep = new \LaunchDarklyApi\Model\CustomWorkflowInputRep(); // \LaunchDarklyApi\Model\CustomWorkflowInputRep

try {
    $result = $apiInstance->postWorkflow($project_key, $feature_flag_key, $environment_key, $custom_workflow_input_rep);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowsBetaApi->postWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag&#39;s key |
 **environment_key** | **string**| The environment key |
 **custom_workflow_input_rep** | [**\LaunchDarklyApi\Model\CustomWorkflowInputRep**](../Model/CustomWorkflowInputRep.md)|  |

### Return type

[**\LaunchDarklyApi\Model\CustomWorkflowOutputRep**](../Model/CustomWorkflowOutputRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
