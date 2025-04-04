# LaunchDarklyApi\CustomRolesApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteCustomRole()**](CustomRolesApi.md#deleteCustomRole) | **DELETE** /api/v2/roles/{customRoleKey} | Delete custom role
[**getCustomRole()**](CustomRolesApi.md#getCustomRole) | **GET** /api/v2/roles/{customRoleKey} | Get custom role
[**getCustomRoles()**](CustomRolesApi.md#getCustomRoles) | **GET** /api/v2/roles | List custom roles
[**patchCustomRole()**](CustomRolesApi.md#patchCustomRole) | **PATCH** /api/v2/roles/{customRoleKey} | Update custom role
[**postCustomRole()**](CustomRolesApi.md#postCustomRole) | **POST** /api/v2/roles | Create custom role


## `deleteCustomRole()`

```php
deleteCustomRole($custom_role_key)
```

Delete custom role

Delete a custom role by key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_key = 'custom_role_key_example'; // string | The custom role key

try {
    $apiInstance->deleteCustomRole($custom_role_key);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->deleteCustomRole: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_key** | **string**| The custom role key |

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

## `getCustomRole()`

```php
getCustomRole($custom_role_key): \LaunchDarklyApi\Model\CustomRole
```

Get custom role

Get a single custom role by key or ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_key = 'custom_role_key_example'; // string | The custom role key or ID

try {
    $result = $apiInstance->getCustomRole($custom_role_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->getCustomRole: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_key** | **string**| The custom role key or ID |

### Return type

[**\LaunchDarklyApi\Model\CustomRole**](../Model/CustomRole.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCustomRoles()`

```php
getCustomRoles($limit, $offset): \LaunchDarklyApi\Model\CustomRoles
```

List custom roles

Get a complete list of custom roles. Custom roles let you create flexible policies providing fine-grained access control to everything in LaunchDarkly, from feature flags to goals, environments, and teams. With custom roles, it's possible to enforce access policies that meet your exact workflow needs. Custom roles are available to customers on our enterprise plans. If you're interested in learning more about our enterprise plans, contact sales@launchdarkly.com.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | The maximum number of custom roles to return. Defaults to 20.
$offset = 56; // int | Where to start in the list. Defaults to 0. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getCustomRoles($limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->getCustomRoles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**| The maximum number of custom roles to return. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. Defaults to 0. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\CustomRoles**](../Model/CustomRoles.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchCustomRole()`

```php
patchCustomRole($custom_role_key, $patch_with_comment): \LaunchDarklyApi\Model\CustomRole
```

Update custom role

Update a single custom role. Updating a custom role uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) or [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).<br/><br/>To add an element to the `policy` array, set the `path` to `/policy` and then append `/<array index>`. Use `/0` to add to the beginning of the array. Use `/-` to add to the end of the array.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_key = 'custom_role_key_example'; // string | The custom role key
$patch_with_comment = {"patch":[{"op":"add","path":"/policy/0","value":{"actions":["updateOn"],"effect":"allow","resources":["proj/*:env/qa:flag/*"]}}]}; // \LaunchDarklyApi\Model\PatchWithComment

try {
    $result = $apiInstance->patchCustomRole($custom_role_key, $patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->patchCustomRole: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_key** | **string**| The custom role key |
 **patch_with_comment** | [**\LaunchDarklyApi\Model\PatchWithComment**](../Model/PatchWithComment.md)|  |

### Return type

[**\LaunchDarklyApi\Model\CustomRole**](../Model/CustomRole.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postCustomRole()`

```php
postCustomRole($custom_role_post): \LaunchDarklyApi\Model\CustomRole
```

Create custom role

Create a new custom role

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_post = {"basePermissions":"reader","description":"An example role for members of the ops team","key":"role-key-123abc","name":"Ops team","policy":[{"actions":["updateOn"],"effect":"allow","resources":["proj/*:env/production:flag/*"]}]}; // \LaunchDarklyApi\Model\CustomRolePost

try {
    $result = $apiInstance->postCustomRole($custom_role_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->postCustomRole: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_post** | [**\LaunchDarklyApi\Model\CustomRolePost**](../Model/CustomRolePost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\CustomRole**](../Model/CustomRole.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
