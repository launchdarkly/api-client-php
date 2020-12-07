# FeatureFlagConfig

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**on** | **bool** |  | [optional] 
**archived** | **bool** |  | [optional] 
**salt** | **string** |  | [optional] 
**sel** | **string** |  | [optional] 
**last_modified** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**targets** | [**\LaunchDarklyApi\Model\Target[]**](Target.md) |  | [optional] 
**rules** | [**\LaunchDarklyApi\Model\Rule[]**](Rule.md) |  | [optional] 
**fallthrough** | [**\LaunchDarklyApi\Model\Fallthrough**](Fallthrough.md) |  | [optional] 
**off_variation** | **int** |  | [optional] 
**prerequisites** | [**\LaunchDarklyApi\Model\Prerequisite[]**](Prerequisite.md) |  | [optional] 
**track_events** | **bool** | Set to true to send detailed event information for this flag. | [optional] 
**track_events_fallthrough** | **bool** | Set to true to send detailed event information when targeting is enabled but no individual targeting rule is matched. | [optional] 
**_site** | [**\LaunchDarklyApi\Model\Site**](Site.md) |  | [optional] 
**_environment_name** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


