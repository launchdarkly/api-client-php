# Swagger\Client\AuditLogApi

All URIs are relative to *https://app.launchdarkly.com/api/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAuditLogEntries**](AuditLogApi.md#getAuditLogEntries) | **GET** /auditlog | Get a list of all audit log entries. The query parameters allow you to restrict the returned results by date ranges, resource specifiers, or a full-text search query.
[**getAuditLogEntry**](AuditLogApi.md#getAuditLogEntry) | **GET** /auditlog/{resourceId} | Use this endpoint to fetch a single audit log entry by its resouce ID.


# **getAuditLogEntries**
> \Swagger\Client\Model\AuditLogEntries getAuditLogEntries($before, $after, $q, $limit, $spec)

Get a list of all audit log entries. The query parameters allow you to restrict the returned results by date ranges, resource specifiers, or a full-text search query.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\AuditLogApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$before = 8.14; // float | A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries returned will have before this timestamp.
$after = 8.14; // float | A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries returned will have occured after this timestamp.
$q = "q_example"; // string | Text to search for. You can search for the full or partial name of the resource involved or fullpartial email address of the member who made the change.
$limit = 8.14; // float | A limit on the number of audit log entries to be returned, between 1 and 20.
$spec = "spec_example"; // string | A resource specifier, allowing you to filter audit log listings by resource.

try {
    $result = $apiInstance->getAuditLogEntries($before, $after, $q, $limit, $spec);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuditLogApi->getAuditLogEntries: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **before** | **float**| A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries returned will have before this timestamp. | [optional]
 **after** | **float**| A timestamp filter, expressed as a Unix epoch time in milliseconds. All entries returned will have occured after this timestamp. | [optional]
 **q** | **string**| Text to search for. You can search for the full or partial name of the resource involved or fullpartial email address of the member who made the change. | [optional]
 **limit** | **float**| A limit on the number of audit log entries to be returned, between 1 and 20. | [optional]
 **spec** | **string**| A resource specifier, allowing you to filter audit log listings by resource. | [optional]

### Return type

[**\Swagger\Client\Model\AuditLogEntries**](../Model/AuditLogEntries.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAuditLogEntry**
> \Swagger\Client\Model\AuditLogEntry getAuditLogEntry($resource_id)

Use this endpoint to fetch a single audit log entry by its resouce ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: Token
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new Swagger\Client\Api\AuditLogApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$resource_id = "resource_id_example"; // string | The resource ID.

try {
    $result = $apiInstance->getAuditLogEntry($resource_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuditLogApi->getAuditLogEntry: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **resource_id** | **string**| The resource ID. |

### Return type

[**\Swagger\Client\Model\AuditLogEntry**](../Model/AuditLogEntry.md)

### Authorization

[Token](../../README.md#Token)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

