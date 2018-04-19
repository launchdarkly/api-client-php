# Swagger\Client\CustomRolesApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteCustomRole**](CustomRolesApi.md#deleteCustomRole) | **DELETE** /roles/{customRoleKey} | Delete a custom role by key.
[**getCustomRole**](CustomRolesApi.md#getCustomRole) | **GET** /roles/{customRoleKey} | Get one custom role by key.
[**getCustomRoles**](CustomRolesApi.md#getCustomRoles) | **GET** /roles | Return a complete list of custom roles.
[**patchCustomRole**](CustomRolesApi.md#patchCustomRole) | **PATCH** /roles/{customRoleKey} | Modify a custom role by key.
[**postCustomRole**](CustomRolesApi.md#postCustomRole) | **POST** /roles | Create a new custom role.


# **deleteCustomRole**
> deleteCustomRole($custom_role_key)

Delete a custom role by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_key = "custom_role_key_example"; // string | The custom role key.

try {
    $apiInstance->deleteCustomRole($custom_role_key);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->deleteCustomRole: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_key** | **string**| The custom role key. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCustomRole**
> \Swagger\Client\Model\CustomRole getCustomRole($custom_role_key)

Get one custom role by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_key = "custom_role_key_example"; // string | The custom role key.

try {
    $result = $apiInstance->getCustomRole($custom_role_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->getCustomRole: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_key** | **string**| The custom role key. |

### Return type

[**\Swagger\Client\Model\CustomRole**](../Model/CustomRole.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCustomRoles**
> \Swagger\Client\Model\CustomRoles getCustomRoles()

Return a complete list of custom roles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\CustomRolesApi(
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
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\CustomRoles**](../Model/CustomRoles.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchCustomRole**
> \Swagger\Client\Model\CustomRole patchCustomRole($custom_role_key, $patch_delta)

Modify a custom role by key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_key = "custom_role_key_example"; // string | The custom role key.
$patch_delta = array(new \Swagger\Client\Model\PatchOperation()); // \Swagger\Client\Model\PatchOperation[] | Requires a JSON Patch representation of the desired changes to the project. 'http://jsonpatch.com/'

try {
    $result = $apiInstance->patchCustomRole($custom_role_key, $patch_delta);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->patchCustomRole: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_key** | **string**| The custom role key. |
 **patch_delta** | [**\Swagger\Client\Model\PatchOperation[]**](../Model/PatchOperation.md)| Requires a JSON Patch representation of the desired changes to the project. &#39;http://jsonpatch.com/&#39; |

### Return type

[**\Swagger\Client\Model\CustomRole**](../Model/CustomRole.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postCustomRole**
> postCustomRole($custom_role_body)

Create a new custom role.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\CustomRolesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_role_body = new \Swagger\Client\Model\CustomRoleBody(); // \Swagger\Client\Model\CustomRoleBody | New role or roles to create.

try {
    $apiInstance->postCustomRole($custom_role_body);
} catch (Exception $e) {
    echo 'Exception when calling CustomRolesApi->postCustomRole: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **custom_role_body** | [**\Swagger\Client\Model\CustomRoleBody**](../Model/CustomRoleBody.md)| New role or roles to create. |

### Return type

void (empty response body)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

