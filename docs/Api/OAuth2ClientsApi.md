# LaunchDarklyApi\OAuth2ClientsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createOAuth2Client()**](OAuth2ClientsApi.md#createOAuth2Client) | **POST** /api/v2/oauth/clients | Create a LaunchDarkly OAuth 2.0 client
[**deleteOAuthClient()**](OAuth2ClientsApi.md#deleteOAuthClient) | **DELETE** /api/v2/oauth/clients/{clientId} | Delete OAuth 2.0 client
[**getOAuthClientById()**](OAuth2ClientsApi.md#getOAuthClientById) | **GET** /api/v2/oauth/clients/{clientId} | Get client by ID
[**getOAuthClients()**](OAuth2ClientsApi.md#getOAuthClients) | **GET** /api/v2/oauth/clients | Get clients
[**patchOAuthClient()**](OAuth2ClientsApi.md#patchOAuthClient) | **PATCH** /api/v2/oauth/clients/{clientId} | Patch client by ID


## `createOAuth2Client()`

```php
createOAuth2Client($oauth_client_post): \LaunchDarklyApi\Model\Client
```

Create a LaunchDarkly OAuth 2.0 client

Create (register) a LaunchDarkly OAuth2 client. OAuth2 clients allow you to build custom integrations using LaunchDarkly as your identity provider.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\OAuth2ClientsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$oauth_client_post = new \LaunchDarklyApi\Model\OauthClientPost(); // \LaunchDarklyApi\Model\OauthClientPost

try {
    $result = $apiInstance->createOAuth2Client($oauth_client_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth2ClientsApi->createOAuth2Client: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **oauth_client_post** | [**\LaunchDarklyApi\Model\OauthClientPost**](../Model/OauthClientPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Client**](../Model/Client.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteOAuthClient()`

```php
deleteOAuthClient($client_id)
```

Delete OAuth 2.0 client

Delete an existing OAuth 2.0 client by unique client ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\OAuth2ClientsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$client_id = 'client_id_example'; // string | The client ID

try {
    $apiInstance->deleteOAuthClient($client_id);
} catch (Exception $e) {
    echo 'Exception when calling OAuth2ClientsApi->deleteOAuthClient: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **client_id** | **string**| The client ID |

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

## `getOAuthClientById()`

```php
getOAuthClientById($client_id): \LaunchDarklyApi\Model\Client
```

Get client by ID

Get a registered OAuth 2.0 client by unique client ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\OAuth2ClientsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$client_id = 'client_id_example'; // string | The client ID

try {
    $result = $apiInstance->getOAuthClientById($client_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth2ClientsApi->getOAuthClientById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **client_id** | **string**| The client ID |

### Return type

[**\LaunchDarklyApi\Model\Client**](../Model/Client.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOAuthClients()`

```php
getOAuthClients(): \LaunchDarklyApi\Model\ClientCollection
```

Get clients

Get all OAuth 2.0 clients registered by your account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\OAuth2ClientsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getOAuthClients();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth2ClientsApi->getOAuthClients: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\ClientCollection**](../Model/ClientCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchOAuthClient()`

```php
patchOAuthClient($client_id, $patch_operation): \LaunchDarklyApi\Model\Client
```

Patch client by ID

Patch an existing OAuth 2.0 client by client ID. Updating an OAuth2 client uses a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates). Only `name`, `description`, and `redirectUri` may be patched.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\OAuth2ClientsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$client_id = 'client_id_example'; // string | The client ID
$patch_operation = [{"op":"replace","path":"/name","value":"Example Client V2"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchOAuthClient($client_id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OAuth2ClientsApi->patchOAuthClient: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **client_id** | **string**| The client ID |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Client**](../Model/Client.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
