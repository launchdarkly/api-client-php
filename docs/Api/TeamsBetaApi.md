# LaunchDarklyApi\TeamsBetaApi

All URIs are relative to https://app.launchdarkly.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**patchTeams()**](TeamsBetaApi.md#patchTeams) | **PATCH** /api/v2/teams | Update teams


## `patchTeams()`

```php
patchTeams($teams_patch_input): \LaunchDarklyApi\Model\BulkEditTeamsRep
```

Update teams

Perform a partial update to multiple teams. Updating teams uses the semantic patch format.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header. To learn more, read [Updates using semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch).  ### Instructions  Semantic patch requests support the following `kind` instructions for updating teams.  <details> <summary>Click to expand instructions for <strong>updating teams</strong></summary>  #### addMembersToTeams  Add the members to teams.  ##### Parameters  - `memberIDs`: List of member IDs to add. - `teamKeys`: List of teams to update.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"addMembersToTeams\",     \"memberIDs\": [       \"1234a56b7c89d012345e678f\"     ],     \"teamKeys\": [       \"example-team-1\",       \"example-team-2\"     ]   }] } ```  #### addAllMembersToTeams  Add all members to the team. Members that match any of the filters are **excluded** from the update.  ##### Parameters  - `teamKeys`: List of teams to update. - `filterLastSeen`: (Optional) A JSON object with one of the following formats:   - `{\"never\": true}` - Members that have never been active, such as those who have not accepted their invitation to LaunchDarkly, or have not logged in after being provisioned via SCIM.   - `{\"noData\": true}` - Members that have not been active since LaunchDarkly began recording last seen timestamps.   - `{\"before\": 1608672063611}` - Members that have not been active since the provided value, which should be a timestamp in Unix epoch milliseconds. - `filterQuery`: (Optional) A string that matches against the members' emails and names. It is not case sensitive. - `filterRoles`: (Optional) A `|` separated list of roles and custom roles. For the purposes of this filtering, `Owner` counts as `Admin`. - `filterTeamKey`: (Optional) A string that matches against the key of the team the members belong to. It is not case sensitive. - `ignoredMemberIDs`: (Optional) A list of member IDs.  Here's an example:  ```json {   \"instructions\": [{     \"kind\": \"addAllMembersToTeams\",     \"teamKeys\": [       \"example-team-1\",       \"example-team-2\"     ],     \"filterLastSeen\": { \"never\": true }   }] } ```  </details>

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
$teams_patch_input = {"comment":"Optional comment about the update","instructions":[{"kind":"addMembersToTeams","memberIDs":["1234a56b7c89d012345e678f"],"teamKeys":["example-team-1","example-team-2"]}]}; // \LaunchDarklyApi\Model\TeamsPatchInput

try {
    $result = $apiInstance->patchTeams($teams_patch_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsBetaApi->patchTeams: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **teams_patch_input** | [**\LaunchDarklyApi\Model\TeamsPatchInput**](../Model/TeamsPatchInput.md)|  |

### Return type

[**\LaunchDarklyApi\Model\BulkEditTeamsRep**](../Model/BulkEditTeamsRep.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
