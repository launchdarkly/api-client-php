# # FeatureFlagBody

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the feature flag |
**key** | **string** | A unique key to reference the flag in your code |
**description** | **string** | Description of the feature flag | [optional]
**include_in_snippet** | **bool** | Deprecated, use clientSideAvailability. Whether or not this flag should be made available to the client-side JavaScript SDK | [optional]
**client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailabilityPost**](ClientSideAvailabilityPost.md) |  | [optional]
**variations** | [**\LaunchDarklyApi\Model\Variate[]**](Variate.md) | An array of possible variations for the flag | [optional]
**variation_json_schema** | **mixed** |  | [optional]
**temporary** | **bool** | Whether or not the flag is a temporary flag | [optional]
**tags** | **string[]** | Tags for the feature flag | [optional]
**custom_properties** | [**array<string,\LaunchDarklyApi\Model\CustomProperty>**](CustomProperty.md) |  | [optional]
**defaults** | [**\LaunchDarklyApi\Model\Defaults**](Defaults.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
