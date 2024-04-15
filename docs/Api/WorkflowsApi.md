# LaunchDarklyApi\WorkflowsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteWorkflow()**](WorkflowsApi.md#deleteWorkflow) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Delete workflow
[**getCustomWorkflow()**](WorkflowsApi.md#getCustomWorkflow) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Get custom workflow
[**getWorkflows()**](WorkflowsApi.md#getWorkflows) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Get workflows
[**postWorkflow()**](WorkflowsApi.md#postWorkflow) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Create workflow


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


$apiInstance = new LaunchDarklyApi\Api\WorkflowsApi(
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
    echo 'Exception when calling WorkflowsApi->deleteWorkflow: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new LaunchDarklyApi\Api\WorkflowsApi(
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
    echo 'Exception when calling WorkflowsApi->getCustomWorkflow: ', $e->getMessage(), PHP_EOL;
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
getWorkflows($project_key, $feature_flag_key, $environment_key, $status, $sort, $limit, $offset): \LaunchDarklyApi\Model\CustomWorkflowsListingOutput
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


$apiInstance = new LaunchDarklyApi\Api\WorkflowsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$status = 'status_example'; // string | Filter results by workflow status. Valid status filters are `active`, `completed`, and `failed`.
$sort = 'sort_example'; // string | A field to sort the items by. Prefix field by a dash ( - ) to sort in descending order. This endpoint supports sorting by `creationDate` or `stopDate`.
$limit = 56; // int | The maximum number of workflows to return. Defaults to 20.
$offset = 56; // int | Where to start in the list. Defaults to 0. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getWorkflows($project_key, $feature_flag_key, $environment_key, $status, $sort, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowsApi->getWorkflows: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **feature_flag_key** | **string**| The feature flag key |
 **environment_key** | **string**| The environment key |
 **status** | **string**| Filter results by workflow status. Valid status filters are &#x60;active&#x60;, &#x60;completed&#x60;, and &#x60;failed&#x60;. | [optional]
 **sort** | **string**| A field to sort the items by. Prefix field by a dash ( - ) to sort in descending order. This endpoint supports sorting by &#x60;creationDate&#x60; or &#x60;stopDate&#x60;. | [optional]
 **limit** | **int**| The maximum number of workflows to return. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. Defaults to 0. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

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
postWorkflow($project_key, $feature_flag_key, $environment_key, $custom_workflow_input, $template_key, $dry_run): \LaunchDarklyApi\Model\CustomWorkflowOutput
```

Create workflow

Create a workflow for a feature flag. You can create a workflow directly, or you can apply a template to create a new workflow.  ### Creating a workflow  You can use the create workflow endpoint to create a workflow directly by adding a `stages` array to the request body.  For each stage, define the `name`, `conditions` when the stage should be executed, and `action` that describes the stage.  <details> <summary>Click to expand example</summary>  _Example request body_ ```json {   \"name\": \"Progressive rollout starting in two days\",   \"description\": \"Turn flag targeting on and increase feature rollout in 10% increments each day\",   \"stages\": [     {       \"name\": \"10% rollout on day 1\",       \"conditions\": [         {           \"kind\": \"schedule\",           \"scheduleKind\": \"relative\", // or \"absolute\"               //  If \"scheduleKind\" is \"absolute\", set \"executionDate\";               // \"waitDuration\" and \"waitDurationUnit\" will be ignored           \"waitDuration\": 2,           \"waitDurationUnit\": \"calendarDay\"         },         {           \"kind\": \"ld-approval\",           \"notifyMemberIds\": [ \"507f1f77bcf86cd799439011\" ],           \"notifyTeamKeys\": [ \"team-key-123abc\" ]         }       ],       \"action\": {         \"instructions\": [           {             \"kind\": \"turnFlagOn\"           },           {             \"kind\": \"updateFallthroughVariationOrRollout\",             \"rolloutWeights\": {               \"452f5fb5-7320-4ba3-81a1-8f4324f79d49\": 90000,               \"fc15f6a4-05d3-4aa4-a997-446be461345d\": 10000             }           }         ]       }     }   ] } ``` </details>  ### Creating a workflow by applying a workflow template  You can also create a workflow by applying a workflow template. If you pass a valid workflow template key as the `templateKey` query parameter with the request, the API will attempt to create a new workflow with the stages defined in the workflow template with the corresponding key.  #### Applicability of stages Templates are created in the context of a particular flag in a particular environment in a particular project. However, because workflows created from a template can be applied to any project, environment, and flag, some steps of the workflow may need to be updated in order to be applicable for the target resource.  You can pass a `dryRun` query parameter to tell the API to return a report of which steps of the workflow template are applicable in the target project/environment/flag, and which will need to be updated. When the `dryRun` query parameter is present the response body includes a `meta` property that holds a list of parameters that could potentially be inapplicable for the target resource. Each of these parameters will include a `valid` field. You will need to update any invalid parameters in order to create the new workflow. You can do this using the `parameters` property, which overrides the workflow template parameters.  #### Overriding template parameters You can use the `parameters` property in the request body to tell the API to override the specified workflow template parameters with new values that are specific to your target project/environment/flag.  <details> <summary>Click to expand example</summary>  _Example request body_ ```json {  \"name\": \"workflow created from my-template\",  \"description\": \"description of my workflow\",  \"parameters\": [   {    \"_id\": \"62cf2bc4cadbeb7697943f3b\",    \"path\": \"/clauses/0/values\",    \"default\": {     \"value\": [\"updated-segment\"]    }   },   {    \"_id\": \"62cf2bc4cadbeb7697943f3d\",    \"path\": \"/variationId\",    \"default\": {     \"value\": \"abcd1234-abcd-1234-abcd-1234abcd12\"    }   }  ] } ``` </details>  If there are any steps in the template that are not applicable to the target resource, the workflow will not be created, and the `meta` property will be included in the response body detailing which parameters need to be updated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\WorkflowsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$feature_flag_key = 'feature_flag_key_example'; // string | The feature flag key
$environment_key = 'environment_key_example'; // string | The environment key
$custom_workflow_input = {"description":"Turn flag on for 10% of customers each day","name":"Progressive rollout starting in two days","stages":[{"action":{"instructions":[{"kind":"turnFlagOn"},{"kind":"updateFallthroughVariationOrRollout","rolloutWeights":{"452f5fb5-7320-4ba3-81a1-8f4324f79d49":90000,"fc15f6a4-05d3-4aa4-a997-446be461345d":10000}}]},"conditions":[{"kind":"schedule","scheduleKind":"relative","waitDuration":2,"waitDurationUnit":"calendarDay"}],"name":"10% rollout on day 1"}]}; // \LaunchDarklyApi\Model\CustomWorkflowInput
$template_key = 'template_key_example'; // string | The template key to apply as a starting point for the new workflow
$dry_run = True; // bool | Whether to call the endpoint in dry-run mode

try {
    $result = $apiInstance->postWorkflow($project_key, $feature_flag_key, $environment_key, $custom_workflow_input, $template_key, $dry_run);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowsApi->postWorkflow: ', $e->getMessage(), PHP_EOL;
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
 **dry_run** | **bool**| Whether to call the endpoint in dry-run mode | [optional]

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
