# # FeatureFlagConfig

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**on** | **bool** |  |
**archived** | **bool** |  |
**salt** | **string** |  |
**sel** | **string** |  |
**last_modified** | **int** |  |
**version** | **int** |  |
**targets** | [**\LaunchDarklyApi\Model\Target[]**](Target.md) |  | [optional]
**rules** | [**\LaunchDarklyApi\Model\Rule[]**](Rule.md) |  | [optional]
**fallthrough** | [**\LaunchDarklyApi\Model\VariationOrRolloutRep**](VariationOrRolloutRep.md) |  | [optional]
**off_variation** | **int** |  | [optional]
**prerequisites** | [**\LaunchDarklyApi\Model\Prerequisite[]**](Prerequisite.md) |  | [optional]
**_site** | [**\LaunchDarklyApi\Model\Link**](Link.md) |  |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**_environment_name** | **string** |  |
**track_events** | **bool** |  |
**track_events_fallthrough** | **bool** |  |
**_debug_events_until_date** | **int** |  | [optional]
**_summary** | [**\LaunchDarklyApi\Model\FlagSummary**](FlagSummary.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
