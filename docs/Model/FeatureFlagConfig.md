# # FeatureFlagConfig

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**on** | **bool** | Whether the flag is on |
**archived** | **bool** | Boolean indicating if the feature flag is archived |
**salt** | **string** |  |
**sel** | **string** |  |
**last_modified** | **int** |  |
**version** | **int** | Version of the feature flag |
**targets** | [**\LaunchDarklyApi\Model\Target[]**](Target.md) | An array of the individual targets that will receive a specific variation based on their key. Individual targets with a context kind of &#39;user&#39; are included here. | [optional]
**context_targets** | [**\LaunchDarklyApi\Model\Target[]**](Target.md) | An array of the individual targets that will receive a specific variation based on their key. Individual targets with context kinds other than &#39;user&#39; are included here. | [optional]
**rules** | [**\LaunchDarklyApi\Model\Rule[]**](Rule.md) | An array of the rules for how to serve a variation to specific targets based on their attributes | [optional]
**fallthrough** | [**\LaunchDarklyApi\Model\VariationOrRolloutRep**](VariationOrRolloutRep.md) |  | [optional]
**off_variation** | **int** | The ID of the variation to serve when the flag is off | [optional]
**prerequisites** | [**\LaunchDarklyApi\Model\Prerequisite[]**](Prerequisite.md) | An array of the prerequisite flags and their variations that are required before this flag takes effect | [optional]
**_site** | [**\LaunchDarklyApi\Model\Link**](Link.md) |  |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**_environment_name** | **string** | The environment name |
**track_events** | **bool** | Whether LaunchDarkly tracks events for the feature flag, for all rules |
**track_events_fallthrough** | **bool** | Whether LaunchDarkly tracks events for the feature flag, for the default rule |
**_debug_events_until_date** | **int** |  | [optional]
**_summary** | [**\LaunchDarklyApi\Model\FlagSummary**](FlagSummary.md) |  | [optional]
**evaluation** | [**\LaunchDarklyApi\Model\FlagConfigEvaluation**](FlagConfigEvaluation.md) |  | [optional]
**migration_settings** | [**\LaunchDarklyApi\Model\FlagConfigMigrationSettingsRep**](FlagConfigMigrationSettingsRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
