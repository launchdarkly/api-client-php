# LaunchDarklyApi\LayersApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createLayer()**](LayersApi.md#createLayer) | **POST** /api/v2/projects/{projectKey}/layers | Create layer
[**getLayers()**](LayersApi.md#getLayers) | **GET** /api/v2/projects/{projectKey}/layers | Get layers
[**updateLayer()**](LayersApi.md#updateLayer) | **PATCH** /api/v2/projects/{projectKey}/layers/{layerKey} | Update layer


## `createLayer()`

```php
createLayer($project_key, $layer_post): \LaunchDarklyApi\Model\LayerRep
```

Create layer

Create a layer. Experiments running in the same layer are granted mutually-exclusive traffic.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\LayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$layer_post = new \LaunchDarklyApi\Model\LayerPost(); // \LaunchDarklyApi\Model\LayerPost

try {
    $result = $apiInstance->createLayer($project_key, $layer_post);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LayersApi->createLayer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **layer_post** | [**\LaunchDarklyApi\Model\LayerPost**](../Model/LayerPost.md)|  |

### Return type

[**\LaunchDarklyApi\Model\LayerRep**](../Model/LayerRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLayers()`

```php
getLayers($project_key, $filter): \LaunchDarklyApi\Model\LayerCollectionRep
```

Get layers

Get a collection of all layers for a project

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\LayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$filter = 'filter_example'; // string | A comma-separated list of filters. This endpoint only accepts filtering by `experimentKey`. The filter returns layers which include that experiment for the selected environment(s). For example: `filter=reservations.experimentKey contains expKey`.

try {
    $result = $apiInstance->getLayers($project_key, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LayersApi->getLayers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **filter** | **string**| A comma-separated list of filters. This endpoint only accepts filtering by &#x60;experimentKey&#x60;. The filter returns layers which include that experiment for the selected environment(s). For example: &#x60;filter&#x3D;reservations.experimentKey contains expKey&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\LayerCollectionRep**](../Model/LayerCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateLayer()`

```php
updateLayer($project_key, $layer_key, $layer_patch_input): \LaunchDarklyApi\Model\LayerRep
```

Update layer

Update a layer by adding, changing, or removing traffic reservations for experiments, or by changing layer name or description. Updating a layer uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating layers.  <details> <summary>Click to expand instructions for <strong>updating layers</strong></summary>  #### updateName  Updates the layer name.  ##### Parameters  - `name`: The new layer name.  Here's an example:  ```json {   \"instructions\": [{       \"kind\": \"updateName\",       \"name\": \"New name\"   }] } ```  #### updateDescription  Updates the layer description.  ##### Parameters  - `description`: The new description.  Here's an example:  ```json {   \"instructions\": [{       \"kind\": \"updateDescription\",       \"description\": \"New description\"   }] } ```  #### updateExperimentReservation  Adds or updates a traffic reservation for an experiment in a layer.  ##### Parameters  - `experimentKey`: The key of the experiment whose reservation you are adding to or updating in the layer. - `reservationPercent`: The amount of traffic in the layer to reserve. Must be an integer. Zero is allowed until iteration start.  Here's an example:  ```json {   \"environmentKey\": \"production\",   \"instructions\": [{       \"kind\": \"updateExperimentReservation\",       \"experimentKey\": \"exp-key\",       \"reservationPercent\": 10   }] } ```  #### removeExperiment  Removes a traffic reservation for an experiment from a layer.  ##### Parameters  - `experimentKey`: The key of the experiment whose reservation you want to remove from the layer.  Here's an example:  ```json {   \"environmentKey\": \"production\",   \"instructions\": [{       \"kind\": \"removeExperiment\",       \"experimentKey\": \"exp-key\"   }] } ```  </details>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\LayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_key = 'project_key_example'; // string | The project key
$layer_key = 'layer_key_example'; // string | The layer key
$layer_patch_input = {"comment":"Example comment describing the update","environmentKey":"production","instructions":[{"experimentKey":"checkout-button-color","kind":"updateExperimentReservation","reservationPercent":25}]}; // \LaunchDarklyApi\Model\LayerPatchInput

try {
    $result = $apiInstance->updateLayer($project_key, $layer_key, $layer_patch_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LayersApi->updateLayer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_key** | **string**| The project key |
 **layer_key** | **string**| The layer key |
 **layer_patch_input** | [**\LaunchDarklyApi\Model\LayerPatchInput**](../Model/LayerPatchInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\LayerRep**](../Model/LayerRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
