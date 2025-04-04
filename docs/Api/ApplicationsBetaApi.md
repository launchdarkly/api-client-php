# LaunchDarklyApi\ApplicationsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteApplication()**](ApplicationsBetaApi.md#deleteApplication) | **DELETE** /api/v2/applications/{applicationKey} | Delete application
[**deleteApplicationVersion()**](ApplicationsBetaApi.md#deleteApplicationVersion) | **DELETE** /api/v2/applications/{applicationKey}/versions/{versionKey} | Delete application version
[**getApplication()**](ApplicationsBetaApi.md#getApplication) | **GET** /api/v2/applications/{applicationKey} | Get application by key
[**getApplicationVersions()**](ApplicationsBetaApi.md#getApplicationVersions) | **GET** /api/v2/applications/{applicationKey}/versions | Get application versions by application key
[**getApplications()**](ApplicationsBetaApi.md#getApplications) | **GET** /api/v2/applications | Get applications
[**patchApplication()**](ApplicationsBetaApi.md#patchApplication) | **PATCH** /api/v2/applications/{applicationKey} | Update application
[**patchApplicationVersion()**](ApplicationsBetaApi.md#patchApplicationVersion) | **PATCH** /api/v2/applications/{applicationKey}/versions/{versionKey} | Update application version


## `deleteApplication()`

```php
deleteApplication($application_key)
```

Delete application

Delete an application.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApplicationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_key = 'application_key_example'; // string | The application key

try {
    $apiInstance->deleteApplication($application_key);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsBetaApi->deleteApplication: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **application_key** | **string**| The application key |

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

## `deleteApplicationVersion()`

```php
deleteApplicationVersion($application_key, $version_key)
```

Delete application version

Delete an application version.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApplicationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_key = 'application_key_example'; // string | The application key
$version_key = 'version_key_example'; // string | The application version key

try {
    $apiInstance->deleteApplicationVersion($application_key, $version_key);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsBetaApi->deleteApplicationVersion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **application_key** | **string**| The application key |
 **version_key** | **string**| The application version key |

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

## `getApplication()`

```php
getApplication($application_key, $expand): \LaunchDarklyApi\Model\ApplicationRep
```

Get application by key

Retrieve an application by the application key.  ### Expanding the application response  LaunchDarkly supports expanding the \"Get application\" response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `flags` includes details on the flags that have been evaluated by the application  For example, use `?expand=flags` to include the `flags` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApplicationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_key = 'application_key_example'; // string | The application key
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response. Options: `flags`.

try {
    $result = $apiInstance->getApplication($application_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsBetaApi->getApplication: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **application_key** | **string**| The application key |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. Options: &#x60;flags&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ApplicationRep**](../Model/ApplicationRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplicationVersions()`

```php
getApplicationVersions($application_key, $filter, $limit, $offset, $sort): \LaunchDarklyApi\Model\ApplicationVersionsCollectionRep
```

Get application versions by application key

Get a list of versions for a specific application in an account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApplicationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_key = 'application_key_example'; // string | The application key
$filter = 'filter_example'; // string | Accepts filter by `key`, `name`, `supported`, and `autoAdded`. To learn more about the filter syntax, read [Filtering applications and application versions](https://launchdarkly.com/docs/api/applications-beta#filtering-applications-and-application-versions).
$limit = 56; // int | The number of versions to return. Defaults to 50.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$sort = 'sort_example'; // string | Accepts sorting order and fields. Fields can be comma separated. Possible fields are `creationDate`, `name`. Examples: `sort=name` sort by names ascending, `sort=-name,creationDate` sort by names descending and creationDate ascending.

try {
    $result = $apiInstance->getApplicationVersions($application_key, $filter, $limit, $offset, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsBetaApi->getApplicationVersions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **application_key** | **string**| The application key |
 **filter** | **string**| Accepts filter by &#x60;key&#x60;, &#x60;name&#x60;, &#x60;supported&#x60;, and &#x60;autoAdded&#x60;. To learn more about the filter syntax, read [Filtering applications and application versions](https://launchdarkly.com/docs/api/applications-beta#filtering-applications-and-application-versions). | [optional]
 **limit** | **int**| The number of versions to return. Defaults to 50. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]
 **sort** | **string**| Accepts sorting order and fields. Fields can be comma separated. Possible fields are &#x60;creationDate&#x60;, &#x60;name&#x60;. Examples: &#x60;sort&#x3D;name&#x60; sort by names ascending, &#x60;sort&#x3D;-name,creationDate&#x60; sort by names descending and creationDate ascending. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ApplicationVersionsCollectionRep**](../Model/ApplicationVersionsCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplications()`

```php
getApplications($filter, $limit, $offset, $sort, $expand): \LaunchDarklyApi\Model\ApplicationCollectionRep
```

Get applications

Get a list of applications.  ### Expanding the applications response  LaunchDarkly supports expanding the \"Get applications\" response to include additional fields.  To expand the response, append the `expand` query parameter and include the following:  * `flags` includes details on the flags that have been evaluated by the application  For example, use `?expand=flags` to include the `flags` field in the response. By default, this field is **not** included in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApplicationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = 'filter_example'; // string | Accepts filter by `key`, `name`, `kind`, and `autoAdded`. To learn more about the filter syntax, read [Filtering applications and application versions](https://launchdarkly.com/docs/api/applications-beta#filtering-applications-and-application-versions).
$limit = 56; // int | The number of applications to return. Defaults to 10.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$sort = 'sort_example'; // string | Accepts sorting order and fields. Fields can be comma separated. Possible fields are `creationDate`, `name`. Examples: `sort=name` sort by names ascending, `sort=-name,creationDate` sort by names descending and creationDate ascending.
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response. Options: `flags`.

try {
    $result = $apiInstance->getApplications($filter, $limit, $offset, $sort, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsBetaApi->getApplications: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Accepts filter by &#x60;key&#x60;, &#x60;name&#x60;, &#x60;kind&#x60;, and &#x60;autoAdded&#x60;. To learn more about the filter syntax, read [Filtering applications and application versions](https://launchdarkly.com/docs/api/applications-beta#filtering-applications-and-application-versions). | [optional]
 **limit** | **int**| The number of applications to return. Defaults to 10. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]
 **sort** | **string**| Accepts sorting order and fields. Fields can be comma separated. Possible fields are &#x60;creationDate&#x60;, &#x60;name&#x60;. Examples: &#x60;sort&#x3D;name&#x60; sort by names ascending, &#x60;sort&#x3D;-name,creationDate&#x60; sort by names descending and creationDate ascending. | [optional]
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. Options: &#x60;flags&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\ApplicationCollectionRep**](../Model/ApplicationCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchApplication()`

```php
patchApplication($application_key, $patch_operation): \LaunchDarklyApi\Model\ApplicationRep
```

Update application

Update an application. You can update the `description` and `kind` fields. Requires a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes to the application. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApplicationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_key = 'application_key_example'; // string | The application key
$patch_operation = [{"op":"replace","path":"/description","value":"Updated description"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchApplication($application_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsBetaApi->patchApplication: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **application_key** | **string**| The application key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ApplicationRep**](../Model/ApplicationRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchApplicationVersion()`

```php
patchApplicationVersion($application_key, $version_key, $patch_operation): \LaunchDarklyApi\Model\ApplicationVersionRep
```

Update application version

Update an application version. You can update the `supported` field. Requires a [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) representation of the desired changes to the application version. To learn more, read [Updates](https://launchdarkly.com/docs/api#updates).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ApplicationsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_key = 'application_key_example'; // string | The application key
$version_key = 'version_key_example'; // string | The application version key
$patch_operation = [{"op":"replace","path":"/supported","value":"false"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchApplicationVersion($application_key, $version_key, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsBetaApi->patchApplicationVersion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **application_key** | **string**| The application key |
 **version_key** | **string**| The application version key |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\ApplicationVersionRep**](../Model/ApplicationVersionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
