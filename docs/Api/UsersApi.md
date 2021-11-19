# LaunchDarklyApi\UsersApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUser()**](UsersApi.md#deleteUser) | **DELETE** /api/v2/users/{projKey}/{envKey}/{key} | Delete user
[**getSearchUsers()**](UsersApi.md#getSearchUsers) | **GET** /api/v2/user-search/{projKey}/{envKey} | Find users
[**getUser()**](UsersApi.md#getUser) | **GET** /api/v2/users/{projKey}/{envKey}/{key} | Get user
[**getUsers()**](UsersApi.md#getUsers) | **GET** /api/v2/users/{projKey}/{envKey} | List users


## `deleteUser()`

```php
deleteUser($proj_key, $env_key, $key)
```

Delete user

Delete a user by key

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$key = 'key_example'; // string | The user key

try {
    $apiInstance->deleteUser($proj_key, $env_key, $key);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **key** | **string**| The user key |

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
getSearchUsers($proj_key, $env_key, $q, $limit, $offset, $after, $sort, $search_after, $filter): \LaunchDarklyApi\Model\Users
```

Find users

Search users in LaunchDarkly based on their last active date, a user attribute filter set, or a search query. Do not use to list all users in LaunchDarkly. Instead, use the [List users](getUsers) API resource.  An example user attribute filter set is `filter=firstName:Anna,activeTrial:false`. This matches users that have the user attribute `firstName` set to `Anna`, that also have the attribute `activeTrial` set to `false`.  > ### `offset` is deprecated > > `offset` is deprecated and will be removed in a future API version. You can still use `offset` and `limit` for pagination, but we recommend you use `sort` and `searchAfter` instead. `searchAfter` allows you to page through more than 10,000 users, but `offset` and `limit` do not.

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$q = 'q_example'; // string | Full-text search for users based on name, first name, last name, e-mail address, or key
$limit = 56; // int | Specifies the maximum number of items in the collection to return (max: 50, default: 20)
$offset = 56; // int | Specifies the first item to return in the collection
$after = 56; // int | A unix epoch time in milliseconds specifying the maximum last time a user requested a feature flag from LaunchDarkly
$sort = 'sort_example'; // string | Specifies a field by which to sort. LaunchDarkly supports the `userKey` and `lastSeen` fields. Fields prefixed by a dash ( - ) sort in descending order.
$search_after = 'search_after_example'; // string | Limits results to users with sort values after the value you specify. You can use this for pagination, but we recommend using the `next` link we provide instead.
$filter = 'filter_example'; // string | A comma-separated list of user attribute filters. Each filter is in the form of attributeKey:attributeValue

try {
    $result = $apiInstance->getSearchUsers($proj_key, $env_key, $q, $limit, $offset, $after, $sort, $search_after, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getSearchUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **q** | **string**| Full-text search for users based on name, first name, last name, e-mail address, or key | [optional]
 **limit** | **int**| Specifies the maximum number of items in the collection to return (max: 50, default: 20) | [optional]
 **offset** | **int**| Specifies the first item to return in the collection | [optional]
 **after** | **int**| A unix epoch time in milliseconds specifying the maximum last time a user requested a feature flag from LaunchDarkly | [optional]
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
getUser($proj_key, $env_key, $key): \LaunchDarklyApi\Model\User
```

Get user

Get a user by key. The `user` object contains all attributes sent in `variation` calls for that key.

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$key = 'key_example'; // string | The user key

try {
    $result = $apiInstance->getUser($proj_key, $env_key, $key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **key** | **string**| The user key |

### Return type

[**\LaunchDarklyApi\Model\User**](../Model/User.md)

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
getUsers($proj_key, $env_key, $limit, $search_after): \LaunchDarklyApi\Model\Users
```

List users

List all users in the environment. Includes the total count of users. In each page, there is up to `limit` users returned. The default is 20. This is useful for exporting all users in the system for further analysis. To paginate through, follow the `next` link in the `_links` object, as [described in Representations](/#section/Representations).

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
$proj_key = 'proj_key_example'; // string | The project key
$env_key = 'env_key_example'; // string | The environment key
$limit = 56; // int | The number of elements to return per page
$search_after = 'search_after_example'; // string | Limits results to users with sort values after the value you specify. You can use this for pagination, but we recommend using the `next` link we provide instead.

try {
    $result = $apiInstance->getUsers($proj_key, $env_key, $limit, $search_after);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **proj_key** | **string**| The project key |
 **env_key** | **string**| The environment key |
 **limit** | **int**| The number of elements to return per page | [optional]
 **search_after** | **string**| Limits results to users with sort values after the value you specify. You can use this for pagination, but we recommend using the &#x60;next&#x60; link we provide instead. | [optional]

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
