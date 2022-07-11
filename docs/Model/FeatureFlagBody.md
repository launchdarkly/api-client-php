# # FeatureFlagBody

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the feature flag |
**key** | **string** | A unique key used to reference the flag in your code |
**description** | **string** | Description of the feature flag | [optional]
**include_in_snippet** | **bool** | Deprecated, use &lt;code&gt;clientSideAvailability&lt;/code&gt;. Whether this flag should be made available to the client-side JavaScript SDK. | [optional]
**client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailabilityPost**](ClientSideAvailabilityPost.md) |  | [optional]
**variations** | [**\LaunchDarklyApi\Model\Variation[]**](Variation.md) | An array of possible variations for the flag. The variation values must be unique. | [optional]
**temporary** | **bool** | Whether the flag is a temporary flag. Defaults to true. | [optional]
**tags** | **string[]** | Tags for the feature flag | [optional]
**custom_properties** | [**array<string,\LaunchDarklyApi\Model\CustomProperty>**](CustomProperty.md) |  | [optional]
**defaults** | [**\LaunchDarklyApi\Model\Defaults**](Defaults.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
