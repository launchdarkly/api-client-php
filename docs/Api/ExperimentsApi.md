# LaunchDarklyApi\ExperimentsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createExperiment()**](ExperimentsApi.md#createExperiment) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments | Create experiment
[**createIteration()**](ExperimentsApi.md#createIteration) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/iterations | Create iteration
[**getExperiment()**](ExperimentsApi.md#getExperiment) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey} | Get experiment
[**getExperimentResults()**](ExperimentsApi.md#getExperimentResults) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/metrics/{metricKey}/results | Get experiment results (Deprecated)
[**getExperimentResultsForMetricGroup()**](ExperimentsApi.md#getExperimentResultsForMetricGroup) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/metric-groups/{metricGroupKey}/results | Get experiment results for metric group (Deprecated)
[**getExperimentationSettings()**](ExperimentsApi.md#getExperimentationSettings) | **GET** /api/v2/projects/{projectKey}/experimentation-settings | Get experimentation settings
[**getExperiments()**](ExperimentsApi.md#getExperiments) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments | Get experiments
[**patchExperiment()**](ExperimentsApi.md#patchExperiment) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey} | Patch experiment
[**putExperimentationSettings()**](ExperimentsApi.md#putExperimentationSettings) | **PUT** /api/v2/projects/{projectKey}/experimentation-settings | Update experimentation settings


## `createExperiment()`

```php
createExperiment($project_key, $environment_key, $experiment_post): \LaunchDarklyApi\Model\Experiment
```

Create experiment

Create an experiment.  To run this experiment, you'll need to [create an iteration](https://launchdarkly.com/docs/ld-docs/api/experiments/create-iteration) and then [update the experiment](https://launchdarkly.com/docs/ld-docs/api/experiments/patch-experiment) with the `startIteration` instruction.  To learn more, read [Creating experiments](https://launchdarkly.com/docs/home/experimentation/create).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$experiment_post = new \LaunchDarklyApi\Model\ExperimentPost(); // \LaunchDarklyApi\Model\ExperimentPost

try {
    $result = $apiInstance->createExperiment($project_key, $environment_key, $experiment_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->createExperiment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **experiment_post** | [**\LaunchDarklyApi\Model\ExperimentPost**](../Model/ExperimentPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Experiment**](../Model/Experiment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createIteration()`

```php
createIteration($project_key, $environment_key, $experiment_key, $iteration_input): \LaunchDarklyApi\Model\IterationRep
```

Create iteration

Create an experiment iteration.  Experiment iterations let you record experiments in individual blocks of time. Initially, iterations are created with a status of `not_started` and appear in the `draftIteration` field of an experiment. To start or stop an iteration, [update the experiment](https://launchdarkly.com/docs/ld-docs/api/experiments/patch-experiment) with the `startIteration` or `stopIteration` instruction.   To learn more, read [Start experiment iterations](https://launchdarkly.com/docs/home/experimentation/feature#start-experiment-iterations).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$experiment_key = 'experiment_key_example'; // string | The experiment key
$iteration_input = new \LaunchDarklyApi\Model\IterationInput(); // \LaunchDarklyApi\Model\IterationInput

try {
    $result = $apiInstance->createIteration($project_key, $environment_key, $experiment_key, $iteration_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->createIteration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **experiment_key** | **string**| The experiment key |
 **iteration_input** | [**\LaunchDarklyApi\Model\IterationInput**](../Model/IterationInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\IterationRep**](../Model/IterationRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExperiment()`

```php
getExperiment($project_key, $environment_key, $experiment_key, $expand): \LaunchDarklyApi\Model\Experiment
```

Get experiment

Get details about an experiment.  ### Expanding the experiment response  LaunchDarkly supports four fields for expanding the \"Get experiment\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  - `previousIterations` includes all iterations prior to the current iteration. By default only the current iteration is included in the response. - `draftIteration` includes the iteration which has not been started yet, if any. - `secondaryMetrics` includes secondary metrics. By default only the primary metric is included in the response. - `treatments` includes all treatment and parameter details. By default treatment data is not included in the response.  For example, `expand=draftIteration,treatments` includes the `draftIteration` and `treatments` fields in the response. If fields that you request with the `expand` query parameter are empty, they are not included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$experiment_key = 'experiment_key_example'; // string | The experiment key
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above.

try {
    $result = $apiInstance->getExperiment($project_key, $environment_key, $experiment_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->getExperiment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **experiment_key** | **string**| The experiment key |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Experiment**](../Model/Experiment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExperimentResults()`

```php
getExperimentResults($project_key, $environment_key, $experiment_key, $metric_key, $iteration_id, $expand): \LaunchDarklyApi\Model\ExperimentBayesianResultsRep
```

Get experiment results (Deprecated)

Get results from an experiment for a particular metric.  LaunchDarkly supports one field for expanding the \"Get experiment results\" response. By default, this field is **not** included in the response.  To expand the response, append the `expand` query parameter with the following field: * `traffic` includes the total count of units for each treatment.  For example, `expand=traffic` includes the `traffic` field for the project in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$experiment_key = 'experiment_key_example'; // string | The experiment key
$metric_key = 'metric_key_example'; // string | The metric key
$iteration_id = 'iteration_id_example'; // string | The iteration ID
$expand = 'expand_example'; // string | A comma-separated list of fields to expand in the response. Supported fields are explained above.

try {
    $result = $apiInstance->getExperimentResults($project_key, $environment_key, $experiment_key, $metric_key, $iteration_id, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->getExperimentResults: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **experiment_key** | **string**| The experiment key |
 **metric_key** | **string**| The metric key |
 **iteration_id** | **string**| The iteration ID | [optional]
 **expand** | **string**| A comma-separated list of fields to expand in the response. Supported fields are explained above. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ExperimentBayesianResultsRep**](../Model/ExperimentBayesianResultsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExperimentResultsForMetricGroup()`

```php
getExperimentResultsForMetricGroup($project_key, $environment_key, $experiment_key, $metric_group_key, $iteration_id): \LaunchDarklyApi\Model\MetricGroupResultsRep
```

Get experiment results for metric group (Deprecated)

Get results from an experiment for a particular metric group.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$experiment_key = 'experiment_key_example'; // string | The experiment key
$metric_group_key = 'metric_group_key_example'; // string | The metric group key
$iteration_id = 'iteration_id_example'; // string | The iteration ID

try {
    $result = $apiInstance->getExperimentResultsForMetricGroup($project_key, $environment_key, $experiment_key, $metric_group_key, $iteration_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->getExperimentResultsForMetricGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **experiment_key** | **string**| The experiment key |
 **metric_group_key** | **string**| The metric group key |
 **iteration_id** | **string**| The iteration ID | [optional]

### Return type

[**\LaunchDarklyApi\Model\MetricGroupResultsRep**](../Model/MetricGroupResultsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExperimentationSettings()`

```php
getExperimentationSettings($project_key): \LaunchDarklyApi\Model\RandomizationSettingsRep
```

Get experimentation settings

Get current experimentation settings for the given project

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key

try {
    $result = $apiInstance->getExperimentationSettings($project_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->getExperimentationSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |

### Return type

[**\LaunchDarklyApi\Model\RandomizationSettingsRep**](../Model/RandomizationSettingsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getExperiments()`

```php
getExperiments($project_key, $environment_key, $limit, $offset, $filter, $expand, $lifecycle_state): \LaunchDarklyApi\Model\ExperimentCollectionRep
```

Get experiments

Get details about all experiments in an environment.  ### Filtering experiments  LaunchDarkly supports the `filter` query param for filtering, with the following fields:  - `flagKey` filters for only experiments that use the flag with the given key. - `metricKey` filters for only experiments that use the metric with the given key. - `status` filters for only experiments with an iteration with the given status. An iteration can have the status `not_started`, `running` or `stopped`.  For example, `filter=flagKey:my-flag,status:running,metricKey:page-load-ms` filters for experiments for the given flag key and the given metric key which have a currently running iteration.  ### Expanding the experiments response  LaunchDarkly supports four fields for expanding the \"Get experiments\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  - `previousIterations` includes all iterations prior to the current iteration. By default only the current iteration is included in the response. - `draftIteration` includes the iteration which has not been started yet, if any. - `secondaryMetrics` includes secondary metrics. By default only the primary metric is included in the response. - `treatments` includes all treatment and parameter details. By default treatment data is not included in the response.  For example, `expand=draftIteration,treatments` includes the `draftIteration` and `treatments` fields in the response. If fields that you request with the `expand` query parameter are empty, they are not included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$limit = 56; // int | The maximum number of experiments to return. Defaults to 20.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is of the form `field:value`. Supported fields are explained above.
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above.
$lifecycle_state = 'lifecycle_state_example'; // string | A comma-separated list of experiment archived states. Supports `archived`, `active`, or both. Defaults to `active` experiments.

try {
    $result = $apiInstance->getExperiments($project_key, $environment_key, $limit, $offset, $filter, $expand, $lifecycle_state);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->getExperiments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **limit** | **int**| The maximum number of experiments to return. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form &#x60;field:value&#x60;. Supported fields are explained above. | [optional]
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above. | [optional]
 **lifecycle_state** | **string**| A comma-separated list of experiment archived states. Supports &#x60;archived&#x60;, &#x60;active&#x60;, or both. Defaults to &#x60;active&#x60; experiments. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ExperimentCollectionRep**](../Model/ExperimentCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchExperiment()`

```php
patchExperiment($project_key, $environment_key, $experiment_key, $experiment_patch_input): \LaunchDarklyApi\Model\Experiment
```

Patch experiment

Update an experiment. Updating an experiment uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating experiments.  #### updateName  Updates the experiment name.  ##### Parameters  - `value`: The new name.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"updateName\",     \"value\": \"Example updated experiment name\"   }] } ```  #### updateDescription  Updates the experiment description.  ##### Parameters  - `value`: The new description.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"updateDescription\",     \"value\": \"Example updated description\"   }] } ```  #### startIteration  Starts a new iteration for this experiment. You must [create a new iteration](https://launchdarkly.com/docs/ld-docs/api/experiments/create-iteration) before calling this instruction.  An iteration may not be started until it meets the following criteria:  * Its associated flag is toggled on and is not archived * Its `randomizationUnit` is set * At least one of its `treatments` has a non-zero `allocationPercent`  ##### Parameters  - `changeJustification`: The reason for starting a new iteration. Required when you call `startIteration` on an already running experiment, otherwise optional.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"startIteration\",     \"changeJustification\": \"It's time to start a new iteration\"   }] } ```  #### stopIteration  Stops the current iteration for this experiment.  ##### Parameters  - `winningTreatmentId`: The ID of the winning treatment. Treatment IDs are returned as part of the [Get experiment](https://launchdarkly.com/docs/ld-docs/api/experiments/get-experiment) response. They are the `_id` of each element in the `treatments` array. - `winningReason`: The reason for the winner  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"stopIteration\",     \"winningTreatmentId\": \"3a548ec2-72ac-4e59-8518-5c24f5609ccf\",     \"winningReason\": \"Example reason to stop the iteration\"   }] } ```  #### archiveExperiment  Archives this experiment. Archived experiments are hidden by default in the LaunchDarkly user interface. You cannot start new iterations for archived experiments.  Here's an example:  ```json {   \"instructions\": [{ \"kind\": \"archiveExperiment\" }] } ```  #### restoreExperiment  Restores an archived experiment. After restoring an experiment, you can start new iterations for it again.  Here's an example:  ```json {   \"instructions\": [{ \"kind\": \"restoreExperiment\" }] } ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$experiment_key = 'experiment_key_example'; // string | The experiment key
$experiment_patch_input = {"comment":"Example comment describing the update","instructions":[{"kind":"updateName","value":"Updated experiment name"}]}; // \LaunchDarklyApi\Model\ExperimentPatchInput

try {
    $result = $apiInstance->patchExperiment($project_key, $environment_key, $experiment_key, $experiment_patch_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->patchExperiment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **experiment_key** | **string**| The experiment key |
 **experiment_patch_input** | [**\LaunchDarklyApi\Model\ExperimentPatchInput**](../Model/ExperimentPatchInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Experiment**](../Model/Experiment.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putExperimentationSettings()`

```php
putExperimentationSettings($project_key, $randomization_settings_put): \LaunchDarklyApi\Model\RandomizationSettingsRep
```

Update experimentation settings

Update experimentation settings for the given project

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ExperimentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$randomization_settings_put = new \LaunchDarklyApi\Model\RandomizationSettingsPut(); // \LaunchDarklyApi\Model\RandomizationSettingsPut

try {
    $result = $apiInstance->putExperimentationSettings($project_key, $randomization_settings_put);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExperimentsApi->putExperimentationSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **randomization_settings_put** | [**\LaunchDarklyApi\Model\RandomizationSettingsPut**](../Model/RandomizationSettingsPut.md)|  |

### Return type

[**\LaunchDarklyApi\Model\RandomizationSettingsRep**](../Model/RandomizationSettingsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
