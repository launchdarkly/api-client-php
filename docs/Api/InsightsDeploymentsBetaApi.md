# LaunchDarklyApi\InsightsDeploymentsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createDeploymentEvent()**](InsightsDeploymentsBetaApi.md#createDeploymentEvent) | **POST** /api/v2/engineering-insights/deployment-events | Create deployment event
[**getDeployment()**](InsightsDeploymentsBetaApi.md#getDeployment) | **GET** /api/v2/engineering-insights/deployments/{deploymentID} | Get deployment
[**getDeployments()**](InsightsDeploymentsBetaApi.md#getDeployments) | **GET** /api/v2/engineering-insights/deployments | List deployments
[**updateDeployment()**](InsightsDeploymentsBetaApi.md#updateDeployment) | **PATCH** /api/v2/engineering-insights/deployments/{deploymentID} | Update deployment


## `createDeploymentEvent()`

```php
createDeploymentEvent($post_deployment_event_input)
```

Create deployment event

Create deployment event

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsDeploymentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$post_deployment_event_input = new \LaunchDarklyApi\Model\PostDeploymentEventInput(); // \LaunchDarklyApi\Model\PostDeploymentEventInput

try {
    $apiInstance->createDeploymentEvent($post_deployment_event_input);
} catch (Exception $e) {
    echo 'Exception when calling InsightsDeploymentsBetaApi->createDeploymentEvent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **post_deployment_event_input** | [**\LaunchDarklyApi\Model\PostDeploymentEventInput**](../Model/PostDeploymentEventInput.md)|  |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDeployment()`

```php
getDeployment($deployment_id, $expand): \LaunchDarklyApi\Model\DeploymentRep
```

Get deployment

Get a deployment by ID.  The deployment ID is returned as part of the [List deployments](https://launchdarkly.com/docs/api/insights-deployments-beta/get-deployments) response. It is the `id` field of each element in the `items` array.  ### Expanding the deployment response  LaunchDarkly supports expanding the deployment response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `pullRequests` includes details on all of the pull requests associated with each deployment * `flagReferences` includes details on all of the references to flags in each deployment  For example, use `?expand=pullRequests` to include the `pullRequests` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsDeploymentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deployment_id = 'deployment_id_example'; // string | The deployment ID
$expand = 'expand_example'; // string | Expand properties in response. Options: `pullRequests`, `flagReferences`

try {
    $result = $apiInstance->getDeployment($deployment_id, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsDeploymentsBetaApi->getDeployment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **deployment_id** | **string**| The deployment ID |
 **expand** | **string**| Expand properties in response. Options: &#x60;pullRequests&#x60;, &#x60;flagReferences&#x60; | [optional]

### Return type

[**\LaunchDarklyApi\Model\DeploymentRep**](../Model/DeploymentRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDeployments()`

```php
getDeployments($project_key, $environment_key, $application_key, $limit, $expand, $from, $to, $after, $before, $kind, $status): \LaunchDarklyApi\Model\DeploymentCollectionRep
```

List deployments

Get a list of deployments  ### Expanding the deployment collection response  LaunchDarkly supports expanding the deployment collection response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `pullRequests` includes details on all of the pull requests associated with each deployment * `flagReferences` includes details on all of the references to flags in each deployment  For example, use `?expand=pullRequests` to include the `pullRequests` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsDeploymentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys
$limit = 56; // int | The number of deployments to return. Default is 20. Maximum allowed is 100.
$expand = 'expand_example'; // string | Expand properties in response. Options: `pullRequests`, `flagReferences`
$from = 56; // int | Unix timestamp in milliseconds. Default value is 7 days ago.
$to = 56; // int | Unix timestamp in milliseconds. Default value is now.
$after = 'after_example'; // string | Identifier used for pagination
$before = 'before_example'; // string | Identifier used for pagination
$kind = 'kind_example'; // string | The deployment kind
$status = 'status_example'; // string | The deployment status

try {
    $result = $apiInstance->getDeployments($project_key, $environment_key, $application_key, $limit, $expand, $from, $to, $after, $before, $kind, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsDeploymentsBetaApi->getDeployments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **application_key** | **string**| Comma separated list of application keys | [optional]
 **limit** | **int**| The number of deployments to return. Default is 20. Maximum allowed is 100. | [optional]
 **expand** | **string**| Expand properties in response. Options: &#x60;pullRequests&#x60;, &#x60;flagReferences&#x60; | [optional]
 **from** | **int**| Unix timestamp in milliseconds. Default value is 7 days ago. | [optional]
 **to** | **int**| Unix timestamp in milliseconds. Default value is now. | [optional]
 **after** | **string**| Identifier used for pagination | [optional]
 **before** | **string**| Identifier used for pagination | [optional]
 **kind** | **string**| The deployment kind | [optional]
 **status** | **string**| The deployment status | [optional]

### Return type

[**\LaunchDarklyApi\Model\DeploymentCollectionRep**](../Model/DeploymentCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDeployment()`

```php
updateDeployment($deployment_id, $patch_operation): \LaunchDarklyApi\Model\DeploymentRep
```

Update deployment

Update a deployment by ID. Updating a deployment uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).<br/><br/>The deployment ID is returned as part of the [List deployments](https://launchdarkly.com/docs/api/insights-deployments-beta/get-deployments) response. It is the `id` field of each element in the `items` array.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsDeploymentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deployment_id = 'deployment_id_example'; // string | The deployment ID
$patch_operation = [{"op":"replace","path":"/status","value":"finished"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->updateDeployment($deployment_id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsDeploymentsBetaApi->updateDeployment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **deployment_id** | **string**| The deployment ID |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\DeploymentRep**](../Model/DeploymentRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
