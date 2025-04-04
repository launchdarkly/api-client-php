# # FeatureFlag

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the feature flag |
**kind** | **string** | Kind of feature flag |
**description** | **string** | Description of the feature flag | [optional]
**key** | **string** | A unique key used to reference the flag in your code |
**_version** | **int** | Version of the feature flag |
**creation_date** | **int** |  |
**include_in_snippet** | **bool** | Deprecated, use &lt;code&gt;clientSideAvailability&lt;/code&gt;. Whether this flag should be made available to the client-side JavaScript SDK | [optional]
**client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailability**](ClientSideAvailability.md) |  | [optional]
**variations** | [**\LaunchDarklyApi\Model\Variation[]**](Variation.md) | An array of possible variations for the flag |
**temporary** | **bool** | Whether the flag is a temporary flag |
**tags** | **string[]** | Tags for the feature flag |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**maintainer_id** | **string** | Associated maintainerId for the feature flag | [optional]
**_maintainer** | [**\LaunchDarklyApi\Model\MemberSummary**](MemberSummary.md) |  | [optional]
**maintainer_team_key** | **string** | The key of the associated team that maintains this feature flag | [optional]
**_maintainer_team** | [**\LaunchDarklyApi\Model\MaintainerTeam**](MaintainerTeam.md) |  | [optional]
**goal_ids** | **string[]** | Deprecated, use &lt;code&gt;experiments&lt;/code&gt; instead | [optional]
**experiments** | [**\LaunchDarklyApi\Model\ExperimentInfoRep**](ExperimentInfoRep.md) |  |
**custom_properties** | [**array<string,\LaunchDarklyApi\Model\CustomProperty>**](CustomProperty.md) |  |
**archived** | **bool** | Boolean indicating if the feature flag is archived |
**archived_date** | **int** |  | [optional]
**deprecated** | **bool** | Boolean indicating if the feature flag is deprecated | [optional]
**deprecated_date** | **int** |  | [optional]
**defaults** | [**\LaunchDarklyApi\Model\Defaults**](Defaults.md) |  | [optional]
**_purpose** | **string** |  | [optional]
**migration_settings** | [**\LaunchDarklyApi\Model\FlagMigrationSettingsRep**](FlagMigrationSettingsRep.md) |  | [optional]
**environments** | [**array<string,\LaunchDarklyApi\Model\FeatureFlagConfig>**](FeatureFlagConfig.md) | Details on the environments for this flag. Only returned if the request is filtered by environment, using the &lt;code&gt;filterEnv&lt;/code&gt; query parameter. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
