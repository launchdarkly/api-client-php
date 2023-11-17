# LaunchDarklyApi\SegmentsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createBigSegmentExport()**](SegmentsBetaApi.md#createBigSegmentExport) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/exports | Create Big Segment export
[**createBigSegmentImport()**](SegmentsBetaApi.md#createBigSegmentImport) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/imports | Create Big Segment import
[**getBigSegmentExport()**](SegmentsBetaApi.md#getBigSegmentExport) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/exports/{exportID} | Get Big Segment export
[**getBigSegmentImport()**](SegmentsBetaApi.md#getBigSegmentImport) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/imports/{importID} | Get Big Segment import


## `createBigSegmentExport()`

```php
createBigSegmentExport($project_key, $environment_key, $segment_key)
```

Create Big Segment export

Starts a new export process for a Big Segment. This is an export for a list-based segment that can include more than 15,000 entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key

try {
    $apiInstance->createBigSegmentExport($project_key, $environment_key, $segment_key);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsBetaApi->createBigSegmentExport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |

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

## `createBigSegmentImport()`

```php
createBigSegmentImport($project_key, $environment_key, $segment_key, $file, $mode)
```

Create Big Segment import

Start a new import process for a Big Segment. This is an import for a list-based segment that can include more than 15,000 entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key
$file = "/path/to/file.txt"; // \SplFileObject | CSV file containing keys
$mode = 'mode_example'; // string | Import mode. Use either `merge` or `replace`

try {
    $apiInstance->createBigSegmentImport($project_key, $environment_key, $segment_key, $file, $mode);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsBetaApi->createBigSegmentImport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |
 **file** | **\SplFileObject****\SplFileObject**| CSV file containing keys | [optional]
 **mode** | **string**| Import mode. Use either &#x60;merge&#x60; or &#x60;replace&#x60; | [optional]

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBigSegmentExport()`

```php
getBigSegmentExport($project_key, $environment_key, $segment_key, $export_id): \LaunchDarklyApi\Model\Export
```

Get Big Segment export

Returns information about a Big Segment export process. This is the export of a list-based segment that can include more than 15,000 entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key
$export_id = 'export_id_example'; // string | The export ID

try {
    $result = $apiInstance->getBigSegmentExport($project_key, $environment_key, $segment_key, $export_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsBetaApi->getBigSegmentExport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |
 **export_id** | **string**| The export ID |

### Return type

[**\LaunchDarklyApi\Model\Export**](../Model/Export.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBigSegmentImport()`

```php
getBigSegmentImport($project_key, $environment_key, $segment_key, $import_id): \LaunchDarklyApi\Model\Import
```

Get Big Segment import

Returns information about a Big Segment import process. This is the import of a list-based segment that can include more than 15,000 entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\SegmentsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$environment_key = 'environment_key_example'; // string | The environment key
$segment_key = 'segment_key_example'; // string | The segment key
$import_id = 'import_id_example'; // string | The import ID

try {
    $result = $apiInstance->getBigSegmentImport($project_key, $environment_key, $segment_key, $import_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsBetaApi->getBigSegmentImport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **environment_key** | **string**| The environment key |
 **segment_key** | **string**| The segment key |
 **import_id** | **string**| The import ID |

### Return type

[**\LaunchDarklyApi\Model\Import**](../Model/Import.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
