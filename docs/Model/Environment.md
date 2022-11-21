# # Environment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | Links to other resources within the API. Includes the URL and content type of those resources |
**_id** | **string** |  |
**key** | **string** | A project-unique key for the new environment. |
**name** | **string** | A human-friendly name for the new environment. |
**api_key** | **string** | API key to use with client-side SDKs. |
**mobile_key** | **string** | API key to use with mobile SDKs. |
**color** | **string** | The color used to indicate this environment in the UI. |
**default_ttl** | **int** | The default time (in minutes) that the PHP SDK can cache feature flag rules locally. |
**secure_mode** | **bool** | Secure mode ensures that a user of the client-side SDK cannot impersonate another user. |
**default_track_events** | **bool** | Enables tracking detailed information for new flags by default. |
**require_comments** | **bool** | Whether members who modify flags and user segments through the LaunchDarkly user interface are required to add a comment |
**confirm_changes** | **bool** | Whether members who modify flags and user segments through the LaunchDarkly user interface are required to confirm those changes |
**tags** | **string[]** | A list of tags for this environment |
**approval_settings** | [**\LaunchDarklyApi\Model\ApprovalSettings**](ApprovalSettings.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
