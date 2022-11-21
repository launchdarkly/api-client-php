# LaunchDarklyApi\AccountMembersApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteMember()**](AccountMembersApi.md#deleteMember) | **DELETE** /api/v2/members/{id} | Delete account member
[**getMember()**](AccountMembersApi.md#getMember) | **GET** /api/v2/members/{id} | Get account member
[**getMembers()**](AccountMembersApi.md#getMembers) | **GET** /api/v2/members | List account members
[**patchMember()**](AccountMembersApi.md#patchMember) | **PATCH** /api/v2/members/{id} | Modify an account member
[**postMemberTeams()**](AccountMembersApi.md#postMemberTeams) | **POST** /api/v2/members/{id}/teams | Add a member to teams
[**postMembers()**](AccountMembersApi.md#postMembers) | **POST** /api/v2/members | Invite new members


## `deleteMember()`

```php
deleteMember($id)
```

Delete account member

Delete a single account member by ID. Requests to delete account members will not work if SCIM is enabled for the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountMembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The member ID

try {
    $apiInstance->deleteMember($id);
} catch (Exception $e) {
    echo 'Exception when calling AccountMembersApi->deleteMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The member ID |

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

## `getMember()`

```php
getMember($id): \LaunchDarklyApi\Model\Member
```

Get account member

Get a single account member by member ID.  `me` is a reserved value for the `id` parameter that returns the caller's member information.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountMembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The member ID

try {
    $result = $apiInstance->getMember($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountMembersApi->getMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The member ID |

### Return type

[**\LaunchDarklyApi\Model\Member**](../Model/Member.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMembers()`

```php
getMembers($limit, $offset, $filter, $sort): \LaunchDarklyApi\Model\Members
```

List account members

Return a list of account members.  By default, this returns the first 20 members. Page through this list with the `limit` parameter and by following the `first`, `prev`, `next`, and `last` links in the returned `_links` field. These links are not present if the pages they refer to don't exist. For example, the `first` and `prev` links will be missing from the response on the first page.  ### Filtering members  LaunchDarkly supports the following fields for filters:  - `query` is a string that matches against the members' emails and names. It is not case sensitive. - `role` is a `|` separated list of roles and custom roles. It filters the list to members who have any of the roles in the list. For the purposes of this filtering, `Owner` counts as `Admin`. - `team` is a string that matches against the key of the teams the members belong to. It is not case sensitive. - `noteam` is a boolean that filters the list of members who are not on a team if true and members on a team if false. - `lastSeen` is a JSON object in one of the following formats:   - `{\"never\": true}` - Members that have never been active, such as those who have not accepted their invitation to LaunchDarkly, or have not logged in after being provisioned via SCIM.   - `{\"noData\": true}` - Members that have not been active since LaunchDarkly began recording last seen timestamps.   - `{\"before\": 1608672063611}` - Members that have not been active since the provided value, which should be a timestamp in Unix epoch milliseconds. - `accessCheck` is a string that represents a specific action on a specific resource and is in the format `<ActionSpecifier>:<ResourceSpecifier>`. It filters the list to members who have the ability to perform that action on that resource.    - For example, the filter `accessCheck:createApprovalRequest:proj/default:env/test:flag/alternate-page` matches members with the ability to create an approval request for the `alternate-page` flag in the `test` environment of the `default` project.   - Wildcard and tag filters are not supported when filtering for access.  For example, the filter `query:abc,role:admin|customrole` matches members with the string `abc` in their email or name, ignoring case, who also are either an `Owner` or `Admin` or have the custom role `customrole`.  ### Sorting members  LaunchDarkly supports two fields for sorting: `displayName` and `lastSeen`:  - `displayName` sorts by first + last name, using the member's email if no name is set. - `lastSeen` sorts by the `_lastSeen` property. LaunchDarkly considers members that have never been seen or have no data the oldest.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountMembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | The number of members to return in the response. Defaults to 20.
$offset = 56; // int | Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query `limit`.
$filter = 'filter_example'; // string | A comma-separated list of filters. Each filter is of the form `field:value`. Supported fields are explained above.
$sort = 'sort_example'; // string | A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order.

try {
    $result = $apiInstance->getMembers($limit, $offset, $filter, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountMembersApi->getMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**| The number of members to return in the response. Defaults to 20. | [optional]
 **offset** | **int**| Where to start in the list. This is for use with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. | [optional]
 **filter** | **string**| A comma-separated list of filters. Each filter is of the form &#x60;field:value&#x60;. Supported fields are explained above. | [optional]
 **sort** | **string**| A comma-separated list of fields to sort by. Fields prefixed by a dash ( - ) sort in descending order. | [optional]

### Return type

[**\LaunchDarklyApi\Model\Members**](../Model/Members.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchMember()`

```php
patchMember($id, $patch_operation): \LaunchDarklyApi\Model\Member
```

Modify an account member

Update a single account member. The request should be a valid JSON Patch document describing the changes to be made to the member.  To update fields in the account member object that are arrays, set the `path` to the name of the field and then append `/<array index>`. Using `/0` appends to the beginning of the array. For example, to add a new custom role to a member, use the following request body:  ```   [     {       \"op\": \"add\",       \"path\": \"/customRoles/0\",       \"value\": \"some-role-id\"     }   ] ```  When SAML SSO or SCIM is enabled for the account, account members are managed in the Identity Provider (IdP). Requests to update account members will succeed, but the IdP will override the update shortly afterwards.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountMembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The member ID
$patch_operation = [{"op":"add","path":"/role","value":"writer"}]; // \LaunchDarklyApi\Model\PatchOperation[]

try {
    $result = $apiInstance->patchMember($id, $patch_operation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountMembersApi->patchMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The member ID |
 **patch_operation** | [**\LaunchDarklyApi\Model\PatchOperation[]**](../Model/PatchOperation.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Member**](../Model/Member.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postMemberTeams()`

```php
postMemberTeams($id, $member_teams_post_input): \LaunchDarklyApi\Model\Member
```

Add a member to teams

Add one member to one or more teams.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountMembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The member ID
$member_teams_post_input = new \LaunchDarklyApi\Model\MemberTeamsPostInput(); // \LaunchDarklyApi\Model\MemberTeamsPostInput

try {
    $result = $apiInstance->postMemberTeams($id, $member_teams_post_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountMembersApi->postMemberTeams: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The member ID |
 **member_teams_post_input** | [**\LaunchDarklyApi\Model\MemberTeamsPostInput**](../Model/MemberTeamsPostInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Member**](../Model/Member.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postMembers()`

```php
postMembers($new_member_form): \LaunchDarklyApi\Model\Members
```

Invite new members

> ### Full use of this API resource is an Enterprise feature > > The ability to bulk invite members is available to customers on an Enterprise plan. If you are on a Pro plan, you can invite members individually. To learn more, [read about our pricing](https://launchdarkly.com/pricing/). To upgrade your plan, [contact Sales](https://launchdarkly.com/contact-sales/).  Invite one or more new members to join an account. Each member is sent an invitation. Members with \"admin\" or \"owner\" roles may create new members, as well as anyone with a \"createMember\" permission for \"member/\\*\". If a member cannot be invited, the entire request is rejected and no members are invited from that request.  Each member _must_ have an `email` field and either a `role` or a `customRoles` field. If any of the fields are not populated correctly, the request is rejected with the reason specified in the \"message\" field of the response.  Requests to create account members will not work if SCIM is enabled for the account.  _No more than 50 members may be created per request._  A request may also fail because of conflicts with existing members. These conflicts are reported using the additional `code` and `invalid_emails` response fields with the following possible values for `code`:  - **email_already_exists_in_account**: A member with this email address already exists in this account. - **email_taken_in_different_account**: A member with this email address exists in another account. - **duplicate_email**s: This request contains two or more members with the same email address.  A request that fails for one of the above reasons returns an HTTP response code of 400 (Bad Request).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountMembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$new_member_form = array(new \LaunchDarklyApi\Model\NewMemberForm()); // \LaunchDarklyApi\Model\NewMemberForm[]

try {
    $result = $apiInstance->postMembers($new_member_form);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountMembersApi->postMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **new_member_form** | [**\LaunchDarklyApi\Model\NewMemberForm[]**](../Model/NewMemberForm.md)|  |

### Return type

[**\LaunchDarklyApi\Model\Members**](../Model/Members.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
