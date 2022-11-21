# LaunchDarklyApi\WorkflowsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteWorkflow()**](WorkflowsBetaApi.md#deleteWorkflow) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Delete workflow
[**getCustomWorkflow()**](WorkflowsBetaApi.md#getCustomWorkflow) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Get custom workflow
[**getWorkflows()**](WorkflowsBetaApi.md#getWorkflows) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Get workflows
[**postWorkflow()**](WorkflowsBetaApi.md#postWorkflow) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Create workflow


## `deleteWorkflow()`

```php
deleteWorkflow($project_key, $feature_flag_key, $environment_key, $workflow_id)
```

Delete workflow

Delete a workflow from a feature flag.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
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
 **feature_flag_key** | **string**| The feature flag key |
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

## `getCustomWorkflow()`

```php
getCustomWorkflow($project_key, $feature_flag_key, $environment_key, $workflow_id): \LaunchDarklyApi\Model\CustomWorkflowOutput
```

Get custom workflow

Get a specific workflow by ID.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$workflow_id = 'workflow_id_example'; // string | The workflow ID

try {
    $result = $apiInstance->getCustomWorkflow($project_key, $feature_flag_key, $environment_key, $workflow_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowsBetaApi->getCustomWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |
 **workflow_id** | **string**| The workflow ID |

### Return type

[**\LaunchDarklyApi\Model\CustomWorkflowOutput**](../Model/CustomWorkflowOutput.md)

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
getWorkflows($project_key, $feature_flag_key, $environment_key): \LaunchDarklyApi\Model\CustomWorkflowsListingOutput
```

Get workflows

Display workflows associated with a feature flag.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
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
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |

### Return type

[**\LaunchDarklyApi\Model\CustomWorkflowsListingOutput**](../Model/CustomWorkflowsListingOutput.md)

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
postWorkflow($project_key, $feature_flag_key, $environment_key, $custom_workflow_input, $template_key): \LaunchDarklyApi\Model\CustomWorkflowOutput
```

Create workflow

Create a workflow for a feature flag. You can create a workflow directly, or you can apply a template to create a new workflow.  ### Creating a workflow  You can use the create workflow endpoint to create a workflow directly by adding a `stages` array to the request body.  _Example request body_ ```json {   \"name\": \"Progressive rollout starting in two days\",   \"description\": \"Turn flag on for 10% of users each day\",   \"stages\": [     {       \"name\": \"10% rollout on day 1\",       \"conditions\": [         {           \"kind\": \"schedule\",           \"scheduleKind\": \"relative\",           \"waitDuration\": 2,           \"waitDurationUnit\": \"calendarDay\"         }       ],       \"action\": {         \"instructions\": [           {             \"kind\": \"turnFlagOn\"           },           {             \"kind\": \"updateFallthroughVariationOrRollout\",             \"rolloutWeights\": {               \"452f5fb5-7320-4ba3-81a1-8f4324f79d49\": 90000,               \"fc15f6a4-05d3-4aa4-a997-446be461345d\": 10000             }           }         ]       }     }   ] } ```  ### Creating a workflow by applying a workflow template  You can also create a workflow by applying a workflow template. If you pass a valid workflow template key as the `templateKey` query parameter with the request, the API will attempt to create a new workflow with the stages defined in the workflow template with the corresponding key.  #### Applicability of stages Templates are created in the context of a particular flag in a particular environment in a particular project. However, because workflows created from a template can be applied to any project, environment, and flag, some steps of the workflow may need to be updated in order to be applicable for the target resource.  You can pass a `dry-run` query parameter to tell the API to return a report of which steps of the workflow template are applicable in the target project/environment/flag, and which will need to be updated. When the `dry-run` query parameter is present the response body includes a `meta` property that holds a list of parameters that could potentially be inapplicable for the target resource. Each of these parameters will include a `valid` field. You will need to update any invalid parameters in order to create the new workflow. You can do this using the `parameters` property, which overrides the workflow template parameters.  #### Overriding template parameters You can use the `parameters` property in the request body to tell the API to override the specified workflow template parameters with new values that are specific to your target project/environment/flag.  _Example request body_ ```json {  \"name\": \"workflow created from my-template\",  \"description\": \"description of my workflow\",  \"parameters\": [   {    \"_id\": \"62cf2bc4cadbeb7697943f3b\",    \"path\": \"/clauses/0/values\",    \"default\": {     \"value\": [\"updated-segment\"]    }   },   {    \"_id\": \"62cf2bc4cadbeb7697943f3d\",    \"path\": \"/variationId\",    \"default\": {     \"value\": \"abcd1234-abcd-1234-abcd-1234abcd12\"    }   }  ] } ```  If there are any steps in the template that are not applicable to the target resource, the workflow will not be created, and the `meta` property will be included in the response body detailing which parameters need to be updated.

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
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$custom_workflow_input = {"description":"Turn flag on for 10% of users each day","name":"Progressive rollout starting in two days","stages":[{"action":{"instructions":[{"kind":"turnFlagOn"},{"kind":"updateFallthroughVariationOrRollout","rolloutWeights":{"452f5fb5-7320-4ba3-81a1-8f4324f79d49":90000,"fc15f6a4-05d3-4aa4-a997-446be461345d":10000}}]},"conditions":[{"kind":"schedule","scheduleKind":"relative","waitDuration":2,"waitDurationUnit":"calendarDay"}],"name":"10% rollout on day 1"}]}; // \LaunchDarklyApi\Model\CustomWorkflowInput
$template_key = 'template_key_example'; // string | The template key to apply as a starting point for the new workflow

try {
    $result = $apiInstance->postWorkflow($project_key, $feature_flag_key, $environment_key, $custom_workflow_input, $template_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowsBetaApi->postWorkflow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |
 **custom_workflow_input** | [**\LaunchDarklyApi\Model\CustomWorkflowInput**](../Model/CustomWorkflowInput.md)|  |
 **template_key** | **string**| The template key to apply as a starting point for the new workflow | [optional]

### Return type

[**\LaunchDarklyApi\Model\CustomWorkflowOutput**](../Model/CustomWorkflowOutput.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
