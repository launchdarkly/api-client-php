# LaunchDarklyApi\InsightsPullRequestsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPullRequests()**](InsightsPullRequestsBetaApi.md#getPullRequests) | **GET** /api/v2/engineering-insights/pull-requests | List pull requests


## `getPullRequests()`

```php
getPullRequests($project_key, $environment_key, $application_key, $status, $query, $limit, $expand, $sort, $from, $to, $after, $before): \LaunchDarklyApi\Model\PullRequestCollectionRep
```

List pull requests

Get a list of pull requests  ### Expanding the pull request collection response  LaunchDarkly supports expanding the pull request collection response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `deployments` includes details on all of the deployments associated with each pull request * `flagReferences` includes details on all of the references to flags in each pull request * `leadTime` includes details about the lead time of the pull request for each stage  For example, use `?expand=deployments` to include the `deployments` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\InsightsPullRequestsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | Required if you are using the <code>sort</code> parameter's <code>leadTime</code> option to sort pull requests.
$application_key = 'application_key_example'; // string | Filter the results to pull requests deployed to a comma separated list of applications
$status = 'status_example'; // string | Filter results to pull requests with the given status. Options: `open`, `merged`, `closed`, `deployed`.
$query = 'query_example'; // string | Filter list of pull requests by title or author
$limit = 56; // int | The number of pull requests to return. Default is 20. Maximum allowed is 100.
$expand = 'expand_example'; // string | Expand properties in response. Options: `deployments`, `flagReferences`, `leadTime`.
$sort = 'sort_example'; // string | Sort results. Requires the `environmentKey` to be set. Options: `leadTime` (asc) and `-leadTime` (desc). When query option is excluded, default sort is by created or merged date.
$from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Unix timestamp in milliseconds. Default value is 7 days ago.
$to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Unix timestamp in milliseconds. Default value is now.
$after = 'after_example'; // string | Identifier used for pagination
$before = 'before_example'; // string | Identifier used for pagination

try {
    $result = $apiInstance->getPullRequests($project_key, $environment_key, $application_key, $status, $query, $limit, $expand, $sort, $from, $to, $after, $before);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InsightsPullRequestsBetaApi->getPullRequests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| Required if you are using the &lt;code&gt;sort&lt;/code&gt; parameter&#39;s &lt;code&gt;leadTime&lt;/code&gt; option to sort pull requests. | [optional]
 **application_key** | **string**| Filter the results to pull requests deployed to a comma separated list of applications | [optional]
 **status** | **string**| Filter results to pull requests with the given status. Options: &#x60;open&#x60;, &#x60;merged&#x60;, &#x60;closed&#x60;, &#x60;deployed&#x60;. | [optional]
 **query** | **string**| Filter list of pull requests by title or author | [optional]
 **limit** | **int**| The number of pull requests to return. Default is 20. Maximum allowed is 100. | [optional]
 **expand** | **string**| Expand properties in response. Options: &#x60;deployments&#x60;, &#x60;flagReferences&#x60;, &#x60;leadTime&#x60;. | [optional]
 **sort** | **string**| Sort results. Requires the &#x60;environmentKey&#x60; to be set. Options: &#x60;leadTime&#x60; (asc) and &#x60;-leadTime&#x60; (desc). When query option is excluded, default sort is by created or merged date. | [optional]
 **from** | **\DateTime**| Unix timestamp in milliseconds. Default value is 7 days ago. | [optional]
 **to** | **\DateTime**| Unix timestamp in milliseconds. Default value is now. | [optional]
 **after** | **string**| Identifier used for pagination | [optional]
 **before** | **string**| Identifier used for pagination | [optional]

### Return type

[**\LaunchDarklyApi\Model\PullRequestCollectionRep**](../Model/PullRequestCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
