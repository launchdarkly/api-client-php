# LaunchDarklyApi\HoldoutsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAllHoldouts()**](HoldoutsBetaApi.md#getAllHoldouts) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts | Get all holdouts
[**getHoldout()**](HoldoutsBetaApi.md#getHoldout) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts/{holdoutKey} | Get holdout
[**getHoldoutById()**](HoldoutsBetaApi.md#getHoldoutById) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts/id/{holdoutId} | Get Holdout by Id
[**patchHoldout()**](HoldoutsBetaApi.md#patchHoldout) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts/{holdoutKey} | Patch holdout
[**postHoldout()**](HoldoutsBetaApi.md#postHoldout) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts | Create holdout


## `getAllHoldouts()`

```php
getAllHoldouts($project_key, $environment_key, $limit, $offset): \LaunchDarklyApi\Model\HoldoutsCollectionRep
```

Get all holdouts

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\HoldoutsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$limit = 56; // int | The number of holdouts to return in the response. Defaults to 20
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an `offset` of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getAllHoldouts($project_key, $environment_key, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldoutsBetaApi->getAllHoldouts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **limit** | **int**| The number of holdouts to return in the response. Defaults to 20 | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an &#x60;offset&#x60; of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\HoldoutsCollectionRep**](../Model/HoldoutsCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getHoldout()`

```php
getHoldout($project_key, $environment_key, $holdout_key, $expand): \LaunchDarklyApi\Model\HoldoutDetailRep
```

Get holdout

Get details about a holdout.  ### Expanding the holdout response  LaunchDarkly supports the following fields for expanding the \"Get holdout\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  - `draftIteration` includes the iteration which has not been started yet, if any, for this holdout. - `previousIterations` includes all iterations prior to the current iteration, for this holdout. By default only the current iteration is included in the response. - `rel-draftIteration` includes the iteration which has not been started yet, if any, for the experiments related to this holdout. - `rel-metrics` includes metrics for experiments related to this holdout. - `rel-previousIterations` includes all iterations prior to the current iteration, for the experiments related to this holdout. - `rel-secondaryMetrics` includes secondary metrics for experiments related to this holdout. - `rel-treatments` includes all treatment and parameter details for experiments related to this holdout. - `secondaryMetrics` includes secondary metrics for this holdout. By default only the primary metric is included in the response. - `treatments` includes all treatment and parameter details for this holdout. By default treatment data is not included in the response.  For example, `expand=draftIteration,rel-draftIteration` includes the `draftIteration` and `rel-draftIteration` fields in the response. If fields that you request with the `expand` query parameter are empty, they are not included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\HoldoutsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$holdout_key = 'holdout_key_example'; // string | The holdout experiment key
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above. Holdout experiment expansion fields have no prefix. Related experiment expansion fields have `rel-` as a prefix.

try {
    $result = $apiInstance->getHoldout($project_key, $environment_key, $holdout_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldoutsBetaApi->getHoldout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **holdout_key** | **string**| The holdout experiment key |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above. Holdout experiment expansion fields have no prefix. Related experiment expansion fields have &#x60;rel-&#x60; as a prefix. | [optional]

### Return type

[**\LaunchDarklyApi\Model\HoldoutDetailRep**](../Model/HoldoutDetailRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getHoldoutById()`

```php
getHoldoutById($project_key, $environment_key, $holdout_id): \LaunchDarklyApi\Model\HoldoutRep
```

Get Holdout by Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\HoldoutsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$holdout_id = 'holdout_id_example'; // string | The holdout experiment ID

try {
    $result = $apiInstance->getHoldoutById($project_key, $environment_key, $holdout_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldoutsBetaApi->getHoldoutById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **holdout_id** | **string**| The holdout experiment ID |

### Return type

[**\LaunchDarklyApi\Model\HoldoutRep**](../Model/HoldoutRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchHoldout()`

```php
patchHoldout($project_key, $environment_key, $holdout_key, $holdout_patch_input): \LaunchDarklyApi\Model\HoldoutRep
```

Patch holdout

Updates an existing holdout, and returns the updated holdout. Updating holdouts uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating holdouts.  <details> <summary>Click to expand instructions for <strong>updating holdouts</strong></summary>  #### endHoldout  Ends a holdout.  ##### Parameters  None.  Here's an example:  ```json {   \"comment\": \"Optional comment describing why the holdout is ending\",   \"instructions\": [{     \"kind\": \"endHoldout\"   }] } ```  #### removeExperiment  Removes an experiment from a holdout.  ##### Parameters  - `value`: The key of the experiment to remove  Here's an example:  ```json {   \"comment\": \"Optional comment describing the change\",   \"instructions\": [{     \"kind\": \"removeExperiment\",     \"value\": \"experiment-key\"   }] } ```  #### updateDescription  Updates the description of the holdout.  ##### Parameters  - `value`: The new description.  Here's an example:  ```json {   \"comment\": \"Optional comment describing the update\",   \"instructions\": [{     \"kind\": \"updateDescription\",     \"value\": \"Updated holdout description\"   }] } ```  #### updateName  Updates the name of the holdout.  ##### Parameters  - `value`: The new name.  Here's an example:  ```json {   \"comment\": \"Optional comment describing the update\",   \"instructions\": [{     \"kind\": \"updateName\",     \"value\": \"Updated holdout name\"   }] } ```  </details>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\HoldoutsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$holdout_key = 'holdout_key_example'; // string | The holdout key
$holdout_patch_input = {"comment":"Optional comment describing the update","instructions":[{"kind":"updateName","value":"Updated holdout name"}]}; // \LaunchDarklyApi\Model\HoldoutPatchInput

try {
    $result = $apiInstance->patchHoldout($project_key, $environment_key, $holdout_key, $holdout_patch_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldoutsBetaApi->patchHoldout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **holdout_key** | **string**| The holdout key |
 **holdout_patch_input** | [**\LaunchDarklyApi\Model\HoldoutPatchInput**](../Model/HoldoutPatchInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\HoldoutRep**](../Model/HoldoutRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postHoldout()`

```php
postHoldout($project_key, $environment_key, $holdout_post_request): \LaunchDarklyApi\Model\HoldoutRep
```

Create holdout

Create a new holdout in the specified project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\HoldoutsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$holdout_post_request = new \LaunchDarklyApi\Model\HoldoutPostRequest(); // \LaunchDarklyApi\Model\HoldoutPostRequest

try {
    $result = $apiInstance->postHoldout($project_key, $environment_key, $holdout_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoldoutsBetaApi->postHoldout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **holdout_post_request** | [**\LaunchDarklyApi\Model\HoldoutPostRequest**](../Model/HoldoutPostRequest.md)|  |

### Return type

[**\LaunchDarklyApi\Model\HoldoutRep**](../Model/HoldoutRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
