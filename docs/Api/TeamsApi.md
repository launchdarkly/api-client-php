# LaunchDarklyApi\TeamsApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteTeam()**](TeamsApi.md#deleteTeam) | **DELETE** /api/v2/teams/{teamKey} | Delete team
[**getTeam()**](TeamsApi.md#getTeam) | **GET** /api/v2/teams/{teamKey} | Get team
[**getTeamMaintainers()**](TeamsApi.md#getTeamMaintainers) | **GET** /api/v2/teams/{teamKey}/maintainers | Get team maintainers
[**getTeamRoles()**](TeamsApi.md#getTeamRoles) | **GET** /api/v2/teams/{teamKey}/roles | Get team custom roles
[**getTeams()**](TeamsApi.md#getTeams) | **GET** /api/v2/teams | List teams
[**patchTeam()**](TeamsApi.md#patchTeam) | **PATCH** /api/v2/teams/{teamKey} | Update team
[**postTeam()**](TeamsApi.md#postTeam) | **POST** /api/v2/teams | Create team
[**postTeamMembers()**](TeamsApi.md#postTeamMembers) | **POST** /api/v2/teams/{teamKey}/members | Add multiple members to team


## `deleteTeam()`

```php
deleteTeam($team_key)
```

Delete team

Delete a team by key. To learn more, read [Deleting a team](https://docs.launchdarkly.com/home/teams/managing#deleting-a-team).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_key = 'team_key_example'; // string | The team key

try {
    $apiInstance->deleteTeam($team_key);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->deleteTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_key** | **string**| The team key |

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

## `getTeam()`

```php
getTeam($team_key, $expand): \LaunchDarklyApi\Model\Team
```

Get team

Fetch a team by key.  ### Expanding the teams response LaunchDarkly supports four fields for expanding the \"Get team\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  * `members` includes the total count of members that belong to the team. * `roles` includes a paginated list of the custom roles that you have assigned to the team. * `projects` includes a paginated list of the projects that the team has any write access to. * `maintainers` includes a paginated list of the maintainers that you have assigned to the team.  For example, `expand=members,roles` includes the `members` and `roles` fields in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_key = 'team_key_example'; // string | The team key.
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.

try {
    $result = $apiInstance->getTeam($team_key, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->getTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_key** | **string**| The team key. |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Team**](../Model/Team.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTeamMaintainers()`

```php
getTeamMaintainers($team_key, $limit, $offset): \LaunchDarklyApi\Model\TeamMaintainers
```

Get team maintainers

Fetch the maintainers that have been assigned to the team. To learn more, read [Managing team maintainers](https://docs.launchdarkly.com/home/teams/managing#managing-team-maintainers).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_key = 'team_key_example'; // string | The team key
$limit = 56; // int | The number of maintainers to return in the response. Defaults to 20.
$offset = 56; // int | Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getTeamMaintainers($team_key, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->getTeamMaintainers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_key** | **string**| The team key |
 **limit** | **int**| The number of maintainers to return in the response. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\TeamMaintainers**](../Model/TeamMaintainers.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTeamRoles()`

```php
getTeamRoles($team_key, $limit, $offset): \LaunchDarklyApi\Model\TeamCustomRoles
```

Get team custom roles

Fetch the custom roles that have been assigned to the team. To learn more, read [Managing team permissions](https://docs.launchdarkly.com/home/teams/managing#managing-team-permissions).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_key = 'team_key_example'; // string | The team key
$limit = 56; // int | The number of roles to return in the response. Defaults to 20.
$offset = 56; // int | Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.

try {
    $result = $apiInstance->getTeamRoles($team_key, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->getTeamRoles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_key** | **string**| The team key |
 **limit** | **int**| The number of roles to return in the response. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]

### Return type

[**\LaunchDarklyApi\Model\TeamCustomRoles**](../Model/TeamCustomRoles.md)

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
getTeams($limit, $offset, $filter, $expand): \LaunchDarklyApi\Model\Teams
```

List teams

Return a list of teams.  By default, this returns the first 20 teams. Page through this list with the `limit` parameter and by following the `first`, `prev`, `next`, and `last` links in the `_links` field that returns. If those links do not appear, the pages they refer to don't exist. For example, the `first` and `prev` links will be missing from the response on the first page, because there is no previous page and you cannot return to the first page when you are already on the first page.  ### Filtering teams  LaunchDarkly supports the `query` field for filtering. `query` is a string that matches against the teams' names and keys. For example, the filter `query:abc` matches teams with the string `abc` in their name or key. The filter is not case-sensitive.  ### Expanding the teams response LaunchDarkly supports four fields for expanding the \"List teams\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  * `members` includes the total count of members that belong to the team. * `roles` includes a paginated list of the custom roles that you have assigned to the team. * `projects` includes a paginated list of the projects that the team has any write access to. * `maintainers` includes a paginated list of the maintainers that you have assigned to the team.  For example, `expand=members,roles` includes the `members` and `roles` fields in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | The number of teams to return in the response. Defaults to 20.
$offset = 56; // int | Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next `limit` items.
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is constructed as `field:value`.
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response.

try {
    $result = $apiInstance->getTeams($limit, $offset, $filter, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->getTeams: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**| The number of teams to return in the response. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and returns the next &#x60;limit&#x60; items. | [optional]
 **filter** | **string**| A comma-separated list of filters. Each filter is constructed as &#x60;field:value&#x60;. | [optional]
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Teams**](../Model/Teams.md)

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
patchTeam($team_key, $team_patch_input, $expand): \LaunchDarklyApi\Model\Team
```

Update team

Perform a partial update to a team. Updating a team uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](/reference#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating teams.  #### addCustomRoles  Adds custom roles to the team. Team members will have these custom roles granted to them.  ##### Parameters  - `values`: List of custom role keys.  #### removeCustomRoles  Removes custom roles from the team. The app will no longer grant these custom roles to the team members.  ##### Parameters  - `values`: List of custom role keys.  #### addMembers  Adds members to the team.  ##### Parameters  - `values`: List of member IDs.  #### removeMembers  Removes members from the team.  ##### Parameters  - `values`: List of member IDs.  #### addPermissionGrants  Adds permission grants to members for the team. For example, a permission grant could allow a member to act as a team maintainer. A permission grant may have either an `actionSet` or a list of `actions` but not both at the same time. The members do not have to be team members to have a permission grant for the team.  ##### Parameters  - `actionSet`: Name of the action set. - `actions`: List of actions. - `memberIDs`: List of member IDs.  #### removePermissionGrants  Removes permission grants from members for the team. The `actionSet` and `actions` must match an existing permission grant.  ##### Parameters  - `actionSet`: Name of the action set. - `actions`: List of actions. - `memberIDs`: List of member IDs.  #### updateDescription  Updates the description of the team.  ##### Parameters  - `value`: The new description.  #### updateName  Updates the name of the team.  ##### Parameters  - `value`: The new name.  ### Expanding the teams response LaunchDarkly supports four fields for expanding the \"Update team\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  * `members` includes the total count of members that belong to the team. * `roles` includes a paginated list of the custom roles that you have assigned to the team. * `projects` includes a paginated list of the projects that the team has any write access to. * `maintainers` includes a paginated list of the maintainers that you have assigned to the team.  For example, `expand=members,roles` includes the `members` and `roles` fields in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_key = 'team_key_example'; // string | The team key
$team_patch_input = {"comment":"Optional comment about the update","instructions":[{"kind":"updateDescription","value":"New description for the team"}]}; // \LaunchDarklyApi\Model\TeamPatchInput
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above.

try {
    $result = $apiInstance->patchTeam($team_key, $team_patch_input, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->patchTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_key** | **string**| The team key |
 **team_patch_input** | [**\LaunchDarklyApi\Model\TeamPatchInput**](../Model/TeamPatchInput.md)|  |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Team**](../Model/Team.md)

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
postTeam($team_post_input, $expand): \LaunchDarklyApi\Model\Team
```

Create team

Create a team. To learn more, read [Creating a team](https://docs.launchdarkly.com/home/teams/creating).  ### Expanding the teams response LaunchDarkly supports four fields for expanding the \"Create team\" response. By default, these fields are **not** included in the response.  To expand the response, append the `expand` query parameter and add a comma-separated list with any of the following fields:  * `members` includes the total count of members that belong to the team. * `roles` includes a paginated list of the custom roles that you have assigned to the team. * `projects` includes a paginated list of the projects that the team has any write access to. * `maintainers` includes a paginated list of the maintainers that you have assigned to the team.  For example, `expand=members,roles` includes the `members` and `roles` fields in the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_post_input = {"customRoleKeys":["example-role1","example-role2"],"description":"An example team","key":"example-team","memberIDs":["12ab3c45de678910fgh12345"],"name":"Example team"}; // \LaunchDarklyApi\Model\TeamPostInput
$expand = 'expand_example'; // string | A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above.

try {
    $result = $apiInstance->postTeam($team_post_input, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->postTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_post_input** | [**\LaunchDarklyApi\Model\TeamPostInput**](../Model/TeamPostInput.md)|  |
 **expand** | **string**| A comma-separated list of properties that can reveal additional information in the response. Supported fields are explained above. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Team**](../Model/Team.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postTeamMembers()`

```php
postTeamMembers($team_key, $file): \LaunchDarklyApi\Model\TeamImportsRep
```

Add multiple members to team

Add multiple members to an existing team by uploading a CSV file of member email addresses. Your CSV file must include email addresses in the first column. You can include data in additional columns, but LaunchDarkly ignores all data outside the first column. Headers are optional. To learn more, read [Managing team members](https://docs.launchdarkly.com/home/teams/managing#managing-team-members).  **Members are only added on a `201` response.** A `207` indicates the CSV file contains a combination of valid and invalid entries. A `207` results in no members being added to the team.  On a `207` response, if an entry contains bad user input, the `message` field contains the row number as well as the reason for the error. The `message` field is omitted if the entry is valid.  Example `207` response: ```json {   \"items\": [     {       \"status\": \"success\",       \"value\": \"a-valid-email@launchdarkly.com\"     },     {       \"message\": \"Line 2: empty row\",       \"status\": \"error\",       \"value\": \"\"     },     {       \"message\": \"Line 3: email already exists in the specified team\",       \"status\": \"error\",       \"value\": \"existing-team-member@launchdarkly.com\"     },     {       \"message\": \"Line 4: invalid email formatting\",       \"status\": \"error\",       \"value\": \"invalid email format\"     }   ] } ```  Message | Resolution --- | --- Empty row | This line is blank. Add an email address and try again. Duplicate entry | This email address appears in the file twice. Remove the email from the file and try again. Email already exists in the specified team | This member is already on your team. Remove the email from the file and try again. Invalid formatting | This email address is not formatted correctly. Fix the formatting and try again. Email does not belong to a LaunchDarkly member | The email address doesn't belong to a LaunchDarkly account member. Invite them to LaunchDarkly, then re-add them to the team.  On a `400` response, the `message` field may contain errors specific to this endpoint.  Example `400` response: ```json {   \"code\": \"invalid_request\",   \"message\": \"Unable to process file\" } ```  Message | Resolution --- | --- Unable to process file | LaunchDarkly could not process the file for an unspecified reason. Review your file for errors and try again. File exceeds 25mb | Break up your file into multiple files of less than 25mbs each. All emails have invalid formatting | None of the email addresses in the file are in the correct format. Fix the formatting and try again. All emails belong to existing team members | All listed members are already on this team. Populate the file with member emails that do not belong to the team and try again. File is empty | The CSV file does not contain any email addresses. Populate the file and try again. No emails belong to members of your LaunchDarkly organization | None of the email addresses belong to members of your LaunchDarkly account. Invite these members to LaunchDarkly, then re-add them to the team.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_key = 'team_key_example'; // string | The team key
$file = "/path/to/file.txt"; // \SplFileObject | CSV file containing email addresses

try {
    $result = $apiInstance->postTeamMembers($team_key, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->postTeamMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **team_key** | **string**| The team key |
 **file** | **\SplFileObject****\SplFileObject**| CSV file containing email addresses | [optional]

### Return type

[**\LaunchDarklyApi\Model\TeamImportsRep**](../Model/TeamImportsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
