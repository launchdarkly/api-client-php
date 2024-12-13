# # Environment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_id** | **string** | The ID for the environment. Use this as the client-side ID for authorization in some client-side SDKs, and to associate LaunchDarkly environments with CDN integrations in edge SDKs. |
**key** | **string** | A project-unique key for the new environment |
**name** | **string** | A human-friendly name for the new environment |
**api_key** | **string** | The SDK key for the environment. Use this for authorization in server-side SDKs. |
**mobile_key** | **string** | The mobile key for the environment. Use this for authorization in mobile SDKs. |
**color** | **string** | The color used to indicate this environment in the UI |
**default_ttl** | **int** | The default time (in minutes) that the PHP SDK can cache feature flag rules locally |
**secure_mode** | **bool** | Ensures that one end user of the client-side SDK cannot inspect the variations for another end user |
**default_track_events** | **bool** | Enables tracking detailed information for new flags by default |
**require_comments** | **bool** | Whether members who modify flags and segments through the LaunchDarkly user interface are required to add a comment |
**confirm_changes** | **bool** | Whether members who modify flags and segments through the LaunchDarkly user interface are required to confirm those changes |
**tags** | **string[]** | A list of tags for this environment |
**approval_settings** | [**\LaunchDarklyApi\Model\ApprovalSettings**](ApprovalSettings.md) |  | [optional]
**resource_approval_settings** | [**array<string,\LaunchDarklyApi\Model\ApprovalSettings>**](ApprovalSettings.md) | Details on the approval settings for this environment for each resource kind | [optional]
**critical** | **bool** | Whether the environment is critical |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
