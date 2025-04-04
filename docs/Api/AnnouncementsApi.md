# LaunchDarklyApi\AnnouncementsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAnnouncementPublic()**](AnnouncementsApi.md#createAnnouncementPublic) | **POST** /api/v2/announcements | Create an announcement
[**deleteAnnouncementPublic()**](AnnouncementsApi.md#deleteAnnouncementPublic) | **DELETE** /api/v2/announcements/{announcementId} | Delete an announcement
[**getAnnouncementsPublic()**](AnnouncementsApi.md#getAnnouncementsPublic) | **GET** /api/v2/announcements | Get announcements
[**updateAnnouncementPublic()**](AnnouncementsApi.md#updateAnnouncementPublic) | **PATCH** /api/v2/announcements/{announcementId} | Update an announcement


## `createAnnouncementPublic()`

```php
createAnnouncementPublic($create_announcement_body): \LaunchDarklyApi\Model\AnnouncementResponse
```

Create an announcement

Create an announcement

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AnnouncementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_announcement_body = new \LaunchDarklyApi\Model\CreateAnnouncementBody(); // \LaunchDarklyApi\Model\CreateAnnouncementBody | Announcement request body

try {
    $result = $apiInstance->createAnnouncementPublic($create_announcement_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnnouncementsApi->createAnnouncementPublic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_announcement_body** | [**\LaunchDarklyApi\Model\CreateAnnouncementBody**](../Model/CreateAnnouncementBody.md)| Announcement request body |

### Return type

[**\LaunchDarklyApi\Model\AnnouncementResponse**](../Model/AnnouncementResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAnnouncementPublic()`

```php
deleteAnnouncementPublic($announcement_id)
```

Delete an announcement

Delete an announcement

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AnnouncementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$announcement_id = 1234567890; // string

try {
    $apiInstance->deleteAnnouncementPublic($announcement_id);
} catch (Exception $e) {
    echo 'Exception when calling AnnouncementsApi->deleteAnnouncementPublic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **announcement_id** | **string**|  |

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

## `getAnnouncementsPublic()`

```php
getAnnouncementsPublic($status, $limit, $offset): \LaunchDarklyApi\Model\GetAnnouncementsPublic200Response
```

Get announcements

Get announcements

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AnnouncementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status = active; // string | Filter announcements by status.
$limit = 56; // int | The number of announcements to return.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getAnnouncementsPublic($status, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnnouncementsApi->getAnnouncementsPublic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **status** | **string**| Filter announcements by status. | [optional]
 **limit** | **int**| The number of announcements to return. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\GetAnnouncementsPublic200Response**](../Model/GetAnnouncementsPublic200Response.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAnnouncementPublic()`

```php
updateAnnouncementPublic($announcement_id, $announcement_patch_operation): \LaunchDarklyApi\Model\AnnouncementResponse
```

Update an announcement

Update an announcement

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AnnouncementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$announcement_id = 1234567890; // string
$announcement_patch_operation = array(new \LaunchDarklyApi\Model\AnnouncementPatchOperation()); // \LaunchDarklyApi\Model\AnnouncementPatchOperation[] | Update announcement request body

try {
    $result = $apiInstance->updateAnnouncementPublic($announcement_id, $announcement_patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnnouncementsApi->updateAnnouncementPublic: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **announcement_id** | **string**|  |
 **announcement_patch_operation** | [**\LaunchDarklyApi\Model\AnnouncementPatchOperation[]**](../Model/AnnouncementPatchOperation.md)| Update announcement request body |

### Return type

[**\LaunchDarklyApi\Model\AnnouncementResponse**](../Model/AnnouncementResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
