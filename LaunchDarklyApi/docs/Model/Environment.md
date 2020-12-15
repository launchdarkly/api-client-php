# Environment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**\LaunchDarklyApi\Model\Links**](Links.md) |  | [optional] 
**_id** | [**\LaunchDarklyApi\Model\Id**](Id.md) |  | [optional] 
**key** | **string** | The key for the environment. | [optional] 
**name** | **string** | The name of the environment. | [optional] 
**api_key** | **string** | The SDK key for backend LaunchDarkly SDKs. | [optional] 
**mobile_key** | **string** | The SDK key for mobile LaunchDarkly SDKs. | [optional] 
**color** | **string** | The swatch color for the environment. | [optional] 
**default_ttl** | **float** | The default TTL. | [optional] 
**secure_mode** | **bool** | Determines if this environment is in safe mode. | [optional] 
**default_track_events** | **bool** | Set to true to send detailed event information for new flags. | [optional] 
**tags** | **string[]** | An array of tags for this environment. | [optional] 
**require_comments** | **bool** | Determines if this environment requires comments for flag and segment changes. | [optional] 
**confirm_changes** | **bool** | Determines if this environment requires confirmation for flag and segment changes. | [optional] 
**approval_settings** | [**\LaunchDarklyApi\Model\EnvironmentApprovalSettings**](EnvironmentApprovalSettings.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


