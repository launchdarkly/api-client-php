# LaunchDarklyApi\UsersApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUser()**](UsersApi.md#deleteUser) | **DELETE** /api/v2/users/{projectKey}/{environmentKey}/{userKey} | Delete user
[**getSearchUsers()**](UsersApi.md#getSearchUsers) | **GET** /api/v2/user-search/{projectKey}/{environmentKey} | Find users
[**getUser()**](UsersApi.md#getUser) | **GET** /api/v2/users/{projectKey}/{environmentKey}/{userKey} | Get user
[**getUsers()**](UsersApi.md#getUsers) | **GET** /api/v2/users/{projectKey}/{environmentKey} | List users


## `deleteUser()`

```php
deleteUser($project_key, $environment_key, $user_key)
```

Delete user

> ### Use contexts instead > > After you have upgraded your LaunchDarkly SDK to use contexts instead of users, you should use [Delete context instances](https://launchdarkly.com/docs/ld-docs/api/contexts/delete-context-instances) instead of this endpoint.  Delete a user by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$user_key = 'user_key_example'; // string | The user key

try {
    $apiInstance->deleteUser($project_key, $environment_key, $user_key);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user key |

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

## `getSearchUsers()`

```php
getSearchUsers($project_key, $environment_key, $q, $limit, $offset, $after, $sort, $search_after, $filter): \LaunchDarklyApi\Model\Users
```

Find users

> ### Use contexts instead > > After you have upgraded your LaunchDarkly SDK to use contexts instead of users, you should use [Search for context instances](https://launchdarkly.com/docs/ld-docs/api/contexts/search-context-instances) instead of this endpoint.  Search users in LaunchDarkly based on their last active date, a user attribute filter set, or a search query.  An example user attribute filter set is `filter=firstName:Anna,activeTrial:false`. This matches users that have the user attribute `firstName` set to `Anna`, that also have the attribute `activeTrial` set to `false`.  To paginate through results, follow the `next` link in the `_links` object. To learn more, read [Representations](https://launchdarkly.com/docs/ld-docs/api#representations).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$q = 'q_example'; // string | Full-text search for users based on name, first name, last name, e-mail address, or key
$limit = 56; // int | Specifies the maximum number of items in the collection to return (max: 50, default: 20)
$offset = 56; // int | Deprecated, use `searchAfter` instead. Specifies the first item to return in the collection.
$after = 56; // int | A Unix epoch time in milliseconds specifying the maximum last time a user requested a feature flag from LaunchDarkly
$sort = 'sort_example'; // string | Specifies a field by which to sort. LaunchDarkly supports the `userKey` and `lastSeen` fields. Fields prefixed by a dash ( - ) sort in descending order.
$search_after = 'search_after_example'; // string | Limits results to users with sort values after the value you specify. You can use this for pagination, but we recommend using the `next` link we provide instead.
$filter = 'filter_example'; // string | A comma-separated list of user attribute filters. Each filter is in the form of attributeKey:attributeValue

try {
    $result = $apiInstance->getSearchUsers($project_key, $environment_key, $q, $limit, $offset, $after, $sort, $search_after, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getSearchUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **q** | **string**| Full-text search for users based on name, first name, last name, e-mail address, or key | [optional]
 **limit** | **int**| Specifies the maximum number of items in the collection to return (max: 50, default: 20) | [optional]
 **offset** | **int**| Deprecated, use &#x60;searchAfter&#x60; instead. Specifies the first item to return in the collection. | [optional]
 **after** | **int**| A Unix epoch time in milliseconds specifying the maximum last time a user requested a feature flag from LaunchDarkly | [optional]
 **sort** | **string**| Specifies a field by which to sort. LaunchDarkly supports the &#x60;userKey&#x60; and &#x60;lastSeen&#x60; fields. Fields prefixed by a dash ( - ) sort in descending order. | [optional]
 **search_after** | **string**| Limits results to users with sort values after the value you specify. You can use this for pagination, but we recommend using the &#x60;next&#x60; link we provide instead. | [optional]
 **filter** | **string**| A comma-separated list of user attribute filters. Each filter is in the form of attributeKey:attributeValue | [optional]

### Return type

[**\LaunchDarklyApi\Model\Users**](../Model/Users.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUser()`

```php
getUser($project_key, $environment_key, $user_key): \LaunchDarklyApi\Model\UserRecord
```

Get user

> ### Use contexts instead > > After you have upgraded your LaunchDarkly SDK to use contexts instead of users, you should use [Get context instances](https://launchdarkly.com/docs/ld-docs/api/contexts/get-context-instances) instead of this endpoint.  Get a user by key. The `user` object contains all attributes sent in `variation` calls for that key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$user_key = 'user_key_example'; // string | The user key

try {
    $result = $apiInstance->getUser($project_key, $environment_key, $user_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user key |

### Return type

[**\LaunchDarklyApi\Model\UserRecord**](../Model/UserRecord.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUsers()`

```php
getUsers($project_key, $environment_key, $limit, $search_after): \LaunchDarklyApi\Model\UsersRep
```

List users

> ### Use contexts instead > > After you have upgraded your LaunchDarkly SDK to use contexts instead of users, you should use [Search for contexts](https://launchdarkly.com/docs/ld-docs/api/contexts/search-contexts) instead of this endpoint.  List all users in the environment. Includes the total count of users. This is useful for exporting all users in the system for further analysis.  Each page displays users up to a set `limit`. The default is 20. To page through, follow the `next` link in the `_links` object. To learn more, read [Representations](https://launchdarkly.com/docs/ld-docs/api#representations).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$limit = 56; // int | The number of elements to return per page
$search_after = 'search_after_example'; // string | Limits results to users with sort values after the value you specify. You can use this for pagination, but we recommend using the `next` link we provide instead.

try {
    $result = $apiInstance->getUsers($project_key, $environment_key, $limit, $search_after);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **limit** | **int**| The number of elements to return per page | [optional]
 **search_after** | **string**| Limits results to users with sort values after the value you specify. You can use this for pagination, but we recommend using the &#x60;next&#x60; link we provide instead. | [optional]

### Return type

[**\LaunchDarklyApi\Model\UsersRep**](../Model/UsersRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
