# LaunchDarklyApi\AccessTokensApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteToken()**](AccessTokensApi.md#deleteToken) | **DELETE** /api/v2/tokens/{id} | Delete access token
[**getToken()**](AccessTokensApi.md#getToken) | **GET** /api/v2/tokens/{id} | Get access token
[**getTokens()**](AccessTokensApi.md#getTokens) | **GET** /api/v2/tokens | List access tokens
[**patchToken()**](AccessTokensApi.md#patchToken) | **PATCH** /api/v2/tokens/{id} | Patch access token
[**postToken()**](AccessTokensApi.md#postToken) | **POST** /api/v2/tokens | Create access token
[**resetToken()**](AccessTokensApi.md#resetToken) | **POST** /api/v2/tokens/{id}/reset | Reset access token


## `deleteToken()`

```php
deleteToken($id)
```

Delete access token

Delete an access token by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccessTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the access token to update

try {
    $apiInstance->deleteToken($id);
} catch (Exception $e) {
    echo 'Exception when calling AccessTokensApi->deleteToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the access token to update |

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

## `getToken()`

```php
getToken($id): \LaunchDarklyApi\Model\Token
```

Get access token

Get a single access token by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccessTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the access token

try {
    $result = $apiInstance->getToken($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccessTokensApi->getToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the access token |

### Return type

[**\LaunchDarklyApi\Model\Token**](../Model/Token.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTokens()`

```php
getTokens($show_all, $limit, $offset): \LaunchDarklyApi\Model\Tokens
```

List access tokens

Fetch a list of all access tokens.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccessTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$show_all = True; // bool | If set to true, and the authentication access token has the 'Admin' role, personal access tokens for all members will be retrieved.
$limit = 56; // int | The number of access tokens to return in the response. Defaults to 25.
$offset = 56; // int | Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getTokens($show_all, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccessTokensApi->getTokens: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **show_all** | **bool**| If set to true, and the authentication access token has the &#39;Admin&#39; role, personal access tokens for all members will be retrieved. | [optional]
 **limit** | **int**| The number of access tokens to return in the response. Defaults to 25. | [optional]
 **offset** | **int**| Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Tokens**](../Model/Tokens.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchToken()`

```php
patchToken($id, $patch_operation): \LaunchDarklyApi\Model\Token
```

Patch access token

Update an access token's settings. Updating an access token uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccessTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the access token to update
$patch_operation = [{"op":"replace","path":"/role","value":"writer"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchToken($id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccessTokensApi->patchToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the access token to update |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Token**](../Model/Token.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postToken()`

```php
postToken($access_token_post): \LaunchDarklyApi\Model\Token
```

Create access token

Create a new access token.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccessTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$access_token_post = {"role":"reader"}; // \LaunchDarklyApi\Model\AccessTokenPost

try {
    $result = $apiInstance->postToken($access_token_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccessTokensApi->postToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **access_token_post** | [**\LaunchDarklyApi\Model\AccessTokenPost**](../Model/AccessTokenPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Token**](../Model/Token.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resetToken()`

```php
resetToken($id, $expiry): \LaunchDarklyApi\Model\Token
```

Reset access token

Reset an access token's secret key with an optional expiry time for the old key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccessTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the access token to update
$expiry = 56; // int | An expiration time for the old token key, expressed as a Unix epoch time in milliseconds. By default, the token will expire immediately.

try {
    $result = $apiInstance->resetToken($id, $expiry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccessTokensApi->resetToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the access token to update |
 **expiry** | **int**| An expiration time for the old token key, expressed as a Unix epoch time in milliseconds. By default, the token will expire immediately. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Token**](../Model/Token.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
