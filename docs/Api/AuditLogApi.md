# LaunchDarklyApi\AuditLogApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAuditLogEntries()**](AuditLogApi.md#getAuditLogEntries) | **GET** /api/v2/auditlog | List audit log feature flag entries
[**getAuditLogEntry()**](AuditLogApi.md#getAuditLogEntry) | **GET** /api/v2/auditlog/{id} | Get audit log entry


## `getAuditLogEntries()`

```php
getAuditLogEntries($before, $after, $q, $limit, $spec): \LaunchDarklyApi\Model\AuditLogEntryListingRepCollection
```

List audit log feature flag entries

Get a list of all audit log entries. The query parameters let you restrict the results that return by date ranges, resource specifiers, or a full-text search query.

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
$q = 'q_example'; // string | Text to search for. You can search for the full or partial name of the resource, or full or partial email address of the member who made a change.
$limit = 56; // int | A limit on the number of audit log entries that return. Set between 1 and 20.
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
 **q** | **string**| Text to search for. You can search for the full or partial name of the resource, or full or partial email address of the member who made a change. | [optional]
 **limit** | **int**| A limit on the number of audit log entries that return. Set between 1 and 20. | [optional]
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

Fetch a detailed audit log entry representation. The detailed representation includes several fields that are not present in the summary representation:  - `delta`: the JSON patch body that was used in the request to update the entity - `previousVersion`: a JSON representation of the previous version of the entity - `currentVersion`: a JSON representation of the current version of the entity

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
