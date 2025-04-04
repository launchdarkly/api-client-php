# LaunchDarklyApi\AccountMembersBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**patchMembers()**](AccountMembersBetaApi.md#patchMembers) | **PATCH** /api/v2/members | Modify account members


## `patchMembers()`

```php
patchMembers($members_patch_input): \LaunchDarklyApi\Model\BulkEditMembersRep
```

Modify account members

> ### Full use of this API resource is an Enterprise feature > > The ability to perform a partial update to multiple members is available to customers on an Enterprise plan. If you are on another plan, you can update members individually. To learn more, [read about our pricing](https://launchdarkly.com/pricing/). To upgrade your plan, [contact Sales](https://launchdarkly.com/contact-sales/).  Perform a partial update to multiple members. Updating members uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating members.  <details> <summary>Click to expand instructions for <strong>updating members</strong></summary>  #### replaceMembersRoles  Replaces the roles of the specified members. This also removes all custom roles assigned to the specified members.  ##### Parameters  - `value`: The new role. Must be a valid built-in role. To learn more about built-in roles, read [LaunchDarkly's built-in roles](https://launchdarkly.com/docs/home/account/built-in-roles). - `memberIDs`: List of member IDs.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"replaceMemberRoles\",     \"value\": \"reader\",     \"memberIDs\": [       \"1234a56b7c89d012345e678f\",       \"507f1f77bcf86cd799439011\"     ]   }] } ```  #### replaceAllMembersRoles  Replaces the roles of all members. This also removes all custom roles assigned to the specified members.  Members that match any of the filters are **excluded** from the update.  ##### Parameters  - `value`: The new role. Must be a valid built-in role. To learn more about built-in roles, read [LaunchDarkly's built-in roles](https://launchdarkly.com/docs/home/account/built-in-roles). - `filterLastSeen`: (Optional) A JSON object with one of the following formats:   - `{\"never\": true}` - Members that have never been active, such as those who have not accepted their invitation to LaunchDarkly, or have not logged in after being provisioned via SCIM.   - `{\"noData\": true}` - Members that have not been active since LaunchDarkly began recording last seen timestamps.   - `{\"before\": 1608672063611}` - Members that have not been active since the provided value, which should be a timestamp in Unix epoch milliseconds. - `filterQuery`: (Optional) A string that matches against the members' emails and names. It is not case sensitive. - `filterRoles`: (Optional) A `|` separated list of roles and custom roles. For the purposes of this filtering, `Owner` counts as `Admin`. - `filterTeamKey`: (Optional) A string that matches against the key of the team the members belong to. It is not case sensitive. - `ignoredMemberIDs`: (Optional) A list of member IDs.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"replaceAllMembersRoles\",     \"value\": \"reader\",     \"filterLastSeen\": { \"never\": true }   }] } ```  #### replaceMembersCustomRoles  Replaces the custom roles of the specified members.  ##### Parameters  - `values`: List of new custom roles. Must be a valid custom role key or ID. - `memberIDs`: List of member IDs.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"replaceMembersCustomRoles\",     \"values\": [ \"example-custom-role\" ],     \"memberIDs\": [       \"1234a56b7c89d012345e678f\",       \"507f1f77bcf86cd799439011\"     ]   }] } ```  #### replaceAllMembersCustomRoles  Replaces the custom roles of all members. Members that match any of the filters are **excluded** from the update.  ##### Parameters  - `values`: List of new roles. Must be a valid custom role key or ID. - `filterLastSeen`: (Optional) A JSON object with one of the following formats:   - `{\"never\": true}` - Members that have never been active, such as those who have not accepted their invitation to LaunchDarkly, or have not logged in after being provisioned via SCIM.   - `{\"noData\": true}` - Members that have not been active since LaunchDarkly began recording last seen timestamps.   - `{\"before\": 1608672063611}` - Members that have not been active since the provided value, which should be a timestamp in Unix epoch milliseconds. - `filterQuery`: (Optional) A string that matches against the members' emails and names. It is not case sensitive. - `filterRoles`: (Optional) A `|` separated list of roles and custom roles. For the purposes of this filtering, `Owner` counts as `Admin`. - `filterTeamKey`: (Optional) A string that matches against the key of the team the members belong to. It is not case sensitive. - `ignoredMemberIDs`: (Optional) A list of member IDs.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"replaceAllMembersCustomRoles\",     \"values\": [ \"example-custom-role\" ],     \"filterLastSeen\": { \"never\": true }   }] } ```  #### replaceMembersRoleAttributes  Replaces the role attributes of the specified members.  ##### Parameters  - `value`: Map of role attribute keys to lists of values. - `memberIDs`: List of member IDs.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"replaceMembersRoleAttributes\",     \"value\": {       \"myRoleProjectKey\": [\"mobile\", \"web\"],       \"myRoleEnvironmentKey\": [\"production\"]     },     \"memberIDs\": [       \"1234a56b7c89d012345e678f\",       \"507f1f77bcf86cd799439011\"     ]   }] } ```  </details>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccountMembersBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$members_patch_input = {"comment":"Optional comment about the update","instructions":[{"kind":"replaceMembersRoles","memberIDs":["1234a56b7c89d012345e678f","507f1f77bcf86cd799439011"],"value":"reader"}]}; // \LaunchDarklyApi\Model\MembersPatchInput

try {
    $result = $apiInstance->patchMembers($members_patch_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountMembersBetaApi->patchMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **members_patch_input** | [**\LaunchDarklyApi\Model\MembersPatchInput**](../Model/MembersPatchInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\BulkEditMembersRep**](../Model/BulkEditMembersRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
