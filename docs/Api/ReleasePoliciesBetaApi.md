# LaunchDarklyApi\ReleasePoliciesBetaApi

All URIs are relative to https://app.launchdarkly.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteReleasePolicy()**](ReleasePoliciesBetaApi.md#deleteReleasePolicy) | **DELETE** /api/v2/projects/{projectKey}/release-policies/{policyKey} | Delete a release policy |
| [**getReleasePolicies()**](ReleasePoliciesBetaApi.md#getReleasePolicies) | **GET** /api/v2/projects/{projectKey}/release-policies | List release policies |
| [**getReleasePolicy()**](ReleasePoliciesBetaApi.md#getReleasePolicy) | **GET** /api/v2/projects/{projectKey}/release-policies/{policyKey} | Get a release policy by key |
| [**postReleasePoliciesOrder()**](ReleasePoliciesBetaApi.md#postReleasePoliciesOrder) | **POST** /api/v2/projects/{projectKey}/release-policies/order | Update the order of existing release policies |
| [**postReleasePolicy()**](ReleasePoliciesBetaApi.md#postReleasePolicy) | **POST** /api/v2/projects/{projectKey}/release-policies | Create a release policy |
| [**putReleasePolicy()**](ReleasePoliciesBetaApi.md#putReleasePolicy) | **PUT** /api/v2/projects/{projectKey}/release-policies/{policyKey} | Update a release policy |


## `deleteReleasePolicy()`

```php
deleteReleasePolicy($ld_api_version, $project_key, $policy_key)
```

Delete a release policy

Delete an existing release policy for the specified project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePoliciesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string | The project key
$policy_key = production-release; // string | The human-readable key of the release policy

try {
    $apiInstance->deleteReleasePolicy($ld_api_version, $project_key, $policy_key);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePoliciesBetaApi->deleteReleasePolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**| The project key | |
| **policy_key** | **string**| The human-readable key of the release policy | |

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

## `getReleasePolicies()`

```php
getReleasePolicies($ld_api_version, $project_key, $exclude_default): \LaunchDarklyApi\Model\ReleasePoliciesResponse
```

List release policies

Get a list of release policies for the specified project with optional filtering.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePoliciesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string | The project key
$exclude_default = false; // bool | When true, exclude the default release policy from the response. When false or omitted, include the default policy if an environment filter is present.

try {
    $result = $apiInstance->getReleasePolicies($ld_api_version, $project_key, $exclude_default);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePoliciesBetaApi->getReleasePolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**| The project key | |
| **exclude_default** | **bool**| When true, exclude the default release policy from the response. When false or omitted, include the default policy if an environment filter is present. | [optional] [default to false] |

### Return type

[**\LaunchDarklyApi\Model\ReleasePoliciesResponse**](../Model/ReleasePoliciesResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReleasePolicy()`

```php
getReleasePolicy($ld_api_version, $project_key, $policy_key): \LaunchDarklyApi\Model\ReleasePolicy
```

Get a release policy by key

Retrieve a single release policy by its key for the specified project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePoliciesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string | The project key
$policy_key = production-release; // string | The release policy key

try {
    $result = $apiInstance->getReleasePolicy($ld_api_version, $project_key, $policy_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePoliciesBetaApi->getReleasePolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**| The project key | |
| **policy_key** | **string**| The release policy key | |

### Return type

[**\LaunchDarklyApi\Model\ReleasePolicy**](../Model/ReleasePolicy.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postReleasePoliciesOrder()`

```php
postReleasePoliciesOrder($ld_api_version, $project_key, $request_body): \LaunchDarklyApi\Model\ReleasePolicy[]
```

Update the order of existing release policies

Update the order of existing release policies for the specified project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePoliciesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string | The project key
$request_body = array('request_body_example'); // string[] | Array of release policy keys in the desired rank order (scoped policies only). These keys must include _all_ of the scoped release policies for the project.

try {
    $result = $apiInstance->postReleasePoliciesOrder($ld_api_version, $project_key, $request_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePoliciesBetaApi->postReleasePoliciesOrder: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**| The project key | |
| **request_body** | [**string[]**](../Model/string.md)| Array of release policy keys in the desired rank order (scoped policies only). These keys must include _all_ of the scoped release policies for the project. | |

### Return type

[**\LaunchDarklyApi\Model\ReleasePolicy[]**](../Model/ReleasePolicy.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postReleasePolicy()`

```php
postReleasePolicy($ld_api_version, $project_key, $post_release_policy_request): \LaunchDarklyApi\Model\ReleasePolicy
```

Create a release policy

Create a new release policy for the specified project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePoliciesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string | The project key
$post_release_policy_request = new \LaunchDarklyApi\Model\PostReleasePolicyRequest(); // \LaunchDarklyApi\Model\PostReleasePolicyRequest | Release policy to create

try {
    $result = $apiInstance->postReleasePolicy($ld_api_version, $project_key, $post_release_policy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePoliciesBetaApi->postReleasePolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**| The project key | |
| **post_release_policy_request** | [**\LaunchDarklyApi\Model\PostReleasePolicyRequest**](../Model/PostReleasePolicyRequest.md)| Release policy to create | |

### Return type

[**\LaunchDarklyApi\Model\ReleasePolicy**](../Model/ReleasePolicy.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putReleasePolicy()`

```php
putReleasePolicy($ld_api_version, $project_key, $policy_key, $put_release_policy_request): \LaunchDarklyApi\Model\ReleasePolicy
```

Update a release policy

Update an existing release policy for the specified project.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\ReleasePoliciesBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string | The project key
$policy_key = production-release; // string | The human-readable key of the release policy
$put_release_policy_request = new \LaunchDarklyApi\Model\PutReleasePolicyRequest(); // \LaunchDarklyApi\Model\PutReleasePolicyRequest | Release policy data to update

try {
    $result = $apiInstance->putReleasePolicy($ld_api_version, $project_key, $policy_key, $put_release_policy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReleasePoliciesBetaApi->putReleasePolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ld_api_version** | **string**| Version of the endpoint. | |
| **project_key** | **string**| The project key | |
| **policy_key** | **string**| The human-readable key of the release policy | |
| **put_release_policy_request** | [**\LaunchDarklyApi\Model\PutReleasePolicyRequest**](../Model/PutReleasePolicyRequest.md)| Release policy data to update | |

### Return type

[**\LaunchDarklyApi\Model\ReleasePolicy**](../Model/ReleasePolicy.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
