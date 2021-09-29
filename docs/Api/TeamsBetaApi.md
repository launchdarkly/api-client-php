# LaunchDarklyApi\TeamsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteTeam()**](TeamsBetaApi.md#deleteTeam) | **DELETE** /api/v2/teams/{key} | Delete team by key
[**getTeam()**](TeamsBetaApi.md#getTeam) | **GET** /api/v2/teams/{key} | Get team by key
[**getTeams()**](TeamsBetaApi.md#getTeams) | **GET** /api/v2/teams | Get all teams
[**patchTeam()**](TeamsBetaApi.md#patchTeam) | **PATCH** /api/v2/teams/{key} | Patch team by key
[**postTeam()**](TeamsBetaApi.md#postTeam) | **POST** /api/v2/teams | Create team


## `deleteTeam()`

```php
deleteTeam($key)
```

Delete team by key

Delete a team by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string | The team key

try {
    $apiInstance->deleteTeam($key);
} catch (Exception $e) {
    echo 'Exception when calling TeamsBetaApi->deleteTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The team key |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTeam()`

```php
getTeam($key): \LaunchDarklyApi\Model\TeamRep
```

Get team by key

Fetch a team by key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string | The team key

try {
    $result = $apiInstance->getTeam($key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsBetaApi->getTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The team key |

### Return type

[**\LaunchDarklyApi\Model\TeamRep**](../Model/TeamRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTeams()`

```php
getTeams(): \LaunchDarklyApi\Model\TeamCollectionRep
```

Get all teams

Fetch all teams.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getTeams();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsBetaApi->getTeams: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LaunchDarklyApi\Model\TeamCollectionRep**](../Model/TeamCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchTeam()`

```php
patchTeam($key, $team_patch_input): \LaunchDarklyApi\Model\TeamCollectionRep
```

Patch team by key

Perform a partial update to a team.  The body of a semantic patch request takes the following three properties:  1. comment `string`: (Optional) A description of the update. 1. environmentKey `string`: (Required) The key of the LaunchDarkly environment. 1. instructions `array`: (Required) The action or list of actions to be performed by the update. Each update action in the list must be an object/hash table with a `kind` property, although depending on the action, other properties may be necessary. Read below for more information on the specific supported semantic patch instructions.  If any instruction in the patch encounters an error, the error will be returned and the flag will not be changed. In general, instructions will silently do nothing if the flag is already in the state requested by the patch instruction. They will generally error if a parameter refers to something that does not exist. Other specific error conditions are noted in the instruction descriptions.  ### Instructions  #### `addCustomRoles`  Adds custom roles to the team. Team members will have these custom roles granted to them.  ##### Parameters  - `values`: list of custom role keys  #### `removeCustomRoles`  Removes the custom roles on the team. Team members will no longer have these custom roles granted to them.  ##### Parameters  - `values`: list of custom role keys  #### `addMembers`  Adds members to the team.  ##### Parameters  - `values`: list of member IDs  #### `removeMembers`  Removes members from the team.  ##### Parameters  - `values`: list of member IDs  #### `addPermissionGrants`  Adds permission grants to members for the team, allowing them to, for example, act as a team maintainer. A permission grant may have either an `actionSet` or a list of `actions` but not both at the same time. The members do not have to be team members to have a permission grant for the team.  ##### Parameters  - `actionSet`: name of the action set - `actions`: list of actions - `memberIDs`: list of member IDs  #### `removePermissionGrants`  Removes permission grants from members for the team. The `actionSet` and `actions` must match an existing permission grant.  ##### Parameters  - `actionSet`: name of the action set - `actions`: list of actions - `memberIDs`: list of member IDs  #### `updateDescription`  Updates the team's description.  ##### Parameters  - `value`: the team's new description  #### `updateName`  Updates the team's name.  ##### Parameters  - `value`: the team's new name

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string | The team key
$team_patch_input = new \LaunchDarklyApi\Model\TeamPatchInput(); // \LaunchDarklyApi\Model\TeamPatchInput

try {
    $result = $apiInstance->patchTeam($key, $team_patch_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsBetaApi->patchTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| The team key |
 **team_patch_input** | [**\LaunchDarklyApi\Model\TeamPatchInput**](../Model/TeamPatchInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\TeamCollectionRep**](../Model/TeamCollectionRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postTeam()`

```php
postTeam($team_post_input): \LaunchDarklyApi\Model\TeamRep
```

Create team

Create a team.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_post_input = new \LaunchDarklyApi\Model\TeamPostInput(); // \LaunchDarklyApi\Model\TeamPostInput

try {
    $result = $apiInstance->postTeam($team_post_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsBetaApi->postTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_post_input** | [**\LaunchDarklyApi\Model\TeamPostInput**](../Model/TeamPostInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\TeamRep**](../Model/TeamRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
