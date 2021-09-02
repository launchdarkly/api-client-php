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
**targets** | [**\LaunchDarklyApi\Model\Target[]**](Target.md) |  |
**rules** | [**\LaunchDarklyApi\Model\Rule[]**](Rule.md) |  |
**fallthrough** | [**\LaunchDarklyApi\Model\VariationOrRolloutRep**](VariationOrRolloutRep.md) |  |
**off_variation** | **int** |  | [optional]
**prerequisites** | [**\LaunchDarklyApi\Model\Prerequisite[]**](Prerequisite.md) |  |
**_site** | [**\LaunchDarklyApi\Model\Link**](Link.md) |  |
**_access** | [**\LaunchDarklyApi\Model\AccessRep**](AccessRep.md) |  | [optional]
**_environment_name** | **string** |  |
**track_events** | **bool** |  |
**track_events_fallthrough** | **bool** |  |
**_debug_events_until_date** | **int** |  | [optional]
**_summary** | [**\LaunchDarklyApi\Model\FlagSummary**](FlagSummary.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)