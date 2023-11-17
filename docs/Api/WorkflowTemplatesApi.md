# LaunchDarklyApi\WorkflowTemplatesApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createWorkflowTemplate()**](WorkflowTemplatesApi.md#createWorkflowTemplate) | **POST** /api/v2/templates | Create workflow template
[**deleteWorkflowTemplate()**](WorkflowTemplatesApi.md#deleteWorkflowTemplate) | **DELETE** /api/v2/templates/{templateKey} | Delete workflow template
[**getWorkflowTemplates()**](WorkflowTemplatesApi.md#getWorkflowTemplates) | **GET** /api/v2/templates | Get workflow templates


## `createWorkflowTemplate()`

```php
createWorkflowTemplate($create_workflow_template_input): \LaunchDarklyApi\Model\WorkflowTemplateOutput
```

Create workflow template

Create a template for a feature flag workflow

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\WorkflowTemplatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_workflow_template_input = new \LaunchDarklyApi\Model\CreateWorkflowTemplateInput(); // \LaunchDarklyApi\Model\CreateWorkflowTemplateInput

try {
    $result = $apiInstance->createWorkflowTemplate($create_workflow_template_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowTemplatesApi->createWorkflowTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_workflow_template_input** | [**\LaunchDarklyApi\Model\CreateWorkflowTemplateInput**](../Model/CreateWorkflowTemplateInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\WorkflowTemplateOutput**](../Model/WorkflowTemplateOutput.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteWorkflowTemplate()`

```php
deleteWorkflowTemplate($template_key)
```

Delete workflow template

Delete a workflow template

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\WorkflowTemplatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$template_key = 'template_key_example'; // string | The template key

try {
    $apiInstance->deleteWorkflowTemplate($template_key);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowTemplatesApi->deleteWorkflowTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template_key** | **string**| The template key |

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

## `getWorkflowTemplates()`

```php
getWorkflowTemplates($summary, $search): \LaunchDarklyApi\Model\WorkflowTemplatesListingOutputRep
```

Get workflow templates

Get workflow templates belonging to an account, or can optionally return templates_endpoints.workflowTemplateSummariesListingOutputRep when summary query param is true

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\WorkflowTemplatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$summary = True; // bool | Whether the entire template object or just a summary should be returned
$search = 'search_example'; // string | The substring in either the name or description of a template

try {
    $result = $apiInstance->getWorkflowTemplates($summary, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowTemplatesApi->getWorkflowTemplates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **summary** | **bool**| Whether the entire template object or just a summary should be returned | [optional]
 **search** | **string**| The substring in either the name or description of a template | [optional]

### Return type

[**\LaunchDarklyApi\Model\WorkflowTemplatesListingOutputRep**](../Model/WorkflowTemplatesListingOutputRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
