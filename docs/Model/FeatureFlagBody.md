# # FeatureFlagBody

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the feature flag |
**key** | **string** | A unique key used to reference the flag in your code |
**description** | **string** | Description of the feature flag. Defaults to an empty string. | [optional]
**include_in_snippet** | **bool** | Deprecated, use &lt;code&gt;clientSideAvailability&lt;/code&gt;. Whether this flag should be made available to the client-side JavaScript SDK. Defaults to &lt;code&gt;false&lt;/code&gt;. | [optional]
**client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailabilityPost**](ClientSideAvailabilityPost.md) |  | [optional]
**variations** | [**\LaunchDarklyApi\Model\Variation[]**](Variation.md) | An array of possible variations for the flag. The variation values must be unique. If omitted, two boolean variations of &lt;code&gt;true&lt;/code&gt; and &lt;code&gt;false&lt;/code&gt; will be used. | [optional]
**temporary** | **bool** | Whether the flag is a temporary flag. Defaults to &lt;code&gt;true&lt;/code&gt;. | [optional]
**tags** | **string[]** | Tags for the feature flag. Defaults to an empty array. | [optional]
**custom_properties** | [**array<string,\LaunchDarklyApi\Model\CustomProperty>**](CustomProperty.md) |  | [optional]
**defaults** | [**\LaunchDarklyApi\Model\Defaults**](Defaults.md) |  | [optional]
**purpose** | **string** | Purpose of the flag | [optional]
**migration_settings** | [**\LaunchDarklyApi\Model\MigrationSettingsPost**](MigrationSettingsPost.md) |  | [optional]
**maintainer_id** | **string** | The ID of the member who maintains this feature flag | [optional]
**maintainer_team_key** | **string** | The key of the team that maintains this feature flag | [optional]
**initial_prerequisites** | [**\LaunchDarklyApi\Model\FlagPrerequisitePost[]**](FlagPrerequisitePost.md) | Initial set of prerequisite flags for all environments | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
