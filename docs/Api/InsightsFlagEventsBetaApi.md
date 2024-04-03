# LaunchDarklyApi\InsightsFlagEventsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getFlagEvents()**](InsightsFlagEventsBetaApi.md#getFlagEvents) | **GET** /api/v2/engineering-insights/flag-events | List flag events


## `getFlagEvents()`

```php
getFlagEvents($project_key, $environment_key, $application_key, $query, $impact_size, $has_experiments, $global, $expand, $limit, $from, $to, $after, $before): \LaunchDarklyApi\Model\FlagEventCollectionRep
```

List flag events

Get a list of flag events  ### Expanding the flag event collection response  LaunchDarkly supports expanding the flag event collection response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `experiments` includes details on all of the experiments run on each flag  For example, use `?expand=experiments` to include the `experiments` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsFlagEventsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$application_key = 'application_key_example'; // string | Comma separated list of application keys
$query = 'query_example'; // string | Filter events by flag key
$impact_size = 'impact_size_example'; // string | Filter events by impact size. A small impact created a less than 20% change in the proportion of end users receiving one or more flag variations. A medium impact created between a 20%-80% change. A large impact created a more than 80% change. Options: `none`, `small`, `medium`, `large`
$has_experiments = True; // bool | Filter events to those associated with an experiment (`true`) or without an experiment (`false`)
$global = 'global_example'; // string | Filter to include or exclude global events. Default value is `include`. Options: `include`, `exclude`
$expand = 'expand_example'; // string | Expand properties in response. Options: `experiments`
$limit = 56; // int | The number of deployments to return. Default is 20. Maximum allowed is 100.
$from = 56; // int | Unix timestamp in milliseconds. Default value is 7 days ago.
$to = 56; // int | Unix timestamp in milliseconds. Default value is now.
$after = 'after_example'; // string | Identifier used for pagination
$before = 'before_example'; // string | Identifier used for pagination

try {
    $result = $apiInstance->getFlagEvents($project_key, $environment_key, $application_key, $query, $impact_size, $has_experiments, $global, $expand, $limit, $from, $to, $after, $before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsFlagEventsBetaApi->getFlagEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **application_key** | **string**| Comma separated list of application keys | [optional]
 **query** | **string**| Filter events by flag key | [optional]
 **impact_size** | **string**| Filter events by impact size. A small impact created a less than 20% change in the proportion of end users receiving one or more flag variations. A medium impact created between a 20%-80% change. A large impact created a more than 80% change. Options: &#x60;none&#x60;, &#x60;small&#x60;, &#x60;medium&#x60;, &#x60;large&#x60; | [optional]
 **has_experiments** | **bool**| Filter events to those associated with an experiment (&#x60;true&#x60;) or without an experiment (&#x60;false&#x60;) | [optional]
 **global** | **string**| Filter to include or exclude global events. Default value is &#x60;include&#x60;. Options: &#x60;include&#x60;, &#x60;exclude&#x60; | [optional]
 **expand** | **string**| Expand properties in response. Options: &#x60;experiments&#x60; | [optional]
 **limit** | **int**| The number of deployments to return. Default is 20. Maximum allowed is 100. | [optional]
 **from** | **int**| Unix timestamp in milliseconds. Default value is 7 days ago. | [optional]
 **to** | **int**| Unix timestamp in milliseconds. Default value is now. | [optional]
 **after** | **string**| Identifier used for pagination | [optional]
 **before** | **string**| Identifier used for pagination | [optional]

### Return type

[**\LaunchDarklyApi\Model\FlagEventCollectionRep**](../Model/FlagEventCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
