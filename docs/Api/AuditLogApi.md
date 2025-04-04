# LaunchDarklyApi\AuditLogApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAuditLogEntries()**](AuditLogApi.md#getAuditLogEntries) | **GET** /api/v2/auditlog | List audit log entries
[**getAuditLogEntry()**](AuditLogApi.md#getAuditLogEntry) | **GET** /api/v2/auditlog/{id} | Get audit log entry
[**postAuditLogEntries()**](AuditLogApi.md#postAuditLogEntries) | **POST** /api/v2/auditlog | Search audit log entries


## `getAuditLogEntries()`

```php
getAuditLogEntries($before, $after, $q, $limit, $spec): \LaunchDarklyApi\Model\AuditLogEntryListingRepCollection
```

List audit log entries

Get a list of all audit log entries. The query parameters let you restrict the results that return by date ranges, resource specifiers, or a full-text search query.  LaunchDarkly uses a resource specifier syntax to name resources or collections of resources. To learn more, read [About the resource specifier syntax](https://launchdarkly.com/docs/home/account/role-resources#about-the-resource-specifier-syntax).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AuditLogApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$before = 56; // int | A timestamp filter, expressed as a Unix epoch time in milliseconds.  All entries this returns occurred before the timestamp.
$after = 56; // int | A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries this returns occurred after the timestamp.
$q = 'q_example'; // string | Text to search for. You can search for the full or partial name of the resource.
$limit = 56; // int | A limit on the number of audit log entries that return. Set between 1 and 20. The default is 10.
$spec = 'spec_example'; // string | A resource specifier that lets you filter audit log listings by resource

try {
    $result = $apiInstance->getAuditLogEntries($before, $after, $q, $limit, $spec);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuditLogApi->getAuditLogEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **before** | **int**| A timestamp filter, expressed as a Unix epoch time in milliseconds.  All entries this returns occurred before the timestamp. | [optional]
 **after** | **int**| A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries this returns occurred after the timestamp. | [optional]
 **q** | **string**| Text to search for. You can search for the full or partial name of the resource. | [optional]
 **limit** | **int**| A limit on the number of audit log entries that return. Set between 1 and 20. The default is 10. | [optional]
 **spec** | **string**| A resource specifier that lets you filter audit log listings by resource | [optional]

### Return type

[**\LaunchDarklyApi\Model\AuditLogEntryListingRepCollection**](../Model/AuditLogEntryListingRepCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAuditLogEntry()`

```php
getAuditLogEntry($id): \LaunchDarklyApi\Model\AuditLogEntryRep
```

Get audit log entry

Fetch a detailed audit log entry representation. The detailed representation includes several fields that are not present in the summary representation, including:  - `delta`: the JSON patch body that was used in the request to update the entity - `previousVersion`: a JSON representation of the previous version of the entity - `currentVersion`: a JSON representation of the current version of the entity

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AuditLogApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the audit log entry

try {
    $result = $apiInstance->getAuditLogEntry($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuditLogApi->getAuditLogEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the audit log entry |

### Return type

[**\LaunchDarklyApi\Model\AuditLogEntryRep**](../Model/AuditLogEntryRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postAuditLogEntries()`

```php
postAuditLogEntries($before, $after, $q, $limit, $statement_post): \LaunchDarklyApi\Model\AuditLogEntryListingRepCollection
```

Search audit log entries

Search your audit log entries. The query parameters let you restrict the results that return by date ranges, or a full-text search query. The request body lets you restrict the results that return by resource specifiers.  LaunchDarkly uses a resource specifier syntax to name resources or collections of resources. To learn more, read [About the resource specifier syntax](https://launchdarkly.com/docs/home/account/role-resources#about-the-resource-specifier-syntax).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AuditLogApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$before = 56; // int | A timestamp filter, expressed as a Unix epoch time in milliseconds.  All entries returned occurred before the timestamp.
$after = 56; // int | A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries returned occurred after the timestamp.
$q = 'q_example'; // string | Text to search for. You can search for the full or partial name of the resource.
$limit = 56; // int | A limit on the number of audit log entries that return. Set between 1 and 20. The default is 10.
$statement_post = array(new \LaunchDarklyApi\Model\StatementPost()); // \LaunchDarklyApi\Model\StatementPost[]

try {
    $result = $apiInstance->postAuditLogEntries($before, $after, $q, $limit, $statement_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuditLogApi->postAuditLogEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **before** | **int**| A timestamp filter, expressed as a Unix epoch time in milliseconds.  All entries returned occurred before the timestamp. | [optional]
 **after** | **int**| A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries returned occurred after the timestamp. | [optional]
 **q** | **string**| Text to search for. You can search for the full or partial name of the resource. | [optional]
 **limit** | **int**| A limit on the number of audit log entries that return. Set between 1 and 20. The default is 10. | [optional]
 **statement_post** | [**\LaunchDarklyApi\Model\StatementPost[]**](../Model/StatementPost.md)|  | [optional]

### Return type

[**\LaunchDarklyApi\Model\AuditLogEntryListingRepCollection**](../Model/AuditLogEntryListingRepCollection.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
