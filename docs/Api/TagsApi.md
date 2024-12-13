# LaunchDarklyApi\TagsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTags()**](TagsApi.md#getTags) | **GET** /api/v2/tags | List tags


## `getTags()`

```php
getTags($kind, $pre, $archived, $limit, $offset, $as_of): \LaunchDarklyApi\Model\TagsCollection
```

List tags

Get a list of tags.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$kind = array('kind_example'); // string[] | Fetch tags associated with the specified resource type. Options are `flag`, `project`, `environment`, `segment`, `metric`. Returns all types by default.
$pre = 'pre_example'; // string | Return tags with the specified prefix
$archived = True; // bool | Whether or not to return archived flags
$limit = 56; // int | The number of tags to return. Maximum is 1000.
$offset = 56; // int | The index of the first tag to return. Default is 0.
$as_of = 'as_of_example'; // string | The time to retrieve tags as of. Default is the current time.

try {
    $result = $apiInstance->getTags($kind, $pre, $archived, $limit, $offset, $as_of);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->getTags: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **kind** | [**string[]**](../Model/string.md)| Fetch tags associated with the specified resource type. Options are &#x60;flag&#x60;, &#x60;project&#x60;, &#x60;environment&#x60;, &#x60;segment&#x60;, &#x60;metric&#x60;. Returns all types by default. | [optional]
 **pre** | **string**| Return tags with the specified prefix | [optional]
 **archived** | **bool**| Whether or not to return archived flags | [optional]
 **limit** | **int**| The number of tags to return. Maximum is 1000. | [optional]
 **offset** | **int**| The index of the first tag to return. Default is 0. | [optional]
 **as_of** | **string**| The time to retrieve tags as of. Default is the current time. | [optional]

### Return type

[**\LaunchDarklyApi\Model\TagsCollection**](../Model/TagsCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
