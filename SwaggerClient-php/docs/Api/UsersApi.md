# Swagger\Client\UsersApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUser**](UsersApi.md#deleteUser) | **DELETE** /users/{projectKey}/{environmentKey}/{userKey} | Delete a user by ID
[**getSearchUsers**](UsersApi.md#getSearchUsers) | **GET** /user-search/{projectKey}/{environmentKey} | Search users in LaunchDarkly based on their last active date, or a search query. It should not be used to enumerate all users in LaunchDarkly-- use the List users API resource.
[**getUser**](UsersApi.md#getUser) | **GET** /users/{projectKey}/{environmentKey}/{userKey} | Get a user by key.
[**getUsers**](UsersApi.md#getUsers) | **GET** /users/{projectKey}/{environmentKey} | List all users in the environment. Includes the total count of users. In each page, there will be up to &#39;limit&#39; users returned (default 20). This is useful for exporting all users in the system for further analysis. Paginated collections will include a next link containing a URL with the next set of elements in the collection.


# **deleteUser**
> deleteUser($project_key, $environment_key, $user_key)

Delete a user by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\UsersApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$user_key = "user_key_example"; // string | The user's key

try {
    $api_instance->deleteUser($project_key, $environment_key, $user_key);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user&#39;s key |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSearchUsers**
> \Swagger\Client\Model\Users getSearchUsers($project_key, $environment_key, $q, $limit, $offset, $after)

Search users in LaunchDarkly based on their last active date, or a search query. It should not be used to enumerate all users in LaunchDarkly-- use the List users API resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\UsersApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$q = "q_example"; // string | Search query
$limit = 3.4; // float | Pagination limit
$offset = 3.4; // float | Specifies the first item to return in the collection
$after = 789; // int | A unix epoch time in milliseconds specifying the maximum last time a user requested a feature flag

try {
    $result = $api_instance->getSearchUsers($project_key, $environment_key, $q, $limit, $offset, $after);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getSearchUsers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **q** | **string**| Search query | [optional]
 **limit** | **float**| Pagination limit | [optional]
 **offset** | **float**| Specifies the first item to return in the collection | [optional]
 **after** | **int**| A unix epoch time in milliseconds specifying the maximum last time a user requested a feature flag | [optional]

### Return type

[**\Swagger\Client\Model\Users**](../Model/Users.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUser**
> \Swagger\Client\Model\User getUser($project_key, $environment_key, $user_key)

Get a user by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\UsersApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$user_key = "user_key_example"; // string | The user's key

try {
    $result = $api_instance->getUser($project_key, $environment_key, $user_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **user_key** | **string**| The user&#39;s key |

### Return type

[**\Swagger\Client\Model\User**](../Model/User.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUsers**
> \Swagger\Client\Model\Users getUsers($project_key, $environment_key, $limit)

List all users in the environment. Includes the total count of users. In each page, there will be up to 'limit' users returned (default 20). This is useful for exporting all users in the system for further analysis. Paginated collections will include a next link containing a URL with the next set of elements in the collection.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$api_instance = new Swagger\Client\Api\UsersApi();
$project_key = "project_key_example"; // string | The project key, used to tie the flags together under one project so they can be managed together.
$environment_key = "environment_key_example"; // string | The environment key
$limit = 3.4; // float | Pagination limit

try {
    $result = $api_instance->getUsers($project_key, $environment_key, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUsers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key, used to tie the flags together under one project so they can be managed together. |
 **environment_key** | **string**| The environment key |
 **limit** | **float**| Pagination limit | [optional]

### Return type

[**\Swagger\Client\Model\Users**](../Model/Users.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

