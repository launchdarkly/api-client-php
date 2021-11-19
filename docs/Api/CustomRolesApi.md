# LaunchDarklyApi\CustomRolesApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteCustomRole()**](CustomRolesApi.md#deleteCustomRole) | **DELETE** /api/v2/roles/{key} | Delete custom role
[**getCustomRole()**](CustomRolesApi.md#getCustomRole) | **GET** /api/v2/roles/{key} | Get custom role
[**getCustomRoles()**](CustomRolesApi.md#getCustomRoles) | **GET** /api/v2/roles | List custom roles
[**patchCustomRole()**](CustomRolesApi.md#patchCustomRole) | **PATCH** /api/v2/roles/{key} | Update custom role
[**postCustomRole()**](CustomRolesApi.md#postCustomRole) | **POST** /api/v2/roles | Create custom role


## `deleteCustomRole()`

```php
deleteCustomRole($key)
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
$key = 'key_example'; // string | The key of the custom role to delete

try {
    $apiInstance->deleteCustomRole($key);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->deleteCustomRole: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The key of the custom role to delete |

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
getCustomRole($key): \LaunchDarklyApi\Model\CustomRole
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
$key = 'key_example'; // string | The custom role's key or ID

try {
    $result = $apiInstance->getCustomRole($key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->getCustomRole: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The custom role&#39;s key or ID |

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
getCustomRoles(): \LaunchDarklyApi\Model\CustomRoles
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

try {
    $result = $apiInstance->getCustomRoles();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->getCustomRoles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

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
patchCustomRole($key, $patch_with_comment): \LaunchDarklyApi\Model\CustomRole
```

Update custom role

Update a single custom role. The request must be a valid JSON Patch document describing the changes to be made to the custom role.

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
$key = 'key_example'; // string | The key of the custom role to update
$patch_with_comment = new \LaunchDarklyApi\Model\PatchWithComment(); // \LaunchDarklyApi\Model\PatchWithComment

try {
    $result = $apiInstance->patchCustomRole($key, $patch_with_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->patchCustomRole: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The key of the custom role to update |
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
$custom_role_post = new \LaunchDarklyApi\Model\CustomRolePost(); // \LaunchDarklyApi\Model\CustomRolePost

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
