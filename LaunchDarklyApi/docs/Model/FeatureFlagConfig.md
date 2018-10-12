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
**goal_ids** | **string[]** |  | [optional] 
**rules** | [**\LaunchDarklyApi\Model\Rule[]**](Rule.md) |  | [optional] 
**fallthrough** | [**\LaunchDarklyApi\Model\Fallthrough**](Fallthrough.md) |  | [optional] 
**off_variation** | **int** |  | [optional] 
**prerequisites** | [**\LaunchDarklyApi\Model\Prerequisite[]**](Prerequisite.md) |  | [optional] 
**track_events** | **bool** | Set to true to send detailed event information for this flag. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


